<?php
	include("class/class.controler.php");
	$objAcciones= new Acciones();
	session_start();


	$Usuario=$_SESSION["UsuarioMenuReportes"];
	if($Usuario==''){
		header("Location: https://www.grupocva.com/thelinks/appsphp/siil_reps/sistemas/menu_reportes/no_sesion.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/1.10.15/sorting/date-uk.js"></script>
    
    <title>VER FACTURAS</title>
    <style>
    #alinear{
        margin-left:40px;
        margin-right:40px;
    }
    </style>
</head>
<body >


  <h3 align="center">CONSULTAR FACTURAS</h3>
  <br>
 
  <div id="alinear">

  <br>

<form action="" method="post" name="form3">
    <table    id="example"  class="row-border"    cellspacing="0"  border="0" >
    <thead>
        <tr class="titulos-tabla" bgcolor="#CCCCCC">
                <td>NUM_CLIENTE</td>
                <td>MAYORISTA</td>
                <td>RAZON_SOCIAL</td>
                <td>NOM_COMERCIAL</td>
                <td>NOMBRE_COMPLETO</td>
                <td>CORREO_ELECTRONICO</td>
                <td>EXTENCION</td>
                <td>NUMERO_TELEFONO</td>
                <td>NUMERO_MOVIL</td>
                
                 <td >FECHA</td>
        
        </tr>
        
   

    </thead>
        <tbody class="searchable">
        <?php
		
				
				 $objAcciones->viewtable();
				
           
			?>
        </tbody>
    </table>
</form>
</div>
<p> </p>
<p> </p>
</body>
</html>
<script>


jQuery.extend( jQuery.fn.dataTableExt.oSort, {
    "date-uk-pre": function ( a ) {
        if (a == null || a == "") {
            return 0;
        }
		var sinhoras=a.split(':');
		var sinEspacios=sinhoras[0].split(' ');
		console.log(sinEspacios[0]);

        var ukDatea = sinEspacios[0].split('/');
		
        return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
    },
 
    "date-uk-asc": function ( a, b ) {
        return ((a < b) ? -1 : ((a > b) ? 1 : 0));
    },
 
    "date-uk-desc": function ( a, b ) {
        return ((a < b) ? 1 : ((a > b) ? -1 : 0));
    }
} );


$(document).ready(function() {
						   		   
    $('#example').DataTable( {
		//"order": [[ 2, "desc" ]],
		columnDefs: [
       { type: 'date-uk', targets:[1,2]  }
     ],
		"paging":   true,
		
		"ordering": true,
		"info":     true,
		"bStateSave": true,
		"lengthChange": false,
		"scrollX": true,
		"pageLength": 1000,
        "language": {
			"search":"Buscar",
			"lengthMenu": "Display _MENU_ records per page",
			"zeroRecords": "Sin Resultados",
			"info":  "Registro _START_ al _END_ de _TOTAL_ registros",
			"infoEmpty": "",
			"infoFiltered": "",
			"paginate": {
			"first":      "Primera",
			"last":       "Ultima",
			"next":       "Siguiente",	  
			"previous":   "Anterior",
   		 	},
        }
    } );
} );

</script>