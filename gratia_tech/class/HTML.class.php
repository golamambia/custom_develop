<?php 
class HTML {
	
	public $dbObject;
	public $randString;

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/	

public function HTML($dbObject){
	$this->dbObject = $dbObject;
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/	
public function title($title='')
{
	echo '<title>'.$title.'</title>';	
}

/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/	
public function cssLink($path='')
{
	echo '<link rel="stylesheet" type="text/css" href="'.$path.'">';		
}
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/	
public function scriptLink($path='')
{
	echo '<script type="text/javascript" src="'.$path.'"></script>';	
}
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/	
public function heading($h,$text)
{
	echo '<h'.$h.'>'.$text.'</h'.$h.'>';	
}
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/	
public function ahref($link,$text,$target)
{
	echo '<a href="'.$link.'" target="_'.$target.'">'.$text.'</a>';	
}
/*
++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
==========================================================================================================
*/	

//END CLASS	
}
?>