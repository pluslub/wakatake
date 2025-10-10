<?php

//==========================================================//
//サイドメニューバー
//最終更新　2012/01/27
//==========================================================//

print<<<EOF

<!-- メニュー開始▽ -->
    <div id="contents" class="clearfix">
            <div id="left1">
            	<div id="sidebar">
					<div class="contents-menu">
 						<h2 class="logtitle">ログ解析</h2>
						<div class="category-archives">
							<ul>
								<li><a href="index.php?contents=report">解析レポートを表示</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div id="sidebar">
					<div class="contents-menu">
 					<h2 class="conftitle">設定</h2>
						<div class="category-archives">
							<ul>
								<li><a href="index.php?contents=admin">管理者情報設定</a></li>
        						<li><a href="index.php?contents=file">ログファイル削除</a></li>
								<li><a href="index.php?contents=hosts">取得拒否ホスト設定</a></li>
							</ul>
						</div>
					</div>
				</div>
        	</div>
<!-- メニュー終了△ -->
EOF;

?>
