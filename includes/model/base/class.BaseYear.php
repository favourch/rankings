<?php

class BaseYear extends data_util
{
	protected $yearId; // Type: int(11), Null: NO, Key: PRI
	protected $yearName; // Type: varchar(10), Null: NO, Key: MUL


	function BaseYear($object=null)
	{
		$this->__tableName	= 'year';
		$this->__idField	= 'yearId';
		$this->__fields	= array(
				'yearName'=>'yearName',
			);
	}
}

