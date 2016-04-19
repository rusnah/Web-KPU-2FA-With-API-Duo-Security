<?php include("config/koneksi.php");?>
<p></p>
<p><h3 align="center" >Para Calon Urut Ketua Umum Ikamaru Jakarta dan Sekitarnya</h3></p>
<div class="entry">
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped">
  <tr>
    <th><b><h5>No Urut</h5></th>
    <th><b><h5>Nama Calon Pertama</h5></th>   
	<th><b><h5>Visi</h5></th>
	<th><b><h5>Misi</h5></th>
  </tr>
  <?php
  $rw=mysql_query("Select * from calon order by kd_calon asc ");
  while($s=mysql_fetch_array($rw))
  {
  ?>
  <tr>
	<td><?php echo $c=$c+1; ?></td>
    <td><?php echo $s['nama_ketum']; ?></td>
    <td><?php echo $s['visi']; ?></td>
	<td><?php echo $s['misi']; ?></td>
  </tr>
  <?php
  }
  ?>
</table>
<br /><br /><br /><br />
<tr><h4 align="center">Silahkan Tentukan Pilihan Calon Ketum Ikamaru Jakarta yang Anda Inginkan : &nbsp;&nbsp;&nbsp;<a href="?cat=anggota&page=daftar&id=<?php echo sha1($row['username']); ?>" class="btn btn-primary" name="button" id="buuton">Pilih Vote Anda</a></h4></tr>
 
</span>