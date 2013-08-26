<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<table width="160" height="49" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <th width="150" height="45" align="left" valign="top" bgcolor="#D4D0C8" scope="col"><form id="form1" name="form1" method="post" action="">
          <p><?php echo $xmesto; ?>
            <select name="select" onchange="MM_jumpMenu('parent',this,0)">
                <?php
$odpoved =mysql_query("
select townsmes.meno, townsmes.id 
from townsmesuziv,townsmes
 where townsmesuziv.mesto = townsmes.id  AND
townsmesuziv.uzivatel = '".$_SESSION["id"]."'");
while ($row = mysql_fetch_array($odpoved)) {



$selected = "";
if($row["id"] == $_SESSION["mestoid"]){
$selected = "selected=\"selected\"";
}
$id3 = $row["id"];
if($id3 == "0"){
$id3 = "a";
}
echo("
<option value=\"?mesto=$id3\"  ".$selected.">".$row["meno"]."</option>


");

if(!$_SESSION["mestoid"]){
$_SESSION["mestoid"] = $row["id"];
}

}
mysql_free_result($odpoved);
?>
              </select>
              <br />
            &nbsp;<a href="?dir=casti/admin/mesta.php"><?php echo $xaliames; ?></a> </p>
        </form></th>
  </tr>
</table>
