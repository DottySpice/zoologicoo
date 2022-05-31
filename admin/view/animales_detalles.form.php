<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animales</title>
</head>
<body>
    <div class="row text-center p-2">
        <h1><?php echo $resultado[0]["animal"] ?></h1>
    </div>  

    <form method="POST" action="animal.php?accion=create_animal&id=<?php echo $resultado[0]["id_animal"] ?>">
    
        <label class="form-label">Fecha de Nacimiento: </label>
        <input class="form-control" type="date" pattern="\d{4}-\d{1,2}-\d{1,2}" name="data[nacimiento]"/>

        <label class="form-label">Cantidad: </label>
        <input class="form-control" type="" name="data[cantidad]"/>
        
        <input class="btn btn-primary" type="submit" value="Guardar animal" name="data[enviar]"/>

    </form>

</body>
</html>