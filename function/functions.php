<?php session_start();
    
    include("../config/conexion.php");
    $caracteres="0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

    function password_decrip($passwd_user, $passwd_server) {
        $aux = explode('/', $passwd_server);
        $salt = $aux[0];
        $passwd1 = $aux[1];
        $passwd2 = md5($salt.$passwd_user);

        if($passwd1 === $passwd2){
            return true;
        }

        return false; 
    }

    function password_encrip($password) {
        
    }

    function login($user, $password){
        $column = "*";
        $table = "usuario";
        $condition = "WHERE usuario = :id";
        $params = ["id" => $user];

        $pdo = new conexion();
        $row = $pdo->select($column, $table, $condition, $params)[0];

        if (!$row) {
            $pdo->disconected();
            return "El usuario no existe";
        }

        if(!password_decrip($password, $row["contrasena"])){
            $pdo->disconected();
            return "Contraseña incorreta";
        }

        $_SESSION["global_user"] = $row['usuario'];
        $pdo->disconected();
        return true;
    }

    function permissions($online) {
        $id = ["empleado" => "employees", "inventario" => "inventory", "cliente" => "client", "proveedor" => "prov", "venta" => "sales"];
        $str = ["empleado" => "Usuarios", "inventario" => "Inventario", "cliente" => "Clientes", "proveedor" => "proveedores", "venta" => "Ventas"];
            
        $pdo = new conexion();
        $column = "empleado, inventario, cliente, proveedor, venta";
        $table = "usuario";
        $condition = "WHERE usuario = :usuario";
        $params = ["usuario" => $online];
        $row = $pdo->select($column, $table, $condition, $params)[0];

        if($row !== null){
            $obj = new stdClass();
            $i = 0;
            foreach ($row as $key => $value) {
                if($value === 1){
                    $obj->ul[$i] = '<li class="nav me-3 menu" id="'.$id[$key].'"  style="cursor: pointer;">'.
                                        '<img src="img/Elementos/'.$id[$key].'.svg" alt="" class="d-inline-block align-text-top">'.
                                        $str[$key].
                                      '</li>';
                    $i++;
                }
            }
            return $obj;
        }
        return false;
    }

    function fill_table($online){
        $pdo = new conexion();
        $column = "*";
        $table = "usuario";
        $condition = "";
        $params = [];
        $row = $pdo->select($column, $table, $condition, $params);

        $obj = new stdClass();
        foreach ($row as $value) {
            if($online !== $value['usuario']){
                $user = array("Usuario" => $value["usuario"], "Nombre" => $value["nombre"].' '.$value["ap_paterno"], "Telefono" => $value["telefono"],
                          "Editar" => '<button type="button" class="btn" id="edit_'.$value["usuario"].'"><img src="img/Elementos/edit.svg" title="Editar" width="30" class="d-inline-block align-text-top"></button>',
                          "Eliminar" => '<button type="button" class="btn" id="delete_'.$value["usuario"].'"><img src="img/Elementos/delete.svg" title="Editar" width="30" class="d-inline-block align-text-top"></button>');
                $obj->usuario[] = $user;
            }
        }
        
        $pdo->disconected();
        return $obj;
    }

    function user_repeat($user){
        $pdo = new conexion();
        $sql = $pdo->conn->prepare("SELECT * FROM usuario WHERE usuario = :usuario");
        $sql->bindParam(":usuario", $user);
        $sql->execute();

        $res = $sql->fetch(PDO::FETCH_ASSOC);

        $pdo->disconected();

        return $res;
    }

    function save_empl(){
        $datas = array("usuario" => trim($_POST["user"]), "nombre" => trim($_POST["name"]), "ap_paterno" => trim($_POST["first_name"]),
                       "ap_materno" => trim($_POST["last_name"]), "telefono" => trim($_POST["phone"]), "contrasena" => md5(trim($_POST["passwd"])),
                       "empleado" => $_POST["switch_employee"],
                       "inventario" => $_POST["switch_inventory"],
                       "cliente" => $_POST["switch_client"],
                       "proveedor" => $_POST["switch_prov"],
                       "venta" => $_POST["switch_sale"]);

        if(user_repeat($datas["usuario"]) === false){
            try {
                $pdo = new conexion();
                $sql = $pdo->conn->prepare("INSERT INTO usuario (usuario, nombre, ap_paterno, ap_materno, telefono, contrasena,
                                            empleado, inventario, cliente, proveedor, venta)
                                            value (:usuario, :nombre, :ap_paterno, :ap_materno, :telefono, :contrasena,
                                            :empleado, :inventario, :cliente, :proveedor, :venta)");
                $sql->execute($datas);
                $pdo->disconected();
                return true;
            } catch (Exception $e) {
                return $e->getMessage();
                die();
            }
        }else{ return false;}
        
    }

    function update_employee(){
        $datas = array("nombre" => trim($_POST["name"]), "ap_paterno" => trim($_POST["first_name"]), "ap_materno" => trim($_POST["last_name"]),
                       "telefono" => trim($_POST["phone"]), "contrasena" => md5(trim($_POST["passwd"])),
                       "empleado" => $_POST["switch_employee"],
                       "inventario" => $_POST["switch_inventory"],
                       "cliente" => $_POST["switch_client"],
                       "proveedor" => $_POST["switch_prov"],
                       "venta" => $_POST["switch_sale"]);

        try {
            $query_sql = "UPDATE usuario SET ";

            foreach ($datas as $key => $value) {
                if($value != ""){
                    $query_sql .= $key.'=:'.$key.',';
                }else{
                    unset($datas[$key]);
                }
            }

            $datas = array_merge($datas, array("usuario" => $_POST["id_update"]));

            $query_sql = substr($query_sql, 0, -1);
            $query_sql .= " WHERE usuario = :usuario";
            $pdo = new conexion();
            $sql = $pdo->conn->prepare($query_sql);
            $sql->execute($datas);
            $pdo->disconected();

            return true;
        } catch (Exception $e) {
            return $e->getMessage();
            die();
        }
    }

    function show_employee($id){
        $params = array("id" => $id);
        $obj = new stdClass();
        $pdo = new conexion();
        $sql = $pdo->conn->prepare("SELECT * FROM usuario WHERE usuario = :id");
        $sql->execute($params);

        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $obj->user = array("Nombre" => $row["nombre"], "APP" => $row["ap_paterno"], "APM" => $row["ap_materno"], "Telefono" => $row["telefono"],
                           "Empleado" => $row["empleado"], "Inventario" => $row["inventario"], "Cliente" => $row["cliente"],
                           "Proveedor" => $row["proveedor"], "Venta" => $row["venta"]);

        $pdo->disconected();
        return $obj;
    }

    function delete_employee($id){
        $params = array("id" => $id);

        try {
            $pdo = new conexion();
            $sql = $pdo->conn->prepare("DELETE FROM usuario WHERE usuario = :id");
            $sql->execute($params);

            $pdo->disconected();
            return true;
        } catch (Exception $e) {
            return $e->getMessage();
            die();
        }
    }


#Validar inputs

function is_empty(array $inputs) {
    foreach ($inputs as $value) {
        if(empty($value)){
            return true;
        }
    }
    return false;
}

function format(string $expression, array $inputs){
    foreach ($inputs as $value) {
        if(preg_match($expression, $value) || ($value[0] === '_') || ($value[strlen($value)-1] === '_')){
            return false;
        }
    }
    return true;
}