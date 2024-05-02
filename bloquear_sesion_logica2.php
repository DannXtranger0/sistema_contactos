<?php
include_once("conexion.php");
$sql = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";

$stmt = $conexion->prepare($sql);

$stmt->bindParam(':id_usuario', $_COOKIE["id_usuario"]);
$stmt->execute();

$usuarioExtraido = $stmt->fetch(PDO::FETCH_ASSOC);

if($usuarioExtraido["contrasena"] == $_POST["contrasena"]){
    header('Location: logica_inicio_sesion.php');
}else{
    echo "NO ERES TU";
}
?>