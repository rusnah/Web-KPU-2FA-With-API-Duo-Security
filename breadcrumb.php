<?php
if($_GET['module']=='home'){
	echo "<span class='current'>Home</span>";
}
elseif($_GET['module']=='profilkami'){
	echo "<span class='current'>Profil</span>";
}
elseif($_GET['module']=='semuakursus'){
	echo "<span class='current'>Semua Kursus</span>";
}
elseif($_GET['module']=='hubungikami'){
	echo "<span class='current'>Hubungi Kami</span>";
}
elseif($_GET['module']=='hubungiaksi'){
	echo "<span class='current'>Hubungi Kami</span>";
}
elseif($_GET['module']=='selesaidaftar'){
	echo "<span class='current'>Data Pendaftar</span>";
}
elseif($_GET['module']=='simpantransaksi'){
	echo "<span class='current'>Transaksi Selesai</span>";
}
elseif($_GET['module']=='lupapassword'){
	echo "<span class='current'>Lupa Password</span>";
}
?>
