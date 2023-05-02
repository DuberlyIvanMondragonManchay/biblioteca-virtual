<?php 
include('../db.php');
try {
    // Código que puede generar una excepción o error

    if (isset($_POST['generar_matricula'])) {
        $curso_id = $_POST['curso_id'];
        $alumno_id = $_POST['alumno_id'];

        $query = "INSERT INTO MATRICULAS (curso_id,alumno_id) VALUES ('$curso_id','$alumno_id')";
        $result = mysqli_query(conectar(),$query);

        if(!$result){
            die('Error al registrar matriculas');
        }
        desconectar(conectar());
        // Este mensage se guardara en la sesion
        $_SESSION['message']= 'Matricula registrado correctamente';
        $_SESSION['message_type']='success';
        // Al momento de insertar nos redireccionara al aumnos.php
        header('Location:matriculas.php');
    }
} catch (Exception $e) {
    // Código para manejar la excepción o error
    $_SESSION['message']= 'Error al registrar Matricula';
    $_SESSION['message_type']='danger';
    header('Location:matriculas.php');
}
?>