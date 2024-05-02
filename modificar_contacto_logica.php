<?php
session_start();
include_once("conexion.php");
$id_contacto = $_SESSION["id_contacto"];
$nombre_contacto = $_POST["nombre_contacto"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];

$sql = "UPDATE contactos SET nombre_contacto = :nombre_contacto,
 correo = :correo, telefono = :telefono WHERE id_contacto = :id_contacto";

$stmt = $conexion->prepare($sql);

$stmt->bindParam(':nombre_contacto', $nombre_contacto);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':telefono', $telefono);
$stmt->bindParam(':id_contacto', $id_contacto);

if ($stmt->execute()) {
    header('Location: listar_contactos.php');
    exit; // Always exit after a header redirect
} else {
    echo "Error updating contact: " . $stmt->errorInfo()[2]; 
}
?>