<?php
include "directorios.php";

if (isset($_GET["page"])) {
    switch ($_GET['page']) {
        # pagina principal
        case 'nosotros':
            include 'views/home/nosotros.php';
            break;
        case 'contacto':
            include 'views/home/contacto.php';
            break;
        case 'login':
            include 'views/home/login.php';
            break;
        # perfiles
        case 'cpalumno':
            include 'views/cpanel/alumnos/alumnos.php';
            break;
        # administrador
        case 'adm-inicio':
            include 'views/cpanel/admin/inicio.php';
            break;
        case 'adm-aula':
            include 'views/cpanel/admin/aula.php';
            break;
        case 'adm-aula-editar':
            include 'views/cpanel/admin/aula_editar.php';
            break;
        case 'adm-curso':
            include 'views/cpanel/admin/curso.php';
            break;
        case 'adm-curso-editar':
            include 'views/cpanel/admin/curso_editar.php';
            break;
        case 'adm-grupo':
            include 'views/cpanel/admin/grupo.php';
            break;
        case 'adm-grupo-editar':
            include 'views/cpanel/admin/grupo_editar.php';
            break;
        case 'adm-horario':
            include 'views/cpanel/admin/horario.php';
            break;
        case 'adm-horario-editar':
            include 'views/cpanel/admin/horario_editar.php';
            break;
        case 'adm-idioma':
            include 'views/cpanel/admin/idioma.php';
            break;
        case 'adm-idioma-editar':
            include 'views/cpanel/admin/idioma_editar.php';
            break;
    }
} else {
    include 'views/home/inicio.php';
}



//if (isset($_GET["page"])) {
//    $view = $_GET['page'];
//
//    if (substr($view, 0, 2) == 'cp') {
//        $viewcp = substr($view, 2);
//        $view_path = "views/" . $viewcp . "s/";
//    } else {
//        $view_path = "views/";
//    }
//
//    if ($_GET["page"] === $view) {
//        include $view_path . $view . ".php";
//    }
//} else {
//    include 'views/inicio.php';
//}