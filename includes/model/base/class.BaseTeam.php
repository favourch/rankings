<?php

class BaseTeam extends data_util
{
	protected $teamId; // Type: int(11), Null: NO, Key: PRI
	protected $teamName; // Type: varchar(100), Null: NO, Key: MUL


	function BaseTeam($object=null)
	{
		$this->__tableName	= 'team';
		$this->__idField	= 'teamId';
		$this->__fields	= array(
				'teamName'=>'teamName',
			);
	}
}

