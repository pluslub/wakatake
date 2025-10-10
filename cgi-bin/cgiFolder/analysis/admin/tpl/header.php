<?php

//==========================================================//
//ページヘッダー
//最終更新　2012/01/27
//==========================================================//

print<<<EOF
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html lang="ja"> 
<head> 
<meta http-equiv="content-type" content="text/html; charset=utf-8"> 
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="content-script-type" content="javascript">
<script type="text/javascript" src="./js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="./js/jq_common.js"></script>
<link rel="stylesheet" href="./css/analysis.css" type="text/css">

<title>$title</title>
</head>

<body>
<!-- ヘッダ開始▽ -->

<div id="container">
	<div id="header">
   		<div id="head_tit"><img src="../img/analysis/bbtitle.gif" alt="アクセス解析" width="209" height="39"></div>
    	<div id="header-text-area">    
    		<div id="header-application-link">
				<span id="application-link-help">
					<img src="../img/analysis/icon_help.gif" width="18" height="18" align="middle"><a href="http://support.tieredworks.com/">ヘルプ</a>
				</span>
				<span id="application-link-logout">
					<img src="../img/analysis/icon_logout.gif" width="18" height="18" align="middle"><a href="index.php?contents=logout" target="_self">ログアウト</a>
				</span>
			</div>
		</div>
	</div>


	<div id="headmenu3">
		<!-- ▽アプリケーション画面ラベル -->
		<!--
		<h1>アクセス解析画面</h1>
		-->
		<!-- △アプリケーション画面ラベル -->
	</div>
<!-- ヘッダ終了△ -->
EOF;

?>