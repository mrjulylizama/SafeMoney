<?php

require 'php\conexion.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$contrasena = $_POST['contrasena'];
$foto = $_POST['foto'];

$insertar = "INSERT INTO usuarios VALUES ('','$nombre','$apellido','$email','$contrasena','$foto')"; 


$query = mysqli_query($mysqli, $insertar);

if($query){

    echo "correcto";

    header('Location: login nuevo.html');
    
}else{

    echo "incorrecto";
}    

?>