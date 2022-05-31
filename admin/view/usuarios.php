

        <div class="row text-center p-2">
            <h1>Usuarios</h1>
        </div>   
        
        <div class="p-2">
            <!-- Botones que se usara para accion de crear nuevo registro -->
            <!-- se llama a animal.php enviando un valor a la variable 'accion' para el uso de switch -->
            <a class="btn btn-success" href="animal.php?accion=create" role="button"><i class="fa-solid fa-plus"></i></a>
        </div>  

        <div class="row text-center">
            <table class="table p-1 ">
                <thead>
                    <tr>
                        <th scope="col">Numero usuario</th>
                        <th scope="col">Nombre usuario</th>
                        <th scope="col">Familia</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $cont=1; foreach($resultado as $animal):
                    ?>
                    <tr>
                    <th scope="row"><?php echo $cont; $cont++?></th>
                        <td><?php echo $animal["animal"];?></td>
                        <td><?php echo $animal["familia"];?></td>
                        <td>
                            <!-- Botones que se usaran para acciones de borra y actualizar -->
                            <!-- Se envia el 'accion' correspondiente a cada boton -->
                            <a class="btn btn-danger" href="animal.php?accion=delete&id=<?php echo $animal["id_animal"]; ?>" role="button"><i class="fa-solid fa-trash"></i></a>
                            <a class="btn btn-info" href="animal.php?accion=update&id=<?php echo $animal["id_animal"]; ?>" role="button"><i class="fa-solid fa-pen"></i></a>
                            <a class="btn btn-primary" href="animal.php?accion=edit&id=<?php echo $animal["id_animal"]; ?>" role="button"><i class="fa-solid fa-paw"></i></a>
                        </td>
                    </tr>
                    <?php 
                        endforeach;
                    ?>
                </tbody>
            </table>
            <p class="fw-bold text-primary"> <?php echo "Se encontraron ".($cont-1)." Registros"; ?> </p>
        </div>  

        <!----modal starts here--->
        <div id="deleteModal" class="modal fade" role='dialog'>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Delete </h4>
                    </div>
                    <div class="modal-body">
                        <p>Do You Really Want to Delete This ?</p>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <span id= 'deleteButton'></span>
                    </div>
                    
                </div>
            </div>
        </div>
        <!--Modal ends here--->

    