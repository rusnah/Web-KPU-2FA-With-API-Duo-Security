<?php
ob_start();
?>
<table class="table table-striped">
<form name="form1" method="post" action="?cat=administrator&page=data_pengajar&act=1">
  <div class="row uniform 50%">
		<div class="12u">
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" id="username" value="" required="required" placeholder="Username"></td>
			</tr>
		</div>
	</div>
	<div class="12u">
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" id="password" value="" maxlength="50" required="required" placeholder="Password" /></td>
		</tr>
	</div>
	<div class="12u">
		<tr>
			<td>Nama Lengkap</td>
			<td><input type="text" name="nama_lengkap" id="nama_lengkap" value="" maxlength="50" required="required" placeholder="Nama Lengkap" /></td>
		</tr>
	</div>
    <div class="12u">
		<tr>
			<td>Jenis Login User</td>
			<td><select name="jenis" id="jenis">
					<option value="staf_pengajar">Staf Pengajar</option>
			</td></select>
		 </tr>
	</div>  
	<div class="12u">
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
	</div>
    <div class="12u"><tr><td></td>
		<ul class="actions align-center">
			<li><td><input type="submit" class="btn btn-primary" name="button" id="button" value="Daftar">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset"> </td></li>
		</ul></tr>
	</div>
	
	</form>
</table>
<?php
ob_end_flush();
?>
<p></p>
<p></p>
<div class="box">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
	<td><b><h3>No</h3></td>
    <td><b><h3>Username</h3></td>
    <td><b><h3>Nama Lengkap</h3></td>   
	<td><b><h3>Kode Kelas Mengajar</h3></td>
    <td><b><h3>Manage</h3></td>
  </tr>
  <?php
  $rw=mysql_query("Select * from user_login where login_hash='staf_pengajar'");
  while($s=mysql_fetch_array($rw))
  {
  ?>
  <tr>
	<td><?php echo $c=$c+1; echo "."; ?></td>
    <td><?php echo $s['username']; ?></td>
    <td><?php echo $s['nama_lengkap']; ?></td>
	<td><?php echo $s['kd_kelas']; ?></td>

    <td><a href="?cat=administrator&page=edit_staf_pengajar&id=<?php echo sha1($s['username']); ?>" class="btn btn-primary" name="button">Edit</a> - <a href="?cat=administrator&page=data_pengajar&del=1&id=<?php echo sha1($s['username']); ?>"class="btn btn-danger" name="hapus">Hapus</a></td>
  </tr>
  <?php
  }
  ?>
</table>
</div>
<?php
if(isset($_GET['act']))
{
	
	$rs=mysql_query("Insert into user_login (`username`,`password`, `nama_lengkap`,`login_hash`, `kd_kelas`) values ('".$_POST['username']."','".md5($_POST['password'])."', '".$_POST['nama_lengkap']."','".$_POST['jenis']."', '".$_POST['kelas']."')") or die(mysql_error());
	if($rs)
	{
		echo "<script>window.location='?cat=administrator&page=data_pengajar'</script>";
	}
}
?>

<?php
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from user_login Where sha1(username)='".$ids."'");
	if($ff)
	{
		echo "<script>window.location='?cat=administrator&page=data_pengajar'</script>";
	}
}
?>
