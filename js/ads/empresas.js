jQuery(document).ready(function() {

	function lazyLoad() {
	    lazyAds.forEach(ad => {
	        if (ad.offsetTop < window.innerHeight + window.pageYOffset + inAdvance && ad.className.indexOf("loaded") < 0) {
	            if(ad.id == "adsense_submenu"){
	            	add_ad("8918084265","","link",ad.id,"","Guiapaqueteria US Empresas Abajo H1 Submenu");
	            	ad.classList.add('loaded');
	            }else if(ad.id == "adsense_servicios"){
	            	add_ad("7744603392","","auto",ad.id,"","Guiapaqueteria US Empresas Abajo H2 Responsive");
	            	ad.classList.add('loaded');
	            }else if(ad.id == "adsense_cotiza"){
	            	add_ad("5216666492","","link",ad.id,"","Guiapaqueteria US Empresas Abajo H2 Submenu");
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
