<?php 
include('../db.php');
include('../DAO/LibroDAO.php');
$libro=new LibroDAO();
if(isset($_POST['guardar_libro'])){
    // SUBIR IMAGEN
    $imagen = $_FILES['imagen']['tmp_name'];
    // Definimos la ruta de la carpeta donde se guardaran la imgenes 
    $ruta_carpeta = "C:/xampp/htdocs/biblioteca_duberly/uploads/";
    $archivo = $ruta_carpeta.basename($_FILES['imagen']['name']);
    
    // Con esto que extencion tiene las imagenes que se suben
    $tipo_archivo = strtolower(pathinfo($archivo,PATHINFO_EXTENSION));

    // Crear un nombre unico para la imagen
    $nombre_imagen = uniqid().".".$tipo_archivo;
    move_uploaded_file($imagen,$ruta_carpeta.$nombre_imagen);

    // Ruta de la imgen para guardarla en la base de datos
    $ruta_imagen = 'uploads/'.$nombre_imagen;
    
    $libro->setAno($_POST['ano']);
    $libro->setImagen($ruta_imagen);
    $libro->setAutorId($_POST['autor_id']);
    $libro->setTitulo($_POST['titulo']);
    $libro->setUrl($_POST['url']);
    $libro->setEspecialidad($_POST['especialidad']);
    $libro->setEditorial($_POST['editorial']);

    // // INSERTAR A LA BASE DE DATOS
    if(!$libro->create()){
        die('Error al registrar libro:c');
    }
    desconectar(conectar());
    // Este mensage se guardara en la sesion
    $_SESSION['message']= 'libro registrado correctamente';
    $_SESSION['message_type']='success';
    // Al momento de insertar nos redireccionara al libros.php
    header('Location:add.php');
}
