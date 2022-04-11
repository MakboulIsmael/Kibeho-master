<?php


$serverName = "127.0.0.1";
// $serverUsername = "calmgnjh_kibehosanctuarynj";
// $serverPassword = "calmgnjh_kibehosanctuarynj";
// $serverDatabase = "calmgnjh_kibehosanctuarynj";
$serverUsername = "root";
$serverPassword = "";
$serverDatabase = "kibeho";
$connection = new mysqli($serverName, $serverUsername, $serverPassword, $serverDatabase);
// ini_set('session.cookie_httponly', 1);
// ini_set('session.use_only_cookies ', 1);
// ini_set('session.cookie_secure  ', 1);
// session_start();


$phone = $_POST["phone"];
$message = "You re welcome";
$data=array("sender"=>'KIBEHO Sanctuary', "recipients"=> $phone, "message"=> $message,);

$url="https://www.intouchsms.co.rw/api/sendsms/.json";
$data=http_build_query($data);
$username="tumugide";
$password="Rxrgt2sWDW9i@5t";

$ch=curl_init();

curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_USERPWD,$username.":".$password);
curl_setopt($ch,CURLOPT_POST,true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($ch,CURLOPT_POSTFIELDS,$data);

$result=curl_exec($ch);
$httpcode=curl_getinfo($ch,CURLINFO_HTTP_CODE);

curl_close($ch);

if($httpcode == 200){
    echo "Message Sent!";
} else {
    echo "Message Not Sent!";
}

?>