<?php 
	
    include_once "../prueba-nueva/core/environment/_includes.inc.php";

	$titulo = 'GHIA | Buen Fin';
	$sub_header = 'Solicitud de Informaci&oacute;n de promociones BUEN FIN GHIA';
	$is_buenfin = 'buen-fin';

	include_once "../prueba-nueva/templates/doc.declaracion.inc.php";
?>
        <input id="_host" type="hidden" value="<?php echo _HOST; ?>">
        <input id="_body" type="hidden" value="set_body">
        <input id="section" type="hidden" name="section" value="buen-fin">
		<input id="device" type="hidden" name="device" value="">

        <?php
            // Header 
            include_once "../prueba-nueva/templates/_header_by_section.php";
            // Sub Header
            include_once "../prueba-nueva/core/componentes/_sub_header.php";
		?>
			<section class="">
				<div class="container">
					<div class="col-md-6 col-md-offset-3 col-sm-12">
						<div class="row">
							<form action=""  method="post" id="my_form" autocomplete="off">
								<fieldset>
									<label for="slcMayorita">Mayorista</label>
									<div class="form-group has-default bmd-form-group custom-dropdown-select">
										<select class="form-control" name="slcMayorita" id="slcMayorita" onchange="getDatos(this)" required>
											<option value="">-Seleccione Una Opcion-</option>
											<option value="CVA">CVA</option>
											<option value="INGRAM">INGRAM</option>
										</select>
										<div class="custom_dropdown_select__arrow"></div>
									</div>
								</fieldset>
								<fieldset>
									<div class="form-group bmd-form-group">
										<input type="text" class="form-control" name="txtNomCliente" id="txtNomCliente" onchange="getCliente();" required placeholder="No. Cliente">
									</div>
								</fieldset>
								<fieldset>
									<div class="form-group bmd-form-group">
										<input type="text" class="form-control" name="RazonSocial" id="RazonSocial" required placeholder="Raz&oacute;n Social">
									</div>
								</fieldset>
								<fieldset>
									<div class="form-group bmd-form-group">
										<input type="text" class="form-control" name="txtNomComer" id="txtNomComer" required placeholder="Nombre Comercial">
									</div>
								</fieldset>
								<fieldset>
									<div class="form-group bmd-form-group">
										<input type="text" class="form-control" name="txtNombreCompleto" required placeholder="Nombre completo">
									</div>
								</fieldset>
								<fieldset>
									<div class="form-group bmd-form-group">
										<input type="email" class="form-control" name="txtEmail" required placeholder="Correo electr&oacute;nico">
									</div>
								</fieldset>
								<fieldset>
									<div class="form-group bmd-form-group">
										<input type="number" class="form-control" name="txtNumber" id="txtNumber" onchange="validarTelefono(this)" required placeholder="N&uacute;mero telef&oacute;nico">
									</div>
								</fieldset>
								<fieldset>
									<div class="form-group bmd-form-group">
										<input type="number" class="form-control" name="txtExtencion" required placeholder="Extensi&oacute;n">
									</div>
								</fieldset>
								<fieldset>
									<div class="form-group bmd-form-group">
										<input type="number" class="form-control" name="txtnumeroMovil" id="movil" maxlength="10" onchange="validarTelefono(this)" required placeholder="N&uacute;mero de tel&eacute;fono m&oacute;vil">
									</div>
								</fieldset>
								<div class="col-md-10 col-md-offset-1">
									<fieldset>
										<div class="form-group bmd-form-group">
											<button type="submit" class="button_app button_green ghia hvr-underline-from-center hvr-underline-from-center-inverted hvr-underline-from-center-white inverted" ><i class="far fa-save fa-fw fa-lg"></i> Guardar</button>
										</div>
									</fieldset>
								</div
								<div class="clearfix"></div> 
							</form>
						</div>
					</div>
				</div>
			</section>
		<?php
            // Footer 
            include_once "../prueba-nueva/templates/_footer_by_section.php";
        ?>
		<a href="#0" class="cd-top is-click-back-to-top" id="go_top" data-tooltip="Ir Arriba" data-tooltip-stickto="top" data-tooltip-animate-function="foldin">Top</a><?php // /a.cd_top ?>

        <script src="<?php echo _HOST; ?>lib/min/core.lib.min.js"></script>
		<!--<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.12.0.min.js"></script>-->
		
        <?php
			require_once("../prueba-nueva/templates/general_scripts.php");
		?> 
		<script>
			function validarTelefono(r){
				 var myval = $("#"+r.id).val();

				 if(myval.length > 10) {
				 	alertify.alert('Validador', 'Debe Contener 10 Digitos');
					$("#"+r.id).val("");
				 }
			}
			$("#my_form").submit(function(event){
				event.preventDefault(); //prevent default action 
				var post_url = $(this).attr("action"); //get form action url
				var request_method = $(this).attr("method"); //get form GET/POST method
				var form_data = $(this).serialize(); //Encode form elements for submission

				$.ajax({
					url : "ajax/ajaxSaveData.php",
					type: "POST",
					data : form_data
				}).done(function(response){ //
					alertify.alert('Registro', '&iexcl;Gracias Por Registrarse&excl;');
				});
			});
			function getCliente(){
				var txtNomCliente= $("#txtNomCliente").val();
				$.ajax({
					url : "ajax/getDatos.php",
					type: "POST",
					data : {CTE_CVA:txtNomCliente}
				}).done(function(response){ //
					var types = JSON.parse(response);
					if(types){
						$("#RazonSocial").val(types[0]['CTE_RAZON_SOCIAL']);
						$("#txtNomComer").val(types[0]['CTE_NOM_COMERCIAL']);
					}
				});
			}
			function getDatos(r){
				if(r.value=="CVA"){
					$("#txtNomComer").attr('readonly', true);
					$("#RazonSocial").attr('readonly', true);
				}else{
					$("#txtNomComer").val("");
					$("#RazonSocial").val("");
					$("#txtNomCliente").val("");

					$("#txtNomComer").attr('readonly', false);
					$("#RazonSocial").attr('readonly', false);
				}
			}
		</script>
		
<?php
    include_once "../prueba-nueva/templates/doc.cierre.inc.php";
?>