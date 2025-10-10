<?php

//==========================================================//
//個別集計クラス
//最終更新　2012/07/17
//==========================================================//


class ana
{
		//総ヒット数
		public function all_hit($page,$subPage,$files){
				$a_hit	=	0;
				$logfiles	=	file($files);

				foreach($logfiles as $value){
						$data	=	explode("\",\"",$value);
						
						if($page	!= "0"){
							
									//ページ、サブページの両方あるとき
									if($data[7] == $page && $data[11] == $subPage){
											$day		=	date("Ymd-w" , $data[1]);
											$hit_day[$day][]		=	$day;
									//ページしかないとき
									}elseif($data[7] == $page){
											$day		=	date("Ymd-w" , $data[1]);
											$hit_day[$day][]		=	$day;
									}
						//全体集計
						}else{
											$day		=	date("Ymd-w" , $data[1]);
											$hit_day[$day][]		=	$day;
						}
				}
				
				$hit_tmp	=	array();
				foreach($hit_day as $val1){
						foreach($val1 as $val2){
								$hit_tmp[]	=	$val2;
						}
				}
				$a_hit	=	array_count_values($hit_tmp);
				return	$a_hit;
		}
		
		//ページ別
		public function all_pages($page,$subPage,$files){
				$a_pages	=	0;
				$logfiles		=	file($files);
				
				foreach($logfiles as $value){
						$data	=	explode("\",\"",$value);
						
						if($subPage != "0"){
										$hit_pages[$data[7]][]		=	$data[11];
						
						//全体集計
						}else{
										if($data[11]){
													$hit_pages[$data[7]][]		=	$data[11];
										}else{
													$hit_pages[$data[7]][]		=	$data[7];
										}
						}
						
				}
				
				$pages_tmp	=	array();
				foreach($hit_pages as $val1){
						foreach($val1 as $val2){
								$pages_tmp[]	=	$val2;
						}
				}
				$a_pages	=	array_count_values($pages_tmp);
				arsort($a_pages);
				return	$a_pages;
		}
		
		//ブラウザ
		public function all_browser($page,$subPage,$files){
				$a_browser	=	0;
				$logfiles		=	file($files);
				
				foreach($logfiles as $value){
						$data	=	explode("\",\"",$value);
						
						if($page	!= "0"){
									//ページ、サブページの両方あるとき
									if($data[7] == $page && $data[11] == $subPage){
											$hit_browser[$data[4]][]		=	$data[4];
									//ページしかないとき
									}elseif($data[7] == $page){
											$hit_browser[$data[4]][]		=	$data[4];
									}
						//全体集計
						}else{
											$hit_browser[$data[4]][]		=	$data[4];
						}
				}
				
				$browser_tmp	=	array();
				foreach($hit_browser as $val1){
						foreach($val1 as $val2){
								$browser_tmp[]	=	$val2;
						}
				}
				$a_browser	=	array_count_values($browser_tmp);
				arsort($a_browser);
				return	$a_browser;
		}
		
		//言語
		public function all_lang($page,$subPage,$files){
				$all_lang	=	0;
				$logfiles		=	file($files);
				
				foreach($logfiles as $value){
						$data	=	explode("\",\"",$value);
						
						if($page	!= "0"){
									//ページ、サブページの両方あるとき
									if($data[7] == $page && $data[11] == $subPage){
											$hit_lang[$data[6]][]		=	$data[6];
									//ページしかないとき
									}elseif($data[7] == $page){
											$hit_lang[$data[6]][]		=	$data[6];
									}
						//全体集計
						}else{
											$hit_lang[$data[6]][]		=	$data[6];
						}
				}
				
				$lang_tmp	=	array();
				foreach($hit_lang as $val1){
						foreach($val1 as $val2){
								$lang_tmp[]	=	$val2;
						}
				}
				$all_lang	=	array_count_values($lang_tmp);
				arsort($all_lang);
				return	$all_lang;
		}
		
