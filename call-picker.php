<?php
// DB
require 'db.php';
require 'tropo/tropo.class.php';

try {
	$session = new Session();
	$from = $session->getFrom();
}
catch (TropoException $e) {
	//file_put_contents('log.txt', $e->getMessage()); #debug
	exit;
}

// GMT date/time
// Im adding +1 hour, Nigeria's gmt
$date = gmstrftime("%Y-%m-%d %H:%M:00", time()+3600);

// Tropo doesnt provide an API to access your logs,
// so we have to store ourselves

// Log
$q = "insert into logs (frm, date) values ('{$from['id']}', '$date')";
//echo $q; #debug
$r = mysql_query($q);

// Reject Call
$tropo = new Tropo();
$tropo->reject();
$tropo->RenderJson();
?>