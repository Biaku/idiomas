<?php include $templates_navbar ?>
<body>
<?php include $templates_header ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Iniciar sesion</h1>
                    <form action="controllers/admin/loginController.php" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" name="pass" required>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Recordarme
                            </label>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Aceptar">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Registro</h1>
                    <form>
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Correo electronico</label>
                            <input type="email" class="form-control" >
                        </div>
                        <a href="?page=cpprofesor" class="btn btn-primary">Registrarse</a>
                    </form>
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