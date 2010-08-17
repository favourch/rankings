<?php

include('config.php');

if(!isset($_GET['y']))
{
	$dm->redirect('');
}

$year = $dm->Year()->find($_GET['y']);

include($dm->headerFile());

?>
<h3>Year <?php echo $year->yearName; ?>: Select Week</h3>
<ul>
<?php foreach($dm->Week()->findAll('abs(weekName) asc', 0, array('yearId'=>$_GET['y'])) as $w) : ?>
	<li><a href="week.php?y=<?php echo $w->yearId; ?>&w=<?php echo $w->weekId; ?>"><?php echo $w->weekName; ?></a></li>
<?php endforeach; ?>
</ul>
<?php

include($dm->footerFile());

