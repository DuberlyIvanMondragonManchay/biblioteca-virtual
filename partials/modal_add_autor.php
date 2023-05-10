<button type="button" class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">+ Autor</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo autor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/biblioteca_duberly/autores/create.php" method="POST">
            <!-- NOMBRE -->
            <div class="form-group mb-3">
                <input class="form-control" name="nombre" type="text" placeholder="Nombre" autofocus required minlength="3">
            </div>
            <!-- APELLIDO PATERNO -->
            <div class="form-group mb-3">
                <input class="form-control" name="ape_paterno" type="text" placeholder="Apellido Paterno" required minlength="3">
            </div>
            <!-- APELLIDO MATERNO -->
            <div class="form-group mb-3">
                <input class="form-control" name="ape_materno" type="text" placeholder="Apellido Materno" autofocus>
            </div>
       
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <!-- BUTTON REGISTRAR -->
        <input type="submit" class="btn btn-primary" name="guardar_autor" value="Guardar">
      </div>

      </form> <!--form -->
    </div>
  </div>
</div>