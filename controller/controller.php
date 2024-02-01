<?php
    //$_REQUEST[]; puede ser _POST o _GET
    //print_r() verifica lo que se imprime
    include("../function/functions.php");

    $option = isset($_REQUEST["option"]) ? $_REQUEST["option"] : "";

    switch ($option) {
        case 'login':
            $result = login();
            echo json_encode($result);
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
        case 'save_empl':
            $result = save_empl();
            echo json_encode($result);
            break;
        case 'show_employ':
            $id = isset($_POST["id"]) ? $_POST["id"] : '';
            $result = show_employ($id);
            echo json_encode($result);
            break;
        default:
            header("Location: ../error.php");
            break;
    }
    $conn = null;