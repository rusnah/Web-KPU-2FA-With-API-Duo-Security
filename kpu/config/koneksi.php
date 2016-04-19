<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "kpu_fix";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>

<?php
$accountsid = 'AC116658d9d8f2ad188aa4dd81493eb6ca';  //  YOUR TWILIO ACCOUNT SID
$authtoken = 'cde3ed4b79f50381e73675fd32f7d039';   //  YOUR TWILIO AUTH TOKEN
$fromNumber = '+17273782810';  //  PHONE NUMBER CALLS WILL COME FROM
?>