<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('location:?page=login');
}
?>
<?php require_once 'controllers/admin/usuarioController.php' ?>
<?php include $templates_header ?>
    <body>
<?php include $templates_navbar_adm ?>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="controllers/admin/usuarioController.php" method="post" id="form">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="<?= $usuario->nombre?>">

                            </div>
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" value="<?= $usuario->apellidos?>">

                            </div>
                            <div class="form-group">
                                <label>Correo</label>
                                <input type="email" class="form-control" name="correo" value="<?= $usuario->correo?>">

                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input type="password" class="form-control" name="pass" value="<?= $usuario->contrasena?>">
                            </div>
                            <div class="form-group">
                                <label>Telefono</label>
                                <input type="tel" class="form-control" name="tel" value="<?= $usuario->telefono?>">
                            </div>
                            <div class="form-group">
                                <label>Domicilio</label>
                                <input type="text" class="form-control" name="domicilio" value="<?= $usuario->domicilio?>">
                            </div>

                            <div class="form-group">
                                <label>Tipo de usuario</label>
                                <select name="tipo_usuario" class="form-control">
                                    <?php
                                    foreach ($tipo_usuarios as $row) {
                                        if ($usuario->tipo_usuario_id == $row['id']) {
                                            echo "<option value='$row[id]' selected>$row[tipo]</option>";
                                        } else {
                                            echo "<option value='$row[id]'>$row[tipo]</option>";
                                        }
                                    }

                                    ?>
                                </select>

                            </div>
                            <br>
                            <input type="hidden" name="aula" value="<?= $id ?>">
                            <input type="hidden" name="tipo" value="actualizar">
                            <a href="?page=adm-usuario" class="btn btn-dark">Regresar</a>
                            <input type="submit" class="btn btn-primary" value="Actualizar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

<?php include $templates_footer_adm ?>