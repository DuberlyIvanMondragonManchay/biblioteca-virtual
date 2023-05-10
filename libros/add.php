<?php 
include('../include/header.php');
include('../DAO/AutorDAO.php');
include('../db.php');
?>
    <div class="container pt-5">
        <!-- MENSAGE -->
        <?php if(isset($_SESSION['message'])){ ?>
            
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php session_unset();}?>
            
    <!-- ADD BOOK -->
    <div class="row">
        <!--  NUEVO LIBRO-->
        <div class="d-flex col-md-6 col-xl-4 mx-auto">
            <div class="card ">
            <div class="card-header">
                    <h3>Nuevo Libro</h3>
                </div>
                <div class="card-body">
                    <form action="save.php" method="POST" enctype="multipart/form-data">
                        <div class="container d-flex">
                            <div style="max-width:150px; height: 200px;" class="d-flex overflow-hidden m-auto mb-3 border">
                                <img style="max-width: 150px" id="imagen_libro" class=" rounded border-2 border" src="../img/libro.svg" alt="selecciona libro">
                            </div>
                        </div>
                        <!-- IMAGEN -->
                        <div class="form-group mb-3">
                            
                            <input class="form-control" id="input_imagen" name="imagen" type="file" required>
                        </div>

                        <!-- ANO -->
                        <div class="form-group mb-3">
                            <input class="form-control" name="ano" type="text" placeholder="Año" required minlength="4" maxlength="4">
                        </div>
                    
                    <!-- AUTOR -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Autor</label>
                        <select class="form-select" id="inputGroupSelect01" name="autor_id" required>
                            <option selected>Seleccionar...</option>
                            <!-- LISTAR AUTORES -->
                        <?php 
                            $autor=new AutorDAO();
                            $result_autores=$autor->read();
                        
                            if (mysqli_num_rows($result_autores) >=1){
                                while($autor = mysqli_fetch_array($result_autores)) {?>
                                    <option value=<?php echo $autor['autor_id']?>><?php echo $autor['nombre']?></option>

                            <?php }} else{?>
                                <option>No hay autores</option>
                        <?php }?>
                        </select>
                    </div>

                    
                    <!-- TITULO -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="titulo" type="text" placeholder="Titulo" maxlength="100" required>
                    </div>
                    
                    <!-- TITULO -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="url" type="url" placeholder="url" maxlength="255" required>
                    </div>
                    
                    <!-- ESPECIALIDAD -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="especialidad" type="text" placeholder="Especialidad" maxlength="100">
                    </div>
                    
                    <!-- EDITORIAL -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="editorial" type="text" placeholder="Editorial" maxlength="100" >
                    </div>
                    
                    <!-- BUTTON -->
                    <div class="form-group mb-3">
                        <input class="btn btn-primary" name="guardar_libro" type="submit" value="Guardar" >
                    </div>

                </form>
            </div>
            </div>
        </div>
    </div>
</div>

<?php include('../include/footer.php');?>
