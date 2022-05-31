<?php 

    include_once("../class/zoologico.class.php");
    include_once("../class/atracciones.class.php");

    $accion = $_SERVER["REQUEST_METHOD"];

    //Datos es un arrat vacio
    //$datos = array();
    
    switch($accion){
        case 'POST':
            // $data = file_get_contents("php://input");
            //$data = json_decode($data,true);

            $data[0] = $_POST; 

            if (isset($_GET['id_atraccion'])) {
                //Caso para que sea un acutalizar
                $id = $_GET['id_atraccion'];
                foreach ($data as $atraccion) {
                    $resultado = $atraccion -> update($id,$atraccion);

                    $status = 200;
                    $mensaje = "Se ha dado de actualizado una atraccion";
                }

            }
            else {
                //Es insercion
                foreach ($data as $atraccion) {
                    $resultado = $atraccion -> create($atraccion);

                    $status = 200;
                    $mensaje = "Se ha dado de alta una atraccion";
                    
                }                
            }


        break;
        
        case 'DELETE':
            if (isset($_GET['$id_atraccion'])) {
                $id_atraccion = $_GET['id_atraccion'];
                $cantidad = $atraccion -> delete($id_atraccion);

                $status = 200;
                $mensaje = "Se ha eliminado con exito ".$cantidad." atraccion";
            }
            else {
                $status = 404;
                $mensaje = "No se ha encontrado el recurso eliminar";
            }
        break;
        
        case 'GET':

        break;              
        
        default:
            if (isset($_GET['$id_atraccion'])) {
                echo "Entre aki";
                die();
                $id_atraccion = $_GET['id_atraccion'];
                $datos = $atraccion -> readOne($id_atraccion);
            }
            else {
                $datos = $atraccion -> read();
                print_r($datos);
                die();
            }
            $status = 200;
            $mensaje = "Se han procredao con exito las atracciones";
        break;
    }
    $zoologico -> json($datos,$status,$mensaje);
?>

