<?php

// With the addition of the IP validation, this script requires PHP 5 >= 5.2.0

/* 	Remember:  This is functional and not foolproof.  There's not much
	error-handling.  If you get the IP back, the lookup failed.  If you 
	get nothing back, you may have a problem with the address.  There's no
	validation of the IP address being done.  FIXME 
*/

define(ERROR_BAD_IP,"ERROR: Invalid IP Address");
define(ERROR_MISSING_IP_PARM,"Error: No ip parameter found.");

/* This grabs the value of "ip" from the URL parms, tests it minimally and does a reverse DNS lookup */

if (isset($_GET["ip"])) {

	if (filter_var($_GET["ip"],FILTER_VALIDATE_IP)) {

		$hostname = gethostbyaddr($_GET["ip"]);
		echo $hostname;

	} else {

		echo ERROR_BAD_IP;
		usage();
		die();
	}

} else {

	echo ERROR_MISSING_IP_PARM;
	usage();
	die();
}

$host = $_SERVER["HTTP_HOST"];
$server = $_SERVER["SERVER_NAME"];
echo "Host = $host<br />Server = $server";

function usage() {
	echo "<html><head><title>Reverse DNS Lookup Failure & Usage</title></head>";
	echo "<body><h3>Usage:</h3><br />";
	echo "This utility does a reverse DNS lookup for the TCP/IP address sent as a value to the <b>ip</b> GET parameter.";
	echo "<br /><br />";
	echo "<h4>Example</h4><br />";
	echo "This utility expects a URI formatted as follows:<br /><br />";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;http://host.domain.tld/ptr.php?ip=&lt;valid IP address&gt;<br />";
	echo "<br />so the following URI:<br /><br />";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;http://host.domain.tld/ptr.php?ip=8.8.8.8<br /><br />";
	echo "will provide the following response:<br /><br />";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;google-public-dns-a.google.com<br /><br />";
	echo "If you get back the original IP address (8.8.8.8, in the above example), the lookup failed.<br /><br />";
	echo "For more information (maybe), go to <https://github.com/shaneodonnell/nutigas/blob/master/README.md>.";
	echo "</body></html>";
}

exit;


?>
