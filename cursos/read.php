<?php include('../db.php')?>
<div class="container p-4">
    
    <?php if(isset($_SESSION['message'])){ ?>

    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session_unset();}?>

    <div class="row d-flex">
        <div class="col col-md-4 col-lg-4 col-sm-12 col-12">

            <div class="card card-body">
                <form action="create.php" method="POST">
                    <!-- NOMBRE CURSO -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="nombre_curso" type="text" placeholder="Nombre" autofocus>
                    </div>
                    <!-- CREDITOS-->
                    <div class="form-group mb-3">
                        <input class="form-control" name="creditos" type="number" placeholder="Creditos">
                    </div>
                    
                    <!-- BUTTON REGISTRAR -->
                    <div class="text-center form-group">
                        <input type="submit" class="btn btn-primary col-4" name="guardar_curso" value="Registrar">
                    </div>
                </form>
            </div>
        </div>

        <div class="col mt-5">
            <table style="width:100%;" class="table text-white">
                <thead class="">
                    <tr>
                        <th class="col">Id</th>
                        <th>Nombre</th>
                        <th>Creditos</th>
                    </tr>
                </thead>
                <tbody>
            <!-- IMPRIMIMOS LOS CURSOS -->
            <?php 
            $query = 'SELECT * FROM CURSOS';
            $result_cursos = mysqli_query(conectar(),$query);
            
            if (mysqli_num_rows($result_cursos) >=1){
                $contador=0;
                while($curso = mysqli_fetch_array($result_cursos)) {
                    $contador ++ ?>
                    <tr>
                        <th scope="row"><?php echo $contador?></th>
                        <td><?php echo $curso['nombre_curso']?></td>
                        <td><?php echo $curso['creditos']?></td>
                        
                        <!-- EDIT -->
                        <td class="w-auto border-0"> 
                            <a href="update.php?curso_id=<?php echo $curso['curso_id']?>" class="btn btn-primary">
                                <i class="fas fa-marker"></i>
                            </a>
                        <!-- DELETE -->

                            <a href="delete.php?curso_id=<?php echo $curso['curso_id']?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php }} else{?>
                    <tr>
                        <td class="text-center" colspan="4">
                            <p>No hay cursos</p>
                        </td>
                    </tr>
                <?php }?>
                

            <!-- DESCONECTAR LA BASE DE DATOS -->
            <?php desconectar(conectar())?>
            </tbody>
            </table>
        </div>
    </div>
</div>
