<?php
include("../class/class.controler.php");
$objAcciones= new Acciones();


$cte=$_POST['CTE_CVA'];
$datos=$objAcciones->getDataCVA($cte);
	
		
		 	echo json_encode($datos);
			
?>
