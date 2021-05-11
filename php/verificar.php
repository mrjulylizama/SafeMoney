<?php
session_start();
require "conexion.php";
if ($_POST) {
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
    $sql="SELECT id,password,nombre FROM usuarios WHERE email='$usuario'";
    $resultado=$mysqli->query($sql);
    $num=$resultado->num_rows;
    
    if ($num>0) {
        $row=$resultado->fetch_assoc();
        $password_bd= $row['password'];
        echo $usuario;
    echo $password;
        if ($password_bd==$password) {

            $_SESSION['nombre']=$row['nombre'];
            $_SESSION['id']=$row['id'];

            header("location: ../index.php");
        }else{
            echo"La contraseña es incorrecta";
        }
    }else{
        echo "No existe el usuario";
    }
}
?>