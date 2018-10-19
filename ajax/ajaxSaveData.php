<?php
include("../class/class.controler.php");
$objAcciones= new Acciones();


$MAYORISTA=$_POST['slcMayorita'];
$NUM_CLIENTE=$_POST['txtNomCliente'];
$RAZON_SOCIAL=$_POST['RazonSocial'];
$NOMBRE_COMPLETO=$_POST['txtNombreCompleto'];
$CORREO_ELECTRONICO=$_POST['txtEmail'];
$NUMERO_TELEFONO=$_POST['txtNumber'];
$EXTENCION=$_POST['txtExtencion'];
$NUMERO_MOVIL=$_POST['txtnumeroMovil'];
$NOM_COMERCIAL=$_POST['txtNomComer'];

if($NUM_CLIENTE==''){
	$NUM_CLIENTE='NULL';
	}


$objAcciones->saveData($MAYORISTA,$NUM_CLIENTE,$RAZON_SOCIAL,$NOMBRE_COMPLETO,$CORREO_ELECTRONICO,$NUMERO_TELEFONO,$EXTENCION,$NUMERO_MOVIL,$NOM_COMERCIAL);
		
			
?>
