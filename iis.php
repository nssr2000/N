<?php 
// alsead / mhmad
ob_start();

$API_KEY = '6343930391:AAENm8EBmXH36gqIIe3n8FnmAfctXMaPlg8';
define('API_KEY',$API_KEY);
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
        return json_decode($res);
    }
}
 function sendmessage($chat_id, $text, $model){
	bot('sendMessage',[
	'chat_id'=>$chat_id,
	'text'=>$text,
	'parse_mode'=>$mode
	]);
	}
	function sendaction($chat_id, $action){
	bot('sendchataction',[
	'chat_id'=>$chat_id,
	'action'=>$action
	]);
	}
	function Forward($KojaShe,$AzKoja,$KodomMSG)
{
    bot('ForwardMessage',[
        'chat_id'=>$KojaShe,
        'from_chat_id'=>$AzKoja,
        'message_id'=>$KodomMSG
    ]);
}
function sendphoto($chat_id, $photo, $action){
	bot('sendphoto',[
	'chat_id'=>$chat_id,
	'photo'=>$photo,
	'action'=>$action
	]);
	}
	function objectToArrays($object)
    {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return array_map("objectToArrays", $object);
    }
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
mkdir("data/$from_id");
$message_id = $message->message_id;
$from_id = $message->from->id;
$text = $message->text;
$ali = file_get_contents("data/$from_id/kro_iraq");
$ADMIN = 6847586911
$to =  file_get_contents("data/$from_id/token.txt");
$url =  file_get_contents("data/$from_id/url.txt");
if($text == "/start"){
if (!file_exists("data/$from_id/kro_iraq")) {
        mkdir("data/$from_id");
        file_put_contents("data/$from_id/kro_iraq","none");
        $myfile2 = fopen("Member.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "$from_id\n");
        fclose($myfile2);
    }
    
        sendAction($chat_id, 'typing');
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"*مرحبا بك عزيزي $nambot 👋
ايديك $from_id 🆔

بوت عمل ويب هوك 🖲
 يمكنك في هذا البوت ربط بوتك🔥
 عمل ويب هوك مجانا🛎
 اذا تريد عمل ويب هوك☄
اختر ماتريد من الازرار😇👇

Creator : @TSGHZ",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"عمل ويب هوك✅"],['text'=>"معلومات التوكن🔎"]],
	[['text'=>"حذف ويب هوك❌"]]
	]
	])
	]);
	}
elseif($text == "↪️ القائمة الرئيسية"){
file_put_contents("data/$from_id/kro_iraq","no");
file_put_contents("data/$from_id/token.txt","no");
file_put_contents("data/$from_id/url.txt","no");
        sendAction($chat_id, 'typing');
	bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"تم الرجوع الئ القائمة الرئيسية",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"عمل ويب هوك✅"],['text'=>"معلومات التوكن🔎"]],
	[['text'=>"حذف ويب هوك❌"]]
	]
	])
	]);
	}
elseif($text == "عمل ويب هوك✅"){
     sendAction($chat_id, 'typing');
			file_put_contents("data/$from_id/kro_iraq","to");
				bot('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"قم بارسال التوكن✅",
                 'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"↪️ القائمة الرئيسية"]
	],
	]
	])
	]);
	}
elseif($ali == "to"){
$token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    if ($ok != 1) {
        SendMessage($chat_id, "");
    } else{
    file_put_contents("data/$from_id/kro_iraq","url");
    file_put_contents("data/$from_id/token.txt",$text);
	SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"قم بارسال رابط الملف✅",
  ]);
}
}
elseif($ali == "url"){
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$text))
  {
  SendAction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"رابط الملف خطا❌",
  ]);
 }
 else {
 file_put_contents("data/$from_id/kro_iraq","no");
 file_put_contents("data/$from_id/url.txt",$text);
 	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"جار التحميل🔆",
  ]);
  sleep(1);
   	bot('editmessagetext',[
    'chat_id'=>$chat_id,
        'message_id'=>$message_id + 1,
    'text'=>"جار التحميل🔆",
  ]);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"*هل انت متاكد من عمل ويب هوك⁉️

