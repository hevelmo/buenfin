<?php

class Acciones{			



	function viewtable(){
			 
	            include("/var/www/libs/conecta_bpm.php");
    $DataBase = "";

    $o_user = "web_user_publico";
    $o_pass = "W8q5/fBv";
    $o_dbs  = $DataBase;

    $Conn = ConectaSiil($o_user, $o_pass, $o_dbs);
			$sql="SELECT ID_GHIA_PROMOCIONES,  MAYORISTA,  NUM_CLIENTE,  RAZON_SOCIAL,  NOMBRE_COMPLETO,
  CORREO_ELECTRONICO,  NUMERO_TELEFONO,  EXTENCION,  NUMERO_MOVIL,  NOM_COMERCIAL,  to_char(FECHA,'DD/MM/YYYY') FECHA
FROM GHIA_PROMOCIONES ";
			$query=ociparse($Conn,$sql);
			ociexecute($query);
			if($query) {
				while(ocifetch($query)){
					echo "<tr>";
					echo "<td>" . ociresult($query,'NUM_CLIENTE') . "</td>";
					echo "<td>" . ociresult($query,'MAYORISTA'). "</td>";
						echo "<td>" . ociresult($query,'RAZON_SOCIAL') . "</td>";
						echo "<td>" . ociresult($query,'NOM_COMERCIAL') . "</td>";
					echo "<td>" . ociresult($query,'NOMBRE_COMPLETO') . "</td>";
					echo "<td>" . ociresult($query,'CORREO_ELECTRONICO'). "</td>";
				
						echo "<td>" . ociresult($query,'EXTENCION') . "</td>";
					echo "<td>" . ociresult($query,'NUMERO_TELEFONO'). "</td>";
					echo "<td>" . ociresult($query,'NUMERO_MOVIL') . "</td>";
					echo "<td>" . ociresult($query,'FECHA') . "</td>";
					echo "</tr>";
				}
				
			}	
			oci_close($Conn); 
		}
		
		
		
		
		
		
		
	function saveData($MAYORISTA,$NUM_CLIENTE,$RAZON_SOCIAL,$NOMBRE_COMPLETO,$CORREO_ELECTRONICO,$NUMERO_TELEFONO,$EXTENCION,$NUMERO_MOVIL,$NOM_COMERCIAL){

           			 
	            include("/var/www/libs/conecta_bpm.php");
    $DataBase = "";

    $o_user = "web_user_publico";
    $o_pass = "W8q5/fBv";
    $o_dbs  = $DataBase;

    $Conn = ConectaSiil($o_user, $o_pass, $o_dbs);
			$sql="INSERT INTO GHIA_PROMOCIONES( ID_GHIA_PROMOCIONES,MAYORISTA, NUM_CLIENTE, RAZON_SOCIAL, 
			NOMBRE_COMPLETO,CORREO_ELECTRONICO, NUMERO_TELEFONO, EXTENCION, NUMERO_MOVIL, NOM_COMERCIAL)  VALUES(GHIA_PROMOCIONES_SEQUENCE.NEXTVAL,'$MAYORISTA',$NUM_CLIENTE,'$RAZON_SOCIAL','$NOMBRE_COMPLETO','$CORREO_ELECTRONICO',$NUMERO_TELEFONO,$EXTENCION,$NUMERO_MOVIL,'$NOM_COMERCIAL')";
			$query2 = ociparse($Conn, $sql);
			$guardar2 = ociexecute($query2);
			if ($guardar2) {
			}else {
			echo "SE PRODUJO UN ERROR AL GUARDAR EL DOCUMENTO";
			}
			oci_close($Conn);
			
	}
	
	
	function getDataCVA($CTE_CLAVE)
	{
					 
	            include("/var/www/libs/conecta_bpm.php");
    $DataBase = "";

    $o_user = "web_user_publico";
    $o_pass = "W8q5/fBv";
    $o_dbs  = $DataBase;

    $Conn = ConectaSiil($o_user, $o_pass, $o_dbs);
		$sql = "select CTE_RAZON_SOCIAL,CTE_NOM_COMERCIAL from BPM_DEMO.CAT_CLIENTE where CTE_CLAVE=$CTE_CLAVE ";
		$query = ociparse($Conn, $sql);
		ociexecute($query);
		if ($query) {
			$row = oci_fetch_assoc($query);
			$datos[]= $row;
		}

return $datos;

		oci_close($Conn);
	}
	
	
	



}

?>