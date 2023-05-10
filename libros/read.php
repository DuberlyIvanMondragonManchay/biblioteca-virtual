<?php include('../include/header.php');
include('../db.php');
include('../DAO/LibroDAO.php');
include('../DAO/AutorDAO.php');

?>

<div class="container pt-3">
    <!-- IMPRIMIMOS LOS LIBROS -->
    <div class="gap-3 d-flex flex-wrap">
    <?php 
        $libro=new LibroDAO();
        $result_libros=$libro->read();
            
        if (mysqli_num_rows($result_libros) >=1){
            
            while($libro = mysqli_fetch_array($result_libros)) {?>
                <div class="card m-auto m-md-0" style="width: 18rem;">
                    <div class="p-5 overflow-hidden" style="height: 250px;">
                        <img style="max-width: 300px;" class="card-img-top" src="../<?php echo $libro['imagen']?>" alt="Card image cap">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $libro['titulo']?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <b>Editorial: </b> <?php echo $libro['editorial']?></li>
                        <li class="list-group-item"> <b>Autor: </b> <?php echo $libro['nombre']?> <a href="/biblioteca_duberly/autores/read.php">+info</a></li>
                        <li class="list-group-item"><b>Especialidad: </b> <?php echo $libro['especialidad']?></li>
                    </ul>
                    <div class="card-body">
                        <a target="_blank" href=<?php echo $libro['url']?> class="btn btn-info card-link">Leer libro</a>
                    </div>
                </div>
                
            <?php }} else{?>

                    <p>No hay Libros...</p>
            <?php }?>
        </div>
            <!-- DESCONECTAR LA BASE DE DATOS -->
        <?php desconectar(conectar())?>
    </div>
<?php include('../include/footer.php');?>
