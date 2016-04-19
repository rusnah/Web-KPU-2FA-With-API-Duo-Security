<?php
	include("_db.php");
	$query = "SELECT * FROM user_login WHERE username='".$_SESSION['login_user']."'";
	$row = mysql_fetch_array(mysql_query($query));
?>
<div class="dropdown userinfo"> <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="/page.html">Profil <?php echo "".$_SESSION['login_hash']; ?> <b class="caret"></b></a>
  <ul class="dropdown-menu">
  <li class="user-header">
  <td style="width=150px;padding-top=2px;padding-bottom=2px;" rowspan=8>
  <a title='Klik untuk upload/ubah foto' href="dashboard.php?cat=web&page=uploadFoto" ><img src=
  <?php 
	if($row['nama_foto']=="")
	{
		echo "dist/img/avatar.png";
	}
	else
	{	echo "uploads/".$row['nama_foto']; }?> class="user-image img-responsive"></td>
  </li>
    <li><a href="dashboard.php?cat=web&page=chgpwd"><span class="icon-wrench"></span> Ubah Password</a></li>
    <li class="divider"></li>
    <li><a href="dashboard.php?cat=web&page=logout"><span class="icon-off"></span> Keluar</a></li>
  </ul>
</div>
<!--dropdown-->