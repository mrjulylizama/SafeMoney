<?php

require "php\conexion.php";

date_default_timezone_set('America/El_Salvador');
if (isset($_POST['agregar'])) {
	if (strlen($_POST['descripcion']) >= 1 && strlen($_POST['cantidad']) >= 1 && strlen($_POST['categoria']) >= 1) {
		$id_usuario = "";
		$fecha = "";
		$descripcion = "";
		$cantidad = "";
		$categoria = "";
		$id = random_int(25,100);
		$id_usuario = trim($_POST['id']);
		$fecha = date("y/m/d");
		$descripcion = trim($_POST['descripcion']);
		$cantidad = trim($_POST['cantidad']);
		$categoria = trim($_POST['categoria']);
		$consulta = "INSERT INTO egresos(id, id_usuario, fecha, descripcion, cantidad, categoria) VALUES ('$id','$id_usuario', '$fecha', '$descripcion','$cantidad','$categoria')";
		$resultado = mysqli_query($mysqli, $consulta);

		if ($resultado) {
?>
			<h3 class="#">¡Gasto agregado correctamente!</h3>
		<?php

		} else {

		?>
			<h3 class="#">¡Error al ingresar gasto!</h3>
		<?php
		echo $id_usuario, $fecha, $descripcion, $cantidad, $categoria;
		}
	} else {
		?>
		<h3 class="#">¡Por favor complete los campos!</h3>
<?php

	}
}
