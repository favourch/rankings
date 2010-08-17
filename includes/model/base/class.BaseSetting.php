<?php

class BaseSetting extends data_util
{
	protected $settingId; // Type: int(11), Null: NO, Key: PRI
	protected $settingName; // Type: varchar(100), Null: NO, Key: MUL
	protected $settingValue; // Type: varchar(100), Null: NO, Key: 


	function BaseSetting($object=null)
	{
		$this->__tableName	= 'setting';
		$this->__idField	= 'settingId';
		$this->__fields	= array(
				'settingName'=>'settingName',
				'settingValue'=>'settingValue',
			);
	}
}

