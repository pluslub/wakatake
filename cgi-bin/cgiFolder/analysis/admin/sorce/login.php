<?php

//==========================================================//
//認証処理
//最終更新　2012/12/14
//==========================================================//

class loginform{
	
	
	public function login($uid,$pass,$key){
	
		//ログイン認証ここから
		$fp = file('../works/conf/admin.dat');
		foreach($fp as $value){
			$data	=	explode(":", base64_decode($value));
			
				if($uid == $data[0] && $pass == $data[1]){
				
						//クッキーセット（有効時間30分）
						$name	=	"Analysis";
						$val = $uid."_logined";
						$timeout = time() + 18000;
						setcookie ($name,$val,$timeout);
						$login	=	"ck";
				}
		}
		
		return $login;
	}
}
?>
