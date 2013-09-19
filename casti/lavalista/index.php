<?php
if(!$_SESSION["id"])
{
  $lista = file_get_contents("casti/lavalista/nouser.txt");
}
else
{
  $lista = file_get_contents("casti/lavalista/zakladne.txt");
}

foreach(preg_split("[,]",$lista) as $row){

// check
if ($row == '')
    continue;
    
file_put_contents("casti/lavalista/tmp.txt",hnet("towns2_lista","SELECT kod from towns2_lista WHERE ppp AND id = ".$row));

echo("<div class=\"sidebaritem\"><div class=\"sbihead\"><h1>".hnet("towns2_lista","SELECT " . $GLOBALS["name"] . " from towns2_lista WHERE ppp AND id = ".$row)."</h1></div><div class=\"sbicontent\">"); require("casti/lavalista/tmp.txt"); echo("</div></div>");
}
?>