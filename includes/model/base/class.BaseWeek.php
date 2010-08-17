<?php

class BaseWeek extends data_util
{
	protected $weekId; // Type: int(11), Null: NO, Key: PRI
	protected $yearId; // Type: int(11), Null: NO, Key: MUL
	protected $weekName; // Type: varchar(10), Null: NO, Key: MUL


	function BaseWeek($object=null)
	{
		$this->__tableName	= 'week';
		$this->__idField	= 'weekId';
		$this->__fields	= array(
				'yearId'=>'yearId',
				'weekName'=>'weekName',
			);
	}
}

