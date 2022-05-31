<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atracciones</title>
</head>
<body>
    <?php 
        if ($accion=="create") {
            echo '<h1>Nueva atracción</h1>';
        } 
        else {
            echo '<h1>Modificar atracción</h1>';
            echo '<img src="../'.$data["foto"].'" class="card-img-top" alt="...">';
        }
    ?>

    <!-- Formulario usado para mandar acciones dependiendo del enviado-->
    <form method="POST" action="atraccion.php?accion=<?php echo $accion; ?><?php if($accion=="update") echo "&id=".$id;  ?>" enctype="multipart/form-data">
    
        <label class="form-label">Nombre de la atracción: </label>
        <input class="form-control" type="text" value="<?php echo ($accion=="update")? $data["atraccion"]:""; ?>" name="data[atraccion]"/>

        <label class="form-label">Descripción: </label>
        <textarea class="form-control" name="data[descripcion]" id="" cols="30" rows="10"><?php echo ($accion=="update")? $data["descripcion"]:""; ?></textarea>

        <label class="form-label">Latitud: </label>
        <input class="form-control" type="text" value="<?php echo ($accion=="update")? $data["latitud"]:""; ?>" name="data[latitud]"/>
        
        <label class="form-label">Longitud: </label>
        <input class="form-control" type="text" value="<?php echo ($accion=="update")? $data["longitud"]:""; ?>" name="data[longitud]"/>

        <label class="form-label">Foto: </label>
        <input class="form-control" type="file" value="<?php echo ($accion=="update")? $data["foto"]:""; ?>" name="foto"/>

        <input class="btn btn-primary" type="submit" value="<?php echo ($accion=="update")?"Actualizar atraccion":"Guardar atraccion"; ?>" name="data[enviar]"/>

    </form>
</body>
</html>