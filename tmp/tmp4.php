<?php 
require("casti/funkcie/index.php");

function deletecash($tabulka){
$files = glob("index/$tabulka-*.txt");
if($files){
foreach ($files as $filename) {
unlink($filename);
}
}
}
class index {
private $tabulka = "";
private $dotaz = "";
private $kod = "";
private $zaciatok = "";
private $koniec = "";
private $nic = "";
private $pridavok = "";

function __construct($tabulka,$dotaz,$kod,$zaciatok="",$koniec="",$nic="",$pridavok="") {
$this->tabulka = $tabulka;
$this->dotaz = $dotaz;
$this->kod = $kod;
$this->zaciatok = $zaciatok;
$this->koniec = $koniec;
$this->nic = $nic;
$this->pridavok = $pridavok;
}

function show($limit,$where) {

if(!file_exists("index/".$this->tabulka."-".md5($this->dotaz."$where LIMIT ".$limit.$this->pridavok).".txt")){
//echo("dd");
$odpoved = mysql_query(str_replace("ppp",$where,$this->dotaz." LIMIT ".$limit));
if(mysql_num_rows($odpoved) != 0){
eval("\$stream = \$stream.(\"$this->zaciatok\");");
while ($row = mysql_fetch_array($odpoved)) {
eval($this->pridavok);
eval("\$stream = \$stream.(\"$this->kod\");");
}
eval("\$stream = \$stream.(\"$this->koniec\");");
mysql_free_result($odpoved);
}else{
eval("\$stream = \$stream.(\"$this->nic\");");
}
file_put_contents("index/".$this->tabulka."-".md5($this->dotaz."$where LIMIT ".$limit.$this->pridavok).".txt",$stream);
}
echo(file_get_contents("index/".$this->tabulka."-".md5($this->dotaz."$where LIMIT ".$limit.$this->pridavok).".txt"));
}
}




//$tabulka,$dotaz,$kod,$zaciatok,$koniec,$nic,$pridavok
$object_diskuse = new index("townstem","SELECT tema,id,(SELECT count(id) from townsdis WHERE tema = townstem.id) from townstem WHERE ppp order by id desc","<a href=\\\"?dir=casti/diskuse/prispevky.php&tema=\".\$row[\"id\"].\"\\\">\".\$row[\"tema\"].\"</a>(\".\$row[2].\")<br />");
$b->show("0,5","1");
deletecash("townstem"); 

?>