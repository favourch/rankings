<?php

include('config.php');

if(!isset($_GET['w']))
{
	$dm->redirect('');
}

$week = $dm->Week()->find($_GET['w']);
$year = $dm->Year()->find($week->yearId);
$ranking = $dm->Ranking()->lookup($week->weekId);

$canVote = false;
if($dm->session()->loggedIn())
{
	$vote = $dm->Vote()->lookup($dm->session()->userId(), $week->weekId);
	if(!$vote)
	{
		$canVote = true;
	}
}

include($dm->headerFile());

?>
	<h3>Year <?php echo $year->yearName; ?>, Week <?php echo $week->weekName ?> Rankings</h3>
<?php if($dm->session()->loggedIn()) : ?>
<?php 	if($canVote) : ?>
		<p>You have not yet submitted your rankings for this week. <a href="submit.php?y=<?php echo $year->yearId; ?>&w=<?php echo $week->weekId; ?>">Click here</a> to submit.</p>
<?php 	else : ?>
		<p>You have submitted your rankings for this week.</p>
<?php 	endif; ?>
<?php endif; ?>
<?php if($ranking) : ?>
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
<?php else : ?>
<h3>There are no rankings yet for this week.</h3>
<?php endif; ?>
<?php

include($dm->footerFile());

