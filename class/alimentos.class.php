<?php 
    //Se llama nuestra clase para el uso de la base de datos
    require_once('zoologico.class.php');

    //Se crea la clase alimentos junto a sus funciones principales
    class Alimentos extends Zoologico{

        //En cada funcion se ejecuta la consulta y se obtiene el resultado de la consulta
        //Funcion para leer todos los datos de la tabla alimento
        public function read(){
            $consulta = $this->db->prepare("SELECT * from alimento");    
            $consulta ->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
        
        //Funcion para leer un solo registro mediante un parametro de id
        public function readOne($id){

            $consulta = $this->db->prepare("SELECT * from alimento where id_alimento=:id_alimento");    
            $consulta->bindParam(':id_alimento', $id, PDO::PARAM_INT);
            $consulta ->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }

        //Funcion para borrar un registro en especifico mediante la obtencion de un parametro id
        public function delete($id){

            $consulta = $this->db->prepare("DELETE from alimento where id_alimento=:id_alimento");
            $consulta->bindParam(':id_alimento', $id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->rowCount();
            return $resultado;
        }   

        //Funcion para crear una nuevo registro mediante la obtencion de un array de datos con los datos a ingresar
        public function create($data){

            $resultado = null;
            //$foto = $this -> cargarImagen("alimento");
            //if ($foto) {
            $consulta = $this->db->prepare("INSERT INTO alimento(alimento) 
            values (:alimento)");

            $consulta->bindParam(':alimento', $data['alimento'], PDO::PARAM_STR);
            //$consulta->bindParam(':foto', $foto, PDO::PARAM_STR);
            $consulta->execute();
            $resultado = $consulta->rowCount();
            //}
            return $resultado;
        }

        //Funcion para actualizar un registro dando como parametros el id especifico y el grupo de datos enviandos mediante un array de datos
        public function update($id,$data){

            /*$foto = $this -> cargarImagen("alimento");
            if ($foto) {
                $consulta = $this->db->prepare("UPDATE alimento 
                SET alimento=:alimento,latitud=:latitud,longitud=:longitud,descripcion=:descripcion,foto=:foto 
                WHERE id_alimento=:id_alimento");
            }
            else { */
            $consulta = $this->db->prepare("UPDATE alimento 
            SET alimento=:alimento
            WHERE id_alimento=:id_alimento");
            //}

            $consulta->bindParam(':alimento', $data['alimento'], PDO::PARAM_STR);
            $consulta->bindParam(':id_alimento', $id, PDO::PARAM_INT);

            /*if ($foto) {
                $consulta->bindParam(':foto', $foto, PDO::PARAM_STR);
            } */

            $consulta->execute();
            $resultado = $consulta->rowCount();
            return $resultado;
        }
    }
    //Se crea el uso de objeto de nuestra clase alimentos para usar en llamadas de metodos de la misma clase
    $alimento = new Alimentos;

    //Se establece la conexion con la base de datos para posteriormente usar alguna funcion de ejecuccion
    $alimento->conexion();
?>