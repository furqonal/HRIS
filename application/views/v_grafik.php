
<?php
	$nilai_total =  array();
    $tgl =  array();
   	$nc =  array();
    foreach ($report as $data) {
    	$nilai_total[] =  intval($data->total);
    	$tgl[] =  date("d-m-Y", strtotime($data->tanggal));
   		$nc[] =  $data->nama_competency ;
    };
    /* end mengambil query*/

     
?>



					<div class="panel panel-flat">
						<div class="panel-body">
						<?php foreach ($report as $pk) {
									 	# code...
									 } ?>
									 	<?php   	echo 'Kompetensi '.$pk->nama_competency."<br>"; ?>
									 	<?php   	echo 'Nama : ' .$pk->nama."<br>"; ?>
						
					</div>	

					

<div id="data"></div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
	
	Highcharts.chart('data', {
    chart	: {
        type: 'area'
    },
    title: {
        text: 'Grafik Kompetensi'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: <?php echo json_encode($tgl);?>,
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Kompetensi'
        },
        labels: {
            formatter: function () {
                return  ;
                //samping
            }
        }
    },
    
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        name: 'Total',
        data: <?php echo json_encode($nilai_total)?>
    }]
});
</script>	 