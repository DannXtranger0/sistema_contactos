<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>
<body>
    <h1>INICIO DE SESIÓN</h1>
    

    <form method="post">
    Correo Electronico <input type="text" name="correoIngresado" required> <br><br>
    Contraseña <input type="password" name="contrasenaIngresada" required> <br> <br> <br>
    <input type="submit" value="Iniciar Sesión">  <br>

    </form>
</body>
</html>

<?php
#Login, el cual te permite entrasr en registro sino tienes una cuenta
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST["correoIngresado"]) || !empty($_POST["contrasenaIngresada"])){

        include_once("conexion.php");

        $sql = "SELECT * FROM usuarios WHERE correo_usuario = :correo_usuario and
        contrasena = :contrasena";

        $stmt = $conn -> prepare($sql); 
        $stmt -> bindParam(":correo_usuario",$_POST["correoIngresado"]);
        $stmt -> bindParam(":contrasena",$_POST["contrasenaIngresada"]);

        $stmt ->execute();
        
        if($stmt -> rowCount() > 0){
            echo "siuuu";
        }else{
            echo "nouuuu";
        }


    }else{
        echo "RELLENE LOS CAMPOS!";
    }
}

?>