<?php
if ($_POST) {
    include '../../models/Conexion.php';
    $descripcion = $_POST['desc'];
    $capacidad = $_POST['capacidad'];
    $idioma = $_POST['idioma'];
    $estatus = $_POST['estatus'];

    if ($_POST['tipo'] == 'registro') {
        $sql = "INSERT INTO curso(capacidad,esta_abierto,nivel_id,idioma_id) 
                VALUES ('$capacidad', '$estatus','$descripcion','$idioma')";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-curso");

    } elseif ($_POST['tipo'] == 'actualizar') {
        $aula = $_POST['aula'];
        $sql = "UPDATE curso 
                SET 
                capacidad = '$capacidad', 
                esta_abierto='$estatus', 
                idioma_id='$idioma', 
                nivel_id='$descripcion'  
                WHERE id = $aula";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-curso-editar&id=$aula");

    } elseif ($_POST['tipo'] == 'borrar') {
        $aula = $_POST['aula'];
        $sql = "DELETE FROM curso WHERE id = $aula";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-curso");

    }

} elseif ($_GET['page'] == 'adm-curso-editar') {
    include 'models/Conexion.php';
    $id = $_GET['id'];
    $sql = "SELECT
            curso.capacidad,
            curso.esta_abierto,
            idioma.nombre AS nombre_idioma,
            nivel.nombre AS nombre_nivel,
            nivel.id as id_nivel,
            curso.id
            FROM
            curso
            INNER JOIN idioma ON curso.idioma_id = idioma.id
            INNER JOIN nivel ON curso.nivel_id = nivel.id
             where curso.id =$id";
    $query = $pdo->query($sql);
    $res = $query->fetchObject();

    $sql = "SELECT * FROM idioma";
    $idiomas = $pdo->query($sql);

    $sql = "SELECT * FROM nivel";
    $niveles = $pdo->query($sql);

} else {
    include 'models/Conexion.php';
    $sql = "SELECT
curso.capacidad,
curso.esta_abierto,
idioma.nombre AS nombre_idioma,
nivel.nombre AS nombre_nivel,
curso.id
FROM
curso
INNER JOIN idioma ON curso.idioma_id = idioma.id
INNER JOIN nivel ON curso.nivel_id = nivel.id

";
    $query = $pdo->query($sql);
    $sql = "SELECT * FROM idioma";
    $idiomas = $pdo->query($sql);

    $sql = "SELECT * FROM nivel";
    $niveles = $pdo->query($sql);
}





