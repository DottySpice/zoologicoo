<?php 
    //Se llama nuestra clase para el uso de la base de datos
    require_once('zoologico.class.php');

    //Se crea la clase animales junto a sus funciones principales
    class Usuarios extends Zoologico{

        //En cada funcion se ejecuta la consulta y se obtiene el resultado de la consulta
        //Funcion para leer todos los datos de la tabla animal
        public function read(){
            $consulta = $this->db->prepare("SELECT id_animal, animal, id_familia, familia FROM animal f 
            left join familia USING (id_familia) ORDER by animal ASC");    
            $consulta ->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }
        
        //Funcion para leer un solo registro mediante un parametro de id
        public function readOne($id){

            $consulta = $this->db->prepare("SELECT * from animal where id_animal=:id_animal");    
            $consulta->bindParam(':id_animal', $id, PDO::PARAM_INT);
            $consulta ->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }

        //Funcion para borrar un registro en especifico mediante la obtencion de un parametro id
        public function delete($id){
            try {
                $this -> db -> beginTransaction();

                $consulta = $this->db->prepare("DELETE FROM animal_detalle WHERE id_animal=:id_animal");
                $consulta->bindParam(':id_animal', $id, PDO::PARAM_INT);
                $consulta->execute();
                $resultado = $consulta->rowCount();

                $consulta = $this->db->prepare("DELETE FROM animal_alimento WHERE id_animal=:id_animal");
                $consulta->bindParam(':id_animal', $id, PDO::PARAM_INT);
                $consulta->execute();
                $resultado = $consulta->rowCount();

                $consulta = $this->db->prepare("DELETE from animal where id_animal=:id_animal");
                $consulta->bindParam(':id_animal', $id, PDO::PARAM_INT);
                $consulta->execute();
                $resultado = $consulta->rowCount();

                $this -> db -> commit();
                return $resultado;

            } catch (Exception $e) {
                $this -> db -> rollback();
                return 0;
            }
        }   



        //Funcion para crear una nuevo registro mediante la obtencion de un array de datos con los datos a ingresar
        public function create($data){
            
            $resultado = null;
            //$foto = $this -> cargarImagen("animal");
            //if ($foto) {
            
            try {
                $this -> db -> beginTransaction();

                $consulta = $this->db->prepare("INSERT INTO animal(animal,id_familia) 
                values (:animal,:id_familia)");
    
                $consulta->bindParam(':animal', $data['animal'], PDO::PARAM_STR);
                //$consulta->bindParam(':foto', $foto, PDO::PARAM_STR);
                $consulta->bindParam(':id_familia', $data['id_familia'], PDO::PARAM_INT);
    
                $consulta->execute();
                $resultado = $consulta->rowCount();

                $buscarConsulta = $this->db->prepare("SELECT id_animal from animal ORDER BY id_animal desc limit 1");
                //}
                $buscarConsulta -> execute();
                $animal = $buscarConsulta -> fetchAll(PDO::FETCH_ASSOC);

                if (isset($animal[0]['id_animal'])) {
                    $id_animal = $animal[0]['id_animal'];

                    $susAlimentos = isset($_POST['alimento'])?$_POST['alimento']:array();
                    
                    $consulta2 = $this->db->prepare("INSERT INTO animal_alimento(id_animal,id_alimento) 
                    values (:id_animal,:id_alimento)");

                    foreach ($susAlimentos as $key => $alimento){
                        $consulta2->bindParam(':id_alimento', $key, PDO::PARAM_INT);
                        $consulta2->bindParam(':id_animal', $id_animal, PDO::PARAM_INT);
                        $consulta2->execute();

                    }

                    $this -> db -> commit();
                    return $resultado;
                }
                else {
                    $this -> db -> rollback();
                    return 0;
                }
            } catch (Exception $e) {
                $this -> db -> rollback();
                return 0;
                
            }
        }

        //Funcion para actualizar un registro dando como parametros el id especifico y el grupo de datos enviandos mediante un array de datos
        public function update($id,$data){

            try {
                $this -> db -> beginTransaction();

                $consulta = $this->db->prepare("UPDATE animal 
                SET animal=:animal,id_familia=:id_familia 
                WHERE id_animal=:id_animal");
            
                $consulta->bindParam(':animal', $data['animal'], PDO::PARAM_STR);
                $consulta->bindParam(':id_animal', $id, PDO::PARAM_INT);
                $consulta->bindParam(':id_familia', $data['id_familia'], PDO::PARAM_INT);
    
                $consulta->execute();
                //$resultado = $consulta->rowCount();

                if (isset($id)) {
                    $id_animal = $id;

                    $susAlimentos = isset($_POST['alimento'])?$_POST['alimento']:array();


                    $borra = $this -> delete_aa($id_animal);
                    
                    $consulta2 = $this->db->prepare("INSERT INTO animal_alimento(id_animal,id_alimento) 
                    values (:id_animal,:id_alimento)");

                    foreach ($susAlimentos as $key => $alimento){
                        $consulta2->bindParam(':id_alimento', $key, PDO::PARAM_INT);
                        $consulta2->bindParam(':id_animal', $id_animal, PDO::PARAM_INT);
                        $consulta2->execute();

                    }

                    $this -> db -> commit();
                    return $consulta;
                }
                else {
                    $this -> db -> rollback();
                    return 0;
                }

            } catch (Exception $e) {
                $this -> db -> rollback();
            }
        }

        public function read_aa($id_animal){
            $consulta = $this->db->prepare("SELECT * from animal_alimento 
            WHERE id_animal=:id_animal");

            $consulta->bindParam(':id_animal', $id_animal, PDO::PARAM_INT);

            $consulta ->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

            $alimentos = array();

            foreach($resultado as $animal_alimento){
                array_push($alimentos, $animal_alimento['id_alimento']);
            }

            return $alimentos;
        }
        
        public function delete_aa($id_animal){

            $consulta = $this->db->prepare("DELETE from animal_alimento
            WHERE id_animal=:id_animal");

            $consulta->bindParam(':id_animal', $id_animal, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->rowCount();
            return $resultado;
        }  
        
        public function read_animal($id_animal){

            $consulta = $this -> db -> prepare("SELECT * from animal_detalle
            WHERE id_animal=:id_animal ORDER BY nacimiento ASC");

            $consulta -> bindParam(':id_animal', $id_animal, PDO::PARAM_INT);
            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }

        public function create_animal($data, $id_animal){

            $consulta = $this -> db -> prepare("INSERT INTO animal_detalle (id_animal, consecutivo,nacimiento, cantidad) 
            VALUES (:id_animal, :consecutivo, :nacimiento, :cantidad);");

            $consulta->bindParam(':id_animal', $id_animal, PDO::PARAM_INT);
            $consulta->bindParam(':nacimiento', $data['nacimiento'], PDO::PARAM_STR);
            $consulta->bindParam(':cantidad', $data['cantidad'], PDO::PARAM_INT);
            $consecutivo = $this -> consecutivo($id_animal);
            $consulta->bindParam(':consecutivo', $consecutivo , PDO::PARAM_INT);

            $consulta->execute();
            $resultado = $consulta->rowCount();
            return $resultado;
        }

        public function consecutivo ($id_animal){
            $consulta = $this -> db -> prepare("SELECT consecutivo+1 as consecutivo from animal_detalle 
            WHERE id_animal=:id_animal ORDER BY 1 DESC limit 1");

            $consulta -> bindParam(':id_animal', $id_animal, PDO::PARAM_INT);
            $consulta -> execute();
            $resultado = $consulta -> fetchAll(PDO::FETCH_ASSOC);

            if (isset($resultado[0]["consecutivo"])) {
                return $resultado[0]["consecutivo"];
            }
            else{
                return 1;
            }
        }

        public function delete_animal($id_animal,$consecutivo){

            $consulta = $this -> db -> prepare("DELETE FROM animal_detalle 
            where id_animal=:id_animal AND consecutivo=:consecutivo");

            $consulta->bindParam(':id_animal', $id_animal, PDO::PARAM_INT);
            $consulta->bindParam(':consecutivo', $consecutivo, PDO::PARAM_INT);

            $consulta->execute();
            $resultado = $consulta->rowCount();
            return $resultado;
        } 

    }
    //Se crea el uso de objeto de nuestra clase Animales para usar en llamadas de metodos de la misma clase
    $animal = new Animales;

    //Se establece la conexion con la base de datos para posteriormente usar alguna funcion de ejecuccion
    $animal->conexion();
?>