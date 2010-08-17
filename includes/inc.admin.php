<?php

if(!$dm->session()->loggedIn())
{
	$dm->redirect('');
}

if($us->admin != '1')
{
	$dm->redirect('');
}

