<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php require_once 'controllers/admin/horarioController.php' ?>
<?php include $templates_header ?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/admin/horarioController.php" method="post">
                            <div class="form-group">
                                <label>Descripcion</label>
                                <input type="text" class="form-control" name="desc" value="<?= $res->descripcion?>">
                                <input type="hidden" name="aula" value="<?= $id ?>">
                                <input type="hidden" name="tipo" value="actualizar">
                            </div>
                            <a href="?page=adm-horario" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Actualizar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

<?php include $templates_footer_adm ?>