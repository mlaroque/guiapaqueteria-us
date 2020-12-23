<?php
/**
 * Template Name: Resultados de Cotización
 */

$ciudad_origen = urldecode($_GET["ciudad_origen"]);
$ciudad_destino =urldecode($_GET["ciudad_destino"]);
$origen = $_GET["from_keyword_id_se"];
$destino = $_GET["to_keyword_id_se"];
$doc_or_package = $_GET["doc_or_package"];
$doc_weight = $_GET["doc_weight"];
$package_length = $_GET["package_length"];
$package_width = $_GET["package_width"];
$package_height = $_GET["package_height"];
$package_weight = $_GET["package_weight"];
$insurance = $_GET["insurance"]; 
$country_origen = $_GET["country_origen"]; 
$country_destino = $_GET["country_destino"]; 
$nacional_internacional = "Nacional";
$number_packages = $_GET["number_packages"];

if(is_array($package_length)){
	$package_length = json_encode($package_length);
}

if(is_array($package_width)){
	$package_width = json_encode($package_width);
}

if(is_array($package_height)){
	$package_height = json_encode($package_height);
}

if(is_array($package_weight)){
	$package_weight = json_encode($package_weight);
}

if(!$country_origen){
	$country_origen = "MX";
}

if(!$country_destino){
	$country_destino = "MX";
}

if($country_origen !== "MX" || $country_destino !== "MX"){
	$nacional_internacional = "Internacional";
}
?>

<?php get_header(); ?>
<div class="container">
<div class="txtCotiV">
	<h1 class="text-center">Los mejores precios para tu envío: * </h1>
<h2 class="text-center">Todos los servicios incluyen recolección a domicilio</h2>
</div>

<!--<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 banner-info">
		<div class="well wellTxtDesc alert alert-dismissible fade in" role="alert"> 

		<h4 class="text-center">Regístrate* y obtén hasta <b class="azul">50% DE DESCUENTO</b> en tus envíos.</h4>

		<p><b>Beneficios:</b></p>
		
		<ul>
			<li>Tarifas preferenciales en servicios seleccionados.</li>
			<li>Libreta de direcciones frecuentes.</li>
			<li>Monedero de prepago.</li>
			<li>Soluciones para negocios o empresas.</li>
			<li>Descuentos extras por envíos a volumen.</li>
		</ul>
		
		<a href="https://envios.guiapaqueteria.com/shipping/sign_up/" class="btn btn-block btn- btn-verde">Registrarme ahora</a>
		
		<p class="text-center"><small><a class="gris underlined close-info" data-dismiss="alert" aria-label="Close" href="#">Continuar sin registro</a></small></p>
		
		<p><small>*El registro es rápido y gratuito</small></p>
		
		</div>
	</div>-->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

	<div class="modal-content">
    
      <div class="modal-body">
<div class="clearfix"></div>
       
       <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-right modalBrdr">
       	        <button type="button" class="close" data-dismiss="modal">×</button>


<h3 class="upper marPad0 text-center">Regístrate* y obtén hasta  
       		<b class="azul modal50">50%</b><br> de descuento</h3>

       			 <button class="btn btn-block btn- btn-azulout mt5" type="button" class="close" data-dismiss="modal">Continuar sin registro</button>

			<a href="https://envios.guiapaqueteria.com/shipping/sign_in" class="btn btn-block btn- btn-azulout mt5">Tengo Cuenta  Ingresar</a>
			<a href="https://envios.guiapaqueteria.com/shipping/sign_up/" class="btn btn-block btn- btn-naranja mt5">Registrarme  ahora</a>

 </div>

 <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-left pull-left">
       <h3 class="marPad0 upper"><b>Beneficios</b></h3><br>
 <p><img src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/check.png" class="pull-left" width="20">  &nbsp;Tarifas preferenciales en servicios seleccionados.</p>
<p><img src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/check.png" class="pull-left" width="20">  &nbsp;Libreta de direcciones frecuentes.</p>
<p><img src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/check.png" class="pull-left" width="20">  &nbsp;Monedero de prepago.</p>
<p><img src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/check.png" class="pull-left" width="20">  &nbsp;Soluciones para negocios o empresas.</p>
<p><img src="https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/check.png" class="pull-left" width="20">  &nbsp;Descuentos extras por envíos a volumen.</p>
</div>
<div class="clearfix"></div>
		<p class="text-center marPad0"><small>*El registro es rápido y gratuito</small></p>


      </div>
     
    </div>
   </div>
 </div>

