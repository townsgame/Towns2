<?php
/*
foreach (glob("casti/jednotky/data3/*.php") as $filename) {
    echo "$filename<br />";
}*/    
foreach( hnet2("towns2","SELECT DISTINCT(obrazok),(SELECT " . $GLOBALS["name"] . " from towns2_uni WHERE towns2_uni.obrazok=towns2.obrazok) FROM towns2 WHERE vlastnik='".$_SESSION["id"]."' ORDER BY obrazok") as $row) {
//$url="casti/jednotky/data3/".$row["obrazok"].".php";
//echo $url."<br />";
//if(file_exists($url)){
if($row["obrazok"]!="0" and $row[1]){
echo "<b>".$row[1]."</b><br />";
}
}
?>