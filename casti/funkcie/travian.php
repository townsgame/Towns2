<?php 
function prevest($userxx,$passxx,$servxx) {
function file_post_contents($url,$headers=false,$cookie="a=a",$wasistdas="POST") {
	  $urlx=$url;
    $url = parse_url($url);

    if (!isset($url['port'])) {
      if ($url['scheme'] == 'http') { $url['port']=80; }
      elseif ($url['scheme'] == 'https') { $url['port']=443; }
    }
    $url['query']=isset($url['query'])?$url['query']:'';
    $url['query']=$headers;
    $url['protocol']=$url['scheme'].'://';
    $eol="\r\n";

    $headers =  $wasistdas." "./*$url['protocol'].$url['host'].$url['path']."*/$urlx." HTTP/1.0".$eol. 
    						"Cookie: ".$cookie.$eol. 
                "Host: ".$url['host'].$eol. 
                "Referer: ".$url['protocol'].$url['host'].$url['path'].$eol. 
                "Content-Type: application/x-www-form-urlencoded".$eol. 
                "Content-Length: ".strlen($url['query']).$eol.
                $eol.$url['query'];
                //echo($headers);
    $fp = fsockopen($url['host'], $url['port'], $errno, $errstr, 30); 
    if($fp) {
      fputs($fp, $headers);
      $result = '';
      while(!feof($fp)) { $result .= fgets($fp, 128); }
      fclose($fp);
      if (!$headers) {
        //removes headers
        $pattern="/^.*\r\n\r\n/s";
        $result=preg_replace($pattern,'',$result);
      }
      return $result;
    }
}
function oddo($stream,$od,$do) {
$tmp = strpos($stream,$od);
$stream = substr($stream,$tmp);
$tmp = strpos($stream,$do);
$phpsesid = substr($stream,0,$tmp);
return($phpsesid);
}
   
$stream = file_post_contents("http://s".$servxx.".travian.cz/dorf1.php","login=".(time()-rand(1,90))."&w=&e6be698=".$userxx."&e2bf6e0=".$passxx."&e1f8462=","","POST");  
//echo($stream);
$drevo="evo:</td><td align=\"right\">";
$hlina="na:</td><td align=\"right\">";
$zelez="elezo:</td><td align=\"right\">";
$obili=":</td><td align=\"right\">";
$drevoxx = strlen($drevo);
$hlinaxx = strlen($hlina);
$zelezxx = strlen($zelez);
$obilixx = strlen($obili);
$phpsesid = oddo($stream, "T3E=", ";"); 
$drevo = oddo($stream, $drevo, "&"); 
$hlina = oddo($stream, $hlina, "&"); 
$zelez = oddo($stream, $zelez, "&");
$tmp = strpos($stream,$zelez);
$stream = substr($stream,$tmp+40); 
$obili = oddo($stream, $obili, "&"); 
$drevo = substr($drevo,$drevoxx);  
$hlina = substr($hlina,$hlinaxx);
$zelez = substr($zelez,$zelezxx);
$obili = substr($obili,$obilixx);
$drevo = strip_tags($drevo);
$hlina = strip_tags($hlina);
$zelez = strip_tags($zelez);
$obili = strip_tags($obili);
$tmp=min(array($drevo,$hlina,$zelez,$obili));
if($tmp == $drevo){ $tmp2 = array(1,3,14,17); }
if($tmp == $hlina){ $tmp2 = array(5,6,16,18); }
if($tmp == $zelez){ $tmp2 = array(4,7,10,11); }
if($tmp == $obili){ $tmp2 = array(2,15,8,9,12,13); }


//echo($drevo." / ".$hlina." / ".$zelez." / ".$obili);
echo("<br/>");
//echo($phpsesid);

foreach($tmp2 as $tmpx){
//$stream = file_post_contents("http://s".$servxx.".travian.cz/build.php?id=2","id=2",$phpsesid);
//echo($phpsesid);
$stream = file_post_contents("http://s".$servxx.".travian.cz/build.php?id=".$tmpx,"id=".$tmpx,$phpsesid);
//echo($stream);
$odkaz = oddo($stream, "&c=", "\"");
$odkaz = "a=".$tmpx.$odkaz;
//echo($odkaz);


$stream = file_post_contents("http://s".$servxx.".travian.cz/dorf1.php?".$odkaz,$odkaz,$phpsesid);
//echo("http://s".$servxx.".travian.cz/dorf1.php?a=".$tmp."&c=f7d<br>");
//break;
}
//dorf1.php?a=6&c=f7d
//echo($tmp2[0]);
//$stream = file_post_contents("http://s".$servxx.".travian.cz/build.php?id=2","id=2",$phpsesid);
//echo($stream);
}




prevest("qwqw","kostra33","9");
?>