<?php
	include("kpu/config/koneksi.php");

	$email = $_POST['email'];
	$langganan = 'aktif';
	$status = 'wait';

	if (isset($_POST['kirim']))
	{
		$query = "INSERT INTO info VALUES ('$email', '$langganan', '$status')";
		//echo $query;
		mysql_query($query) or die (mysql_error());
		echo "<script>window.location='infoterimakasih.html'</script>";		
					
	}				
?>