<?php
$servername = 'oniddb.cws.oregonstate.edu';
$username1   = 'sharifpa-db';
$password	= 'mnsQcoylLEHnTbpb';
$dbname		= 'sharifpa-db';

$con	    = mysql_connect($servername,$username1,$password)
	or die  ('Error connecting to database server');
	
mysql_select_db($dbname, $con)
	or die  ('Error selecting the database');
	
?>