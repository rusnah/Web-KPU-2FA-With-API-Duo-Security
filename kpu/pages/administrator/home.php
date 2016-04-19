<?php
session_start();
include "session.php"; 
?>

<div class="row-fluid">
<ul class="thumbnails">
<li class="span6">
	<div class="thumbnail">
		<div class="caption">
			<h3>Profil Anda</h3>
			<p>Halaman untuk mengubah dan menghapus Profile Anda</p>
			<p><a href="?cat=web&page=profil" class="btn btn-primary">Detail Profile</a> </p>
		 </div>
	</div>
</li>
<li class="span6">
	<div class="thumbnail">
		<div class="caption">
			<h3>Manage Order Anggota</h3>
			<p>Halaman untuk melihat dan menghapus Order Pendaftar Anggota Ikamaru</p>
			<p><a href="?cat=administrator&page=order_anggota" class="btn btn-primary">Order Anggota</a> </p>
		 </div>
	</div>
</li>
</ul>

<ul class="thumbnails">
<li class="span6">
	<div class="thumbnail">
		<div class="caption">
			<h3>Manage Suara</h3>
			<p>Halaman untuk Perolehan Suara</p>
			<p><a href="?cat=administrator&page=data_suara_masuk" class="btn btn-primary">Data Suara Masuk</a> </p>
		 </div>
	</div>
</li>
<li class="span6">
	<div class="thumbnail">
		<div class="caption">
			<h3>User Management</h3>
			<p>Halaman untuk menambah,mengubah dan menghapus Data Anggota</p>
			<p><a href="?cat=administrator&page=user" class="btn btn-primary">Data Anggota</a> </p>
		 </div>
	</div>
</li>




</ul>
</div>