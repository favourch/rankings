<?php

class BaseVote extends data_util
{
	protected $voteId; // Type: int(11), Null: NO, Key: PRI
	protected $weekId; // Type: int(11), Null: NO, Key: MUL
	protected $userId; // Type: int(11), Null: NO, Key: MUL
	protected $teamId; // Type: int(11), Null: NO, Key: MUL
	protected $ranking; // Type: int(11), Null: NO, Key: MUL


	function BaseVote($object=null)
	{
		$this->__tableName	= 'vote';
		$this->__idField	= 'voteId';
		$this->__fields	= array(
				'weekId'=>'weekId',
				'userId'=>'userId',
				'teamId'=>'teamId',
				'ranking'=>'ranking',
			);
	}
}

