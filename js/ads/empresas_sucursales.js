jQuery(document).ready(function() {

	function lazyLoad() {
	    lazyAds.forEach(ad => {
	        if (ad.offsetTop < window.innerHeight + window.pageYOffset + inAdvance && ad.className.indexOf("loaded") < 0) {
	            if(ad.id == "adsense_submenu"){
	            	add_ad("8604717594","","link",ad.id,"");
	            	ad.classList.add('loaded');
	            }else if(ad.id.includes("adsense_cada3")){
	            	add_ad("2338692141","","auto",ad.id,"");
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
