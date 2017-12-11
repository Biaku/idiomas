<?php
require_once '../../models/Conexion.php';
$email = $_POST['email'];
$pass = $_POST['pass'];


try {
    session_start();
    $sql = "SELECT * FROM usuario WHERE correo='$email' and contrasena = '$pass'";
    $query = $pdo->query($sql);
    if ($usuario = $query->fetchObject()) {

        $_SESSION['usuario'] = $usuario;

        if ($usuario->tipo_usuario_id == 1) {
            header("location:../../?page=cpalumno");
        } elseif ($usuario->tipo_usuario_id == 2) {
            header("location:../../?page=cpprofesor");
        } elseif ($usuario->tipo_usuario_id == 3) {
            header("location:../../?page=adm-inicio");
        }
    } else {
        $_SESSION['error'] = true;
        header('location:../../?page=login');
    }

} catch (Exception $e) {

}

$pdo = null;
