jQuery(document).ready(function() {

	function lazyLoad() {
	    lazyAds.forEach(ad => {
	        if (ad.offsetTop < window.innerHeight + window.pageYOffset + inAdvance && ad.className.indexOf("loaded") < 0) {
	            if(ad.id == "adsense_submenu"){
	            	add_ad("2533847850","","link",ad.id,"");
	            	ad.classList.add('loaded');
	            }else if(ad.id == "adsense_servicios"){
	            	add_ad("8929232790","","auto",ad.id,"");
	            	ad.classList.add('loaded');
	            }else if(ad.id == "adsense_cotiza"){
	            	add_ad("8954897920","","link",ad.id,"");
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
