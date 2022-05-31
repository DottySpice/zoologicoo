<div id="medio" class="row">
    <div class="col">
       <h1 class="text-center">Roles</h1>
        <a class="btn btn-success" href="rol.php?accion=create" role="button">Agregar</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Renglón</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                        $cont=1;
                        foreach($rol as $roles):
                        ?>
                <tr>
                    <th scope="row"><?php echo $cont; $cont++?></th>
                    <td><?php echo $roles['rol'] ?></td>
                    <td><a class="btn btn-danger" href="rol.php?accion=delete&id=<?php echo $roles['id_rol']; ?> " role="button">Borrar</a>
                    <a class="btn btn-success" href="rol.php?accion=update&id=<?php echo $roles['id_rol']; ?> " role="button">Modificar</a></td>
                </tr>
                <?php
                    
                            endforeach;
                        ?>
            </tbody>
        </table>
        
    </div>