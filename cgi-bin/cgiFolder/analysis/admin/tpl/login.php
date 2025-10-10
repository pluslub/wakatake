<?php

//==========================================================//
//ログイン認証画面
//最終更新　2012/12/14
//==========================================================//

print<<<EOF

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="robots" content="noindex,nofollow,noarchive">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="content-script-type" content="javascript">
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jq_common.js"></script>
<link rel="stylesheet" href="css/loginpage.css" type="text/css">
EOF;

//ログインできないときのメッセージ
$uid_chk	=	$_POST['uid'];
$pwd_chk	=	$_POST['pwd'];
$logins		=	$_POST['logins'];


if($uid_chk && $pwd_chk && $logins == "on"){
		$fp = file('../works/conf/admin.dat');
		foreach($fp as $value){
			$value	=	base64_decode($value);
			$data	=	explode(":",$value);
			
			if($uid_chk == $data[0] && $pwd_chk == $data[1]){
				$error1	= "chk";
			}
		}
		if($error1	!= "chk"){
					$login_error1	= '<FONT COLOR=RED><B>ID、またはパスワードが違います。</B></FONT>';
		}else{
					$login_error1	= '　';
		}
}else{
					$login_error1	= '　';
}


print<<<EOF
<title>$title</title>
</head>
<body>


<!-- コンテンツ開始▽ -->
<div id="contentsLogin" class="clearfix">

<!-- ヘッダ開始▽ -->
<div id="headerLogin">
    <div id="head_tit2"></div>
</div>
<!-- ヘッダ終了△ -->

<!-- メインコンテンツ中身▽ -->
	<div id="header">
	<img src="../img/analysis/loginheaderbg.gif" alt="Analysisログイン">
	</div>
	
	<div id="pageExplanation">
	ログインを行います。<br>
	管理者ID とパスワードを入力して下さい。
	</div>
	<DIV id="login_error1">$login_error1</DIV>
	<DIV id="login_error2">　</DIV>
	<div id="headerLink">
		<a href="./?contents=mail">パスワードを忘れた方</a>
	</div>
<form action="./?contents=start" method="post">
	<table id="loginForm">
		<tr>
			<td id="loginFormIndex">管理者ID：</td>
			<td id="loginFormInput">
				<input id="loginFormInputUid" type="text" name="uid" value='$uid_chk'>
			</td>
		</tr>
		<tr>
			<td id="loginFormIndex">パスワード：</td>
			<td id="loginFormInput">
				<input id="loginFormInputPwd" type="password" name="pwd" value="">
			</td>
		</tr>
	</table>
		<br>
		<input id="send" type="button" value="　ログイン　">
	</form>
	<div id="error">
	</div>
	<br>

<!-- メインコンテンツ中身終了△ -->
</div>
<!-- コンテンツ終了△ -->




</body>
EOF;



?>