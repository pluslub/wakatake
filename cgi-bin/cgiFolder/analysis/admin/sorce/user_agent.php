<?php

//==========================================================//
//ユーザーエージェント情報
//最終更新　2012/07/10
//==========================================================//

/**
 *ユーザーエージェントの判定まとめ
 *IE,Firefoxはバージョンを記入
 *Chromeは開発速度が速いのでバージョン記入なし
 *そのほかはバージョン情報を記入しない
 *windows7以降は更新の時に追加しなければならない
 *2011/03/09時点でwindows8？が2013年リリース予定
 *2011/12/27 ゲーム機名、windowsPhone、BlackBerry、Firefoxのバージョン情報を追記
 *2012/06/14 windows9～11まで追記。解析不能を[その他]に名称変更。
 *2012/06/26 ブラウザのその他をIEとFfに追記。Mac OSが一部WinXPになっていたのを修正。
**/

class user_agent
{

		public function agent($u_agent){
			//ブラウザとバージョンの抽出（◕‿‿◕）
			//2012/06/26 更新
    		if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
     					
       					if(preg_match('/MSIE 6/i',$u_agent)){ 
       								$agent	=	"Internet Explorer 6";
       					}elseif(preg_match('/MSIE 7/i',$u_agent)){
       								$agent	=	"Internet Explorer 7";
       					}elseif(preg_match('/MSIE 8/i',$u_agent)){
       								$agent	=	"Internet Explorer 8";
       					}elseif(preg_match('/MSIE 9/i',$u_agent)){
       								$agent	=	"Internet Explorer 9";
       					}elseif(preg_match('/MSIE 10/i',$u_agent)){
       								$agent	=	"Internet Explorer 10";
       					}elseif(preg_match('/MSIE 11/i',$u_agent)){
       								$agent	=	"Internet Explorer 11";
       					}elseif(preg_match('/MSIE 12/i',$u_agent)){
       								$agent	=	"Internet Explorer 12";
       					}elseif(preg_match('/MSIE 13/i',$u_agent)){
       								$agent	=	"Internet Explorer 13";
       					}elseif(preg_match('/MSIE 14/i',$u_agent)){
       								$agent	=	"Internet Explorer 14";
       					}elseif(preg_match('/MSIE 15/i',$u_agent)){
       								$agent	=	"Internet Explorer 15";
       					}elseif(preg_match('/MSIE/i',$u_agent)){
       								$agent	=	"その他　Internet Explorer";
       					}
       					
    		}elseif(preg_match('/Firefox/i',$u_agent)){ 
    			//2012/06/26 更新
    					if(preg_match('/Firefox\/3/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 3.x";
    					}elseif(preg_match('/Firefox\/4/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 4.x";
    					}elseif(preg_match('/Firefox\/5/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 5.x";
    					}elseif(preg_match('/Firefox\/6/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 6.x";
    					}elseif(preg_match('/Firefox\/7/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 7.x";
    					}elseif(preg_match('/Firefox\/8/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 8.x";
    					}elseif(preg_match('/Firefox\/9/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 9.x";
    					}elseif(preg_match('/Firefox\/10/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 10.x";
    					}elseif(preg_match('/Firefox\/11/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 11.x";
    					}elseif(preg_match('/Firefox\/12/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 12.x";
    					}elseif(preg_match('/Firefox\/13/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 13.x";
    					}elseif(preg_match('/Firefox\/14/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 14.x";
    					}elseif(preg_match('/Firefox\/15/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 15.x";
    					}elseif(preg_match('/Firefox\/16/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 16.x";
    					}elseif(preg_match('/Firefox\/17/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 17.x";
    					}elseif(preg_match('/Firefox\/18/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 18.x";
    					}elseif(preg_match('/Firefox\/19/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 19.x";
    					}elseif(preg_match('/Firefox\/20/i',$u_agent)){
    								$agent	=	"Mozilla Firefox 20.x";
    					}elseif(preg_match('/Firefox/i',$u_agent)){
    								$agent	=	"その他　Mozilla Firefox";
    					}
    		}elseif(preg_match('/Chrome/i',$u_agent)){ 
        							$agent	=	'Google Chrome'; 
        	}elseif(preg_match('/Mobile/i',$u_agent) && preg_match('/Safari/i',$u_agent)){
        							$agent	=	'Mobile Safari'; 
    		}elseif(preg_match('/Safari/i',$u_agent)){ 
        							$agent	=	'Apple Safari';
    		}elseif(preg_match('/Opera/i',$u_agent)){ 
        							$agent	=	'Opera'; 
    		}elseif(preg_match('/Netscape/i',$u_agent)){ 
        							$agent	=	'Netscape'; 
    		}elseif(preg_match('/Lunascape/i',$u_agent)){ 
        							$agent	=	'Lunascape'; 
    		}elseif(preg_match('/Sleipnir/i',$u_agent)){ 
        							$agent	=	'Sleipnir'; 
    		}else{
    								$agent	=	'その他'; 
    		}
			return $agent;
		}
		
		public function os($u_agent){
			//ＯＳの抽出（◕‿‿◕）
			//Windows
			if(preg_match('/Windows XP/i',$u_agent)){
									$os	=	'Windows XP'; 
			}elseif(preg_match('/Windows NT 5\.1/i',$u_agent)){
									$os	=	'Windows XP'; 
			}elseif(preg_match('/Windows NT 5\.2/i',$u_agent)){
									$os	=	'Windows Server'; 
			}elseif(preg_match('/Windows Vista/i',$u_agent)){
									$os	=	'Windows Vista'; 
			}elseif(preg_match('/Windows NT 6\.0/i',$u_agent)){
									$os	=	'Windows Vista';
			}elseif(preg_match('/Windows NT 6\.1/i',$u_agent)){
									$os	=	'Windows 7';
			}elseif(preg_match('/Windows 7/i',$u_agent)){
									$os	=	'Windows 7'; 
			}elseif(preg_match('/Windows NT 6\.2/i',$u_agent)){
									$os	=	'Windows 8';
			}elseif(preg_match('/Windows 8/i',$u_agent)){
									$os	=	'Windows 8'; 
			}elseif(preg_match('/Windows 9/i',$u_agent)){
									$os	=	'Windows 9'; 
			}elseif(preg_match('/Windows 10/i',$u_agent)){
									$os	=	'Windows 10'; 
			}elseif(preg_match('/Windows 11/i',$u_agent)){
									$os	=	'Windows 11'; 
			}elseif(preg_match('/Windows CE/i',$u_agent)){
									$os	=	'Windows CE'; 
			}elseif(preg_match('/Windows Phone/i',$u_agent)){
									$os	=	'Windows Phone'; 
			}elseif(preg_match('/Windows/i',$u_agent)){
									$os	=	'その他　Windows';
			//Apple
			}elseif(preg_match('/iPad/i',$u_agent)){
									$os	=	'iPad'; 
			}elseif(preg_match('/iPod/i',$u_agent)){
			 						$os	=	'iPod';
			}elseif(preg_match('/iPhone OS/i',$u_agent)){
									$os	=	'iPhone OS'; 
			}elseif(preg_match('/Mac_PowerPC/i',$u_agent)){
									$os	=	'Macintosh PowerPC';
			}elseif(preg_match('/Mac OS X/i',$u_agent)){
									$os	=	'Macintosh OS X'; 
			}elseif(preg_match('/Macintosh OS/i',$u_agent)){
									$os	=	'Macintosh OS'; 
			}elseif(preg_match('/Macintosh/i',$u_agent)){
									$os	=	'その他　Macintosh'; 
			//Android
			}elseif(preg_match('/Android/i',$u_agent)){
									$os	=	'Android'; 
			//BlackBerry
			}elseif(preg_match('/BlackBerry/i',$u_agent)){
									$os	=	'BlackBerry'; 
			//UNIX系
			}elseif(preg_match('/Linux/i',$u_agent)){
									$os	=	'Linux'; 
			}elseif(preg_match('/FreeBSD/i',$u_agent)){
									$os	=	'FreeBSD'; 
			//ゲーム機
			}elseif(preg_match('/(PLAYSTATION 3/i',$u_agent)){
									$os	=	'PLAYSTATION 3'; 
			}elseif(preg_match('/PlayStation Portable/i',$u_agent)){
									$os	=	'PlayStation Portable'; 
			}elseif(preg_match('/PlayStation Vita/i',$u_agent)){
									$os	=	'PlayStation Vita'; 
			}elseif(preg_match('/Nintendo Wii/i',$u_agent)){
									$os	=	'Nintendo Wii'; 
			}elseif(preg_match('/Nintendo 3DS/i',$u_agent)){
									$os	=	'Nintendo 3DS'; 
			}else{
									$os	=	'その他'; 
			}
			return $os;
		}
		
		public function engine($referer){
			//検索エンジンの抽出（◕‿‿◕）
			if(preg_match('/search\.yahoo\.co\.jp/i',$referer)){
								$engine	=	'YAHOO! JAPAN';
			}elseif(preg_match('/google\.co\.jp/i',$referer)){
								$engine	=	'Google';
			}elseif(preg_match('/search\.goo\.ne\.jp/i',$referer)){
								$engine	=	'goo';
			}elseif(preg_match('/bing\.com\/search/i',$referer)){
								$engine	=	'bing MSN';
			}elseif(preg_match('/excite\.co\.jp\/search\.gw/i',$referer)){
								$engine	=	'excite';
			}elseif(preg_match('/search\.fresheye\.com/i',$referer)){
								$engine	=	'フレッシュアイ';
			}elseif(preg_match('/websearch\.rakuten\.co\.jp/i',$referer)){
								$engine	=	'infoseek 楽天';
			}elseif(preg_match('/broval\.jp\/cgi\-bin\/DirSearch\.cgi/i',$referer)){
								$engine	=	'Broval';
			}elseif(preg_match('/baidu\.jp/i',$referer)){
								$engine	=	'baidu';
			}else{
								$engine	=	'その他';
			}
			
			return $engine;
		}
		//キーワードの抽出（◕‿‿◕）
		public function keyword($referer){
			//改行変換
			if(preg_match('/\n/',$referer)){
							$referer	=	preg_replace('/\n/'," ",$referer);
			}
			//yahoo
			if(preg_match('/search\.yahoo\.co\.jp/i',$referer)){
								$ref_temp		=	explode('?', $referer); //ドメイン切り離し
								$url_keys		=	explode('&', $ref_temp[1]);//パラメータ切り離し
								$value			=	"";
								$value_temp		=	"";
								
								foreach($url_keys as $value){
										if(preg_match('/p=[%]/i',$value)){//キーワード位置判定
													$value_temp		=	explode('=', $value);//キーワード分割
													if($value_temp[1]){
																$key_temp		=	$value_temp[1];
													}
										}
								}
			//google
			}elseif(preg_match('/google\.co\.jp/i',$referer)){
								$ref_temp		=	explode('?', $referer); //ドメイン切り離し
								$url_keys		=	explode('&', $ref_temp[1]);//パラメータ切り離し
								$value			=	"";
								$value_temp		=	"";
								
								foreach($url_keys as $value){
										if(preg_match('/q=/i',$value)){//キーワード位置判定
													$value_temp		=	explode('=', $value);//キーワード分割
													if($value_temp[1]){
																$key_temp		=	$value_temp[1];
													}
										}
								}
			//goo
			}elseif(preg_match('/search\.goo\.ne\.jp/i',$referer)){
								$ref_temp		=	explode('?', $referer); //ドメイン切り離し
								$url_keys		=	explode('&', $ref_temp[1]);//パラメータ切り離し
								$value			=	"";
								$value_temp		=	"";
								
								foreach($url_keys as $value){
										if(preg_match('/MT=/i',$value)){//キーワード位置判定
													$value_temp		=	explode('=', $value);//キーワード分割
													if($value_temp[1]){
																$key_temp		=	$value_temp[1];
													}
										}
								}
			//bing
			}elseif(preg_match('/bing\.com\/search/i',$referer)){
				
								//$key_temp = mb_ereg_replace(".+q=([^&]+).*","\\1",$referer);
								$ref_temp		=	explode('?', $referer); //ドメイン切り離し
								$url_keys		=	explode('&', $ref_temp[1]);//パラメータ切り離し
								$value			=	"";
								$value_temp		=	"";
								
								foreach($url_keys as $value){
										if(preg_match('/q=/i',$value)){//キーワード位置判定
													$value_temp		=	explode('=', $value);//キーワード分割
													if($value_temp[1]){
																$key_temp		=	$value_temp[1];
													}
										}
								}
			//エキサイト
			}elseif(preg_match('/excite\.co\.jp\/search\.gw/i',$referer)){
				
								//$key_temp = mb_ereg_replace(".+search=([^&]+).*","\\1",$referer);
								$ref_temp		=	explode('?', $referer); //ドメイン切り離し
								$url_keys		=	explode('&', $ref_temp[1]);//パラメータ切り離し
								$value			=	"";
								$value_temp		=	"";
								
								foreach($url_keys as $value){
										if(preg_match('/search=/i',$value)){//キーワード位置判定
													$value_temp		=	explode('=', $value);//キーワード分割
													if($value_temp[1]){
																$key_temp		=	$value_temp[1];
													}
										}
								}
			//フレッシュアイ
			}elseif(preg_match('/search\.fresheye\.com/i',$referer)){
				
								//$key_temp = mb_ereg_replace(".+kw=([^&]+).*","\\1",$referer);
								$ref_temp		=	explode('?', $referer); //ドメイン切り離し
								$url_keys		=	explode('&', $ref_temp[1]);//パラメータ切り離し
								$value			=	"";
								$value_temp		=	"";
								
								foreach($url_keys as $value){
										if(preg_match('/kw=/i',$value)){//キーワード位置判定
													$value_temp		=	explode('=', $value);//キーワード分割
													if($value_temp[1]){
																$key_temp		=	$value_temp[1];
													}
										}
								}
			//楽天
			}elseif(preg_match('/websearch\.rakuten\.co\.jp/i',$referer)){
				
								//$key_temp = mb_ereg_replace(".+qt=([^&]+).*","\\1",$referer);
								$ref_temp		=	explode('?', $referer); //ドメイン切り離し
								$url_keys		=	explode('&', $ref_temp[1]);//パラメータ切り離し
								$value			=	"";
								$value_temp		=	"";
								
								foreach($url_keys as $value){
										if(preg_match('/qt=/i',$value)){//キーワード位置判定
													$value_temp		=	explode('=', $value);//キーワード分割
													if($value_temp[1]){
																$key_temp		=	$value_temp[1];
													}
										}
								}
			//broval
			}elseif(preg_match('/broval\.jp\/cgi\-bin\/DirSearch\.cgi/i',$referer)){
				
								//$key_temp = mb_ereg_replace(".+query=([^&]+).*","\\1",$referer);
								$ref_temp		=	explode('?', $referer); //ドメイン切り離し
								$url_keys		=	explode('&', $ref_temp[1]);//パラメータ切り離し
								$value			=	"";
								$value_temp		=	"";
								
								foreach($url_keys as $value){
										if(preg_match('/query=/i',$value)){//キーワード位置判定
													$value_temp		=	explode('=', $value);//キーワード分割
													if($value_temp[1]){
																$key_temp		=	$value_temp[1];
													}
										}
								}
			//百度
			}elseif(preg_match('/baidu\.jp/i',$referer)){
				
								//$key_temp = mb_ereg_replace(".+wd=([^&]+).*","\\1",$referer);
								$ref_temp		=	explode('?', $referer); //ドメイン切り離し
								$url_keys		=	explode('&', $ref_temp[1]);//パラメータ切り離し
								$value			=	"";
								$value_temp		=	"";
								
								foreach($url_keys as $value){
										if(preg_match('/wd=/i',$value)){//キーワード位置判定
													$value_temp		=	explode('=', $value);//キーワード分割
													if($value_temp[1]){
																$key_temp		=	$value_temp[1];
													}
										}
								}
								
			}
			
			
			//URLデコード
			if(preg_match('/%[a-zA-Z0-9][a-zA-Z0-9]+/',$key_temp)){
			
						$keys1 = urldecode($key_temp);
			}else{
						$keys1 = $key_temp;
			}
			//UTF-8変換
			$keys2	=	mb_convert_encoding($keys1, "UTF-8", "auto");
			//+をスペースへ変換
			$keys3	=	mb_ereg_replace('/[+]/'," ",$keys2);
			//"を変換
			$keys	=	mb_ereg_replace('/\"+/',"",$keys3);
			//スペース変換
    		$keyword = mb_convert_kana($keys,"S");
    		
			
			return $keyword;
		}
		
		

}
?>

