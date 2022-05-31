<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animales</title>
</head>
<body>
    <?php 
        if ($accion=="create") {
            echo '<h1 class="text-center" >Nueva animal</h1>';
        } 
        else {
            echo '<h1 class="text-center" >Modificar animal</h1>';
        }
    ?>

    <!-- Formulario usado para mandar acciones dependiendo del enviado-->
    <form method="POST" action="animal.php?accion=<?php echo $accion; ?><?php if($accion=="update") echo "&id=".$id;  ?>" enctype="multipart/form-data">
    
        <label class="form-label">Nombre de la animal: </label>
        <input class="form-control" type="text" value="<?php echo ($accion=="update")? $data["animal"]:""; ?>" name="data[animal]"/>

        <!-- Usamos un select para traer las atracciones para posteriormente ser usadas-->
        <label class="form-label">Atraccion: </label>
        <select class="form-select" name="data[id_familia]">
            <?php 
                foreach($familias as $familia):
            ?>
            <option 
                <?php
                    if(isset($data["id_familia"])){ 
                    if($data["id_familia"] == $familia["id_familia"]){ echo "selected"; }} 
                ?> 
                value="<?php echo $familia["id_familia"] ?>">
                <?php echo $familia["familia"] ?> 
            </option>
            <?php endforeach;?>
        </select>
        <div class="p-2 ">
            <h3>Escoge el tipo de alimento</h3>
        </div>
        
        <?php 
            foreach($alimentos as $alimento):
        ?>
        <div class="form-check">
            
            <input 
            <?php 
                if (isset($misAlimentos)) {
                    if (in_array($alimento['id_alimento'],$misAlimentos)) {
                        echo "checked ";
                    } 
                }
            ?>
            class="form-check-input" type="checkbox" name="alimento[<?php echo $alimento['id_alimento']?>]" >
            <label class="form-check-label" for="flexCheckDefault">
                <?php echo $alimento['alimento']; ?>
            </label>
        </div>

        <?php endforeach;?>


        <input class="btn btn-primary" type="submit" value="<?php echo ($accion=="update")?"Actualizar animal":"Guardar animal"; ?>" name="data[enviar]"/>

    </form>
</body>
</html>