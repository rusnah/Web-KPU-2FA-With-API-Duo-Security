<?php
ob_start();
if(isset($_GET['id']))
{
	$rs=mysql_query("Select * from user_login where sha1(username)='".$_GET['id']."'");
	$row=mysql_fetch_array($rs);
?>
<form name="form1" method="post" action="?cat=administrator&page=useredit&id=<?php echo $_GET['id']; ?>&edit=1">
  <table width="50%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="36%">Username</td>
      <td width="64%"><label for="username"></label>
      <input type="text" name="username" id="username" value="<?php echo $row['username']; ?>"></td>
    </tr>
    <tr>
      <td>Password Lama</td>
      <td><input type="password" name="password" id="password" value=""></td>
    </tr>
    <tr>
      <td>Jenis Login</td>
      <td> <select name="jenis" id="jenis">
        <option value="staf_pengajar">Staf Pengajar</option>
      </select></td>
    </tr>
	<tr>
		<td>Kelas Mengajar</td>
		<td><select name="kelas" id="kelas">
		<option value="0" selected="selected">Pilih Kelas</option>
			<?php 
		
			$query=mysql_query("select * from kelas order by nama_kelas asc");
			
			while($row=mysql_fetch_array($query))
			{
				?>
				<option value="<?php  echo $row['kd_kelas']; ?>"><?php  echo $row['nama_kelas']; ?></option><?php 
			}
			?>
			</select></td>
	</tr>
	<tr>
      <td>&nbsp;</td>
      <td><input type="submit" class="btn btn-primary" name="button" id="button" value="Ubah">&nbsp;&nbsp;<input type="button" class="btn btn-danger" name="reset" id="reset" value="Cancel" onclick="window.location='?cat=administrator&page=data_pengajar'"></td>
    </tr>
  </table>
</form>
<?php
ob_end_flush();
}else{
	echo "<script>window.location='?cat=administrator&page=data_pengajar'</script>";
}
?>
<?php
if(isset($_GET['edit']))
{
	
	$rs=mysql_query("Update user_login SET password='".md5($_POST['password'])."',login_hash='".$_POST['jenis']."', kd_kelas='".$_POST['kelas']."' Where sha1(username)='".$_GET['id']."'");
	if($rs)
	{
		echo "<script>window.location='?cat=administrator&page=data_pengajar'</script>";
	}
}
?>
