function alerta() {
  var respuesta = confirm(
    "Este gasto se acerca al monto mínimo, ¿desea continuar?"
  );

  if (respuesta == true) {
    return true;
  } else {
    return false;
  }
}