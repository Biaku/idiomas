<?php
if ($_POST) {
    include '../../models/Conexion.php';
    $curso = $_POST['curso'];
    $maestro = $_POST['maestro'];
    $aula = $_POST['aula'];
    $horario = $_POST['horario'];

    if ($_POST['tipo'] == 'registro') {
        $sql = "INSERT INTO grupo(aula_id,curso_id,maestro_id,horario_id) 
                VALUES ('$aula','$curso','$maestro', '$horario')";
        $query = $pdo->exec($sql);
        header("location:../../?page=adm-grupo");

    } elseif ($_POST['tipo'] == 'actualizar') {
        $aula = $_POST['aula'];
        $sql = "UPDATE grupo 
                SET                 
                aula_id='$aula', 
                curso_id='$curso', 
                maestro_id='$maestro',
                horario_id='$horario'
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
            curso.id,
            idioma.nombre
            FROM
            curso
            INNER JOIN idioma ON curso.idioma_id = idioma.id";
    $cursos = $pdo->query($sql);
    $sql = "SELECT * FROM usuario WHERE  tipo_usuario_id=2";
    $usuarios = $pdo->query($sql);

    $sql = "SELECT * FROM horario";
    $horarios = $pdo->query($sql);

} else {
//    =========================================================================================================
//    PAGINA INCIO GRUPOS

    include 'models/Conexion.php';

    // AULAS
    $sql = "SELECT * FROM aula";
    $aulas = $pdo->query($sql);

    // CURSOS
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

    // Usuarios
    $sql = "SELECT * FROM usuario WHERE tipo_usuario_id = 2";
    $usuarios = $pdo->query($sql);
    $sql = "SELECT
            aula.nombre AS nombre_aula,
            grupo.id AS idg,
            idioma.nombre AS nombre_idioma,
            nivel.nombre AS nombre_nivel,
            usuario.nombre AS nombre_maestro,
            usuario.apellidos AS ap_maestro,
            horario.descripcion AS nombre_horario
            FROM
            grupo
            INNER JOIN aula ON grupo.aula_id = aula.id
            INNER JOIN curso ON grupo.curso_id = curso.id
            INNER JOIN idioma ON curso.idioma_id = idioma.id
            INNER JOIN nivel ON curso.nivel_id = nivel.id
            INNER JOIN usuario ON grupo.maestro_id = usuario.id
            INNER JOIN horario ON grupo.horario_id = horario.id";
    $grupos = $pdo->query($sql);

    $sql = "SELECT * FROM horario";
    $horarios = $pdo->query($sql);
}