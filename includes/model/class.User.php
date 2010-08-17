<?php

class User extends BaseUser
{
	function User($object=null)
	{
		parent::__construct($object);
	}

	function findByLogin($user)
	{
		$row = $this->findOneBy(array('username'=>$user['username'], 'password'=>md5($user['password'])));
		if($row)
		{
			return $row;
		}
		else
		{
			return false;
		}
	}
}

