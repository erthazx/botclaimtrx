<?php
//php 7.3.0
//author : erthazx
//version: 1.0
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

//COLOR
$A="\e[1;30m";    $AB="\e[40m";
$B="\e[1;34m";    $BB="\e[44m";
$C="\e[1;36m";    $CB="\e[46m";
$H="\e[1;32m";    $HB="\e[42m";
$M="\e[1;31m";    $MB="\e[41m";
$K="\e[1;33m";    $KB="\e[43m";
$P="\e[1;37m";    $PB="\e[47m";
$U="\e[1;35m";    $UB="\e[45m";

//HANDWRITING
function hand($str){
    $arr = str_split($str);
    foreach ($arr as $az){
    echo $az;
    usleep(29000);
    }
}

//EXPLODE
function x($a,$b,$c,$res){
$x=explode($a,$res);
$y=explode($b,$x[$c]);
return $y[0];
}

//TIMER
function timer($tmr){
global $A,$B,$C,$H,$M,$K,$P,$U; 
    $warna = [$M,$H,$B,$K,$U];
    $timr=time()+$tmr;
    while(true):
    echo "\r                               \r";
    $res = $timr-time();
    if($res < 1){
    break;
    }
    echo$P."["
      .$warna[array_rand($warna)]."•"
      .$warna[array_rand($warna)]."•"
      .$warna[array_rand($warna)]."•"
      .$P."]".$M."PLEASE WAIT "
      .$P.gmdate("i:s", $res);
  sleep(1);
    endwhile;
}

function web(){
global $P,$A;
echo"\n";
hand($P."# To stop this Bot press CTRL + C");echo"\n";
hand($P."# This is illegal software, DWYOR");echo"\n";
}
function dash(){
return curl("https://claimtrx.com/dashboard");
} 
function auto(){
return curl("https://claimtrx.com/auto");
}
function verify(){
global $tkn;
return curl("https://claimtrx.com/auto/verify", "token=$tkn");
}

//INPUT
if(!file_exists('ua')){
$in=readline(' useragent: ');
file_put_contents('ua',$in);
}
if(!file_exists('cookie')){
$in=readline(' cookie: ');
file_put_contents('cookie',$in);
hand('re run script');
exit;
}

//CURL
function curl($url, $post=0){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
     if($post){
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
$headers=[
	"Host: claimtrx.com",
	"x-requested-with: XMLHttpRequest",
	"user-agent: ".file_get_contents('ua'),
	"content-type: application/x-www-form-urlencoded; charset=UTF-8",
	"cookie: ".file_get_contents('cookie')
	 ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      return curl_exec($ch);
   }

$date = new DateTime();
//$ip = system("curl ifconfig.me");
$ip = gethostbyname("claimtrx.com");
$host = "claimtrx.com";
$user = "Admin";
$balance = x('fa-wallet"></i> ','</p>',1,dash());
$energi = x('fa-bolt"></i>','</p>',1,dash());

//BANNER
system("clear");
echo$P." ⠀⢠⣤⡀⠀⣤⠀⠀⠀⠀⣄⠀  ".$P."┏━────────────────────────────────━┓\n";
echo$P."⠀⠀⠙⢿⡄⠀⣿⣿⣿⣿⣿⣿⠀    ".$C."╔═╗".$P."┌─┐┬ ┬┌─┐┌─┐┌┬┐".$C."╔╦╗".$P."┌─┐┌─┐┬  ┌─┐\n";
echo$P."⠀⠀⠀⢸⣿⠀⣿⣿⣿⣿⣾⣿⠀    ". $C."╠╣ ".$P."├─┤│ ││  ├┤  │  ".$C."║".$P." │ ││ ││  └─┐\n";
echo$P."⠀⠀⠀⣸⡿⠀⢈⣿⣿⣿⡟⠁⠀    ".$C."╚ ".$P." ┴ ┴└─┘└─┘└─┘ ┴ ".$C." ╩ ".$P."└─┘└─┘┴─┘└─┘\n";
echo$P."⠀⢀⣼⠿⢁⣴⣿⣿⣿⣿⣧⠀⠀  ".$P."┗━────────────────────────────────━┛\n";
echo$P."⢀⣾⢋⣴⣿⣿⣿⣿⣿⣿⣿⠀⠀  ".$PB.$A." Author : erthazx   |  t.me/erstore ".$AB."\n";
echo$P."⣼⡏⣼⣿⣿⣿⣿⣿⣿⣿⠇⠀⠀  \n";
echo$P."⠻⣧⣿⣿⣿⣿⣿⣿⣿⣿⡀⠀⠀  ";echo"Date  : ".$date->format('d F Y H:i:s')."\n";
echo$P."⠀⠙⠿⠿⠿⠿⠿⠿⠿⠿⠷⠄⠀  ";echo"IP    : ".$ip."\n";
echo$A."\n<==============[".$K.$MB."  • FREE SCRIPT •  ".$A.$AB."]==============>";
hand($P."\n\n⁍ Host    :  ".$C.$host);
hand($P."\n⁍ User    :  ".$C.$user);
hand($P."\n⁍ Balance :  ".$C.$balance);
hand($P."\n⁍ Energi  : ".$C.$energi);
echo""."\n";
web();
echo$A."\n<==============[".$K.$HB."  • RUNNING BOT •  ".$A.$AB."]==============>\n\n";

if($balance == null){
echo$M;
echo"Cookie Expired";
system("rm -f cookie");
$newcookie=readline(" Input new cookie : ");
file_put_contents('cookie',$newcookie);
echo"Jalankan Ulang!!!";
exit;
}else{
//DATA
while(true){
$tmr = x("let timer = ",",",1,auto());
$tkn = x('name="token" value="','">',1,auto());

timer($tmr);

verify();

$bal = x('fa-wallet"></i> ','</p>',1,dash());
$ene = x('fa-bolt"></i>','</p>',1,dash());

echo"$HB CLAIM SUCCESS $AB";
echo"$P Balance $C$bal ";
echo"$P Energi $C$ene\n";

if($energi == "0"){
echo"SHORTLINK DULU MASE\n";
exit;
        }
    }
} 
