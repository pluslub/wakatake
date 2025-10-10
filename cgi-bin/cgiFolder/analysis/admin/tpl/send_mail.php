<?php

//==========================================================//
//パスワード問い合わせ送信後の画面
//最終更新　2012/01/27
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
<script type="text/javascript" src="./js/jq_common.js"></script>
<link rel="stylesheet" href="css/loginpage.css" type="text/css">

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
	
	<div id="pageExplanation" valign="20">
	
	
	
	
	</div>
	<table id="loginForm">
		<tr>
			<td>
			<br>
			登録してあるメールアドレスへ送信しました<br>
			メールを確認してパスワードを変更してください。<br>
			<br>
			</td>
		</tr>
	</table>
	<form action="./index.php" method="post">
	<div><p><input type="submit" name="" value="トップへ"></p></div>
	
	
	</form>
	<div id="error">
	</div>
	<br>

<!-- メインコンテンツ中身終了△ -->

<!-- フッター開始▽ -->
<div id="loginFooter">
    <p class="foot_txtLogin"></p>
</div>
<!-- フッター終了△ -->
</div>
<!-- コンテンツ終了△ -->




</body>
EOF;

?>