<a href="<?php gv("?dir=casti/suroviny/vymenad.php"); ?>"><?php echo $GLOBALS["svymena1"]; ?></a>




<form id="form1" name="form1" method="post" action="">
 <table width="235" border="0">
   <tr>
     <td colspan="2"><strong><?php echo $GLOBALS["svymena2"]; ?></strong></td>
    </tr>
   <tr>
     <td width="144"><?php echo $GLOBALS["svymena3"]; ?></td>
     <td width="75"><select name="a1">
       <option value="0" selected="selected"><?php echo $GLOBALS["svymena4"]; ?></option>
       <option value="1"><?php echo $GLOBALS["sviac1"]; ?></option>
       <option value="2"><?php echo $GLOBALS["sviac2"]; ?></option>
       <option value="3"><?php echo $GLOBALS["sviac3"]; ?></option>
       <option value="4"><?php echo $GLOBALS["sviac4"]; ?></option>
       <option value="5"><?php echo $GLOBALS["sviac5"]; ?></option>
               </select></td>
   </tr>
   <tr>
     <td><?php echo $GLOBALS["svymena4a"]; ?></td>
     <td><select name="a2">
       <option value="0" selected="selected"><?php echo $GLOBALS["svymena4"]; ?></option>
       <option value="1"><?php echo $GLOBALS["sviac1"]; ?></option>
       <option value="2"><?php echo $GLOBALS["sviac2"]; ?></option>
       <option value="3"><?php echo $GLOBALS["sviac3"]; ?></option>
       <option value="4"><?php echo $GLOBALS["sviac4"]; ?></option>
       <option value="5"><?php echo $GLOBALS["sviac5"]; ?></option>
          </select></td>
   </tr>
   <tr>
     <td><input type="submit" name="Submit" value="<?php echo $GLOBALS["svymena4b"]; ?>" /></td>
     <td>&nbsp;</td>
   </tr>
 </table>
</form>


<?php
if($_POST["a1"]){
$cond1 = "a1 = ".$_POST["a1"];
}else{
$cond1 = "1";
}
if($_POST["a2"]){
$cond2 = "a2 = ".$_POST["a2"];
}else{
$cond2 = "1";
}
$cond = $cond1." AND ".$cond2;

echo($cond);
?>

<table width="550">
<tr bgcolor="#cccccc">
<th><?php echo $GLOBALS["svymena5"]; ?></th>
<th><?php echo $GLOBALS["svymena6"]; ?></th>
<th><?php echo $GLOBALS["svymena7"]; ?></th>
<th><?php echo $GLOBALS["svymena8"]; ?></th>
<th><?php echo $GLOBALS["svymena7"]; ?></th>
<th><?php echo $GLOBALS["svymena9"]; ?></th>
</tr>

<tr>
<td align="center"><?php echo $GLOBALS["svymena10"]; ?></td>
<td align="center"><?php echo $GLOBALS["sviac1"]; ?></td>
<td align="center">1000</td>
<td align="center"><?php echo $GLOBALS["sviac5"]; ?></td>
<td align="center">1500</td>
<td align="center"><?php echo $GLOBALS["svymena11"]; ?></td>
</tr>

</table>