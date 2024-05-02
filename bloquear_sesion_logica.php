<?php
session_start();

setcookie('id_usuario', $_SESSION["id_usuario"], time() + 20000);

session_destroy();

header("Location: bloquear_sesion.php");
?>