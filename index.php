<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/css_bootstrap.min.css">
    <!--<link rel="preload" href="css/styles.css">-->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/Elementos/favicon.ico" type="image/x-icon">
</head>
<body id="body_login" class="vh-100 d-flex justify-content-center align-items-center">
    <div class="bg-white p-5 rounded-3" style="width: 25rem; box-shadow: 20px 20px 10px rgba(0,0,0,0.5);">
        <div class="d-flex justify-content-center" >
            <img src="img/Elementos/user.png" style="height: 8rem;" alt="">
        </div>
        <div class="text-center fs-1 fw-bold" >Login</div>
        <form id="mylogin">
            <input type="hidden" id="option" name="option" value="login"/>
            <div class="mb-3 input-group">
                <img src="img/elementos/person.svg" class="input-group-text">
                <input type="text" class="form-control" id="user" name="user" placeholder="Usuario" autofocus required/>
            </div>
            <div class=" mb-3 input-group">
                <img src="img/elementos/lock.svg" class="input-group-text">
                <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Contraseña" required/>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="button" class="btn btn-outline-dark boton" id="login">Iniciar sesión</button>
            </div>
        </form>
    </div>    

    <script src="js/js_bootstrap.bundle.min.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>