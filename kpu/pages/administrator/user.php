<?php
ob_start();
include("config/koneksi.php");
?>
<?php 
	/* Koneksi database*/
	include 'pages/web/paging.php'; //include pagination file
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal =5; //berapa banyak blok
	$adjacents  = 5;
	$offset = ($hal -1) * $per_hal;
	$reload="?cat=administrator&page=user";
	//Cari berapa banyak jumlah data*/
	$count_query   = mysql_query("SELECT COUNT(user_login.username) AS numrows FROM user_login");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("SELECT * FROM user_login WHERE login_hash='anggota' GROUP BY user_login.username LIMIT $offset,$per_hal");
	?>
<form name="form1" method="post" action="?cat=administrator&page=user&act=1">
  <label>Username</label>

      <input type="text" name="username" id="username" required="required" placeholder="Username">
      <label>Password</label>
      <input type="text" name="password" id="password" required="required" placeholder="Password">
      <label>Jenis Login</label>
     <select name="jenis" id="jenis">
		<option value="administrator">Administrator</option>
        <option value="anggota">Anggota</option>
      </select>
   
      <p></p>
      <input type="submit" class="btn btn-primary" name="button" id="button" value="Daftar">&nbsp;&nbsp;<input type="reset" class="btn btn-danger" name="reset" id="reset" value="Reset">
</form>
<?php
ob_end_flush();
?>
<p></p>
<p></p>
<span class="span4">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
	<td>No.</td>
    <td>Username</td>
    <td>Jenis Login</td>   
    <td>Manage</td>
  </tr>
  <?php
  //$rw=mysql_query("SELECT * FROM user_login WHERE login_hash ='anggota'");
  while($s=mysql_fetch_array($query))
  {
  ?>
  <tr>
	<td><?php echo $c=$c+1; ?></td>
    <td><?php echo $s['username']; ?></td>
    <td><?php echo $s['login_hash']; ?></td>

    <td><a href="?cat=administrator&page=useredit&id=<?php echo sha1($s['username']); ?>" class="btn btn-primary" name="button">Edit</a> - <a href="?cat=administrator&page=user&del=1&id=<?php echo sha1($s['username']); ?>"class="btn btn-danger" name="hapus">Hapus</a></td>
  </tr>
  <?php
  }
  ?>
</table>

<?php
echo "<h3 />";
echo paginate($reload, $hal, $total_hals, $adjacents);
echo "<hr />";
?>
</span>

<?php
if(isset($_GET['act']))
{
	
	$rs=mysql_query("Insert into user_login (`username`,`password`,`login_hash`) values ('".$_POST['username']."','".md5($_POST['password'])."','".$_POST['jenis']."')") or die(mysql_error());
	if($rs)
	{
		echo "<script>window.location='?cat=administrator&page=user'</script>";
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
		echo "<script>window.location='?cat=administrator&page=user'</script>";
	}
}
?>
