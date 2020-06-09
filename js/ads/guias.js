jQuery(document).ready(function() {

	function lazyLoad() {
	    lazyAds.forEach(ad => {
	        if (ad.offsetTop < window.innerHeight + window.pageYOffset + inAdvance && ad.className.indexOf("loaded") < 0) {
	            if(ad.id == "adsense_submenu"){
	            	add_ad("3352105507","","link",ad.id,"");
	            	ad.classList.add('loaded');
	            }else if(ad.id == "adsense_1erh2"){
	            	add_ad("1241232892","","auto",ad.id,"");
	            	ad.classList.add('loaded');
	            }else if(ad.id == "adsense_3erh2"){
	            	add_ad("7099778827","","auto",ad.id,"");
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
