<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
     <!-- PONER EL ICONO PROXIMAMENTE <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="<?=base_url("bootstrap/css/bootstrap.min.css")?>">
</head>
<body style="background-color: #E1F2FB;">
    <!--Para hacer el cuadro se necesitan 2 divs-->

    <?php if($mensaje==2):?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            Ya esta registrado ese correo, intentelo de nuevo
        </div>
    <?php endif; ?>


    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 25rem">

            <h1 class="text-center text-secondary">Registro </h1>
            <!--FORMULARIO-->
            <form action="<?=base_url("/Registro/Process") ?>" method="post">
                    
                <div class="input-group mt-3">
                    <span class="input-group-text bg-white"><img src="<?=base_url("iconos/username.png")?>" style="height: 1rem;"></span>
                    <input class="form-control" type="email" placeholder="Email" name="Email" maxlength="100" required >   
                </div>

                <div class="input-group mt-2">
                    <span class="input-group-text bg-white"><img src="<?=base_url("iconos/password.png")?>" style="height: 1rem;"></span>
                    <input type="password" name="Contraseña" class="form-control " placeholder="Contraseña" maxlength="30" required>   
                </div> 

                <div class="input-group mt-2">
                    <span class="input-group-text bg-white"><img src="<?=base_url("iconos/informacion.png")?>" style="height: 1rem;"></span>
                    <input class="form-control " type="text" id="Nombres" placeholder="Nombres" name="Nombres" maxlength="50" required>
                </div>

                <div class="input-group mt-2">
                    <span class="input-group-text bg-white"><img src="<?=base_url("iconos/informacion.png")?>" style="height: 1rem;"></span>
                    <input class="form-control " type="text" id="Apellidos" placeholder="Apellidos" name="Apellidos" maxlength="50" required>
                </div>
                    <button class="btn btn-primary mt-4 w-100 fw-semibold" type="submit">Registrate</button>
            </form>
        </div>
    </div>   
    <script src="<?=base_url("bootstrap/js/bootstrap.min.js")?>"></script>            
</body>
</html>