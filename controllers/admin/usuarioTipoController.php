<?php
if ($_POST) {
    include '../../models/Conexion.php';
    if ($_POST['tipo'] == 'registro') {
        $tipo = $_POST['nombre'];
        $sql = "INSERT INTO tipo_usuario(tipo) VALUES ('$tipo')";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-tipo-usuario");

    } elseif ($_POST['tipo'] == 'actualizar') {


    } elseif ($_POST['tipo'] == 'borrar') {
        $aula = $_POST['aula'];
        $sql = "DELETE FROM tipo_usuario WHERE id = $aula";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-tipo-usuario");

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
    $query = $pdo->query($sql);
}