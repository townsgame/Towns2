    <script type="text/javascript">
        <!-- 
                
        function info(xc,yc,obrazok,utokna,zivot,zivotmax,vlastnik,uroven) 
        {  
            document.show.xc.value = xc 	
            document.show.yc.value = yc
            if(obrazok != 'žádná'){
            document.show.obrazok.value = obrazok 
            document.show.utokna.value = utokna
            document.show.zivot.value = zivot
            document.show.zivotmax.value = zivotmax
            document.show.vlastnik.value = vlastnik
            document.show.uroven.value = uroven
					  }else{
            document.show.obrazok.value = '' 
            document.show.utokna.value = ''
            document.show.zivot.value = ''
            document.show.zivotmax.value = ''
            document.show.vlastnik.value = ''
            document.show.uroven.value = 	''
            }
        }
        function off(a){
            document.getElementById(a).src = "test/polickohovno.png";
        }
        function on(a){
            document.getElementById(a).src = "test/policko.png";
        }
        coakce=1;
        var coco = new Array();
        var coxc = new Array();
 		  var coyc = new Array();
 		  copocet=0;
        function postavit(){
            document.getElementById("coakce").innerHTML = "Pro <b>postavení</b> budovy klikněte na mapu.";
				coakce=1;        
        }
        function zbourat(){
            document.getElementById("coakce").innerHTML = "Pro <b>zbourání</b> budovy klikněte na mapu.";
            coakce=2;
        }
        function roz(){
            document.getElementById("coakce").innerHTML = "Pro <b>rozšíření</b> budovy klikněte na mapu.";
            coakce=3;
        }
        function zvy(){
            document.getElementById("coakce").innerHTML = "Pro <b>zvýšení</b> budovy klikněte na mapu.";
            coakce=4;
        }
        function utok(){
            document.getElementById("coakce").innerHTML = "Pro <b>útok</b> na budovu klikněte na mapu.";
            coakce=4;
        }
        
        function zmenabudovy(selObj){ 
		  eval("budova='"+selObj.options[selObj.selectedIndex].value+"'");
  		  //alert(budova);
		  }
        
        function coakcex(xcx,ycx){
        if(coakce==1 && budova==""){}else{
        if(coakce==2){
        coco[copocet] = 0;
        }
        if(coakce==1){
        coco[copocet] = budova;
        }
        if(coakce==3){
        location.replace("<?php echo gv("?dir=casti/mapa/roz.php"); ?>&xc="+xcx+"&yc="+ycx);	
        }
        if(coakce==4){
        location.replace("<?php echo gv("?dir=casti/utoky/utoky.php"); ?>&xc="+xcx+"&yc="+ycx);	
        }
        coxc[copocet] = xcx;
        coyc[copocet] = ycx;
        //alert(coakce);
        //alert(xc);
		   //alert(yc);
         copocet = copocet+1;
         cozobrazz();
        }
        }
        
        
        function cozobrazz(){ 
			//for(i=0;pocet==0;i++){
			//document.getElementById("coakce2").innerHTML = document.getElementById("coakce2").innerHTML+"<br/>"+coco[i];
			//}
			if(copocet == 1){ document.getElementById("coakce2").innerHTML = copocet+" budova k postavení nebo zbourání"; }
			if(copocet != 1 && copocet<5){ document.getElementById("coakce2").innerHTML = copocet+" budovy k postavení nebo zbourání"; }
			if(copocet > 4){ document.getElementById("coakce2").innerHTML = copocet+" budov k postavení nebo zbourání"; }
			document.getElementById("coakce2").innerHTML = document.getElementById("coakce2").innerHTML+"<br/><a href=\"<?php echo gv("?dir=casti/mapa/dragzprac.php"); ?>&amp;coco="+coco+"&amp;coxc="+coxc+"&amp;coyc="+coyc+"\"><b>&gt;&gt;dále&gt;&gt;</b></a>"
		  }
        -->
    </script>

        <div style="visibility: hidden;" id="domapy">
        <div style="position:absolute; left:0px; top:0px; z-index:100;"><img src="test/polickohovno.png" width="570" height="400" usemap="#unipole" /></div>
        <div style="position:absolute; left:112px; top:148px; z-index:100;">
        <div style="position:absolute; left:310px; top:1px; z-index:1;"><a onClick="zmen(0,-10);"><img src="casti/mapa/desing/2.png" width="44" height="23" /></a></div>
		  <div style="position:absolute; left:310px; top:191px; z-index:1;"><a onClick="zmen(10,0);"><img src="casti/mapa/desing/4.png" width="44" height="23" /></a></div>
		  <div style="position:absolute; left:1px; top:191px; z-index:1;"><a onClick="zmen(0,10);"><img src="casti/mapa/desing/6.png" width="44" height="23" /></a></div>
		  <div style="position:absolute; left:1px; top:1px; z-index:1;"><a onClick="zmen(-10,0);"><img src="casti/mapa/desing/8.png" width="44" height="23" /></a></div>
		  </div>
		  </div>
        <div align="center">
        <div style="position:relative; width:570px; height:400px; background-color: #000000; overflow: hidden;" id="mapa">mapa se načítá</div> 
        <div style="position:relative; width:570px; height:130px; background-color: #bbbbbb; overflow: hidden;"><table width="560" height="130" border="0"><tr><td width="200" align="left" valign="top">
            <form name="show"> 
            <b>x:&nbsp;&nbsp;&nbsp;&nbsp;</b>
            <input size="3" name="xc" style="border:0px solid #FFFFFF; background-color: #bbbbbb;"/><b>y:&nbsp;&nbsp;&nbsp;&nbsp;</b> <input size="3" name="yc" style="border:0px solid #FFFFFF; background-color: #bbbbbb;"/>
            <br />
            <b>vlastník:&nbsp;&nbsp;&nbsp;&nbsp;<input name="vlastnik" id="vlastnik" size="14" style="border:0px solid #FFFFFF; background-color: #bbbbbb;" /></b>
            <br/> 
            <b>budova:&nbsp;&nbsp;&nbsp;&nbsp;<input size="14" name="obrazok" style="border:0px solid #FFFFFF; background-color: #bbbbbb;"/>  </b> 
            <br/>   
            <b>život:&nbsp;&nbsp;&nbsp;&nbsp;</b> <input size="3" name="zivot" style="border:0px solid #FFFFFF; background-color: #bbbbbb;"/> / <input size="3" name="zivotmax" style="border:0px solid #FFFFFF; background-color: #bbbbbb;"/>  <br/>
            <b>obrana:&nbsp;&nbsp;&nbsp;&nbsp;</b> <input size="4" name="utokna" style="border:0px solid #FFFFFF; background-color: #bbbbbb;"/><br/>
            <b>úroveň:&nbsp;&nbsp;&nbsp;&nbsp;</b> <input size="4" name="uroven" style="border:0px solid #FFFFFF; background-color: #bbbbbb;"/>
