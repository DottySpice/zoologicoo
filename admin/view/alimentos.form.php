<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alimentos</title>
</head>
<body>
    <?php 
        if ($accion=="create") {
            echo '<h1>Nuevo Alimento</h1>';
        } 
        else {
            echo '<h1>Modificar Alimento</h1>';
        }
    ?>

    <!-- Formulario usado para mandar acciones dependiendo del enviado-->
    <form method="POST" action="alimento.php?accion=<?php echo $accion; ?><?php if($accion=="update") echo "&id=".$id;  ?>" enctype="multipart/form-data">
    
        <label class="form-label">Nombre del alimento: </label>
        <input class="form-control" type="text" value="<?php echo ($accion=="update")? $data["alimento"]:""; ?>" name="data[alimento]"/>
        
        <input class="btn btn-primary" type="submit" value="<?php echo ($accion=="update")?"Actualizar alimento":"Guardar alimento"; ?>" name="data[enviar]"/>

    </form>
</body>
</html>