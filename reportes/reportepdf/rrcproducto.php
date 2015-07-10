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
	$this->Text(100,20,'Reporte de Bienes',0,'C', 0);
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
$codigo = $_POST['t3'];
    
    $con = new DB_Class;
	$pacientes = $con->__construct();	
	
	$pdf=new PDF('L','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	
	$pdf->SetWidths(array(10, 30, 15, 15, 15, 15, 30, 30, 15, 20, 20, 50));
	$pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(31,187,166);
    $pdf->SetTextColor(255);
    $pdf->Ln();

		for($i=0;$i<1;$i++)
			{  //tamaño  alto   borde
			 $pdf->Cell(10,5,"C. INC.",1,0,'C',True);
             $pdf->Cell(30,5,"DES. INC.",1,0,'C',True);
             $pdf->Cell(15,5,"F.INI",1,0,'C',True);
             $pdf->Cell(15,5,"H.INI",1,0,'C',True);
             $pdf->Cell(15,5,"F.FIN",1,0,'C',True);
             $pdf->Cell(15,5,"H.FIN",1,0,'C',True);
             $pdf->Cell(30,5,"PERSONAL",1,0,'C',True);
             $pdf->Cell(30,5,"TÉCNICO",1,0,'C',True);
             $pdf->Cell(15,5,"C. BIEN",1,0,'C',True);
             $pdf->Cell(20,5,"CÓDIGO",1,0,'C',True);
             $pdf->Cell(20,5,"SERIE",1,0,'C',True);
             $pdf->Cell(50,5,"DES. BIEN",1,0,'C',True);
             $pdf->Ln();
			}
	
	$historial = $con->__construct();	
	$strConsulta = "select i.id_incidencia as incidenciainc,
                substring(i.descripcion_incidencia, 1, 20) as descripcioninc,
                i.fini_incidencia as fincioinc,
                i.hini_incidencia as hinicioinc,
                i.ffin_incidencia as ffininc,
                i.hfin_incidencia as hfininc,
                substring(i.cliente_incidencia, 1, 20) as cliente,
                substring(i.tresponsable_incidencia, 1, 20) as responsable,
                b.id_bien as bien,
                b.codigo_bien as codigo,
                b.serie_bien as serie,
                substring(b.descripcion_bien, 1, 40) as descripcion
         from incidencia i
              inner join bien b on i.id_bien = b.id_bien         
         where i.fini_incidencia between '$datei' and '$datef'
            and b.codigo_bien like '$codigo%'";
	
	$historial = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($historial);
	
	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysql_fetch_array($historial);
						
				$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
                $pdf->Cell(10,5,$fila['incidenciainc'],1,0,'C',True);
                $pdf->Cell(30,5,$fila['descripcioninc'],1,0,'C',True);
                $pdf->Cell(15,5,$fila['fincioinc'],1,0,'C',True);
                $pdf->Cell(15,5,$fila['hinicioinc'],1,0,'C',True);
                $pdf->Cell(15,5,$fila['ffininc'],1,0,'C',True);
                $pdf->Cell(15,5,$fila['hfininc'],1,0,'C',True);
                $pdf->Cell(30,5,$fila['cliente'],1,0,'C',True);
                $pdf->Cell(30,5,$fila['responsable'],1,0,'C',True);
                $pdf->Cell(15,5,$fila['bien'],1,0,'C',True);
                $pdf->Cell(20,5,$fila['codigo'],1,0,'C',True);                
                $pdf->Cell(20,5,$fila['serie'],1,0,'C',True);
                $pdf->Cell(50,5,$fila['descripcion'],1,0,'C',True);
				$pdf->Ln();//30,7, utf8_decode($fila['nombre']),1, 0 , 'L', $bandera
        }
        
$pdf->Output();
?>