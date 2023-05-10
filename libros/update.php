<?php
include('../db.php');
include('../DAO/LibroDAO.php');
include('../DAO/AutorDAO.php');
$libro=new LibroDAO();
$autor_id=0;

if(isset($_GET['libro_id'])){
    $result_libro=$libro->getLibro($_GET['libro_id']);

    if (mysqli_num_rows($result_libro) >=1){
        while ($row = mysqli_fetch_array($result_libro)){
            $imagen= $row['imagen'];
            $ano= $row['ano'];
            $titulo= $row['titulo'];
            $url= $row['url'];
            $especialidad= $row['especialidad'];
            $editorial= $row['editorial'];
        }
    }
}

// NOW WE UPDATE
if (isset($_POST['editar_libro'])){
    // SUBIR IMAGEN
    $imagen = $_FILES['imagen']['tmp_name'];
    // Definimos la ruta de la carpeta donde se guardaran la imgenes 
    $ruta_carpeta = "C:/xampp/htdocs/biblioteca_duberly/uploads/";
    $archivo = $ruta_carpeta.basename($_FILES['imagen']['name']);
    
    // Con esto que extencion tiene las imagenes que se suben
    $tipo_archivo = strtolower(pathinfo($archivo,PATHINFO_EXTENSION));

    // Crear un nombre unico para la imagen
    $nombre_imagen = uniqid().".".$tipo_archivo;
    move_uploaded_file($imagen,$ruta_carpeta.$nombre_imagen);

    // Ruta de la imgen para guardarla en la base de datos
    $ruta_imagen = 'uploads/'.$nombre_imagen;

    $libro->setImagen($ruta_imagen);
    $libro->setAno($_POST['ano']); 
    $libro->setAutorId($_POST['autor_id']); 
    $libro->setTitulo($_POST['titulo']); 
    $libro->setUrl($_POST['url']); 
    $libro->setEspecialidad($_POST['especialidad']); 
    $libro->setEditorial($_POST['editorial']); 

    $result=$libro->update($_GET['libro_id']);
    
    if(!$result){
        $_SESSION['message'] = 'Error al actualizar libro';
    }else{
        $_SESSION['message'] = 'libro actualizado correctamente';
        $_SESSION['message_type'] = 'success';
    }
    header('location:manage.php');
}
?>

<?php include('../include/header.php')?>

<div class="container">
    <div class="row">
        <div class="d-flex col-md-6 col-xl-4 mx-auto">
            <div class="mt-4 m-auto bg-warning card">
                <div class="card-header">
                    <h4 class="text-white">Editar Libro</h4>
                </div>
                <div class="card-body">
                <form action="update.php?libro_id=<?php echo $_GET['libro_id']?>" method="POST" enctype="multipart/form-data">
                <div class="container d-flex">
                    <div style="max-width:150px; height: 200px;" class="d-flex overflow-hidden m-auto mb-3 border">
                        <img style="max-width: 150px;" id="imagen_libro" class=" rounded border-2 border" src="../<?= $imagen ?>" alt="selecciona libro">
                    </div>
                </div>
                    <!-- IMAGEN -->
                    <div class="form-group mb-3">
                        <input value=<?= $imagen ?> class="form-control" id="input_imagen" name="imagen" type="file" required>
                    </div>

                    <!-- ANO -->
                    <div class="form-group mb-3">
                        <input value=<?= $ano ?> class="form-control" name="ano" type="text" placeholder="Año" required minlength="4" maxlength="4">
                    </div>
                
                    <!-- AUTOR -->
                    <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Autor</label>
                    <select class="form-select" id="inputGroupSelect01" name="autor_id" required>
                        <option value="" selected>Seleccionar...</option>
                        <!-- LISTAR AUTORES -->
                        <?php 
                        $autor=new AutorDAO();
                        $result_autores=$autor->read();
                        
                        if (mysqli_num_rows($result_autores) >=1){
                            while($autor = mysqli_fetch_array($result_autores)) {
                            ?>
                            <option value="<?php echo $autor['autor_id']?>"><?php echo $autor['nombre']?></option>
                            <?php }} else{?>
                            <option>No hay autores</option>
                        <?php }?>
                    </select>
                    </div>


                    
                    <!-- TITULO -->
                    <div class="form-group mb-3">
                        <input value=<?= $titulo ?> class="form-control" name="titulo" type="text" placeholder="Titulo" maxlength="100" required>
                    </div>
                    
                    <!-- URL -->
                    <div class="form-group mb-3">
                        <input value=<?= $url ?> class="form-control" name="url" type="url" placeholder="url" maxlength="255" required>
                    </div>
                    
                    <!-- ESPECIALIDAD -->
                    <div class="form-group mb-3">
                        <input value=<?= $especialidad ?> class="form-control" name="especialidad" type="text" placeholder="Especialidad" maxlength="100">
                    </div>
                    
                    <!-- EDITORIAL -->
                    <div class="form-group mb-3">
                        <input value=<?= $editorial ?> class="form-control" name="editorial" type="text" placeholder="Editorial" maxlength="100" >
                    </div>
                    
                    <!-- BUTTON -->
                    <div class="form-group mb-3">
                        <input class="btn btn-light" name="editar_libro" type="submit" value="Guardar" >
                        <a href="manage.php" class="btn btn-primary" name="editar_libro" type="button">Cancelar</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('../include/footer.php')?>