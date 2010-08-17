<?php

class Ranking extends BaseRanking
{
	function Ranking($object=null)
	{
		parent::__construct($object);
	}

	function lookup($weekId=null)
	{
		$weekId = intval($weekId);
		if($weekId)
		{
			$sql = "select r.*, t.teamName from $this->__tableName r left join team t using(teamId) where r.weekId=$weekId order by r.points desc, r.firstPlace desc, t.teamName asc";
			return $this->get($sql);
		}
		return false;
	}

	function clear($weekId=null)
	{
		$weekId = intval($weekId);
		if($weekId)
		{
			$sql = "delete from ranking where weekId=$weekId";
			return $this->query($sql);
		}
		return false;
	}

	function calculate($weekId=null)
	{
		global $dm;

		$weekId = intval($weekId);
		if($weekId)
		{
			$value = array();
			foreach($dm->RankValue()->findAll() as $rv)
			{
				$value[$rv->ranking] = $rv->value;
			}

			$teams = array();
			$firstPlace = array();

			foreach($dm->Vote()->findBy(array('weekId'=>$weekId)) as $v)
			{
				if(!isset($teams[$v->teamId]))
				{
					$teams[$v->teamId] = 0;
					$firstPlace[$v->teamId] = 0;
				}

				$teams[$v->teamId] += $value[$v->ranking];
				if($v->ranking == 1)
				{
					$firstPlace[$v->teamId]++;
				}
			}

			$this->clear($weekId);

			foreach($teams as $id=>$points)
			{
				$ranking = array('weekId'=>$weekId, 'teamId'=>$id, 'points'=>$points, 'firstPlace'=>intval($firstPlace[$id]));
				$this->add($ranking);
			}
		}
	}
}

