<?php
session_start();
$id=$_SESSION['id'];
include('php\conexion.php');


$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$email=$_POST['email'];
$password=$_POST['pass'];
$montoM=$_POST['montoM'];

$sql="UPDATE `usuarios` SET `nombre`='$nombre',`apellidos`='$apellidos',`email`='$email',`password`='$password', `montoM`='$montoM'  WHERE id=$id";
$resultado=$mysqli->query($sql);



echo '<script language="javascript">alert("DATOS GUARDADOS");window.location.href="conf.php"</script>';

?>
