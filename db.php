<?php
require 'config.php';

// Database connection
mysql_connect($db_host, $db_username, $db_password);
mysql_select_db($db_name);
?>