<?php include('../db.php')?>
<div class="container p-4">
    
    <?php if(isset($_SESSION['message'])){ ?>

    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session_unset();}?>

    <div class="row d-flex">
        <div style="min-width: 528px;" class="col col-md-4 col-lg-4 col-sm-12 col-12">

            <div class="card card-body">
                <form action="create.php" method="POST">
                    <!-- NOMBRE -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="nombre" type="text" placeholder="Nombre" autofocus>
                    </div>
                    <!-- APELLIDO PATERNO -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="ape_paterno" type="text" placeholder="Apellido Paterno" >
                    </div>
                    <!-- APELLIDO MATERNO -->
                    <div class="form-group mb-3">
                        <input class="form-control" name="ape_materno" type="text" placeholder="Apellido Materno" autofocus>
                    </div>
                    <!-- BUTTON REGISTRAR -->
                    <div class="text-center form-group">
                        <input type="submit" class="btn btn-primary col-md-6 col-4" name="guardar_alumno" value="Registrar">
                    </div>
                </form>
            </div>
        </div>

        <div class="col">
            <table class="table text-white">
                <thead>
                    <tr>
                        <th class="col">Id</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                    </tr>
                </thead>
                <tbody>
            <!-- IMPRIMIMOS LOS ALUMNOS -->
            <?php 
            $query = 'SELECT * FROM ALUMNOS';
            $result_alumnos = mysqli_query(conectar(),$query);
            
            if (mysqli_num_rows($result_alumnos) >=1){
                $contador=0;
                while($alumno = mysqli_fetch_array($result_alumnos)) {
                    $contador ++?>
                    <tr>
                        <th scope="row"><?php echo $contador?></th>
                        <td><?php echo $alumno['nombre']?></td>
                        <td><?php echo $alumno['ape_paterno']?></td>
                        <td><?php echo $alumno['ape_materno']?></td>
                        
                        <!-- EDIT -->
                        <td class="border-0"> 
                            <a href="update.php?alumno_id=<?php echo $alumno['alumno_id']?>" class="btn btn-primary">
                                <i class="fas fa-marker"></i>
                            </a>

                        <!-- DELETE -->

                            <a href="delete.php?alumno_id=<?php echo $alumno['alumno_id']?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
        
                    </tr>
                <?php }} else{?>
                    <tr>
                        <td class="text-center" colspan="4">
                            <p>No hay alumnos</p>
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
