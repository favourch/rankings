<?php

include('config.php');

include($dm->headerFile());

$week = $dm->Week()->getLast();
$year = $dm->Year()->getLast();
$ranking = $dm->Ranking()->getLast();

?>
<h3>Select Year</h3>
<ul>
<?php foreach($dm->Year()->findAll('yearName desc') as $y) : ?>
	<li><a href="year.php?y=<?php echo $y->yearId; ?>"><?php echo $y->yearName; ?></a></li>
<?php endforeach; ?>
</ul>
<?php if($dm->Week()->getLast()) : ?>
	<h3>Year <?php echo $year->yearName; ?>, Week <?php echo $week->weekName; ?> Rankings</h3>
<?php  if(!$ranking) : ?>
	<p>No rankings have been submitted for this week.</p>
<?php  else : ?>
	<table border="0" cellpadding="0" cellspacing="0">
		<tr valign="top">
			<td>
				<table class="rows" cellspacing="0">
<?php 	$num = 1; $lastNum = 1; $lastPoints = 0; foreach($ranking as $r) : ?>
<?php
			if($lastPoints == $r->points)
			{
				$dispNum = $lastNum;
			}
			else
			{
				$dispNum = $num;
				$lastNum = $num;
				$lastPoints = $r->points;
			}
			$users = $dm->Vote()->findUsersByWeekAndTeam($week->weekId, $r->teamId);
			$userArr = array();
			foreach($users as $u)
			{
				$userArr[] = "$u->displayName ($u->ranking)";
			}
?>
					<tr class="row<?php echo $num++ % 2 + 1; ?>" title="<?php echo trim($r->teamName).": ".implode(', ', $userArr); ?>">
						<td class="number"><?php echo $dispNum++; ?></td>
						<td><?php echo $r->teamName; if($r->firstPlace) echo " ($r->firstPlace)"; ?></td>
						<td class="number"><?php echo $r->points; ?></td>
					</tr>
<?php 	endforeach; ?>
				</table>
			</td>
			<td width="50">
			</td>
			<td>
				User Rankings
<?php 	foreach($dm->Vote()->findUsersByWeek($week->weekId) as $user) : ?>
<?php 		if(isset($_GET['u']) && $user->userId == $_GET['u']) : ?>
				| <b><a href="?y=<?php echo $year->yearId; ?>&w=<?php echo $week->weekId; ?>&u=<?php echo $user->userId; ?>"><?php echo $user->displayName; ?></a></b>
<?php 		else : ?>
				| <a href="?y=<?php echo $year->yearId; ?>&w=<?php echo $week->weekId; ?>&u=<?php echo $user->userId; ?>"><?php echo $user->displayName; ?></a>
<?php 		endif; ?>
<?php 	endforeach; ?>
				<br />
<?php 		if(isset($_GET['u'])) : $num = 1; $vote = $dm->Vote()->findVoteByWeekAndUser($week->weekId, $_GET['u']); ?>
				<br />
				<table class="rows" cellspacing="0">
<?php 			foreach($vote as $v) : ?>
					<tr class="row<?php echo $num % 2 + 1; ?>">
						<td class="number"><?php echo $num++; ?></td>
						<td><?php echo $v->teamName; ?></td>
					</tr>
<?php 			endforeach; ?>
				</table>
<?php 		endif; ?>
			</td>
		</tr>
	</table>
<?php  endif; ?>
<?php endif; ?>
<?php

include($dm->footerFile());

