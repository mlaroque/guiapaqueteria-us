function buscar_sucursales(){

/* 	var codigo_postal = jQuery(".tt-suggestion").html();

	if(codigo_postal !== null && typeof codigo_postal !== "undefined"){
		codigo_postal = codigo_postal.replace('<strong class="tt-highlight">','');
		codigo_postal = codigo_postal.replace('</strong>','');
	}else{
		codigo_postal = "";
	}
 */

	var ciudad = jQuery("#estado option:selected").val();
    var paqueteria = jQuery("#paqueterias option:selected").val();
    

    window.location.href = "https://guiapaqueteria.com/us/sucursales-cercanas?ciudad="+ciudad+"&empresa="+paqueteria;

	/* var regex = /\d+/i;
	if(codigo_postal.match(regex) || jQuery("#keyword_se").val() == ""){

		window.location.href = "https://guiapaqueteria.com/sucursales-cercanas?suc_codigo_postal="+codigo_postal+"&suc_paqueteria="+paqueteria+"&suc_estado="+estado;
	}else{
		alert("Selecciona un lugar de la lista que te proponemos.");
	} */


}