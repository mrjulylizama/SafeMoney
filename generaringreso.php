<?php
session_start();
$id=$_SESSION['id'];
include('php\conexion.php');
include('Classes\PHPExcel.php');
$ini=$_POST['fecha1'];
$fin=$_POST['fecha2'];

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
$sheet->setCellValue('F3','Reporte de '.$ini.' hasta '.$fin);
$sheet->getStyle('F3')->getFont()->setBold(true)->setSize(18);
$sheet->setCellValue('D5','Monto');
$sheet->setCellValue('E5','Titulo');
$sheet->setCellValue('F5','Descripcion');
$sheet->setCellValue('G5','Fecha');
$sheet->getStyle('D5')->getBorders();
$sheet->getColumnDimension('D')->setAutoSize(true);
$sheet->getColumnDimension('E')->setAutoSize(true);
$sheet->getColumnDimension('F')->setAutoSize(true);
$sheet->getColumnDimension('G')->setAutoSize(true);

$fila=6;

$sql="SELECT monto,titulo,descripcion,fecha  FROM ingresos where id_usuario=$id AND fecha BETWEEN '$ini' AND '$fin' ORDER by fecha";
$result=mysqli_query($mysqli,$sql);
while($mostrar=mysqli_fetch_array($result))
    {
        $sheet->setCellValue('D'.$fila,'$'.$mostrar['monto']);  
        $sheet->setCellValue('E'.$fila,$mostrar['titulo']); 
        $sheet->setCellValue('F'.$fila,$mostrar['descripcion']); 
        $sheet->setCellValue('G'.$fila,$mostrar['fecha']);  
        $fila++;
    }
    

 
$nombreDelDocumento = "Ingresos_de ".$ini." hasta ".$fin."_SafeMoney.xlsx";
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