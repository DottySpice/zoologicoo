<?php 

    require_once('zoologico.class.php');

 
    class Animales_alimentos extends Zoologico{

        public function read($id_animal){
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
        
        public function delete($id_animal){

            $consulta = $this->db->prepare("DELETE from animal_alimento
            WHERE id_animal=:id_animal");

            $consulta->bindParam(':id_animal', $id_animal, PDO::PARAM_INT);
            $consulta->execute();
            $resultado = $consulta->rowCount();
            return $resultado;
        }   

    }

    $animales_alimentos = new Animales_alimentos;
    $animales_alimentos->conexion();
?>