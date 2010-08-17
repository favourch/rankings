<?php

class BaseRankValue extends data_util
{
	protected $rankValueId; // Type: int(11), Null: NO, Key: PRI
	protected $ranking; // Type: int(11), Null: NO, Key: MUL
	protected $value; // Type: int(11), Null: NO, Key: 


	function BaseRankValue($object=null)
	{
		$this->__tableName	= 'rank_value';
		$this->__idField	= 'rankValueId';
		$this->__fields	= array(
				'ranking'=>'ranking',
				'value'=>'value',
			);
	}
}

