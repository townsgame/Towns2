<p>
<?php
if ($_GET["otazka"]){
$odpoved =mysql_query("select hraci from townsank");
while ($row = mysql_fetch_array($odpoved)) {
$hraci = $row["hraci"];
$autor = $row["autor"];
}
mysql_free_result($odpoved);

if(!strstr($hraci, "p".$_SESSION["id"]."p")){

toload($_SESSION["id"],1,10);

mysql_query("UPDATE townsank SET p".$_GET["odpoved"]."=p".$_GET["odpoved"]."+1 WHERE id=".$_GET["otazka"]);
mysql_query("UPDATE townsank SET hraci=CONCAT(hraci,".$_SESSION["id"].",'p') WHERE id=".$_GET["otazka"]);
}else{
		echo "Už jste hlasoval!!!";
		echo "<br />";
}
}

$odpoved =mysql_query("select * from townsank WHERE schvaleno=1");
$num = rand(1,mysql_num_rows($odpoved)); 
while ($row = mysql_fetch_array($odpoved)) {
if($num==1){
$idd = $row["id"];
$hraci = $row["hraci"];
$otazka = $row["otazka"];
$o1 = $row["o1"];
$p1 = $row["p1"];
$o2 = $row["o2"];
$p2 = $row["p2"];
$o3 = $row["o3"];
$p3 = $row["p3"];
$o4 = $row["o4"];
$p4 = $row["p4"];
$o5 = $row["o5"];
$p5 = $row["p5"];
$autor = profil($row["autor"]);
}
$num = $num-1;
}
mysql_free_result($odpoved);


		echo "<b>".$otazka."</b>";
		echo "<br />";
		echo "</p>";
		
		$a = $p1 + 0.001;
		$b = $p2 + 0.001;
		$c = $p3 + 0.001;
		$d = $p4 + 0.001;
		$e = $p5 + 0.001;
		$percento = 130/($a+$b+$c+$d+$e);
		$a = $a*$percento;
		$b = $b*$percento;
		$c = $c*$percento;
		$d = $d*$percento;
		$e = $e*$percento;
		
		if ($o1) {
		echo "<p>";
		echo "<a href=\"?otazka=".$idd."&amp;odpoved=1\">";
		echo $o1;
		echo " <br /><img src=\"casti/desing/cierne.jpg\" width=\"".$a."\" height=\"10\" border=\"0\" />";
		echo "</a>";
		echo "</p>";
		}
		
		if ($o2) {
		echo "<p>";
		echo "<a href=\"?otazka=".$idd."&amp;odpoved=2\">";
		echo $o2;
		echo " <br /><img src=\"casti/desing/cierne.jpg\" width=\"".$b."\" height=\"10\" border=\"0\" />";
		echo "</a>";
		echo "</p>";
		}
		
		if ($o3) {
		echo "<p>";
		echo "<a href=\"?otazka=".$idd."&amp;odpoved=3\">";
		echo $o3;
		echo " <br /><img src=\"casti/desing/cierne.jpg\" width=\"".$c."\" height=\"10\" border=\"0\" />";
		echo "</a>";
		echo "</p>";
		}
		
		if ($o4) {
		echo "<p>";
		echo "<a href=\"?otazka=".$idd."&amp;odpoved=4\">";
		echo $o4;
		echo " <br /><img src=\"casti/desing/cierne.jpg\" width=\"".$d."\" height=\"10\" border=\"0\" />";
		echo "</a>";
		echo "</p>";
		}
		
		if ($o5) {
		echo "<p>";
		echo "<a href=\"?otazka=".$idd."&amp;odpoved=5\">";
		echo $o5;
		echo " <br /><img src=\"casti/desing/cierne.jpg\" width=\"".$e."\" height=\"10\" border=\"0\" />";
		echo "</a>";
		echo "</p>";
		}
?> 
<br />
vytvořil: <?php echo $autor; ?><br />
<a href="?dir=casti/uvod/prank.php">přidat anketu </a>
