<?php

require('fpdf/fpdf.php');
require('../../util/config.php');
class PDF extends FPDF{
var $widths;
var $aligns;

function SetWidths($w){
	$this->widths=$w;
}

function SetAligns($a){
	$this->aligns=$a;
}

function Header(){
    $this->Image("logo1.jpg" , 10 ,8, 35 , 38 , "JPG" ,"");
	$this->SetFont('Arial','',40);
	$this->Text(100,20,'Reporte de Incidencias',0,'C', 0);
    $this->Ln(40);
}

function Footer(){
	$this->SetY(-15);
	$this->SetFont('Arial','B',8);
	$this->Cell(100,10,'',0,0,'L');

}

}

$datei = $_POST['t1'];
$datef = $_POST['t2'];
$cati = $_POST['t3'];
$asu =  $_POST['t4'];
$responsable = $_POST['t5'];
$estado = $_POST['t6'];
$prioridad = $_POST['t7'];
    
    $con = new DB_Class;
	$pacientes = $con->__construct();	
	
	$pdf=new PDF('L','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	
	$pdf->SetWidths(array(10, 50, 15, 15, 15, 15, 40, 40, 15, 50));
	$pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(31,187,166);
    $pdf->SetTextColor(255);
    $pdf->Ln();

		for($i=0;$i<1;$i++)
			{  //tamaño  alto   borde
			 $pdf->Cell(10,5,"C. INC.",1,0,'C',True);
             $pdf->Cell(50,5,"DES. INC.",1,0,'C',True);
             $pdf->Cell(15,5,"F.INI",1,0,'C',True);
             $pdf->Cell(15,5,"H.INI",1,0,'C',True);
             $pdf->Cell(15,5,"F.FIN",1,0,'C',True);
             $pdf->Cell(15,5,"H.FIN",1,0,'C',True);
             $pdf->Cell(40,5,"PERSONAL",1,0,'C',True);
             $pdf->Cell(40,5,"TÉCNICO",1,0,'C',True);
             $pdf->Cell(15,5,"ESTADO",1,0,'C',True);
             $pdf->Cell(50,5,"DIAGNÓSTICO",1,0,'C',True);
             $pdf->Ln();
			}
	
	$historial = $con->__construct();	
	$strConsulta = "select i.id_incidencia as incidenciainc,
                substring(i.descripcion_incidencia, 1, 30) as descripcioninc,
                i.fini_incidencia as fincioinc,
                i.hini_incidencia as hinicioinc,
                i.ffin_incidencia as ffininc,
                i.hfin_incidencia as hfininc,
                i.cliente_incidencia as cliente,
                i.tresponsable_incidencia as responsable,
                e.descripcion_estado as estado,
                substring(d.descripcion_diagnostico, 1, 30) as diag
         from incidencia i inner join asuntoincidencia ai on i.id_asuinc = ai.id_asuinc
              inner join categoriaincidencia ci on ci.id_catinc = ai.id_catinc
              inner join estado e on e.id_estado = i.id_estado
              inner join prioridad p on p.id_prioridad = i.id_prioridad
              inner join diagnostico d on d.id_diagnostico = i.id_incidencia
         where i.tipo_incidencia = 'incidencia' and
              ai.id_asuinc = '$asu' and ci.id_catinc = '$cati' and
              i.tresponsable_incidencia = '$responsable' and
              e.id_estado = '$estado' and p.id_prioridad = '$prioridad' and
              i.ffin_incidencia between '$datei' and '$datef'";
	
	$historial = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($historial);
	
	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysql_fetch_array($historial);
						
				$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
                $pdf->Cell(10,5,$fila['incidenciainc'],1,0,'C',True);
                $pdf->Cell(50,5,$fila['descripcioninc'],1,0,'C',True);
                $pdf->Cell(15,5,$fila['fincioinc'],1,0,'C',True);
                $pdf->Cell(15,5,$fila['hinicioinc'],1,0,'C',True);
                $pdf->Cell(15,5,$fila['ffininc'],1,0,'C',True);
                $pdf->Cell(15,5,$fila['hfininc'],1,0,'C',True);
                $pdf->Cell(40,5,$fila['cliente'],1,0,'C',True);
                $pdf->Cell(40,5,$fila['responsable'],1,0,'C',True);
                $pdf->Cell(15,5,$fila['estado'],1,0,'C',True);                
                $pdf->Cell(50,5,$fila['diag'],1,0,'C',True);
				$pdf->Ln();//30,7, utf8_decode($fila['nombre']),1, 0 , 'L', $bandera
        }
        
$pdf->Output();
?>