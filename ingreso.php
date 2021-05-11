<?php
session_start();
require_once "conexion.php";

date_default_timezone_set('America/El_Salvador');
$fecha=date("Y-m-d");

$titulo = $_POST['titulo'];
$monto = $_POST['monto'];
$descripcion = $_POST['descripcion'];
$id_usuario = $_SESSION['id'];

$query = $pdo->prepare("INSERT INTO ingresos(monto, titulo, descripcion, fecha, id_usuario)VALUES(:monto,:titulo,:descripcion, :fecha,:id_usuario)");
$query->bindParam(':monto',$monto);
$query->bindParam(':titulo',$titulo);
$query->bindParam(':descripcion',$descripcion);
$query->bindParam(':fecha',$fecha);
$query->bindParam(':id_usuario',$id_usuario);

if($query->execute()){
    header("Location: ingresos.php");
}else{
    echo "no se a podido guardar los datos";
    
};