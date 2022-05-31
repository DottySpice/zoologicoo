<?php
    require_once('../class/usuario.class.php');
    $Usuario -> validarRol("Administrador");
    $accion= isset($_GET['accion'])?$_GET['accion']:null;
    $id = isset($_GET['id'])?$_GET['id']:null;
    $id=is_numeric($id)?$id:null;
    $data=isset($_POST['data'])?$_POST['data']:null;
    include('view/header.php');
    
    switch($accion){
        case 'create':
            if (isset($data['enviar'])){
                $usuario = $Usuario->create($data);
                if ($usuario){ 
                    $Usuario->alerta("Usuario insertado correctamente","success");
                    $usuario = $Usuario->read();
                    include("view/usuarios.php");
                }else{
                    $Usuario->alerta("No se insertó el usuario","danger");
                    include("view/usuarios.php");
                }
            }else{
                include("view/usuarios.form.php");
            }
            break;
        case 'delete':
            $usuario = $Usuario->delete($id);
            if ($usuario)
                $Usuario->alerta("Usuario borrado","success");
            else
                $Usuario->alerta("El registro no ha sido borrado","danger");
            $usuario = $Usuario->read();
            include("view/usuarios.php");
            break;
        case 'update':
            if (isset($data['enviar'])){
                if (!is_null($id)){
                    $usuario = $Usuario->update($id, $data);
                    if ($usuario){
                        $Usuario->alerta("Usuario actualizado correctamente","success");
                        $usuario = $Usuario->read();
                        include("view/usuarios.php");
                    }else{
                        $Usuario->alerta("El registro no ha sido actualizado","danger");
                        include("view/usuarios.form.php");
                    }
                }
            }else{
                if (!is_null($id)){
                    $usuario = $Usuario->read_One($id);
                    if (isset($usuario[0])){
                        $data=$usuario[0];
                        include("view/usuarios.form.php");
                    }else{
                        $Usuario->alerta("No existe el permiso","danger");
                        $usuario = $Usuario->read();
                        include("view/usuarios.php");
                    }
                }
            }
            
            break;
        default:
            $usuario = $Usuario->read();
            include('view/usuarios.php');
            break;
                
    }
    include('view/footer.php');
?>