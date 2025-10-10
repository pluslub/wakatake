<?php

//==========================================================//
//ログ表示結果
//最終更新　2012/07/17
//==========================================================//

//ヘッダー
	include 'header.php';

//メニュー
	include 'menu.php';

//メニュー
	include './sorce/log_red.php';
	$ana	=	new ana();
	
	
	$chk1			=	$_POST{'chk1'};
	$chk2			=	$_POST{'chk2'};
	$chk3			=	$_POST{'chk3'};
	$chk4			=	$_POST{'chk4'};
	$chk5			=	$_POST{'chk5'};
	$chk6			=	$_POST{'chk6'};
	$chk7			=	$_POST{'chk7'};
	$chk8			=	$_POST{'chk8'};
	$chk9			=	$_POST{'chk9'};
	$Switching		=	$_POST{'Switching'};
	$target			=	$_POST{'target'};
	$targetYear		=	$_POST{'targetYear'};
	$targetMonth	=	$_POST{'targetMonth'};
	$targetWeek		=	$_POST{'targetWeek'};
	$targetDay		=	$_POST{'targetDay'};
	$page			=	$_POST{'page'};
	$subPage		=	$_POST{'subPage'};
	$view			=	$_POST{'view'};
	
	
	//ログファイル整理
	$logfiles	=	$ana->files($Switching,$target,$targetYear,$targetMonth,$targetWeek,$targetDay,$page,$subPage,$view);
		//保持ファイル
		$fp = "";
		$files	=	"../tmp/".uniqid("log_")."_temp.log";
		$fp = fopen($files, "w+");
		@fwrite( $fp, $logfiles, strlen($logfiles) );
		fclose($fp);
		
	//検索エンジン系別集計
	$logengine	=	$ana->engines($Switching,$target,$targetYear,$targetMonth,$targetWeek,$targetDay,$page,$subPage,$view);
		//保持ファイル
		$fp2 = "";
		$eng_files	=	"../tmp/".uniqid("log2_")."_temp.log";
		$fp2 = fopen($eng_files, "w+");
		@fwrite( $fp2, $logengine, strlen($logengine) );
		fclose($fp2);
		
	if($logfiles){
		//総ヒット数
		if($chk1 == "hit"){
				$a_hit	=	$ana->all_hit($page,$subPage,$files);
		}
		//ページ別
		if($chk7 == "pages"){
				$a_pages	=	$ana->all_pages($page,$subPage,$files);
		}
		//ブラウザ
		if($chk2 == "browser"){
				$a_browser	=	$ana->all_browser($page,$subPage,$files);
		}
		//言語
		if($chk3 == "lang"){
				$a_lang	=	$ana->all_lang($page,$subPage,$files);
		}
		//OS
		if($chk4 == "os"){
				$a_os	=	$ana->all_os($page,$subPage,$files);
		}
		//リモートホスト
		if($chk5 == "rhost"){
				$a_rhost	=	$ana->all_host($page,$subPage,$files);
		}
		//リンク元
		if($chk6 == "ref"){
				$a_ref	=	$ana->all_referer($page,$subPage,$files);
		}
		//検索エンジン
		if($chk8 == "sengine"){
				$a_sengine	=	$ana->all_engine($page,$subPage,$eng_files);
		}
		//検索ワード
		if($chk9 == "sword"){
				$a_sword	=	$ana->all_keyword($page,$subPage,$eng_files);
		}
		//PC・スマホ対比
		if($Switching == "1"){
				$a_smart	=	$ana->all_smart($files);
		}
	}
	
//設定情報整理
	//ページ名設定
	if($page == "0"){
			$Page_set	=	"サイト全体（デフォルト）" ;
	}else{
			$Page_set	=	$page;
	}
	//サブページ名設定
	if($subPage){
			$subPage_set	=	"【".$subPage."】" ;
	}else{
			 $subPage_set	=	"-" ;
	}
	//期間名設定
	$period1	=	array("月間","週間","日指定");
	//解析機関設定
	$period_files	=	file($files);
	foreach($period_files as $value){
		$data	=	explode("\",\"", $value);
		$period_tmp[]	=	$data[1];
	}
	if($period_tmp){
			$period2_1	=	date("Y / m / d" , min($period_tmp));
			$period2_2	=	date("Y / m / d" , max($period_tmp));
	}
	unlink($files);
	unlink($eng_files);

