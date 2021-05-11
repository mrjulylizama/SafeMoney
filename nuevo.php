<?php
include('php\conexion.php');
require __DIR__ . "/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
 
$documento = new Spreadsheet();
$documento
    ->getProperties()
    ->setCreator("Aquí va el creador, como cadena")
    ->setLastModifiedBy('Parzibyte') // última vez modificado por
    ->setTitle('Mi primer documento creado con PhpSpreadSheet')
    ->setSubject('El asunto')
    ->setDescription('Este documento fue generado para parzibyte.me')
    ->setKeywords('etiquetas o palabras clave separadas por espacios')
    ->setCategory('La categoría');

$sheet=$documento->getActiveSheet();

$sheet->setCellValue('D5','Monto');
$sheet->setCellValue('E5','Titulo');
$sheet->setCellValue('F5','Descripcion');
$sheet->setCellValue('G5','Fecha');

$fila=6;

$sql="SELECT monto,titulo,descripcion,fecha  FROM ingresos where id_usuario=1 AND fecha BETWEEN '2021-02-12' AND '2021-04-30' ORDER by fecha";
$result=mysqli_query($mysqli,$sql);
while($mostrar=mysqli_fetch_array($result))
    {
        $sheet->setCellValue('D'.$fila,'$'.$mostrar['monto']);  
        $sheet->setCellValue('E'.$fila,$mostrar['titulo']); 
        $sheet->setCellValue('F'.$fila,$mostrar['descripcion']); 
        $sheet->setCellValue('G'.$fila,$mostrar['fecha']);  

        $fila++;
    }

 
$nombreDelDocumento = "Ingresos.xlsx";
/**
 * Los siguientes encabezados son necesarios para que
 * el navegador entienda que no le estamos mandando
 * simple HTML
 * Por cierto: no hagas ningún echo ni cosas de esas; es decir, no imprimas nada
 */
 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
header('Cache-Control: max-age=0');
 
$writer = IOFactory::createWriter($documento, 'Xlsx');
$writer->save('php://output');
exit;