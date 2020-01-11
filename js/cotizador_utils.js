jQuery(".input_paqueteria").keydown(function (evt) {
    if (evt.which < 48 || (evt.which > 57 && evt.which < 96) || evt.which >105)
    {
      if(evt.which !== 9){
        evt.preventDefault();
        if(jQuery(this).attr("name").indexOf("number_packages") === -1){
          alert("Este campo está en centimetros y sólo acepta números enteros (Si tienes un valor en centimetros con decimal, redondea tu cifra abajo).");        
        }      
      }

    }
});

jQuery(".clone-link").click(function(e){

  var primera_linea = jQuery(".sub_tab_paqueteria:first").clone().find("input[type='number']").val("").end();

  jQuery(".sub_tab_paqueteria:last").after(primera_linea);

  jQuery(".removeButton").show();

  jQuery(".input_paqueteria").keydown(function (evt) {
    if (evt.which < 48 || (evt.which > 57 && evt.which < 96) || evt.which >105)
    {
      if(evt.which !== 9){
        evt.preventDefault();
        if(jQuery(this).attr("name").indexOf("number_packages") === -1){
          alert("Este campo está en centimetros y sólo acepta números enteros (Si tienes un valor en centimetros con decimal, redondea tu cifra abajo).");        
        }      
      }

    }
  });

});

function remove_link(element){

  jQuery(element).parents(".sub_tab_paqueteria").remove();

  if(jQuery(".removeButton").length < 2){
      jQuery(".removeButton").hide();
  }
}

jQuery(document).ready(function() {
  jQuery("form#login").validate({
    lang: 'es'  
  });
});

  jQuery(window).on('load', function(){
    jQuery("#from_keyword_se").attr("autocomplete", "nope");
    jQuery("#to_keyword_se").attr("autocomplete", "nope");
  });

  jQuery('input[type=number]').focus(function() {
      jQuery( this ).val("");
  });
  
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab

  //First page validation
  jQuery("#paq,#doc").click(function() {
    document.getElementById("nextBtn").style.display = "inline";
  });

  //Second page validation
  jQuery("#from_keyword_se,#to_keyword_se").keyup(function(){
      showNextButtonZipCodesPanel();
  });
  jQuery("#from_keyword_se,#to_keyword_se").click(function(){
      showNextButtonZipCodesPanel();
  });

  function showNextButtonZipCodesPanel(){
      if(jQuery("#from_keyword_se").val() !== "" && jQuery("#to_keyword_se").val() !== ""){
          document.getElementById("nextBtn").style.display = "inline";
      }else{
          document.getElementById("nextBtn").style.display = "none";
      }    
  }

  //Second page validation
  jQuery("#package_length,#package_width,#package_height,#package_weight,#doc_weight,#number_packages").keyup(function(){
      secondPageValidation();
  });
  jQuery("input[name='package_length'],input[name='package_width'],input[name='package_weight'],input[name='package_height'],input[name='doc_weight'],input[name='number_packages']").keyup(function(){
      secondPageValidation();
  });
    jQuery("#package_length,#package_width,#package_height,#package_weight,#doc_weight,#number_packages").click(function(){
      secondPageValidation();
  });

  function secondPageValidation(){
    if(document.getElementById("paq").checked){
      if(jQuery("#package_length").val() != 0 && jQuery("#package_width").val() != 0
         && jQuery("#package_height").val() != 0 && jQuery("#package_weight").val() != 0
          && jQuery("#number_packages").val() != 0){
          document.getElementById("nextBtn").style.display = "inline";
      }else{
          document.getElementById("nextBtn").style.display = "none";
      }
    }else{
      if(jQuery("#doc_weight").val() != 0){
          document.getElementById("nextBtn").style.display = "inline";
      }else{
          document.getElementById("nextBtn").style.display = "none";
      }      
    }
  }


  //Fourth page validation
  jQuery("#q_asegurar_si").click(function(){
      jQuery("#valor_asegurado").show();
      document.getElementById("nextBtn").style.display = "none";
  });
  jQuery("#q_asegurar_no").click(function(){
      document.getElementById("nextBtn").style.display = "inline";
      jQuery("#valor_asegurado").hide();
      jQuery("#valor_asegurado_txt").val("");
  });
  jQuery("#valor_asegurado_txt").keyup(function(){
      if(jQuery("#valor_asegurado_txt").val() !== ""){
          document.getElementById("nextBtn").style.display = "inline";
      }else{
          document.getElementById("nextBtn").style.display = "none";
      }
  });

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
    if(!document.getElementById("paq").checked && !document.getElementById("doc").checked){
      document.getElementById("nextBtn").style.display = "none";
    }
    document.getElementById("prevBtn").style.display = "none";
    
  } else {
      if(n == 1){
        document.getElementById("nextBtn").style.display = "inline";
    }

    if(n == 2){
        if(document.getElementById("paq").checked){
            jQuery(".package_container").show();
            jQuery(".document_container").hide();
            jQuery(".tab_paq_title").html("Introduce las medidas");
            jQuery(".agregar_div").show();
        }else{
            jQuery(".package_container").hide();
            jQuery(".document_container").show();
            jQuery(".tab_paq_title").html("Introduce el peso");
            jQuery(".agregar_div").hide();
        }
    }

    if(n == 2 && jQuery("#package_length").val() != 0 && jQuery("#package_width").val() != 0
         && jQuery("#package_height").val() != 0 && jQuery("#package_weight").val() != 0 && jQuery("#number_packages").val() != 0){
        document.getElementById("nextBtn").style.display = "inline";
    }

    if(n == 3){
        if(document.getElementById("q_asegurar_no").checked){
            document.getElementById("nextBtn").style.display = "inline";
            jQuery("#valor_asegurado").hide();
            jQuery("#valor_asegurado_txt").val("");
        }else{
            jQuery("#valor_asegurado").show();
            if(jQuery("#valor_asegurado_txt").val() !== ""){
                document.getElementById("nextBtn").style.display = "inline";
            }
        }
    }
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Cotizar";
  } else {
    document.getElementById("nextBtn").innerHTML = "Seguir";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  if(n == 1){
    document.getElementById("nextBtn").style.display = "none";
  }else{
    document.getElementById("nextBtn").style.display = "inline";
  }
  // Exit the function if any field in the current tab is invalid:
  if(currentTab == 2 && n == 1 && !validatePostalCodes()){
      alert("Por favor introduce un código postal y elige la colonia entre la lista de resultados.");
      return false;
  }/*else if(currentTab == 3 && n == 1 && !jQuery("#package_width").valid()){
      alert("Por favor introduce un ancho correcto: sólo acepta valores enteros o medios.");
      return false;
  }*/
  //if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validatePostalCodes(){

  if(jQuery("#from_keyword_id_se").val() !== "" && jQuery("#to_keyword_id_se").val() !== ""){
      return true;
  }else{
      return false;
  }

}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}


jQuery("#country_origen").change(function(){

  jQuery("#from_keyword_se").val("");
  jQuery("#from_keyword_id_se").val("");

  var selected_country = jQuery(this).val();
  if(selected_country === "MX"){
      $options_str = '<option value="US">Estados Unidos</option>';
      $options_str += '<option value="MX">México</option>';
  }else{
      $options_str = '<option value="MX">México</option>';
  }

  jQuery("#country_destino").html($options_str);
});

jQuery("#country_destino").change(function(){

  jQuery("#to_keyword_se").val("");
  jQuery("#to_keyword_id_se").val("");

});

jQuery(window).on('load', function(){

jQuery("form").validate({

  messages: {
    package_width: "Entra un múltiple de .5"
  }

  });

});