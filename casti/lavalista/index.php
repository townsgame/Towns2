<?php
if($_SESSION["id"]){
$lista = hnet("towns2_uziv","SELECT lista from towns2_uziv WHERE id = '".$_SESSION["id"]."'");
}else{
$lista = file_get_contents("casti/lavalista/nouser.txt");
}
if(!$lista){
$lista = file_get_contents("casti/lavalista/zakladne.txt");
}

foreach(split("[,]",$lista) as $row){
file_put_contents("casti/lavalista/tmp.txt",hnet("towns2_lista","SELECT kod from towns2_lista WHERE ppp AND id = ".$row));

echo("<div class=\"sidebaritem\"><div class=\"sbihead\"><h1>".hnet("towns2_lista","SELECT meno from towns2_lista WHERE ppp AND id = ".$row)."</h1></div><div class=\"sbicontent\">"); require("casti/lavalista/tmp.txt"); echo("</div></div>");
}
?>