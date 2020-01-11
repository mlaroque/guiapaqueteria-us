<?php
global $post;
include '/home/guiapaqueteria/us_connect_to_db.php';

$sql = 'SELECT * FROM LCMN_SUCURSALES_DETALLES WHERE POST_ID = ' . $post->ID;

$results = array();
$count = 1;
foreach ($conn->query($sql) as $row) {
	$results[$count]["nombre"] = $row["NOMBRE"];
	$results[$count]["direccion"] = $row["DIRECCION_COMPLETA"];
	$results[$count]["telefono"] = $row["TELEFONO"];
	$results[$count]["nombre"] = $row["NOMBRE"];
	$results[$count]["calle"] = $row["CALLE"];
	$results[$count]["ciudad"] = $row["CIUDAD"];
	$results[$count]["codigo_postal"] = $row["CODIGO_POSTAL"];
	$results[$count]["departamento"] = $row["DEPARTAMENTO"];

	$dias_arr = array();
	$dias_arr["lunes"] = $row["HOR_LUNES"];
	$dias_arr["martes"] = $row["HOR_MARTES"];
	$dias_arr["miercoles"] = $row["HOR_MIERCOLES"];
	$dias_arr["jueves"] = $row["HOR_JUEVES"];
	$dias_arr["viernes"] = $row["HOR_VIERNES"];
	$dias_arr["sabado"] = $row["HOR_SABADO"];
	$dias_arr["domingo"] = $row["HOR_DOMINGO"];
	$dias_unique = array_unique($dias_arr);
	$dias = array();
	$subcount = 0;
	foreach($dias_unique as $key => $value){
		foreach($dias_arr as $key2 => $value2){
			if($value2 === $value){
				$dias[$subcount]["dias"] .= $key2 . " / ";
				$dias[$subcount]["horarios"] = $value2;
			}
		}
		$subcount += 1;
	}
	$results[$count]["dias"] = $dias;

	$count += 1;
}

?>

<div id="primary" class="content-area col-12 col-sm-12 col-md-12 col-lg-12 pull-left">
	<main id="main" class="site-main" role="main">
		
		<div class="row">
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center mt-2 mb-4">
				<h2 class="grisP">Encuentra aquí los horarios y teléfonos de las oficinas:</h2>
			</div>
		</div>

		<?php foreach($results as $result): ?>
		<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 well wellLPhija">
						<h2 class="noMarPad titHijas"><?=$result["nombre"]?></h2>
						<hr>
						
 													
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="i-scheda">									
							<h5><b>Dirección</b></h5>
							<p><?=$result['calle']?> </p>
							<p><?=$result['codigo_postal']?></p>
							<p><?=$result['ciudad']?></p>
							<p><?=$result['departamento']?></p>
							<p>Estados Unidos</p>
							<h5><b>Horarios</b></h5>
							<?php foreach($result["dias"] as $dia):?>
							<p class="lhn">
								<?php echo rtrim($dia["dias"],"/ "); ?>
								<?php if($dia["horarios"] !== ""){
										echo $dia["horarios"];
									}else{
										echo "-";
									} ?>
							</p>
							<?php endforeach;?>
							<h5><b>Telefono</b></h5>
							<p><?=$result['telefono']?></p>
							</div>
								</div>
								
 				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-center">
							<div class="clearfix"></div>
							<div class="googlemap_wrap">
								<iframe
  									width="600"
  									height="450"
  									frameborder="0" style="border:0"
  									src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBpUejQpYFS2opJHv5UCk2TLX6OCTLNAMc&q=<?php echo urlencode($result['nombre']);?>+%2C+<?php echo $post->post_name;?>" allowfullscreen>
								</iframe>
							</div>
						<div class="clearfix"></div>
				</div>					
		</div>
		</div>

		<?php endforeach; ?>

	</main>

</div>