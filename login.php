<?php
session_start();
if (isset($_SESSION['session_username']) && $_SESSION['session_username'] == true) {
    header("location:personasIndex.php");
    exit;
}
include_once('php/conexionBD.php');
$conexion = conectar();
$usuario =  "";
$passwd = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $passwd = mysqli_real_escape_string($conexion, $_POST['passwd']);
    $sql = "SELECT id_usuario FROM usuario WHERE nombre = '$usuario' AND contraseña= '$passwd'";
    $result = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = isset($row['active']);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['session_username'] = $usuario;
        header('location: personasIndex.php');
    } else {
        $mensaje = "Usuario o contraseña invalidos";
    }
}
?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="librerias/bootstrap/js/bootstrap.js"></script>
    <title>Login</title>
</head>

<body>

    <div class="container shadow-lg p-3 mb-5 bg-white rounded" id="cont-login">
        <form id="formLogin" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <?php if (isset($mensaje)) {
                    echo $mensaje;
                } ?>
            </div>
            <!-- Input usuario-->
            <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="input" name="usuario" value="" required>
            </div>
            <!-- Input contraseña-->
            <div class="form-group">
                <label for="passwd">Contraseña</label>
                <input type="password" class="form-control" id="inputp" name="passwd" value="" required>
            </div>
            <!-- Boton ingresar-->
            <button id="login" type="submit" class="btn btn-success">Ingresar</button>
        </form>

    </div>
</body>

</html>
