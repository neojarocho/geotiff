<?php 
include("cnn.php");

$lat = $_GET['y'];
$lon = $_GET['x'];
// $cod = $_GET['c'];
// findHour($cod);
// $naH = findHour($cod);

function getRanget($idt){
	$li = $idt-11;
	$ls = $idt-10;
	$re = $li." °C - ".$ls." °C";
	return $ls;
}

/*
UNION
(SELECT 2 AS var, sa.gridcode FROM temperatura_".$cod." sa WHERE sde.st_intersects(sde.st_point (".$lon.", ".$lat.", 4326), sa.shape) )
UNION
(SELECT 5 AS var, sa.gridcode FROM humedad_".$cod." sa WHERE sde.st_intersects(sde.st_point (".$lon.", ".$lat.", 4326), sa.shape) )
UNION
(SELECT 4 AS var, sa.gridcode FROM presion_".$cod." sa WHERE sde.st_intersects(sde.st_point (".$lon.", ".$lat.", 4326), sa.shape) )	
*/

$dbconn = my_dbconn3("ordenamiento");
$sql="";
$vars = 87;
// $vars = 10;
for($i=2;$i<=$vars;$i++){
$sql .="(SELECT ".$i." AS var, sa.gridcode FROM temperatura_".$i." sa WHERE sde.st_intersects(sde.st_point (".$lon.", ".$lat.", 4326), sa.shape))";
if ($i<$vars){ $sql .="UNION"; };
}	
$sql .="ORDER BY var;";
// echo $sql;		
		
$result=pg_query($dbconn, $sql);
while($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	$ro[] = $row;
	$ro['gridcode'] = getRanget($row['gridcode']);
} pg_free_result($result);

// 1) Graphic DATA
#-------------------------------------
@$d1	= array_column($ro, 'gridcode');
@$f1 	= array_column($ro, 'var');
@$dd1 	= array_map( create_function('$value', 'return (int)$value;'), $d1);

$datay=$dd1;
$datax=$f1;

// var_dump ($datay);
// echo "<pre>";
// print_r($data);
// echo "</pre>";
	

// exit();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lluvia (mm)</title>
 
		<style type="text/css">
			<!-- your style here -->
		</style>
	</head>
	<body>

<!--
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
-->

<div id="container2" style="min-width: 310px; max-width: auto; height: 250px; margin: 0 auto"></div>

<script type="text/javascript">
var datay = <?php echo json_encode($dd1); ?>;
var datax = <?php echo json_encode($f1); ?>;

// console.log(datay);
// console.log(datax);

Highcharts.chart('container2', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'TEMPERATURA (°C)'
    },
    xAxis: {
        categories: datax,
		labels: {
				formatter: function() {
				if ( this.value >= 2 & this.value <=25) 
				return '<span style="color: red;">'+this.value+'</span>';
				if ( this.value >= 50 & this.value <=73) 
				return '<span style="color: red;">'+this.value+'</span>';
				else
				return this.value;
				}
		}
    },
    yAxis: {
        min: 20,
        max: 45,
        title: {
            text: '°C'
        },
		labels: {
                style: {
                    color: '#666666',
                    fontSize:'10px'
				}
		}
    },
    legend: {
        reversed: true
    },
    plotOptions: {
        series: {
            stacking: 'normal', 
			pointWidth: 15,
			pointHeight:15
        }
    },
    series: [ {
		showInLegend: false,
        name: 'Temperatura (°C)',
        data: datay
    }],
	    exporting: {
    	csv: {
           columnHeaderFormatter: function (item) {
              if (item instanceof Highcharts.Axis) {
                // axis
              	return "Fecha";
              } else {
                // series
              	return 'temperatura_°C';
              }
            }
        },
		buttons: {
        contextButton: {
			menuItems: ['downloadCSV','downloadXLS','printChart']
        }
      }
    },  credits: {
      enabled: false
  }
});

</script>


</body>
</html>
