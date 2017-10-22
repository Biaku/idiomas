<?php
$base_dir = getcwd();
# ---------------------------------------------------
# Recursos
# ---------------------------------------------------
$recursos_dir = $base_dir . "\\recursos";

#Bootstrap
$recursos_bs_css = "recursos\\css\\bootstrap.min.css";
$recursos_bs_js = "recursos\\js\\bootstrap.min.js";
$recursos_bs_jq = "recursos\\js\\jquery-3.2.1.slim.min.js";

#angular
$recursos_angularjs = "https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js";
$recursos_angular_controller_dir = "recursos\\js\\angular_controllers";
$recursos_alumno_controller = $recursos_angular_controller_dir . "\\alumnosController.js";


# Templates
$templates_dir = $base_dir . "\\views\\template";
$templates_navbar = $base_dir . "\\views\\template\\navbar.php";
$templates_header = $base_dir . "\\views\\template\\header.php";
$templates_navbar_cp = $base_dir . "\\views\\template\\navbar_cp.php";
$templates_header_cp = $base_dir . "\\views\\template\\header_cp.php";
$templates_navbar_adm = $base_dir . "\\views\\template\\navbar_adm.php";
$templates_footer_adm = $base_dir . "\\views\\template\\footer_adm.php";
