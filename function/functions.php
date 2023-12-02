<?php session_start();
    include("../config/conexion.php");

    function login(){
        $pdo = new conexion();
        $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] :  header("Location: ../error.php");
        $contrasena = isset($_POST["passwd"]) ? md5($_POST["passwd"]) :  header("Location: ../error.php");

        $sql = $pdo->conn->prepare("SELECT * FROM usuario WHERE id_usuario = :usuario");
        $sql->bindParam(":usuario", $usuario);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);

        if ($row == null) {
            $pdo->disconected();
            return 0;
        }
        if($row["contrasena"] != $contrasena){
            $pdo->disconected();
            return 2;
        }

        $_SESSION["global_user"] = $row['id_usuario'];
        $pdo->disconected();
        return 1;
    }

    function show_user(){
        $obj = new stdClass();
        $pdo = new conexion();
        $sql = $pdo->conn->prepare("SELECT * FROM usuario");
        $sql->execute();

        $i=0;
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $user = array("Usuario" => $row["id_usuario"], "Nombre" => $row["nombre"], "Telefono" => $row["telefono"],
                          "Editar" => '<button type="button" class="btn" onclick="editar_empl(this)" id="'.$row["id_usuario"].'"><img src="img/Elementos/edit.svg" title="Editar" width="30" class="d-inline-block align-text-top"></button>',
                          "Eliminar" => '<button type="button" class="btn" id="'.$row["id_usuario"].'"><img src="img/Elementos/delete.svg" title="Editar" width="30" class="d-inline-block align-text-top"></button>');
            $obj->usuario[$i] = $user;
            $i++;
        }
        $pdo->disconected();
        return $obj;
    }

    function show($id){
        $params = array("id" => $id);
        $obj = new stdClass();
        $pdo = new conexion();
        $sql = $pdo->conn->prepare("SELECT * FROM usuario WHERE id_usuario = :id");
        $sql->execute($params);

        $i=0;
        while($row = $sql->fetch(PDO::FETCH_ASSOC)){
            $user = array("Usuario" => $row["id_usuario"], "Nombre" => $row["nombre"], "Telefono" => $row["telefono"]);
            $obj->usuario[$i] = $user;
            $i++;
        }
        $pdo->disconected();
        return $obj;
    }
?>