<?php
	
 	class CReport{
 		static private $db = array();
 		static private $path;

 		public function confReport($dirApp,$db){
 			$this->db = $db;
 			$this->path = $dirApp;
 		}
 		public function printReport($file="", $param=array()){ 			
 			include_once(dirname(__FILE__).'/Library-Report/tcpdf/tcpdf.php');
			include_once(dirname(__FILE__)."/Library-Report/PHPJasperXML.inc.php");

			$pchartfolder=(dirname(__FILE__).'/Library-Report/pchart2');

			$file = $this->path.$file;
			//echo $file;

			if(!file_exists($file)){
				echo "Planilla Solicitada no existe";
				return;
			}

			$xml =  simplexml_load_file($file);
			

			$PHPJasperXML = new PHPJasperXML();
			//$PHPJasperXML->debugsql = true;
			
			$PHPJasperXML->arrayParameter = $param;
			
			
			$PHPJasperXML->xml_dismantle($xml);

			switch ($this->db["driver"]) {
				case 'mysqli':
					$driver = "mysql";
					break;
				case 'mysql':
					$driver = "mysql";
					break;
				case 'pdo_pgsql':
					$driver = "pgsql";
					break;	
				case 'pgsql':
					$driver = "pgsql";
					break;	
				default:
					echo "Driver de conexion no fue especificado";
					break;
			}
			
			$PHPJasperXML->transferDBtoArray($this->db["server"],$this->db["user"],$this->db["pass"],$this->db["db"],$driver);
			$PHPJasperXML->outpage("I");  
 		}
 	}
 ?>