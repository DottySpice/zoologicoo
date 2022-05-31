

        <div class="row text-center p-2">
            <h1><?php echo $resultado[0]["animal"] ?></h1>
        </div>   
        
        <div class="p-2">
            <!-- Botones que se usara para accion de crear nuevo registro -->
            <!-- se llama a animal.php enviando un valor a la variable 'accion' para el uso de switch -->
            <a class="btn btn-success" href="animal.php?accion=create_animal&id=<?php echo $resultado[0]["id_animal"]; ?>" role="button"><i class="fa-solid fa-plus"></i></a>
        </div>  

        <div class="row text-center">
            <table class="table p-1 ">
                <thead>
                    <tr>
                        <th scope="col">Numero animal</th>
                        <th scope="col">Nacimiento</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $cont=1; foreach($resultado_detalle as $animal_detalle):
                    ?>
                    <tr>
                    <th scope="row"><?php echo $cont; $cont++?></th>
                        <td><?php echo $animal_detalle["nacimiento"];?></td>
                        <td><?php echo $animal_detalle["cantidad"];?></td>
                        <td>
                            <!-- Botones que se usaran para acciones de borra y actualizar -->
                            <!-- Se envia el 'accion' correspondiente a cada boton -->
                            <a class="btn btn-danger" href="animal.php?accion=delete_animal&id=<?php echo $resultado[0]["id_animal"]; ?>&consecutivo=<?php echo $animal_detalle["consecutivo"]; ?>" 
                            role="button"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php 
                        endforeach;
                    ?>
                </tbody>
            </table>
            <p class="fw-bold text-primary"> <?php echo "Se encontraron ".($cont-1)." Registros"; ?> </p>
        </div>  

    