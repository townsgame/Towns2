<h1>pŘihlášeníf</h1>
<form id="form3" name="form3" method="post" action="<?php gv("?logof=0"); ?>">
<table width="484" border="0">
         <tr>
           <th width="68" height="31" align="left" valign="bottom"><?php echo $xjmeno; ?></th>
           <td width="242" align="left" valign="bottom"><input name="meno" type="text" id="meno" /></td>
         </tr>
         <tr>
           <th align="left"><?php echo $xheslo; ?></th>
           <td align="left"><input name="heslo" type="password" id="heslo" /></td>
         </tr>
         <tr>
           <td height="26" colspan="2" align="left"><input type="submit" name="Submit" value="<?php echo $xok; ?>" /></td>
         </tr>
         <tr><td height="26" colspan="2" align="left">zaregistrovat se</td></tr>
         <tr><td height="26" colspan="2" align="left"><?php echo $xziskatzap; ?></td></tr>
       </table>
       </form>