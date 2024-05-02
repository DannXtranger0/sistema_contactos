<?php 
include_once("conexion.php");

if(isset($_COOKIE["id_usuario"])){
    $sql = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario";
    $stmt = $conexion->prepare($sql);
$stmt ->bindParam(':id_usuario',$_COOKIE["id_usuario"]);
$stmt ->execute();

$datosIngresados = $stmt->fetch(PDO::FETCH_ASSOC);

    session_start();

    $_SESSION["id_usuario"] =$datosIngresados["id_usuario"] ;
    $_SESSION['usuario'] = $datosIngresados["usuario"];


    header('Location: listar_contactos.php');
}else{


$nombre_usuario_ingresado = $_POST["usuario_ingresado"];
$contrasena_ingresada = $_POST["contrasena_ingresada"];

$sql = "SELECT * FROM usuarios WHERE usuario = :usuario and  contrasena = :contrasena";
$stmt = $conexion->prepare($sql);
$stmt ->bindParam(':usuario',$nombre_usuario_ingresado,PDO::PARAM_STR);
$stmt ->bindParam(':contrasena',$contrasena_ingresada,PDO::PARAM_STR);
$stmt ->execute();

$datosIngresados = $stmt->fetch(PDO::FETCH_ASSOC);

if($nombre_usuario_ingresado == $datosIngresados["usuario"] && $contrasena_ingresada == $datosIngresados["contrasena"]){
    session_start();

    $_SESSION["id_usuario"] =$datosIngresados["id_usuario"] ;
    $_SESSION['usuario'] = $datosIngresados["usuario"];


    header('Location: listar_contactos.php');
}else{
    echo "nostas";
}
}
?>