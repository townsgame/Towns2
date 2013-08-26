<?php
if($_POST["text"]){ 
mysql_query("UPDATE towns SET napis = '".$_POST["text"]."' WHERE xc=$xc AND yc=$yc");
}
$odpoved =mysql_query("select napis from towns where xc = ".$xc." AND yc = ".$yc);
while ($row = mysql_fetch_array($odpoved)) {
$napis = $row["napis"];
}
mysql_free_result($odpoved);
?>
	  <form id="form1" name="form1" method="post" action="<?php echo($_SERVER['REQUEST_URI']); ?>">
          <textarea name="text" cols="20" rows="10"><?php echo($napis); ?></textarea>
        <br />
		<input name="změň" type="submit" id="změň" value="OK" />
</form>