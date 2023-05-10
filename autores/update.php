<?php
include('../db.php');
include('../DAO/AutorDAO.php');
$autor=new AutorDAO();

if (isset($_GET['autor_id'])){
    // SELECCIONAR LOS CAMPOS EN BASE AL ID QUE RECIBIMOS

    $result_autores = $autor->getAutor($_GET['autor_id']);
    
    if (mysqli_num_rows($result_autores) >=1){
        
        while($autor = mysqli_fetch_array($result_autores)) {
           $nombre=$autor['nombre'];
           $ape_paterno=$autor['ape_paterno'];
           $ape_materno=$autor['ape_materno'];
        }
    }
}

// NOW WE UPDATE

if (isset($_POST['editar_autor'])){
    $autor->setNombre($_POST['nombre']);
    $autor->setApellidoPaterno($_POST['ape_paterno']);
    $autor->setApellidoMaterno($_POST['ape_materno']);

    $result=$autor->update($_GET['autor_id']);
    if(!$result){
        $_SESSION['message'] = 'Error al actualizar autor';
    }else{
        $_SESSION['message'] = 'Autor actualizado correctamente';
        $_SESSION['message_type'] = 'success';
    }
    header('location:read.php');
}
?>

<?php include('../include/header.php')?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-xl-4 mx-auto">
            <div class="card card-body">

                <form action="update.php?autor_id=<?php echo $_GET['autor_id']?>" method="POST">
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
                        <a href="autors.php"><input type="button" class="btn btn-primary " value="Cancelar"></a>
                        <input type="submit" class="btn btn-success" name="editar_autor" value="Guardar Cambios">
                    </div> 
                </form>

            </div>
        </div>
    </div>
</div>
<?php include('../include/footer.php')?>