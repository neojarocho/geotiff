<?php 
include("cnn.php");
include("header.php");

function getHour() {
	$ho = date('H');
	$mi = date('i');
	if ($mi<30) {
		$nho = $ho;
	}else {
		$nho = date('H', strtotime('1 hour'));
	}

	$aho = $nho.":00";

	if 		($aho== "01:00"): 	$cod = "2";
	elseif 	($aho== "02:00"): 	$cod = "3";
	elseif 	($aho== "03:00"): 	$cod = "4";
	elseif 	($aho== "04:00"): 	$cod = "5";
	elseif 	($aho== "05:00"): 	$cod = "6";
	elseif 	($aho== "06:00"): 	$cod = "7";
	elseif 	($aho== "07:00"): 	$cod = "8";
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
	elseif 	($aho== "24:00"): 	$cod = "25";
	elseif 	($aho== "01:00"): 	$cod = "26";
	elseif 	($aho== "02:00"): 	$cod = "27";
	elseif 	($aho== "03:00"): 	$cod = "28";
	elseif 	($aho== "04:00"): 	$cod = "29";
	elseif 	($aho== "05:00"): 	$cod = "30";
	elseif 	($aho== "06:00"): 	$cod = "31";
	elseif 	($aho== "07:00"): 	$cod = "32";
	elseif 	($aho== "08:00"): 	$cod = "33";
	elseif 	($aho== "09:00"): 	$cod = "34";
	elseif 	($aho== "10:00"): 	$cod = "35";
	elseif 	($aho== "11:00"): 	$cod = "36";
	elseif 	($aho== "12:00"): 	$cod = "37";
	elseif 	($aho== "13:00"): 	$cod = "38";
	elseif 	($aho== "14:00"): 	$cod = "39";
	elseif 	($aho== "15:00"): 	$cod = "40";
	elseif 	($aho== "16:00"): 	$cod = "41";
	elseif 	($aho== "17:00"): 	$cod = "42";
	elseif 	($aho== "18:00"): 	$cod = "43";
	elseif 	($aho== "19:00"): 	$cod = "44";
	elseif 	($aho== "20:00"): 	$cod = "45";
	elseif 	($aho== "21:00"): 	$cod = "46";
	elseif 	($aho== "22:00"): 	$cod = "47";
	elseif 	($aho== "23:00"): 	$cod = "48";
	elseif 	($aho== "24:00"): 	$cod = "49";
	elseif 	($aho== "01:00"): 	$cod = "50";
	elseif 	($aho== "02:00"): 	$cod = "51";
	elseif 	($aho== "03:00"): 	$cod = "52";
	elseif 	($aho== "04:00"): 	$cod = "53";
	elseif 	($aho== "05:00"): 	$cod = "54";
	elseif 	($aho== "06:00"): 	$cod = "55";
	elseif 	($aho== "07:00"): 	$cod = "56";
	elseif 	($aho== "08:00"): 	$cod = "57";
	elseif 	($aho== "09:00"): 	$cod = "58";
	elseif 	($aho== "10:00"): 	$cod = "59";
	elseif 	($aho== "11:00"): 	$cod = "60";
	elseif 	($aho== "12:00"): 	$cod = "61";
	elseif 	($aho== "13:00"): 	$cod = "62";
	elseif 	($aho== "14:00"): 	$cod = "63";
	elseif 	($aho== "15:00"): 	$cod = "64";
	elseif 	($aho== "16:00"): 	$cod = "65";
	elseif 	($aho== "17:00"): 	$cod = "66";
	elseif 	($aho== "18:00"): 	$cod = "67";
	elseif 	($aho== "19:00"): 	$cod = "68";
	elseif 	($aho== "20:00"): 	$cod = "69";
	elseif 	($aho== "21:00"): 	$cod = "70";
	elseif 	($aho== "22:00"): 	$cod = "71";
	elseif 	($aho== "23:00"): 	$cod = "72";
	elseif 	($aho== "24:00"): 	$cod = "73";
	elseif 	($aho== "01:00"): 	$cod = "74";
	elseif 	($aho== "02:00"): 	$cod = "75";
	elseif 	($aho== "03:00"): 	$cod = "76";
	elseif 	($aho== "04:00"): 	$cod = "77";
	elseif 	($aho== "05:00"): 	$cod = "78";
	elseif 	($aho== "06:00"): 	$cod = "79";
	elseif 	($aho== "07:00"): 	$cod = "80";
	elseif 	($aho== "08:00"): 	$cod = "81";
	elseif 	($aho== "09:00"): 	$cod = "82";
	elseif 	($aho== "10:00"): 	$cod = "83";
	elseif 	($aho== "11:00"): 	$cod = "84";
	elseif 	($aho== "12:00"): 	$cod = "85";
	elseif 	($aho== "13:00"): 	$cod = "86";
	elseif 	($aho== "14:00"): 	$cod = "87";
	else:	echo "Hora no encontrada";
	endif;

	$aH["hora"] = $aho;
	$aH["cod"]  = $cod;
	// echo $aho." cod:".$cod;
	return $aH;
}
$naH = getHour();

