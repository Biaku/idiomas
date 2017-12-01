<?php
require_once '../../models/Conexion.php';
session_destroy();
header("location:../../index.php");