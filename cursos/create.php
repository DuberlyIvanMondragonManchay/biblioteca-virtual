<?php 
include('../db.php');
try {
    // Código que puede generar una excepción o error

    if (isset($_POST['guardar_curso'])) {
        $nombre_curso = $_POST['nombre_curso'];
        $creditos = $_POST['creditos'];

        $query = "INSERT INTO CURSOS (nombre_curso,creditos) VALUES ('$nombre_curso','$creditos')";
        $result = mysqli_query(conectar(),$query);

        if(!$result){
            die('Error al registrar cursos');
        }
        desconectar(conectar());
        // Este mensage se guardara en la sesion
        $_SESSION['message']= 'curso registrado correctamente';
        $_SESSION['message_type']='success';
        // Al momento de insertar nos redireccionara al aumnos.php
        header('Location:cursos.php');
    }
} catch (Exception $e) {
    // Código para manejar la excepción o error
    $_SESSION['message']= 'Error al registrar curso';
    $_SESSION['message_type']='danger';
    header('Location:cursos.php');
}
?>