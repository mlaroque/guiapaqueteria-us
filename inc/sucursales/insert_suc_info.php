<?php

		include '/home/guiapaqueteria/us_connect_to_db.php';

		$search_query="";
		$params['url'] = "";
		$params['method'] = 'GET';

		$query = 'SELECT * FROM LCMN_SUCURSALES_DIR';

		foreach($conn->query($query) as $row) {
        	
        	
        	$search_query = $row['SEARCH_QUERY'];

			$url = "https://maps.googleapis.com/maps/api/place/textsearch/json?query=".urlencode($search_query)."&key=AIzaSyAoR3CbKv-A4-TPt3vngAa_c6iWTKMj2ZQ";


			$ch = curl_init(); 

			curl_setopt($ch, CURLOPT_URL, $url); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

			$output = curl_exec($ch); 
			$geoloc = json_decode($output, true);

			//echo $geoloc;
			//echo $geoloc['results'][0]['geometry']['location']['lat'];
			//echo $geoloc['results'][0]['place_id'];

			curl_close($ch); 

			foreach($geoloc['results'] as $geoloc_result){


			$ch = curl_init();

			$url = "https://maps.googleapis.com/maps/api/place/details/json?placeid=".$geoloc_result['place_id']."&key=AIzaSyAoR3CbKv-A4-TPt3vngAa_c6iWTKMj2ZQ";

			curl_setopt($ch, CURLOPT_URL, $url); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

			$output = curl_exec($ch); 
			$sucursal = json_decode($output, true);

			$address_components = $sucursal['result']['address_components'];
			$calle_no; $calle; $ciudad; $departamento; $pais; $codigo_postal;

			foreach($address_components as $address_component){

				if (in_array("street_number", $address_component["types"])){
					$calle_no = $address_component["long_name"];
				}else if (in_array("route", $address_component["types"])){
					$calle = $address_component["long_name"];
				}else if (in_array("locality", $address_component["types"])){
					$ciudad = $address_component["long_name"];
				}else if (in_array("administrative_area_level_1", $address_component["types"])){
					$departamento = $address_component["long_name"];
				}else if (in_array("country", $address_component["types"])){
					$pais = $address_component["long_name"];
				}else if (in_array("postal_code", $address_component["types"])){
					$codigo_postal = $address_component["long_name"];
				}
			}


			$lunes = "";
			$martes = "";
			$miercoles = "";
			$jueves = "";
			$viernes = "";
			$sabado = "";
			$domingo = "";

			foreach($sucursal['result']['opening_hours']['periods'] as $intervalo){
				

				if($intervalo['open']['day'] == "1"){
					$lunes .= $intervalo['open']['time'] . "-" . $intervalo['close']['time'] . ",";
				}else if($intervalo['open']['day'] == "2"){
					$martes .= $intervalo['open']['time'] . "-" . $intervalo['close']['time'] . ",";
				}else if($intervalo['open']['day'] == "3"){
					$miercoles .= $intervalo['open']['time'] . "-" . $intervalo['close']['time'] . ",";
				}else if($intervalo['open']['day'] == "4"){
					$jueves .= $intervalo['open']['time'] . "-" . $intervalo['close']['time'] . ",";
				}else if($intervalo['open']['day'] == "5"){
					$viernes .= $intervalo['open']['time'] . "-" . $intervalo['close']['time'] . ",";
				}else if($intervalo['open']['day'] == "6"){
					$sabado .= $intervalo['open']['time'] . "-" . $intervalo['close']['time'] . ",";
				}else if($intervalo['open']['day'] == "0"){
					$domingo .= $intervalo['open']['time'] . "-" . $intervalo['close']['time'] . ",";
				}

			}

			curl_close($ch);

				$stmt = $conn->prepare("INSERT INTO LCMN_SUCURSALES_DETALLES (POST_ID, NOMBRE, CALLE_NO, CALLE, CIUDAD, DEPARTAMENTO, PAIS, CODIGO_POSTAL, DIRECCION_COMPLETA, LATITUD, LONGITUD, TELEFONO, GMAPS_URL, HOR_LUNES, HOR_MARTES, HOR_MIERCOLES, HOR_JUEVES, HOR_VIERNES, HOR_SABADO, HOR_DOMINGO) VALUES (:post_id, :nombre, :calle_no,:calle,:ciudad,:departamento,:pais,:codigo_postal,:direccion_completa,:latitud,:longitud,:telefono,:gmaps_url,:hor_lunes,:hor_martes,:hor_miercoles,:hor_jueves,:hor_viernes,:hor_sabado,:hor_domingo)");

				$stmt->bindParam(':post_id', $row['POST_ID']);
				$stmt->bindParam(':nombre', $sucursal['result']['name']);
				$stmt->bindParam(':calle_no', $calle_no);
				$stmt->bindParam(':calle', $calle);
				$stmt->bindParam(':ciudad', $ciudad);
				$stmt->bindParam(':departamento', $departamento);
				$stmt->bindParam(':pais', $pais);
				$stmt->bindParam(':codigo_postal', $codigo_postal);
				$stmt->bindParam(':direccion_completa', $sucursal['result']['formatted_address']);
				$stmt->bindParam(':latitud', $sucursal['result']['geometry']['location']['lat']);
				$stmt->bindParam(':longitud', $sucursal['result']['geometry']['location']['lng']);
				$stmt->bindParam(':telefono', $sucursal['result']['formatted_phone_number']);
				$stmt->bindParam(':gmaps_url', $sucursal['result']['url']);
				$stmt->bindParam(':hor_lunes', trim($lunes,","));
				$stmt->bindParam(':hor_martes', trim($martes,","));
				$stmt->bindParam(':hor_miercoles', trim($miercoles,","));
				$stmt->bindParam(':hor_jueves', trim($jueves,","));
				$stmt->bindParam(':hor_viernes', trim($viernes,","));
				$stmt->bindParam(':hor_sabado', trim($sabado,","));
				$stmt->bindParam(':hor_domingo', trim($domingo,","));

				if($stmt->execute()){
					echo  "success";
				}else{
					echo "insert failed";
				}

			}


    	}

    	$conn = null;



function callWS(array $params) {
    $ch = curl_init();

    $uri = $params['url'];
    $method = $params['method'];


    curl_setopt($ch, CURLOPT_URL, $uri);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

    $response = curl_exec($ch);
    //$content = json_decode($response);
	$content = $response;
	// Vérification si une erreur est survenue
	if(!curl_errno($ch))
	{
	 $info = curl_getinfo($ch);

	 error_log(print_r($info['http_code'] , true));
	}
    error_log(print_r($content, true));

    return $content;
}

?>