<?php 

//Get data from form
$ciudad_origen = $_POST["ciudad_origen"];
$ciudad_destino =$_POST["ciudad_destino"];

$package_test = array();

$origen = $_POST["from_keyword_id_se"];
$destino = $_POST["to_keyword_id_se"];
$doc_or_package = $_POST["doc_or_package"];
$doc_weight = $_POST["doc_weight"];
$package_length = $_POST["package_length"];
$package_width = $_POST["package_width"];
$package_height = $_POST["package_height"];
$package_weight = $_POST["package_weight"];
$insurance = $_POST["insurance"];
$country_origen = $_POST["country_origen"];
$country_destino = $_POST["country_destino"];

$ciudad_origen_arr = explode("-", $ciudad_origen);
if($country_origen !== "CO"){
  $ciudad_origen = preg_replace('/\(.*\)/','',$ciudad_origen_arr[2]);
}else{
  $ciudad_origen = preg_replace('/\(.*\)/','',$ciudad_origen_arr[1]);
}
$ciudad_origen = trim($ciudad_origen);

$ciudad_destino_arr = explode("-", $ciudad_destino);
if($country_destino !== "CO"){
  $ciudad_destino = preg_replace('/\(.*\)/','',$ciudad_destino_arr[2]);
}else{
  $ciudad_destino = preg_replace('/\(.*\)/','',$ciudad_destino_arr[1]);
}
$ciudad_destino = trim($ciudad_destino);

$number_packages = $_POST["number_packages"];

$mas_de_un_cp_origen = false;
$mas_de_un_cp_destino = false;

$weight = "";
if(!empty($doc_weight)){
	$weight = $doc_weight;
}else if(!empty($package_weight)){
	$weight = $package_weight;
}

//Login data to API

$api_key = "84e8894ccbc92df8ee2df176804f528d";
$enviaya_account = "IGNJ4182";
$bookingUrl = 'https://enviaya.com.mx/api/v1/rates';

$postal_code_origen_url = "https://enviaya.com.mx/api/v1/get_postal_code_information?api_key=".$api_key."&country_code=".$country_origen."&page=1&per_page=500&postal_code=" . $origen;
$postal_code_destino_url = "https://enviaya.com.mx/api/v1/get_postal_code_information?api_key=".$api_key."&country_code=".$country_destino."&page=1&per_page=500&postal_code=" . $destino;

$params['method'] = 'GET';
$params['baseUrl'] = $postal_code_origen_url;

$origenPostalBookingResponse = callWs($params);

if(count($origenPostalBookingResponse["postal_code_information"]) > 1){
  $mas_de_un_cp_origen = true;
}

$params['baseUrl'] = $postal_code_destino_url;

$destinoPostalBookingResponse = callWs($params);

if(count($destinoPostalBookingResponse["postal_code_information"]) > 1){
  $mas_de_un_cp_destino = true;
}

//JSON data

$params['params'] ='{
  "enviaya_account": "'.$enviaya_account.'",
  "carrier_account": null,
  "api_key":"'.$api_key.'",
    "shipment":{
      "shipment_type":"'.$doc_or_package.'",
      "parcels":[';

      if($doc_weight !== "" && $doc_weight !== "0"){
       $params['params'] .='{
          "quantity":"1",
          "weight":"'.$weight.'",
          "weight_unit":"kg",
          "length":"'.$package_length.'",
          "height":"'.$package_height.'",
          "width":"'.$package_width.'",
          "dimension_unit":"cm"
        }';       
      }else{
        $count = 0;
        $parcels_txt = "";
        foreach($package_height as $parcel){
          $parcels_txt .='{
          "quantity":"'.$number_packages[$count].'",
          "weight":"'.$weight[$count].'",
          "weight_unit":"kg",
          "length":"'.$package_length[$count].'",
          "height":"'.$package_height[$count].'",
          "width":"'.$package_width[$count].'",
          "dimension_unit":"cm"
        },';

          $count += 1;

        }

        $params['params'] .= rtrim($parcels_txt,",");
      }



$params['params'] .=']
    },
    "origin_direction":{
      "country_code":"'.$country_origen.'",';//"postal_code":"'.$origen.'","city":"'.$ciudad_origen.'"';

      if($mas_de_un_cp_origen || $country_origen === "PE"){
          $params['params'] .= '"postal_code":"'.$origen.'","city":"'.$ciudad_origen.'"';
      }else{
        if($country_origen !== "CO"){
          $params['params'] .= '"postal_code":"'.$origen.'"';
        }else{
          $params['params'] .= '"city":"'.$ciudad_origen.'"';
        }       
      }


      

    $params['params'] .='},
    "destination_direction":{
      "country_code":"'.$country_destino.'",'; //"postal_code":"'.$destino.'","city":"'.$ciudad_destino.'"';


      if($mas_de_un_cp_destino || $country_destino === "PE"){
          $params['params'] .= '"postal_code":"'.$destino.'","city":"'.$ciudad_destino.'"';
      }else{
        if($country_destino !== "CO"){
          $params['params'] .= '"postal_code":"'.$destino.'"';

        }else{
          $params['params'] .= '"city":"'.$ciudad_destino.'"';
        }       
      }




      
    $params['params'] .='},
    "insured_value":"'.$insurance.'",
    "insured_value_currency":"MXN"
}';

error_log($params['params']);

//echo $params['params'];

//Call API

$params['baseUrl'] = $bookingUrl;
$params['method'] = 'POST';

$bookingResponse = callWs($params);

header('Content-Type: application/json');
echo json_encode($bookingResponse);


function callWs(array $params) {

    $ch = curl_init();

    $uri = $params['baseUrl'];
    $method = $params['method'];
    $params = $params['params'];

    curl_setopt($ch, CURLOPT_URL, $uri);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    
	 curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    	'Content-Type: application/json',                                                                                
    	'Content-Length: ' . strlen($params))                                                                       
	);

    $response = curl_exec($ch);
	$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if (!($statusCode>=200 && $statusCode <300)) {
		  error_log(print_r('CODE. '.$response_code, true));
    }
    
    //echo "response code:" . $response_code;
    if(($response_code !== 201 && $params['method'] === "POST") || ($response_code !== 200 && $params['method'] === "GET")){
      $content =  "error" . $response_code;
      error_log(print_r($response.' '.'CODE. '.$response_code, true));
    }else{
      $content = json_decode($response, true);
      //error_log(print_r($response, true));
    }
    

    return $content;
}
?>




