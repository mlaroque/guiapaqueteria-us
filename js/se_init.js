var charMap = {
    "à": "a",
    "á": "a",
    "â": "a",
    "é": "e",
    "è": "e",
    "ê": "e",
    "ë": "e",
    "É": "e",
    "ï": "i",
    "î": "i",
    "í": "i",
    "ô": "o",
    "ó": "o",
    "ö": "o",
    "û": "u",
    "ú": "u",
    "ù": "u",
    "ü": "u",
    "ñ": "n"
};

var normalize = function (input) {
    jQuery.each(charMap, function (unnormalizedChar, normalizedChar) {
        var regex = new RegExp(unnormalizedChar, 'gi');
        input = input.replace(regex, normalizedChar);
    });
	if(input.indexOf("(") != -1){
		input = input.replace("(","");
	}
    return input;
};

var queryTokenizer = function (q) {
    		var normalized = normalize(q);
    		return Bloodhound.tokenizers.whitespace(normalized);
};

function processList(se_list) {

			var orderedPlaceList = [];
			var list_from = [];
			var se_list_file = "se_list.json";
			l = se_list.length;
			for(index=0;index<l;index++) {
				var name = se_list[index].name;
				orderedPlaceList.push(name);
				list_from.push({ value: name, displayValue: name });
			}
			
			var se_from_bloodhound = new Bloodhound({
				initialize: false,
				datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
				queryTokenizer: queryTokenizer,
				limit: 7,
				 remote: {
    					url: window.location.protocol + '//' + window.location.host + "/wp-content/themes/guiapaqueteria-child/search_engine/search_in_json.php",
    					wildcard: '%QUERY',
    					prepare: function(query, settings) {
							var country_code = "US";
							var selected_country = document.getElementsByName("country_origen")[0];
							if( typeof selected_country != 'undefined' && selected_country !== null){
    							//country_code = document.getElementsByName("country_origen")[0].selectedOptions[0].value;
    							country_code = selected_country.options[selected_country.selectedIndex].value;    								
    						}
    						settings.url += '?query=' + query + "_" + country_code;
    						return settings;
  						}

    				}

			});
			
			var se_to_bloodhound = new Bloodhound({
				datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
				queryTokenizer: queryTokenizer,
				limit: 7,
				  remote: {
    					url: window.location.protocol + '//' + window.location.host + "/wp-content/themes/guiapaqueteria-child/search_engine/search_in_json.php",
    					wildcard: '%QUERY',
    					prepare: function(query, settings) {
    						var country_code = "US";
    						var selected_country = document.getElementsByName("country_destino")[0];
							if( typeof selected_country != 'undefined' && selected_country !== null){
    							//country_code = document.getElementsByName("country_destino")[0].selectedOptions[0].value;
    							country_code = selected_country.options[selected_country.selectedIndex].value;    								
    						}
    						settings.url += '?query=' + query + "_" + country_code;
    					return settings;
  						}
    				}
			});
			
	se_from_bloodhound.initialize();
	se_to_bloodhound.initialize();

	jQuery("#from_keyword_se").typeahead({
	  hint: true,
	  highlight: true,
	  minLength: 1,
	  autoselect: true
	},
	{
	  name: 'se_from_bloodhound',
	  display: 'displayValue',
	  limit: 500,
	  source: se_from_bloodhound	
	});
	
	jQuery("#to_keyword_se").typeahead({
	  hint: true,
	  highlight: true,
	  minLength: 1,
	  autoselect: true
	},
	{
	  name: 'se_to_bloodhound',
	  display: 'displayValue',
	  limit: 500,
	  //source: se_to_bloodhound.ttAdapter()	
	  source: se_to_bloodhound
	});

	jQuery(".autocompletar_from").bind("blur", function(){
		var encontrado = false;
		var valor = "";
		var campo = this;
		var selected_valor = jQuery(campo).val();

		var codigo_postal = selected_valor.substr(0,selected_valor.indexOf("-")); 
		codigo_postal = codigo_postal.trim();
		jQuery("#from_keyword_id_se").val(codigo_postal);

	});
	
	jQuery(".autocompletar_to").bind("blur", function(){
		var encontrado = false;
		var valor = "";
		var campo = this;

		var selected_valor = jQuery(campo).val();

		var codigo_postal = selected_valor.substr(0,selected_valor.indexOf("-")); 
		codigo_postal = codigo_postal.trim();
		jQuery("#to_keyword_id_se").val(codigo_postal);


	});
	

}


jQuery("document").ready(function(){


	data= [];
	processList(data);

		
});