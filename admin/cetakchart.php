<?php
include 'homeadmin.php';
include 'konfigurasi/konfig.php';
?>
<html>
<head>
	<title>Grafik</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
	<h3 style="text-align: center;">Grafik Perbandingan Jumlah Pendaftar</h3>
	<p></p>
	<center>
	<div id="canvas-holder" style="width: 50%">
		<canvas id="myChart"></canvas>
		<br>
		<br>
	</div>

	<script>
	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
		type: 'pie',
		data: {
			labels: ["SD", "SMP", "SMA"],
			datasets: [{
				label: '',
				data: [
				<?php 
				$jumlah_sd = mysqli_query($konek,"select * from siswa_gentar where paket_siswa='sd'");
				echo mysqli_num_rows($jumlah_sd);
				?>, 
				<?php 
				$jumlah_smp = mysqli_query($konek,"select * from siswa_gentar where paket_siswa='smp'");
				echo mysqli_num_rows($jumlah_smp);
				?>,
				<?php 
				$jumlah_sma = mysqli_query($konek,"select * from siswa_gentar where paket_siswa='sma'");
				echo mysqli_num_rows($jumlah_sma);
				?>
				],
				backgroundColor: [
				
				'rgba(54, 162, 235, 0.2)',
				'rgba(255, 99, 132, 0.2)',
				'rgba(255, 206, 86, 0.2)'
				],
				borderColor: [
				
				'rgba(54, 162, 235, 1)',
				'rgba(255,99,132,1)',
				'rgba(255, 206, 86, 1)'
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true
					}
				}]
			}
		}
	});
</script>
</center>
</body>
</html>

<?php include 'foot.php'; ?>