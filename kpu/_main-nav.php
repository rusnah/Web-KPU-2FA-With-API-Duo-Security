<!--NAVIGASI MENU UTAMA-->

<div class="leftmenu">
  <ul class="nav nav-tabs nav-stacked">
    <li class="active"><a href="dashboard.php"><span class="icon-align-justify"></span> Dashboard</a></li>
    
    <?php
	if($_SESSION['login_hash']=="anggota"){
	?>
    <!--MENU Anggota-->
    
    <li class="dropdown"><a href="#"><span class="icon-th-list"></span> Profil</a>
      <ul>
      <li>
        <li><a href="?cat=web&page=profil">Lihat Biodata</a></li>   
		<li><a href="?cat=web&page=uploadFoto">Upload Foto</a></li> 
      </ul>
    </li>   
	<li class="dropdown"><a href="#"><span class="icon-pencil"></span> Daftar Vote</a>
      <ul>       
       <li><a href="?cat=anggota&page=daftar">Form Voting</a></li> 
      </ul>
    </li>
    
     <!--MENU ADMIN-->
        <?php
	}elseif($_SESSION['login_hash']=="administrator"){
	?>    
    <li class="dropdown"><a href="#"><span class="icon-th-list"></span> Profil</a>
      <ul>       
        <li><a href="?cat=web&page=profil"> Biodata</a></li>
        <li><a href="?cat=web&page=uploadFoto">Upload Foto</a></li> 
      </ul>
    </li>
	<li class="dropdown"><a href="#"><span class="icon-pencil"></span>Order Anggota</a>
      <ul>       
        <li><a href="?cat=administrator&page=order_anggota">Detail Pendaftar Ikamaru</a></li> 
      </ul>
    </li>
	<li class="dropdown"><a href="#"><span class="icon-pencil"></span>Manage Suara</a>
      <ul>       
        <li><a href="?cat=administrator&page=data_suara_masuk">Detail Voting Suara</a></li> 
      </ul>
    </li>
	<li class="dropdown"><a href="#"><span class="icon-pencil"></span> User Management</a>
      <ul>       
        <li><a href="?cat=administrator&page=user">Detail User</a></li> 
        
      </ul>
    </li>
  	<?php
	}
	?>
  </ul>
</div>
<!--leftmenu-->

</div>
<!--mainleft--> 
<!-- END OF LEFT PANEL -->