<div id="results">
<div class="resultsV row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

			<div class="hidden-xs col-lg-2 col-sm-2">
				<img src="" class="img-responsive">
			</div>

			<div class="col-xs-5 col-sm-3 col-lg-4">
				<small class="text-warning"><i>Servicio:</i></small>
				<p class="servicio"></p>
				<div class="visible-xs-block carrier-logo"><img src="https://enviaya.com.mx/assets/carrier_logos/fdx-c5a6aef4e939531f3431f728faca520d.svg" class="img-responsive"></div>
			</div>

			<div class="col-xs-7 col-sm-4 col-lg-3 details transit-time">
				<small class="text-warning"><i>Entrega estimada:</i></small>
				<p class="noMarPad"><i class="fa fa-calendar entregaEstimada" aria-hidden="true"></i> 
				</p>

			<div class="visible-xs"><span class="small"><i class="fa fa-map-marker" aria-hidden="true"></i>
			 Vamos por tu envío</span> 
			 </div>
			</div>

		<div class="col-xs-12 col-sm-3 col-lg-3">
			<div class="text-center">
				<small class="text-warning"><i>Precio:</i></small>
				<h4 class="noMarPad text-center priceV"></h4>
				<p class="cotiDescue"><b><span class="badge BGareomex">-<span class="discount"></span>% DE DESCUENTO</span>  <a class="naranja" href="https://envios.guiapaqueteria.com/shipping/sign_up/">Registrándote aquí</a></b></p>
			</div>
				<a href="#" class="btn btn-block btn- btn-enviarV btn-sm">Comprar sin Registro</a>
		</div>


		<style>
			.popover { font-size: 12px; width: 100%}</style>
			
			
		
			<!--<div class="col-xs-12 col-sm-3 col-lg-3">
				<div class="text-center">
					<small class="text-warning"><i>Precio:</i></small>
					<p class="small noMarPad text-center oldPrice"></p>
					<h4 class="noMarPad text-center priceV"></h4>
				</div>
		

				<a href="" class="btn btn-block btn- btn-enviarV btn-sm">Seleccionar</a>
			</div>-->
</div>
</div>
</div>
<small class="pull-right">* precio final con IVA</small>
</div>

<?php get_footer(); ?>

<script type="text/javascript">

jQuery("#myModal").modal('show');

jQuery(".close-info").click(function(){
	jQuery(".banner-info").hide();

});