		//OS
		public function all_os($page,$subPage,$files){
				$a_os	=	0;
				$logfiles	=	file($files);
				
				foreach($logfiles as $value){
						$data	=	explode("\",\"",$value);
						
						if($page	!= "0"){
									//ページ、サブページの両方あるとき
									if($data[7] == $page && $data[11] == $subPage){
											$hit_os[$data[5]][]		=	$data[5];
									//ページしかないとき
									}elseif($data[7] == $page){
											$hit_os[$data[5]][]		=	$data[5];
									}
						//全体集計
						}else{
											$hit_os[$data[5]][]		=	$data[5];
						}
				}
				
				$os_tmp	=	array();
				foreach($hit_os as $val1){
						foreach($val1 as $val2){
								$os_tmp[]	=	$val2;
						}
				}
				$a_os	=	array_count_values($os_tmp);
				arsort($a_os);
				return	$a_os;
		}

		//リモートホスト
		public function all_host($page,$subPage,$files){
				$a_host	=	0;
				$logfiles	=	file($files);
				
				foreach($logfiles as $value){
						$data	=	explode("\",\"",$value);
						
						if($page	!= "0"){
									//ページ、サブページの両方あるとき
									if($data[7] == $page && $data[11] == $subPage){
											$hit_host[$data[15]][]		=	$data[15];
									//ページしかないとき
									}elseif($data[7] == $page){
											$hit_host[$data[15]][]		=	$data[15];
									}
						//全体集計
						}else{
											$hit_host[$data[15]][]		=	$data[15];
						}
				}
				
				$host_tmp	=	array();
				foreach($hit_host as $val1){
						foreach($val1 as $val2){
								$host_tmp[]	=	$val2;
						}
				}
				$a_host	=	array_count_values($host_tmp);
				arsort($a_host);
				return	$a_host;
		}

		//リンク元
		public function all_referer($page,$subPage,$files){
				$a_ref	=	0;
				$logfiles	=	file($files);
				
				foreach($logfiles as $value){
						$data	=	explode("\",\"",$value);
						
						if($data[17]){
								$title	=	$data[17];
								//細分化処理
								if($page	!= "0"){
										//ページ、サブページの両方あるとき
										if($data[7] == $page && $data[11] == $subPage){
												$hit_ref[$title][]		=	$title;
										//ページしかないとき
										}elseif($data[7] == $page){
												$hit_ref[$title][]		=	$title;
										}
								//全体集計
								}else{
												$hit_ref[$title][]		=	$title;
								}
						}else{
												$sitename	=	"リンク元なし";
												$hit_ref[$sitename][]		=	"<b>" . $sitename . "</b>";
						}
				}
				$ref_tmp	=	array();
				//var_dump($hit_ref);
				foreach($hit_ref as $val1){
						foreach($val1 as $val2){
								$ref_tmp[]	=	$val2;
						}
				}
				$a_ref	=	array_count_values($ref_tmp);
				arsort($a_ref);
				return	$a_ref;
		}

		//検索エンジン
		public function all_engine($page,$subPage,$eng_files){
				$a_sengine	=	0;
				$logfiles	=	file($eng_files);
				
				foreach($logfiles as $value){
						$data	=	explode("\",\"",$value);
						if($data[2]){
								if($page	!= "0"){
											//ページ、サブページの両方あるとき
											if($data[7] == $page && $data[11] == $subPage){
														$hit_sengine[$data[2]][]		=	$data[2];
											//ページしかないとき
											}elseif($data[7] == $page){
														$hit_sengine[$data[2]][]		=	$data[2];
											}
								//全体集計
								}else{
														$hit_sengine[$data[2]][]		=	$data[2];
								}
						}
				}
				
				$sengine_tmp	=	array();
				if($hit_sengine){
						foreach($hit_sengine as $val1){
								foreach($val1 as $val2){
										$sengine_tmp[]	=	$val2;
								}
						}
						
						$a_sengine	=	array_count_values($sengine_tmp);
				}else{
						$a_sengine	=	"off";
				}
				if($a_sengine != "off"){
					arsort($a_sengine);
				}
				return	$a_sengine;
		}

