<?php

include('config.php');

if($dm->session()->loggedIn())
{
	$dm->redirect('');
}

if(isset($_POST['register']))
{
	if(strlen($_POST['register']['password']) < 6)
	{
		$dm->session()->setMessage('register_error', 'Your password must be at least 6 characters.');
	}
	elseif($_POST['register']['password'] != $_POST['register']['confirm_password'])
	{
		$dm->session()->setMessage('register_error', 'The passwords entered do not match.');
	}
	elseif(strlen($_POST['register']['username']) < 4)
	{
		$dm->session()->setMessage('register_error', 'Your username must be at least 4 characters.');
	}
	elseif($dm->User()->findOneBy(array('username'=>$_POST['register']['username'])))
	{
		$dm->session()->setMessage('register_error', "The username {$_POST['register']['username']} is already registered.");
	}
	else
	{
		$data = array();
		$data['username'] = $_POST['register']['username'];
		$data['password'] = md5($_POST['register']['password']);
		$data['displayName'] = $_POST['register']['displayName'] ? $_POST['register']['displayName'] : $_POST['register']['username'];
		$userId = $dm->User()->add($data);
		$user = $userId ? $dm->User()->find($userId) : false;;
		if($user)
		{
			$dm->session()->login($user);
			$dm->session()->setData('displayName', $user->displayName);
			$dm->session()->setData('username', $user->username);
			$dm->redirect(substr($_SERVER['REQUEST_URI'], 1));
		}
		else
		{
			$dm->session()->setMessage('register_error', 'There was an error processing your request.');
		}
	}
}

include($dm->headerFile());

?>
<h1>Register</h1>
<?php if($dm->session()->hasMessage('register_error')) : ?>
<div class="message message-error"><?php echo $dm->session()->getMessage('register_error'); ?></div>
<?php endif; ?>
<form method="post">
<table border="0">
	<tr>
		<td>Username:</td>
		<td><input type="text" name="register[username]" value="<?php echo isset($_POST['register']) ? $_POST['register']['username'] : ''; ?>"></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="register[password]"></td>
	</tr>
	<tr>
		<td>Confirm Password:</td>
		<td><input type="password" name="register[confirm_password]"></td>
	</tr>
	<tr>
		<td>Display Name:</td>
		<td><input type="text" name="register[displayName]" value="<?php echo isset($_POST['register']) ? $_POST['register']['displayName'] : ''; ?>"></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><input type="submit" value="Register"></td>
	</tr>
</table>
</form>
<?php

include($dm->footerFile());

