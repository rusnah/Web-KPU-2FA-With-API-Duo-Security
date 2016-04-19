<?php
session_start();
if(!isset($_SESSION['login_hash']))
{
	echo "<script>window.location='index.php'</script>";
}
include("_db.php");
?>

<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>.:Sistem Vote KPU Ikamaru Jakarta:.</title>
	<?php include("_scr.php"); ?>
	
</head>
<script type="text/javascript">
    //set timezone
    <?php date_default_timezone_set('Asia/Jakarta'); ?>
    //buat object date berdasarkan waktu di server
    var serverTime = new Date(<?php print date('Y, m, d, H, i, s, 0'); ?>);
    //buat object date berdasarkan waktu di client
    var clientTime = new Date();
    //hitung selisih
    var Diff = serverTime.getTime() - clientTime.getTime();    
    //fungsi displayTime yang dipanggil di bodyOnLoad dieksekusi tiap 1000ms = 1detik
    function displayServerTime(){
        //buat object date berdasarkan waktu di client
        var clientTime = new Date();
        //buat object date dengan menghitung selisih waktu client dan server
        var time = new Date(clientTime.getTime() + Diff);
        //ambil nilai jam
        var sh = time.getHours().toString();
        //ambil nilai menit
        var sm = time.getMinutes().toString();
        //ambil nilai detik
        var ss = time.getSeconds().toString();
        //tampilkan jam:menit:detik dengan menambahkan angka 0 jika angkanya cuma satu digit (0-9)
        document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
    }
</script>
<body onload="setInterval('displayServerTime()', 1000);">

<div class="mainwrapper fullwrapper">
	
    <!-- START OF LEFT PANEL -->
    <div class="leftpanel">
    	
        <div class="logopanel">
        	<h1><a href="dashboard.php">KPU Ikamaru</a></h1>
        </div><!--logopanel-->
        
        <div class="datewidget"><p>Hari ini: <?php echo date("d M Y"); ?></p></div>
    	
        <?php include("_main-nav.php"); ?> <!--NAVIGASI MENU UTAMA-->
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
    	<div class="headerpanel">
        	<a href="" class="showmenu"></a>
			
            <div class="headerright" style="color: white; padding: 15px 50px 5px 50px; float: right;font-size: 16px;"> <?php echo date('D d F Y'); echo ", ". date('H:i'); ?>
            	<span  style="color:#FFF">
				
                </span>
                <?php
				include("_userinfo.php"); 
				?>
            </div><!--headerright-->
    	</div><!--headerpanel-->
        
        <div class="breadcrumbwidget">
        	<ul class="breadcrumb">
                <li></li>
            </ul>
        </div> 
        <!--breadcrumbwidget-->
        
		<div class="pagetitle">
        	<h1>Sistem Vote KPU <a href="dashboard.php">Ikamaru Jakarta dan Sekitarnya</a></h1> 
       	  <!--<span>This is a sample description for dashboard page...</span>-->
        </div><!--pagetitle-->
        
      <div class="maincontent">
       	<div class="contentinner content-dashboard">
            	<!--<div class="alert alert-info">
                	<button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Welcome!</strong> This alert needs your attention, but it's not super important.
                </div>--><!--alert-->
                
                <div class="row-fluid"><!--span8-->
                <?php
				$v_cat = (isset($_REQUEST['cat'])&& $_REQUEST['cat'] !=NULL)?$_REQUEST['cat']:'';
				$v_page = (isset($_REQUEST['page'])&& $_REQUEST['page'] !=NULL)?$_REQUEST['page']:'';
				if(file_exists("pages/".$v_cat."/".$v_page.".php"))
				{
					include("pages/".$v_cat."/".$v_page.".php");
				}else{
					include("pages/web/homepage.php");
				}
				
				
				?>
                
                <!--span4-->
              </div>
                <!--row-fluid-->
          </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
    
	<!--FOOTER-->
    <?php include("_footer.php"); ?>
    
</div><!--mainwrapper-->
	<!--SLIDE NAVIGASI-->
    <?php include("_nav-slider.php"); ?>
</body>
</html>
