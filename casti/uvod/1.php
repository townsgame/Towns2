<img src="casti/reklama/tutorial.jpg" alt="registrace" width="575" border="0" usemap="#Map" />
<map name="Map" id="Map"><area shape="rect" coords="395,15,539,51" href="<?php echo gv("?dirn=3&amp;glob_sc=3"); ?>" target="_top" />
</map>
<br />
<h1>pŘihlášení</h1>
<form id="form3" name="form3" method="post" action="<?php gv("?logof=0"); ?>">
<table width="484" border="0">
         <tr>
           <th width="68" height="31" align="left" valign="bottom">Jméno: </th>
           <td width="242" align="left" valign="bottom"><?php zadajhraca(1,"",1); /*<input name="meno" type="text" id="meno" style="width:150px;"/>*/ ?></td>
         </tr>
         <tr>
           <th align="left">Heslo: </th>
           <td align="left"><input name="heslo" type="password" id="heslo" style="width:150px;"/></td>
         </tr>
         <tr>
           <td height="26" colspan="2" align="left"><input type="submit" name="Submit" value="Přihlásit se" /></td>
         </tr>
         <tr><td height="26" colspan="2" align="left"><a href="<?php echo gv("?dirn=3&amp;glob_sc=3"); ?>">Zaregistrovat se</a></td></tr>
         <tr><td height="26" colspan="2" align="left"> </td></tr>
  </table>
</form>
