<?php
    //Se busca el archivo que sera usado para el manejo se consultas
    require_once('../class/familias.class.php');


    require_once('../class/atracciones.class.php');

    //Se asigan variables para las acciones enviadas mediante get, ya que se llama a si mismo para despeglar las opciones
    //en un uso de un switch
    //$validado = $atraccion -> login("18031006@itcelaya.edu.mx", "123");
    $atraccion -> validarRol("Empleado");
    $accion = isset($_GET['accion'])?$_GET['accion']:null;

    //Se obtiene el di mediante get si es el caso
    $id = isset($_GET['id'])?$_GET['id']:null;
    $id = is_numeric($id)?$id:null;

    //Nos traemos un objeto de atracciones para obtener los datos de la tabla atracciones
    $atracciones = $atraccion->read();

    //Se inclue la vista, header (nav bar)
    include('view/header.php');
    
    /*
    $roles =  $atraccion -> roles("18031006@itcelaya.edu.mx");
    $permisos =  $atraccion -> permisos("18031006@itcelaya.edu.mx");
    print_r($roles);
    print_r($permisos);
    echo $atraccion -> validarPermiso("Alimento");
    */
    
    //die();
    

    //Switch usado para determinar que accion sera realizada o llamada
    switch($accion){

        //Caso para crear un nuevo registro
        case 'create':
            
            //If corto para ver si la data exite o no
            $data = isset($_POST['data'])?$_POST['data']:null;

            //Si la data fue enviada mediante 'enviar' se hace la accion, sino se envia al formulario
            if(isset($data["enviar"])){

                //Se llama el metodo crear y se obtiene el resultado de la consulta
                $resultado = $familia->create($data);
                
                if($resultado){
                    //Muesta mensaje de correcto
                    $familia->alerta("familia insertada correctamente","success");
                    $resultado = $familia->read();

                    //Se llama a la ventana con la tabla 
                    include('view/familias.php');
                }else{
                    //Muesta mensaje de error y manda a realizar el registro nueva mente
                    $familia->alerta("Registro no insertado","danger");
                    include('view/familias.form.php');
                }
            }
            else{
                //Se envia al formulario para registrar un nuevo dato
                include("view/familias.form.php");    
            }

        break;
        
        //Caso para borrar un dato
        case 'delete':
            //Se llama la fucnion delete dando como parametro un id
            $resultado =$familia->delete($id);

            //Si el resultado fue exitoso o no
            if($resultado){
                $familia->alerta("Registro borrado exitosamente","success");
            }
            else{
                $familia->alerta("Registro no encontrado","danger");
            }

            //Se leen nuevamente los registros para actualizar la tabla
            $resultado = $familia->read();

            //Se vuelve a llamar nuestra tabla 
            include('view/familias.php');
        break;

        //Caso para actualizar un dato
        case 'update':
            //Se comprueba si el boton es enviado o no
            $data = isset($_POST["data"])?$_POST["data"]:null;

            //Si mi boton si fue presionado entonces actualiza
            if(isset($data["enviar"])){
                if (!is_null($id)) {
                    $resultado = $familia->update($id,$data);
                }
                //Se usa para enviar mensajes pertinentes de ok o no
                if($resultado){
                    //Fue correcto
                    $familia->alerta("familia actualizada correctamente","success");
                    //Leer datos otra vez y mostrar en tabla
                    $resultado = $familia->read();
                    include('view/familias.php');

                }else{
                    //Hubo un error
                    $familia->alerta("Registro no actualizado","danger");
                    //Me redireccion al formulario otra vez
                    include('view/familias.form.php');
                    echo 'ola';
                }
            }
            else {
                //Se compruba si tiene id
                if (!is_null($id)) {
                    
                    //Si tiene id, entonces se obtienen los valores de ese id
                    $resultado = $familia->readOne($id);  
                    
                    if (isset($resultado[0])) {
                        $data = $resultado[0];
                        //Se envia la variable data con los datos de la id, a nuestro formulario
                        include("view/familias.form.php");
                        
                    }
                    else{
                        //Si no se encunetra, entonces, se envia otra vez a la tabla
                        $familia->alerta("Registro no encontrado","danger");
                        $resultado = $familia->read();
                        include("view/familias.php");
                        
                    }
                }
            }
        break;

        case 'read':
        break;
        
        //Caso que sera default, se lanzara la accion para leer todos los registros y seran mostrados
        default:                
            //Se llama el metodo read y se manda a la vista familias
            $resultado = $familia->read();
            include('view/familias.php');
        break;

    }

    //Include para mostrar el pie de pagina
    include('view/footer.php');
?>