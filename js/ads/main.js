
var lazyAds = [...document.querySelectorAll('.lazy-ads')];
var inAdvance = 100;


function add_ad(slot, layout, format,id,sizes){
	let container_block = document.getElementById(id);

	let ad = document.createElement( 'ins' );
	ad.setAttribute("style","display:block; text-align:center;" + sizes) ;
	ad.setAttribute("class","adsbygoogle") ;
	ad.setAttribute("data-ad-client","ca-pub-7600038231425274") ;
	if(layout != ""){
		ad.setAttribute("data-ad-layout",layout) ;
	}
	ad.setAttribute("data-ad-slot",slot) ;
	ad.setAttribute("data-ad-format",format) ;
	ad.setAttribute("data-full-width-responsive","true") ;

	container_block.appendChild( ad );

	(adsbygoogle = window.adsbygoogle || []).push({});
}