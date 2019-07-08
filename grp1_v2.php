<?php 
include("cnn.php");

$lat = $_GET['y'];
$lon = $_GET['x'];
// $cod = $_GET['c'];
// findHour($cod);
// $naH = findHour($cod);

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
$h = 0;
for($i=2;$i<=$vars;$i++){
$sql .="(SELECT ".$i." AS var, sa.gridcode FROM lluvia_".$i." sa WHERE sde.st_intersects(sde.st_point (".$lon.", ".$lat.", 4326), sa.shape))";
if ($i<$vars){ $sql .="UNION"; };
if ($h <= 23) { $h+=1;} else {$h = 1;}
if ($h <= 9) { $hh= "0".$h.":00";} else { $hh= $h.":00";}
$ahh[] = $hh;
}	
$sql .="ORDER BY var;";
// echo $sql;	
// echo "<pre>";
// print_r($ahh);
// echo "</pre>";
		
$result=pg_query($dbconn, $sql);
while($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
	$ro[] = $row;
} pg_free_result($result);

// echo "<pre>";
// print_r($ro);
// echo "</pre>";
// 1) Graphic DATA
#-------------------------------------
@$d1	= array_column($ro, 'gridcode');
// @$f1 	= array_column($ro, 'var');
@$f1 	= $ahh;
@$dd1 	= array_map( create_function('$value', 'return (int)$value/2;'), $d1);

$datay=$dd1;
$datax=$f1;

// var_dump ($datax);
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
-->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="container1" style="min-width: 310px; max-width: auto; height: 250px; margin: 0 auto"></div>

<script type="text/javascript">
var datay = <?php echo json_encode($dd1); ?>;
var datax = <?php echo json_encode($f1); ?>;

// console.log(datay);
// console.log(datax);

Highcharts.chart('container1', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'LLUVIA (mm)'
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
        min: 0,
        title: {
            text: 'mm'
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
        name: 'lluvia (mm)',
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
              	return 'lluvia_mm';
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
