<iframe src="casti/mapa/let2.php" width="587" height="530" frameborder="0" scrolling="no"/>

<?php /*

<strong><?php echo $xtypmapy; ?><a href="?mapa=iso"><?php echo $xiso; ?></a>, <a href="?mapa=let2"><?php echo $xlet; ?></a>, <a href="?mapa=text"><?php echo $xtextmap; ?></a></strong><br />

<?php
echo("<iframe src=\"casti/mapa/");
if($_GET["mapa"]){
$_SESSION["mapa"] = $_GET["mapa"];
} 
if(!$_SESSION["mapa"]){
echo "let2";
}else{
echo $_SESSION["mapa"];
}
echo(".php\" width=\"587\" height=\"530\" frameborder=\"0\" scrolling=\"no\"/>");

//echo("<iframe src=\"casti/mapa/let.php\" width=\"587\" height=\"530\" frameborder=\"0\"/>");
*/
?>