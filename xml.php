<?php 
header('Content-type: text/xml');
include("cnn.php");


$lat = $_GET['y'];
$lon = $_GET['x'];
$cod = intval($_GET['c']);

/*
function getHour() {
	$ho = date('H');
	$mi = date('i');
	if ($mi<30) {
		$nho = $ho;
	}else {
		$nho = date('H', strtotime('1 hour'));
	}

	$aho = $nho.":00";

	if 		($aho== "07:00"): 	$cod = "8";
	elseif 	($aho== "08:00"): 	$cod = "9";
	elseif 	($aho== "09:00"): 	$cod = "10";
	elseif 	($aho== "10:00"): 	$cod = "11";
	elseif 	($aho== "11:00"): 	$cod = "12";
	elseif 	($aho== "12:00"): 	$cod = "13";
	elseif 	($aho== "13:00"): 	$cod = "14";
	elseif 	($aho== "14:00"): 	$cod = "15";
	elseif 	($aho== "15:00"): 	$cod = "16";
	elseif 	($aho== "16:00"): 	$cod = "17";
	elseif 	($aho== "17:00"): 	$cod = "18";
	elseif 	($aho== "18:00"): 	$cod = "19";
	elseif 	($aho== "19:00"): 	$cod = "20";
	elseif 	($aho== "20:00"): 	$cod = "21";
	elseif 	($aho== "21:00"): 	$cod = "22";
	elseif 	($aho== "22:00"): 	$cod = "23";
	elseif 	($aho== "23:00"): 	$cod = "24";
	elseif 	($aho== "00:00"): 	$cod = "25";
	else:	echo "";
	endif;

	$aH["hora"] = $aho;
	$aH["cod"]  = $cod;
	// echo $aho." cod:".$cod;
	return $aH;
}

function findHour($cod) {
	if 		($cod == 8 ):$aho= "07:00" 	;
	elseif 	($cod == 9 ):$aho= "08:00" 	;
	elseif 	($cod == 10):$aho= "09:00" 	;
	elseif 	($cod == 11):$aho= "10:00" 	;
	elseif 	($cod == 12):$aho= "11:00" 	;
	elseif 	($cod == 13):$aho= "12:00" 	;
	elseif 	($cod == 14):$aho= "13:00" 	;
	elseif 	($cod == 15):$aho= "14:00" 	;
	elseif 	($cod == 16):$aho= "15:00" 	;
	elseif 	($cod == 17):$aho= "16:00" 	;
	elseif 	($cod == 18):$aho= "17:00" 	;
	elseif 	($cod == 19):$aho= "18:00" 	;
	elseif 	($cod == 20):$aho= "19:00" 	;
	elseif 	($cod == 21):$aho= "20:00" 	;
	elseif 	($cod == 22):$aho= "21:00" 	;
	elseif 	($cod == 23):$aho= "22:00" 	;
	elseif 	($cod == 24):$aho= "23:00" 	;
	elseif 	($cod == 25):$aho= "00:00" 	;
	else:	echo "";
	endif;
	
	$aH["hora"] = $aho;
	$aH["cod"]  = $cod;
	// echo $aho." cod:".$cod;
	return $aH;
}
*/



// findHour($cod);
// $naH = findHour($cod);

// var_dump(findHour(intval($_GET['c'])));


// echo "Lon: ".$lon."<br>";
// echo "Lat: ".$lat."<br>";

	
$dbconn = my_dbconn3("ordenamiento");
// $sql="SELECT sa.id, sa.gridcode FROM temperatura_".$cod." sa WHERE sde.st_intersects(sde.st_point (".$lon.", ".$lat.", 4326), sa.shape) ORDER BY sa.id;";
$sql="	(SELECT 1 AS var, sa.gridcode FROM temperatura_".$cod." sa WHERE sde.st_intersects(sde.st_point (".$lon.", ".$lat.", 4326), sa.shape) )
		UNION
		(SELECT 2, sa.gridcode FROM wd_10m_".$cod." sa WHERE sde.st_intersects(sde.st_point (".$lon.", ".$lat.", 4326), sa.shape) )
		UNION
		(SELECT 3, sa.gridcode FROM vv_10m_".$cod." sa WHERE sde.st_intersects(sde.st_point (".$lon.", ".$lat.", 4326), sa.shape) )	
		UNION
		(SELECT 4, sa.gridcode FROM presion_".$cod." sa WHERE sde.st_intersects(sde.st_point (".$lon.", ".$lat.", 4326), sa.shape) )			
		UNION
		(SELECT 5, sa.gridcode FROM humedad_".$cod." sa WHERE sde.st_intersects(sde.st_point (".$lon.", ".$lat.", 4326), sa.shape) )
		UNION
		(SELECT 6, sa.gridcode FROM nubosidad_wrf_".$cod." sa WHERE sde.st_intersects(sde.st_point (".$lon.", ".$lat.", 4326), sa.shape) )		
		UNION
		(SELECT 7, sa.gridcode FROM lluvia_".$cod." sa WHERE sde.st_intersects(sde.st_point (".$lon.", ".$lat.", 4326), sa.shape) )	
		ORDER BY var";
