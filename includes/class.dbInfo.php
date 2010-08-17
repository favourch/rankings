<?php

class dbInfo extends util
{
	protected $host;
	protected $user;
	protected $pass;
	protected $name;

	function dbInfo()
	{
		$this->setHost('localhost');
		$this->setUser('root');
		$this->setPass('');
		$this->setName('');
	}

	function setHost($host='')
	{
		$this->host = $host;
	}

	function setUser($user='')
	{
		$this->user = $user;
	}

	function setPass($pass='')
	{
		$this->pass = $pass;
	}

	function setName($name='')
	{
		$this->name = $name;
	}
}

