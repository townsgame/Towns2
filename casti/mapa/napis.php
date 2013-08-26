<?php
if($_POST["text"]){ 
if($pravo == 1){ 
mysql_query("UPDATE towns SET napis = '".$_POST["text"]."' WHERE xc=$xc AND yc=$yc");
}
}
$odpoved =mysql_query("select napis from towns where xc = ".$xc." AND yc = ".$yc);
while ($row = mysql_fetch_array($odpoved)) {
$napis = $row["napis"];
}
mysql_free_result($odpoved);
?>
	  <form id="form1" name="form1" method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
        <label>
          <textarea name="text" cols="20" rows="10" <?php if($pravo == 0){ echo("readonly=\"readonly\""); } ?>><?php echo($napis); ?></textarea>
        </label>
        <br />
        <label>
		<?php if($pravo == 1){ echo("<input name=\"změň\" type=\"submit\" id=\"změň\" value=\"OK\" />"); } ?>
        </label>
</form>