// var_dump($naH);

$lat = @$_GET['y'];
$lon = @$_GET['x'];
$cod = intval(@$_GET['c']);

if ($lon =="") {$lon = "-89.231065";}
if ($lat =="") {$lat = "13.687687";}
if ($cod =="") {$cod = $naH["cod"];}

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
<!DOCTYPE html>
<html>
<head>
<title>Simple Map</title>
<meta name="viewport" content="initial-scale=1.0">
<meta charset="utf-8">
<style>
/* Always set the map height explicitly to define the size of the div
 * element that contains the map. */
#map {
	width: 100%;
	height: 600px;
}
/* Optional: Makes the sample page fill the window. */

html, body {
	height: 100%;
	margin: 0;
	padding: 0;
}
span {
	padding-left: 5px;
	padding-right: 5px;
}
.form-control {
    width: 100%;
	height: 20px !important;
	padding-left:5px !important;
	padding-top:0px !important;
	padding-bottom:0px !important;
}
    </style>
  </head>
  <body>

<script>
var map;
var gmarkers = [];
  
function initMap() {
	
map = new google.maps.Map(document.getElementById('map'), {
  center: {lat: 13.7594, lng: -88.9037},
  zoom: 9,
  scrollwheel: false
});

marker = new google.maps.Marker({
  map: map,
  // animation: google.maps.Animation.DROP,
  position: {lat: 13.687687, lng: -89.231065}
});
gmarkers.push(marker);


google.maps.event.addListener(map, 'click', function (e) {
	console.log("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
	var x = e.latLng.lng()
	var y = e.latLng.lat()
	$("#x").val(x);
	$("#y").val(y);
	removeMarkers();
	placeMarker(e.latLng);
	myContent();
});
	
function placeMarker(location) {
var marker = new google.maps.Marker({
	position: location, 
	// animation: google.maps.Animation.DROP,
	map: map
	});
	// map.panTo(location);
	gmarkers.push(marker);
}

function removeMarkers(){
	for(i=0; i<gmarkers.length; i++){
		gmarkers[i].setMap(null);
	}
}
	
	
	
}

function explode(){
	addGraphh(1);
	addGraphh(2);
	addGraphh(3);
	addGraphh(4);
}

// ------------------------------------------
// ACTUALIZAR LISTA DE MUNICIPIOS SELECCIONADOS //
function myContent() {
	setTimeout(explode, 100);
	var x = $("#x").val();
	var y = $("#y").val();
	var c = $("#c").val();
    $.ajax({
		async : true,
		method: "GET",
		url: "tabla.php",
		data: {c:c, x:x, y:y},
		success: function(msg){
			$("#data").html(msg);
       }
     });
	 
}

function addGraphh(n) {
	$("#divGraph"+n).html("");
	var x = $("#x").val();
	var y = $("#y").val();
    $.ajax({
		async : true,
		method: "GET",
		url: "grp"+n+".php",
		data: {x:x, y:y},
		success: function(msg){
			$("#divGraph"+n).html(msg);
       }
     });	
}


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCV8pVwW6YPneHzYBr-OBcGp_PTn7w8-hQ&callback=initMap"
async defer></script>

<table style="width:100%" border=1 align=center>
  <tr>
    <td><div id="map"></div></td>
    <td style="width:18%">
		<div id="data" style="text-align:left;margin-left: 10px;">
		<form method="get" name="myform" id="myform" action="tabla.php" autocomplete="on">

		<h4 align="center">CALCULO DE VARIABLES</h4>
		<div class="form-group" style="font-size:14px;">
		  <label for="usr">Longitud:</label>
		  <input type="text" class="form-control" name="x" id="x" value="-89.231065">
		</div>
		<div class="form-group" style="font-size:14px;">
		  <label for="usr">Latitud:</label>
		  <input type="text" class="form-control" name="y" id="y" value="13.687687">
		</div>
		<div class="form-group" style="font-size:14px;">
		<label for="sel1">Selecciona Hora:</label>
		<select class="form-control" name="c" id="c">
		  <option value="02">01:00</option>
		  <option value="03">02:00</option>
		  <option value="04">03:00</option>
		  <option value="05">04:00</option>
		  <option value="06">05:00</option>
		  <option value="07">06:00</option>
		  <option value="08">07:00</option>
		  <option value="09">08:00</option>
		  <option value="10">09:00</option>
		  <option value="11">10:00</option>
		  <option value="12">11:00</option>
		  <option value="13">12:00</option>
		  <option value="14">13:00</option>
		  <option value="15">14:00</option>
		  <option value="16">15:00</option>
		  <option value="17">16:00</option>
		  <option value="18">17:00</option>
		  <option value="19">18:00</option>
		  <option value="20">19:00</option>
		  <option value="21">20:00</option>
		  <option value="22">21:00</option>  
		  <option value="23">22:00</option>  
		  <option value="24">23:00</option>  
		  <option value="25">24:00</option>  
		  <option value="26">01:00 (dia 2)</option>  
		  <option value="27">02:00 (dia 2)</option>  
		  <option value="28">03:00 (dia 2)</option>  
		  <option value="29">04:00 (dia 2)</option>  
		  <option value="30">05:00 (dia 2)</option>  
		  <option value="31">06:00 (dia 2)</option>  
		  <option value="32">07:00 (dia 2)</option>
		  <option value="33">08:00 (dia 2)</option>
		  <option value="34">09:00 (dia 2)</option>
		  <option value="35">10:00 (dia 2)</option>
		  <option value="36">11:00 (dia 2)</option>
		  <option value="37">12:00 (dia 2)</option>
		  <option value="38">13:00 (dia 2)</option>
		  <option value="39">14:00 (dia 2)</option>
		  <option value="40">15:00 (dia 2)</option>
		  <option value="41">16:00 (dia 2)</option>
		  <option value="42">17:00 (dia 2)</option>
		  <option value="43">18:00 (dia 2)</option>
		  <option value="44">19:00 (dia 2)</option>
		  <option value="45">20:00 (dia 2)</option>
		  <option value="46">21:00 (dia 2)</option>
		  <option value="47">22:00 (dia 2)</option>
		  <option value="48">23:00 (dia 2)</option>
		  <option value="49">24:00 (dia 2)</option>
		  <option value="50">01:00 (dia 3)</option>
		  <option value="51">02:00 (dia 3)</option>
		  <option value="52">03:00 (dia 3)</option>
		  <option value="53">04:00 (dia 3)</option>
		  <option value="54">05:00 (dia 3)</option>
		  <option value="55">06:00 (dia 3)</option>
		  <option value="56">07:00 (dia 3)</option>
		  <option value="57">08:00 (dia 3)</option>
		  <option value="58">09:00 (dia 3)</option>
		  <option value="59">10:00 (dia 3)</option>
		  <option value="60">11:00 (dia 3)</option>
		  <option value="61">12:00 (dia 3)</option>
		  <option value="62">13:00 (dia 3)</option>
		  <option value="63">14:00 (dia 3)</option>
		  <option value="64">15:00 (dia 3)</option>
		  <option value="65">16:00 (dia 3)</option>
		  <option value="66">17:00 (dia 3)</option>
		  <option value="67">18:00 (dia 3)</option>
		  <option value="68">19:00 (dia 3)</option>
		  <option value="69">20:00 (dia 3)</option>
		  <option value="70">21:00 (dia 3)</option>
		  <option value="71">22:00 (dia 3)</option>
		  <option value="72">23:00 (dia 3)</option>
		  <option value="73">24:00 (dia 3)</option>
		  <option value="74">01:00 (dia 4)</option>
		  <option value="75">02:00 (dia 4)</option>
		  <option value="76">03:00 (dia 4)</option>
		  <option value="77">04:00 (dia 4)</option>
		  <option value="78">05:00 (dia 4)</option>
		  <option value="79">06:00 (dia 4)</option>
		  <option value="80">07:00 (dia 4)</option>
		  <option value="81">08:00 (dia 4)</option>
		  <option value="82">09:00 (dia 4)</option>
		  <option value="83">10:00 (dia 4)</option>
		  <option value="84">11:00 (dia 4)</option>
		  <option value="85">12:00 (dia 4)</option>
		  <option value="86">13:00 (dia 4)</option>
		  <option value="87">14:00 (dia 4)</option>
		</select>
		</form>

		<div style="margin-top:5px;">
		<button type="button" class="btn btn-primary" onclick="myContent()"> Calcular</button>
		</div>
		</div>

		<div id="micontenido" style="font-size:12px;">
			<?php 
			// echo "<h3>VARIABLES</h3>";
			echo "<h5 style='width:100% !important;'><b>Condiciones para la hora ". $naH["hora"]."</b></h5>";
			echo "Lluvia: 			".($d7/2)." mm<br>";
			echo "Sensación Térmica:".round($d8,0,PHP_ROUND_HALF_DOWN)." °C<br>";
			echo "Temperatura: 		".getRanget($d1)."°C<br>";
			echo "Direccion viento: ".$d2			."°<br>";
			echo "Velocidad viento: ".$d3			." nudos<br>";
			echo "Presion: 			".getRangep($d4)." hPa<br>";
			echo "Humedad: 			".$d5			." %<br>";
			echo "Nubosidad: 		".getRangen($d6)." <br>";
			?>
		</div>
		</div>
	</td> 
  </tr>
</table>


<div id='divGraph1'>
	<!-- GRAPHIC HERE-->
</div>

<div id='divGraph2'>
	<!-- GRAPHIC HERE-->
</div>

<div id='divGraph3'>
	<!-- GRAPHIC HERE-->
</div>

<div id='divGraph4'>
	<!-- GRAPHIC HERE-->
</div>