<?php
    //$_REQUEST[]; puede ser _POST o _GET
    //print_r() verifica lo que se imprime
    require("../function/functions.php");

    $option = isset($_REQUEST["option"]) ? $_REQUEST["option"] : '';

    switch ($option) {
        case 'login':
            $result = login();
            if($result == 1){
                echo json_encode($result);
            }else{
                echo json_encode($result);
            }
            break;
        case 'logout':
            session_destroy();
            header('Location: ../');
            break;
        case 'fill_table':
            $result = fill_table();
            echo json_encode($result);
            break;
        case 'user_repeat':
            $result = user_repeat();
            echo json_encode($result);
            break;
        case 'show':
                $id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : '';
                $result = show($id);
                echo json_encode($result);
                break;

        default:
            echo json_encode("Select a option valid");
            break;
    }
    $conn = null;
?>