<?php
include('../db.php');
include('../DAO/AutorDAO.php');

if(isset($_GET['autor_id'])){
    $autor=new AutorDAO();
    $result=$autor->delete($_GET['autor_id']);
    if(!$result){
        die('Error al eliminar autor');
    }
    $_SESSION['message'] = 'Autor eliminado correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location:read.php');
}
?>