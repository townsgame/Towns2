<style type="text/css">
<!--
.textfield {font-size: 24px}
.textfieldtext {color: #FFCC00;  font-family: Arial, Helvetica, sans-serif; font-size: 24px;}
-->
</style>
<form id="form3" name="form3" method="post" action="?logof=0">
      <table width="845" border="0">
        <tr>
          <th width="46" align="left" valign="bottom" class="textfieldtext">&nbsp;</th>
          <th width="133" height="24" align="left" valign="bottom" class="textfieldtext"><?php echo $xjmeno; ?></th>
          <td width="264" align="left" valign="bottom"><input name="meno" type="text" class="textfield" id="meno" /></td>
          <td width="384" align="left" valign="bottom">&nbsp;</td>
        </tr>
        <tr>
          <th align="left" class="textfieldtext">&nbsp;</th>
          <th height="59" align="left" valign="top" class="textfieldtext"><?php echo $xheslo; ?></th>
          <td align="left" valign="top"><input name="heslo" type="password" class="textfield" id="heslo" /></td>
          <td align="left" valign="bottom">&nbsp;</td>
        </tr>
        <tr>
          <th align="left" class="textfieldtext">&nbsp;</th>
          <th height="24" align="left" class="textfieldtext"><input name="Submit" type="submit" class="textfield" value="<?php echo $xok; ?>" /></th>
          <td align="left">&nbsp;</td>
          <td width="384" align="left" valign="bottom">&nbsp;</td>
        </tr>
      </table>
</form>