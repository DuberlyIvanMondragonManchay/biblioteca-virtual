<?php
include('../db.php');
try {
    // Código que puede generar una excepción o error

    if(isset($_GET['curso_id'])){

        $query = "SELECT * FROM CURSOS WHERE curso_id = ".$_GET['curso_id']."";
        $result_curso = mysqli_query(conectar(),$query);

        if(!$result_curso){
            die('Error al seleccionar curso');
        }

        if (mysqli_num_rows($result_curso) >=1){
            while ($row = mysqli_fetch_array($result_curso)){
                $nombre_curso = $row['nombre_curso'];
                $creditos = $row['creditos'];
            }
        }
    }
    // NOW WE UPDATE

    if (isset($_POST['editar_curso'])){
        $newNombre_curso = $_POST['nombre_curso'];
        $newCreditos = $_POST['creditos'];

        $update_query = "UPDATE CURSOS SET nombre_curso = '$newNombre_curso',creditos = '$newCreditos' WHERE curso_id =". $_GET['curso_id'];

        $new_result=mysqli_query(conectar(),$update_query);
        if(!$new_result){
            die('Error al actualizar curso');
        }

        $_SESSION['message'] = 'curso actualizado correctamente';
        $_SESSION['message_type'] = 'success';

        header('location:cursos.php');
    }
} catch (Exception $e) {
    // Código para manejar la excepción o error
    $_SESSION['message'] = 'Error al Actualizar curso';
    $_SESSION['message_type']='danger';
    header('Location:cursos.php');
}
?>

<?php include('../include/header.php')?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-xl-4 mx-auto">
            <div class="card card-body">

                <form action="update.php?curso_id=<?php echo $_GET['curso_id']?>" method="POST">
                    <!--UPDATE NOMBRE_CURSO -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="nombre_curso" type="text" value='<?php echo $nombre_curso?>' placeholder="Editar Nombre" autofocus>
                    </div>
                    <!--UPDATE CREDITOS -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="creditos" type="text" value='<?php echo $creditos?>' placeholder="Editar creditos" >
                    </div>
                   
                    <div class="form-group mb-3 d-flex justify-content-center flex-wrap gap-2">
                        <a href="cursos.php"><input type="button" class="btn btn-primary " value="Cancelar"></a>
                        <input type="submit" class="btn btn-success" name="editar_curso" value="Guardar Cambios">
                    </div> 
                </form>

            </div>
        </div>
    </div>
</div>
<?php include('../include/footer.php')?>