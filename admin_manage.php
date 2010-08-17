<?php

include('config.php');
include('includes/inc.admin.php');

if(isset($_POST['new_year']))
{
	$yearId = $dm->Year()->add($_POST['new_year']);
	$dm->redirect('admin_manage.php?y='.$yearId);
}

if(isset($_POST['new_week']))
{
	$weekId = $dm->Week()->add($_POST['new_week']);
	$dm->redirect('admin_manage.php?y='.$_POST['new_week']['yearId'].'&w='.$weekId);
}

include($dm->headerFile());

?>
	<table border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td valign="top">
				<table class="rows" cellspacing="0">
					<tr class="header">
						<td>Year</td>
					</tr>
<?php $rowNum = 0; foreach($dm->Year()->findAll() as $year) : ?>
					<tr class="row<?php echo $rowNum++ % 2 + 1; ?><?php if(isset($_GET['y']) && $year->yearId == $_GET['y']) echo ' selected'; ?>">
						<td><a href="?y=<?php echo $year->yearId; ?>"><?php echo $year->yearName; ?></a></td>
					</tr>
<?php endforeach; ?>
				</table>
				<form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
					New Year: <input type="text" name="new_year[yearName]" size="1" /> <input type="submit" value="Save" />
				</form>
			</td>
			<td width="50">
			</td>
			<td valign="top">
<?php if(isset($_GET['y'])) : ?>
				<table class="rows" cellspacing="0">
					<tr class="header">
						<td>Week</td>
					</tr>
<?php $rowNum = 0; foreach($dm->Week()->findAll(null, 0, array('yearId'=>$_GET['y'])) as $week) : ?>
					<tr class="row<?php echo $rowNum++ % 2 + 1; ?><?php if(isset($_GET['w']) && $week->weekId == $_GET['w']) echo ' selected'; ?>">
						<td><a href="?y=<?php echo $week->yearId; ?>&w=<?php echo $week->weekId; ?>"><?php echo $week->weekName; ?></a></td>
					</tr>
<?php endforeach; ?>
				</table>
				<form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
					<input type="hidden" name="new_week[yearId]" value="<?php echo $_GET['y']; ?>" />
					New Week: <input type="text" name="new_week[weekName]" size="1" /> <input type="submit" value="Save" />
				</form>
<?php endif; ?>
			</td>
		</tr>
	</table>
<?php

include($dm->footerFile());

