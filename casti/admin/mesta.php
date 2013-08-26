<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
  <?php 
$odpoved =mysql_query("SELECT ali from townsuziv WHERE id='".$_SESSION["id"]."'");
while ($row = mysql_fetch_array($odpoved)) {
$ali = $row["ali"];
}
mysql_free_result($odpoved);
//----------------------------------------
if($ali){
echo("
<table width=\"617\" border=\"0\">
  <tr>
    <th width=\"115\" bgcolor=\"#CCCCCC\"><a href=\"?aliid=1\">$xamm1</a></th>
    <th width=\"115\" bgcolor=\"#CCCCCC\"><a href=\"?aliid=3\">$xamm3</a></th>
    <th width=\"125\" bgcolor=\"#CCCCCC\"><a href=\"?aliid=4\">$xamm4</a></th>
  </tr>
</table>
");
}else{
echo("
<table width=\"617\" border=\"0\">
  <tr>
    <th width=\"115\" bgcolor=\"#CCCCCC\"><a href=\"?aliid=1\">$xamm1</a></th>
    <th width=\"115\" bgcolor=\"#CCCCCC\"><span class=\"style1\">$xamm3</span></th>
    <th width=\"125\" bgcolor=\"#CCCCCC\"><span class=\"style1\">$xamm4</span></th>
  </tr>
</table>
");
}
//----------------------------------------
if($_GET["aliid"]){
$_SESSION["aliid"] = $_GET["aliid"];
} 
	  
$aliid = $_SESSION["aliid"];
if(!$aliid){
$aliid="1";
}

if(!$ali and $aliid != "1"){
chyba1($xnejstevali);
}else{
require("casti/admin/sprava/".$aliid.".php");
}
?>

