<style type="text/css">
<!--
.a {color: #FFCC00; font-family: Arial, Helvetica, sans-serif; font-size: 12px;}
-->
</style>
<form id="form4" name="form4" method="post" action="?logof=0">
      <table width="574" border="0">
        <tr>
          <th width="119" align="left" class="a"><?php echo $xjmeno; ?></th>
          <td width="445" align="left" valign="top" class="a">
          <input name="menor" type="text" id="menor" value="<?php echo $_POST["menor"]; ?>" />
          </td>
        </tr>
        <tr>
          <th align="left" class="a"><?php echo $xheslo; ?></th>
          <td align="left" class="a">
          <input name="heslor" type="password" id="heslor" value="<?php echo $_POST["heslor"]; ?>" />
          </td>
        </tr>
        <tr>
          <th align="left" class="a"><?php echo $xhesloznovu; ?></th>
          <td align="left" class="a">
          <input name="heslo2r" type="password" id="heslo2r" value="<?php echo $_POST["heslo2r"]; ?>" />
          </td>
        </tr>
        <tr>
          <th align="left" class="a"><?php echo $xmail; ?></th>
          <td align="left" class="a">
          <input name="mailr" type="text" id="mailr" value="<?php echo $_POST["mailr"]; ?>" />
          </td>
        </tr>
        <tr>
          <th align="left" class="a"><?php echo $xjmenomesta; ?></th>
          <td align="left" class="a">
          <input name="mestor" type="text" id="mestor" value="<?php echo $_POST["mestor"]; ?>" />
          </td>
        </tr>
        <tr>
          <th colspan="2" align="left" class="a"><?php echo $xzobrazovatmail; ?>
            <label>
            <input name="zmailr" type="checkbox" class="a" id="zmailr" value="1" />
              </label>
            <label></label>
          </th>
        </tr>
        <tr>
          <th height="29" colspan="2" align="left" class="a">
            <textarea name="textarea" cols="50" rows="8" readonly="readonly"><?php echo $xpravidla; ?></textarea>
          </th>
        </tr>
        <tr>
          <th colspan="2" align="left" class="a">
            <label>
            <input name="pravidlar" type="checkbox" id="pravidlar" value="1" />
            <?php echo $xprectenapravidla; ?></label>
          </th>
        </tr>
        <tr>
          <th colspan="2" align="left" valign="top" class="a"><?php echo $xkod; ?><img src="obrazok.php?kod=<?php $_SESSION["obrazokk"] = rand(1000,9999); echo $_SESSION["obrazokk"]; ?>" width="52" height="25" border="2" />
                <label>
                <input name="kod" type="text" class="a" id="kod" />
                </label>
            <label></label>
          </th>
        </tr>
        <tr>
          <th colspan="2" align="left" class="a">
            <label>
            <input type="submit" name="Submit2" value="<?php echo $xtlreg; ?>" />
            <?php echo $xvarovani; ?></label>
          </th>
        </tr>
      </table>
      </form>
