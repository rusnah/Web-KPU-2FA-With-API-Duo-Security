<script src="js/jquery-ui.js"></script>
<script>
$(function() {
$("#datepicker").datepicker({        
		 dateFormat: "yy-mm-dd",
    });
});

</script>
<?php
ob_start();

if(isset($_GET['id']))
{
	$rs=mysql_query("Select * from user_login where sha1(username)='".$_GET['id']."'");
	$row=mysql_fetch_array($rs);
?>
	<header>
		<h2 align="center">Form Pemilihan Ketua Umum KPU Ikamaru Jakarta dan Sekitarnya</h2>						
	</header>
	<div class="box">
	<h3 align="center"><b>Silahkan Lengkapi Form Dibawah Ini.</h3> 
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped"> 
	<form name="form" enctype="multipart/form-data" method="post" action="?cat=anggota&page=daftar&id=<?php echo $_GET['id']; ?>&edit=1">
	
	<div class="12u">
		<tr>
			<td>Nama Lengkap</td>
			<td><input type="text" name="nama_lengkap" id="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" maxlength="50" required="required" placeholder="Nama Lengkap" /></td>
		</tr>
	</div>
	<div class="12u">
		<tr>
			<td>Email </td>
			<td><input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" maxlength="30" required="required" placeholder="Email" /></td>
		</tr>
	</div>					
	<div class="12u">
		<tr>
			<td>Tanggal Lahir </td>
			<td><input type="text" name="tgl_lahir" id="datepicker" value="<?php echo $row['tanggal_lahir']; ?>"placeholder="Input Tanggal Lahir" class="span4 input-small" />
	</tr>
	</div>
	<div class="6u 12u(narrower)">
		<tr>
			<td>Alamat </td>
			<td><input type="area" name="alamat" id="alamat" value="<?php echo $row['alamat']; ?>" required="required" placeholder="Input Alamat Anda"></td>
		</tr>
	</div>
	<div class="6u 12u(narrower)">
		<tr>
			<td>Nomer Handphone </td>
			<td><input type="text" name="no_hp" id="no_hp" value="<?php echo $row['no_hp']; ?>" maxlength="14" required="required" placeholder="Contoh : 0857-1719-2636" /></td>
		</tr>
	</div>
	<div class="6u 12u(narrower)">
		<tr>
			<td>ALumni Angkatan </td>
			<td><input type="text" name="angkatan" id="angkatan" value="<?php echo $row['angkatan']; ?>" maxlength="4" required="required" placeholder="Contoh : 2010" /></td>
		</tr>
	</div>
	<div class="6u 12u(narrower)">
		<tr>
			<td>Aktivitas Sekarang </td>
			<td><select name="status" id="status" value=".:Pilih Status Anda:." required="required">
				<option value="Kuliah">Kuliah </option>
				<option value="Kerja">Kerja </option>
			</select></td>
		</tr>
	</div>
	<div class="6u 12u(narrower)">
		<tr>
			<td>Pilih Calon Ketum Anda </td>
			<td><select name="vote" id="vote" value=".:Pilih Calon Ketum Ikamaru:.">
				<option value="1">Muhammad Zaim</option>
				<option value="2">Muhammad Masluki </option>
				<option value="3">Sugeng Riyadi</option>
			</select></td>
		</tr>
	</div>
	
	<div class="12u"><tr><td></td>
		<ul class="actions align-center">
			<li><td><input type="submit" class="btn btn-primary" name="button" id="button" value="Daftar" /></td></li>
		</ul></tr>
	</div>
	</div>
</form> 
</table>
<?php
ob_end_flush();
}else{
	echo "<script>window.location='?cat=anggota&page=view_calon'</script>";
}
?>
<?php
if(isset($_GET['edit']))
{
	$pilih=mysql_query("select * from user_login where username='$row[username]'");
	
	$rs=mysql_query("Update user_login SET nama_lengkap='".$_POST['nama_lengkap']."', email='".$_POST['email']."',  tanggal_lahir='".$_POST['tgl_lahir']."',	alamat='".$_POST['alamat']."', no_hp='".$_POST['no_hp']."', angkatan='".$_POST['angkatan']."', status='".$_POST['status']."', vote='".$_POST['vote']."' Where sha1(username)='".$_GET['id']."' ");
	if($rs)
	{
		echo "<script language='JavaScript'>alert('Terimakasih Sudah Mensukseskan Pemilu Ikamaru Jakarta dan Sekitarnya. :)');</script>";
		echo "<script>window.location='?cat=anggota&page=view_calon'</script>";
	}
}
?>