<?php

//
require_once("configuracion.php");
session_start();

//Codigo para poder realizar una conexion a nuestra base de datos
class Zoologico{

    var $db = null; 
    var $foto = null;

    //Funcion que sera usada para realizar la conexcion
    public function conexion(){

        //Las variables que se requieren para la conexcion
        $tipo = 'mysql';
        $host = 'localhost';
        $db_nombre = 'zoologico';
        $usuario = 'zoologico';
        $contrasena = '1234';

        $dsn = SGBD.':dbname='.BD_NAME.';host='.BD_HOST;

        $this->db = new PDO($dsn,$usuario,$contrasena);

    }

    //Metodo que sera usado para cargar una imagen asigandole una carpeta en especifico mediante un ruta
    public function cargarImagen($carpeta){
        if (isset($_FILES["foto"])) {

            $foto = $_FILES["foto"];

            if ($foto["error"] == 0) { 
                if (in_array($foto["type"],IMG)) {
                    if ($foto["size"] <= IMG_SIZE) {
                        $origen = $foto["tmp_name"];

                        $num = random_int(1 , 100);
        
                        $destino = PATH."images/".$carpeta."/".$num."_".$foto["name"];
        
                        //Se comprueba la accion de la imagen, regresa un true o false
                        if (move_uploaded_file($origen,$destino)) {
                            //Cuando si carga la imagen y carga la ruta completa
                            return "images/".$carpeta."/".$num."_".$foto["name"];
                        }
                    }
                }
            }
        }   
        return false;
    }

