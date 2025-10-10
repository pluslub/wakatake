<?php
//==========================================================//
//アクセス解析の表示設定画面など
//最終更新　2012/12/14
//==========================================================//

//ヘッダー
	include './tpl/header.php';

//メニュー
	include './tpl/menu.php';


if(!$_POST{'contents'}){
		$contents		=	$_GET{'contents'};
}else{
		$contents		=	$_POST{'contents'};
}

$ac			=	$_POST['ac'];
$id			=	$_POST['newUid'];
$pwd1		=	$_POST['newPwd1'];
$pwd2		=	$_POST['newPwd2'];
$mail1		=	$_POST['newMaddr1'];
$mail2		=	$_POST['newMaddr2'];

$admin_file	=	'../works/conf/admin.dat';
chmod($admin_file , 0666);

if($ac == "admin2" && $id && $pwd1 && $pwd2 && $mail1 && $mail2){
	
	if($pwd1 != $pwd2){
			$error3	=	"パスワードが間違っています。\n";
	}
	if($mail1 != $mail2){
			$error5	=	"メールアドレスが間違っています。\n";
	}
	if(!$error3 && !$error5){
			
			$fp = file($admin_file);
			
			$ini	=	array($fp[0], null, null);
			
			//旧verの時、新しく書き換える
			if(preg_match('/admin/' , $ini[0])){
					$ini[0]	=	"cm9vdDpJUk01alp0enBIOnN5c3RlbUB0aWVyZWR3b3Jrcy5jb20NCg==";
					
			}
			
			//ユーザー追加時にadminパスワード変更
			$strinit = "abcdefghkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ12345679";
			$strarray = str_split($strinit);
			$ini[1]	=	"admin:" . $strarray . ":cs@sunfirst.co.jp";
			$ini[1]	=	base64_encode($ini[1])."\n";
			
			$ini[2]	=	$id . ":" . $pwd1 . ":" . $mail1;
			$ini[2]	=	base64_encode($ini[2])."\n";
			
					$fls	=	fopen($admin_file , 'w+');
					
					//変更内容書き込み
								foreach($ini as $val){
									@fwrite( $fls, $val, strlen($val) );
								}
								
					fclose($fls);
			
			include './tpl/admin2.php';
	}else{
		$user	=	$id;
		$mail	=	$mail1;
		include './tpl/admin.php';
	}
	
	
}elseif($ac == "admin2"){
	if(!$id){
		$error1	=	"管理者IDが入力されていません。\n";
	}else{
		$user	=	$id;
	}
	if(!$pwd1){
		$error2	=	"パスワードが入力されていません。\n";
	}
	if(!$pwd2){
		$error3	=	"パスワード確認が入力されていません。\n";
	}
	if(!$mail1){
		$error4	=	"メールアドレスが入力されていません。\n";
	}else{
		$mail	=	$mail1;
	}
	if(!$mail2){
		$error5	=	"メールアドレス確認が入力されていません。\n";
	}
	
	include './tpl/admin.php';
	
}else{
	
	//データ取得
	$fp = file($admin_file);
	
	$i	=	0;
	foreach($fp as $value){
			$value	=	base64_decode($value);
			$data	=	explode(":",$value);
			
			if($i	==	2){
			
				$user	=	$data[0];
				$mail	=	$data[2];
				
			}
			$i++;
	}
	
	include './tpl/admin.php';
	
}
