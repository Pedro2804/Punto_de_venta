<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <script src="js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="css/css_bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/Elementos/favicon.ico" type="image/x-icon">
</head>
<body class="vh-100" style="background: #ff6600;">
    <nav class="navbar navbar-expand-lg" style="background: #808080; user-select: none;">
        <div class="container-fluid">
            <a class="navbar-brand ms-4 me-4" href="#"><img src="img/Elementos/logout.svg" width="30px" title="Cerrar sesión" ></a>
            <div class="container-fluid navbar-brand">
                <div class="row text-white">
                    <div class="col-sm-1 me-5 p-0" style="cursor: pointer;" id="empleados">
                        <img src="img/Elementos/empleados.svg" alt="" class="d-inline-block align-text-top">
                        Empleados
                    </div>
                    <div class="col-sm-1 me-5 p-0" style="cursor: pointer;" id="inventario">
                        <img src="img/Elementos/inventory.svg" alt="" class="d-inline-block align-text-top">
                        Inventario
                    </div>
                    <div class="col-sm-1 me-5 p-0" style="cursor: pointer;" id="categorias">
                        <img src="img/Elementos/category.svg" alt="" class="d-inline-block align-text-top">
                        Categorias
                    </div>
                    <div class="col-sm-1 me-5 p-0" style="cursor: pointer;" id="proveedor">
                        <img src="img/Elementos/prov.svg" alt="" class="d-inline-block align-text-top">
                        Proveedor
                    </div>
                    <div class="col-sm-1 me-5 p-0" style="cursor: pointer;" id="ventas">
                        <img src="img/Elementos/finance.svg" alt="" class="d-inline-block align-text-top">
                        Ventas
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!--START MODAL EMPLEADOS-->
    <div class="modal fade" id="modal-empl" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="user-select: none;" >
            <div class="modal-content">
                <div class="modal-header text-white" style="background: #808080;" >
                    <h5 class="modal-title" id="staticBackdropLabel">EMPLEADOS</h5>
                    
                    <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-11">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Activo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Enlace</a>
                            </li>
                        </ul>
                        </div>
                        <div class="col-1">
                            <nav class="navbar d-flex justify-content-end bg-light">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <button type="button" class="nav-link border-0 bg-white">
                                            <img src="img/Elementos/plus.svg" width="65px" class="d-inline-block align-text-top">
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link border-0">
                                            <img src="img/Elementos/save.svg" width="65px" class="d-inline-block align-text-top">
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link border-0">
                                            <img src="img/Elementos/edit.svg" width="65px" class="d-inline-block align-text-top">
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link border-0">
                                            <img src="img/Elementos/delete.svg" width="65px" class="d-inline-block align-text-top">
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link border-0">
                                            <img src="img/Elementos/cancel.svg" width="60px" class="d-inline-block align-text-top">
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link border-0">
                                            <img src="img/Elementos/logout.svg" width="65px" class="d-inline-block align-text-top">
                                        </button>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!--<div class="modal-footer"></div>-->
            </div>
        </div>
    </div>
    <!--END MODAL EMPLEADOS-->

    <script src="js/js_bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/empleado.js"></script>
    
</body>
</html>