<?php

	$tracking_no = $_GET['tracking_no'];
	$tracking_company = $_GET['tracking_company'];
	$api_key = "84e8894ccbc92df8ee2df176804f528d";
	$enviaya_account = "FPAG8XIK";
	$bookingUrl = 'https://enviaya.com.mx/api/v1/trackings';
	
	$paramsBookingRequest = "enviaya_account=".$enviaya_account."&carrier_account=null&api_key=".$api_key."&carrier=".$tracking_company."&shipment_number=" . $tracking_no;





$params['baseUrl'] = $bookingUrl;
$params['method'] = 'POST';
$params['params'] = $paramsBookingRequest;

$bookingResponse = callWs($params);

header('Content-Type: application/json');
echo json_encode($bookingResponse);


//Funcion Curl para realizar el booking
function callWs(array $params) {

    $ch = curl_init();

    $uri = $params['baseUrl'];
    $method = $params['method'];
    $params = $params['params'];

    curl_setopt($ch, CURLOPT_URL, $uri);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

    $response = curl_exec($ch);
	$response_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if (!($statusCode>=200  && $statusCode <300)) {
		//error_log(print_r($response.' '.'CODE. '.$response_code, true));
    }
     error_log($response);
    $content = json_decode($response, true);


    return $content;
}

?>