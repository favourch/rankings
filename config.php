<?php

require_once dirname(__FILE__).'/includes/system/config.php';

// classes
$dbInfo = new dbInfo();
$dbInfo->setHost('localhost');
$dbInfo->setUser('root');
$dbInfo->setPass('');
$dbInfo->setName('rankings');

$dm = new dm(false);
$dm->connectDb($dbInfo);
$dm->setVars('Rankings', 'http://vm.rankings/', '/home/jon/www/misc/rankings/');

include('includes/inc.login.php');

?>
