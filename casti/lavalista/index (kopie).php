<?
function zlista($zdroj,$nadpis){
echo("<div class=\"sidebaritem\"><div class=\"sbihead\"><h1>$nadpis</h1></div><div class=\"sbicontent\">"); require($zdroj); echo("</div></div>");
}
//zlista("casti/lavalista/menu.php","menu");

function lista($a){
eval(file_get_contents("casti/jazyk/".$_SESSION["lang"].".txt"));
if($a == 1){
zlista("casti/lavalista/mesta.php","mesta");
}
if($a == 2){
zlista("casti/lavalista/menu.php","menu");
}
if($a == 3){
zlista("casti/lavalista/zpravy.php","zprÁvy");
}
if($a == 4){
zlista("casti/lavalista/novinky.php","novinky na fÓru");
}
if($a == 5){
zlista("casti/lavalista/anketa.php","anketa");
}
if($a == 6){
zlista("casti/lavalista/stavanie.php","stavba");
}
if($a == 7){
zlista("casti/lavalista/podpora.php","podpora");
}
if($a == 8){
zlista("casti/lavalista/surowiny.php","tĚžba surovin");
}
if($a == 9){
zlista("casti/lavalista/nouser.php","pŘehled");
}
}
$odpoved =mysql_query("SELECT lista from townsuziv WHERE id = '".$_SESSION["id"]."'");
if(mysql_num_rows($odpoved) == 0){ lista(9); }
while ($row = mysql_fetch_array($odpoved)) {
eval($row["lista"]);
}
mysql_free_result($odpoved);
?>