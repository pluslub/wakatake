<?php

//==========================================================//
//取得ログの保存
//最終更新　2012/12/14
//==========================================================//

//ログファイルの場所
//analysis/works/log/

//送信パラメータ
//('./cgiFolder/analysis/admin/index.php','新規サイト','D000000001','HOME','G000000001','','','userId','0')
//(パス,サイト名,サイトID,ページ名,ページID,サブページ名,サブページID,ユーザーID(不要),スマホ

//ログ形式
//キャッシュID,タイムスタンプ,検索エンジン,検索キーワード,ブラウザ,OS,言語,
//ページ名,ページID,サイト名,サイトID,サブページ名,サブページID,ユーザーID,スマホフラグ,
//リモートホスト,リモートアドレス,リンク元,表示ページ



//ログのパス設定
$path		=	"../works/log/";


//チェック用ログ保存場所
$path2		=	"../works/log/check/";
/*
//なければディレクトリを作る
//チェック用
if(is_dir($path2) === false){
	
	mkdir($path2, 0777);
	chmod($path2, 0777);
}
*/
//拡張子設定
$exp		=	".log";


//パラメータ取得

$site_temp		=	$_GET['site'];

//エンコードされていたらデコードする
	if(preg_match_all('/%[a-zA-Z0-9][a-zA-Z0-9]+/', $site_temp)){
				$site_temp	=	urldecode($site_temp);
				$site		=	mb_convert_encoding($site_temp, "UTF-8", "auto");
	}else{
				$site		=	mb_convert_encoding($site_temp, "UTF-8", "auto");
	}

$siteId		=	$_GET['siteId'];

//エンコードされていたらデコードする
$page_temp		=	$_GET['page'];

	if(preg_match_all('/%[a-zA-Z0-9][a-zA-Z0-9]+/',$page_temp)){
				$page_temp	=	urldecode($page_temp);
				$page		=	mb_convert_encoding($page_temp, "UTF-8", "auto");
	}else{
				$page		=	$page_temp;
	}
	
$pageId		=	$_GET['pageId'];

//エンコードされていたらデコードする
$sub_temp		=	$_GET['sub'];

	if(preg_match_all('/%[a-zA-Z0-9][a-zA-Z0-9]+/',$sub_temp)){
				$sub_temp	=	urldecode($sub_temp);
				$sub		=	mb_convert_encoding($sub_temp, "UTF-8", "auto");
	}else{
				$sub		=	mb_convert_encoding($sub_temp, "UTF-8", "auto");
	}
	
$subId		=	$_GET['subId'];
$uid		=	$_GET['uid'];
//$attrのPCページは値なし
//スマホページは１が入る
$attr		=	$_GET['attr'];
$agent		=	$_GET['ac_ua'];
$lang		=	$_GET['ac_lang'];
$referer	=	$_GET['ac_referer'];
//$referer	=	$_SERVER['HTTP_REFERER'];

//エンコードされていたらデコードする
$url_temp		=	$_GET['ac_url'];
	if(preg_match_all('/%[a-zA-Z0-9][a-zA-Z0-9]+/',$url_temp)){
				$url	=	urldecode($url_temp);
	}else{
				$url	=	$url_temp;
	}
	
$r_addr		=	$_SERVER['REMOTE_ADDR'];
$r_host		=	$_SERVER['REMOTE_HOST'];



//リモートホストがない場合リモートアドレスを入力
if(!$r_host){
				$r_host		=	$r_addr;
}

//アクセス時間取得
$time		=	$_SERVER['REQUEST_TIME'];


//UA分割判定

	
	//UA用クラス読み込み
	include './sorce/user_agent.php';
	$user_agent	=	new user_agent();
	
	//ブラウザ、OS、検索エンジン、キーワードを判別
	$browser	=	$user_agent->agent($agent);
	$os			=	$user_agent->os($agent);
	$engine		=	$user_agent->engine($referer);
	$keyword	=	$user_agent->keyword($referer);


//除外ホストとのマッチング
$fp = file('../works/conf/hosts_reject');
if($fp){
		$flag	=	0;
		//ドメインチェック
		foreach($fp as $value){
							
							//IPアドレスのマッチング
							if(preg_match("/[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}/", $value)){
									//．をエスケープ
									$value	=	preg_replace("/\/.\//" , "\." , $value);
									$r_host		=	$r_addr;
									
							}
							$value	=	preg_replace("/\r|\n/", "" , $value);
							$val	=	"/".$value."/i";
							if(preg_match($val , $r_host)){
									//falseなら書き込まない
									$flag	=	2;
							}elseif(!preg_match($val , $r_host) && $flag != 2){
									//trueならログに書き込む
									$flag	=	1;
							}
		}
//除外ホストが登録されていない場合
}else{
	$flag	=	1;
}

//日付取得
$date	=	date(ymd);

//ログファイルの取得
$file_name	=	$path . $date . $exp;

//チェック用2012/07/06
//$file_name2	=	$path2 . "checklog_" .$date . $exp;


if($flag == 1){
		//取得パラメーター格納
		$log = "\"\",\"$time\",\"$engine\",\"$keyword\",\"$browser\",\"$os\",\"$lang\",\"$page\",\"$pageId\",\"$site\",\"$siteId\",\"$sub\",\"$subId\",\"$uid\",\"$attr\",\"$r_host\",\"$r_addr\",\"$referer\",\"$url\"\n";
		
		//書き込み
		$fp = fopen($file_name, "a");
		@fwrite( $fp, $log, strlen($log) );
		fclose($fp);
		
		/*
		//ここからチェック用2012/07/06
		$date2	=	date(Y) . "_" . date(m) . "_" . date(d) . "_" . date(H) . "_" . date(i) . "_" . date(s);
		
		$log2 = "\"$date2\",\"$agent\",\"$referer\",\"$lang\",\"$site\",\"$siteId\",\"$page\",\"$pageId\",\"$sub\",\"$subId\",\"$uid\",\"$url\",\"$r_addr\",\"$r_host\",\"$os\",\"$engine\",\"$keyword\"\n";
		
		
		//書き込み
		$fp2 = fopen($file_name2, "a");
		@fwrite( $fp2, $log2, strlen($log2) );
		fclose($fp2);
		//ここまでチェック用
		*/
}


exit;
?>