<?php

if(isset($_POST['user_login']))
{
	if($user = $dm->User()->findByLogin($_POST['user_login']))
	{
		$dm->session()->login($user);
		$dm->session()->setData('displayName', $user->displayName);
		$dm->session()->setData('username', $user->username);
	}
	else
	{
		$dm->session()->setMessage('login_error', 'Invalid username or password');
	}
	$dm->redirect(substr($_SERVER['REQUEST_URI'], 1));
}

if($dm->session()->loggedIn())
{
	$us = $dm->User()->find($dm->session()->userId());
}

