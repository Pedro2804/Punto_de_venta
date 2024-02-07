<?php
    //$_REQUEST[]; puede ser _POST o _GET
    //print_r() verifica lo que se imprime
    require("../function/functions.php");

    $option = isset($_POST["option"]) ? $_POST["option"] : "";

    switch ($option) {
        case 'login':
            $user = isset($_POST["user"]) ? trim($_POST["user"]) :  '';
            $password= isset($_POST["passwd"]) ? $_POST["passwd"] : '';
            $datas = [$user, $password];

            if(!is_empty($datas)){
                if(format('/[^a-z_A-Z0-9]/', $datas)){
                    $result = login($user, $password);
                    echo json_encode($result);
                }else
                    echo json_encode(false);
            }else
                echo json_encode(false);
            break;
        case 'logout':
            session_destroy();
            break;
        case 'permissions':
            $user = $_POST["online"];
            $res = permissions($user);
            echo json_encode($res);
            break;
        case 'fill_table':
            $user = $_POST['online'];
            $result = fill_table($user);
            echo json_encode($result);
            break;
        case 'save_empl':
            $result = save_empl();
            echo json_encode($result);
            break;
        case 'show_employee':
            $id = isset($_POST["id"]) ? $_POST["id"] : '';
            $result = show_employee($id);
            echo json_encode($result);
            break;
        case 'update_employee':
            $result = update_employee();
            echo json_encode($result);
            break;
        case 'delete_employee':
            $id = isset($_POST["id"]) ? $_POST["id"] : '';
            $result = delete_employee($id);
            echo json_encode($result);
            break;
        default:
            echo json_encode(-1);
            break;
    }
    $conn = null;