//サイト表示ここから==============================================================================================================
print<<<EOF
        	<div id="right1">        <!-- 右側機能別コンテンツ開始▽ -->
				<h2>ログ解析　解析結果表示</h2>
				<br>
				<table>
    				<tr><td>指定条件</td></tr>
EOF;

echo '    				<tr><td>*ページ名</td><td>：</td><td><b>&nbsp;【'. $Page_set .'】</b></td></tr>';
echo '    				<tr><td>*ページURL</td><td>：</td><td><b>&nbsp;'. $subPage_set .'</b></td></tr>';
echo '    				<tr><td>*期間指定</td><td>：</td><td><b>&nbsp;【'.$period1[$target].'】</b></td></tr>';
echo '    				<tr><td>*解析期間</td><td>：</td><td><b>&nbsp;'. $period2_1 .'&nbsp;～&nbsp;'. $period2_2 .'</b></td></tr>';
print<<<EOF
    				<tr height="20px"><td></td></tr>
				</table>

			<div>
				<table height="70">
    				<tr><td>表示したいタイトルをクリックすると解析結果が表示されます。</td></tr>
    				<tr><td>　</td></tr>
    				<tr><td>　</td></tr>
				</table>
			</div>
			<br>
			<div class="Viewtxt">
EOF;
//データ確認
if($a_hit || $a_browser || $a_lang || $a_os || $a_rhost || $a_ref || $a_sengine || $a_sword || $a_smart){
		//========================================================================================================================
		//総ヒット数==============================================================================================================
		//========================================================================================================================
		if($chk1 == "hit"){
print<<<EOF
    			<dl>
    				<dt><a name=hit></a><div class="list_index">総ヒット数</div></dt>
    				<dd>
    					<table class="list_style5">
EOF;
			echo "\n";
			$weekry	=	array('日曜日','月曜日','火曜日','水曜日','木曜日','金曜日','土曜日');
			$max	=	max($a_hit);
			foreach($a_hit as $key =>$value){
					$month	=	mb_substr($key,4,2);
					$days	=	mb_substr($key,6,2);
					$week	=	mb_substr($key,9,1);
					
					$par	=	($value / $max)*100;
					echo '        					<tr><td class="g_index_1">'.$month.'月'.$days.'日 '.$weekry[$week].'</td><td class="g_data_1">'.$value.'</td><td class="g_data"><div title='.$value.'hit><img src="../img/analysis/graphbar2.gif" width='.$par.'% height="10"></div></td></tr>'."\n";
			}
print<<<EOF
        				</table>
        				<div class="list_footer"><a href=#>△上へ</a></div>
        			</dd>
    			</dl>
EOF;
		}
		//========================================================================================================================
		//ページ別================================================================================================================
		//========================================================================================================================
		if($chk7 == "pages"){
print<<<EOF
    			<dl>
    				<dt><a name=page></a><div class="list_index">ページ別ヒット数</div></dt>
    				<dd>
    					<table class="list_style5">
EOF;
			echo "\n";
				$max	=	max($a_pages);
				foreach($a_pages as $key =>$value){
						$par	=	($value / $max)*100;
						echo '        					<tr><td class="g_index_1">'.$key.'</td><td class="g_data_1">'.$value.'</td><td class="g_data"><div title="'.$value.'"><img src="../img/analysis/graphbar2.gif" width="'.$par.'%" height="10"></div></td></tr>'."\n";
				}
print<<<EOF
        				</table>
        				<div class="list_footer"><a href=#>△上へ</a></div>
        			</dd>
    			</dl>
EOF;
		}
		//========================================================================================================================
		//ブラウザ種類============================================================================================================
		//========================================================================================================================
		if($chk2 == "browser"){
print<<<EOF
    			<dl>
    				<dt><a name=browser></a><div class="list_index">ブラウザ使用率</div></dt>
    				<dd>
    					<table class="list_style5">

EOF;
			echo "\n";
				$max	=	max($a_browser);
				foreach($a_browser as $key =>$value){
						$par	=	($value / $max)*100;
						echo '        					<tr><td class="g_index_1">'.$key.'</td><td class="g_data_1">'.$value.'</td><td class="g_data"><div title="'.$value.'"><img src="../img/analysis/graphbar2.gif" width="'.$par.'%" height="10"></div></td></tr>'."\n";
				}
print<<<EOF
        				</table>
        				<div class="list_footer"><a href=#>△上へ</a></div>
        			</dd>
    			</dl>
EOF;
		}
		//========================================================================================================================
		//言語====================================================================================================================
		//========================================================================================================================
		if($chk3 == "lang"){
print<<<EOF
    			<dl>
    				<dt><a name=lang></a><div class="list_index">言語使用率</div></dt>
    				<dd>
    					<table class="list_style5">
EOF;
			echo "\n";
				$max	=	max($a_lang);
				foreach($a_lang as $key =>$value){
						$par	=	($value / $max)*100;
						echo '        					<tr><td class="g_index_1">'.$key.'</td><td class="g_data_1">'.$value.'</td><td class="g_data"><div title="'.$value.'"><img src="../img/analysis/graphbar2.gif" width="'.$par.'%" height="10"></div></td></tr>'."\n";
				}
print<<<EOF
	        				</table>
        				<div class="list_footer"><a href=#>△上へ</a></div>
        			</dd>
    			</dl>
EOF;
		}
		//========================================================================================================================
		//ＯＳ====================================================================================================================
		//========================================================================================================================
		if($chk4 == "os"){
print<<<EOF
    			<dl>
    				<dt><a name=os></a><div class="list_index">OS使用率</div></dt>
    				<dd>
    					<table class="list_style5">
EOF;
			echo "\n";
				$max	=	max($a_os);
				foreach($a_os as $key =>$value){
						$par	=	($value / $max)*100;
						echo '        					<tr><td class="g_index_1">'.$key.'</td><td class="g_data_1">'.$value.'</td><td class="g_data"><div title="'.$value.'"><img src="../img/analysis/graphbar2.gif" width="'.$par.'%" height="10"></div></td></tr>'."\n";
				}
print<<<EOF
        				</table>
        				<div class="list_footer"><a href=#>△上へ</a></div>
        			</dd>
    			</dl>
EOF;
		}
		//========================================================================================================================
		//リモートホスト==========================================================================================================
		//========================================================================================================================
		if($chk5 == "rhost"){
print<<<EOF
    			<dl>
    				<dt><a name=host></a><div class="list_index">リモートホスト</div></dt>
    				<dd>
    					<table class="list_style5">
EOF;
			echo "\n";
				$max	=	max($a_rhost);
				foreach($a_rhost as $key =>$value){
						$par	=	($value / $max)*100;
						echo '        					<tr><td class="g_index_1">'.$key.'</td><td class="g_data_1">'.$value.'</td><td class="g_data"><div title="'.$value.'"><img src="../img/analysis/graphbar2.gif" width="'.$par.'%" height="10"></div></td></tr>'."\n";
				}
print<<<EOF
        				</table>
        				<div class="list_footer"><a href=#>△上へ</a></div>
        			</dd>
    			</dl>
EOF;
		}
		//========================================================================================================================
		//リンク元================================================================================================================
		//========================================================================================================================
		if($chk6 == "ref"){
print<<<EOF
    			<dl>
    				<dt><a name=link></a><div class="list_index">リンク元</div></dt>
    				<dd>
     					<table class="list_style5">
EOF;
			echo "\n";
				$max	=	max($a_ref);
				foreach($a_ref as $key =>$value){
						$par	=	($value / $max)*100;
						if(!preg_match('/^(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/', $key)){
								echo '        					<tr><td class="g_index_1">'.$key.'</td><td class="g_data_1">'.$value.'</td><td class="g_data"><div title="'.$value.'"><img src="../img/analysis/graphbar2.gif" width="'.$par.'%" height="10"></div></td></tr>'."\n";
						}else{
								echo '        					<tr><td class="g_index_1"><a href="'.$key.'" target="_blank">'.$key.'</a></td><td class="g_data_1">'.$value.'</td><td class="g_data"><div title="'.$value.'"><img src="../img/analysis/graphbar2.gif" width="'.$par.'%" height="10"></div></td></tr>'."\n";
						}
				}
print<<<EOF
            			</table>
            			<div class="list_footer"><a href=#>△上へ</a></div>
        			</dd>
    			</dl>
EOF;
		}
		//========================================================================================================================
		//検索エンジン============================================================================================================
		//========================================================================================================================
		if($chk8 == "sengine"){
print<<<EOF
    			<dl>
    				<dt><a name=engine></a><div class="list_index">検索エンジン</div></dt>
    				<dd>
     					<table class="list_style5">
EOF;
			echo "\n";
				if($a_sengine != "off"){
						$max	=	max($a_sengine);
						foreach($a_sengine as $key =>$value){
								$par	=	($value / $max)*100;
								echo '        					<tr><td class="g_index_1">'.$key.'</td><td class="g_data_1">'.$value.'</td><td class="g_data"><div title="'.$value.'"><img src="../img/analysis/graphbar2.gif" width="'.$par.'%" height="10"></div></td></tr>'."\n";
						}
				}else{
								echo '        					<tr><td>データがありません</td></tr>';
				}
print<<<EOF
            			</table>
            			<div class="list_footer"><a href=#>△上へ</a></div>
        			</dd>
    			</dl>
EOF;
		}
		//========================================================================================================================
		//検索キーワード==========================================================================================================
		//========================================================================================================================
		if($chk9 == "sword"){
print<<<EOF
    			<dl>
    				<dt><a name=key></a><div class="list_index">検索キーワード</div></dt>
    				<dd>
     					<table class="list_style5">
EOF;
			echo "\n";
				if($a_sword != "off"){
						$max	=	max($a_sword);
						foreach($a_sword as $key =>$value){
								$par	=	($value / $max)*100;
								echo '        					<tr><td class="g_index_1">'.$key.'</td><td class="g_data_1">'.$value.'</td><td class="g_data"><div title="'.$value.'"><img src="../img/analysis/graphbar2.gif" width="'.$par.'%" height="10"></div></td></tr>'."\n";
						}
				}else{
								echo '        					<tr><td>データがありません</td></tr>';
				}
print<<<EOF
        				</table>
        				<div class="list_footer"><a href=#>△上へ</a></div>
        			</dd>
    			</dl>
EOF;
		}
		//========================================================================================================================
		//PC、スマートPC比較======================================================================================================
		//========================================================================================================================
		if($Switching == "1"){
print<<<EOF
    			<dl>
    				<dt><a name=host></a><div class="list_index">PC、スマートフォン　ページアクセス比較</div></dt>
    				<dd>
    					<table class="list_style5">
EOF;
			echo "\n";
				$max	=	max($a_smart);
				foreach($a_smart as $key =>$value){
						$par	=	($value / $max)*100;
						echo '        					<tr><td class="g_index_1">'.$key.'</td><td class="g_data_1">'.$value.'</td><td class="g_data"><div title="'.$value.'"><img src="../img/analysis/graphbar2.gif" width="'.$par.'%" height="10"></div></td></tr>'."\n";
				}
print<<<EOF
        				</table>
        				<div class="list_footer"><a href=#>△上へ</a></div>
        			</dd>
    			</dl>
EOF;
			echo "\n";
		}
}else{
print<<<EOF
			<div style="height:360px;">
				<table class="list_style5">
        						<tr><td>データがありません</td></tr>
				</table>
			</div>
EOF;
}
print<<<EOF
	 		<form method="post" action="./">
	 			<input type="submit" value="　戻　る　">
			</form>
				<br>
    			<noscript>&lt;span class="r_txt"&gt;*javascript が OFF になっています。&lt;/span&gt;</noscript>
			</div>
    </div>
</div>
</body>
</html>

EOF;
?>