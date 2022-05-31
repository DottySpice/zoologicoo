<?php
    //Se busca el archivo que sera usado para el manejo se consultas
    require_once('../class/alimentos.class.php');

    $alimento -> validarRol("Empleado");
    //Se asigan variables para las acciones enviadas mediante get, ya que se llama a si mismo para despeglar las opciones
    //en un uso de un switch
    $accion = isset($_GET['accion'])?$_GET['accion']:null;

    //Se obtiene el di mediante get si es el caso
    $id = isset($_GET['id'])?$_GET['id']:null;
    $id = is_numeric($id)?$id:null;

    //Se inclue la vista, header (nav bar)
    include('view/header.php');

    //Switch usado para determinar que accion sera realizada o llamada
    switch($accion){

        //Caso para crear un nuevo registro
        case 'create':
            
            //If corto para ver si la data exite o no
            $data = isset($_POST['data'])?$_POST['data']:null;

            //Si la data fue enviada mediante 'enviar' se hace la accion, sino se envia al formulario
            if(isset($data["enviar"])){

                //Se llama el metodo crear y se obtiene el resultado de la consulta
                $resultado = $alimento->create($data);
                
                if($resultado){
                    //Muesta mensaje de correcto
                    $alimento->alerta("alimento insertada correctamente","success");
                    $resultado = $alimento->read();

                    //Se llama a la ventana con la tabla 
                    include('view/alimentos.php');
                }else{
                    //Muesta mensaje de error y manda a realizar el registro nueva mente
                    $alimento->alerta("Registro no insertado","danger");
                    include('view/alimentos.form.php');
                }
            }
            else{
                //Se envia al formulario para registrar un nuevo dato
                include("view/alimentos.form.php");    
            }

        break;
        
        //Caso para borrar un dato
        case 'delete':
            //Se llama la fucnion delete dando como parametro un id
            $resultado =$alimento->delete($id);

            //Si el resultado fue exitoso o no
            if($resultado){
                $alimento->alerta("Registro borrado exitosamente","success");
            }
            else{
                $alimento->alerta("Registro no encontrado","danger");
            }

            //Se leen nuevamente los registros para actualizar la tabla
            $resultado = $alimento->read();

            //Se vuelve a llamar nuestra tabla 
            include('view/alimentos.php');
        break;

        //Caso para actualizar un dato
        case 'update':
            //Se comprueba si el boton es enviado o no
            $data = isset($_POST["data"])?$_POST["data"]:null;

            //Si mi boton si fue presionado entonces actualiza
            if(isset($data["enviar"])){
                if (!is_null($id)) {
                    $resultado = $alimento->update($id,$data);
                }
                //Se usa para enviar mensajes pertinentes de ok o no
                if($resultado){
                    //Fue correcto
                    $alimento->alerta("alimento actualizada correctamente","success");
                    //Leer datos otra vez y mostrar en tabla
                    $resultado = $alimento->read();
                    include('view/alimentos.php');

                }else{
                    //Hubo un error
                    $alimento->alerta("Registro no actualizado","danger");
                    //Me redireccion al formulario otra vez
                    include('view/alimentos.form.php');
                    echo 'ola';
                }
            }
            else {
                //Se compruba si tiene id
                if (!is_null($id)) {
                    
                    //Si tiene id, entonces se obtienen los valores de ese id
                    $resultado = $alimento->readOne($id);  
                    
                    if (isset($resultado[0])) {
                        $data = $resultado[0];
                        //Se envia la variable data con los datos de la id, a nuestro formulario
                        include("view/alimentos.form.php");
                        
                    }
                    else{
                        //Si no se encunetra, entonces, se envia otra vez a la tabla
                        $alimento->alerta("Registro no encontrado","danger");
                        $resultado = $alimento->read();
                        include("view/alimentos.php");
                        
                    }
                }
            }
        break;

        case 'read':
        break;
        
        //Caso que sera default, se lanzara la accion para leer todos los registros y seran mostrados
        default:                
            //Se llama el metodo read y se manda a la vista alimentos
            $resultado = $alimento->read();
            include('view/alimentos.php');
        break;

    }

    //Include para mostrar el pie de pagina
    include('view/footer.php');
?>