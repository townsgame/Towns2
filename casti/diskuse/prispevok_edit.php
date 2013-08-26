<?php
$tmp = hnet2("towns2_dis","SELECT nadpis, text FROM towns2_dis WHERE id='".$_MYGET["edit_forum"]."' AND meno='".$_SESSION["id"]."'");
$tmp = $tmp[0];
$nadpis = strip_tags($tmp[0]);
$text = strip_tags($tmp[1]);

?>
<form action="<?php echo gv("?dir=casti/diskuse/prispevky.php&amp;edit_forum=".$_MYGET["edit_forum"]); ?>" method="post" name="pridej" id="pridej">
  <table width="354" border="0">
    <tr>
      <th width="256" height="150" align="left" nowrap scope="col">
        Nadpis:
        <input name="nadpis_e" type="text" id="nadpis_e" value="<?php echo($nadpis); ?>" />
        <br />
       Text:<br/>
      <textarea name="pris_e" cols="40" rows="5" id="pris_e"><?php echo($text); ?></textarea>
      <label>
      <input type="submit" name="Submit" value="OK" />
      </label></th>
    </tr>
  </table>
</form>