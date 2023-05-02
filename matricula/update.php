<?php
include('../db.php');
include('../include/header.php');

if (isset($_POST['editar_matricula'])){
    $newCurso_id = $_POST['curso_id'];
    $newAlumno_id = $_POST['alumno_id'];

    $update_query = "UPDATE MATRICULAS SET curso_id = '$newCurso_id',alumno_id = '$newAlumno_id' WHERE matricula_id =". $_GET['matricula_id'];

    $new_result=mysqli_query(conectar(),$update_query);
    if(!$new_result){
        die('Error al actualizar Matricula');
    }

    $_SESSION['message'] = 'Matricula actualizada correctamente';
    $_SESSION['message_type'] = 'success';

    header('location:matriculas.php');
}
?>

<div class="container p-4">
    <div class="row">
        <div class="col col-md-6 col-lg-6 col-sm-12 col-12 mb-5 mx-auto">

            <div class="card card-body">

                <form action="update.php?matricula_id=<?php echo $_GET['matricula_id'];?>" method="POST">

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
                    
                    <!-- BUTTON EDITAR -->
                    <div class="form-group mb-3 d-flex justify-content-center flex-wrap gap-2">
                        <a href="matriculas.php"><input type="button" class="btn btn-primary " value="Cancelar"></a>
                        <input type="submit" class="btn btn-success" name="editar_matricula" value="Guardar Cambios">
                    </div> 
                </form>
            </div>
        </div>

            <!-- DESCONECTAR LA BASE DE DATOS -->
            <?php desconectar(conectar())?>

            </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('../include/footer.php')?>