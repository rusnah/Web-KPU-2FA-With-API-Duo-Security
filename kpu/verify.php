<?php
$sig_request = Duo::signRequest(IKEY, SKEY, AKEY, $_POST['username']);
	    
?>
		<h3 align="center" /><a href="#">Verifikasi 2 Langkah Untuk Login Voting</a>

        <script type="text/javascript" src="Duo-Web-v2.js"></script>
        <link rel="stylesheet" type="text/css" href="Duo-Frame.css">
        <iframe id="duo_iframe" frameborder="0" data-host="<?php echo HOST; ?>" data-sig-request="<?php echo $sig_request; ?>"></iframe>

<?php	
	if (isset($_POST['sig_response'])) {
    /*
     * Verify sig response and log in user. Make sure that verifyResponse
     * returns the username we logged in with. You can then set any
     * cookies/session data for that username and complete the login process.
     */
    
	$resp = Duo::verifyResponse(IKEY, SKEY, AKEY, $_POST['sig_response']);
	if ($resp === $row['username']) {
        // Password protected content would go here.
        echo 'Hi, ' . $resp . '<br>';
        echo "<script>window.location='dashboard.php'</script>";
    }
}

?>