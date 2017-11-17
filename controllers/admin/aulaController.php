<?php
if ($_POST) {
    include '../../models/Conexion.php';
    $descripcion = $_POST['desc'];
    if ($_POST['tipo'] == 'registro') {
        $sql = "INSERT INTO aula(nombre) VALUES ('$descripcion')";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-aula");

    } elseif ($_POST['tipo'] == 'actualizar') {
        $aula = $_POST['aula'];
        $sql = "UPDATE aula SET nombre = '$descripcion' WHERE id = $aula";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-aula-editar&id=$aula");

    }
    elseif ($_POST['tipo'] == 'borrar') {
        $aula = $_POST['aula'];
        $sql = "DELETE FROM aula WHERE id = $aula";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-aula");

    }

} elseif ($_GET['page'] == 'adm-aula-editar') {
    include 'models/Conexion.php';
    $id = $_GET['id'];
    $sql = "select nombre from aula where id =$id";
    $query = $pdo->query($sql);
    $res = $query->fetchObject();

} else {
    include 'models/Conexion.php';
    $sql = "SELECT * FROM aula";
    $query = $pdo->query($sql);
}





