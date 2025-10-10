<?php

//==========================================================//
//個別集計クラス
//最終更新　2012/12/14
//==========================================================//

//ヘッダー
	include './tpl/header.php';

//メニュー
	include './tpl/menu.php';

//除外ホスト設定画面
	$host_file	=	"../works/conf/hosts_reject";
	
	$hosts	=	"";
	$hosts_temp	=	"";
	
	chmod($host_file , 0666);
	
	//変更したリストを書き込む
	if($_POST['block_list']){
			$block_list		=	$_POST['block_list'];
			$hosts_temp	=	explode("\n" , $block_list);
			$vals	=	array();
			
			//テキストエリア内のデータ書き出し
			
				//変更内容書き込み
				foreach($hosts_temp as $val){
					//空白行改行消し
					$val	=	preg_replace("/\r|\n/", "" , $val);
						
						if($val != ""){
							//データ改行
							$vals[]	=	$val . "\n";
						}
				}
				//配列を改行区切りへ
				
				$vals	=	implode("\n" , $vals);
				//var_dump($vals);
							//書き込み
							$fls	=	fopen($host_file , 'wb');
							if(@fwrite( $fls, $vals, strlen($vals) )){
							}
							fclose($fls);
			
			
	//データを削除したとき
	}elseif($_POST['block_list'] == "" && $_POST['hosts'] == "1"){
			$hosts	=	"";
			//テキストエリア内のデータ書き出し
			$fls	=	fopen($host_file , 'w+');
			@fwrite( $fls, $hosts, strlen($hosts) );
			fclose($fls);
	}else{
			$hosts	=	"";
	}
	
	//ログファイルディレクトリ
	$fp = file($host_file);
	
		foreach($fp as $value){
			if(!preg_match("/^\n/", $value) && !preg_match("/^\s/", $value)){
					$hosts	.=	$value;
			}
		}
	
	include './tpl/hosts.php';
	
?>