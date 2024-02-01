<?php session_start();
    
    include("../config/conexion.php");

    function login(){
        $pdo = new conexion();
        $user = isset($_POST["user"]) ? $_POST["user"] :  header("Location: ../error.php");
        $password= isset($_POST["passwd"]) ? md5($_POST["passwd"]) :  header("Location: ../error.php");

        $sql = $pdo->conn->prepare("SELECT * FROM usuario WHERE id_usuario = :usuario");
        $sql->bindParam(":usuario", $user);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);

        if ($row == null) {
            $pdo->disconected();
            return 0;
        }
        if($row["contrasena"] != $password){
            $pdo->disconected();
            return 2;
        }

        $_SESSION["global_user"] = $row['id_usuario'];
        $pdo->disconected();
        return 1;
    }

    function fill_table(){
        $obj = new stdClass();
        $pdo = new conexion();
        $sql = $pdo->conn->prepare("SELECT * FROM usuario");
        $sql->execute();

        $i=0;
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $user = array("Usuario" => $row["id_usuario"], "Nombre" => $row["nombre"], "Telefono" => $row["telefono"],
                          "Editar" => '<button type="button" class="btn" id="'.$row["id_usuario"].'"><img src="img/Elementos/edit.svg" title="Editar" width="30" class="d-inline-block align-text-top"></button>',
                          "Eliminar" => '<button type="button" class="btn" id="'.$row["id_usuario"].'"><img src="img/Elementos/delete.svg" title="Editar" width="30" class="d-inline-block align-text-top"></button>');
            $obj->usuario[$i] = $user;
            $i++;
        }
        $pdo->disconected();
        return $obj;
    }

    function user_repeat(){
        $pdo = new conexion();
        $obj = array();
        $sql = $pdo->conn->prepare("SELECT id_usuario FROM usuario");
        $sql->execute();

        $i=0;
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $obj[$i] = $row["id_usuario"];
            $i++;
        }
        $pdo->disconected();
        return $obj;
    }

    function save_empl(){
        $name = $_POST["name"];
        return "hola";
    }

    function show_employ($id){
        $params = array("id" => $id);
        $obj = new stdClass();
        $pdo = new conexion();
        $sql = $pdo->conn->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
        $sql->execute($params);

        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $obj->user = array( "Nombre" => $row["nombre"], "APP" => $row["ap_paterno"], "APM" => $row["ap_materno"], "Telefono" => $row["telefono"]);

        $pdo->disconected();
        return $obj;
    }
