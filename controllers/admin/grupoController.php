<?php
if ($_POST) {
    include '../../models/Conexion.php';
    $curso = $_POST['curso'];
    $maestro = $_POST['maestro'];
    $clave = $_POST['clave'];
    $aula = $_POST['aula'];
    $horario = $_POST['horario'];

    if ($_POST['tipo'] == 'registro') {
        $sql = "INSERT INTO grupo(clave,aula_id,curso_id,maestro_id,horario_id) 
                VALUES ('$clave', '$aula','$curso','$maestro', '$horario')";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-grupo");

    } elseif ($_POST['tipo'] == 'actualizar') {
        $aula = $_POST['aula'];
        $sql = "UPDATE grupo 
                SET 
                clave = '$clave', 
                aula_id='$aula', 
                curso_id='$curso', 
                maestro_id='$maestro'  
                WHERE id = $aula";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-grupo-editar&id=$aula");

    } elseif ($_POST['tipo'] == 'borrar') {
        $aula = $_POST['aula'];
        $sql = "DELETE FROM grupo WHERE id = $aula";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-grupo");

    }

} elseif ($_GET['page'] == 'adm-grupo-editar') {
    include 'models/Conexion.php';
    $id = $_GET['id'];

    $sql = "select * from grupo where id =$id";
    $query = $pdo->query($sql);
    $res = $query->fetchObject();

    $sql = "SELECT * FROM aula";
    $aulas = $pdo->query($sql);

    $sql = "SELECT
            curso.descripcion,
            curso.id,
            idioma.nombre
            FROM
            curso
            INNER JOIN idioma ON curso.idioma_id = idioma.id";
    $cursos = $pdo->query($sql);
    $sql = "SELECT * FROM usuario";
    $usuarios = $pdo->query($sql);

} else {
    include 'models/Conexion.php';
    $sql = "SELECT * FROM aula";
    $aulas = $pdo->query($sql);

    $sql = "SELECT
            curso.capacidad,
            curso.esta_abierto,
            idioma.nombre AS nombre_idioma,
            nivel.nombre AS nombre_nivel,
            curso.id
            FROM
            curso
            INNER JOIN idioma ON curso.idioma_id = idioma.id
            INNER JOIN nivel ON curso.nivel_id = nivel.id";
    $cursos = $pdo->query($sql);

    $sql = "SELECT * FROM usuario WHERE id = 2";
    $usuarios = $pdo->query($sql);
    $sql = "SELECT
            aula.nombre AS aula,
            idioma.nombre AS curso_idioma,
            usuario.nombre AS maestro,
            usuario.apellidos AS maestro_ap,
            grupo.id AS idg,
            horario.descripcion AS horario,
            nivel.nombre AS nivel_idioma
            FROM
            grupo
            INNER JOIN aula ON grupo.aula_id = aula.id
            INNER JOIN curso ON grupo.curso_id = curso.id
            INNER JOIN idioma ON curso.idioma_id = idioma.id
            INNER JOIN usuario ON grupo.maestro_id = usuario.id
            INNER JOIN horario ON grupo.horario_id = horario.id ,
            nivel";
    $grupos = $pdo->query($sql);

    $sql = "SELECT * FROM horario";
    $horarios = $pdo->query($sql);
}