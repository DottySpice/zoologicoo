<?php 
    //Se llama nuestra clase para el uso de la base de datos
    require_once('zoologico.class.php');

    //Se crea la clase atracciones junto a sus funciones principales
    class Familias extends Zoologico{

        //En cada funcion se ejecuta la consulta y se obtiene el resultado de la consulta
        //Funcion para leer todos los datos de la tabla atraccion
        public function read(){
            $consulta = $this->db->prepare("SELECT id_familia, familia, id_atraccion, atraccion,f.foto FROM familia f 
            left join atraccion USING (id_atraccion) ORDER by familia ASC");    
            $consulta ->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
        
        //Funcion para leer un solo registro mediante un parametro de id
        public function readOne($id){

            $consulta = $this->db->prepare("SELECT * from familia where id_familia=:id_familia");    
            $consulta->bindParam(':id_familia', $id, PDO::PARAM_INT);
            $consulta ->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }

        //Funcion para borrar un registro en especifico mediante la obtencion de un parametro id
        public function delete($id){

            $consulta = $this->db->prepare("DELETE from familia where id_familia=:id_familia");
            $consulta->bindParam(':id_familia', $id, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->rowCount();
            return $resultado;
        }   

        //Funcion para crear una nuevo registro mediante la obtencion de un array de datos con los datos a ingresar
        public function create($data){

            $resultado = null;
            $foto = $this -> cargarImagen("familia");
            if ($foto) {
                $consulta = $this->db->prepare("INSERT INTO familia(familia,foto,id_atraccion) 
                values (:familia,:foto,:id_atraccion)");
    
                $consulta->bindParam(':familia', $data['familia'], PDO::PARAM_STR);
                $consulta->bindParam(':foto', $foto, PDO::PARAM_STR);
                $consulta->bindParam(':id_atraccion', $data['id_atraccion'], PDO::PARAM_INT);

                $consulta->execute();
                $resultado = $consulta->rowCount();
            }
            return $resultado;
        }

        //Funcion para actualizar un registro dando como parametros el id especifico y el grupo de datos enviandos mediante un array de datos
        public function update($id,$data){

            $foto = $this -> cargarImagen("familia");
            if ($foto) {
                $consulta = $this->db->prepare("UPDATE familia 
                SET familia=:familia,foto=:foto,id_atraccion=:id_atraccion 
                WHERE id_familia=:id_familia");
            }
            else {
                $consulta = $this->db->prepare("UPDATE familia 
                SET familia=:familia,id_atraccion=:id_atraccion 
                WHERE id_familia=:id_familia");
            }

            $consulta->bindParam(':familia', $data['familia'], PDO::PARAM_STR);
            $consulta->bindParam(':id_familia', $id, PDO::PARAM_INT);
            $consulta->bindParam(':id_atraccion', $data['id_atraccion'], PDO::PARAM_INT);

            if ($foto) {
                $consulta->bindParam(':foto', $foto, PDO::PARAM_STR);
            }

            $consulta->execute();
            $resultado = $consulta->rowCount();
            return $resultado;
        }
    }
    //Se crea el uso de objeto de nuestra clase Atracciones para usar en llamadas de metodos de la misma clase
    $familia = new Familias;

    //Se establece la conexion con la base de datos para posteriormente usar alguna funcion de ejecuccion
    $familia->conexion();
?>