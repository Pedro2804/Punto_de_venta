<?php  session_start();
    if(!isset($_SESSION["global_user"])){
        header("Location: index.php");
    }else{
        $online = $_SESSION["global_user"];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santos</title>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/css_bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/Elementos/favicon.ico" type="image/x-icon">
</head>
<body class="vh-100" style="background: #ff6600;">
    <nav class="navbar navbar-expand-lg" style="background: #8C8C8C; user-select:none;">
        <div class="container-fluid justify-content-end text-white">
            <div class="fw-bold fs-bold fs-5 m-auto">
                Le atiende "<?php echo $online; ?>"
            </div>
            <a class="navbar-brand ms-2 me-4 fs-6 text-white" href="controller/controller.php?option=logout"><img src="img/Elementos/logout.svg" width="25px" title="Cerrar sesión" >
                Cerrar sesión
            </a>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg" style="background: #808080; user-select: none;">
        <div class="container-fluid">
            <div class="row text-white ms-3">
                <ul class="navbar-nav mb-3 mb-lg-0">
                    <li class="nav me-3 menu" id="employees"  style="cursor: pointer;">
                        <img src="img/Elementos/empleados.svg" alt="" class="d-inline-block align-text-top">
                        Usuarios
                    </li>
                    <li class="nav me-3 menu" id="inventory" style="cursor: pointer;">
                        <img src="img/Elementos/inventory.svg" alt="" class="d-inline-block align-text-top">
                        Inventario
                    </li>
                    <li class="nav me-3 menu" id="client" style="cursor: pointer;">
                        <img src="img/Elementos/person.svg" alt="" class="d-inline-block align-text-top">
                        Clientes
                    </li>
                    <li class="nav me-3 menu" id="sales" style="cursor: pointer;">
                        <img src="img/Elementos/finance.svg" alt="" class="d-inline-block align-text-top">
                        Ventas
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <?php include("modal_empl.php");?>

    <script src="js/js_bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/jquery.dataTables.min.js" charset="utf8"></script>
    <script src="js/system.js"></script>
    <script src="js/modal_empl.js"></script>
    
</body>
</html>