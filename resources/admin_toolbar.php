<?php if($dm->session()->loggedIn()) if($us->admin === '1') : ?>
				<a href="<?php echo $dm->baseUrl(); ?>admin_manage.php">Manage</a> | 
				<a href="<?php echo $dm->baseUrl(); ?>admin_users.php">Users</a> | 
				<a href="<?php echo $dm->baseUrl(); ?>admin_settings.php">Settings</a> | 
				<a href="<?php echo $dm->baseUrl(); ?>sql/">DB</a>
<?php endif; ?>
