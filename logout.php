<?php

include('config.php');

$dm->session()->logout();

header('Location: '.$_GET['u']);
exit();

