<?php
include('../db.php');
try {
    // Código que puede generar una excepción o error

    if(isset($_GET['curso_id'])){
        $query = "DELETE FROM CURSOS WHERE curso_id = ".$_GET['curso_id']."";
        $result = mysqli_query(conectar(),$query);

        if(!$result){
            die('Error al eliminar curso');
        }
        $_SESSION['message'] = 'Curso eliminado correctamente';
        $_SESSION['message_type'] = 'success';
        header('Location:cursos.php');
    }
} catch (Exception $e) {
    // Código para manejar la excepción o error
    $_SESSION['message'] = 'Error al eliminar curso';
    $_SESSION['message_type']='danger';
    header('Location:cursos.php');
}
?>