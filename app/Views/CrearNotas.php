<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url("bootstrap/css/bootstrap.min.css")?>">
    <title>Crear Notas</title>
</head>
<body style="background-color: #E1F2FB;">

<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
  <div class="container-fluid">
    <!--img-->
    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
    </svg>
    <a class="navbar-brand" href="<?=base_url("/MisNotas")?>">MisNotas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=base_url("/Perfil")?>">Perfil</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="navbar-item">
        <a class="nav-link active" aria-current="page" href="<?=base_url("/CerrarSesion/Process")?>">Cerrar sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container mt-3">
        <form action="<?= base_url("/MisNotas/CrearNota/Process")?>" method="post">
            
            <div class="input-group">
                <span class="input-group-text bg-white">Titulo</span>
                <input class="form-control" type="text" placeholder="Titulo" name="Titulo" maxlength="100" required>
            </div>

            <textarea class="form-control mt-3" name="Contenido" cols="30" rows="10" placeholder="Contenido" maxlength="1000" required></textarea>
            <div class="d-flex align-items-center">
                <button class="btn btn-primary ms-2 mt-3 w-100" type="submit">Ingresar contenido</button>      
            </div>      
        </form>
    </div>
    <script src="<?=base_url("bootstrap/js/bootstrap.min.js")?>"></script>
</body>
</html>