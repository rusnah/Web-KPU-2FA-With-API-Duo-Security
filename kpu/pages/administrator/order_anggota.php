<?php include("config/koneksi.php");?>
<?php 
	/* Koneksi database*/
	include 'pages/web/paging.php'; //include pagination file
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 10; //berapa banyak blok
	$adjacents  = 10;
	$offset = ($hal -1) * $per_hal;
	$reload="?cat=administrator&page=order_anggota";
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

	<p></p>
<p></p>
<div class="entry">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
    <th><b><h4>Nomer Order</h4></th>
	<th><b><h4>Username</h4></th>
    <th><b><h4>Nama Anggota</h4></th>   
    <th><b><h4>Status Anggota</h4></th>
	<th><b><h4>Vote Suara</h4></th>
	<th><b><h4>Aksi Order Anggota</h4></th>
  </tr>
  <?php
 while($s=mysql_fetch_array($query))
  {
  ?>
  <tr>
	<td><?php echo $c=$c+1; ?></td>
	<td><?php echo $s['username']; ?></td>
    <td><?php echo $s['nama_lengkap']; ?></td>
    <td><?php echo $s['status']; ?></td>
	<td><?php echo $s['vote']; ?></td>
    <td><a href="?cat=administrator&page=detail_order_anggota&id=<?php echo sha1($s['username']); ?>" class="btn btn-primary" name="button">Detail Pendaftar Kursus</a>&nbsp;-&nbsp;<a href="?cat=administrator&page=order_anggota&del=1&id=<?php echo sha1($s['username']); ?>"class="btn btn-danger" name="hapus">Hapus Order Pendaftar</a></td>
  </tr>
  <?php
  }
  ?>
</table>
</span>
<td></td>

<?php
echo "<h3 />";
echo paginate($reload, $hal, $total_hals, $adjacents);
echo "<hr />";
?>

<?php
if(isset($_GET['del']))
{
	$ids=$_GET['id'];
	$ff=mysql_query("Delete from user_login Where sha1(username)='".$ids."'");
	if($ff)
	{
		echo "<script>window.location='?cat=administrator&page=order_kursus'</script>";
	}
}
?>
