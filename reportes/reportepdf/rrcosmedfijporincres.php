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

	$datei= $_REQUEST['t1'];
	$datef= $_REQUEST['t2'];
    
    $con = new DB_Class;
	$pacientes = $con->__construct();	
	
	$pdf=new PDF('L','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	
	$pdf->SetWidths(array(17, 50, 15, 15, 15, 15, 20, 40, 40, 18, 20));
	$pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(31,187,166);
    $pdf->SetTextColor(255);
    $pdf->Ln();

		for($i=0;$i<1;$i++)
			{  //tamaño  alto   borde
			 $pdf->Cell(17,5,"CÓDIGO",1,0,'C',True);
             $pdf->Cell(50,5,"DESCRIPCIÓN",1,0,'C',True);
             $pdf->Cell(15,5,"F.INI",1,0,'C',True);
             $pdf->Cell(15,5,"H.INI",1,0,'C',True);
             $pdf->Cell(15,5,"F.FIN",1,0,'C',True);
             $pdf->Cell(15,5,"H.FIN",1,0,'C',True);
             $pdf->Cell(20,5,"T. INC.",1,0,'C',True);
             $pdf->Cell(40,5,"PERSONAL",1,0,'C',True);
             $pdf->Cell(40,5,"TÉCNICO",1,0,'C',True);
             $pdf->Cell(18,5,"ESTADO",1,0,'C',True);
             $pdf->Cell(18,5,"COSTO",1,0,'C',True);
             $pdf->Ln();
			}
	
	$historial = $con->__construct();	
	$strConsulta = "select i.id_incidencia as incidenciainc,
                substring(i.descripcion_incidencia, 1, 30) as descripcioninc,
                i.fini_incidencia as fincioinc,
                i.hini_incidencia as hinicioinc,
                i.ffin_incidencia as ffininc,
                i.hfin_incidencia as hfininc,
                substring(ca.descripcion_catinc, 1, 12) as cinc,
                substring(i.cliente_incidencia, 1, 20) as cliente,
                substring(i.tresponsable_incidencia, 1, 20) as responsable,
                e.descripcion_estado as tipoinc,
                
                ((p.sueldo_persona/864000) * (time_to_sec(timediff(TIMESTAMP(i.ffin_incidencia,i.hfin_incidencia), TIMESTAMP(i.fini_incidencia,i.hini_incidencia))))) as costo
                
         from incidencia i inner join estado e on i.id_estado = e.id_estado
                           inner join asuntoincidencia ai on ai.id_asuinc = i.id_asuinc
                           inner join categoriaincidencia ca on ca.id_catinc = ai.id_catinc
                           inner join usuario u on u.id_usuario = i.id_usuario
                           inner join persona p on p.id_persona = u.id_usuario
         where ffin_incidencia between '$datei' and '$datef'";
	
	$historial = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($historial);
	
	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysql_fetch_array($historial);
						
				$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
                $pdf->Cell(17,5,$fila['incidenciainc'],1,0,'C',True);                
                $pdf->Cell(50,5,$fila['descripcioninc'],1,0,'C',True);
                $pdf->Cell(15,5,$fila['fincioinc'],1,0,'C',True);
                $pdf->Cell(15,5,$fila['hinicioinc'],1,0,'C',True);
                $pdf->Cell(15,5,$fila['ffininc'],1,0,'C',True);
                $pdf->Cell(15,5,$fila['hfininc'],1,0,'C',True);                
                $pdf->Cell(20,5,$fila['cinc'],1,0,'C',True);
                $pdf->Cell(40,5,$fila['cliente'],1,0,'C',True);
                $pdf->Cell(40,5,$fila['responsable'],1,0,'C',True);
                $pdf->Cell(18,5,$fila['tipoinc'],1,0,'C',True);
                $pdf->Cell(18,5,$fila['costo'],1,0,'C',True);
				$pdf->Ln();               
		}

$pdf->Output();
?>