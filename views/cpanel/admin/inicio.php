<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php include $templates_header ?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Bienvenido <?= $_SESSION['usuario']->nombre ?></h1>
                <h2>Elige una opcion de la barra de navegacion que se encuentra arriba</h2>
            </div>
        </div>
    </div>
<?php include $templates_footer_adm ?>