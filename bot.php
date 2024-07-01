<?php
date_default_timezone_set("Asia/Baghdad");
error_reporting(0);
require("conf.php"); 
if (!file_exists("token")) {
$token =  readline("Enter Token => ");
file_put_contents("token", $token);
}
if (!file_exists("ID")) {
$id = readline("Enter iD => ");
file_put_contents("ID", $id);
}
$sudo = file_get_contents('ID');
$token = file_get_contents('token');
$o = '5093591328';
define('API_KEY',$token);
function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".API_KEY."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res,true);
}
}
$BeRo = json_decode(file_get_contents("BeRo.json"),true);
$lastupdid = 1; 
while(true){ 
	
$upd = bot("getUpdates", ["offset" => $lastupdid]); 
if(isset($upd['result'][0])){ 
$text = $upd['result'][0]['message']['text']; 
$chat_id = $upd['result'][0]['message']['chat']['id']; 
$from_id = $upd['result'][0]['message']['from']['id']; 
$message = $upd['result'][0]['message']; 
$cq = $upd['callback_query'];
$data = $cq['data'];
$message_id = $cq['message']['message_id'];
$chat_id2 = $cq['message']['chat']['id'];

if($text == '/start' and $chat_id != $sudo){ 
bot('sendmessage',[ 
'chat_id'=>$chat_id,  
'text'=>"Checker Bero @B_r_0🏴
",'parse_mode' => "MarkDown", 'disable_web_page_preview' => true,
'reply_markup' => json_encode(['inline_keyboard' => [
[['text' => "$chat_id", 'url' => "tg://user?id=$from_id"]], 
[['text' => "To Activate Bot", 'url' => "t.me/PvPPPP"],['text' => "Channel", 'url' => "t.me/Sero_Bots"]], 
]]) 
]);
}

$user = file_get_contents("username") ; if ( $user == null ) { $user = "None" ; } 
if($from_id == $sudo){
	
	try{
		
if($text == '/start' or $text == '/Home' or $text == "❲ Back ❳"){
bot('sendmessage',[
'chat_id' => file_get_contents("ID"), 
'parse_mode' => "markdown",
'text'=>" 
{ Welcome To Bero Checker Vip } 
", 
'inline_keyboard'=>true,
'reply_markup' => json_encode([
'resize_keyboard'=>true, 
'keyboard'=>[
          [['text' =>"Checker Status","Flood"], ['text' =>"ResEt Loops","Flood"]], 
          [['text' =>"Add Users","Flood"],['text' =>"Delete Users","Flood"]], 
          [['text' =>"Clear List","Flood"]], 
          [['text' => "Add LogiN","AddLogi"],['text' => "Dalete LogiN","AddLogi"]], 
          [['text' => "RuN","Run"],['text' => "StoP","Stop"]],
          [['text' => "RuN All","Run"],['text' => "StoP All","Stop"]],
  ]
])
]);
} 

if($text == "Checker Status"){
	for($i=0;$i<11;$i++){ 
		if($BeRo["c$i"]["mode"] == null) {
			$BeRo["c$i"]["mode"] = "🔴" ;
			} 
		} 
	bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : ALL STATUS Checkers
 Checker ❲ 1 ❳ -> ". $BeRo["c1"]["mode"]. "
 Checker ❲ 2 ❳ -> ". $BeRo["c2"]["mode"]. "
 Checker ❲ 3 ❳ -> ". $BeRo["c3"]["mode"]. "
 Checker ❲ 4 ❳ -> ". $BeRo["c4"]["mode"]. "
 Checker ❲ 5 ❳ -> ". $BeRo["c5"]["mode"]. "
 Checker ❲ 6 ❳ -> ". $BeRo["c6"]["mode"]. "
 Checker ❲ 7 ❳ -> ". $BeRo["c7"]["mode"]. "
 Checker ❲ 8 ❳ -> ". $BeRo["c8"]["mode"]. "
 Checker ❲ 9 ❳ -> ". $BeRo["c9"]["mode"]. "
 Checker ❲ 10 ❳ -> ". $BeRo["c10"]["mode"]. "
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
	} 
	
	if($text == "ResEt Loops"){
		for($i=0;$i<11;$i++){ 
		if(file_get_contents("loops$i" ) == null) {
			file_put_contents("loops$i","0");
			} 
		} 
	bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : Loops /Checkers
  Checker ❲ 1 ❳ -> ". file_get_contents ("loops1"). " /restLoop1
 Checker ❲ 2 ❳ -> ". file_get_contents ("loops2"). " /restLoop2
 Checker ❲ 3 ❳ -> ". file_get_contents ("loops3"). " /restLoop3
 Checker ❲ 4 ❳ -> ". file_get_contents ("loops4"). " /restLoop4
 Checker ❲ 5 ❳ -> ". file_get_contents ("loops5"). " /restLoop5
 Checker ❲ 6 ❳ -> ". file_get_contents ("loops6"). " /restLoop6
 Checker ❲ 7 ❳ -> ". file_get_contents ("loops7"). " /restLoop7
 Checker ❲ 8 ❳ -> ". file_get_contents ("loops8"). " /restLoop8
 Checker ❲ 9 ❳ -> ". file_get_contents ("loops9"). " /restLoop9
 Checker ❲ 10 ❳ -> ". file_get_contents ("loops10"). " /restLoop10
 
 To Rest All Loops Check Click /restLoops
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
	} 
	
	if($text == "Add Users"){
	bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : $text 🦅
  
  - Choose The List To Add
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'List #1']],
[['text'=>'List #2']],
[['text'=>'List #3']],
[['text'=>'List #3']],
[['text'=>'List #4' ]],
[['text'=>'List #5' ]],
[['text'=>'List #6' ]],
[['text'=>'List #7' ]],
[['text'=>'List #8' ]],
[['text'=>'List #9' ]],
[['text'=>'List #10' ]],
[['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
$BeRo["c"]["ccc"] = "Adder";
$BeRo["c"]["chk"] = "$r";
file_put_contents("BeRo.json",json_encode($BeRo,128|32|256));
	} 
	
	if($text == "Clear List"){
	bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : $text 🦅
  
  - Choose The List To Clear
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'List -> 1']],
[['text'=>'List -> 2']],
[['text'=>'List -> 3']],
[['text'=>'List -> 3']],
[['text'=>'List -> 4' ]],
[['text'=>'List -> 5' ]],
[['text'=>'List -> 6' ]],
[['text'=>'List -> 7' ]],
[['text'=>'List -> 8' ]],
[['text'=>'List -> 9' ]],
[['text'=>'List -> 10' ]],
[['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);

	}  
	
	if($text == "Delete Users"){
	bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : $text 🦅
  
  - Choose The List To Delete 
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'List #1']],
[['text'=>'List #2']],
[['text'=>'List #3']],
[['text'=>'List #3']],
[['text'=>'List #4' ]],
[['text'=>'List #5' ]],
[['text'=>'List #6' ]],
[['text'=>'List #7' ]],
[['text'=>'List #8' ]],
[['text'=>'List #9' ]],
[['text'=>'List #10' ]],
[['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
$BeRo["c"]["ccc"] = "DelEte";
$BeRo["c"]["chk"] = "$r";
file_put_contents("BeRo.json",json_encode($BeRo,128|32|256));
	} 
	
	if($text == "Add LogiN"){
	bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : $text 🦅
  
  - Choose N To Login Now
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'Login 1']],
[['text'=>'Login 2']],
[['text'=>'Login 3']],
[['text'=>'Login 3']],
[['text'=>'Login 4' ]],
[['text'=>'Login 5' ]],
[['text'=>'Login 6' ]],
[['text'=>'Login 7' ]],
[['text'=>'Login 8' ]],
[['text'=>'Login 9' ]],
[['text'=>'Login 10' ]],
[['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
	} 
	
	if($text == "Dalete LogiN"){
	bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : $text 🦅
  
  - Choose N To Delete Login Now
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'Delete LogiN 1']],
[['text'=>'Delete LogiN 2']],
[['text'=>'Delete LogiN 3']],
[['text'=>'Delete LogiN 3']],
[['text'=>'Delete LogiN 4' ]],
[['text'=>'Delete LogiN 5' ]],
[['text'=>'Delete LogiN 6' ]],
[['text'=>'Delete LogiN 7' ]],
[['text'=>'Delete LogiN 8' ]],
[['text'=>'Delete LogiN 9' ]],
[['text'=>'Delete LogiN 10' ]],
[['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
	} 
	
	if($text == "RuN"){
	bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : $text 🦅
  
  - Choose Checker to Run Now
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'Run 1']],
[['text'=>'Run 2']],
[['text'=>'Run 3']],
[['text'=>'Run 3']],
[['text'=>'Run 4' ]],
[['text'=>'Run 5' ]],
[['text'=>'Run 6' ]],
[['text'=>'Run 7' ]],
[['text'=>'Run 8' ]],
[['text'=>'Run 9' ]],
[['text'=>'Run 10' ]],
[['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
	} 
	
	if($text == "RuN All" ){
		for($i=0;$i<11;$i++){ 
			shell_exec("pm2 stop C$i.php");
			shell_exec("pm2 start C$i.php");
			$BeRo["c$i"]["mode"] = "🟢" ;
 file_put_contents("BeRo.json",json_encode($BeRo,128|32|256));
			} 
	bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : $text 🦅
  
  - Iwill Running All
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
	} 
	
	if($text == "StoP"){
	bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>" 
 ༗ : $text 🦅
  
  - Choose Checker to Run Now
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'Stop 1']],
[['text'=>'Stop 2']],
[['text'=>'Stop 3']],
[['text'=>'Stop 3']],
[['text'=>'Stop 4' ]],
[['text'=>'Stop 5' ]],
[['text'=>'Stop 6' ]],
[['text'=>'Stop 7' ]],
[['text'=>'Stop 8' ]],
[['text'=>'Stop 9' ]],
[['text'=>'Stop 10' ]],
[['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
	} 
	
	if($text == "StoP All"){
		for($i=0;$i<11;$i++){ 
			shell_exec("pm2 stop C$i.php");
			shell_exec("pkill -f C$i.php");
			$BeRo["c$i"]["mode"] = "🔴" ;
 file_put_contents("BeRo.json",json_encode($BeRo,128|32|256));
			} 
	bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : $text 🦅
  
  - Iwill Stopping All
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
[['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
	} 
	
	if ( preg_match ( '/Run/', $text)) {
		$r = explode ('Run ' , $text)[1] ;
		if ( $r < 11){
		bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : Checker ❲ $r ❳ Will Started
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
 shell_exec("pm2 stop C$r.php");
    shell_exec("pm2 start C$r.php");
 $BeRo["c$r"]["mode"] = "🟢" ;
 file_put_contents("BeRo.json",json_encode($BeRo,128|32|256));
		}
		}
		if ( preg_match ( '/Stop/', $text)) {
		$r = explode ('Stop ' , $text)[1] ;
		if ( $r < 11){
		bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : Checker ❲ $r ❳ Will Stoped
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
 
    shell_exec("pm2 stop C$r.php");
    shell_exec("pkill -f C$r.php");
    $BeRo["c$r"]["mode"] = "🔴" ;
file_put_contents("BeRo.json",json_encode($BeRo,128|32|256));
		}
		}  
	
	
	if ( preg_match ( '/Delete LogiN/', $text)) {
		$r = explode ('Delete LogiN ' , $text)[1] ;
		if ( $r < 11){
		bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : Login ❲ $r ❳ Will Deleteed
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
 
    $uu = $r;
shell_exec("pm2 stop C$uu.php");
system('rm -rf $uu.madeline');
system('rm -rf $uu.madeline.lock');
system('rm -rf $uu.madeline.lightState.php');
system('rm -rf $uu.madeline.lightState.php.lock');
system('rm -rf $uu.madeline.safe.php');
system('rm -rf $uu.madeline.safe.php.lock');
unlink("$uu.madeline"); 
unlink("$uu.madeline.lock");
unlink("$uu.madeline.lightState.php");
unlink("$uu.madeline.lightState.php.lock");
unlink("$uu.madeline.safe.php");
unlink("$uu.madeline.safe.php.lock"); 
shell_exec("pkill -f C1.php");
		}
		}  
	
	
	if ( preg_match ( '/Login/', $text)) {
		$r = explode ('Login ' , $text)[1] ;
		if ( $r < 11){
			if ($BeRo["c"]["cc0"] !="DelEte") {
		bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : Checker ❲ $r ❳ Send PHONE number 
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
    unlink("$r.madeline");
	unlink("$r.madeline.lock"); 
    shell_exec("pm2 stop $r.php");
	system('php login.php'); 
$BeRo["c"]["step$r"] = 2;
$BeRo["c"]["ster"] = $r;
file_put_contents("BeRo.json",json_encode($BeRo,128|32|256));
		} else {
			bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : Now Send Users To Delete in List $r
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
$BeRo["c"]["cc"] = "DelUser";
$BeRo["c"]["chk"] = "$r";
file_put_contents("BeRo.json",json_encode($BeRo,128|32|256));
			} 
		} 
		} 
		
		if ( preg_match ( '/List ->/', $text)) {
		$r = explode ('List -> ', $text)[1] ;
		if ( $r < 11){
		bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : Done Clear All In list ❲ $r ❳
 ༗ : All users in List ❲ *". count(explode("\n", file_get_contents("users$r"))). "* ❳
",
'parse_mode' => "markdown", 
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
file_put_contents ("users$r", null) ;
		} 
		} 
		
	if ( preg_match ( '/List #/', $text)) {
		$r = explode ('List #', $text)[1] ;
		if ( $r < 11){
			if ($BeRo["c"]["ccc"] !="DelEte") {
		bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : Now Send Users To Add To List $r
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
$BeRo["c"]["cc"] = "AddUser";
$BeRo["c"]["chk"] = "$r";
file_put_contents("BeRo.json",json_encode($BeRo,128|32|256));
		} else {
			bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : Now Send Users To Delete in List $r
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
$BeRo["c"]["cc"] = "DelUser";
$BeRo["c"]["chk"] = "$r";
file_put_contents("BeRo.json",json_encode($BeRo,128|32|256));
			} 
		} 
		} 
		
		if($text and $BeRo["c"]["cc"] == "AddUser") {
			if(!preg_match ("/List #/", $text)) {
				if($text != file_get_contents("updBero")) {
					file_put_contents ("updBero", $text) ;
			$r=$BeRo["c"]["chk"];
			foreach ( explode ( "\n", $text) as $t) {
				if(preg_match ( "/@/" ,$t)) {
					$t=explode("@",$t)[1];
				if(!preg_match("/$t/", file_get_contents ("users$r"))) {
				file_put_contents ( "users$r", file_get_contents ("users$r")."\n$t" );
				$users = $users."\n@$t";
				  } 
				} 
			} 
			if($users) {
			bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : Done Save Users in List $r
----------------------------
  - All users In List Users :
  $users
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
$BeRo["c"]["cc"] = null;
$BeRo["c"]["chk"] = null;
file_put_contents("BeRo.json",json_encode($BeRo,128|32|256));
}  
		} 
		} 
		} 
		
if($text and $BeRo["c"]["cc"] == "DelUser") {
			$r=$BeRo["c"]["chk"];
			foreach ( explode ( "\n", $text) as $t) {
				if(preg_match ( "/@/" ,$t)) {
					$t=explode("@",$t)[1];
				if(!preg_match("/$t/", file_get_contents ("users$r"))) {
					$u=str_replace($t, null, file_get_contents ("users$r"));
				$vv=file_put_contents ( "users$r", $u);
				$users = $users."\n@$t";
				  } 
				} 
			} 
			if($users ) {
			bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : Done Save Users in List $r
----------------------------
  - Done Delete This Users
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
$BeRo["c"]["cc"] = null;
$BeRo["c"]["chk"] = null;
file_put_contents("BeRo.json",json_encode($BeRo,128|32|256));
} 
		} 
		
	if($text == "/restLoops") {
		for($i=0;$i<11;$i++){
			file_put_contents ("loops$i", "0" );
} 
		bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : Done Reset Loops iN All Checkers
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
		} 
	
	if ( preg_match ( '/restLoop/', $text)) {
		$r = explode ('restLoop', $text)[1] ;
		if($r !="s") {
		bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
 ༗ : Done Reset Loops /Checker$r
",
'inline_keyboard'=>true,
'reply_markup'=>json_encode([
'keyboard'=>[
          [['text'=>'❲ Back ❳']],
      ] 
  ]),'resize_keyboard'=>true 
]);
file_put_contents ("loops$r", "0" );
		} 
		} 
		
}catch(Exception $e) {
  bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- There is Errors try again.",
]);
continue;
} 


}
$lastupdid = $upd['result'][0]['update_id'] + 1; 
}
}
