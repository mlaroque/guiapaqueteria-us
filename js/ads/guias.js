jQuery(document).ready(function() {

	function lazyLoad() {
	    lazyAds.forEach(ad => {
	        if (ad.offsetTop < window.innerHeight + window.pageYOffset + inAdvance && ad.className.indexOf("loaded") < 0) {
	            if(ad.id == "adsense_submenu"){
	            	add_ad("7686901251","","link",ad.id,"","Guiapaqueteria US Guias Abajo H1 Responsive");
	            	ad.classList.add('loaded');
	            }else if(ad.id == "adsense_1erh2"){
	            	add_ad("2657935857","","auto",ad.id,"","Guiapaqueteria US Guias Abajo 1er H2 Responsive");
	            	ad.classList.add('loaded');
	            }else if(ad.id == "adsense_3erh2"){
	            	add_ad("2598226104","","auto",ad.id,"","Guiapaqueteria US Guias Abajo 3er H2 Responsive");
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
