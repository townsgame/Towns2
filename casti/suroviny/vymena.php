<a href="<?php gv("?dir=casti/suroviny/vymenad.php"); ?>">přidat nabídku</a>




<form id="form1" name="form1" method="post" action="">
 <table width="235" border="0">
   <tr>
     <td colspan="2"><strong>naj&iacute;t nab&iacute;dku</strong></td>
    </tr>
   <tr>
     <td width="144">nab&iacute;zen&aacute; surovina</td>
     <td width="75"><select name="a1">
       <option value="0" selected="selected">každá</option>
       <option value="1">pen&iacute;ze</option>
       <option value="2">j&iacute;dlo</option>
       <option value="3">k&aacute;men</option>
       <option value="4">&#382;elezo</option>
       <option value="5">d&#345;evo</option>
               </select></td>
   </tr>
   <tr>
     <td>hledan&aacute; surovina </td>
     <td><select name="a2">
       <option value="0" selected="selected">každá</option>
       <option value="1">pen&iacute;ze</option>
       <option value="2">j&iacute;dlo</option>
       <option value="3">k&aacute;men</option>
       <option value="4">&#382;elezo</option>
       <option value="5">d&#345;evo</option>
          </select></td>
   </tr>
   <tr>
     <td><input type="submit" name="Submit" value="n&aacute;j&iacute;t" /></td>
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
<th>nabízí</th>
<th>surovinu</th>
<th>počet</th>
<th>za surovinu</th>
<th>počet</th>
<th>akce</th>
</tr>

<tr>
<td align="center">příroda</td>
<td align="center">peníze</td>
<td align="center">1000</td>
<td align="center">dřevo</td>
<td align="center">1500</td>
<td align="center">Přijmout nabídku</td>
</tr>

</table>