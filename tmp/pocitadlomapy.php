<?php
require("casti/funkcie/index.php");
$volne = 0;
$odpoved = mysql_query("select obrazok from towns WHERE obrazok='0' AND vlastnik='1'");
while ($row = mysql_fetch_array($odpoved)) {
$volne = $volne+1;
}
mysql_free_result($odpoved);

$volne2 = file_get_contents("pocitadlomapy.txt");
if($volne2 != $volne){

echo   0.01*$volne."% voln�ch";
mail("hejpal@post.cz","mapa",0.01*$volne."% voln�ch");
file_put_contents("pocitadlomapy.txt", $volne);


}






?>
