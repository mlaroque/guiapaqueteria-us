jQuery(document).ready(function() {

	function lazyLoad() {
	    lazyAds.forEach(ad => {
	        if (ad.offsetTop < window.innerHeight + window.pageYOffset + inAdvance && ad.className.indexOf("loaded") < 0) {
	            if(ad.id == "adsense_submenu"){
	            	add_ad("1640367657","","link",ad.id,"","Guiapaqueteria US Paqueterias en Abajo H1 Submenu");
	            	ad.classList.add('loaded');
	            }else if(ad.id.includes("adsense_cada5")){
	            	add_ad("8331760905","","auto",ad.id,"","Guiapaqueteria US Paqueterias en Abajo Buscador Sucursales Responsive");
	            	ad.classList.add('loaded');
	            }else if(ad.id == "adsense_bottom"){
	            	add_ad("4831499593","","auto",ad.id,"","Guiapaqueteria US Paqueterias en Abajo Boton Responsive");
	            	ad.classList.add('loaded');
	            }
	        }
	    })
	
	    // if all loaded removeEventListener
	}

	lazyLoad();

	window.addEventListener('scroll', lazyLoad);
	window.addEventListener('resize', lazyLoad);

});
