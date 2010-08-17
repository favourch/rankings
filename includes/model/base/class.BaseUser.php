<?php

class BaseUser extends data_util
{
	protected $userId; // Type: int(11), Null: NO, Key: PRI
	protected $username; // Type: varchar(100), Null: NO, Key: MUL
	protected $password; // Type: varchar(100), Null: NO, Key: MUL
	protected $displayName; // Type: varchar(100), Null: NO, Key: 
	protected $admin; // Type: int(1), Null: NO, Key: MUL


	function BaseUser($object=null)
	{
		$this->__tableName	= 'user';
		$this->__idField	= 'userId';
		$this->__fields	= array(
				'username'=>'username',
				'password'=>'password',
				'displayName'=>'displayName',
				'admin'=>'admin',
			);
	}
}

