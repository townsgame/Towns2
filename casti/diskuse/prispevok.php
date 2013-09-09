<form action="<?php echo gv("?dir=casti/diskuse/prispevky.php"); ?>" method="post" name="pridej" id="pridej">
  <table width="354" border="0">
    <tr>
      <th width="256" height="150" align="left" nowrap scope="col">
        <?php echo $GLOBALS["fprispevok1"]; ?>:
        <input name="nadpis" type="text" id="nadpis" />
        <br />
       <?php echo $GLOBALS["fprispevok2"]; ?>:<br />
      <textarea name="pris" cols="40" rows="5" id="pris"></textarea>
      <label>
      <input type="submit" name="Submit" value="<?php echo $GLOBALS['fprispevok3']; ?>" />
      </label></th>
    </tr>
  </table>
</form>