jQuery(document).ready(function() {

	//Mandamos la información de la cotización al Tag Manager
	addCotizationEventTracking();

			//Guardamos en una variable el "row" estándar de un resultado
			var htmlResult = jQuery("#results").html();
			
			//Enseñamos un GIF de que se están cargando los resultados. Se sobreescribe el html de resultados.
			jQuery("#results").html("<div style='text-align:center;padding: 20px;'><img src='<?php echo get_stylesheet_directory_uri(); ?>/images/ajax-loader.gif'/></div>");
    		
    	  // Reunimos toda la información del formulario de cotización
        var formData = {
            'from_keyword_id_se'              : "<?php echo $origen; ?>",
            'to_keyword_id_se'             : "<?php echo $destino; ?>",
            'doc_or_package'             : "<?php echo $doc_or_package; ?>",
            'doc_weight'             : "<?php echo $doc_weight; ?>",
            'package_length'             : <?php echo $package_length; ?>,
            'package_width'             : <?php echo $package_width; ?>,
            'package_height'             : <?php echo $package_height; ?>,
            'package_weight'             : <?php echo $package_weight; ?>,
            'insurance'             : "<?php echo $insurance; ?>",
            'country_origen'        : "<?php echo $country_origen; ?>",
            'country_destino'        : "<?php echo $country_destino; ?>",
            'ciudad_origen'        : "<?php echo $ciudad_origen; ?>",
            'ciudad_destino'        : "<?php echo $ciudad_destino; ?>",
            'number_packages'		: <?php echo json_encode($number_packages); ?>

        };

        //Mandamos la información al WS de EnviaYa para que nos devuelva los resultados asociados
        jQuery.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '<?php echo get_stylesheet_directory_uri(); ?>/inc/cotizador/search-results.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
    		success: function (data) { 


			var dhl_txt = "";
			var fedex_txt = "";
			var redpack_txt = "";
			var ups_txt = "";
			var minutos_txt = "";
			var ivoy_txt = "";
			for(var i=0;i<Object.keys(data).length;i++){

				// if(Object.keys(data)[i].toLowerCase() === "dhl"){
				// 	dhl_txt = Object.keys(data)[i];
				// }else 
				if(Object.keys(data)[i].toLowerCase() === "fedex"){
					fedex_txt = Object.keys(data)[i];
				}else if(Object.keys(data)[i].toLowerCase() === "redpack"){
					redpack_txt = Object.keys(data)[i];
				}else if(Object.keys(data)[i].toLowerCase() === "ups"){
					ups_txt = Object.keys(data)[i];
				}else if(Object.keys(data)[i].toLowerCase() === "minutos"){
					minutos_txt = Object.keys(data)[i];
				}else if(Object.keys(data)[i].toLowerCase() === "ivoy"){
					ivoy_txt = Object.keys(data)[i];
				}

			}

    		//Vacíamos el div de resultados para borrar la imagen de "cargar"
    		jQuery("#results").html("");

    		if(data == "error422"){
    			jQuery("#results").append('<h2 style="text-align:center;color:#f00">Faltó algún dato en tu cotización, regresa al cotizador y asegúrate de introducir los datos correctos.</h2><p class="Normal" style="text-align: center;"><a class="btn btn-sm btn-cotizarV" href="https://guiapaqueteria.com/us/cotizador-de-envios/">COTIZA TU ENVÍO AQUÍ</a></p>');
    		}else if(typeof(data) == "string"){
				jQuery("#results").append('<h2 style="text-align:center;color:#f00">Disculpa la molestia, estamos mejorando nuestra página. Por favor vuelve en 10 minutos.</h2><p class="Normal" style="text-align: center;"><a class="btn btn-sm btn-cotizarV" href="https://guiapaqueteria.com/us/cotizador-de-envios/">COTIZA TU ENVÍO AQUÍ</a></p>');
				// typeof data[dhl_txt] != 'undefined' && data[dhl_txt].length < 1 &&
    		}else if(typeof data[fedex_txt] != 'undefined' && data[fedex_txt].length < 1 && typeof data[ups_txt] != 'undefined' && data[ups_txt].length < 1 && typeof data[minutos_txt] != 'undefined' && data[minutos_txt].length < 1){
    			jQuery("#results").append('<h2 style="text-align:center;color:#f00">Lo sentimos. No contamos con servicios de entrega para la ruta o características de tu envío. Por favor intenta reduciendo el tamaño o peso.</h2><p class="Normal" style="text-align: center;"><a class="btn btn-sm btn-cotizarV" href="https://guiapaqueteria.com/us/cotizador-de-envios/">COTIZA TU ENVÍO AQUÍ</a></p>');
    		}else{

    		
    		
    		//Examinos todos los elementos de cada empresa de paquetería para ver de cuántos elementos están formados
			var dhl_items_number = 0;
			var fedex_items_number = 0;
			var redpack_items_number = 0;
			var ups_items_number = 0;
			var minutos_items_number = 0;
			var ivoy_items_number = 0;



			// if(typeof data[dhl_txt] != 'undefined'){
			// 	dhl_items_number = data[dhl_txt].length
			// }
			if(typeof data[fedex_txt] != 'undefined'){
				fedex_items_number = data[fedex_txt].length	
			}
			if(typeof data[redpack_txt] != 'undefined'){
				redpack_items_number = data[redpack_txt].length
			}
			if(typeof data[ups_txt] != 'undefined'){
				ups_items_number = data[ups_txt].length
			}
			if(typeof data[minutos_txt] != 'undefined'){
				minutos_items_number = data[minutos_txt].length
			}
			if(typeof data[ivoy_txt] != 'undefined'){
				ivoy_items_number = data[ivoy_txt].length
			}

			var results_arr = [];
			
			//Por cada empresa, usamos el "row" que tenemos guardado en una variable y lo rellenamos con información de vuelta del WS
			// for(var i=0;i<dhl_items_number;i++){
				
			// 	if(data[dhl_txt][i]['carrier']){
			// 		results_arr.push(fillResult(dhl_txt,data,i,htmlResult,data[dhl_txt][i]['currency']));				
			// 	}

			// }
			
			for(var i=0;i<fedex_items_number;i++){
				
				if(data[fedex_txt][i]['carrier']){
					results_arr.push(fillResult(fedex_txt,data,i,htmlResult,data[fedex_txt][i]['currency']));				
				}				

			}
			
			for(var i=0;i<redpack_items_number;i++){
				
				if(data[redpack_txt][i]['carrier']){
					results_arr.push(fillResult(redpack_txt,data,i,htmlResult,data[redpack_txt][i]['currency']));				
				}				

			}
			
			for(var i=0;i<ups_items_number;i++){
				
				if(data[ups_txt][i]['carrier']){
					results_arr.push(fillResult(ups_txt,data,i,htmlResult,data[ups_txt][i]['currency']));				
				}				

			}

			for(var i=0;i<minutos_items_number;i++){
				
				if(data[minutos_txt][i]['carrier']){
					results_arr.push(fillResult(minutos_txt,data,i,htmlResult,data[minutos_txt][i]['currency']));				
				}				

			}

			for(var i=0;i<ivoy_items_number;i++){
				
				if(data[ivoy_txt][i]['carrier']){
					results_arr.push(fillResult(ivoy_txt,data,i,htmlResult,data[ivoy_txt][i]['currency']));				
				}				

			}

			results_arr.sort(sortByPrice);

			for(var i=0;i<results_arr.length;i++){
				
					jQuery("#results").append(results_arr[i]);			

			}	
    		}
    		

	
				
   		 }, 
    		error: function (responseText, textStatus, errorThrown) { 
      		//alert('Error - ' + errorThrown); 
    		}
    		});

	
});