• التوكن✅
- $to

• رابط الملف✅
- $text

اضغط /kro للتاكيد*",
  ]);
 }
}
elseif($text == "/kro" ){
if($to != "no"){
 	 	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"جار التحميل🔆",
  ]);
  sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
      'text'=>"جار التحميل🔆",
  ]);
  file_get_contents("https://api.telegram.org/bot$to/setwebhook?url=$url");
    sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
      'text'=>"جار التحميل🔆",
  ]);
  sleep(1);
  file_put_contents("data/$from_id/kro_iraq","no");
	bot('sendmessage',[
	'chat_id'=>$chat_id,
		    'message_id'=>$message_id + 1,
	'text'=>"تم عمل ويب هوك بنجاح✅",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"عمل ويب هوك✅"],['text'=>"معلومات التوكن🔎"]],
	[['text'=>"حذف ويب هوك❌"]]
	]
	])
	]);
}

}
elseif($text == "معلومات التوكن🔎" ){
    file_put_contents("data/$from_id/kro_iraq","token");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"قم بارسال التوكن✅",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'↪️ القائمة الرئيسية']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "token"){
$token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    if ($ok != 1) {
        SendMessage($chat_id, "التوكن خطا❌");
    } else{
    file_put_contents("data/$from_id/kro_iraw","no");
    
	SendAction($chat_id,'typing');
 	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"جار التحميل🔆",
  ]);
  sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"
📝 مـعـلـومـات الـتـوكـن هـي :
• مـعـرف الـبـوت
- @$un 
• ايـدي الـبـوت
- $id
• اسـم الـبـوت
- $fr
• رابـط الـمـلـف
- $ur
",
  ]);
}
}
elseif($text == "حذف ويب هوك❌" ){
    file_put_contents("data/$from_id/kro_iraq","del");
	sendaction($chat_id,'typing');
	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"قم بارسال التوكن لحذف ويب هوك❌",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
	  [['text'=>'↪️ القائمة الرئيسية']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($ali == "del"){
$token = $text;

    $ali1 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getwebhookinfo"));
    $ali2 = json_decode(file_get_contents("https://api.telegram.org/bot" . $token . "/getme"));
    $tik2 = objectToArrays($ali1);
    $ur = $tik2["result"]["url"];
    $ok2 = $tik2["ok"];
    $tik1 = objectToArrays($ali2);
    $un = $tik1["result"]["username"];
    $fr = $tik1["result"]["first_name"];
    $id = $tik1["result"]["id"];
    $ok = $tik1["ok"];
    if ($ok != 1) {
        SendMessage($chat_id, "التوكن خطا❌");
    } else{
    file_put_contents("data/$from_id/kro_iraq","no");
    
	SendAction($chat_id,'typing');
 	bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"جار التحميل🔆",
  ]);
  sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"جار التحميل🔆",
  ]);
}
file_get_contents("https://api.telegram.org/bot$text/deletewebhook");
sleep(1);
	bot('editmessagetext',[
    'chat_id'=>$chat_id,
     'message_id'=>$message_id + 1,
    'text'=>"تم حذف ويب هوك بنجاح✅",
  ]);
  sleep(1);
  file_put_contents("data/$from_id/kro_iraq","no");
	bot('sendmessage',[
	'chat_id'=>$chat_id,
		    'message_id'=>$message_id + 1,
	'text'=>"تم الرجوع الئ القائمة الرئيسية✅",
        'parse_mode'=>'MarkDown',
        	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[['text'=>"عمل ويب هوك✅"],['text'=>"معلومات التوكن🔎"]],
	[['text'=>"حذف ويب هوك❌"]]
	]
	])
	]);
}
?>
