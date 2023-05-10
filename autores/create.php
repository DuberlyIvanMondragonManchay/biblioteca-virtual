<?php 
include('../db.php');
include('../DAO/AutorDAO.php');
if (isset($_POST['guardar_autor'])) {

    $autor = new AutorDAO();
    $autor->setNombre($_POST['nombre']);
    $autor->setApellidoPaterno($_POST['ape_paterno']);
    $autor->setApellidoMaterno( $_POST['ape_materno']);

    if(!$autor->create()){
        echo 'Error al crear autor :c';
    };

    $_SESSION['message']= 'autor registrado correctamente';
    $_SESSION['message_type']='success';
    header('Location:read.php');
}
?>