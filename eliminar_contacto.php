<?php
include_once("conexion.php");
$id_contacto = $_GET["id_contacto"];

$sql = "DELETE FROM contactosXUsuarios WHERE id_contacto = :id_contacto";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(":id_contacto",$id_contacto);
$stmt->execute();

$sql = "DELETE FROM contactos WHERE id_contacto = :id_contacto";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(":id_contacto",$id_contacto);
$stmt->execute();

exit();
header("Location: listar_contactos.php");
?>