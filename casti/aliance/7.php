<?php eval(file_get_contents("casti/jazyk/cz.txt")); ?>
<p><strong><?php echo $xpopisali; ?></strong></p>
<?php
if($_POST["popis"]){
mysql_query("UPDATE towns2_ali SET popis='".$_POST["popis"]."' WHERE id='".$_SESSION["aliance"]."'");
dc("towns2_ali");
}
?>
<form id="form2" name="form2" method="post" action="<?php echo gv("?submenu=7"); ?>">
  <label>
  <textarea name="popis" cols="40" rows="20" id="popis"><?php echo(hnet("towns2_ali","select popis from towns2_ali WHERE ppp AND id='".$_SESSION["aliance"]."'")); ?></textarea>
  </label>
  <br />
  <label>
  <input type="submit" name="Submit2" value="<?php echo $xok; ?>" />
  </label>
</form>