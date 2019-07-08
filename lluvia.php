<?php 
include("cnn.php");

### VARIABLES
# ------------------------------------------------------------------------------
$estacionid 	= $_GET['e'];
$fecha 			= $_GET['f'];
$fecha2 = date("Y-m-d",strtotime($fecha)+86400);
$parametroid 	= "PC";

// echo $fecha."<br>";
// echo $fecha2."<br>";

### CONECTAR A BASE DE DATOS Y SERVER
# ------------------------------------------------------------------------------
$dbconn = my_dbconn4("hidrologia");
$sql="SELECT mediciones7dias.* FROM mediciones7dias WHERE parametroid='PC' AND estacionid=$estacionid AND (horafecha>='$fecha' AND horafecha < '$fecha2') ORDER BY horafecha";
// echo $sql;
$result=pg_query($dbconn, $sql);
while($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	$ro[] = $row;
} pg_free_result($result);
// $ro = $ro[0];

// echo "<pre>";
// print_r($ro);
// echo "</pre>";

echo "Dia,Hora,Medicion\n";
foreach($ro as $r){
$f = explode(" ",$r['horafecha']);
echo $f[0].",".$f[1].",".$r['medicion']."\n";
}
?>