<?php
include('../db.php');
try {
    // Código que puede generar una excepción o error

    if(isset($_GET['alumno_id'])){

        $query = "SELECT * FROM ALUMNOS WHERE alumno_id = ".$_GET['alumno_id']."";
        $result_alumno = mysqli_query(conectar(),$query);

        if(!$result_alumno){
            die('Error al seleccionar alumno');
        }

        if (mysqli_num_rows($result_alumno) >=1){
            while ($row = mysqli_fetch_array($result_alumno)){
                $nombre = $row['nombre'];
                $ape_paterno = $row['ape_paterno'];
                $ape_materno = $row['ape_materno'];
            }
        }
    }
    // NOW WE UPDATE

    if (isset($_POST['editar_alumno'])){
        $newNombre = $_POST['nombre'];
        $newApe_paterno = $_POST['ape_paterno'];
        $newApe_materno = $_POST['ape_materno'];

        $update_query = "UPDATE alumnos SET nombre = '$newNombre',ape_paterno = '$newApe_paterno',ape_materno = '$newApe_materno' WHERE alumno_id =". $_GET['alumno_id'];

        $new_result=mysqli_query(conectar(),$update_query);
        if(!$new_result){
            die('Error al actualizar alumno');
        }

        $_SESSION['message'] = 'Alumno actualizado correctamente';
        $_SESSION['message_type'] = 'success';

        header('location:alumnos.php');
    }
} catch (Exception $e) {
    // Código para manejar la excepción o error
    $_SESSION['message'] = 'Error al Actualizar alumno';
    $_SESSION['message_type']='danger';
    header('Location:alumnos.php');
}
?>

<?php include('../include/header.php')?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-xl-4 mx-auto">
            <div class="card card-body">

                <form action="update.php?alumno_id=<?php echo $_GET['alumno_id']?>" method="POST">
                    <!--UPDATE NOMBRE -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="nombre" type="text" value='<?php echo $nombre?>' placeholder="Editar Nombre" autofocus>
                    </div>
                    <!--UPDATE APELLIDO PATERNO -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="ape_paterno" type="text" value='<?php echo $ape_paterno?>' placeholder="Editar Apellido Paterno" >
                    </div>
                    <!--UPDATE APELLIDO MATERNO -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="ape_materno" type="text" value='<?php echo $ape_materno?>' placeholder="Editar Apellido Materno" >
                    </div>
                    <div class="form-group mb-3 d-flex justify-content-center flex-wrap gap-2">
                        <a href="alumnos.php"><input type="button" class="btn btn-primary " value="Cancelar"></a>
                        <input type="submit" class="btn btn-success" name="editar_alumno" value="Guardar Cambios">
                    </div> 
                </form>

            </div>
        </div>
    </div>
</div>
<?php include('../include/footer.php')?>