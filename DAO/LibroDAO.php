<?php
class LibroDAO {
    private $libro_id;
    private $imagen;
    private $ano;
    private $autor_id;
    private $titulo;
    private $url;
    private $especialidad;
    private $editorial;
    
    // Constructor para crear una instancia de la clase con atributos iniciales
    public function __construct($libro_id = null, $imagen = null,$ano=null, $autor_id= null, $titulo = null,$url=null,$especialidad=null,$editorial=null) {
        $this->libro_id = $libro_id;
        $this->imagen= $imagen;
        $this->ano=$ano;
        $this->autor_id = $autor_id;
        $this->titulo = $titulo;
        $this->url = $url;
        $this->especialidad = $especialidad;
        $this->editorial = $editorial;
    }
    
    // Métodos CRUD
    public function create() {
        $conn = conectar();
        $query = $conn->prepare('INSERT INTO LIBROS (imagen,ano, autor_id, titulo, url, especialidad, editorial) VALUES (?, ?, ?, ?, ?, ?,?)'); 
        $imagen = $this->getImagen();
        $ano = $this->getAno();
        $autor_id = $this->getAutorId();
        $titulo = $this->getTitulo();
        $url = $this->getUrl();
        $especialidad = $this->getEspecialidad();
        $editorial = $this->getEditorial();
        $query->bind_param('ssissss', $imagen,$ano, $autor_id, $titulo, $url, $especialidad, $editorial);

        if(!$query->execute()){
            return false;
        } else {
            return true;
        }
    }
    
    public function read() {
        $conn = conectar();
        $query = 'SELECT L.libro_id,L.imagen,L.titulo,L.url,L.especialidad,L.ano,L.editorial,A.nombre
        FROM AUTORES AS A
        INNER JOIN LIBROS AS L ON A.autor_id = L.autor_id';
        $result=mysqli_query($conn,$query);
        
        if(!$result){
            return false;
        } else {
            return $result;
        }
    }
    
    public function update($id) {
        $conn = conectar();
        $query = $conn->prepare('UPDATE LIBROS SET imagen = ?, ano=?, autor_id = ?, titulo = ?, url = ?, especialidad = ?, editorial = ? WHERE libro_id = ?'); 
        $imagen=$this->getImagen();
        $ano=$this->getAno();
        $autor_id=$this->getAutorId();
        $titulo=$this->getTitulo();
        $url=$this->getUrl();
        $especialidad=$this->getEspecialidad();
        $editorial=$this->getEditorial();

        $query->bind_param('ssissssi',$imagen,$ano,$autor_id,$titulo,$url,$especialidad,$editorial,$id);
        
        if(!$query->execute()){
            return false;
        } else {
            return true;
        }

        

        if(!$query->execute()){
            return false;
        } else {
            return true;
        }
    }
    
    public function delete($id) {
        $conn = conectar();
        $query = 'DELETE FROM LIBROS WHERE libro_id ='.$id;
        $result=mysqli_query($conn,$query);
        
        if(!$result){
            return false;
        } else {
            return true;
        }
    }
    
    public function getLibro($id) {
        $conn = conectar();
        $query = 'SELECT L.libro_id,L.imagen,L.titulo,L.url,L.especialidad,L.ano,L.editorial,A.nombre
        FROM AUTORES AS A
        INNER JOIN LIBROS AS L ON A.autor_id = L.autor_id WHERE L.libro_id ='.$id;
        $result=mysqli_query($conn,$query);
        
        if(!$result){
            return false;
        } else {
            return $result;
        }
    }
    // METODOS GET Y SET
    public function getLibroId() {
        return $this->libro_id;
    }
    
    public function setLibroId($libro_id) {
        $this->libro_id = $libro_id;
    }
    
    public function getImagen() {
        return $this->imagen;
    }
    
    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getAno() {
        return $this->ano;
    }
    
    public function setAno($ano) {
        $this->ano = $ano;
    }
    
    public function getAutorId() {
        return $this->autor_id;
    }
    
    public function setAutorId($autor_id) {
        $this->autor_id = $autor_id;
    }
    
    public function getTitulo() {
        return $this->titulo;
    }
    
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    
    public function getUrl() {
        return $this->url;
    }
    
    public function setUrl($url) {
        $this->url = $url;
    }
    
    public function getEspecialidad() {
        return $this->especialidad;
    }
    
    public function setEspecialidad($especialidad) {
        $this->especialidad = $especialidad;
    }
    
    public function getEditorial() {
        return $this->editorial;
    }
    
    public function setEditorial($editorial) {
        $this->editorial = $editorial;
    }
}
?>