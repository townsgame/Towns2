<?php
    $root = "../../";
    require("../../casti/funkcie/index.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
    <link rel="shorcut icon" href="favicon.ico"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Animace</title>
    <script type="text/javascript">
        <!-- 
                
        function info(xc,yc,obrazok,utokna,zivot,zivotmax,vlastnik) 
        {  
            document.show.xc.value = xc 	
            document.show.yc.value = yc 
            document.show.obrazok.value = obrazok 
            document.show.utokna.value = utokna
            document.show.zivot.value = zivot
            document.show.zivotmax.value = zivotmax
            document.show.vlastnik.value = vlastnik
        }
        function off(a){
            document.getElementById(a).src = "../../test/polickohovno.png";
        }
        function on(a){
            document.getElementById(a).src = "../../test/policko.png";
        }
        -->

    </script>
</head>
<body>
        <div style="visibility: hidden;" id="domapy">
        <div style="position:absolute; left:112px; top:148px; z-index:100;">
        <div style="position:absolute; left:310px; top:1px; z-index:1;"><a onClick="zmen(0,-10);"><img src="../mapa/desing/2.png" width="44" height="23" /></a></div>
		  <div style="position:absolute; left:310px; top:191px; z-index:1;"><a onClick="zmen(10,0);"><img src="../mapa/desing/4.png" width="44" height="23" /></a></div>
		  <div style="position:absolute; left:1px; top:191px; z-index:1;"><a onClick="zmen(0,10);"><img src="../mapa/desing/6.png" width="44" height="23" /></a></div>
		  <div style="position:absolute; left:1px; top:1px; z-index:1;"><a onClick="zmen(-10,0);"><img src="../mapa/desing/8.png" width="44" height="23" /></a></div>
		  </div>
		  </div>
        <div align="center">
        <div style="position:relative; width:1200px; height:800px; background-color: #000000; overflow: hidden;" id="mapa">mapa se načítá</div>
        <div style="position:relative; width:560px; height:100px; background-color: #bbbbbb; overflow: hidden;"><table width="560" height="100" border="0"><tr><td width="280" align="left" valign="top">
            <form name="show"> 
            <b>x:&nbsp;&nbsp;&nbsp;&nbsp;</b>
            <input size="3" name="xc" style="border:0px solid #FFFFFF"/><b>y:&nbsp;&nbsp;&nbsp;&nbsp;</b> <input size="3" name="yc" style="border:0px solid #FFFFFF"/>
            <br />
            <b>vlastník:&nbsp;&nbsp;&nbsp;&nbsp;<input name="vlastnik" id="vlastnik" size="14" style="border:0px solid #FFFFFF"/></b>
            <br/> 
            <b>budova:&nbsp;&nbsp;&nbsp;&nbsp;<input size="14" name="obrazok" style="border:0px solid #FFFFFF"/>  </b> 
            <br/>   
            <b>život:&nbsp;&nbsp;&nbsp;&nbsp;</b> <input size="3" name="zivot" style="border:0px solid #FFFFFF"/> / <input size="3" name="zivotmax" style="border:0px solid #FFFFFF"/>  <br/>
            <b>obrana:&nbsp;&nbsp;&nbsp;&nbsp;</b> <input size="4" name="utokna" style="border:0px solid #FFFFFF"/>
</td><td width="280" align="left" valign="top">
<iframe width="280" height="92" frameborder="1" scrolling="no" src="casti/mapa/drag/nic.php">Váš prohlížeč nepodporuje rámy.</iframe>
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
                ajax.open("GET", "../../dat.php?zoom="+zoom+"&xc="+xc+"&yc="+yc, true);
                ajax.send(null);
                return false
            }
            function zpracuj(ajax,zoom,xc,yc){
                var txt;
                if (ajax.readyState == 4){
                    if(ajax.status == 200 || ajax.status==0){
                        txt=ajax.responseText;
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
                            //---------------------------------------------
                            pozadie = dat5.charAt(i)+""+dat5.charAt(i+1);
                            //----------------------------------------
                            zivot = dat2.charAt(i*2)+""+dat2.charAt(i*2+1)+""+dat2.charAt(i*2+2)+""+dat2.charAt(i*2+3);
                            zivot = zivot-0;
                            //----------------------------------------
                            utokna = dat3.charAt(i*2)+""+dat3.charAt(i*2+1)+""+dat3.charAt(i*2+2)+""+dat3.charAt(i*2+3);
                            utokna = utokna-0;
                            //----------------------------------------
                            rand = dat6.charAt(i)+""+dat6.charAt(i+1);
                            //cash = cash + rand;
                            if(rand.charAt(0) == "0"){ rand = rand.charAt(1); }
                            //----------------------------------------
                            zkratka = dat1.charAt(i)+""+dat1.charAt(i+1);
                             <?php $object_a = new index("townsuni","SELECT obrazok,meno,zivot,size FROM townsuni WHERE ppp","if(zkratka == \\\"\".substr(\$row[\"obrazok\"].\"0\",0,2).\"\\\"){ zkratka = \\\"\".\$row[\"obrazok\"].\"\\\"; foruser=\\\"\".\$row[\"meno\"].\"\\\"; zivotmax=\\\"\".\$row[\"zivot\"].\"\\\"; size=\\\"\".\$row[\"size\"].\"\\\";} "); $object_a->show("0,9999","1"); ?>
                             if(zkratka == "do"){ zkratka = "0"; foruser="neco"; zivotmax="0"; size="0"; }                            
                             //----------------------------------------
                            vlastnik = dat4.charAt(i)+""+dat4.charAt(i+1)+""+dat4.charAt(i+2)+""+dat4.charAt(i+3);
                            vlastnikforuser = "";
                            <?php $object_a = new index("townsmes","SELECT id,meno FROM townsmes WHERE ppp","if(vlastnik == \\\"\".substr(\"000\".\$row[\"id\"],-4).\"\\\"){ vlastnikforuser = \\\"\".\$row[\"meno\"].\"\\\"; } "); $object_a->show("0,9999","1"); ?>
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
        
        
                            cash = cash + ("<div style=\"position:absolute; left:"+(x2-(vv/2))+"px; top:"+(y2-(mv/2))+"px; width:"+(vv*2)+"px; height:"+(mv*2)+"px; z-index:1;\"><img border=\"0\" src=\"../jednotky/drag/pozadie/"+pozadie+"/index.gif\" width=\""+(vv*2)+"\" height=\""+(mv*2)+"\"  usemap=\"#mapx"+xc+"y"+yc+")\" /></div>");
                            if(size > 0){
                                cash = cash + ("<div style=\"position:absolute; left:"+x2+"px; top:"+y2+"px; width:"+vv+"px; height:"+mv+"px; z-index:3;\"><img id=\"mapx"+xc+"y"+yc+")\" border=\"0\" src=\"../../test/polickohovno.png\" width=\""+(vv*size)+"\" height=\""+(mv*size)+"\"  usemap=\"#mapx"+xc+"y"+yc+")\" />  <map name=\"mapx"+xc+"y"+yc+")\" id=\"mapx"+xc+"y"+yc+")\"><area shape=\"poly\" coords=\""+mv*size+",0*size,"+vv*size+","+(mv/2*size)+","+mv*size+","+mv*size+",0,"+(mv/2*size)+"\"  onMouseMove=\"info('"+xc+"','"+yc+"','"+foruser+"','"+utokna+"','"+zivot+"','"+zivotmax+"','"+vlastnikforuser+"'); on('mapx"+xc+"y"+yc+")');\" onMouseOut=\"off('mapx"+xc+"y"+yc+")');\" onKeyDown=\"alert('"+rand+"');\"/></map></div>");
                                cash = cash + ("<div style=\"position:absolute; left:"+x2+"px; top:"+(y2-vv*size)+"px; width:"+vv+"px; height:"+mv+"px; z-index:2;\"><img border=\"0\" src=\"../jednotky/drag/mapa/"+zkratka+"/"+rand+".gif\" alt=\""+foruser+"\" width=\""+(vv*size)+"\" height=\""+(mv*3*size)+"\" border=\"0\"/></div>");
                            }
                        }
                        //-------------------------------------------------------------------------------                        
                        document.getElementById("mapa").innerHTML = cash+document.getElementById("domapy").innerHTML;
                        
                       
        						
                        //--------------------------------------------------------------------------------
                    }
                    else alert("Chyba: "+ ajax.status +":"+ ajax.statusText);
                }
                }
            velkost=1.5;
            zoom=10;
            xc=1;
            yc=1;
            poslat(velkost,zoom,xc,yc);
            
            function zmen(zxc,zyc){
				xc = xc + zxc;        
            yc = yc + zyc;
            if(xc < 1){ xck1=1; }
            if(xc > 1){ xck2=1; }             
            
            //alert(xc+" / "+yc);
            //window.setTimeout("document.getElementById(\"nacitanie\").innerHTML = \"<img border=\\\"0\\\" src=\\\"casti/mapa/desing/akce2/prejmenovat.png\\\" width=\\\"20\\\" height=\\\"20\\\" />\"",1);
            poslat(velkost,zoom,xc,yc);
            //window.setTimeout("document.getElementById(\"nacitanie\").innerHTML = \"\"",1);
            }
        </script>
</body>
</html>