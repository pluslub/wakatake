<?php
require "appmail.php";

$smail = new AppMail("auto_reply_mail_body.tmpl");

//subjectの設定処理
//$subject = str_replace("{\$site_name}", $_POST['site_name'],$_POST["auto_reply_mail_subject"]);
//$subject = str_replace("{\$form_title}", $_POST['form_title'],$subject);
$subject = $_POST["auto_reply_mail_subject"];
$smail->setSubject($subject);

/**
 * @param UTF-8に変換する
 */
function convert($str)
{
	return mb_convert_encoding($str, "UTF-8", mb_detect_encoding($str) );
}

//ユーザー名の設定処理
$user_name = "";
if($_POST['value_user_name']) {
	$user_name = convert($_POST['value_user_name'])."様";
}

$order_list = explode(',',$_POST['order_field']);

//フォームからの送信内容の設定処理
$form_list = "";


$c = false;
foreach($order_list as $order){
	$label_str = $order;

	$value_str = str_replace("label","value",$label_str);
	$value = "";

	if(isset($_POST[$value_str])){
		$value = $_POST[$value_str];
	}
		
	if(isset($_POST[$label_str])){
		$c = true;
		$label = $_POST[$label_str];
		$form_list .= <<< DOC_END
[${label}]
${value}\n\n
DOC_END;
	}
}
if($c){
	$form_list .= <<< DOC_END
\n
DOC_END;
}
// 文字コードを変換
$form_list = convert($form_list);
$order_list = convert($order_list);

$smail->setHeaders($_POST["auto_reply_mail_header"]);
$smail->setFooters($_POST["auto_reply_mail_footer"]);

if($_POST["auto_reply_mail_flag"] == "0"){
	$res = $smail->send($_POST["value_user_email"], $_POST["admin_reply_email"], $_POST["admin_reply_email"], array(
		"user_name" => $user_name,
		"form_list" => $form_list,
		"auto_reply_mail_header" => convert($_POST["auto_reply_mail_header"]),
		"auto_reply_mail_footer" => convert($_POST["auto_reply_mail_footer"])
		));
	 	
	if($res){
		echo "success send mail. \n";
	} else {
		echo "error send mail. \n";
	}
}
//以下管理者メール
$amail = new AppMail("admin_mail_body.tmpl");

//subjectの設定処理
//$admin_subject = str_replace("{\$site_name}", $_POST['site_name'],$_POST["admin_mail_subject"]);
//$admin_subject = str_replace("{\$form_title}", $_POST['form_title'],$subject);
$admin_subject = $_POST["admin_mail_subject"];
$amail->setSubject($admin_subject);

//管理者独自のパラメータ
$agent = getenv("HTTP_USER_AGENT");
$ip = getenv("REMOTE_ADDR");
$host = getenv("REMOTE_HOST");

$amail->setHeaders($_POST["auto_reply_mail_header"]);
$res = $amail->send($_POST["admin_email"], $_POST["value_user_email"], $_POST["value_user_email"], array(
	"user_name" => $user_name,
	"form_list" => $form_list,
	"agent" => $agent,
	"ip" => $ip,
	"host" => $host,
	"send_date" => date('Y/m/d H:i:s')
	));
 	
if($res)
{
	echo "success admin_send mail. \n";
} else {
	echo "error admin_send mail. \n";
}

?>
