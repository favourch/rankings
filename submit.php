<?php

include('config.php');

$dm->addJS('main');

if(!isset($_GET['w']))
{
	$dm->redirect('');
}

$week = $dm->Week()->find($_GET['w']);
$year = $dm->Year()->find($week->yearId);
$rankedTeams = $dm->Setting()->findByName('Ranked Teams');

$hasVoted = false;
if($dm->session()->loggedIn())
{
	$vote = $dm->Vote()->lookup($dm->session()->userId(), $week->weekId);
	if($vote)
	{
		$hasVoted = true;
	}
}

if($_POST && $dm->session()->loggedIn() && !$hasVoted)
{
	for($num=1; $num<=$rankedTeams; $num++)
	{
		$vote = array('weekId'=>$week->weekId, 'userId'=>$dm->session()->userId(), 'teamId'=>$_POST['ranking_'.$num], 'ranking'=>$num);
		$dm->Vote()->add($vote);
	}
	$dm->Ranking()->calculate($week->weekId);
	$dm->redirect("week.php?y=$year->yearId&w=$week->weekId");
}

include($dm->headerFile());

?>
	<h3>Year <?php echo $year->yearName; ?>, Week <?php echo $week->weekName ?> Rankings</h3>
<?php if($dm->session()->loggedIn()) : ?>
<?php 	if($hasVoted) : ?>
	<p>You have already submitted your rankings for this week.</p>
<?php 	else : ?>
	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
		<table border="0" cellspacing="0">
<?php 		for($num=1; $num<=$rankedTeams; $num++) : ?>
			<tr>
				<td align="right" style="padding: 1px 4px"><?php echo $num; ?></td>
				<td style="padding: 0px 4px">
					<select id="ranking_<?php echo $num; ?>" name="ranking_<?php echo $num; ?>" onchange="changeStatus('Not checked since change')">
<?php 			foreach($dm->Team()->findAll('teamName asc') as $t) : ?>
						<option value="<?php echo $t->teamId; ?>"><?php echo trim($t->teamName); ?></option>
<?php 			endforeach; ?>
					</select>
				</td>
				<td width="50"><span id="status_<?php echo $num; ?>"></span></td>
			</tr>
<?php 		endfor; ?>
			<tr>
				<td colspan="3">Status: <span id="allStatus">Not checked yet</span></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="button" onclick="javascript:check(this.form, <?php echo $rankedTeams; ?>)" value="Check" /> <input type="submit" value="Submit" /></td>
				<td></td>
			</tr>
		</table>
	</form>
<?php 	endif; ?>
<?php else: ?>
	<p>You must be logged in to submit rankings.</p>
<?php endif; ?>
<?php

include($dm->footerFile());

