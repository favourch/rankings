<?php

class Setting extends BaseSetting
{
	function Setting($object=null)
	{
		parent::__construct($object);
	}

	function findOneByName($name=null, $returnValue=true)
	{
		if($name)
		{
			$row = $this->findOneBy(array('settingName'=>$name));
			if($returnValue)
			{
				return $row->settingValue;
			}
			else
			{
				return $row;
			}
		}
		return false;
	}

	function findByName($name=null, $returnValue=true)
	{
		return $this->findOneByName($name, $returnValue);
	}
}

