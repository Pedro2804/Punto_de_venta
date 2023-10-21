<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="js/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/css_bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/Elementos/favicon.ico" type="image/x-icon">
</head>
<body class="vh-100 d-flex justify-content-center align-items-center" style="background: #ff6600;">
    <div class="bg-white p-5 rounded-3" style="width: 25rem; box-shadow: 20px 20px 10px rgba(0,0,0,0.5);">
        <div class="d-flex justify-content-center" >
            <img src="img/Elementos/user.png" style="height: 8rem;" alt="">
        </div>
        <div class="text-center fs-1 fw-bold" >Login</div>
        <form action="" method="POST" >
            <div class="mb-3 input-group">
                <img src="img/elementos/person.png" class="input-group-text">
                <input type="text" class="form-control" id="id" placeholder="Usuario" required/>
            </div>
            <div class=" mb-3 input-group">
                <img src="img/elementos/lock.png" class="input-group-text">
                <input type="password" class="form-control" id="passwd" placeholder="Contraseña" required/>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-outline-dark">Iniciar sesión</button>
            </div>
        </form>
    </div>    

    <script src="js/js_bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>