$result=pg_query($dbconn, $sql);
while($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	$data[] = $row;
} pg_free_result($result);

// echo "<pre>";
// print_r($data);
// echo "</pre>";

$d1 = $data[0]['gridcode'];
$d2 = $data[1]['gridcode'];
$d3 = $data[2]['gridcode'];
$d4 = $data[3]['gridcode'];
$d5 = $data[4]['gridcode'];
$d6 = $data[5]['gridcode'];
$d7 = $data[6]['gridcode'];

// -8.78469476 + 1.61139411*T + 2.338548839*HR - 0.14611605*T*HR - 0.012308094*T² - 0.016424828*HR² + 0.002211732*T²*HR + 0.00072546*T*HR² - 0.000003582*T²*HR²
$T  = getRanget($d1);
$HR = $d5;
$d8 = -8.78469476 + (1.61139411*$T) + (2.338548839*$HR) - (0.14611605*$T*$HR) - (0.012308094*pow($T,2)) - (0.016424828*pow($HR,2)) + (0.002211732*pow($T,2)*$HR) + (0.00072546*$T*pow($HR,2)) - (0.000003582*pow($T,2)*pow($HR,2));

function getRanget($idt){
	$li = $idt-11;
	$ls = $idt-10;
	$re = $li." °C - ".$ls." °C";
	return $ls;
}
function getRangep($idt){
	$li = 949+$idt;
	$ls = 950+$idt;
	$re = $li." hPa - ".$ls." hPa";
	return $ls;
}
function getRangen($idt){
	if 		($idt==1): 	$re= "Despejado";
	elseif 	($idt==2): 	$re= "Poco nublado";
	elseif 	($idt==3): 	$re= "Medio nublado";
	else:				$re= "Nublado";
	endif;
	return $re;
}
// [0,5,1], [5,30,2], [30,50,3], [50,60,4]

// echo $da."<br>";


?>

<variables_climaticas>
	<var>
		<name>Temperatura</name>
		<valor><?php echo getRanget($d1); ?></valor>
		<description>
		Temperatura: -10 – 50 °C
		</description>
	</var>
	<var>
		<name>Dirección de viento</name>
		<valor><?php echo $d2; ?></valor>
		<description>
		Dirección de viento: 0 – 360° 
		</description>
	</var>
	<var>
		<name>Velocidad de viento</name>
		<valor><?php echo $d3; ?></valor>
		<description>
		Velocidad de viento: 0 – 60 nudos
		</description>
	</var>
	<var>
		<name>Presión atmosférica</name>
		<valor><?php echo getRangep($d4); ?></valor>
		<description>
		Presión atmosférica: 950 – 1050 hPa
		</description>
	</var>
	<var>
		<name>Humedad</name>
		<valor><?php echo $d5; ?></valor>
		<description>
		Humedad:	0 – 100 %
		</description>
	</var>
	<var>
		<name>Nubosidad</name>
		<valor><?php echo getRangen($d6); ?></valor>
		<description>
		Nubosidad: Despejado, Poco nublado, Medio nublado, Nublado
		</description>
	</var>
	<var>
		<name>Lluvia</name>
		<valor><?php echo ($d7/2); ?></valor>
		<description>
		Lluvia:	0 – 100 mm
		</description>
	</var>	
	<var>
		<name>Sensación Térmica</name>
		<valor><?php echo round($d8,0,PHP_ROUND_HALF_DOWN); ?></valor>
		<description>
		Sensación Térmica:	mayor 44 Extraordinario cálido, 38 – 44 Muy cálido opresivo, 32 – 38 Muy cálido, 26 – 32 Cálido, 20 – 26 Agradable, 14 – 20 Templado, 8 – 14 Semifrío, menor 8 Frio
		</description>
	</var>		
</variables_climaticas>

