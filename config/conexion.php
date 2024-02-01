<?php
    
    class conexion{
        public $conn;

        /**
         * Constructed the 'conexion' class to connect to the database.
         */
        function __construct(){
            $server = "localhost";
            $user = "root";
            $passwd = "";
            $db = "punto_de_venta";

            try {
                $this->conn = new PDO("mysql:host=".$server.";dbname=".$db, $user, $passwd);
                $this->conn->exec("SET NAMES utf8mb4");
            } catch (Exception $ex) { //catch (\Throwable $th) send EXCEPTION
                die("PDO Connection Error". $ex->getMessage());
            }
        }

        /**
         * Function to inser data into the user table.
         * 
         * @param array $params It is an associative array that contains the data to be inserted:
         * 'id' -> User's ID.
         * 'name' -> Username.
         * 'passwd' -> User´s password.
         * 'img' -> User's photo.
         * 'type' -> User type.
         */
        function insert($params){
            $sql = $this->conn->prepare("INSERT INTO usuario(id, name, password, img, type) VALUES(:id, :name, :passwd, :img, :type)");
            $sql->execute($params);
        }

        /**
         * Fuction to delete data from the user table.
         * 
         * @param int $id User's ID to delete.
         */
        function delete($id){
            $sql = $this->conn->prepare("DELETE FROM usuario WHERE id = :id");
            $sql->bindParam(":id", $id);
            $sql->execute();
        }

        /**
         * Fuction to update data from in the user table.
         * 
         * @param array $params It is an associative array that contains the data to be inserted:
         * '_id' -> User's old ID.
         * 'id' -> User's new ID.
         * 'name' -> New username.
         * 'passwd' -> User´s new password.
         * 'img' -> User's new photo.
         * 'type' -> New user type.
         */
        function update($params){
            $query = "UPDATE usuario SET ";

            foreach ($params as $label => $value) {
                if(($value != null) && ($label != "_id")){
                    $query .= $label."=:".$label.",";
                }else{
                    if($label != "_id"){
                        unset($params[$label]);
                    }
                }
            }

            $query = substr($query, 0, -1);
            $query .= " WHERE id = :_id";
            //echo $query;
            $sql = $this->conn->prepare($query);
            $sql->execute($params);
        }

        /**
         * Fuction to select data from the user table.
         */
        function select(){
            $obj = new stdClass();
            $sql = $this->conn->prepare("SELECT * FROM usuario");
            $sql->execute();

            $i=0;
            while($row = $sql->fetch(PDO::FETCH_OBJ)){
                $obj->user[$i] = $row;
                $i++;
            }
            return $obj;
        }

        /**
         * Function to search for duplicate data in the user table.
         * 
         * @param int $id User's new ID.
         * Return TRUE when the ID doesn't exist in the user table.
         * Return FALSE when the ID exist.
         */
        function search($id){
            $sql = $this->conn->prepare("SELECT id FROM usuario WHERE id=:id");
            $sql->bindParam(":id", $id);
            $sql->execute();
            $row = $sql->fetch(PDO::FETCH_OBJ);

            if($row == null){
                return true;
            }else{
                return false;
            }
        }

        function disconected(){
            $this->conn = null;
        }
    }
?>