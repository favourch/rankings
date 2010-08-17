<?php

include('config.php');

$dm->session()->logout();

$dm->redirect($_GET['u']);

