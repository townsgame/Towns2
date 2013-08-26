<?php
foreach(hnet2("towns2","SELECT * FROM towns2 WHERE RAND()>0.99 AND obrazok='les'") as $row){
echo("(".$row["xc"].",".$row["yc"].")");
}
?>