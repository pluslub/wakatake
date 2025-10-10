<?php

//==========================================================//
//ドロップダウンリストのリスト作成
//最終更新　2012/01/27
//==========================================================//

//セレクトメニューの値取得
class select{

	public function page(){
			//ログファイルディレクトリ
			$dir = '../works/log/';
			$log_temp	=	array();
			$log_temp1	=	"";
			//ディレクトリ内のファイル名取得して格納
			$file_names = scandir($dir);
					foreach($file_names as $value){
						if(preg_match("/\.log/i",$value)){
								$log_temp1	=	file($dir.$value);
									foreach($log_temp1 as $val1){
										$val1	=	preg_replace("/\"/", "" , $val1);
										$log_temp[]	=	$val1;
									}
						}
					}
					$page_tmp	=	array();
					$page		=	array();
					if(file_exists('log_temp.log')){
							unlink('log_temp.log');
					}
					 
					if($log_temp){
						foreach($log_temp as $value){
								$data	=	explode(",", $value);
								
									$p_name		=	$data[7];
									//サブページが無いときの処理
									if($data[11]){
										$sp_name	=	$data[11];
									}else{
										$sp_name	=	"サブページなしの処理";
									}
									//ページ名の格納
									$page[$p_name][$sp_name]	=	$sp_name;
						}
 						
						if($page){
							ksort($page,SORT_STRING);
						}
					}
					return	$page;
	}
	
	
	//年月セレクトメニューの値設定
	public function target(){
			//ログファイルディレクトリ
			$dir = '../works/log';
			
			//ディレクトリ内のファイル名取得して格納
			$file_names = scandir($dir);
			
			//年月の取得と格納
			foreach($file_names as $value1){
        	
        			if(preg_match('/\.log/i',$value1)){
        			
        					//西暦・月value値
        					$v_y	=	mb_substr($value1,0,2);
        					$v_m	=	mb_substr($value1,2,2);
        					
        					//年月の格納
        					$ym[$v_y][$v_m]	=	$v_m;
	    			}
    		}
			return $ym;
	}
}
?>