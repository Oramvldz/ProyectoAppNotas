<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <!-- PONER EL ICONO PROXIMAMENTE <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="<?=base_url("bootstrap/css/bootstrap.min.css")?>">
  </head>
  <body style="background-color: #DFFFD8;">

    <?php if($mensaje==1): ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            Registro exitoso, inicie su sesion
        </div> 
    <?php elseif($mensaje==3):?>
      <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            Inicio de sesion denegado verifique sus credenciales de acceso
        </div> 
    <?php endif; ?>

    <!--Para hacer el cuadro se necesitan 2 divs-->
    <div class="d-flex justify-content-center align-items-center vh-100">
      <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 25rem">

          <div class=" d-flex justify-content-center">
            <img src="<?=base_url("iconos/usuario.png")?>" style="height: 7rem" class="d-flex"/>
          </div>  

          <div class="text-center fs-1 fw-bold">Login</div>
          <!--FORMULARIO-->
          <form action="<?=base_url("/Login/Process")?>" method="post">

            <!--Inpout Group (para agg imagen)-->
            <div class="input-group mt-3">
              <span class="input-group-text bg-white"><img src="<?=base_url("iconos/username.png")?>" style="height: 1rem;"></span>
              <input class="form-control bg-white" type="email" placeholder="Email" name="Email" maxlength="100"required/>
            </div>

            <!--Inpout Group (para agg imagen)-->
            <div class="input-group mt-1">
              <span class="input-group-text bg-white"><img src="<?=base_url("iconos/password.png")?>" style="height: 1rem;"></span>
              <input class="form-control bg-white" type="password" placeholder="Contraseña" name="Contraseña" maxlength="30" required/>
            </div>

            <button type="submit" class="btn btn-primary text-white w-100 mt-4 fw-semibold shadow-sm">Iniciar Sesion</button>

          </form>
      
          <div class="d-flex gap-1 justify-content-center mt-1">
            No tienes una cuenta?
            <a href="<?=base_url("/Registro")?>" class="text-decoration-none text-primary fw-semibold">Registrate</a>
          </div>

      </div>
    </div>
    <script src="<?=base_url("bootstrap/js/bootstrap.min.js")?>"></script>
  </body>
</html>