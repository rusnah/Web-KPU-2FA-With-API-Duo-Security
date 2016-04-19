<script src="js/jquery-ui.js"></script>
<script>
$(function() {
$("#datepicker2").datepicker({        
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
<h2 align="center" class="title">Halaman Edit Biodata</h2>
<br>
<form name="form" method="post" action="?cat=web&page=editprofil&id=<?php echo $_GET['id']; ?>&edit=1">
  <table class="table table-striped">
	<tr>
      <td>Username</td>
      <td>
      <input type="text" name="username" id="username" value="<?php echo $row['username']; ?>" disabled="disabled"></td>
    </tr>
    <tr>
      <td>Nama Lengkap</td>
      <td>
      <input type="text" name="nama_lengkap" id="nama_lengkap" value="<?php echo $row['nama_lengkap']; ?>" ></td>
    </tr>
    <tr>
      <td>Email</td>
      <td>
      <input type="text" name="email" id="email" value="<?php echo $row['email']; ?>" ></td>
    </tr>
	<tr>
      <td>Tanggal Lahir</td>
      <td>
      <input type="text" name="tanggal_lahir" id="datepicker2" value="<?php echo $row['tanggal_lahir']; ?>"placeholder="Input Tanggal Lahir Anda" class="span4 input-small" />
	</tr>
    <tr>
      <td>Alamat</td>
      <td>
      <input type="text" name="alamat" id="alamat" value="<?php echo $row['alamat']; ?>" ></td>
    </tr>
	<tr>
      <td width="36%">No Handphone</td>
      <td width="64%"><label for="no_hp"></label>
      <input type="text" name="no_hp" id="no_hp" value="<?php echo $row['no_hp']; ?>" ></td>
    </tr>
    <tr>
      <td width="36%">Angkatan</td>
      <td width="64%"><label for="jabatan"></label>
      <input type="text" name="angkatan" id="angkatan" value="<?php echo $row['angkatan']; ?>" ></td>
    </tr>
	<tr>
		<td>Aktivitas Sekarang </td>
		<td><select name="status" id="status" value="<?php echo $row['status']; ?>" required="required">
			<option value="Kuliah">Kuliah </option>
			<option value="Kerja">Kerja </option>
		</select></td>
	</tr>
	
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" class="btn btn-primary" name="button" id="button" value="Update">&nbsp;&nbsp;<input type="button" class="btn btn-danger" name="reset" id="reset" value="Cancel" onclick="window.location='?cat=web&page=profil'"></td>
    </tr>
  </table>
</form>

<?php
ob_end_flush();
}else{
	echo "<script>window.location='?cat=web&page=profil'</script>";
}
?>
<?php
if(isset($_GET['edit']))
{
	
	$rs=mysql_query("Update user_login SET nama_lengkap='".$_POST['nama_lengkap']."',email='".$_POST['email']."', tanggal_lahir='".$_POST['tanggal_lahir']."', alamat='".$_POST['alamat']."',no_hp='".$_POST['no_hp']."',angkatan='".$_POST['angkatan']."', status='".$_POST['status']."' WHERE username='".$_SESSION['login_user']."' ");
	if($rs)
	{
		echo "<script>window.location='?cat=web&page=profil'</script>";
	}
}
?>
