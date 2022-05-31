<?php 
    //Se llama nuestra clase para el uso de la base de datos
    require_once('zoologico.class.php');

    //Se crea la clase atracciones junto a sus funciones principales
    class Atracciones extends Zoologico{

        //En cada funcion se ejecuta la consulta y se obtiene el resultado de la consulta
        //Funcion para leer todos los datos de la tabla atraccion
        public function read(){
            $consulta = $this->db->prepare("SELECT * from atraccion");    
            $consulta ->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
        
        //Funcion para leer un solo registro mediante un parametro de id
        public function readOne($id){

            $consulta = $this->db->prepare("SELECT * from atraccion where id_atraccion=:id_atraccion");    
            $consulta->bindParam(':id_atraccion', $id, PDO::PARAM_INT);
            $consulta ->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }

        //Funcion para borrar un registro en especifico mediante la obtencion de un parametro id
        public function delete($id){

            $consulta = $this->db->prepare("DELETE from atraccion where id_atraccion=:id_atraccion");
            $consulta->bindParam(':id_atraccion', $id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->rowCount();
            return $resultado;
        }   

        //Funcion para crear una nuevo registro mediante la obtencion de un array de datos con los datos a ingresar
        public function create($data,$foto=false){

            $resultado = null;
            $foto = $this -> cargarImagen("atraccion");
            if ($foto) {
                $consulta = $this->db->prepare("INSERT INTO atraccion(atraccion,latitud,longitud,descripcion,foto) 
                values (:atraccion,:latitud,:longitud,:descripcion,:foto)");
    
                $consulta->bindParam(':atraccion', $data['atraccion'], PDO::PARAM_STR);
                $consulta->bindParam(':latitud', $data['latitud'], PDO::PARAM_STR);
                $consulta->bindParam(':longitud', $data['longitud'], PDO::PARAM_STR);
                $consulta->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
                $consulta->bindParam(':foto', $foto, PDO::PARAM_STR);
                $consulta->execute();
                $resultado = $consulta->rowCount();
            }
            return $resultado;
        }

        //Funcion para actualizar un registro dando como parametros el id especifico y el grupo de datos enviandos mediante un array de datos
        public function update($id,$data){

            $foto = $this -> cargarImagen("atraccion");
            if ($foto) {
                $consulta = $this->db->prepare("UPDATE atraccion 
                SET atraccion=:atraccion,latitud=:latitud,longitud=:longitud,descripcion=:descripcion,foto=:foto 
                WHERE id_atraccion=:id_atraccion");
            }
            else {
                $consulta = $this->db->prepare("UPDATE atraccion 
                SET atraccion=:atraccion,latitud=:latitud,longitud=:longitud,descripcion=:descripcion 
                WHERE id_atraccion=:id_atraccion");
            }

            $consulta->bindParam(':atraccion', $data['atraccion'], PDO::PARAM_STR);
            $consulta->bindParam(':latitud', $data['latitud'], PDO::PARAM_STR);
            $consulta->bindParam(':longitud', $data['longitud'], PDO::PARAM_STR);
            $consulta->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
            $consulta->bindParam(':id_atraccion', $id, PDO::PARAM_INT);

            if ($foto) {
                $consulta->bindParam(':foto', $foto, PDO::PARAM_STR);
            }

            $consulta->execute();
            $resultado = $consulta->rowCount();
            return $resultado;
        }
    }
    //Se crea el uso de objeto de nuestra clase Atracciones para usar en llamadas de metodos de la misma clase
    $atraccion = new Atracciones;

    //Se establece la conexion con la base de datos para posteriormente usar alguna funcion de ejecuccion
    $atraccion->conexion();
?>