<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
include 'models/Conexion.php';
$id = $_GET['id'];
$query = $pdo->query("SELECT * FROM tipo_usuario WHERE id=$id;");
$tipo = $query->fetchObject();

if ($_POST) {
    $nombre = $_POST['nombre'];
    $sql = "UPDATE tipo_usuario SET tipo = '$nombre' WHERE id=$id";
    $pdo->exec($sql);
    header('location:?page=adm-tipo-usuario-editar&id='.$id.'');
}
?>
<?php include $templates_header ?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" id="form">
                            <div class="form-group">
                                <label>Tipo</label>
                                <input type="text" class="form-control" name="nombre" value="<?= $tipo->tipo ?>">
                            </div>
                            <input type="hidden" name="tipo" value="registro">

                            <input type="hidden" name="aula" value="<?= $id ?>">
                            <input type="hidden" name="tipo" value="actualizar">
                            <a href="?page=adm-tipo-usuario" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Actualizar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

<?php include $templates_footer_adm ?>