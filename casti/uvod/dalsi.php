<a href="http://2.towns.cz/casti/upload/" target="_blank">Towns upload<a>
<?php if($_SESSION["id"] and $_SESSION["typ"]!=7){ ?><br/><a href="http://2.towns.cz/admin/uloha.php<?php echo(gv("?co=bcreate&amp;vakt=1")); ?>" target="_blank">Přidat budovu<a><!--a--><?php } ?>
<?php if($_SESSION["id"]=="1"){ ?>
<br/><a href="<?php echo(gv("?dir=admin/index.php")); ?>" >Admin<a>
<?php } ?>