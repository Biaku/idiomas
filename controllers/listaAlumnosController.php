<?php
$id_grupo = $_GET['idg'];

// Selecciona todos los alumnos inscritos a ese grupo
$sql = "SELECT
        usuario.nombre,
        usuario.apellidos,
        grupo_alumno.grupo_id
        FROM
        grupo_alumno
        INNER JOIN usuario ON grupo_alumno.usuario_id = usuario.id
        WHERE grupo_id = $id_grupo";


// Aqui iria lo del PDF