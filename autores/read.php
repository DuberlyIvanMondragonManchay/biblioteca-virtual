<?php 
include('../include/header.php');
include('../db.php');
include('../DAO/AutorDAO.php');
?>
<div class="container p-4">
    <?php if(isset($_SESSION['message'])){ ?>

    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session_unset();}?>

    <div class="row d-flex">
        <h3 class="text">Autores</h3>
        <div class="col">            
            <table class="table mt-3">
                <thead class="table">
                    <tr>
                        <th class="col">Id</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <?php include('../partials/modal_add_autor.php');?>
                    </tr>
                </thead>
                <tbody>
            <!-- IMPRIMIMOS LOS AUTORES -->
            <?php 
            $autor=new AutorDAO();
            $result_autores = $autor->read();

            if (mysqli_num_rows($result_autores) >=1){
                $contador=0;
                while($autor = mysqli_fetch_array($result_autores)) {
                    $contador ++?>
                    <tr>
                        <th scope="row"><?php echo $contador?></th>
                        <td><?php echo $autor['nombre']?></td>
                        <td><?php echo $autor['ape_paterno']?></td>
                        <td><?php echo $autor['ape_materno']?></td>
                        
                        <!-- EDIT -->
                        <td class="border-0"> 
                            <a href="update.php?autor_id=<?php echo $autor['autor_id']?>" class="btn btn-primary">Edit</a>

                        <!-- DELETE -->

                            <a href="delete.php?autor_id=<?php echo $autor['autor_id']?>" class="btn btn-danger">Delete</a>
                        </td>
        
                    </tr>
                <?php }} else{?>
                    <tr>
                        <td class="text-center" colspan="4">
                            <p>No hay Autores...</p>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('../include/footer.php');?>
