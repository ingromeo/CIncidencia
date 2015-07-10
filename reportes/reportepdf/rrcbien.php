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
$serie = $_POST['t4'];
$nombres = $_POST['t5'];
$modelo = $_POST['t6'];
$marca = $_POST['t7'];
$catb = $_POST['t8'];
    
    $con = new DB_Class;
	$pacientes = $con->__construct();	
	
	$pdf=new PDF('L','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	
	$pdf->SetWidths(array(15, 20, 20, 50));
	$pdf->SetFont('Arial','',8);
	$pdf->SetFillColor(31,187,166);
    $pdf->SetTextColor(255);
    $pdf->Ln();

		for($i=0;$i<1;$i++)
			{  //tamaño  alto   borde			 
             $pdf->Cell(15,5,"C. BIEN",1,0,'C',True);
             $pdf->Cell(30,5,"CÓDIGO",1,0,'C',True);
             $pdf->Cell(30,5,"SERIE",1,0,'C',True);
             $pdf->Cell(70,5,"DES. BIEN",1,0,'C',True);
             $pdf->Cell(15,5,"PRECIO",1,0,'C',True);
             $pdf->Cell(20,5,"FECHA",1,0,'C',True);
             $pdf->Cell(20,5,"HORA",1,0,'C',True);
             $pdf->Cell(20,5,"CANTIDAD",1,0,'C',True);
             $pdf->Cell(20,5,"MODELO",1,0,'C',True);
             $pdf->Cell(20,5,"MARCA",1,0,'C',True);
             $pdf->Ln();
			}
	
	$historial = $con->__construct();	
	$strConsulta = "select b.id_bien as bien,
                       b.codigo_bien as codigo,
                       b.serie_bien as serie,
                       b.descripcion_bien as descripcion,
                       b.precio_bien as precio,
                       b.fecha_bien as fecha,
                       b.hora_bien as hora,
                       b.cantidad_bien as cantidad,
                       o.descripcion_modelo as modelo,
                       a.descripcion_marca as marca
         from bien b
            inner join categoriabien c on b.id_catb = c.id_catb
            inner join modelo o on b.id_modelo = o.id_modelo
            inner join marca a on b.id_marca = a.id_marca
         where b.fecha_bien between '$datei' and '$datef'
            and b.codigo_bien like '$codigo%'
            and b.serie_bien like '$serie%'
            and b.descripcion_bien like'$nombres%'
            and c.descripcion_catb like '$catb%'
            and o.descripcion_modelo like '$modelo%'
            and a.descripcion_marca like '$marca%'";
	
	$historial = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($historial);
	
	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysql_fetch_array($historial);
						
				$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
                $pdf->Cell(15,5,$fila['bien'],1,0,'C',True);
                $pdf->Cell(30,5,$fila['codigo'],1,0,'C',True);                
                $pdf->Cell(30,5,$fila['serie'],1,0,'C',True);
                $pdf->Cell(70,5,$fila['descripcion'],1,0,'C',True);
				$pdf->Cell(15,5,$fila['precio'],1,0,'C',True);
                $pdf->Cell(20,5,$fila['fecha'],1,0,'C',True);                
                $pdf->Cell(20,5,$fila['hora'],1,0,'C',True);
                $pdf->Cell(20,5,$fila['cantidad'],1,0,'C',True);
                $pdf->Cell(20,5,$fila['modelo'],1,0,'C',True);
                $pdf->Cell(20,5,$fila['marca'],1,0,'C',True);
                $pdf->Ln();//30,7, utf8_decode($fila['nombre']),1, 0 , 'L', $bandera
        }
        
$pdf->Output();
?>