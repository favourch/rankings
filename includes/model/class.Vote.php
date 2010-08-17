<?php

class Vote extends BaseVote
{
	function Vote($object=null)
	{
		parent::__construct($object);
	}

	function lookup($userId=null, $weekId=null)
	{
		$userId = intval($userId);
		$weekId = intval($weekId);
		if($userId && $weekId)
		{
			$sql = "select v.*, t.teamName from $this->__tableName v left join team t using(teamId) where v.userId=$userId and v.weekId=$weekId order by v.ranking asc";
			return $this->get($sql);
		}
		return false;
	}

	function clear($userId=null, $weekId=null)
	{
		$userId = intval($userId);
		$weekId = intval($weekId);
		if($userId && $weekId)
		{
			$sql = "delete from $this->__tableName where userId=$userId and weekId=$weekId";
			return $this->query($sql);
		}
	}

	function findUsersByWeekAndTeam($weekId=null, $teamId=null)
	{
		$weekId = intval($weekId);
		$teamId = intval($teamId);
		if($weekId && $teamId)
		{
			$sql = "select v.*, u.displayName from $this->__tableName v left join user u using(userId) where v.weekId=$weekId and v.teamId=$teamId order by v.ranking asc, u.displayName";
			return $this->get($sql);
		}
		return false;
	}

	function findUsersByWeek($weekId=null)
	{
		$weekId = intval($weekId);
		if($weekId)
		{
			$sql = "select v.*, u.displayName from $this->__tableName v left join user u using(userId) where v.weekId=$weekId group by v.userId order by u.displayName";
			return $this->get($sql);
		}
		return false;
	}

	function findVoteByWeekAndUser($weekId=null, $userId=null)
	{
		$userId = intval($userId);
		$weekId = intval($weekId);
		if($userId && $weekId)
		{
			$sql = "select v.*, t.teamName from $this->__tableName v left join team t using(teamId) where v.userId=$userId and v.weekId=$weekId order by v.ranking asc";
			return $this->get($sql);
		}
		return false;
	}
}

