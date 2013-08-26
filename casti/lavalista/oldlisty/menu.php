 <?php
$odpoved =mysql_query("
select townsmes.meno, townsmes.id 
from townsmesuziv,townsmes
 where townsmesuziv.mesto = townsmes.id  AND
townsmesuziv.uzivatel = '".$_SESSION["id"]."' LIMIT 0,1");
while ($row = mysql_fetch_array($odpoved)) {
$_SESSION["mestoid"] = $row["id"];
}
mysql_free_result($odpoved);
?>
<strong>&nbsp;<a href="?dir=casti/admin/mesta.php"><?php echo $xaliames; ?></a><br />
<br />
&nbsp;<a href="?dir=casti/uvod/prehlad.php"><?php echo $xprehlad; ?></a><br />
<br />
&nbsp;<a href="?dir=casti/mapa/index.php"><?php echo $xmapa; ?></a><br />
<br />
&nbsp;<a href="?dir=casti/hraci/uzivatelia.php"><?php echo $xprofastat; ?></a><br />
<br />
&nbsp;<a href="?dir=casti/diskuse/fora.php"><?php echo $xforum; ?></a><br />
<br />
&nbsp;<a href="?dir=casti/stah/index.php"><?php echo $xgry; ?></a><br />
<br />
&nbsp;<a href="?logof=1"><?php echo $xlogof; ?></a><br />
</strong>