<nav style="min-width: 528px;" class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
  <a class="navbar-brand mr-auto" href="/">
    <!-- FUNCIONALIDAD PARA QUE EL TITULO CAMBIE DINAMICAMENTE -->
      <?php
       $page = basename($_SERVER['PHP_SELF'], '.php');
       $directory = basename(dirname($_SERVER['PHP_SELF']));
       if ($directory == 'alumnos') {
         echo 'Alumnos';
       } else if ($directory == 'cursos') {
         echo 'Cursos';
       } else if ($directory == 'matricula') {
         echo 'Matriculas';
       } else {
         echo 'Crud php mysql';
       }
      ?>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <!-- LINK HOME -->
        <li class="nav-item">
          <a class="text-white nav-link" href="/lab06_duberly">Home</a>
        </li>

        <!-- LINK ALUMNOS -->
        <li class="nav-item">
          <a class="text-white nav-link" href="/lab06_duberly/alumnos/alumnos.php">Alumnos</a>
        </li>

        <!-- LINK CURSOS -->
        <li class="nav-item">
          <a class="text-white nav-link" href="/lab06_duberly/cursos/cursos.php">Cursos</a>
        </li>
        
        <!-- LINK MATRICULA -->
        <li class="nav-item">
          <a class="text-white nav-link" href="/lab06_duberly/matricula/matriculas.php">Matriculas</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
