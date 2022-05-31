<?php 
    require_once("../class/zoologico.class.php");
    

    $accion = isset($_GET['accion'])?$_GET['accion']:null;

    include('view/header_sin_menu.php');

    switch ($accion) {
        case 'login':
            
            if (isset($_POST["correo"]) && isset($_POST["contrasena"])) {
                $correo = $_POST["correo"];
                $contrasena = $_POST["contrasena"];
                if ($zoologico -> validarCorreo($correo)) {
                    if ($zoologico -> login($correo, $contrasena)) {
                        //$zoologico -> alerta("Bienvenido al sistema", "success");
                        header("Location: index.php");
                        //Rederijir
                    }
                    else {
                        $zoologico -> alerta("Usuario o contrasena erronea", "danger");
                    }
                }
                else {
                }
            }
            break;

        case 'logout':
                $zoologico -> logOut();
        break;    
        

        case 'olvido':
            if(isset($_POST['correo'])){

                $correo=$_POST['correo'];

                if ($zoologico -> validarCorreo($correo)){

                    if($zoologico -> recuperar($correo)){
                        echo 'Ok';
                    }else{
                        $zoologico->alertaError("Correo electronico no valido");
                    }  
                }else{
                    $zoologico->alertaError("Correo electronico no valido");
                }
            }
            include_once('view/login.olvido.php');
        break;

        case 'restablecer':

            if(isset($_GET['correo']) && isset($_GET['token'])){

                $correo = $_GET['correo'];
                $token =  $_GET['token'];

                if($zoologico -> validarToken($correo,$token)){

                    include_once('view/login.restablecer.php');

                }else{
                   $zoologico -> alertaError("El token a caducado");
                }
            }else{
                $zoologico -> alertaError("Un error grave a ocurrido");
            }
        break;

        case 'nueva':
            if(isset($_GET['correo']) && isset($_POST['token']) && isset($_POST['contrasena'])){

                $correo = $_GET['correo'];
                $contrasena = $_POST['contrasena'];
                $token =  $_POST['token'];

                if($zoologico->validarToken($correo,$token)){
                    if($zoologico->nuevaContrasena($correo,$contrasena,$token)){    

                       $zoologico->alerta("Su contraseña a sido cambiada, por favor inicie sesion","success");
                        include_once('view/login.php');
                    }else{
                        $zoologico -> alertaError("Error al cambiar la contraseña");
                    }
                }else{
                   $zoologico -> alertaError("El token a caducado");
                }
            }else{
                $zoologico -> alertaError("Un error grave a ocurrido");
            }
        break;

        default:
            include("view/login.php");
            break;
    }

    include('view/footer.php');
?>