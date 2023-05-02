<?php include('../db.php')?>
<div class="container p-4">
    
    <?php if(isset($_SESSION['message'])){ ?>

    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session_unset();}?>

    <div class="row d-flex flex-column">
        <div class="col col-md-6 col-lg-6 col-sm-12 col-12 mb-5 mx-auto">

            <div class="card card-body">
                <form action="create.php" method="POST">

                    <!-- SELECCIONAR CURSO -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Curso</label>
                        <select class="form-select" id="inputGroupSelect01" name="curso_id">
                            <option selected>Seleccionar...</option>
                            <!-- LISTAR CURSOS -->
                        <?php 
                            $query_cursos = 'SELECT curso_id,nombre_curso FROM CURSOS';
                            $result_cursos = mysqli_query(conectar(),$query_cursos);
                            
                            if (mysqli_num_rows($result_cursos) >=1){
                                while($curso = mysqli_fetch_array($result_cursos)) {?>
                                    <option value=<?php echo $curso['curso_id']?>><?php echo $curso['nombre_curso']?></option>

                            <?php }} else{?>
                                <option>No hay Cursos</option>
                        <?php }?>
                        </select>
                    </div>

                    <!-- SELECCIONAR ALUMNO -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">Alumno</label>
                        <select class="form-select" id="inputGroupSelect01" name="alumno_id">
                            <option selected>Seleccionar...</option>
                            <!-- LISTAR ALUMNOS -->
                        <?php 
                            $query_alumnos = 'SELECT alumno_id,nombre FROM ALUMNOS';
                            $result_alumnos = mysqli_query(conectar(),$query_alumnos);
                            
                            if (mysqli_num_rows($result_alumnos) >=1){
                                while($alumno = mysqli_fetch_array($result_alumnos)) {?>
                                    <option value=<?php echo $alumno['alumno_id']?>><?php echo $alumno['nombre']?></option>

                            <?php }} else{?>
                                <option>No hay Alumnos</option>
                        <?php }?>
                        </select>
                    </div>
                    
                    <!-- BUTTON REGISTRAR -->
                    <div class="text-center form-group">
                        <input type="submit" class="btn btn-primary col-6" name="generar_matricula" value="Generar Matricula">
                    </div>
                </form>
            </div>
        </div>
        <!-- ------------------IMPRIMIR DATOS------------------ -->
        <div class="col">
            <table class="table text-white">
                <thead>
                    <tr>
                        <th class="col">Id</th>
                        <th>Nombre Alumno</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombre del Curso</th>
                        <th>Creditos</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $query_matricula = 'SELECT M.matricula_id, A.nombre, A.ape_paterno, A.ape_materno, C.nombre_curso, C.creditos
                                    FROM MATRICULAS AS M
                                    INNER JOIN ALUMNOS AS A ON M.alumno_id = A.alumno_id
                                    INNER JOIN CURSOS AS C ON M.curso_id = C.curso_id';

                $result_matricula = mysqli_query(conectar(), $query_matricula);
                
                if (mysqli_num_rows($result_matricula) >= 1){
                    $contador=0;
                    while($matricula = mysqli_fetch_array($result_matricula)) {
                        $contador ++;?>
                        <tr>
                            <td><?php echo $contador?></td>
                            <td><?php echo $matricula['nombre']?></td>
                            <td><?php echo $matricula['ape_paterno']?></td>
                            <td><?php echo $matricula['ape_materno']?></td>
                            <td><?php echo $matricula['nombre_curso']?></td>
                            <td><?php echo $matricula['creditos']?></td>

                             <!-- EDIT -->
                            <td class="border-0"> 
                                <a href="update.php?matricula_id=<?php echo $matricula['matricula_id']?>" class="btn btn-primary">
                                    <i class="fas fa-marker"></i>
                                </a>
                            <!-- DELETE -->
                                <a href="delete.php?matricula_id=<?php echo $matricula['matricula_id']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                <?php }} else{?>
                    <tr>
                        <td class="text-center" colspan="6">
                            <p>No hay matrículas</p>
                        </td>
                    </tr>
                <?php }?>
                </tbody>

            <!-- DESCONECTAR LA BASE DE DATOS -->
            <?php desconectar(conectar())?>

            </tbody>
            </table>
        </div>
    </div>
</div>
