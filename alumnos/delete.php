<?php
include('../db.php');
try {
    // Código que puede generar una excepción o error

    if(isset($_GET['alumno_id'])){
        $query = "DELETE FROM ALUMNOS WHERE alumno_id = ".$_GET['alumno_id']."";
        $result = mysqli_query(conectar(),$query);

        if(!$result){
            die('Error al eliminar alumnos');
        }
        $_SESSION['message'] = 'Alumno eliminado correctamente';
        $_SESSION['message_type'] = 'success';
        header('Location:alumnos.php');
    }
} catch (Exception $e) {
    // Código para manejar la excepción o error
    $_SESSION['message'] = 'Error al eliminar alumno';
    $_SESSION['message_type']='danger';
    header('Location:alumnos.php');
}
?>