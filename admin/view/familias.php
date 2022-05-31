

        <div class="row text-center p-2">
            <h1>Familias</h1>
        </div>   
        
        <div class="p-2">
            <!-- Botones que se usara para accion de crear nuevo registro -->
            <!-- se llama a familia.php enviando un valor a la variable 'accion' para el uso de switch -->
            <a class="btn btn-success" href="familia.php?accion=create" role="button"><i class="fa-solid fa-plus"></i></a>
        </div>  

        <div class="row text-center">
            <table class="table p-1 ">
                <thead>
                    <tr>
                        <th scope="col">Numero familia</th>
                        <th scope="col">Nombre familia</th>
                        <th scope="col">Atraccion</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        //Uso de un foreach para poder imprimir cada renglon del resultado obtenido mediante la consulta previa
                        //Se usa : al final para establecer un foreach sin corchetes
                        $cont=1; foreach($resultado as $familia):
                    ?>
                    <tr>
                    <th scope="row"><?php echo $cont; $cont++?></th>
                        <td><?php echo $familia["familia"];?></td>
                        <td><?php echo $familia["atraccion"];?></td>
                        <td>
                            <!-- Botones que se usaran para acciones de borra y actualizar -->
                            <!-- Se envia el 'accion' correspondiente a cada boton -->
                            <a class="btn btn-danger" href="familia.php?accion=delete&id=<?php echo $familia["id_familia"]; ?>" role="button"><i class="fa-solid fa-trash"></i></a>
                            <a class="btn btn-info" href="familia.php?accion=update&id=<?php echo $familia["id_familia"]; ?>" role="button"><i class="fa-solid fa-pen"></i></a>
                        </td>
                    </tr>
                    <?php 
                        //En forecah para terminar el ciclo iniciado arriba
                        endforeach;
                    ?>
                </tbody>
            </table>
            <p class="fw-bold text-primary"> <?php echo "Se encontraron ".($cont-1)." Registros"; ?> </p>
        </div>  

    