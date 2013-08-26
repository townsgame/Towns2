<form action="<?php echo gv("?dir=casti/diskuse/index.php"); ?>" method="post" name="pridej" id="pridej">
  <table width="354" border="0">
    <tr>
      <th width="256" height="150" align="left" nowrap scope="col">
        Nadpis:
        <input name="nadpis" type="text" id="nadpis" />
        <br />
        Opište kód z obrázku: <img src="obrazok.php" width="52" height="25" border="2" /> <input name="kodd" type="text" id="kodd" />
        <br />
        Text:<br/>
      <textarea name="pris" cols="40" rows="5" id="pris"></textarea>
      <label>
      <input type="submit" name="Submit" value="Odešli" />
      </label></th>
    </tr>
  </table>
</form>