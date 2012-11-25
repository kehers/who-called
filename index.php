<?php
require 'calls.php';
$calls = new calls();
$missed = $calls->missed();
echo '<pre>';
print_r($missed);
?>