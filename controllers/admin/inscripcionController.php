<?php

if ($_POST) {
    include '../../models/Conexion.php';
    $grupo = $_POST['grupo'];
    $alumno = $_POST['alumno'];
    $tipo = $_POST['tipo'];

    if ($tipo == 'registro') {
        $sql = "INSERT INTO grupo_alumno (usuario_id,grupo_id) VALUES ('$alumno', '$grupo')";
        $query = $pdo->exec($sql);
        header('location:../../?page=adm-inscripcion');
    }
} else {
    include 'models/Conexion.php';
    $sql = "SELECT
            usuario.id,
            usuario.nombre,
            usuario.apellidos
            FROM
            usuario
            WHERE tipo_usuario_id = 1
            ";
    $alumnos = $pdo->query($sql);

    $sql = "SELECT
            grupo.id,
            idioma.nombre AS nombre_idioma,
            nivel.nombre AS nombre_nivel,
            aula.nombre AS nombre_aula
            FROM
            grupo
            INNER JOIN curso ON grupo.curso_id = curso.id
            INNER JOIN idioma ON curso.idioma_id = idioma.id
            INNER JOIN nivel ON curso.nivel_id = nivel.id
            INNER JOIN aula ON grupo.aula_id = aula.id";
    $grupos = $pdo->query($sql);

    $sql = "SELECT
            grupo_alumno.id,
            usuario.nombre,
            usuario.apellidos,
            idioma.nombre as nombre_idioma,
            nivel.nombre as nombre_nivel
            FROM
            grupo_alumno
            INNER JOIN usuario ON grupo_alumno.usuario_id = usuario.id
            INNER JOIN grupo ON grupo_alumno.grupo_id = grupo.id
            INNER JOIN curso ON grupo.curso_id = curso.id
            INNER JOIN idioma ON curso.idioma_id = idioma.id
            INNER JOIN nivel ON curso.nivel_id = nivel.id";
    $inscripciones = $pdo->query($sql);

    $pdo = null;

}