		//検索ワード
		public function all_keyword($page,$subPage,$eng_files){
		
				$a_sword	=	0;
				$logfiles	=	file($eng_files);
				
				foreach($logfiles as $value){
						$data	=	explode("\",\"",$value);
						if($data[3]){
								if($page	!= "0"){
											//ページ、サブページの両方あるとき
											if($data[7] == $page && $data[11] == $subPage){
														$hit_sword[$data[3]][]		=	$data[3];
											//ページしかないとき
											}elseif($data[7] == $page){
														$hit_sword[$data[3]][]		=	$data[3];
											}
								//全体集計
								}else{
														$hit_sword[$data[3]][]		=	$data[3];
								}
						}
				}
				
				$sword_tmp	=	array();
				if($hit_sword){
						foreach($hit_sword as $val1){
								foreach($val1 as $val2){
										$sword_tmp[]	=	$val2;
								}
						}
						
						$a_sword	=	array_count_values($sword_tmp);
				}else{
						$a_sword	=	"off";
				}
				if($a_sword != "off"){
						arsort($a_sword);
				}
				return	$a_sword;
		}

		//PC・スマホ対比
		public function all_smart($files){
				$a_smart	=	0;
				$logfiles	=	file($files);
				foreach($logfiles as $value){
						$data	=	explode("\",\"",$value);
						
						//モバイルページ集計
						if($data[14] == "1"){
											$smart	=	"Mobileページ";
											$hit_smart[$smart][]		=	$smart;
						//全体集計
						}else{
											$smart	=	"PCページ";
											$hit_smart[$smart][]		=	$smart;
						}
				}
				
				$smart_tmp	=	array();
				foreach($hit_smart as $val1){
						foreach($val1 as $val2){
								$smart_tmp[]	=	$val2;
						}
				}
				$a_smart	=	array_count_values($smart_tmp);
				arsort($a_smart);
				return	$a_smart;
		}

