<?php
$surky=new index("towns2_uziv","select prachy,jedlo,kamen,zelezo,drevo,body,ludia,ludiamax from towns2_uziv where ppp");
$surkyu = $surky->get("id = '".$_SESSION["id"]."'");

    
echo("
 <div id=\"surky_lista\">
<table border=\"0\" cellpadding=\"1\">
  <tr><td align=\"center\">		
<img src=\"casti/suroviny/desing/prachy.png\" alt=\"prachy\" width=\"17\" height=\"17\" border=\"1\" /> &nbsp; ".zformatovat($surkyu["prachy"])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
"./*<img src=\"casti/suroviny/desing/jedlo.png\" alt=\"jídlo\" width=\"17\" height=\"17\" border=\"1\"> &nbsp; ".zformatovat($surkyu["jedlo"])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*/"
<img src=\"casti/suroviny/desing/kamen.png\" alt=\"kámen\" width=\"17\" height=\"17\" border=\"1\"> &nbsp; ".zformatovat($surkyu["kamen"])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src=\"casti/suroviny/desing/zelezo.png\" alt=\"železo\" width=\"17\" height=\"17\" border=\"1\"> &nbsp; ".zformatovat($surkyu["zelezo"])."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src=\"casti/suroviny/desing/drevo.png\" alt=\"drevo\" width=\"17\" height=\"17\" border=\"1\" /> &nbsp; ".zformatovat($surkyu["drevo"])."&nbsp;&nbsp;&nbsp;&nbsp;
<a class=\"bzp\" href=\"".gv("?dir=casti/suroviny/index.php&amp;glob_sc=5")."\">&gt;&gt;</a></th>
</td>
</tr>
</table></div>");


?>


    <script>
        function poslat_i(){
        	 //alert("2");
                var ajax = (window.XMLHttpRequest ? new XMLHttpRequest() : (window.ActiveXObject ? new ActiveXObject("Microsoft.XMLHTTP") : false));
                if(!ajax){
                    alert("Tak tady to nepoběží!");
                    return true;
                }
                ajax.onreadystatechange= function () {zpracuj_i(ajax); } ;
                ajax.open("GET", "casti/suroviny/lista_ajax.php", true);
                ajax.send(null);
                return false
               
            }
            function zpracuj_i(ajax){
            	 //alert("3");
                var txt;
                if (ajax.readyState == 4){
                    if(ajax.status == 200 || ajax.status==0){
                        txt=ajax.responseText;
                      //alert("4");
                     document.getElementById("surky_lista").innerHTML = txt;
                     
                     
                    }
                    else alert("Chyba: "+ ajax.status +":"+ ajax.statusText);
                }
                }
                 //alert("1");
                 poslat_i();
                 window.setInterval("poslat_i();", 60 * 1000);
    </script>