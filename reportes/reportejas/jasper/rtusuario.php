<?php
	include_once ('../../../util/config.php');
	require_once "../Class/CReport.php";    
	
	if(isset($_REQUEST["rep"])){
		$db = array('server' => DB_SERVER,
			        'user' => DB_USERNAME, 
				    'pass' => DB_PASSWORD,
				    'db' => DB_DATABASE,
				    'driver' => DB_DRIVER
			        );
		
		$report = new CReport;
		$report->confReport("",$db);

		switch ($_REQUEST["rep"]) {
			case 'tusuario':
				$report->printReport("rtusuario.jrxml");
				break;
			
			default:
				# code...
				break;
		}
	}
?>