<?php

//==========================================================//
//ログアウト後の画面
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
<link rel="stylesheet" href="css/loginpage.css" type="text/css">

<title>Analysis ログアウト</title>
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
	ログアウトしました<br>
	お疲れ様でした。
		
	</div>
	<br>
    <div class="Viewbtn_disp">
    	<form action="./" method="post">
        			<input type="hidden" name="action_graph" value="true">
        			<input type="submit" value="　ログイン画面へ　">
        </form>
    </div>

<!-- メインコンテンツ中身終了△ -->

</div>
<!-- コンテンツ終了△ -->




</body>
EOF;
exit;
?>