		//ログファイル整理
		//ログファイルを料理しやすいように調理します。
		//下ごしらえなので加工はなし
		public function files($Switching,$target,$targetYear,$targetMonth,$targetWeek,$targetDay,$page,$subPage,$view){
			//ログファイルディレクトリ
			$dir = '../works/log/';
			
			//ディレクトリ内のファイル名取得して格納
			$file_names = scandir($dir);
			$logfiles	=	"";
			$Reference	=	"";
			//年月指定
			if($target == "0"){
					$ym_match	= "/^".$targetYear.$targetMonth."/";
					foreach($file_names as $value){
						if(preg_match($ym_match,$value)){
									//日にち別ファイルをまとめる
									$logfiles	.=	$this->log_switch($Switching,$dir,$value,$page,$subPage,$view);
						}
					}
					
			//週指定
			}elseif($target == "1"){
					//週のタイムスタンプ取得
					if($targetWeek == "0" && $targetWeek != ""){
							//前の日曜日を基準日として取得
							$Reference	=	strtotime('-1 Sunday');
							$week		=	array();
							$week[]		=	date("ymd",$Reference) .".log";
							//7日分の日にちを配列へ
							for($i = 1; $i < 7; $i++){
									$week_tmp	=	strtotime('+'. $i .' day', $Reference);
									$week[]		=	date("ymd",$week_tmp) .".log";
							}
							//ファイル内容を配列へ
							foreach($file_names as $value){
								
								foreach($week as $val){
										$ym_match	= "/".$val."/";
										if(preg_match($ym_match,$value)){
													$logfiles	.=	$this->log_switch($Switching,$dir,$value,$page,$subPage,$view);
										}
								}
							}
					}elseif($targetWeek == "1"){
							//先週の日曜日を基準日として取得
							$Reference	=	strtotime('-2 Sunday');
							$week	=	array();
							$week[]		=	date("ymd",$week_tmp) .".log";
							//7日分の日にちを配列へ
							for($i = 1; $i < 7; $i++){
									$week_tmp	=	strtotime('+'. $i .' day', $Reference);
									$week[]		=	date("ymd",$week_tmp) .".log";
							}
							//ファイル内容を配列へ
							foreach($file_names as $value){
								
								foreach($week as $val){
										$ym_match	= "/".$val."/";
										if(preg_match($ym_match,$value)){
													$logfiles	.=	$this->log_switch($Switching,$dir,$value,$page,$subPage,$view);
										}
								}
							}
					}elseif($targetWeek == "2"){
							//前の日曜日を基準日として取得
							$Reference	=	strtotime('-3 Sunday');
							$week	=	array();
							$week[]	=	date("ymd",$Reference) .".log";
							//7日分の日にちを配列へ
							for($i = 1; $i < 7; $i++){
									$week_tmp	=	strtotime('+'. $i .' day', $Reference);
									$week[]	=	date("ymd",$week_tmp) .".log";
							}
							//ファイル内容を配列へ
							foreach($file_names as $value){
								
								foreach($week as $val){
										$ym_match	= "/".$val."/";
										if(preg_match($ym_match,$value)){
													$logfiles	.=	$this->log_switch($Switching,$dir,$value,$page,$subPage,$view);
										}
								}
							}
					}elseif($targetWeek == "3"){
							//前の日曜日を基準日として取得
							$Reference	=	strtotime('-4 Sunday', time());
							$week	=	array();
							$week[]	=	date("ymd",$Reference) .".log";
							//7日分の日にちを配列へ
							for($i = 1; $i < 7; $i++){
									$week_tmp	=	strtotime('+'. $i .' day', $Reference);
									$week[]	=	date("ymd",$week_tmp) .".log";
							}
							//ファイル内容を配列へ
							foreach($file_names as $value){
								
								foreach($week as $val){
										$ym_match	= "/".$val."/";
										if(preg_match($ym_match,$value)){
													$logfiles	.=	$this->log_switch($Switching,$dir,$value,$page,$subPage,$view);
										}
								}
							}
					}
			//日にち指定
			}elseif($target == "2"){
					if($targetDay == "0" && $targetDay != ""){
							//基準日の取得
							$Reference	=	time();
							$day	=	"";
							$day	=	date("ymd",$Reference) .".log";
							//ファイル内容を配列へ
							foreach($file_names as $value){
										$ym_match	= "/".$day."/";
										if(preg_match($ym_match,$value)){
													$logfiles	.=	$this->log_switch($Switching,$dir,$value,$page,$subPage,$view);
										}
							}
					}elseif($targetDay == "1"){
							//基準日の取得
							$Reference	=	strtotime('-1 day');
							$day	=	"";
							$day	=	date("ymd",$Reference) .".log";
							//ファイル内容を配列へ
							foreach($file_names as $value){
										$ym_match	= "/".$day."/";
										if(preg_match($ym_match,$value)){
													$logfiles	.=	$this->log_switch($Switching,$dir,$value,$page,$subPage,$view);
										}
							}
					}elseif($targetDay == "2"){
							//基準日の取得
							$Reference	=	strtotime('-2 day');
							$day	=	"";
							$day	=	date("ymd",$Reference) .".log";
							//ファイル内容を配列へ
							foreach($file_names as $value){
										$ym_match	= "/".$day."/";
										if(preg_match($ym_match,$value)){
													$logfiles	.=	$this->log_switch($Switching,$dir,$value,$page,$subPage,$view);
										}
							}
					}elseif($targetDay == "3"){
							//基準日の取得
							$Reference	=	strtotime('-3 day');
							$day	=	"";
							$day	=	date("ymd",$Reference) .".log";
							//ファイル内容を配列へ
							foreach($file_names as $value){
										$ym_match	= "/".$day."/";
										if(preg_match($ym_match,$value)){
													$logfiles	.=	$this->log_switch($Switching,$dir,$value,$page,$subPage,$view);
										}
							}
					}elseif($targetDay == "4"){
							//基準日の取得
							$Reference	=	strtotime('-4 day');
							$day	=	"";
							$day	=	date("ymd",$Reference) .".log";
							//ファイル内容を配列へ
							foreach($file_names as $value){
										$ym_match	= "/".$day."/";
										if(preg_match($ym_match,$value)){
													$logfiles	.=	$this->log_switch($Switching,$dir,$value,$page,$subPage,$view);
										}
							}
					}elseif($targetDay == "5"){
							//基準日の取得
							$Reference	=	strtotime('-5 day');
							$day	=	"";
							$day	=	date("ymd",$Reference) .".log";
							//ファイル内容を配列へ
							foreach($file_names as $value){
										$ym_match	= "/".$day."/";
										if(preg_match($ym_match,$value)){
													$logfiles	.=	$this->log_switch($Switching,$dir,$value,$page,$subPage,$view);
										}
							}
					}elseif($targetDay == "6"){
							//基準日の取得
							$Reference	=	strtotime('-6 day');
							$day	=	"";
							$day	=	date("ymd",$Reference) .".log";
							//ファイル内容を配列へ
							foreach($file_names as $value){
										$ym_match	= "/".$day."/";
										if(preg_match($ym_match,$value)){
													$logfiles	.=	$this->log_switch($Switching,$dir,$value,$page,$subPage,$view);
										}
							}
					}
			}
			return $logfiles;
		}
		//種別指定
		public function log_switch($Switching,$dir,$value,$page,$subPage,$view){
		
					$log_temp	=	"";
					$log_temp	=	file($dir.$value);
					$log_temp2	=	array();

							foreach($log_temp as $val2){
								//ログの14項がスマホチェックフラグ
									$data	=	explode("\",\"" , $val2);
											
											if($Switching == "3"){
													//モバイルアクセスの抽出
													if($data[14] == "1"){
															$log_temp2[]	=	$val2;
													}
											}elseif($Switching == "2"){
													//PCアクセスの抽出
													if($data[14] == "0" || $data[14] == ""){
															$log_temp2[]	=	$val2;
													}
											}elseif($Switching == "1"){
															//全部抽出
															$log_temp2[]	=	$val2;
											}
											
							}
							
					if($log_temp2){
							$logfiles	=	$this->log_page($log_temp2,$page,$subPage,$view);
					}
					return $logfiles;
		}
		
		
		//ページ別
		public function log_page($log_temp2,$page,$subPage,$view){
					
					foreach($log_temp2 as $val3){
							$data	=	explode("\",\"" ,$val3);
							
							if($page == "0"){
									//全ページ
										$log_temp3[]	=	$val3;
							}else{
										if($subPage == "0"){
												//ページ指定　サブページなし
												if($data[7] == $page){
													$log_temp3[]	=	$val3;
												}
										}else{
												//ページ指定　サブページあり
												if($data[7] == $page && $data[11] == $subPage){
													$log_temp3[]	=	$val3;
												}
										}
							}
					}
					$logfiles	=	$this->log_user($log_temp3,$view);
					
					return $logfiles;
		}
		
