<a href="<?php gv("?dir=casti/suroviny/index.php&amp;submenu=3"); ?>"><?php echo $GLOBALS["svymenad1"]; ?></a>
<form id="form1" name="form1" method="post" action="<?php gv("?dir=casti/suroviny/index.php&amp;submenu=3"); ?>">
<?php echo $GLOBALS["svymenad2"]; ?>:
<table border="0">
  <tr><td><input name="jaka1" type="radio" value="1" checked="checked" /></td><td><?php zadajsurku("prachy","dífult","</td><td>"); ?></td></tr>
  <tr><td><input name="jaka1" type="radio" value="2" /></td><td><?php zadajsurku("jedlo","dífult","</td><td>"); ?></td></tr>
  <tr><td><input name="jaka1" type="radio" value="3" /></td><td><?php zadajsurku("kamen","dífult","</td><td>"); ?></td></tr>
  <tr><td><input name="jaka1" type="radio" value="4" /></td><td><?php zadajsurku("zelezo","dífult","</td><td>"); ?></td></tr>
  <tr><td><input name="jaka1" type="radio" value="5" /></td><td><?php zadajsurku("drevo","dífult","</td><td>"); ?></td></tr>
</table><?php echo $GLOBALS["svymenad3"]; ?>:
<table border="0">
  <tr><td><input name="jaka2" type="radio" value="1" checked="checked" /></td><td><?php zadajsurku("prachy","999999","</td><td>"); ?></td></tr>
  <tr><td><input name="jaka2" type="radio" value="2" /></td><td><?php zadajsurku("jedlo","999999","</td><td>"); ?></td></tr>
  <tr><td><input name="jaka2" type="radio" value="3" /></td><td><?php zadajsurku("kamen","999999","</td><td>"); ?></td></tr>
  <tr><td><input name="jaka2" type="radio" value="4" /></td><td><?php zadajsurku("zelezo","999999","</td><td>"); ?></td></tr>
  <tr><td><input name="jaka2" type="radio" value="5" /></td><td><?php zadajsurku("drevo","999999","</td><td>"); ?></td></tr> 
</table>
<button name="OK" value="OK" type="submit"><?php echo $GLOBALS["sposlat1"]; ?></button>
</form>