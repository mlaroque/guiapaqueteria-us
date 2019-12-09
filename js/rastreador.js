
	function checkReCaptcha(){

		grecaptcha.execute();

	}

	var url_string = window.location.href;
	
	//var url = new URL(url_string);
	var url_paqueteria;
	var url_code;
	var url_prefix;

	if(document.getElementById("hidden_post_id")){
		var post_id = document.getElementById("hidden_post_id").value;
	}

	//Si estamos en la página de rastreo y venimos de otra parte del sitio, entonces rellenamos los datos y llamamos al rastreo.
	if(post_id == "4160"){
		var splitURL = url_string.split("/");

		url_paqueteria = splitURL[4];
		url_code = splitURL[5];
		url_prefix = splitURL[6];

		if(url_paqueteria != "" && url_paqueteria != "#"){
			jQuery('#tracking_field').val(url_code.replace("param-",""));
			jQuery('#tracker_select').val(url_paqueteria.replace("param-",""));
			jQuery('#prefijo_select_amex').val(url_prefix.replace("param-",""));
			jQuery('#prefijo_select_fa').val(url_prefix.replace("param-",""));
			rastreo();			
		}

	}


	if(tracking_no != ""){
		jQuery('#tracking_field').val(tracking_no);
	}
	
	if(package_brand != ""){
		jQuery('#tracker_select').val(package_brand);
	}
	
	var selected = jQuery('#tracker_select').find(":selected").val();
		
		if(selected == "aeromexico-cargo" || post_id == 54){
			jQuery('#selectPaqueteria').show();
			jQuery('#prefijo_select_amex').css("display","block");
			jQuery('#prefijo_select_fa').css("display","none");
		}else if(selected == "flecha-amarilla" || post_id == 60){
			jQuery('#selectPaqueteria').show();
			jQuery('#prefijo_select_fa').css("display","block");
			jQuery('#prefijo_select_amex').css("display","none");
		}else{
			jQuery('#prefijo_select_amex').css("display","none");
			jQuery('#prefijo_select_fa').css("display","none");
		}

	jQuery('#tracker_select').change(function() {
		var selected = jQuery('#tracker_select').find(":selected").val();
		
		if(selected == "aeromexico-cargo" || post_id == 54){
			jQuery('#prefijo_select_amex').css("display","block");
			jQuery('#prefijo_select_fa').css("display","none");
		}else if(selected == "flecha-amarilla" || post_id == 60){
			jQuery('#prefijo_select_fa').css("display","block");
			jQuery('#prefijo_select_amex').css("display","none");
		}else{
			jQuery('#prefijo_select_amex').css("display","none");
			jQuery('#prefijo_select_fa').css("display","none");
		}

	});

    function rastreo(){

    		//grecaptcha.execute();

			jQuery(".tracking_frame").hide();
			document.getElementById("tracking_table_enviaya").style.display = "none";
			document.getElementById("tracking_table").style.display = "none";
			jQuery("#tracking_message").html("");
			
			var tracking_no = jQuery('#tracking_field').val();
			var selected_tracker = jQuery('#tracker_select').find(":selected").val();

			  //Si es dentro del sidebar redirigir a página de rastreo
			if(document.getElementById("sidebar_element").value == "true"){
				var prefix = "";
				if(selected_tracker == "aeromexico-cargo"){
					prefix = jQuery('#prefijo_select_amex').find(":selected").val();
				}else if(selected_tracker == "flecha-amarilla"){
					prefix = jQuery('#prefijo_select_fa').find(":selected").val();
				} 
				window.open("https://guiapaqueteria.com/rastreador/param-"+selected_tracker+"/param-"+tracking_no+"/param-"+prefix+"");
			
			}else{
			//Add name of the selected company to an hidden field in the current page
			jQuery("#post_slug").val(selected_tracker);
			jQuery("#reviewForm").show();
			
			if(typeof selected_tracker == "undefined" || selected_tracker == "" || typeof tracking_no == "undefined"
				| tracking_no == ""){
				alert("Por favor rellena todos los campos de rastreo.");
				return false;
			}

			/*dataLayer.push({
 				'carrier': selected_tracker,
 				'event': 'Rastreo'
			});*/
			
			if(selected_tracker == "aeromexico-cargo"){
				var selected_prefix_amex = jQuery('#prefijo_select_amex').find(":selected").val();
				/*jQuery(".tracking_frame").css("height","400px");
				jQuery(".tracking_frame").css("width","77%");
				jQuery(".tracking_frame").attr("src","http://www.aeromexicocargo.com.mx/Track/TrackResponse.php?ALP="+selected_prefix_amex+"&AWB="+tracking_no+"&HIS=MULTI");
				jQuery(".tracking_frame").show();*/
				window.open("http://www.aeromexicocargo.com.mx/Track/TrackResponse.php?ALP="+selected_prefix_amex+"&AWB="+tracking_no+"&HIS=MULTI");
			}else if(selected_tracker == "carssa"){
				window.open('http://www.carssa.net/php/sysguiasrastreostatusnewar.php');
			}else if(selected_tracker == "castores"){
				/*jQuery(".tracking_frame").css("height","600px");
				jQuery(".tracking_frame").css("width","77%");
				jQuery(".tracking_frame").attr("src","http://tomcat1.castores.com.mx/CyberFacturacion/app/static/estatus_talon?talon="+tracking_no);
				jQuery(".tracking_frame").show();*/
				rastreo_castores(tracking_no, 'castores','https://guiapaqueteria.com/wp-content/themes/guiapaqueteria-child');
				//window.open('http://tomcat1.castores.com.mx/CyberFacturacion/app/static/estatus_talon?talon='+tracking_no);
			}else if(selected_tracker == "dhl"){
				//window.open('http://www.dhl.com.mx/content/mx/es/express/rastreo.shtml?AWB='+tracking_no);
				//jQuery(".tracking_frame").css("height","600px");
				//jQuery(".tracking_frame").css("width","77%");
				//jQuery(".tracking_frame").attr("src","http://www.dhl.com.mx/content/mx/es/express/rastreo.shtml?AWB="+tracking_no);
				//jQuery(".tracking_frame").show();
				rastreo_enviaya(tracking_no, 'dhl','https://guiapaqueteria.com/us/wp-content/themes/lacomuna-theme');			
			}else if(selected_tracker == "estafeta"){
				window.open('http://www.estafeta.com/Rastreo/?guias='+tracking_no); 
			}else if(selected_tracker == "envia-estrella-blanca"){
				rastreo_eb(tracking_no,selected_tracker,'https://guiapaqueteria.com/wp-content/themes/guiapaqueteria-child');
			}else if(selected_tracker == "fedex" || selected_tracker == "multipack"){
				//jQuery(".tracking_frame").css("height","600px");
				//jQuery(".tracking_frame").css("width","77%");
				//jQuery(".tracking_frame").attr("src","https://www.fedex.com/apps/fedextrack/?tracknums="+tracking_no+"&cntry_code=mx&action=track&clienttype=wtrk");
				//jQuery(".tracking_frame").show();
				//window.open('https://www.fedex.com/apps/fedextrack/?tracknums='+tracking_no+'&cntry_code=mx&action=track&clienttype=wtrk');
				rastreo_enviaya(tracking_no, 'fedex','https://guiapaqueteria.com/wp-content/themes/guiapaqueteria-child');			
			}else if(selected_tracker == "estrella-roja"){
				/*jQuery(".tracking_frame").css("height","600px");
				jQuery(".tracking_frame").css("width","77%");
				jQuery(".tracking_frame").attr("src","http://www.paquer.com.mx/rastreo.php?guia="+tracking_no);
				jQuery(".tracking_frame").show();*/
				window.open("http://www.paquer.com.mx/rastreo.php?guia="+tracking_no);
			}else if(selected_tracker == "flecha-amarilla"){
				/*jQuery(".tracking_frame").css("height","600px");
				jQuery(".tracking_frame").css("width","77%");
				var selected_prefix_fa = jQuery('#prefijo_select_fa').find(":selected").val();
				jQuery(".tracking_frame").attr("src","http://srvwebgfa.cloudapp.net/gfa/pymfa/Rastreoenvio/tabid/488/C/"+selected_prefix_fa+"/NUM/"+tracking_no+"/Default.aspx");
				jQuery(".tracking_frame").show();*/
				var selected_prefix_fa = jQuery('#prefijo_select_fa').find(":selected").val();
				rastreo_flecha_amarilla(tracking_no,selected_prefix_fa, selected_tracker,'https://guiapaqueteria.com/wp-content/themes/guiapaqueteria-child');
				//window.open("http://srvwebgfa.cloudapp.net/gfa/pymfa/Rastreoenvio/tabid/488/C/"+selected_prefix_fa+"/NUM/"+tracking_no+"/Default.aspx");
			}else if(selected_tracker == "mexpost"){
				window.open("https://www.correosdemexico.gob.mx/SSLServicios/SeguimientoEnvio/Seguimiento.aspx");
			}else if(selected_tracker == "odm-express"){
				/*jQuery(".tracking_frame").css("height","700px");
				jQuery(".tracking_frame").css("width","77%");
				jQuery(".tracking_frame").attr("src","http://odmexpress.com.mx/rastreo-2/?rastreo_fall="+tracking_no);
				jQuery(".tracking_frame").show();*/
				//window.open("http://odmexpress.com.mx/rastreo-2/?rastreo_fall="+tracking_no);
				rastreo_odm_express(tracking_no, 'odm-express','https://guiapaqueteria.com/wp-content/themes/guiapaqueteria-child');
			}else if(selected_tracker == "paquete-express"){
				window.open("http://www.paquetexpress.com.mx/rastreofiafenew.jsp?guia="+tracking_no);
			}else if(selected_tracker == "senda-express"){
				/*jQuery(".tracking_frame").css("height","600px");
				jQuery(".tracking_frame").css("width","77%");
				jQuery(".tracking_frame").attr("src","http://www.sendaexpress.com.mx/filtro_rastreofinal.asp?guia="+tracking_no+"&tipo=0");
				jQuery(".tracking_frame").show();*/
				//window.open("http://www.sendaexpress.com.mx/filtro_rastreofinal.asp?guia="+tracking_no+"&tipo=0");
				rastreo_senda_express(tracking_no, 'senda-express','https://guiapaqueteria.com/wp-content/themes/guiapaqueteria-child');
			}else if(selected_tracker == "tres-guerras"){
				/*jQuery(".tracking_frame").css("height","600px");
				jQuery(".tracking_frame").css("width","77%");
				jQuery(".tracking_frame").attr("src","http://www.tresguerras.com.mx/3G/tracking.php?talon="+tracking_no);
				jQuery(".tracking_frame").show();*/
				window.open("http://www.tresguerras.com.mx/3G/tracking.php?talon="+tracking_no);
			}else if(selected_tracker == "ups"){
				//window.open("http://wwwapps.ups.com/WebTracking/track?trackNums="+tracking_no+"&HTMLVersion=5.0&loc=es_MX&Requester=UPSHome&WBPM_lid=homepage%2Fct1.html_pnl_trk&track.x=Rastrear");
				rastreo_enviaya(tracking_no, 'ups','https://guiapaqueteria.com/wp-content/themes/guiapaqueteria-child');						
			}else if(selected_tracker == "redpack"){
				rastreo_enviaya(tracking_no, 'redpack','https://guiapaqueteria.com/wp-content/themes/guiapaqueteria-child');						
				//window.open('http://www.redpack.com.mx/rastreo-de-envios/');			
			}				
			}
			

	}
	
	function rastreo_enviaya(tracking_no, tracking_company,theme_url){
	var result = "";
	var request = jQuery.ajax({
		url: theme_url + "/custom_trackers/enviaya.php" + "?tracking_no=" + tracking_no + "&tracking_company=" + tracking_company,
		type: "POST",
		dataType: "json"
		});
	request.done(function(msg) {
		use_tracking_response_enviaya(msg, tracking_company, false, "");
	});
	request.fail(function(jqXHR, textStatus) {
		use_tracking_response_enviaya("", tracking_company, true, jqXHR.statusText);
	});
	};
	
	function rastreo_eb(obj, tracking_company,theme_url){
	var result = "";
	var request = jQuery.ajax({
		url: theme_url + "/custom_trackers/estrella_blanca.php" + "?tracking_no=" + obj,
		type: "POST",
		dataType: "html"
		});
	request.done(function(msg) {
		use_tracking_response(msg,tracking_company, false, "");
	});
	request.fail(function(jqXHR, textStatus) {
		use_tracking_response("", tracking_company,true, jqXHR.statusText);
	});
	};

	function rastreo_castores(tracking_no, tracking_company,theme_url){
	var result = "";
	var request = jQuery.ajax({
		url: theme_url + "/custom_trackers/castores.php" + "?talon=" + tracking_no,
		type: "POST",
		dataType: "html"
		});
	request.done(function(msg) {
		use_tracking_response_castores(msg, tracking_company, false, "");
	});
	request.fail(function(jqXHR, textStatus) {
		use_tracking_response_castores("", tracking_company, true, jqXHR.statusText);
	});
	};

	function rastreo_flecha_amarilla(tracking_no, tracking_prefix, tracking_company,theme_url){
	var result = "";
	var request = jQuery.ajax({
		url: theme_url + "/custom_trackers/flecha-amarilla.php" + "?guia=" + tracking_no + "&prefijo=" + tracking_prefix,
		type: "POST",
		dataType: "html"
		});
	request.done(function(msg) {
		use_tracking_response_flecha_amarilla(msg, tracking_company, false, "");
	});
	request.fail(function(jqXHR, textStatus) {
		use_tracking_response_flecha_amarilla("", tracking_company, true, jqXHR.statusText);
	});
	};

	function rastreo_odm_express(tracking_no, tracking_company,theme_url){
	var result = "";
	var request = jQuery.ajax({
		url: theme_url + "/custom_trackers/odm-express.php" + "?tracking_no=" + tracking_no,
		type: "POST",
		dataType: "html"
		});
	request.done(function(msg) {
		use_tracking_response_odm(msg, tracking_company, false, "");
	});
	request.fail(function(jqXHR, textStatus) {
		use_tracking_response_odm("", tracking_company, true, jqXHR.statusText);
	});
	};

	function rastreo_senda_express(tracking_no, tracking_company,theme_url){
	var result = "";
	var request = jQuery.ajax({
		url: theme_url + "/custom_trackers/senda-express.php" + "?tracking_no=" + tracking_no,
		type: "POST",
		dataType: "html"
		});
	request.done(function(msg) {
		use_tracking_response_senda(msg, tracking_company, false, "");
	});
	request.fail(function(jqXHR, textStatus) {
		use_tracking_response_senda("", tracking_company, true, jqXHR.statusText);
	});
	};
	
	function use_tracking_response_enviaya(tracking_response, tracking_company, error, errorMessage){
		
		jQuery("#tracking_message").html("");
		document.getElementById("tracking_table_enviaya").style.display = "none";
		jQuery("#delivered_to").html("");
		
		if(error)
		{
			//jQuery("#tracking_message").append(errorMessage);
			jQuery("#tracking_message").append("Un error inesperado sucedió. Ponte en contacto directamente con la compañia de paquetería responsable de tu envío.");
		}else if(tracking_response == ""){
			jQuery("#tracking_message").append("No recibimos ninguna información de la paquetería sobre esta guía. Revisa tu número de guía o contacta directamente con la compañia de paquetería responsable de tu envío.");
		}else if(tracking_response.checkpoints == null){
			//jQuery("#tracking_message").append(getErrorMessage(tracking_company));
			jQuery("#tracking_message").append("No recibimos ninguna información de la paquetería sobre esta guía. Revisa tu número de guía o contacta directamente con la compañia de paquetería responsable de tu envío.");
		}else if(tracking_response.checkpoints.length == 0){
			//jQuery("#tracking_message").append(getErrorMessage(tracking_company));
			jQuery("#tracking_message").append("No recibimos ninguna información de la paquetería sobre esta guía. Revisa tu número de guía o contacta directamente con la compañia de paquetería responsable de tu envío.");
		}else{
			
			//var tracking_response_parsed=JSON.parse(tracking_response);			
			
			document.getElementById("tracking_table_enviaya").style.display = "";
			
			var tracking_points = tracking_response.checkpoints;
			var tracking_line = "";
			
			
			for (i = 0; i < tracking_points.length; i++) { 
			
			var d = new Date(tracking_points[i].date);
			var e = formatDate(d);
				 //tracking_line += '<tr><td data-label="CÓDIGO"><p>'+tracking_points[i].code+'</p></td>';
				 tracking_line += '	  <tr><td data-label="ACTIVIDAD"><p>'+tracking_points[i].description+'</p></td>';
				 tracking_line += '	  <td data-label="FECHA/HORA"><p>'+e+'</p></td>';
				 
				 if(tracking_company != "redpack"){
				 	jQuery(".showHeaders").show();
				 	tracking_line += '	  <td data-label="CÓDIGO POSTAL"><p>'+tracking_points[i].postal_code+'</p></td>';
				 	tracking_line += '	  <td data-label="CIUDAD"><p>'+tracking_points[i].city+'</p></td>';
				 	tracking_line += '	  <td data-label="PAÌS"><p>'+tracking_points[i].country+'</p></td>';
				 	tracking_line += '	  <td data-label="RECIBIDO POR/NOTA"><p>'+tracking_points[i].comments+'</p></td></tr>';
				 }else{
					jQuery(".showHeaders").hide();				 
				 }
			}			
			
			tracking_line = tracking_line.replaceAll("null", " - ");
			tracking_line = tracking_line.replaceAll("Delivered - Signed for by", "Entregado - Firmado por");
			tracking_line = tracking_line.replaceAll("Awaiting collection by recipient as requested", "	Envío en DHL a la espera de ser retirado por el destinatario según solicitud");			
			tracking_line = tracking_line.replaceAll("With delivery courier", "Envío en ruta de entrega");
			tracking_line = tracking_line.replaceAll("Arrived at Delivery Facility in", "");
			tracking_line = tracking_line.replaceAll("Departed Facility in", "Llegado a oficinas de");
			tracking_line = tracking_line.replaceAll("Processed at", "Procesado en");
			tracking_line = tracking_line.replaceAll("Arrived at Sort Facility", "Salida de un centro de tránsito de DHL en");
			tracking_line = tracking_line.replaceAll("Shipment picked up", "	Envío retirado/recolectado");
			tracking_line = tracking_line.replaceAll("Customs status updated", "Actualización del estatus de aduanas");
			tracking_line = tracking_line.replaceAll("Clearance Delay", "Retraso en el despacho");
			tracking_line = tracking_line.replaceAll("Clearance processing complete at", "Proceso de Aduana finalizado en ");
			tracking_line = tracking_line.replaceAll("Delivery attempted; recipient not home", "Intento de entrega: destinatario ausente");
			tracking_line = tracking_line.replaceAll("Shipment on hold", "Envío en tránsito");
			tracking_line = tracking_line.replaceAll("Scheduled for delivery", "Programado para entrega");


			jQuery(".tracking_lines").html(tracking_line);
			
			

		}
	}
	
	function use_tracking_response(tracking_response, tracking_company, error, errorMessage){
	
		jQuery("#tracking_message").html("");
		document.getElementById("tracking_table").style.display = "none";
		jQuery("#delivered_to").html("");
		
		if(error || tracking_response == "")
		{
			jQuery("#tracking_message").append(getErrorMessage(tracking_company));
		}else{
			var tracking_response_array = tracking_response.split("|");
			
			if(tracking_response_array[0] == 1)
			{
				jQuery("#tracking_message").append(tracking_response_array[1]);
			}else{
				document.getElementById("tracking_table").style.display = "";
				jQuery("#tracking_number").html(tracking_response_array[2]);
				jQuery("#origin").html(tracking_response_array[4]);
				jQuery("#destination").html(tracking_response_array[5]);
				jQuery("#date_begin").html(tracking_response_array[14]);
				jQuery("#date_sent").html(tracking_response_array[15]);
				jQuery("#delivered_to").html(tracking_response_array[16]);
				jQuery("#date_delivery").html(tracking_response_array[17] + " a las: " + tracking_response_array[18]);
				jQuery("#address").html(tracking_response_array[23]);
			}
			
		}
	}

	function use_tracking_response_castores(tracking_response, tracking_company, error, errorMessage){
	
		jQuery("#tracking_message").html("");
		document.getElementById("tracking_table").style.display = "none";
		jQuery("#delivered_to").html("");
		
		if(error || tracking_response == "")
		{
			jQuery("#tracking_message").append(getErrorMessage(tracking_company));
		}else{

			jQuery("#tracking_message").append(tracking_response);
			
			
		}
	}

	function use_tracking_response_odm(tracking_response, tracking_company, error, errorMessage){
	
		jQuery("#tracking_message").html("");
		document.getElementById("tracking_table").style.display = "none";
		jQuery("#delivered_to").html("");
		
		if(error || tracking_response == "")
		{
			jQuery("#tracking_message").append(getErrorMessage(tracking_company));
		}else{

			jQuery("#tracking_message").append(tracking_response);
			
			
		}
	}

	function use_tracking_response_senda(tracking_response, tracking_company, error, errorMessage){
	
		jQuery("#tracking_message").html("");
		document.getElementById("tracking_table").style.display = "none";
		jQuery("#delivered_to").html("");
		
		if(error || tracking_response == "")
		{
			jQuery("#tracking_message").append(getErrorMessage(tracking_company));
		}else{

			jQuery("#tracking_message").append(tracking_response);
			
			
		}
	}

	function use_tracking_response_flecha_amarilla(tracking_response, tracking_company, error, errorMessage){
	
		jQuery("#tracking_message").html("");
		document.getElementById("tracking_table").style.display = "none";
		jQuery("#delivered_to").html("");
		
		if(error || tracking_response == "")
		{
			jQuery("#tracking_message").append(getErrorMessage(tracking_company));
		}else{

			jQuery("#tracking_message").append(tracking_response);
			
			
		}
	}
	
	function formatDate(date) {
  		var hours = date.getHours();
 		 var minutes = date.getMinutes();

  		minutes = minutes < 10 ? '0'+minutes : minutes;
  		var strTime = hours + ':' + minutes;
  		var month = date.getMonth()+1;
  	return date.getDate() + "-" + month + "-" + date.getFullYear() ;//+ "  " + strTime;
	}
	
	String.prototype.replaceAll = function(search, replacement) {
    	var target = this;
    	return target.replace(new RegExp(search, 'g'), replacement);
	};


	 jQuery(".tracking_frame").hide();

	var loading = jQuery('#loadingDiv').hide();
	jQuery(document).ajaxStart(function () {
		loading.show();
	  }).ajaxStop(function () {
		loading.hide();
	  });

	  function getErrorMessage(selected_tracker){

	  	var web = document.getElementById('hidden_web_'+selected_tracker).value;
	  	var web_href = web;
	  	if(web.indexOf("http") == -1){
	  		web_href= "http://" + web;
	  	}

	  	var tel = document.getElementById('hidden_telefono_'+selected_tracker).value;

	  	var return_message = "<p>No se encontró ninguna guía.</p>";
	  	return_message += "<p style='color:#000;'>Por favor consulta directamente con la empresa por los siguientes medios:Teléfono <a href='tel:"+tel+"'>"+tel+"</a> o en su página oficial <a href='"+web_href+"' target='_blank' rel='nofollow'>"+web+"</a></p>";

	  	return return_message;

	  }