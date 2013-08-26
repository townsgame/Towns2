<a href="?dir=casti/zpravy/index.php"> 
<?php
$docastny_objekt = new index("townszpr","SELECT COUNT(id) FROM townszpr WHERE komu = '1' AND precitane='0' AND ppp");
$docastna_premenna = $docastny_objekt->get("1");
$docastna_premenna = $docastna_premenna[0];
if($docastna_premenna == 0){ echo("Nemáte žádné nové přijaté zprávy."); }
if($docastna_premenna == 1){ echo("Máte jednu novou přijatou zprávu."); }
if($docastna_premenna > 1 and $docastna_premenna < 5){ echo("Máte ".$docastna_premenna." nové přijaté zprávy."); }
if($docastna_premenna > 5){ echo("Máte ".$docastna_premenna." přijatých nových zpráv."); }
?>
 &gt;&gt;</a>