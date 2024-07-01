<?php
date_default_timezone_set("Asia/Baghdad");
if (file_exists('madeline.php')){
    require_once 'madeline.php';
}
define('MADELINE_BRANCH', 'deprecated');
function bot($method, $datas = []){
    $token = file_get_contents("token");
    $url = "https://api.telegram.org/bot$token/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $res = curl_exec($ch);
    curl_close($ch);
    return json_decode($res, true);
}
$BeRo = json_decode(file_get_contents("BeRo.json"),true);
$settings['app_info']['api_id'] = 7960533;
$settings['app_info']['api_hash'] = 'e63bd5f68ee3666ebd05b04c6387b0bb';
$MadelineProto = new \danog\MadelineProto\API($BeRo["c"]["ster"].'.madeline',$settings);
require("conf.php"); 
$TT = file_get_contents("token");
$tg = new Telegram("$TT");
$BeRo = json_decode(file_get_contents("BeRo.json"),true);
$lastupdid = 1; 
while(true){ 
 $upd = $tg->vtcor("getUpdates", ["offset" => $lastupdid]); 
 if(isset($upd['result'][0])){ 
  $text = $upd['result'][0]['message']['text']; 
  $chat_id = $upd['result'][0]['message']['chat']['id']; 
$from_id = $upd['result'][0]['message']['from']['id']; 
$sudo = file_get_contents("ID");;
if($from_id == $sudo){
try{
if($BeRo["c"]["step". $BeRo["c"]["ster"]]  == "2"){
if(!preg_match("/Login/", $text)){
  file_put_contents('phone5',$text);
$MadelineProto->phonelogin($text);
$tg->vtcor('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"Checker ❲ ". $BeRo["c"]["ster"]. " ❳ \n ⌯ Send Code Phone Now \n ⌯ EXAMPLE ❲ 45455 ❳",
]);
$BeRo["c"]["step". $BeRo["c"]["ster"]]  = 3;
file_put_contents("BeRo.json",json_encode($BeRo,128|32|256));
}
}elseif($BeRo["c"]["step". $BeRo["c"]["ster"]]  == "3"){
if($text){
$authorization = $MadelineProto->completephonelogin($text);
if ($authorization['_'] === 'account.password') {
$tg->vtcor('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"Checker ❲ ". $BeRo["c"]["ster"]. " ❳ \n ⌯ Send 2nd Password Account \n ⌯ Ex : ❲ THe King Bero ❳ ",
]);
$BeRo["c"]["step". $BeRo["c"]["ster"]]  = 4;
file_put_contents("BeRo.json",json_encode($BeRo,128|32|256));
}else{
$tg->vtcor('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"Checker ❲ ". $BeRo["c"]["ster"]. " ❳ \n ⌯ Success Login 🟢",
]);
$BeRo["c"]["step". $BeRo["c"]["ster"]]  = null;
$BeRo["c"]["ster"] = null;
file_put_contents("BeRo.json",json_encode($BeRo,128|32|256));
exit;
}
}
}elseif($BeRo["c"]["step". $BeRo["c"]["ster"]]  == "4"){
if($text){
$authorization = $MadelineProto->complete2falogin($text);
$tg->vtcor('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"Checker ❲ ". $BeRo["c"]["ster"]. " ❳ \n ⌯ Success Login 🟢",
]);
file_put_contents("step5","");
exit;
}
}
}catch(Exception $e) {
  $tg->vtcor('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"Errors In Login ✈️". $e->getMessage(), 
]);
exit;
}}
$lastupdid = $upd['result'][0]['update_id'] + 1;
}
}