<?php
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



$stream = file_post_contents("http://www.gvp.cz:8080/ninfo/login.aspx","");
echo($stream);

$tmp = strpos($stream,"ASP.NET_SessionId=");
$stream = substr($stream,$tmp);
$tmp = strpos($stream,";");
$session = substr($stream,0,$tmp);
//--------------
$napis_v = "id=\"__EVENTVALIDATION\" value=\"";
$tmp = strpos($stream,$napis_v) + strlen($napis_v);
$stream = substr($stream,$tmp);
$tmp = strpos($stream,"\"");
$napis_v = substr($stream,0,$tmp);
//----------
$stream = file_post_contents("http://www.gvp.cz:8080/ninfo/login.aspx","ctl00\$cphmain\$TextBoxjmeno=hejny&ctl00\$cphmain\$TextBoxheslo=ifvrkcj0&__EVENTVALIDATION=".$napis_v,$session);

echo($stream);

/*
//file_post_contents("http://www.websurf.cz/admin_sess.php","",$stream);
file_post_contents("http://www.websurf.cz/admin_sess.php?akce=web_pridat_kredity","typ=NORMAL&odkud=sporci&kam=346ea1f70140e97ad36479931fa9d3&kolik=$kolik",$stream,"POST");
//echo($stream);
}*/
?>