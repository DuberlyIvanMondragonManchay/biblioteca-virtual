<?php
class AutorDAO {
    private $id;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    
    // Constructor para crear una instancia de la clase con atributos iniciales
    public function __construct($id = null, $nombre = null, $apellidoPaterno = null, $apellidoMaterno = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
    }
    
    // Métodos CRUD
    public function create() {
        $conn = conectar();
        $query = $conn->prepare('INSERT INTO AUTORES (nombre,ape_paterno,ape_materno) VALUES (?,?,?)'); 
        $nombre = $this->getNombre();
        $apellidoPaterno = $this->getApellidoPaterno();
        $apellidoMaterno = $this->getApellidoMaterno();
        $query->bind_param('sss', $nombre, $apellidoPaterno, $apellidoMaterno);

        if(!$query->execute()){
            return false;
        } else {
            return true;
        }
    }
    
    public function read() {
        $conn = conectar();
        $query = 'SELECT * FROM AUTORES';
        $result=mysqli_query($conn,$query);
        
        if(!$result){
            return false;
        } else {
            return $result;
        }
    }
    
    public function update($id) {
        $conn = conectar();
        $query = $conn->prepare('UPDATE AUTORES SET nombre = ?, ape_paterno = ?, ape_materno = ? WHERE autor_id = ?'); 
        $nombre = $this->getNombre();
        $apellidoPaterno = $this->getApellidoPaterno();
        $apellidoMaterno = $this->getApellidoMaterno();
        $query->bind_param('sssi', $nombre, $apellidoPaterno, $apellidoMaterno, $id);

        if(!$query->execute()){
            return false;
        } else {
            return true;
        }
    }
    
    public function delete($id) {
        $conn = conectar();
        $query = 'DELETE FROM AUTORES WHERE autor_id ='.$id;
        $result=mysqli_query($conn,$query);
        
        if(!$result){
            return false;
        } else {
            return true;
        }
    }
    public function getAutor($id) {
        $conn = conectar();
        $query = 'SELECT * FROM AUTORES WHERE autor_id ='.$id;
        $result=mysqli_query($conn,$query);
        
        if(!$result){
            return false;
        } else {
            return $result;
        }
    }
    
    // Métodos "get" y "set" para los atributos de la clase (ya definidos en el ejemplo anterior)
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getApellidoPaterno() {
        return $this->apellidoPaterno;
    }
    
    public function setApellidoPaterno($apellidoPaterno) {
        $this->apellidoPaterno = $apellidoPaterno;
    }
    
    public function getApellidoMaterno() {
        return $this->apellidoMaterno;
    }
    
    public function setApellidoMaterno($apellidoMaterno) {
        $this->apellidoMaterno = $apellidoMaterno;
    }
}
?>