</td><td align="left" valign="top">

<form id="form" name="form" action="?dir=casti/mapa/drag.php&glob_sc=1" method="POST">
<b><a onClick="postavit();"><u>Postavit</u></a>

<select name="budova" id="budova" onchange="zmenabudovy(this)">
<option value="" selected="selected">---</option>
<?php
foreach(hnet2("towns2_uni","SELECT meno,obrazok,kamen,drevo,ps,autor FROM towns2_uni WHERE ppp AND akce != '0' AND obrazok != '0' AND schvelene=1 ORDER by meno") as $row){
$ne=0;
if($row["ps"]==1 and $row["autor"]!=$_SESSION["id"]){ $ne=1; }
if($row["ps"]==2 and $row["autor"]!=$_SESSION["id"]){ $ne=1; }
//if($_SESSION["id"]=="1"){ $anoadmin=1; }
if(!$ne){
echo("
");
$ne=0;
//---------------------------------
$budovap = hnet("towns2_uni","SELECT budovap FROM towns2_uni WHERE obrazok='".$row["obrazok"]."'");
if($budovap){
$budoval = hnet("towns2_uni","SELECT budoval FROM towns2_uni WHERE obrazok='".$row["obrazok"]."'");
$budoval2 = budoval($budovap);
if($budoval > $budoval2){
$ne = 1;
}}
//---------------------------------
if(!zsur("kamen",$row["kamen"])){ $ne = 1; }
if(!zsur("drevo",$row["drevo"])){ $ne = 1; }
//---------------------------------
if(!$ne or $_SESSION["id"]==1){
echo("<option value=\"".$row["obrazok"]."\">".$row["meno"]."</option>");
}
}
}
?>
</select>
 | <a onClick="zbourat();"><u>Zbourat</u></a> | <a onClick="roz();"><u>Rozšířit</u></a> | <a onClick="utok();"><u>Útok</u></a> <!-- | <a onClick="zvy();"><u>zvýšit o</u> <input type="text" size="3" name="jmeno" value="10"></a> --></b><br/>
<div id="coakce">Pro <b>postavení</b> budovy klikněte na mapu.</div>
<hr/>
<div id="coakce2"></div>
</form>

</td></tr></table></div></div>
    <script>
        function poslat(velkost,zoom,xc,yc){
            vv = 50*velkost;
            mv = 25*velkost;
        <?php sleep(1); ?>
                var ajax = (window.XMLHttpRequest ? new XMLHttpRequest() : (window.ActiveXObject ? new ActiveXObject("Microsoft.XMLHTTP") : false));
                if(!ajax){
                    alert("Tak tady to nepoběží!");
                    return true;
                }
                ajax.onreadystatechange= function () {zpracuj(ajax,zoom,xc,yc); } ;
                ajax.open("GET", "dat.php?zoom="+zoom+"&xc="+xc+"&yc="+yc, true);
                ajax.send(null);
                return false
            }
            function zpracuj(ajax,zoom,xc,yc){
                var txt;
                if (ajax.readyState == 4){
                    if(ajax.status == 200 || ajax.status==0){
                        txt=ajax.responseText;
                        if(txt == "neplatne zadani_xc+"){ alert("Přesáhli jste okraj mapy "+ xc+"/"+yc+"."); xc = xc-10;}
                        if(txt == "neplatne zadani_yc+"){ alert("Přesáhli jste okraj mapy "+ xc+"/"+yc+"."); yc = yc-10;}
                        if(txt == "neplatne zadani_xc-"){ alert("Přesáhli jste okraj mapy "+ xc+"/"+yc+"."); xc = xc+10;}
                        if(txt == "neplatne zadani_yc-"){ alert("Přesáhli jste okraj mapy "+ xc+"/"+yc+"."); yc = yc+10;}
                        //---------------------------------------------------------------------------------------------------------------
        
        
                        //dat1 - 2prvni pismena obrazok - 2
                        //dat2 - zivot - 4
                        //dat3 - utok - 4
                        //dat4 - vlastnik - 4
                        //xc=1;
                        //yc=1;
                        //zoom=5;
                        dxc = xc;
                        dyc = yc;
                        xc= xc - 1;
                        yc= yc - 1;
                        eval(txt);
                        cash = "";
                        map = "";
                        //evaled = "alert('hura')";
                        //eval(evaled);
        
        
                        for(var i=0;dat1.charAt(i+1);i=i+2){
                            pozadie="";
                            zivot="";
                            utokna="";
                            zkratka="";
                            foruser="";
                            zivotmax="";
                            vlastnik="";
                            vlastnikforuser="";
                            size="1";
                            rand="1";
                            uroven="1";
                            //---------------------------------------------
                            pozadie = dat5.charAt(i)+""+dat5.charAt(i+1);
                            //----------------------------------------
                            zivot = dat2.charAt(i*2)+""+dat2.charAt(i*2+1)+""+dat2.charAt(i*2+2)+""+dat2.charAt(i*2+3);
                            zivot = zivot-0;
                            //----------------------------------------
                            utokna = dat3.charAt(i*2)+""+dat3.charAt(i*2+1)+""+dat3.charAt(i*2+2)+""+dat3.charAt(i*2+3);
                            utokna = utokna-0;
                            //----------------------------------------
                            uroven = dat7.charAt(i*2)+""+dat7.charAt(i*2+1)+""+dat7.charAt(i*2+2)+""+dat7.charAt(i*2+3);
                            uroven = uroven-0;
                            //----------------------------------------
                            level = dat8.charAt(i*2)+""+dat8.charAt(i*2+1)+""+dat8.charAt(i*2+2)+""+dat8.charAt(i*2+3);
                            level = level-0-500;
                            //----------------------------------------
                            rand = dat6.charAt(i)+""+dat6.charAt(i+1);
                            //cash = cash + rand;
                            if(rand.charAt(0) == "0"){ rand = rand.charAt(1); }
                            //----------------------------------------
                            zkratka = dat1.charAt(i)+""+dat1.charAt(i+1);
                             <?php $object_a = new index("towns2_uni","SELECT obrazok,meno,zivot,size FROM towns2_uni WHERE ppp","if(zkratka == \\\"\".substr(\$row[\"obrazok\"].\"0\",0,2).\"\\\"){ zkratka = \\\"\".\$row[\"obrazok\"].\"\\\"; foruser=\\\"\".\$row[\"meno\"].\"\\\"; zivotmax=\\\"\".\$row[\"zivot\"].\"\\\"; size=\\\"\".\$row[\"size\"].\"\\\";} "); $object_a->show("0,9999","1"); ?>
                             if(zkratka == "do"){ zkratka = "0"; foruser="neco"; zivotmax="0"; size="0"; }                            
                             //----------------------------------------
                            vlastnik = dat4.charAt(i*2)+""+dat4.charAt(i*2+1)+""+dat4.charAt(i*2+2)+""+dat4.charAt(i*2+3);
                            vlastnikforuser = "";
                            <?php $object_a = new index("towns2_uziv","SELECT id,meno FROM towns2_uziv WHERE ppp","if(vlastnik == \\\"\".substr(\"000\".\$row[\"id\"],-4).\"\\\"){ vlastnikforuser = \\\"\".\$row[\"meno\"].\"\\\"; } "); $object_a->show("0,9999","1"); ?>
                            //----------------------------------------
                            xc=xc+1;
                            if(((i+0)/2)/zoom == Math.ceil(((i+0)/2)/zoom)){
                                cash = cash + ("<br/>");
                                yc = yc + 1;
                                xc = dxc;
                            }
        
                            x2 = 265;
                            y2 = 120;
                            x2 = x2+((xc-dxc)*(vv/2));
                            y2 = y2+((xc-dxc)*(mv/2));
                            x2 = x2+((yc-dyc)*-(vv/2));
                            y2 = y2+((yc-dyc)*(mv/2));
                            x2=x2-((size-1)*(vv/2));
                            //xc=xc+level;
                            y2=y2-level;
        
        										zi=0;
                            if(level > 0) {
                            zi=1; cash = cash + ("<div style=\"position:absolute; left:"+x2+"px; top:"+(y2/*-vv*size*(1/10)*/)+"px; z-index:2;\"><img border=\"0\" src=\"casti/jednotky/drag/level.php?level="+(level+500)+"&amp;pozadie="+(pozadie)+"\" /></div>");
                            //cash = cash + ("<div style=\"position:absolute; left:"+(x2-(vv/2))+"px; top:"+(y2+10-(mv/2))+"px; width:"+(vv*2)+"px; height:"+(mv*2)+"px; z-index:"+(2)+";\"><img border=\"0\" src=\"casti/jednotky/drag/pozadie/"+pozadie+"/index.gif\" width=\""+(vv*2)+"\" height=\""+(mv*2)+"\" /></div>");
                            }
                            cash = cash + ("<div style=\"position:absolute; left:"+(x2-(vv/2))+"px; top:"+(y2+level-(mv/2))+"px; width:"+(vv*2)+"px; height:"+(mv*2)+"px; z-index:"+(1)+";\"><img border=\"0\" src=\"casti/jednotky/drag/pozadie/"+pozadie+"/index.gif\" width=\""+(vv*2)+"\" height=\""+(mv*2)+"\"  usemap=\"#mapx"+xc+"y"+yc+")\" /></div>");
                            if(size > 0){
                                //cash = cash + ("<div style=\"position:absolute; left:"+x2+"px; top:"+y2+"px; width:"+vv+"px; height:"+mv+"px; z-index:3;\"><img id=\"mapx"+xc+"y"+yc+")\" border=\"0\" src=\"test/polickohovno.png\" width=\""+(vv*size)+"\" height=\""+(mv*size)+"\"  usemapa=\"#mapx"+xc+"y"+yc+")\" />  <mapa name=\"mapx"+xc+"y"+yc+")\" id=\"mapx"+xc+"y"+yc+")\"><area shape=\"poly\" coords=\""+mv*size+",0*size,"+vv*size+","+(mv/2*size)+","+mv*size+","+mv*size+",0,"+(mv/2*size)+"\"  onMouseOver=\"info('"+xc+"','"+yc+"','"+foruser+"','"+utokna+"','"+zivot+"','"+zivotmax+"','"+vlastnikforuser+"'); on('mapx"+xc+"y"+yc+")');\" onMouseOut=\"off('mapx"+xc+"y"+yc+")');\" onClick=\"coakcex("+xc+","+yc+");\"/></map></div>");
                                cash = cash + ("<div style=\"position:absolute; left:"+x2+"px; top:"+y2+"px; width:"+vv+"px; height:"+mv+"px; z-index:"+(3+zi)+";\"><img id=\"mapx"+xc+"y"+yc+")\" border=\"0\" src=\"test/polickohovno.png\" width=\""+(vv*size)+"\" height=\""+(mv*size)+"\" /></div>");    
                                cash = cash + ("<div style=\"position:absolute; left:"+x2+"px; top:"+(y2-vv*size)+"px; width:"+vv+"px; height:"+mv+"px; z-index:"+(2+zi)+";\"><img border=\"0\" src=\"casti/jednotky/drag/mapa/"+zkratka+"/"+rand+".gif\" alt=\""+foruser+"\" width=\""+(vv*size)+"\" height=\""+(mv*3*size)+"\" border=\"0\"/></div>");
                                document.getElementById("meno").value = '('+(xc-9)+','+(yc-9)+')';
                                document.getElementById("xc_d").value = ''+(xc-9);
                                document.getElementById("yc_d").value = ''+(yc-9);
                                // \""+((mv*size)+(x2))","+(0+(y2))+","+((vv*size)+(x2))+","+((mv/2*size)+(y2))+","+((mv*size)+(x2))+","+((mv*size)+(y2))+","+(0+(x2))+","+((mv/2*size)+(y2))+"\"
 if(size == 1){                               map = map + ("<area shape=\"polygon\" coords=\""+(25+x2)+","+(0+y2)+","+(50+x2)+","+(12+y2)+","+(25+x2)+","+(25+y2)+","+(x2)+","+(12+y2)+"\"  onMouseOver=\"info('"+xc+"','"+yc+"','"+foruser+"','"+utokna+"','"+zivot+"','"+zivotmax+"','"+vlastnikforuser+"','"+uroven+"'); on('mapx"+xc+"y"+yc+")');\" onMouseOut=\"off('mapx"+xc+"y"+yc+")');\" onClick=\"coakcex("+xc+","+yc+");\" />"); }
                            }
                        }
                        //-------------------------------------------------------------------------------                        
                        document.getElementById("mapa").innerHTML = cash+"<map name=\"unipole\" id=\"unipole\">"+map+"</map>"+document.getElementById("domapy").innerHTML;
                        //alert("<map name=\"unipole\" id=\"unipole\">"+map+"</map>");
                       
        						
                        //--------------------------------------------------------------------------------
                    }
                    else alert("Chyba: "+ ajax.status +":"+ ajax.statusText);
                }
                }
                
				<?php
				$xccb = hnet("towns2_uziv","SELECT hlbudovaxc FROM towns2_uziv WHERE id=".$_SESSION["id"]);
				$yccb = hnet("towns2_uziv","SELECT hlbudovayc FROM towns2_uziv WHERE id=".$_SESSION["id"]);
				if($_MYGET["xc"]){ $xccb = $_MYGET["xc"]; $yccb = $_MYGET["yc"]; }
				//$xccb2 = $xccb;
				//$yccb2 = $yccb;
				$xccb2 = ((intval(($xccb-1)/10))*10)+1;
				$yccb2 = ((intval(($yccb-1)/10))*10)+1;
				?>            
            
            velkost=1.08;
            zoom=10;
            xc=<?php echo($xccb2); ?>;
            yc=<?php echo($yccb2) ?>;
            poslat(velkost,zoom,xc,yc);
            
            function zmen(zxc,zyc){
						xc = xc + zxc;        
            yc = yc + zyc;
            if(xc < 1){ xck1=1; }
            if(xc > 1){ xck2=1; }             
            
                        if(xc > 250){ alert("Přesáhli jste okraj mapy."); xc = xc-10;}
                        if(yc > 250){ alert("Přesáhli jste okraj mapy."); yc = yc-10;}
                        if(xc < 1){ alert("Přesáhli jste okraj mapy."); xc = xc+10;}
                        if(yc < 1){ alert("Přesáhli jste okraj mapy."); yc = yc+10;}
            //alert(xc+" / "+yc);
            //window.setTimeout("document.getElementById(\"nacitanie\").innerHTML = \"<img border=\\\"0\\\" src=\\\"casti/mapa/desing/akce2/prejmenovat.png\\\" width=\\\"20\\\" height=\\\"20\\\" />\"",1);
            poslat(velkost,zoom,xc,yc);
            //window.setTimeout("document.getElementById(\"nacitanie\").innerHTML = \"\"",1);
            }
        </script>
<br/>
<?php
if($_POST["meno"]){
$xc_dd = (intval(($_POST["xc_d"]-1)/10))+1;
$yc_dd = (intval(($_POST["yc_d"]-1)/10))+1;
mysql_query("INSERT INTO towns2_zal (hrac,meno,xc_d,yc_d) VALUES('".$_SESSION["id"]."','".$_POST["meno"]."','".$xc_dd."','".$yc_dd."')");
echo(mysql_error());
dc("towns2_zal");
}
$stream = "<b>Jít na: </b>";
$q = 1;
foreach(hnet2("towns2_zal","SELECT meno,xc_d,yc_d FROM towns2_zal WHERE hrac = '".$_SESSION["id"]."' ORDER BY meno") as $row){
if($q != 1){ $stream = $stream." | "; }
$stream = $stream."<a href=\"".gv("?dir=casti/mapa/uniindex.php&amp;glob_sc=1&amp;xc=".((10*($row["xc_d"]-1))+1)."&amp;yc=".((10*($row["yc_d"]-1))+1))."\">".$row["meno"]."</a>";
$q = 2;
}
$stream = $stream."<form  method=\"post\" action=\"\"><b>Přidat záložku: </b>Jméno: 
<input name=\"meno\" type=\"text\" id=\"meno\" />
<input name=\"xc_d\" type=\"hidden\" id=\"xc_d\" />
<input name=\"yc_d\" type=\"hidden\" id=\"yc_d\" />
<input type=\"submit\" name=\"Submit\" value=\"Přidat\" /></form>";
/*echo($_MYGET["xc"]);
echo(" / ");
echo($_MYGET["yc"]);*/
if($_GET["xc_i"]){
refresh(gv("?dir=casti/mapa/uniindex.php&glob_sc=1&xc=".$_GET["xc_i"]."&yc=".$_GET["yc_i"].""));
}
$stream = $stream."<form method=\"GET\" action=\"\"><b>Jdi na:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
x: <input name=\"xc_i\" type=\"text\" id=\"xc_i\" size=\"2\" />
y: <input name=\"yc_i\" type=\"text\" id=\"yc_i\" size=\"2\" />
<input type=\"submit\" name=\"Submit\" value=\" jít na \" /></b>
</form>
";
ramcek($stream,"#cccccc");
//--------------------------------
/*$stream = $stream."<br/><form  method=\"GET\" action=\"\"><b>Jít na x:</b> 
<input name=\"xc\" type=\"text\" id=\"xc\" /><b>y:</b> 
<input name=\"yc\" type=\"text\" id=\"yc\" />
<input type=\"submit\" name=\"Submit\" value=\"Přidat\" /></form>";
ramcek($stream,"#cccccc");*/
?>