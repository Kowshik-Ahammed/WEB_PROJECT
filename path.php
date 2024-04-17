<?php 
$path = realpath(dirname(__FILE__));
$npath = str_replace('\\', '/', $path);
define("ROOT_PATH", $npath);
define("BASE_URL", "http://localhost/blog");

?>
