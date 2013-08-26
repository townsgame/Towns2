<?
ini_set("max_execution_time","999");
/*
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>cash map</title>
</head>
<body>
<script>
       for(var y=1;y<251;y=y+50){
		 for(var x=1;x<251;x=x+50){
             document.write("<img border=\"1\" width=\"100\" height=\"100\" src=\"http://2.towns.cz/mapao/index.php?xc="+x+"&amp;yc="+y+"\" />");
       }
       document.write("<br/>");  
       }
</script>
</body>
</html>
*/
for($y=1;$y<251;$y=$y+50){
for($x=1;$x<251;$x=$x+50){
unlink("xc_".$x."yc_".$y.".png");
file("http://2.towns.cz/mapao/index.php?xc=".$x."&yc=".$y);
echo("X");
}
echo("<br/>");  
}
file("http://2.towns.cz/mapao/v.php");
//unlink("xc_1yc_1.png");
?>