<?php
if($_POST["ano"]){
$odpoved = mysql_query("SELECT id FROM towns2_uziv WHERE ali = ".$_SESSION["aliance"]);
while($row = mysql_fetch_array($odpoved)){
if($_POST["p1_".($row["id"])]){ $p1 = $_POST["p1_".($row["id"])]; }else{ $p1 = "0"; }
if($_POST["p2_".($row["id"])]){ $p2 = $_POST["p2_".($row["id"])]; }else{ $p2 = "0"; }
if($_POST["p3_".($row["id"])]){ $p3 = $_POST["p3_".($row["id"])]; }else{ $p3 = "0"; }
if($_POST["p4_".($row["id"])]){ $p4 = $_POST["p4_".($row["id"])]; }else{ $p4 = "0"; }
if($_POST["p5_".($row["id"])]){ $p5 = $_POST["p5_".($row["id"])]; }else{ $p5 = "0"; }
if($_POST["p6_".($row["id"])]){ $p6 = $_POST["p6_".($row["id"])]; }else{ $p6 = "0"; }
mysql_query("UPDATE towns2_uziv SET hodnost='".$_POST["hodnost_".($row["id"])]."', pravomoci='$p1,$p2,$p3,$p4,$p5,$p6' WHERE id=".$row["id"]);
}
deletecash("towns2_uziv");
}
?>
1) <?php echo $GLOBALS["aninth1"]; ?><br />
2) <?php echo $GLOBALS["aninth2"]; ?><br />
3) <?php echo $GLOBALS["aninth3"]; ?><br />
4) <?php echo $GLOBALS["aninth4"]; ?><br />
5) <?php echo $GLOBALS["aninth5"]; ?><br />
6) <?php echo $GLOBALS["aninth6"]; ?><br />
<form action="<?php gv("?submenu=9"); ?>" method="post">
<table>
<tr>
<th><?php echo $GLOBALS["afourth5"]; ?></th>
<th><?php echo $GLOBALS["aninth7"]; ?></th>
<th>1</th>
<th>2</th>
<th>3</th>
<th>4</th>
<th>5</th>
<th>6</th>
</tr>
<?php

//$tmp = new index("towns2_uziv","SELECT meno,id,pravomoci,hodnost FROM towns2_uziv WHERE ppp");
//$tmp = $tmp->get2("0,9999","ali = ".$_SESSION["aliance"]);
foreach(hnet2("towns2_uziv","SELECT meno,id,pravomoci,hodnost FROM towns2_uziv WHERE ppp AND ali = ".$_SESSION["aliance"]) as $row){
//$odpoved = mysql_query("SELECT meno,id,pravomoci,hodnost FROM towns2_uziv WHERE ali = ".$_SESSION["aliance"]);
//while($row = mysql_fetch_array($odpoved)){
$tmp = split("[,]",$row["pravomoci"]);
if($tmp[0] == 1){ $p1 = "checked=\"checked\""; }else{ $p1 = ""; }
if($tmp[1] == 1){ $p2 = "checked=\"checked\""; }else{ $p2 = ""; }
if($tmp[2] == 1){ $p3 = "checked=\"checked\""; }else{ $p3 = ""; }
if($tmp[3] == 1){ $p4 = "checked=\"checked\""; }else{ $p4 = ""; }
if($tmp[4] == 1){ $p5 = "checked=\"checked\""; }else{ $p5 = ""; }
if($tmp[5] == 1){ $p6 = "checked=\"checked\""; }else{ $p6 = ""; }

$pravo6 = ('<input type="checkbox" name="p6_'.$row["id"].'" value="1" '.$p6.'>');
if($row["id"] == $_SESSION["id"]){ $pravo6 = '<input type="hidden" name="p6_'.$row["id"].'" value="1" '.$p6.'>'; }
echo('
<tr>
<td>'.$row["meno"].'</td>
<td><input type="text" name="hodnost_'.$row["id"].'" value="'.$row["hodnost"].'" size="20" maxlength="30"></td>
<td><input type="checkbox" name="p1_'.$row["id"].'" value="1" '.$p1.'></td>
<td><input type="checkbox" name="p2_'.$row["id"].'" value="1" '.$p2.'></td>
<td><input type="checkbox" name="p3_'.$row["id"].'" value="1" '.$p3.'></td>
<td><input type="checkbox" name="p4_'.$row["id"].'" value="1" '.$p4.'></td>
<td><input type="checkbox" name="p5_'.$row["id"].'" value="1" '.$p5.'></td>
<td>'.$pravo6.'</td>
</tr>
');
}

?>
</table>
<input type="hidden" name="ano" value="1"><input type="submit" value="OK">
</form>