    //Funcion login
    //Funcion para validar combinacion usuario,contaseña
    //@param string correo;
    //@param string contrasena_plana;
    //@return boolean;
    public function login($correo, $contrasena){

        $contrasena = md5($contrasena);

        if ($this -> validarCorreo($correo)) {
        
            $consulta = $this -> db -> prepare("SELECT * FROM usuario 
            WHERE correo=:correo AND contrasena=:contrasena");  

            $consulta -> bindParam(':correo', $correo, PDO::PARAM_STR);
            $consulta -> bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

            $consulta -> execute();
            $resultado = $consulta -> fetch(PDO::FETCH_ASSOC);


            if (isset($resultado["correo"])) {
                $_SESSION["validado"] =  true;
                $_SESSION["correo"] =  $correo;
                $_SESSION["roles"] =  $this -> roles($correo);
                $_SESSION["permisos"] = $this -> permisos($correo);
                return true;
            }
        }
        $this -> logOut();
        return false;
    }

    public function recuperar($correo){
        require '../../vendor/autoload.php';

        $sql='SELECT correo from usuario where correo=:correo';

        $recupera= $this -> db -> prepare($sql);
        $recupera->bindParam(':correo',$correo, PDO::PARAM_STR);
        $recupera->execute();

        $recuperado= $recupera -> fetchAll(PDO::FETCH_ASSOC);

        if($recuperado[0]['correo']){

            $token=substr(md5(md5($correo.random_int(1,100000).'golden'.md5(random_int(1,500))).soundex('uculele')),0,16);

            $sql='update usuario set token=:token where correo=:correo';
            $update=$this->db->prepare($sql);

            $update->bindParam(':correo',$correo, PDO::PARAM_STR);
            $update->bindParam(':token',$token, PDO::PARAM_STR);
            $update->execute();

            $mensaje = "
            <h2>Apreciable usuario presione el siguiente vilculo para reestablecer su contraseña.<h2><br><br><br>
            <a href=\"http://localhost/zoologico_Chido/admin/login.php?accion=restablecer&correo=$correo&token=$token\" target=\"_blank\">Recuperar contraseña</a>
            <br><br>
            Si usted no realizo esta acción por favor ignore este correo y contacte al administrador.
            ";

            echo 'sI';
            echo $correo;
            $this -> send_correo($correo, "Recuperación de contraseña", $mensaje);

            return true;
            
        }
        return false;
        echo 'nO';
    }

    public function send_correo($destinatario,$asunto,$msj){
        require '../../vendor/autoload.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPAuth = true;
        $mail->Username = '18031006@itcelaya.edu.mx';
        $mail->Password = '123Tamarindo';
        $mail->setFrom('18031006@itcelaya.edu.mx', 'Maximiliano');
        $mail->addAddress($destinatario, $destinatario);
        $mail->Subject = $asunto;
        $mail->msgHTML($msj);

        if (!$mail -> send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            return false;
        } else {
            echo 'True';
            return true;
        }
    }

    public function validarToken($correo,$token){
        if($this->validarCorreo($correo) && strlen($token)==16){

            $sql = "SELECT * from usuario where correo=:correo and token=:token";

            $leer=$this->db->prepare($sql);
            $leer->bindParam(':correo',$correo, PDO::PARAM_STR);
            $leer->bindParam(':token',$token, PDO::PARAM_STR);
            $leer->execute();

            $usuario = $leer->fetch(PDO::FETCH_ASSOC);
            if (isset($usuario['correo'])){
                return true;
            }
        }
        return false;
    }

    public function nuevaContrasena($correo,$contrasena,$token){

        $contrasena = md5($contrasena);

        $sql = "UPDATE usuario set contrasena=:contrasena, token=null where correo=:correo and token=:token";

        $cambio=$this->db->prepare($sql);
        $cambio->bindParam(':correo',$correo, PDO::PARAM_STR);
        $cambio->bindParam(':contrasena',$contrasena, PDO::PARAM_STR);
        $cambio->bindParam(':token',$token, PDO::PARAM_STR);
        $cuenta = $cambio->execute();

        return $cuenta;

    }

    public function logOut(){
        if (isset($_SESSION["validado"])) {unset ($_SESSION["validado"]);}
        if (isset($_SESSION["correo"])) {unset ($_SESSION["correo"]);}
        if (isset($_SESSION["roles"])) {unset ($_SESSION["roles"]);}
        if (isset($_SESSION["permisos"])) {unset ($_SESSION["permisos"]);}
        session_destroy();
    }

    public function validateUser(){
        if (isset($_SESSION["validado"])){
            if ($_SESSION["validado"]) {
                return true;
            }
        }
        return false;
    }


    // Funcion para validar expresecion regular
    //@param string correo;
    //@return boolean;
    public function validarCorreo($correo){ 
        if (filter_var($correo,FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        else {
            return false;
        }
    }

    //Funcion para obtener roles del correo electronico
    //@param string correo;
    //@return array; n - cantidad de roles
    public function roles($correo){
        $roles = array();

        $consulta = $this -> db -> prepare("SELECT rol FROM 
        usuario JOIN usuario_rol USING (id_usuario) 
        JOIN rol USING (id_rol)
        WHERE correo=:correo"); 
        
        $consulta -> bindParam(':correo', $correo, PDO::PARAM_STR);

        $consulta -> execute();
        $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);

        if (isset($resultado[0]["rol"])) {
            foreach ($resultado as $r) {
                array_push($roles,$r["rol"]);
            }
        }
        return $roles;
    }


    public function permisos($correo)
    {
        $permisos = array();

        $consulta = $this -> db -> prepare("SELECT permiso FROM 
        usuario JOIN usuario_rol USING (id_usuario) 
        JOIN rol_permiso USING (id_rol)
        JOIN permiso USING (id_permiso)
        WHERE correo=:correo"); 
        
        $consulta -> bindParam(':correo', $correo, PDO::PARAM_STR);

        $consulta -> execute();
        $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);

        if (isset($resultado[0]["permiso"])) {
            foreach ($resultado as $p) {
                array_push($permisos,$p["permiso"]);
            }
        }
        return $permisos;
    }

    //Valida si el usuario tiene el rol
    //@param string permiso;
    //@return boolean;
    public function validarRol($rol){
        //Esta linea sera cambiada
        if ($this -> validateUser()) {
            $roles = $_SESSION["roles"];
            if (!in_array($rol,$roles)) {
                $this -> alertaError("Usted no tiene el rol correspondiente");
            }
        }
        else {
            $this -> alertaError("Usted no es un usuario valido");
        }
    }
    
    public function validarPermiso($permiso){
        //Esta linea sera cambiada
        if ($this -> validateUser()) {
            $permisos = $_SESSION["permisos"];
            if (!in_array($permiso,$permisos)) {
                $this -> alertaError("Usted no tiene el permiso correspondiente");
            }
        }
        else {
            $this -> alertaError("Usted no es un usuario valido");
        }
    }

    public function alertaError($mensaje){
        include_once("view/header_error.php");
        $this -> alerta($mensaje,"danger");
        //$this -> logOut();
        include_once("view/footer.php");
        die();
    }
    //Funcion usada para mostrar mensajes
    public function alerta($mensaje,$tipo){
        include_once("view/mensajes.php");
    }

    function json($datos,$status,$mensaje){
        ob_clean();
        header("Content-Type: application/json; charset=utf-8");
        http_response_code($status);
        array_push($datos, $mensaje);
        $datos = json_encode($datos);
        print_r($datos);
        echo $datos;
    }
}

$zoologico = new Zoologico;
$zoologico -> conexion();
?>