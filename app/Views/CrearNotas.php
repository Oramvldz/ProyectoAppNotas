<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=base_url("bootstrap/css/bootstrap.min.css")?>">
    <title>Crear Notas</title>
</head>
<body style="background-color: #DFFFD8;">

    <div class="container mt-3">
        <form action="<?= base_url("/Notas/CrearNota/Procesar")?>" method="post">
            
            <div class="input-group">
                <span class="input-group-text bg-white">Titulo</span>
                <input class="form-control" type="text" placeholder="Titulo" name="Titulo" maxlength="100" required>
            </div>

            <textarea class="form-control mt-3" name="Contenido" cols="30" rows="10" placeholder="Contenido" maxlength="1000" required></textarea>
            <div class="d-flex align-items-center">
                <button class="btn btn-primary mt-3 w-100" type="submit" name="Evento_Cancelar">Cancelar </button>
                <button class="btn btn-primary ms-2 mt-3 w-100" type="submit">Ingresar contenido</button>      
            </div>      
        </form>
    </div>
    <script src="<?=base_url("bootstrap/js/bootstrap.min.js")?>"></script>
</body>
</html>