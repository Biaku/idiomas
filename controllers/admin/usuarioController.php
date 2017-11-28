<?php
if ($_POST) {
    include '../../models/Conexion.php';
    if ($_POST['tipo'] == 'registro') {


    } elseif ($_POST['tipo'] == 'actualizar') {


    } elseif ($_POST['tipo'] == 'borrar') {

    }

} elseif ($_GET['page'] == 'adm-tipo-usuario') {
    include 'models/Conexion.php';
    $id = $_GET['id'];
    $sql = "select nombre from idioma where id =$id";
    $query = $pdo->query($sql);
    $res = $query->fetchObject();

} elseif ($_GET['page'] == 'adm-usuario') {
    include 'models/Conexion.php';
    $id = $_GET['id'];
    $sql = "select nombre from idioma where id =$id";
    $query = $pdo->query($sql);
    $res = $query->fetchObject();

}