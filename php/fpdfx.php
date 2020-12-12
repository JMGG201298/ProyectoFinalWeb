<?php
    require("../fpdf/fpdf.php");

    class PDF extends FPDF
    {
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../images/moroleonLogo.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30,10,'Reporte',1,0,'C');
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
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    }

    include "ConexionConsultar.php";
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',10);
    $objeto=new ConexionConsultar();
    
    $resultado=$objeto->obtenerBeneficiarios2();
    while($row=$resultado->fetch_assoc()){
        $pdf->cell(7,6,$row["id_persona"],1,0,"C",0);
        $pdf->cell(10,6,$row["nombre"],1,0,"C",0);
        $pdf->cell(25,6,$row["apellido_paterno"],1,0,"C",0);
        $pdf->cell(25,6,$row["apellido_materno"],1,0,"C",0);
        $pdf->cell(32,6,$row["curp"],1,0,"C",0);
        $pdf->cell(15,6,$row["telefono_fijo"],1,0,"C",0);
        $pdf->cell(15,6,$row["telefono_celular"],1,0,"C",0);
        $pdf->cell(20,6,$row["direccion"],1,0,"C",0);
        $pdf->cell(20,6,$row["apoyo"],1,0,"C",0);
        $pdf->cell(20,6,$row["estatus"],1,1,"C",0);
    }
    // Creación del objeto de la clase heredada
   
    
    $pdf->Output();
?>