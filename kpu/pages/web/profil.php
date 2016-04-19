<?php
ob_start();
echo "<h2>Biodata " .$_SESSION['login_hash'];
echo "</h2>";
?>
<table class="table table-striped table-bordered table-hover" id="dataTables-example" width=100% cellpadding=0 cellspacing=0 border=0 valign=top>
<thead>
<tr><th colspan=3></th></tr>
</thead>
<tbody>
<tr>
	<td align="center" style="width=100px;padding-top=2px;padding-bottom=2px;" rowspan=9><img src=
	<?php 
	if($row['nama_foto']=="")
	{
		echo "dist/img/avatar.png";
	}
	else
	{	echo "uploads/".$row['nama_foto']; }?> class="user-image img-responsive"></td>
	<td style="width=150px;padding-top=2px;padding-bottom=2px;"><label>Username</label></td>
	<td style="padding-top=2px;padding-bottom=2px;"><?php echo $row['username'];?></td>
</tr>
	<tr>	
	<td style="width=150px;padding-top=2px;padding-bottom=2px;"><label>Nama Lengkap</label></td>
	<td style="padding-top=2px;padding-bottom=2px;"><?php echo $row['nama_lengkap'];?></td>
</tr>
<tr>
	<td style="width=150px;padding-top=2px;padding-bottom=2px;"><label>Tanggal Lahir</label></td>
	<td style="padding-top=2px;padding-bottom=2px;"><?php echo $row['tanggal_lahir'];?></td>
</tr>
<tr>
	<td style="width=150px;padding-top=2px;padding-bottom=2px;"><label>Email</label></td>
	<td style="padding-top=2px;padding-bottom=2px;"><?php echo $row['email'];?></td>
</tr>
<tr>
	<td style="width=150px;padding-top=2px;padding-bottom=2px;"><label>Alamat</label></td>
	<td><?php echo $row['alamat'];?></td>
</tr>
<tr>
	<td style="width=150px;padding-top=2px;padding-bottom=2px;"><label>No Handphone</label></td>
	<td style="padding-top=2px;padding-bottom=2px;"><?php echo $row['no_hp'];?></td>
</tr>
<tr>
	<td style="width=150px;padding-top=2px;padding-bottom=2px;"><label>Angkatan</label></td>
	<td style="padding-top=2px;padding-bottom=2px;"><?php echo $row['angkatan'];?></td>
</tr>
<tr>
	<td style="width=150px;padding-top=2px;padding-bottom=2px;"><label>Aktivitas Sekarang</label></td>
	<td style="padding-top=2px;padding-bottom=2px;"><?php echo $row['status'];?></td>
</tr>
<tr>
	<td style="width=150px;padding-top=2px;padding-bottom=2px;" colspan=2><a href="?cat=web&page=editprofil&id=<?php echo sha1($row['username']); ?>" class="btn btn-primary" name="button">Ubah Biodata</a>
</tr>
</table>
<?php
if(isset($_GET['act']))
{
	
	$rs=mysql_query("INSERT INTO user_login (`username`, `nama_lengkap`,`tanggal_lahir`,`email`, `alamat`, `no_hp`, `angkatan`) values ('".$_POST['username']."','".$_POST['nama_lengkap']."','".$_POST['tanggal_lahir']."','".$_POST['email']."', '".$_POST['alamat']."', '".$_POST['no_hp']."', '".$_POST['angkatan']."')") or die(mysql_error());
	if($rs)
	{
		echo "<script>window.location='?cat=web&page=profil'</script>";
	}
}
?>