function sortByPrice(result1,result2){


	//var precio1_str = result1.find('.priceV').html().replace("$ ","");
	//var precio2_str = result2.find('.priceV').html().replace("$ ","");
	var precio1_str = result1.find('.priceV').html().replace(/[^0-9.,]/g, '');
	var precio2_str = result2.find('.priceV').html().replace(/[^0-9.,]/g, '');

	var precio1 = parseFloat(precio1_str);
	var precio2 = parseFloat(precio2_str);

	return precio1-precio2;
}

function fillResult(carrier,data,i,htmlResult,currency){

				//Vamos a ejecutar jQuery sobre la variable que tenemos guardada
				var $htmlResult = jQuery(htmlResult);

				//Recuperamos la moneda, y si es mexicana le ponemos un $
				if(currency == "MXN"){
					currency = "$";
				}
				
				//Carrier Service Logo	
				// if(carrier.toLowerCase() == 'dhl'){
				// 	$htmlResult.find('img').attr('src','https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/c500-dhl.png');
				// }else 
				if(carrier.toLowerCase()  == 'fedex'){
					$htmlResult.find('img').attr('src','https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/c500-fedex.png');
				}else if(carrier.toLowerCase()  == 'redpack'){
					$htmlResult.find('img').attr('src','https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/c500-redpack.png');
				}else if(carrier.toLowerCase()  == 'ups'){
					$htmlResult.find('img').attr('src','https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/c500-ups.png');
				}else if(carrier.toLowerCase()  == 'minutos'){
					$htmlResult.find('img').attr('src','https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/99minutos.jpg');
				}else if(carrier.toLowerCase()  == 'ivoy'){
					$htmlResult.find('img').attr('src','https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme/images/ivoy.jpg');
				}

				
				//Carrier Service Name	
				if(data[''+carrier+''][i]['dynamic_service_name']){
					$htmlResult.find('.servicio').html(data[''+carrier+''][i]['dynamic_service_name']);
				}else{
					$htmlResult.find('.servicio').html(data[''+carrier+''][i]['carrier_service_name']);
				}		
				
				
				if(data[''+carrier+''][i]['estimated_delivery']){
					$date_arr = data[''+carrier+''][i]['estimated_delivery'].split(" ");
					//Delivery Date			
					$htmlResult.find('.entregaEstimada').after(" " + formatDate(new Date($date_arr[0] + " 12:00")));			
				}else{
					$htmlResult.find('.entregaEstimada').after(" Sin Información");
				}

				if(data[''+carrier+''][i]['list_total_amount'] != data[''+carrier+''][i]['total_amount']){
					
					//Old Price			
					//$htmlResult.find('.oldPrice').html("<del>$ "+data[''+carrier+''][i]['list_total_amount']+"</del>");	
					var oldPrice = data[''+carrier+''][i]['list_total_amount'];
					var newPrice = data[''+carrier+''][i]['total_amount'];
					var discount = (oldPrice - newPrice)*100/oldPrice;
					$htmlResult.find('.discount').html(Math.ceil(discount));
								
				}

				//Price			
				// if(carrier.toLowerCase() == 'dhl'){
				// 	$htmlResult.find('.priceV').html(currency + " " + data[''+carrier+''][i]['total_amount']);
				// 	$htmlResult.find('.cotiDescue').html("");
				// }else
				if(carrier.toLowerCase() != 'dhl'){
					$htmlResult.find('.priceV').html(currency + " " + data[''+carrier+''][i]['list_total_amount']);
				}
				

				//Link a la página de pagos de EnviaYa
				//$htmlResult.find('.btn-enviarV').attr("href","https://enviaya.com.mx/choose_quote_public/"+data[''+carrier+''][i]['shipment_id']+"/"+data[''+carrier+''][i]['rate_id']+"?utm_source=guiapaqueteria.com&utm_medium=Quote_Form&utm_campaign=Affiliates&a_id=guiapaqueteria");
$htmlResult.find('.btn-enviarV').attr("href","https://envios.guiapaqueteria.com/choose_quote_public/"+data[''+carrier+''][i]['shipment_id']+"/"+data[''+carrier+''][i]['rate_id']+"?utm_source=guiapaqueteria.com&utm_medium=Quote_Form&utm_campaign=Affiliates&a_id=guiapaqueteria");

				$htmlResult.find('.btn-enviarV').attr("onclick","addEventTracking('<?php echo $origen; ?>','<?php echo $destino; ?>','<?php echo $doc_or_package; ?>','<?php echo $insurance; ?>',"+data[''+carrier+''][i]['total_amount']+")");


				//Añadimos el trozo de html guardado con la información actualizada al div de resultados
				if(data[''+carrier+''][i]['shipment_id'] != null && data[''+carrier+''][i]['rate_id'] != null)
				{
					return $htmlResult;
				}

				




}

