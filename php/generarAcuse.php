<?php
//Falta la direccion de la libreria fpdf
require('librerias/fpdf/fpdf.php');
        $nombre=$_POST['nombre'];
        $apellidoPaterno=$_POST['apellidoPaterno'];
        $apellidoMaterno=$_POST['apellidoMaterno'];
        $curp=$_POST['curp'];
        $telefonoFijo=$_POST['telefonoFijo'];
        $telefonoCelular=$_POST['telefonoCelular'];
        $direccion=$_POST['direccion'];
        $municipio=$_POST['municipio'];

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Ln(5);
    // Logo
    $this->Image('images/moroleonLogo.png',10,16,40);
    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(50,10,'ACUSE DE APOYO',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
//Datos del beneficiario
$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(60,178,243);
$pdf->Cell(190,8,utf8_decode('Datos del beneficiario:'),1,1,'C',1);
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(100,150,230);
$pdf->Cell(20,8,utf8_decode('Nombre:'),1,0,'L',1);
$pdf->SetFillColor(41,220,143);
$pdf->Cell(170,8,utf8_decode($nombre),1,1,'L',1);
$pdf->SetFillColor(100,150,230);
$pdf->Cell(35,8,utf8_decode('Apellido Paterno:'),1,0,'L',1);
$pdf->SetFillColor(41,220,143);
$pdf->Cell(155,8,utf8_decode($apellidoPaterno),1,1,'L',1);
$pdf->SetFillColor(100,150,230);
$pdf->Cell(35,8,utf8_decode('Apellido Materno:'),1,0,'L',1);
$pdf->SetFillColor(41,220,143);
$pdf->Cell(155,8,utf8_decode($apellidoMaterno),1,1,'L',1);
$pdf->SetFillColor(100,150,230);
$pdf->Cell(16,8,utf8_decode('CURP:'),1,0,'L',1);
$pdf->SetFillColor(41,220,143);
$pdf->Cell(174,8,utf8_decode($curp),1,1,'L',1);

$pdf->SetFillColor(100,150,230);
$pdf->Cell(25,8,utf8_decode('Teléfono fijo:'),1,0,'L',1);
$pdf->SetFillColor(41,220,143);
$pdf->Cell(35,8,utf8_decode($telefonoFijo),1,0,'L',1);
$pdf->SetFillColor(100,150,230);
$pdf->Cell(32,8,utf8_decode('Teléfono celular:'),1,0,'L',1);
$pdf->SetFillColor(41,220,143);
$pdf->Cell(98,8,utf8_decode($telefonoCelular),1,1,'L',1);

$pdf->SetFillColor(100,150,230);
$pdf->Cell(22,8,utf8_decode('Dirección:'),1,0,'L',1);
$pdf->SetFillColor(41,220,143);
$pdf->Cell(75,8,utf8_decode(),1,0,'L',1);
$pdf->SetFillColor(100,150,230);
$pdf->Cell(22,8,utf8_decode('Municipio:'),1,0,'L',1);
$pdf->SetFillColor(41,220,143);
$pdf->Cell(71,8,utf8_decode($municipio),1,1,'L',1);

//Datos del apoyo
/*
$pdf->Cell(22,8,utf8_decode(''),0,1,'L');
$pdf->Cell(75,8,utf8_decode(''),0,1,'L');

$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(60,178,243);
$pdf->Cell(190,8,utf8_decode('Datos del apoyo:'),1,1,'C',1);
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(100,150,230);
$pdf->Cell(38,8,utf8_decode('Nombre del apoyo:'),1,0,'L',1);
$pdf->SetFillColor(41,220,143);
$pdf->Cell(152,8,utf8_decode('datos'),1,1,'L',1);

$pdf->SetFillColor(100,150,230);
$pdf->Cell(32,8,utf8_decode('Fecha de inicio:'),1,0,'L',1);
$pdf->SetFillColor(41,220,143);
$pdf->Cell(40,8,utf8_decode('datos'),1,0,'L',1);
$pdf->SetFillColor(100,150,230);
$pdf->Cell(42,8,utf8_decode('Fecha de terminación:'),1,0,'L',1);
$pdf->SetFillColor(41,220,143);
$pdf->Cell(76,8,utf8_decode('datos'),1,1,'L',1);

$pdf->SetFillColor(100,150,230);
$pdf->Cell(25,8,utf8_decode('Categoría:'),1,0,'L',1);
$pdf->SetFillColor(41,220,143);
$pdf->Cell(55,8,utf8_decode('datos'),1,0,'L',1);
$pdf->SetFillColor(100,150,230);
$pdf->Cell(26,8,utf8_decode('Presupuesto:'),1,0,'L',1);
$pdf->SetFillColor(41,220,143);
$pdf->Cell(32,8,utf8_decode('datos'),1,0,'L',1);
$pdf->SetFillColor(100,150,230);
$pdf->Cell(20,8,utf8_decode('Cantidad:'),1,0,'L',1);
$pdf->SetFillColor(41,220,143);
$pdf->Cell(32,8,utf8_decode('datos'),1,1,'L',1);
*/
$pdf->Ln(100);

$pdf->Cell(190,8,
utf8_decode('_________________________________________')
,0,1,'C');
$pdf->Ln(10);
$pdf->Cell(190,8,utf8_decode('Firma'),0,1,'C');


$pdf->Output();
echo "1";
?>