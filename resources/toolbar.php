				<a href="<?php echo $dm->baseUrl(); ?>index.php">Home</a>
<?php if(isset($_GET['y'])) : ?>
<?php	$y = $dm->Year()->find($_GET['y']); ?>
				| Year: <a href="<?php echo $dm->baseUrl(); ?>year.php?y=<?php echo $y->yearId; ?>"><?php echo $y->yearName; ?></a>
<?php endif; ?>
<?php if(isset($_GET['w'])) : ?>
<?php	$w = $dm->Week()->find($_GET['w']); ?>
				| Week: <a href="<?php echo $dm->baseUrl(); ?>week.php?y=<?php echo $w->yearId; ?>&w=<?php echo $w->weekId; ?>"><?php echo $w->weekName; ?></a>
<?php endif; ?>
