<?php
if ($_POST) {
    include '../../models/Conexion.php';
    $descripcion = $_POST['desc'];
    if ($_POST['tipo'] == 'registro') {
        $sql = "INSERT INTO idioma(nombre) VALUES ('$descripcion')";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-idioma");

    } elseif ($_POST['tipo'] == 'actualizar') {
        $aula = $_POST['aula'];
        $sql = "UPDATE idioma SET nombre = '$descripcion' WHERE id = $aula";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-idioma-editar&id=$aula");

    }
    elseif ($_POST['tipo'] == 'borrar') {
        $aula = $_POST['aula'];
        $sql = "DELETE FROM idioma WHERE id = $aula";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-idioma");

    }

} elseif ($_GET['page'] == 'adm-idioma-editar') {
    include 'models/Conexion.php';
    $id = $_GET['id'];
    $sql = "select nombre from idioma where id =$id";
    $query = $pdo->query($sql);
    $res = $query->fetchObject();

} else {
    include 'models/Conexion.php';
    $sql = "SELECT * FROM idioma";
    $query = $pdo->query($sql);
}





