<?php include("config/koneksi.php");?>

	<p></p>
<p></p>
<div class="entry">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
    <th><b><h4>No</h4></th>
    <th><b><h4>Nama Calon Ketum</h4></th>   
    <th><b><h4>Suara Masuk</h4></th>
  </tr>
 <?php
	//$user=mysql_query("select * from user_login where username='$row[username]' and login_hash='anggota'");
		
	//untuk mencari jumlah
	echo "<h4 /><b>Jumlah Anggota Ikamaru : ".$jumlah_user=mysql_num_rows(mysql_query("select * from user_login where login_hash='anggota'"));
	echo " >> Jumlah Anggota Yang Memilih : ".$jumlah_milih=mysql_num_rows(mysql_query("select * from user_login,calon where user_login.vote=calon.kd_calon and login_hash='anggota' "));
	echo "<br><br>";
		
  $rw=mysql_query("Select * from calon order by kd_calon ");
  while($s=mysql_fetch_array($rw))
  {
  ?>
  <tr>
	<td align="center"><?php echo $c=$c+1; ?></td>
    <td align="center"><?php echo $s['nama_ketum']; ?></td>	
	<td align="center">
	<?php 
		//$v=$row['vote'];
		if ($s['kd_user'] == 'zaim')
		{	
			echo "<b>".$plh1=mysql_num_rows(mysql_query("select * from user_login,calon where user_login.vote=calon.kd_calon and user_login.vote='1' and user_login.login_hash='anggota' "));
		}
		else if ($s['kd_user'] == 'luki')
		{	
			echo "<b>".$plh2=mysql_num_rows(mysql_query("select * from user_login,calon where user_login.vote=calon.kd_calon and user_login.vote='2' and user_login.login_hash='anggota' "));
		}
		else if ($s['kd_user'] == 'riyadi')
		{	
			echo "<b> ".$plh3=mysql_num_rows(mysql_query("select * from user_login,calon where user_login.vote=calon.kd_calon and user_login.vote='3' and user_login.login_hash='anggota' "));
		}
		
	?> Orang
   </td>
  
	
   </tr>
  <?php
  }
  ?>
</table>
</span>
<td></td>


