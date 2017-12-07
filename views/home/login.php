<?php include $templates_navbar ?>
<body>
<?php include $templates_header ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Iniciar sesion</h1>
                    <form action="controllers/admin/loginController.php" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" name="pass" required>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Aceptar">
                    </form>
                </div>
                <div class="card-footer">
                    <?php
                    session_start();
                    if (isset($_SESSION['error']) && $_SESSION['error']) {
                        echo "<h1 style='color: crimson'>Credenciales incorrectas</h1>";
                        session_destroy();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer>
        <p>Instituto de Idiomas de México 2017</p>
    </footer>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="recursos/js/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="recursos/js/bootstrap.min.js"></script>
</body>
</html>