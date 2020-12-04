jQuery(document).ready(function() {

	function lazyLoad() {
	    lazyAds.forEach(ad => {
	        if (ad.offsetTop < window.innerHeight + window.pageYOffset + inAdvance && ad.className.indexOf("loaded") < 0) {
	            if(ad.id == "adsense_submenu"){
	            	add_ad("5525634165","","link",ad.id,"","Guiapaqueteria US Empresas Sucursales Abajo Cotizator Submenu");
	            	ad.classList.add('loaded');
	            }else if(ad.id.includes("adsense_cada3")){
	            	add_ad("2969777102","","auto",ad.id,"","Guiapaqueteria US Empresas Sucursales Abajo H2 Responsive");
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
