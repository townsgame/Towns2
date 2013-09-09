<?php

// language detection & load
$ldir = "jazyk";

$lang = '';
if (isset($_GET['lang']))
{
    $lang = htmlspecialchars($_GET['lang']);
}
else 
{
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
}
if ($lang == 'cz')
  $lang = 'cs';

// english must exist
if (!file_exists(__DIR__ . "/" . $ldir . "/" . $lang . ".php"))
{
    $lang = "en"; 
}
// require
require_once(__DIR__ . "/" . $ldir . "/" . $lang . ".php");

$name = "name";
if ($GLOBALS["lang"] == "cs")
    $name = "meno";
?>