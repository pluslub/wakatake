<?php

//==========================================================//
//アクセス解析の受け皿ファイル
//アクセス解析の表示ファイル
//
// TieredWorks アクセス解析 ver.1.18
//
//更新　2012/01/27：解析レポートの表示バグ修正
//更新　2012/06/14：解析レポートの集計バグ修正(年月集計で月日まで取得していた。)
//更新　2012/06/27：細かい表示バグ等の修正。ユーザーエージェント情報の更新
//更新　2012/07/10：検索キーワードの文字化け対策。改行対策。
//更新　2012/07/17：集計の動作を調整。
//更新　2012/12/14：管理者情報が初期化してしまう不具合を修正
//更新　2012/12/17：管理者情報の動作を修正（setting.ini)
//==========================================================//

//================================================
//ログ以外のパラメーター
//================================================

//ログ送信の判定用に取得する
if($_GET{'site'}){
		$site			=	$_GET['site'];
}elseif($_POST['site']){
		$site			=	$_POST['site'];
}
//コンテンツページの切り替えパラメーター
if($_GET['contents']){
		$contents		=	$_GET['contents'];
}elseif($_POST['contents']){
		$contents		=	$_POST['contents'];
}
//================================================
//URLログの記録
//================================================
if($site){
//ページからの入力形式
//var req= ana.exec('./cgiFolder/analysis/admin/index.php','新規サイト','D000000001','HOME','G000000001','','','userId','0');

//ログ取得書き込み
	include './sorce/log_write.php';


//================================================
//================================================
//
//  アクセス解析表示用
//  各種解析と設定関連
//
//================================================
//================================================
}else{

//================================================
//初期設定
//================================================
$config		=	'../works/conf/admin.dat';

$key	=	'"sunf0410';
if(!file_exists($config)){

		include './sorce/config.php';
		create_config($config,$key);


}


//================================================
//ログインのCOOKIE書き込み
//================================================
				if($_POST['uid'] && $_POST['pwd']){
						//COOKIE設定
						$uid	=	$_POST['uid'];
						$pass	=	$_POST['pwd'];
						
						if($uid && $pass){
								include './sorce/login.php';
								$loginform	=	new loginform();
								$login	=	$loginform->login($uid,$pass,$key);
								
								if($login == "ck"){
											$c_uid		=	$uid;
											$c_check	=	"logined";
								}
						}
				}

//================================================
//ログイン
//================================================
		if(!$_COOKIE['Analysis'] && $contents != "mail" && !$c_check){
						
						$title	=	"Analysis ログ解析";
						if($_POST['logins'] == "on"){
								if(!$_POST['uid'] || !$_POST['pwd']){
										$login2	=	"2";
								}
						}
						include './tpl/login.php';
						$uid_chk	=	"";
						$pwd_chk	=	"";
						$chk		=	"";
						
						
						
						exit;
						

//================================================
//クッキーチェック
//================================================
		}else if($_COOKIE['Analysis']){
		
				//COOKIE読み込み
				$cookie	=	explode("_",$_COOKIE['Analysis']);
				
				$c_uid		=	$cookie[0];
				$c_check	=	$cookie[1];
				
						
//================================================
//パスワード再設定
//================================================
		}else if($contents == "mail" && !$c_check){
				
						$title	=	"Analysis パスワード再設定";
						
						include './user_mail.php';
						exit;
				}

//================================================
//コンテンツ以外
//================================================
//================================================
//ログアウト
//================================================

		if($contents == "logout" && $c_check){
					if($_COOKIE['Analysis']){
							//COOKIE削除
							$name	=	"Analysis";
							$value = $uid.",logined";
							$timeout = time() - 18000;
							setcookie ($name,$value,$timeout);
					}
					$title	=	"Analysis ログイン";
					$contents	=	"";
					$c_check	=	"";
					$c_uid		=	"";
					$login		=	"";
					
					include './tpl/logout.php';
					exit;
		}else{
//================================================
//コンテンツ表示
//================================================

//================================================
//解析レポートを表示
//================================================
				if($contents == "report" && $c_check){
				
							$title	=	"Analysis ログ解析";
							
							include './tpl/log_setting.php';
							exit;
							
				}else if($contents == "log_report" && $c_check){
				
							$title	=	"Analysis ログ解析";
							
							include './tpl/log_read.php';
							exit;
							
//================================================
//管理者情報設定
//================================================
				}else if($contents == "admin" && $c_check){
				
							$title	=	"Analysis 管理者情報設定";
							
							include './sorce/admin.php';
							exit;
							
//================================================
//ログファイル削除
//================================================
				}else if($contents == "file" && $c_check){
				
							$title	=	"Analysis ログファイル削除";
							
							include './tpl/file.php';
							exit;
							
//================================================
//取得拒否ホスト設定
//================================================
				}else if($contents == "hosts" && $c_check){
				
							$title	=	"Analysis 取得拒否ホスト設定";
							
							include './sorce/hosts.php';
							exit;
							
//================================================
//初期表示
//================================================
				}else if($c_uid && $c_check && !$contents){
				
				//var_dump($c_uid,$c_check);
						$title	=	"Analysis ログ解析";
						include './tpl/log_setting.php';
						exit;
						
						
				}elseif($c_uid && $c_check && $contents == "start"){
				
						$title	=	"Analysis ログ解析";
						include './tpl/log_setting.php';
						exit;
				}
		}

}

?>