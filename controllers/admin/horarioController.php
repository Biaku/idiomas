<?php
if ($_POST) {
    include '../../models/Conexion.php';
    $descripcion = $_POST['desc'];
    if ($_POST['tipo'] == 'registro') {
        $sql = "INSERT INTO horario(descripcion) VALUES ('$descripcion')";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-horario");

    } elseif ($_POST['tipo'] == 'actualizar') {
        $aula = $_POST['aula'];
        $sql = "UPDATE horario SET descripcion = '$descripcion' WHERE id = $aula";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-horario-editar&id=$aula");

    }
    elseif ($_POST['tipo'] == 'borrar') {
        $aula = $_POST['aula'];
        $sql = "DELETE FROM horario WHERE id = $aula";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-horario");

    }

} elseif ($_GET['page'] == 'adm-horario-editar') {
    include 'models/Conexion.php';
    $id = $_GET['id'];
    $sql = "select descripcion from horario where id =$id";
    $query = $pdo->query($sql);
    $res = $query->fetchObject();

} else {
    include 'models/Conexion.php';
    $sql = "SELECT * FROM horario";
    $query = $pdo->query($sql);
}





