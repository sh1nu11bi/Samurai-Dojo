<?php
$forwardurl=$_REQUEST["forwardurl"];
include 'config.inc';
include 'opendb.inc';
$query = "INSERT INTO hitlog(hostname, ip, browser, referer, date) VALUES ('".
	gethostbyaddr($_SERVER['REMOTE_ADDR']) . "', '".
	$_SERVER['REMOTE_ADDR'] . "', '".
	$_SERVER['HTTP_USER_AGENT'] . "', '".
	"Redirected user to: " . $forwardurl . "', ".
	" now() )";
//echo $query;
$result = mysql_query($query);
echo mysql_error($conn );

mysql_close($conn);

header("Location: " . $forwardurl); /* Redirect browser */
/* Make sure that code below does not get executed when we redirect. */
exit;
?>
