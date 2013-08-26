<?php
$context=array('http' => array ('header'=> 'GET a=a', ),);
$xcontext = stream_context_create($context);
$str=file_get_contents("http://www.towns.cz/",FALSE,$xcontext);
echo($str)
?>