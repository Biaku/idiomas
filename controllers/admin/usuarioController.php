<?php
if ($_POST) {
    include '../../models/Conexion.php';
    if ($_POST['tipo'] == 'registro') {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $correo = $_POST['correo'];
        $pass = $_POST['pass'];
        $tel = $_POST['tel'];
        $domicilio = $_POST['domicilio'];
        $tipo_user = $_POST['tipo_usuario'];
        $sql = "INSERT INTO usuario(correo,contrasena,nombre,apellidos,telefono,domicilio,tipo_usuario_id) 
        VALUES ('$correo','$pass','$nombre','$apellidos','$tel','$domicilio','$tipo_user')";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-usuario");

    } elseif ($_POST['tipo'] == 'actualizar') {


    } elseif ($_POST['tipo'] == 'borrar') {


    } elseif ($_GET['page'] == 'adm-usuario') {
        include 'models/Conexion.php';
        $id = $_GET['id'];
        $sql = "select nombre from idioma where id =$id";
        $query = $pdo->query($sql);
        $res = $query->fetchObject();

    }
} else {
    include 'models/Conexion.php';
    $sql = "SELECT * FROM tipo_usuario";
    $tipo_alum = $pdo->query($sql);
    $sql = "SELECT
tipo_usuario.tipo,
usuario.id,
usuario.correo,
usuario.contrasena,
usuario.nombre,
usuario.apellidos,
usuario.telefono,
usuario.domicilio
FROM
usuario
INNER JOIN tipo_usuario ON usuario.tipo_usuario_id = tipo_usuario.id";
    $usuarios = $pdo->query($sql);
}