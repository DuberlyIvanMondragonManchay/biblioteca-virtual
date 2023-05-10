<?php
include('../db.php');
include('../DAO/LibroDAO.php');

if(isset($_GET['libro_id'])){
    $libro=new LibroDAO();
    $result=$libro->delete($_GET['libro_id']);
    if(!$result){
        die('Error al eliminar libro');
    }
    $_SESSION['message'] = 'Libro eliminado correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location:manage.php');
}
?>