function formatDate(date) {
  var monthNames = [
    "Enero", "Febrero", "Marzo",
    "Abril", "Mayo", "Junio", "Julio",
    "Agosto", "Septiembre", "Octubre",
    "Noviembre", "Diciembre"
  ];

  var day = date.getDate();
  var monthIndex = date.getMonth();
  var year = date.getFullYear();

  return day + ' ' + monthNames[monthIndex] + ' ' + year;
}

function addEventTracking(origen, destino, tipo, seguro, precio){

	/*dataLayer.push({
		'ruta': ''+origen+' - ' + destino + '',
		'tipoEnvio': ''+tipo+'',
		'seguro': ''+seguro+'',
		'precio': ''+precio+'',
		'event': 'Selección'
	});*/


}

function addCotizationEventTracking(){

	var peso = "";
	var dimensiones = "";
	var tipoEnvio = '<?php echo $doc_or_package; ?>';

	if(tipoEnvio == "Document"){
		peso = "<?php echo $doc_weight; ?>";
		dimensiones = "NA";
	}else{
		var package_weight = <?php echo json_encode($package_weight); ?>;
		var package_length = <?php echo json_encode($package_length); ?>;
		var package_width = <?php echo json_encode($package_width); ?>;
		var package_height = <?php echo json_encode($package_height); ?>;
		var number_packages = <?php echo json_encode($number_packages); ?>;

		package_weight = JSON.parse(package_weight);
		package_length = JSON.parse(package_length);
		package_width = JSON.parse(package_width);
		package_height = JSON.parse(package_height);
		//number_packages = JSON.parse(number_packages);

		for (i = 0; i < package_weight.length; i++) { 
			peso += package_weight[i] + ", ";
		}
		peso = peso.replace(/,\s*$/, "");

		for (i = 0; i < package_length.length; i++) { 
			dimensiones += number_packages[i] + ": " + package_length[i] + " x " + package_width[i] + " x " + package_height[i] + ", ";
		}
		dimensiones = dimensiones.replace(/,\s*$/, "");

	}

	/*dataLayer.push({
		'ruta': '<?php echo $ciudad_origen; ?> - <?php echo $ciudad_destino; ?>',
		'tipoEnvio': tipoEnvio,
		'seguro': '<?php echo $insurance; ?>',
		'peso': ''+peso+'',
		'dimensiones': ''+dimensiones+'',
		'envio': '<?php echo $nacional_internacional; ?>',
		'event': 'Cotización'
	});*/

}


</script>