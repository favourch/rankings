<?php

class util
{
	function util()
	{
	}

	function __call($name, $args)
	{
		if(isset($this->{$name}))
		{
			return $this->{$name};
		}
		else
		{
			echo '<pre>';
			throw new Exception('Unknown ['.get_class($this).'] function: '.$name);
			echo '</pre>';
			return false;
		}
	}
}

