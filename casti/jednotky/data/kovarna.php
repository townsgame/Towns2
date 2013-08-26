<?php
die("Tato budova ještě není plně funkční.")
$odpoved =mysql_query("select sipy,kopi,koule,naboje typ from townsspo where hrac1 = '".$_SESSION["uzivatel"]."' OR hrac2 = '".$_SESSION["uzivatel"]."'");
while ($row = mysql_fetch_array($odpoved)) {

}
mysql_free_result($odpoved);
?>

<p>V kovárně si můžete vyrábět munici pro vojáky.</p>
<p>Momentálně máte:<br />
  xx šípů <br />
  xx kopí <br />
  xx koulí do kanonu <br />
  xx nábojů</p>
<form id="form1" name="form1" method="post" action="">
  vyrobit munici:<br />
  <label>
  <input type="text" name="textfield" />
  šípů</label>
  <br />
  <input type="text" name="textfield2" />
  kopí<br />
  <input type="text" name="textfield3" />
  koulí do kanonu<br />
  <input type="text" name="textfield4" />
 nábojů<br />
 <label>
 <input type="submit" name="Submit" value="vyrobit" />
 </label>
</form>
<p><br />
ceny:</p>


<table width="10" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"><table width="153" border="0" bgcolor="#CCCCCC">
      <tr>
        <th width="48" scope="col">co</th>
        <th colspan="2" align="left" scope="col">cena</th>
      </tr>
      <tr>
        <th colspan="3" scope="col"><hr /></th>
      </tr>
      <tr>
        <th align="center" scope="col">šíp</th>
        <td width="41" align="left" scope="col"><img src="casti/suroviny/desing/zelezo.jpg" alt="prachy" width="20" height="20" border="1" /> 1</td>
        <td width="50" align="left" scope="col"><img src="casti/suroviny/desing/drevo.jpg" alt="prachy" width="20" height="20" border="1" /> 1</td>
      </tr>
      <tr>
        <th align="center">kopí</th>
        <td align="left"><img src="casti/suroviny/desing/kamen.jpg" alt="prachy" width="20" height="20" border="1" /> 1</td>
        <td align="left"><img src="casti/suroviny/desing/drevo.jpg" alt="prachy" width="20" height="20" border="1" /> 1</td>
      </tr>
      <tr>
        <th align="center">koule</th>
        <td align="left"><img src="casti/suroviny/desing/kamen.jpg" alt="prachy" width="20" height="20" border="1" /> 9 </td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <th align="center">náboj</th>
        <td align="left"><img src="casti/suroviny/desing/zelezo.jpg" alt="prachy" width="20" height="20" border="1" /> 5</td>
        <td align="left">&nbsp;</td>
      </tr>
    </table></th>
  </tr>
</table>