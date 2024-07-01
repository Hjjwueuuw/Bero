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
$settings['app_info']['api_id'] = 13167118;
$settings['app_info']['api_hash'] = '6927e2eb3bfcd393358f0996811441fd';
$MadelineProto = new \danog\MadelineProto\API('8.madeline',$settings);
$MadelineProto->start();
$x=0;
do{
file_put_contents('loops8' ,$x);
$users = explode("\n",file_get_contents("users8"));
foreach($users as $user){
    $kd = strlen($user);
    if($user != ""){
    try{$MadelineProto->messages->getPeerDialogs(['peers' => [$user]]);
        $x++;
    }catch (\danog\MadelineProto\Exception | \danog\MadelineProto\RPCErrorException $e) {
                try{$MadelineProto->account->updateUsername(['username'=>$user]);
                    bot('sendvideo', ['video' =>'https://telegra.ph/file/c0f0799b66d88e42feeac.mp4', 'chat_id' => file_get_contents("ID"), 'caption' => "- Very sorry for the reason that you did not take it 💠\n- You can try it over and over until you overcome me 🔱\nWe are the strongest not thinking about our defeat, dear\n- Catch ❲ 8 ❳ \n- User Claimed ❲ @$user ❳ \n Loops Are ❲ $x ❳"]);
                    bot('sendvideo', ['video' =>'https://telegra.ph/file/c0f0799b66d88e42feeac.mp4', 'chat_id' => file_get_contents("ID"), 'caption' => "⌯ Catch ❲ 8 ❳ New Take 🦅'",]);
                    $data = str_replace("\n".$user,"", file_get_contents("users8"));
                    file_put_contents("users8", $data);
                }catch(Exception $e){
                    echo $e->getMessage();
                    if($e->getMessage() == "USERNAME_INVALID"){
                        bot('sendvideo', ['video' =>'https://telegra.ph/file/c0f0799b66d88e42feeac.mp4', 'chat_id' => file_get_contents("ID"), 'caption' => "Catch ❲ 8 ❳ \n is Band ↣ @$user",]);
                        $data = str_replace($user,"", file_get_contents("users8"));
                        file_put_contents("users8", $data);
                    }elseif($e->getMessage() == "This peer is not present in the internal peer database"){
                        $MadelineProto->account->updateUsername(['username'=>$user]);
                    }elseif($e->getMessage() == "USERNAME_OCCUPIED"){
                        bot('sendvideo', ['video' =>'https://telegra.ph/file/c0f0799b66d88e42feeac.mp4', 'chat_id' => file_get_contents("ID"), 'caption' => "Catch ❲ 8 ❳  \n FLood 1500 ↣ @$user",]);
                        $data = str_replace($user,"", file_get_contents("users8"));
                        file_put_contents("users8", $data);
                    }else{
                        bot('sendvideo', ['video' =>'https://telegra.ph/file/c0f0799b66d88e42feeac.mp4', 'chat_id' => file_get_contents("ID"), 'caption' =>  "Catch ❲ 8 ❳  \n Error @$user ".$e->getMessage()]);
                        $info = json_decode(file_get_contents('info.json'),true);
                        $info["num1"] = "delet";file_put_contents('info.json', json_encode($info));
                    }     
                }
            }
        } 
    }
  }while(1);