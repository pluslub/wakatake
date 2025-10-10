<?php

//==========================================================//
//パスワードの再設定メール配信
//最終更新　2012/12/14
//==========================================================//

$umail	=	$_POST['umail'];

if($umail){
	//認証ここから
	$setting		=	"../works/conf/admin.dat";
	$fp = file($setting);
	$mail_error = array();
	
	$ini	=	array($fp[0], $fp[1], null);
	
	foreach($fp as $value){
			$value	=	base64_decode($value);
			$data	=	explode(":",$value);
			
			
			if($umail == $data[2]){
			
			//メール送信処理
			
				//文字設定
					mb_language("Ja");
					mb_internal_encoding("UTF-8");
					
				//送信元アドレス
					$mailFrom = mb_encode_mimeheader(mb_convert_encoding("ティアードワークスサポート","JIS","utf-8")).'<cs@sunfirst.co.jp>';
					
				//送信先アドレス
					$to = "$umail";
					
				//返信先
					$reply_addr = "cs@sunfirst.co.jp";
					
				//エラー戻り先
					$Return = "cs@sunfirst.co.jp";
					
					
				//タイトル
					$subject = "パスワードお問い合わせ";
					
				//配信用ヘッダー
					$add_header  = "From:$mailFrom\r\n";
					$add_header .= "Reply-To:$reply_addr\r\n";
					$add_header .= "Return-Path:$Return\r\n";
					$add_header .= "X-Mailer : PHP/" . phpversion();
					
				//パスワード生成
				
					//仮パスワード元文字列
						$strinit = "abcdefghkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ12345679";
						$strarray = str_split($strinit);
						
					//15文字取得
						for ($i = 0, $pass = null; $i < 15; $i++) {
							$pass .= $strarray[array_rand($strarray, 1)];
						}
						
				//設定ファイル書き換え
				
					//変更内容
						$ini[2]	=	$data[0] . ":" . $pass . ":" . $umail;
						$ini[2]	=	base64_encode($ini[2])."\n";
						
						$fls	=	fopen($setting , 'w+');
						
							//変更内容書き込み
								foreach($ini as $val){
									@fwrite( $fls, $val, strlen($val) );
								}
								
						fclose($fls);
						
				//メール送信処理
					$body .= "パスワードお問い合わせ"."\r\n";
					$body .= "新しく作られたパスワードは以下のとおりです\r\n";
					$body .= "仮パスワード：   " . "$pass"."  \r\n";
					$body .= "ログイン後設定画面にて必ずパスワードを変更してください。\r\n";
					$body .= "************************************************************\r\n";
					$body .= "このメールアドレスは配信専用です。\r\n";
					$body .= "返信いただいてもお答えすることができませんので\r\n";
					$body .= "サポートをご希望のお客様は弊社サポートまでご連絡ください。\r\n";
					$body .= "************************************************************";
					
					
				$mail_error	=	1;
				
			}else{
			
				$mail_error	=	2;
				
			}
			
			
	}
	
}else{

	$mail_error	=	3;
	
}

//タイトル設定
$title	=	"Analysis パスワード再設定";

if(!$umail && $mail_error == 3){
	
	//デフォルト表示
	include './tpl/user_mail.php';
	
}elseif($umail && $mail_error == 1){
	
	//送信
	mb_send_mail($to,$subject,$body,$add_header);
	
	//仮表示
	//メール送信後のテンプレート
	include './tpl/send_mail.php';
	
}else{
	
	//メールエラー時の表示
	include './tpl/user_mail.php';
	
}
?>