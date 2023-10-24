<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/css_bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/Elementos/favicon.ico" type="image/x-icon">
</head>
<body class="vh-100" style="background: #ff6600;">
    <nav class="navbar navbar-expand-lg" style="background: #808080; user-select: none;">
        <div class="container-fluid">
            <a class="navbar-brand ms-2 me-4" href="#"><img src="img/Elementos/logout.svg" width="30px" title="Cerrar sesión" ></a>
            <div class="container-fluid ">
                <div class="row text-white">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav me-2" id="empleados"  style="cursor: pointer;">
                            <img src="img/Elementos/empleados.svg" alt="" class="d-inline-block align-text-top">
                            Empleados
                        </li>
                        <li class="nav me-2" id="inventario" style="cursor: pointer;">
                            <img src="img/Elementos/inventory.svg" alt="" class="d-inline-block align-text-top">
                            Inventario
                        </li>
                        <li class="nav me-2" id="categorias" style="cursor: pointer;">
                            <img src="img/Elementos/category.svg" alt="" class="d-inline-block align-text-top">
                            Categorias
                        </li>
                        <li class="nav me-2" id="proveedor" style="cursor: pointer;">
                            <img src="img/Elementos/prov.svg" alt="" class="d-inline-block align-text-top">
                            Proveedor
                        </li>
                        <li class="nav me-2" id="ventas" style="cursor: pointer;">
                            <img src="img/Elementos/finance.svg" alt="" class="d-inline-block align-text-top">
                            Ventas
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <?php include("modal_empl.php"); ?>

    <script src="js/js_bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/jquery.dataTables.min.js" charset="utf8"></script>
    <script src="js/empleado.js"></script>
    
</body>
</html>