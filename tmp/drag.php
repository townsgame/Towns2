<?php   
$root = "../";
require("../casti/funkcie/index.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
               
<html>

<head>
<link rel="shorcut icon" href="favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Animace</title>
	<script type="text/javascript">
		<!-- 
/// Drag&Drop System

	var dragobj;
	
	function m_down(event, object)
	{
	
		
		dragobj = object;      
		
		dragobj.style.zIndex = "100";	
		if(!dragobj.style.left) dragobj.style.left = "0px";
		if(!dragobj.style.top) dragobj.style.top = "0px";
			
		// Zapamatuj pozici mysi pri klintuti
		dragobj.clickX = event.clientX;  
		dragobj.clickY = event.clientY;
			
		// Zapamatuj pozici objektu pri klintuti
		dragobj.left = parseInt(dragobj.style.left); 
		dragobj.top = parseInt(dragobj.style.top);


	 	// Zacni sledovat pohyb mysi
    if(IE)
		{	
			document.attachEvent('onmousemove', m_move); 
			document.attachEvent('onmouseup', m_up); 		
		}
	
		if(NS || OPERA) 
		{
			document.addEventListener('mousemove', m_move, true);
			document.addEventListener('mouseup', m_up, true); 		
		}

return stopEvent(event);
}


function m_move(event)
{
	// Spocti rozdil mezi puvodni pozici mysi pri stisku a nynejsi pozici a zavolej proceduru objektu pro presun 
	dragobj.ondragdrop(event.clientX-dragobj.clickX,event.clientY-dragobj.clickY, event);
	return stopEvent(event);
}

function m_up(event)
{
	// Ukonci sledovani mysi
	if(IE)
	{
		document.detachEvent('onmousemove', m_move); 	
		document.detachEvent('onmouseup', m_up); 
		if(dragobj.ondragend)dragobj.ondragend(event);
	}

	if(NS || OPERA)
	{
		document.removeEventListener('mousemove', m_move, true); 
		document.removeEventListener('mouseup', m_up, true); 
		if(dragobj.ondragend)dragobj.ondragend(event);
	}

	return stopEvent(event);	
}


// Prirad objektu moznost presunu
function startDrag(what)
{
	if(what.style.position!="relative" && what.style.position!="absolute") {what.style.position="relative";}
	what.onmousedown = function(e) {if(e) {event=e;} m_down(event,what);}
	what.drag = 1;
}

// Odeber objektu moznost presunu 
function stopDrag(what)
{
	what.onmousedown = null;
	what.drag = 0;
}

// Zastav sireni udalosti
function stopEvent(event)
{
	if(IE) {event.cancelBubble = true; return false;}
	if(NS || OPERA) {event.stopPropagation(); event.preventDefault(); return false;}
}

//------

 IE= null; //IE5+
 NS= null; // Mozilla 0.9.1+
 OPERA = null; // Opera 7
 IE55 = null;
 IE5 = null;
 IE6=null;
	
 ua = navigator.appName.toLowerCase();

 if(ua.indexOf('explorer')>-1 && document.getElementById && document.childNodes && !document.addEventListener) {IE=true;}
 if(ua.indexOf('netscape')>-1 && document.getElementById && document.childNodes && !document.all) {NS=true;}
 if(ua.indexOf('opera')>-1 && document.getElementById && document.childNodes) {OPERA=true;}

 if(!IE && !NS && !OPERA && document.addEventListener) {OPERA=true;} 
 
 ua = navigator.userAgent.toLowerCase();
 
 if(IE && ua.indexOf('5.5')>-1) {IE55=true;}
 if(IE && ua.indexOf('5.0')>-1) {IE5=true;}
 if(IE && !IE5 && !IE55) {IE6=true;}

  
 function test_prohlizec()
 {

 if(!IE && !NS && !OPERA) 
  {
   self.location = "javascript: alert('Chyba v dokumentu "+self.location+" .Prohlizec nepodporuje metody standardu W3C DOM a neni mozno dokument spravne zobrazit.')";
  }
 
 }

 function test_metoda(name)
 {
   eval("what = "+name);
   if(!what) {self.location = "javascript: alert('Chyba v dokumentu "+self.location+" .Prohlizec nepodporuje metodu "+name+" a neni mozno dokument spravne zobrazit.')";}
 }  


//  -->

	</script>
    <style type="text/css">
<!--
#inner {
	position:absolute;
	left:157px;
	top:96px;
	width:300px;
	height:300px;
	z-index:1;
	overflow: hidden;

}
-->
    </style>
</head>

<body>

<div id="inner">
<div id="box1">

</div>
</div>
<table border="0" cellpadding="0" cellspacing="0">
<?php
$zoom=150;
$xc=1;
$yc=1;  
$odpoved =mysql_query/*echo*/("select townsmes.meno vlistnik,towns.cas,towns.obrazok,towns.rand,towns.xc,towns.yc,towns.vlastnik,towns.utokna,towns.zivot,townsuni.meno,townsuni.zivot zivotmax
from towns
left join townsuni ON towns.obrazok = townsuni.obrazok
left join townsmes ON towns.vlastnik = townsmes.id
WHERE towns.xc > ".(100)." AND towns.yc > ".($yc-1)." AND towns.xc < ".($xc+$zoom)." AND towns.yc < ".($yc+$zoom)." order by yc,xc");
while ($row = mysql_fetch_array($odpoved)) {

$farba = "FFFFFF";

//-----------------
if($row["vlastnik"] == $_SESSION["mestoid"]){
//$farba = "BBBBBB";
}

if($row["cas"] == "1"){ $rand = $row["rand"]; }
if($row["cas"] == "2"){ $rand = "6"; }
if($row["cas"] == "3"){ $rand = "7"; }

echo("<th bgcolor=\"#$farba\"><img src=\"../casti/jednotky/let/mapa/".$row["obrazok"]."/".$rand.".gif\" width=\"50\" height=\"50\"></th>");
if($row["xc"]-$xc+1 == $zoom){
echo("</tr><tr>");
}
}
mysql_free_result($odpoved);
?>
</table>

<script type="text/javascript">

if(IE || NS || OPERA)
{
	document.getElementById('box1').ondragdrop = function(posunx, posuny)
	{
		// Nastav novou pozici objektu
		this.style.left = (this.left + posunx)+"px";
		this.style.top  = (this.top + posuny)+"px";
	}
	document.getElementById('box1').ondragend= function() 
	{
	  //alert('Pretahl jste objekt o '+(parseInt(this.style.left)-this.left)+' pixelu horizontalne a '+(parseInt(this.style.top)-this.top)+' pixelu vertikalne');
	}
	
	startDrag(document.getElementById('box1'),1);
}
</script>

</body>
</html>