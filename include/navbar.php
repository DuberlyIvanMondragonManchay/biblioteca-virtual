<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
  <a class="navbar-brand mr-auto" href="/biblioteca_duberly">biblioteca_duberly</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <!-- LINK HOME -->
        <li class="nav-item">
          <a class="text-white nav-link" href="/biblioteca_duberly">Home</a>
        </li>

        <!-- LINK AUTORES -->
        <li class="nav-item">
          <a class="text-white nav-link" href="/biblioteca_duberly/autores/read.php">Autores</a>
        </li>

        <!-- LINK LIBROS -->
        
          <li class="nav-item dropdown">
            <a href="/biblioteca_duberly/libros/libros.php" class="nav-link dropdown-toggle text-white nav-link" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Libros
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="/biblioteca_duberly/libros/add.php">Nuevo Libro</a></li>
            <li><a class="dropdown-item" href="/biblioteca_duberly/libros/read.php">Ver Libros</a></li>
            <li><a class="dropdown-item" href="/biblioteca_duberly/libros/manage.php">Administrar Libros</a></li>
        </ul>

        </li>
      </ul>

      </ul>
    </div>
  </div>
</nav>
