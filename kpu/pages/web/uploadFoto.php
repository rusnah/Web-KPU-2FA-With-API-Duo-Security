<h2>Silahkan Upload Foto Anda
<?php
echo ": ".$_SESSION['login_user']."</h2>";
?>
<form method="post" enctype="multipart/form-data">
<input type = hidden name="action" value="uploadfoto">
<table width=50% cellpadding=4 cellspacing=1 border=0 valign=top>
<tr><td><br></td></tr>
<tr>
<td style="width:20px;"></td>
	<td><label>Pilih Foto</label></td>
	<td style="width:50px;"></td>
	<td><input type=file style="width:230px;" name='pilihFoto' class="form-control"/></td>
</tr>
<tr><td><br></td></tr>
<tr>
<td style="width:20px;"></td>
	<td><label></label></td>
	<td style="width:50px;"></td>
	<td>Ukuran Maksimal foto harus 1 MB</td>
</tr>
<tr><td><br></td></tr>
<tr>
<td style="width:20px;"></td>
	<td></td>
	<td style="width:50px;"></td>
	<td><button type="submit" name="savefoto" class="btn btn-primary">Upload</button></td>
</tr>
</table>
</form>
<?php
$host	 = "localhost";
	$user	 = "root";
	$pass	 = "";
	$dabname = "kpu_fix";
	
	$conn = mysql_connect( $host, $user, $pass) or die('Could not connect to mysql server.' );
	mysql_select_db($dabname, $conn) or die('Could not select database.');
	$baseurl="http://localhost/kpu_fix/kpu/";
	
if(isset($_POST['savefoto'])) 
{
	$allowed_filetypes = array('.jpg','.jpeg','.png','.gif');
	$max_filesize = 10485760;
	$upload_path = 'uploads/';
	$filename = $_FILES['pilihFoto']['name'];
	$ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);

	if(!in_array($ext,$allowed_filetypes))
	  die('<script>window.alert("File yang diunggah tidak diizinkan. Tipe file harus .jpg/.jpeg/.png");</script>');

	if(filesize($_FILES['pilihFoto']['tmp_name']) > $max_filesize)
	  die('<script>window.alert("File yang diunggah terlalu besar, maksimal 1MB;</script>');

	if(!is_writable($upload_path))
	  die('You cannot upload to the specified directory, please CHMOD it to 777.');

	if(move_uploaded_file($_FILES['pilihFoto']['tmp_name'],$upload_path . $filename)) 
	{
	   $query = "UPDATE user_login SET nama_foto='".$filename."' WHERE username='".$_SESSION['login_user']."'"; 
	   mysql_query($query);

	   echo '<script>window.alert("Unggah foto berhasil!");</script>';
	   echo '<script language="javascript">window.location="dashboard.php"</script>';
	} 
	else 
	{
		echo '<script>window.alert("Terjadi kesalahan saat mengupload foto, silahkan coba lagi.");</script>';
	}
}
?>