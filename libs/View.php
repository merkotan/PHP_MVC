<?php
class View 
{
	public function render($name, $arg=false, $count = false)
	{
		require 'views/header.php';
		require 'views/'.$name.'.php';
		require 'views/footer.php';
	}
}
