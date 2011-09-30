<?php

require_once dirname(__FILE__).'/includes/system/config.php';

// classes
$dbInfo = new dbInfo();
$dbInfo->setHost('localhost');
$dbInfo->setUser('www-data');
$dbInfo->setPass('W3Wd@ta');
$dbInfo->setName('rankings');

$dm = new dm(false);
$dm->connectDb($dbInfo);
$dm->setVars('Rankings', 'http://rankings.stoddarthome.com/', '/usr/local/www/data/rankings/');

include('includes/inc.login.php');

?>
