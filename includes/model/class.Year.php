<?php

class Year extends BaseYear
{
	function Year($object=null)
	{
		parent::__construct($object);
	}

	function getLast()
	{
		return end($this->findAll("$this->__idField desc", 1));
	}
}

