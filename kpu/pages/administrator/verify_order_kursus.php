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
	<td align="center" style="width=100px;padding-top=2px;padding-bottom=2px;" rowspan=11><img src=
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
	<td style="width=150px;padding-top=2px;padding-bottom=2px;"><label>Bukti Pembayaran</label></td>
	<td style="padding-top=2px;padding-bottom=2px;"><a href="http://localhost/PSTIK_UAI/course/uploadPembayaran/<?php echo $row['bukti_pembayaran'];?>"><?php echo $row['bukti_pembayaran'];?></a></td>
</tr>
<form name="form1" method="post" action="?cat=administrator&page=verify_order_kursus&id=<?php echo $_GET['id']; ?>&edit=1">
<tr>
	<td style="width=150px;padding-top=2px;padding-bottom=2px;"><label>Status Pembayaran</label></td>
	<td> <select name="status" id="status">
		<option value="Belum">Belum Bayar</option>
        <option value="Bayar/Lunas">Bayar/Lunas</option>
      </select></td></tr>

<tr>

	<td><input type="submit" class="btn btn-primary" name="button" id="button" value="Ubah">&nbsp;&nbsp;<input type="button" class="btn btn-danger" name="reset" id="reset" value="Batal Simpan" onclick="window.location='?cat=administrator&page=order_kursus'"></td> 
</tr>
</table>

<?php
ob_end_flush();
}else{
	echo "<script>window.location='?cat=administrator&page=order_kursus'</script>";
}
?>

<?php
if(isset($_GET['edit']))
{
	
	$rs=mysql_query("Update user_login SET status_bayar='".$_POST['status']."' Where sha1(username)='".$_GET['id']."'");
	if($rs)
	{
		echo "<script>window.location='?cat=administrator&page=order_kursus'</script>";
	}
}
?>

