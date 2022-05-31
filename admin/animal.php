<?php
    //Se busca el archivo que sera usado para el manejo se consultas
    require_once('../class/animales.class.php');
    require_once('../class/familias.class.php');
    require_once('../class/alimentos.class.php');
    require_once('../class/animales_alimentos.class.php');

    $animal -> validarRol("Empleado");

    //Se asigan variables para las acciones enviadas mediante get, ya que se llama a si mismo para despeglar las opciones
    //en un uso de un switch
    $accion = isset($_GET['accion'])?$_GET['accion']:null;

    //Se obtiene el di mediante get si es el caso
    $id = isset($_GET['id'])?$_GET['id']:null;
    $id = is_numeric($id)?$id:null;

    $consecutivo = isset($_GET['consecutivo'])?$_GET['consecutivo']:null;
    $consecutivo = is_numeric($consecutivo)?$consecutivo:null;

    //Nos traemos un objeto de atracciones para obtener los datos de la tabla atracciones
    $familias = $familia->read();
    $alimentos = $alimento->read();

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
                $resultado = $animal->create($data);
                
                if($resultado){
                    //Muesta mensaje de correcto
                    $animal->alerta("animal insertada correctamente","success");
                    $resultado = $animal->read();

                    //Se llama a la ventana con la tabla 
                    include('view/animales.php');
                }else{
                    //Muesta mensaje de error y manda a realizar el registro nueva mente
                    $animal->alerta("Registro no insertado","danger");
                    include('view/animales.form.php');
                }
            }
            else{
                //Se envia al formulario para registrar un nuevo dato
                include("view/animales.form.php");    
            }

        break;
        
        //Caso para borrar un dato
        case 'delete':
            //Se llama la fucnion delete dando como parametro un id
            $resultado = $animal -> delete($id);

            //Si el resultado fue exitoso o no
            if($resultado){
                $animal->alerta("Registro borrado exitosamente","success");
            }
            else{
                $animal->alerta("Registro no encontrado","danger");
            }

            //Se leen nuevamente los registros para actualizar la tabla
            $resultado = $animal -> read();
             
            include('view/animales.php');
        break;

        //Caso para actualizar un dato
        case 'update':    
            $data = isset($_POST["data"])?$_POST["data"]:null;

            if(isset($data["enviar"])){
                if (!is_null($id)) {
                    $resultado = $animal->update($id,$data);
                }
                
                if($resultado){
                    $animal->alerta("animal actualizada correctamente","success");
                    
                    $resultado = $animal->read();
                    include('view/animales.php');

                }else{
                    
                    $animal->alerta("Registro no actualizado","danger");
                    
                    include('view/animales.form.php');
                }
            }
            else {
                if (!is_null($id)) {
                    
                    //Si tiene id, entonces se obtienen los valores de ese id
                    $resultado = $animal->readOne($id);  
                    $misAlimentos = $animales_alimentos -> read ($id);
                    
                    if (isset($resultado[0])) {
                        $data = $resultado[0];
                        //Se envia la variable data con los datos de la id, a nuestro formulario
                        include("view/animales.form.php");
                        
                    }
                    else{
                        //Si no se encunetra, entonces, se envia otra vez a la tabla
                        $animal->alerta("Registro no encontrado","danger");
                        $resultado = $animal->read();
                        include("view/animales.php");
                        
                    }
                }
            }
        break;

        case 'edit':
            $resultado = $animal -> readOne($id);
            $resultado_detalle = $animal -> read_animal($id);

            include('view/animales_detalles.php');
        break;

        case 'delete_animal':

            if (!is_null($consecutivo) && !is_null($id)) {

                $resultado = $animal -> delete_animal($id, $consecutivo);

                
                if($resultado){
                    $animal -> alerta("Registro borrado exitosamente","success");
                }
                else{
                    $animal -> alerta("Registro no ha sido borrado","danger");
                }

                $resultado = $animal -> readOne($id);
                $resultado_detalle = $animal -> read_animal($id);
                include('view/animales_detalles.php');
            }
        break;

        case 'create_animal':
            if (isset($_POST["data"]["enviar"])) {
                $data = $_POST["data"];
                $resultado = $animal -> create_animal($data, $id);

                if($resultado){
                    $animal -> alerta("Registro agredado exitosamente","success");
                }
                else{
                    $animal -> alerta("Registro no ha sido borrado","danger");
                    $resultado = $animal -> readOne($id);
                    $resultado_detalle = $animal -> read_animal($id);
                    include('view/animales_detalles.form.php');
                }
            }
            else{
                $resultado = $animal -> readOne($id);
                $resultado_detalle = $animal -> read_animal($id);
                include('view/animales_detalles.form.php');
            }

        break;
        
        //Caso que sera default, se lanzara la accion para leer todos los registros y seran mostrados
        default:                
            //Se llama el metodo read y se manda a la vista animales
            $resultado = $animal->read();
            include('view/animales.php');
        break;

    }

    //Include para mostrar el pie de pagina
    include('view/footer.php');
?>