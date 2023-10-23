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
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Mostrar</button>
                                    <button class="nav-link disabled" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Nuevo/Modificar</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <table id="miTabla" class="display">
                                        <thead>
                                            <tr>
                                                <th>Usuario</th>
                                                <th>Nombre</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>cipher</td>
                                                <td>Pedro</td>
                                                <td>
                                                    <img src="img/Elementos/edit.svg" title="Editar" width="35" class="d-inline-block align-text-top">
                                                    <img src="img/Elementos/delete.svg" title="Eliminar" width="35" class="d-inline-block align-text-top">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>close</td>
                                                <td>Pablo</td>
                                                <td>
                                                    <img src="img/Elementos/edit.svg" title="Editar" width="35" class="d-inline-block align-text-top">
                                                    <img src="img/Elementos/delete.svg" title="Eliminar" width="35" class="d-inline-block align-text-top">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade disabled" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <form id="milogin" method="">
                                        <input type="hidden" id="option" name="option" value="login"/>
                                        <div class="mb-3 input-group">
                                            <img src="img/elementos/person.svg" class="input-group-text">
                                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" autofocus required/>
                                        </div>
                                        <div class=" mb-3 input-group">
                                            <img src="img/elementos/lock.svg" class="input-group-text">
                                            <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Contraseña" required/>
                                        </div>
                                        <div class="d-grid gap-2 col-6 mx-auto">
                                            <button type="button" class="btn btn-outline-dark" id="iniciarS">Iniciar sesión</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-1 d-flex justify-content-center align-items-center">
                            <nav class="navbar d-flex justify-content-end">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <button type="button" id="agregar" class="nav-link active border-0 bg-white">
                                            <img src="img/Elementos/plus.svg" width="65px" title="Agregar usuario" class="d-inline-block align-text-top">
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link border-0 bg-white">
                                            <img src="img/Elementos/save.svg" width="65px" title="Guagar" class="d-inline-block align-text-top">
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="nav-link border-0 bg-white">
                                            <img src="img/Elementos/cancel.svg" width="65px" id="cancelar" title="Cancelar" class="d-inline-block align-text-top">
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" id="salir" class="nav-link border-0 bg-white">
                                            <img src="img/Elementos/logout.svg" width="65px" title="Salir" class="d-inline-block align-text-top">
                                        </button>
                                    </li>
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
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/jquery.dataTables.min.js" charset="utf8"></script>
    <script src="js/empleado.js"></script>
    
</body>
</html>