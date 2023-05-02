<?php 
include('../db.php');
try {
    // Código que puede generar una excepción o error

    if (isset($_POST['guardar_alumno'])) {
        $nombre = $_POST['nombre'];
        $ape_paterno = $_POST['ape_paterno'];
        $ape_materno = $_POST['ape_materno'];

        $query = "INSERT INTO ALUMNOS (nombre,ape_paterno,ape_materno) VALUES ('$nombre','$ape_paterno','$ape_materno')";
        $result = mysqli_query(conectar(),$query);

        if(!$result){
            die('Error al registrar alumnos');
        }
        desconectar(conectar());
        // Este mensage se guardara en la sesion
        $_SESSION['message']= 'Alumno registrado correctamente';
        $_SESSION['message_type']='success';
        // Al momento de insertar nos redireccionara al aumnos.php
        header('Location:alumnos.php');
    }
} catch (Exception $e) {
    // Código para manejar la excepción o error
    $_SESSION['message']= 'Error al registrar alumno';
    $_SESSION['message_type']='danger';
    header('Location:alumnos.php');
}
?>