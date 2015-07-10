<?php
    include_once ('../../../util/config.php');
	require_once "../Class/CReport.php";
    
    $r1=$_REQUEST['r1'];
    $r2=$_REQUEST['r2'];
	
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
			case 'incidencia':
                //$report->printReport("datei",$r1);
                //$report->printReport("datef",$r2);
				$report->printReport("rincidencia.jrxml");
				break;
			
			default:
				# code...
				break;
		}
	}
?>