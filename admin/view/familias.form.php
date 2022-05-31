<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>familias</title>
</head>
<body>
    <?php 
        if ($accion=="create") {
            echo '<h1 class="text-center" >Nueva familia</h1>';
        } 
        else {
            echo '<h1 class="text-center" >Modificar familia</h1>';
            echo '<img src="../'.$data["foto"].'" class="card-img-top" alt="...">';
        }
    ?>

    <!-- Formulario usado para mandar acciones dependiendo del enviado-->
    <form method="POST" action="familia.php?accion=<?php echo $accion; ?><?php if($accion=="update") echo "&id=".$id;  ?>" enctype="multipart/form-data">
    
        <label class="form-label">Nombre de la familia: </label>
        <input class="form-control" type="text" value="<?php echo ($accion=="update")? $data["familia"]:""; ?>" name="data[familia]"/>

        <!-- Usamos un select para traer las atracciones para posteriormente ser usadas-->
        <label class="form-label">Atraccion: </label>
        <select class="form-select" name="data[id_atraccion]">
            <?php 
                foreach($atracciones as $atraccion):
            ?>
            <option 
                <?php
                    if(isset($data["id_atraccion"])){ 
                    if($data["id_atraccion"] == $atraccion["id_atraccion"]){ echo "selected"; }} 
                ?> 
                value="<?php echo $atraccion["id_atraccion"] ?>">
                <?php echo $atraccion["atraccion"] ?> 
            </option>
            <?php endforeach;?>
        </select>

        <label class="form-label">Foto: </label>
        <input class="form-control" type="file" value="<?php echo ($accion=="update")? $data["foto"]:""; ?>" name="foto"/>

        <input class="btn btn-primary" type="submit" value="<?php echo ($accion=="update")?"Actualizar familia":"Guardar familia"; ?>" name="data[enviar]"/>

    </form>
</body>
</html>