		//ユニークユーザー
		public function log_user($log_temp3,$view){
					if($view == "2" && $log_temp3){
							//IPベースでユニークユーザーを集計する
							//UA=4,ページ=7,サブページ=11,IP=16
							//上の要素をkeyにして判定させる
							foreach($log_temp3 as $value){
									$data	=	explode("\",\"" ,$value);
									$day	=	$data[1];
									$dates	=	date("ymd",$day);
									
									$temp	=	$dates . ":" . $data[4] . ":" . $data[16] . ":" . $data[7] . ":" . $data[11];
									
									$unique_temp1[$temp]	=	$value;
									
							}
							
							$val	=	"";
							foreach($unique_temp1 as $val){
									
									$logfiles	.=	$val;
									
							}
							
							
					}elseif($view == "1" && $log_temp3){
							
							foreach($log_temp3 as $value){
									
									$logfiles	.=	$value;
									
							}
							
					}
					
					return $logfiles;
		}
		
		
		//検索エンジン・キーワード用ファイル作成
		
		public function engines($Switching,$target,$targetYear,$targetMonth,$targetWeek,$targetDay,$page,$subPage,$view){
			//ログファイルディレクトリ
			$dir = '../works/log/';
			
			//ディレクトリ内のファイル名取得して格納
			$file_names = scandir($dir);
			$logfiles	=	"";
			$Reference	=	"";
			//年月指定
			if($target == "0"){
					$ym_match	= "/^".$targetYear.$targetMonth."/";
					
					foreach($file_names as $value){
							if(preg_match($ym_match,$value)){
									//日にち別ファイルをまとめる
									$logengines	.=	$this->log_switch2($Switching,$dir,$value,$page,$subPage,$view);
									
							}
					}
					
			//週指定
			}elseif($target == "1"){
					//週のタイムスタンプ取得
					if($targetWeek == "0" && $targetWeek != ""){
							//前の日曜日を基準日として取得
							$Reference	=	strtotime('-1 Sunday');
							$week		=	array();
							$week[]		=	date("ymd",$Reference) .".log";
							//7日分の日にちを配列へ
							for($i = 1; $i < 7; $i++){
								$week_tmp	=	strtotime('+'. $i .' day', $Reference);
								$week[]		=	date("ymd",$week_tmp) .".log";
							}
							//ファイル内容を配列へ
							foreach($file_names as $value){
								
								foreach($week as $val){
										$ym_match	= "/".$val."/";
										if(preg_match($ym_match,$value)){
													$logengines	.=	$this->log_switch2($Switching,$dir,$value,$page,$subPage,$view);
										}
								}
							}
					}elseif($targetWeek == "1"){
							//先週の日曜日を基準日として取得
							$Reference	=	strtotime('-2 Sunday');
							$week	=	array();
							$week[]		=	date("ymd",$week_tmp) .".log";
							//7日分の日にちを配列へ
							for($i = 1; $i < 7; $i++){
									$week_tmp	=	strtotime('+'. $i .' day', $Reference);
									$week[]		=	date("ymd",$week_tmp) .".log";
							}
							//ファイル内容を配列へ
							foreach($file_names as $value){
								
								foreach($week as $val){
										$ym_match	= "/".$val."/";
										if(preg_match($ym_match,$value)){
													$logengines	.=	$this->log_switch2($Switching,$dir,$value,$page,$subPage,$view);
										}
								}
							}
					}elseif($targetWeek == "2"){
							//前の日曜日を基準日として取得
							$Reference	=	strtotime('-3 Sunday');
							$week	=	array();
							$week[]	=	date("ymd",$Reference) .".log";
							//7日分の日にちを配列へ
							for($i = 1; $i < 7; $i++){
									$week_tmp	=	strtotime('+'. $i .' day', $Reference);
									$week[]	=	date("ymd",$week_tmp) .".log";
							}
							//ファイル内容を配列へ
							foreach($file_names as $value){
								
								foreach($week as $val){
										$ym_match	= "/".$val."/";
										if(preg_match($ym_match,$value)){
													$logengines	.=	$this->log_switch2($Switching,$dir,$value,$page,$subPage,$view);
										}
								}
							}
					}elseif($targetWeek == "3"){
							//前の日曜日を基準日として取得
							$Reference	=	strtotime('-4 Sunday', time());
							$week	=	array();
							$week[]	=	date("ymd",$Reference) .".log";
							//7日分の日にちを配列へ
							for($i = 1; $i < 7; $i++){
									$week_tmp	=	strtotime('+'. $i .' day', $Reference);
									$week[]	=	date("ymd",$week_tmp) .".log";
							}
							//ファイル内容を配列へ
							foreach($file_names as $value){
								
								foreach($week as $val){
										$ym_match	= "/".$val."/";
										if(preg_match($ym_match,$value)){
													$logengines	.=	$this->log_switch2($Switching,$dir,$value,$page,$subPage,$view);
										}
								}
							}
					}
			//日にち指定
			}elseif($target == "2"){
				if($targetDay == "0" && $targetDay != ""){
							//基準日の取得
							$Reference	=	time();
							$day	=	"";
							$day	=	date("ymd",$Reference) .".log";
							//ファイル内容を配列へ
							foreach($file_names as $value){
										$ym_match	= "/".$day."/";
										if(preg_match($ym_match,$value)){
													$logengines	.=	$this->log_switch2($Switching,$dir,$value,$page,$subPage,$view);
										}
							}
				}elseif($targetDay == "1"){
							//基準日の取得
							$Reference	=	strtotime('-1 day');
							$day	=	"";
							$day	=	date("ymd",$Reference) .".log";
							//ファイル内容を配列へ
							foreach($file_names as $value){
										$ym_match	= "/".$day."/";
										if(preg_match($ym_match,$value)){
													$logengines	.=	$this->log_switch2($Switching,$dir,$value,$page,$subPage,$view);
										}
							}
				}elseif($targetDay == "2"){
							//基準日の取得
							$Reference	=	strtotime('-2 day');
							$day	=	"";
							$day	=	date("ymd",$Reference) .".log";
							//ファイル内容を配列へ
							foreach($file_names as $value){
										$ym_match	= "/".$day."/";
										if(preg_match($ym_match,$value)){
													$logengines	.=	$this->log_switch2($Switching,$dir,$value,$page,$subPage,$view);
										}
							}
				}elseif($targetDay == "3"){
							//基準日の取得
							$Reference	=	strtotime('-3 day');
							$day	=	"";
							$day	=	date("ymd",$Reference) .".log";
							//ファイル内容を配列へ
							foreach($file_names as $value){
										$ym_match	= "/".$day."/";
										if(preg_match($ym_match,$value)){
													$logengines	.=	$this->log_switch2($Switching,$dir,$value,$page,$subPage,$view);
										}
							}
				}elseif($targetDay == "4"){
							//基準日の取得
							$Reference	=	strtotime('-4 day');
							$day	=	"";
							$day	=	date("ymd",$Reference) .".log";
							//ファイル内容を配列へ
							foreach($file_names as $value){
										$ym_match	= "/".$day."/";
										if(preg_match($ym_match,$value)){
													$logengines	.=	$this->log_switch2($Switching,$dir,$value,$page,$subPage,$view);
										}
							}
				}elseif($targetDay == "5"){
							//基準日の取得
							$Reference	=	strtotime('-5 day');
							$day	=	"";
							$day	=	date("ymd",$Reference) .".log";
							//ファイル内容を配列へ
							foreach($file_names as $value){
										$ym_match	= "/".$day."/";
										if(preg_match($ym_match,$value)){
													$logengines	.=	$this->log_switch2($Switching,$dir,$value,$page,$subPage,$view);
										}
							}
				}elseif($targetDay == "6"){
							//基準日の取得
							$Reference	=	strtotime('-6 day');
							$day	=	"";
							$day	=	date("ymd",$Reference) .".log";
							//ファイル内容を配列へ
							foreach($file_names as $value){
										$ym_match	= "/".$day."/";
										if(preg_match($ym_match,$value)){
													$logengines	.=	$this->log_switch2($Switching,$dir,$value,$page,$subPage,$view);
										}
							}
				}
			}
			
			return $logengines;
		}
		//種別指定
		public function log_switch2($Switching,$dir,$value,$page,$subPage,$view){
		
					$log_temp	=	"";
					$log_temps	=	file($dir.$value);
					$log_temp5	=	"";

							foreach($log_temps as $val5){
								//ログの14項がスマホチェックフラグ
									$data	=	explode("\",\"" , $val5);
											
											if($Switching == "3"){
													//モバイルアクセスの抽出
													if($data[14] == "1"){
															$log_temp5	=	array();
															$log_temp5[]	=	$val5;
													}
											}elseif($Switching == "2"){
													//PCアクセスの抽出
													if($data[14] != "1"){
															$log_temp5	=	array();
															$log_temp5[]	=	$val5;
													}
											}elseif($Switching == "1"){
															//全部抽出
															$log_temp5	=	array();
															$log_temp5[]	=	$val5;
											}
							}
				if($log_temp5){
						$logengines	=	$this->log_page2($log_temp5,$page,$subPage,$view);
				}
				
				return $logengines;
		}
		
		
		//ページ別
		public function log_page2($log_temp5,$page,$subPage,$view){
					
					foreach($log_temp5 as $val5){
						$data	=	explode("\",\"" ,$val5);
						if($page == "0"){
									//全ページ
										$log_temp6[]	=	$val5;
						}elseif($page != "0"){
									if($subPage == "0"){
											//ページ指定　サブページなし
											if($data[7] == $page){
													$log_temp6[]	=	$val6;
											}
									}elseif($subPage != "0"){
											//ページ指定　サブページあり
											if($data[7] == $page && $data[11] == $subPage){
													$log_temp6[]	=	$val6;
											}
									}
						}
					}
					$logengines	=	$this->log_user2($log_temp6,$view);
					return $logengines;
		}
		
		//ユニークユーザー
		public function log_user2($log_temp6,$view){
		
					if($view == "2" && $log_temp6){
							//IPベースでユニークユーザーを集計する
							//UA=4,ページ=7,サブページ=11,IP=16
							//上の要素をkeyにして判定させる
							foreach($log_temp6 as $value){
									$data	=	explode("\",\"" ,$value);
									$day	=	$data[1];
									$dates	=	date("ymd",$day);
									
									$temp	=	$dates . ":" . $data[2] .":" . $data[3] .":" . $data[4] . ":" . $data[16] . ":" . $data[7] . ":" . $data[11];
									
									$unique_temp2[$temp]	=	$value;
									
							}
							$val	=	"";
							foreach($unique_temp2 as $val7){
									
									$logengines	.=	$val7;
									
							}
							
							
					}elseif($view == "1" && $log_temp6){
							
							foreach($log_temp6 as $value){
									
									$logengines	.=	$value;
									
							}
							
					}
					
					return $logengines;
		}
		

}
?>