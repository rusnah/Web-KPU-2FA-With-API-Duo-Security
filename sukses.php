<?php
	include("kpu/config/koneksi.php");

	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama_lengkap = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$login_hash = 'anggota';
	$tgl_lahir = $_POST['tgl_lahir'];
	$nama_foto = 'avatar.png';
	$alamat = $_POST['alamat'];
	$no_hp = $_POST['no_hp'];
	$angkatan = $_POST['angkatan'];	
	$status = $_POST['status'];
	$vote = 'belum';
	
	if (isset($_POST['daftar']))
	{
		$query = "INSERT INTO user_login VALUES ('$username', '$password', '$nama_lengkap',  
		'$email', '$login_hash', '$tgl_lahir', '$nama_foto', '$alamat', '$no_hp', '$angkatan', '$status', '$vote')";
		//echo $query;
		mysql_query($query) or die (mysql_error());
		echo "<script>window.location='sukses.html'</script>";		
					
	}				
?>