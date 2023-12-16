<?php
    //$_REQUEST[]; puede ser _POST o _GET
    //print_r() verifica lo que se imprime
    require("../function/functions.php");

    $option = isset($_REQUEST["option"]) ? $_REQUEST["option"] : header("Location: ../error.php");

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
            header('Location: ../index.php');
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
            $id = isset($_POST["id"]) ? $_POST["id"] : '';
            $result = show($id);
            echo json_encode($result);
            break;

        default:
            header("Location: ../error.php");
            break;
    }
    $conn = null;
?>