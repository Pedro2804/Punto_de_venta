<?php session_start();
    include("../config/conexion.php");

    function login(){
        $pdo = new conexion();
        $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
        $contrasena = isset($_POST["passwd"]) ? md5($_POST["passwd"]) : "";

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

        $_SESSION["Administrador"] = $row['id_usuario'];
        $pdo->disconected();
        return 1;
    }
?>