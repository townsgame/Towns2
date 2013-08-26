<SCRIPT LANGUAGE="JavaScript">
<!--
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width=660,height=500');");
}
-->
</script>
<table>
<tr>
<?php
$url = "casti/obrazky/data/";
$i = 1;
foreach(glob($url."*.png") as $filename){
$popis = substr($filename,strlen($url));
$popis = substr($popis,0,strlen($popis)-4);
$popis = file_get_contents("casti/obrazky/txt/".$popis.".txt");
echo('<td><hr /><a  HREF="javascript:popUp(\''.$filename.'\')" ><img src="'.$filename.'" width="160" height="120" alt="'.$popis.'" /><br />
<b>'.$popis.'</b></a></td>');
if($i==3){ echo("</tr><tr>"); $i = 0; }
$i = $i+1;
}
?>
</tr>
</table>
