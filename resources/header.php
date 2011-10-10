<html>
<head>
	<title><?php echo $dm->siteTitle(); if(isset($__pageTitle)) { echo " - $__pageTitle"; } ?></title>
<?php if($dm->css()) : ?>
	<?php foreach($dm->css() as $css) : ?>
	<link rel="stylesheet" href="<?php echo $css; ?>">
	<?php endforeach; ?>
<?php endif; ?>
<?php if($dm->js()) : ?>
	<?php foreach($dm->js() as $js) : ?>
	<script type="text/javascript" src="<?php echo $js; ?>"></script>
	<?php endforeach; ?>
<?php endif; ?>
</head>
<body>
<center>
<div id="wrapper">
<div id="navigation">
<?php if($dm->session()->loggedIn()) : ?>
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td align="left" width="40%">
				You are logged in as <?php echo $dm->session()->getData('username'); ?>. <a href="logout.php?u=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">Logout</a>
			</td>
			<td align="center" width="28%">
<?php include('admin_toolbar.php'); ?>
			</td>
			<td align="right" width="32%">
<?php include('toolbar.php'); ?>
			</td>
		</tr>
	</table>
<?php else : ?>
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td align="left">
<?php 	if($dm->session()->hasMessage('login_error')) : ?>
				<div class="message message-error" style="float:left"><?php echo $dm->session()->getMessage('login_error'); ?></div>
<?php 	endif; ?>
				<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
				Username: <input type="text" name="user_login[username]" size="10" /> 
				Password: <input type="password" name="user_login[password]" size="10" /> 
				<input type="submit" value="Login" /> <a href="register.php">Register</a>
				</form>
			</td>
			<td align="right">
<?php 	include('toolbar.php'); ?>
			</td>
		</tr>
	</table>
<?php endif; ?>
</div>
<div id="content">

