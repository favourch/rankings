<?php

class BaseRanking extends data_util
{
	protected $rankingId; // Type: int(11), Null: NO, Key: PRI
	protected $weekId; // Type: int(11), Null: NO, Key: MUL
	protected $teamId; // Type: int(11), Null: NO, Key: MUL
	protected $points; // Type: int(11), Null: NO, Key: MUL
	protected $firstPlace; // Type: int(11), Null: NO, Key: MUL


	function BaseRanking($object=null)
	{
		$this->__tableName	= 'ranking';
		$this->__idField	= 'rankingId';
		$this->__fields	= array(
				'weekId'=>'weekId',
				'teamId'=>'teamId',
				'points'=>'points',
				'firstPlace'=>'firstPlace',
			);
	}
}

