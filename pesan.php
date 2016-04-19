<?php
	include("kpu/config/koneksi.php");

	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$status_tanya = 'Tunggu';

	if (isset($_POST['kirim']))
	{
		$query = "INSERT INTO pesan VALUES ('$name', '$email', '$subject', '$message', '$status_tanya')";
		//echo $query;
		mysql_query($query) or die (mysql_error());
		echo "<script>window.location='terimakasih.html'</script>";		
					
	}				
?>