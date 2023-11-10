<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url("bootstrap/css/bootstrap.min.css")?>">
    <title>Cambiar Contraseña</title>
</head>
<body style="background-color: #DFFFD8;">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="bg-white p-5 rounded-5 text-secondary shadow">
              
              <div class="text-center fs-1 fw-bold">Credenciales <br> actuales</div>
              <!--FORMULARIO-->
              <form action="<?= base_url("Perfil/Cambiar_Contraseña/Procesar")?>" method="post">
    
                <!--Inpout Group (para agg imagen)-->
                <div class="input-group mt-3">
                  <span class="input-group-text bg-white"><img src="<?= base_url("iconos/username.png")?>" style="height: 1rem;"></span>
                  <input class="form-control bg-white" type="email" placeholder="Email" name="Email" maxlength="100" required/>
                </div>
    
                <!--Inpout Group (para agg imagen)-->
                <div class="input-group mt-1">
                  <span class="input-group-text bg-white"><img src="<?= base_url("iconos/password.png")?>" style="height: 1rem;"></span>
                  <input class="form-control bg-white" type="password" placeholder="Contraseña" name="Contraseña" maxlength="30" required/>
                </div>
                <div class="text-center fs-1 fw-bold mt-2">Nueva <br> contraseña</div>
                
                <div class="input-group">
                    <span class="input-group-text bg-white mt-2"><img src="<?= base_url("iconos/password.png")?>" style="height: 1rem;"></span>
                    <input class="form-control bg-white mt-2" type="password" placeholder="Contraseña" name="Contraseña" maxlength="30"required/>
                </div>
                <button type="submit" class="btn btn-primary text-white w-100 mt-4 fw-semibold shadow-sm">Actualizar</button>
              </form>
              </div>
        </div>
    </div>
    <script src="<?=base_url("bootstrap/js/bootstrap.min.js")?>"></script>
</body>
</html>
