<?php

/* 	Remember:  This is functional and not foolproof.  There's no express
	error-handling.  If you get the IP back, the lookup failed.  If you 
	get nothing back, you may have a problem with the address.  There's no
	validation of the IP address being done.  FIXME     */

/* This grabs the value of "ip" from the URL parms and does a reverse DNS lookup */

$hostname = gethostbyaddr($_GET["ip"]);

echo $hostname;

?>
