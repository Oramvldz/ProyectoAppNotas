<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">-->
    <link rel="stylesheet" href="<?=base_url("bootstrap/css/bootstrap.min.css")?>">
    <title>Perfil</title>
</head>

<?php if($mensaje==4): ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            Actualizacion realizada con exito
        </div> 
    <?php elseif($mensaje==5):?>
      <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            Actualizacion no realizada verifique sus credenciales
        </div> 
    <?php endif; ?>

<body style="background-color: #DFFFD8;">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="bg-white p-5 rounded-5 text-secondary shadow">

            <div class="input-group">
                <span class="input-group-text bg-white"><img src="iconos/username.png" style="height: 1rem;"></span>
                <input type="text" class="form-control" name="Nombres" value="<?php echo ($Usuario['Nombres']);?>" disabled>
            </div>

            <div class="input-group">
                <span class="input-group-text bg-white mt-2"><img src="iconos/username.png" style="height: 1rem;"></span>
                <input type="text" class="form-control mt-2" name="Apellidos" value="<?php echo ($Usuario['Apellidos']);?>" disabled>
            </div>
            
            <div class="input-group">
                <span class="input-group-text bg-white mt-2"><img src="iconos/username.png" style="height: 1rem;"></span>
                <input type="email" name="Email" value="<?php echo($Usuario['Email'] )?>" class=" form-control mt-2" disabled>
            </div>


            <div class=" d-flex justify-content-center">
                <a href="<?= base_url("/Perfil/Cambiar_Email")?>"class="btn btn-primary mt-2">Cambiar Email</a>
                <a href="<?= base_url("/Perfil/Cambiar_Contraseña")?>"class="btn btn-primary mt-2 ms-2">Cambiar Contraseña</a>
            </div>
        </div>
    </div>
    <script src="<?=base_url("bootstrap/js/bootstrap.min.js")?>"></script>
</body>
</html>