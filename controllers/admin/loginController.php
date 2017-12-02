<?php
require_once '../../models/Conexion.php';
$email = $_POST['email'];
$pass = $_POST['pass'];


try {
    $sql = "SELECT * FROM usuario WHERE correo='$email' and contrasena = '$pass'";
    $query = $pdo->query($sql);
    $usuario = $query->fetchObject();

    session_start();
    $_SESSION['usuario'] = $usuario;
    var_dump($_SESSION['usuario']);

    if ($usuario->tipo_usuario_id == 1) {
        header("location:../../?page=cpalumno");
    } elseif ($usuario->tipo_usuario_id == 2) {
        echo "hola profe";
    } elseif ($usuario->tipo_usuario_id == 3) {
        header("location:../../?page=adm-inicio");
    }
} catch (Exception $e) {

}


$pdo = null;
