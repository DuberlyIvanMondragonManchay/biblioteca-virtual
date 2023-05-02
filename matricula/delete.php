<?php
include('../db.php');
try {
    // Código que puede generar una excepción o error

    if(isset($_GET['matricula_id'])){
        $query = "DELETE FROM MATRICULAS WHERE matricula_id =".$_GET['matricula_id'];
        $result = mysqli_query(conectar(),$query);

        if(!$result){
            die('Error al eliminar matricula');
        }
        $_SESSION['message'] = 'Matricula eliminado correctamente';
        $_SESSION['message_type'] = 'success';
        desconectar(conectar());
        header('Location:matriculas.php');
    }
} catch (Exception $e) {
    // Código para manejar la excepción o error
    $_SESSION['message'] = 'Error al eliminar matricula';
    $_SESSION['message_type']='danger';
    header('Location:matriculas.php');
}
?>