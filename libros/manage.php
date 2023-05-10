<?php include('../include/header.php');
include('../db.php');
include('../DAO/LibroDAO.php')
?>

<div class="pt-3 p-3">
    <?php if(isset($_SESSION['message'])){ ?>

    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session_unset();}?>
    
    <div class="col">            
            <h3 class="">Libros</h3>
            <table class="table mt-3">
                <thead class="table">
                    <tr>
                        <th class="col">Id</th>
                        <th>Imagen</th>
                        <th>Titulo</th>
                        <th>Url</th>
                        <th>Autor</th>
                        <th>Año</th>
                        <th>Especialidad</th>
                        <th>Editorial</th>
                    </tr>
                </thead>
                <tbody>
    <!-- IMPRIMIMOS LOS LIBROS -->
    <?php 
            $libro=new LibroDAO();
            $result_libros = $libro->read();
            
            if (mysqli_num_rows($result_libros) >=1){
               $contador=0;
                while($libro = mysqli_fetch_array($result_libros)) { $contador ++;?>
                    <tr>
                        <th scope="row"><?php echo $contador?></th>
                        <td><div style="max-width: 50px; height: 80px;" class="border verflow-hidden d-flex"><img style="max-width:50px ;" src="../<?php echo $libro['imagen']?>" alt="img-libro"></div> </td>
                        <td><?php echo $libro['titulo']?></td>
                        <td><?php echo $libro['url']?></td>
                        <td><?php echo $libro['nombre']?></td>
                        <td><?php echo $libro['ano']?></td>
                        <td><?php echo $libro['especialidad']?></td>
                        <td><?php echo $libro['editorial']?></td>
                        
                        <!-- EDIT -->
                        <td class="border-0"> 
                            <a href="update.php?libro_id=<?php echo $libro['libro_id']?>" class="btn btn-primary">Edit</a>

                        <!-- DELETE -->

                            <a href="delete.php?libro_id=<?php echo $libro['libro_id']?>" class="btn btn-danger">Delete</a>
                        </td>
        
                    </tr>
                <?php }} else{?>
                    <tr>
                        <td class="text-center" colspan="4">
                            <p>No hay Libros...</p>
                        </td>
                    </tr>
                <?php }?>

            </tbody>
            </table>
    </div>
<?php include('../include/footer.php');?>
