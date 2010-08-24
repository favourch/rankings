<?php

class Week extends BaseWeek
{
	function Week($object=null)
	{
		parent::__construct($object);
	}

	function getLast($yearId=0)
	{
		global $dm;

		if($yearId == 0)
		{
			if($year = $dm->Year()->getLast())
			{
				$yearId = $year->yearId;
			}
		}
		return end($this->findAll("$this->__idField desc", 1, array('yearId'=>intval($yearId))));
	}
}

