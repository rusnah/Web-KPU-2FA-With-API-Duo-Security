<?php
ob_start();
if(isset($_GET['id']))
{
	$rs=mysql_query("Select * from user_login where sha1(username)='".$_GET['id']."'");
	$row=mysql_fetch_array($rs);
?>
<table class="table table-striped table-bordered table-hover" id="dataTables-example" width=100% cellpadding=0 cellspacing=0 border=0 valign=top>
<thead>
<tr><th colspan=3></th></tr>
</thead>
<tbody>
<tr>
	<td align="center" style="width=100px;padding-top=2px;padding-bottom=2px;" rowspan=10><img src=
	<?php 
	if($row['nama_foto']=="")
	{
		echo "/dist/img/avatar.png";
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
	<td style="padding-top=2px;padding-bottom=2px;"><?php echo $row['tgl_lahir'];?></td>
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
	<td style="padding-top=2px;padding-bottom=2px;"><?php echo $row['jabatan'];?></td>
</tr>
<tr>
	<td style="width=150px;padding-top=2px;padding-bottom=2px;"><label>Status Anggota</label></td>
	<td style="padding-top=2px;padding-bottom=2px;"><?php echo $row['status'];?></td>
</tr>
<tr>
	<td><input type="button" class="btn btn-primary" name="reset" id="reset" value="Kembali" onclick="window.location='?cat=administrator&page=order_anggota'"></td>
</tr>
</table>

<?php
ob_end_flush();
}else{
	echo "<script>window.location='?cat=administrator&page=order_anggota'</script>";
}
?>