<?php

//==========================================================//
//ログ表示設定の画面
//最終更新　2012/01/27
//==========================================================//

//ヘッダー
	include 'header.php';

//メニュー
	include 'menu.php';
//セレクトメニューの値取得
	include './sorce/select_log.php';
	$select	=	new select();
			$page	=	$select->page();
			$ym	=	$select->target();
			
print<<<EOF
        <div id="right1">
        		<script type="text/javascript" src="js/common.js"></script>
				
				<h2>ログ解析条件設定</h2>
				<p>サイトのログファイルを解析し、その結果を表示します。</p>
				<p>解析条件を入力し「表示」ボタンを押して下さい。</p>
				<br>
				<form method="post" action="./" NAME="form1" id="settingFORM">
    					<h2>ページ名選択(解析したいページ名）</h2>
    					<table class="list_style1">
        						<tr>
        								<th>ページ名</th>
        								<td>
        									<select id="showFormDataSelectorPage" name="page">
    											<option value="0">サイト全体（デフォルト）</option>

EOF;
//ページ名取得
echo "\n";
if($page){
    foreach($page as $key =>$value){
    echo '										<option value='.$key.'>'.$key."</option>\n";
    }
}
print<<<EOF
        									</select>
        								</td>
        						</tr>
        						<tr>
        								<th>サブページ名</th>
        								<td>
        									<select id="showFormDataSelectorSub" name="subPage" disabled="">
            									<option value="0">選択</option>
EOF;
//サブページ取得
echo "\n";
	//サブページデータ取得
	//ページのkeyに対してのvalue値
if($page){
    foreach($page as $key =>$value){

    //ページとの連動用ラベル作成・表示
    echo '										<optgroup label='.$key.">\n";

	    			//サブページのvalue値取得・表示
	    			sort($value,SORT_STRING);
	    			foreach($value as $val){
	    				if($val != "サブページなしの処理"){
            					echo '											<option value='.$val.'>'.$val."</option>\n";
            			}
				}
    //ラベル閉じタグ
    echo "										</optgroup>\n";
    }

}
print<<<EOF
        									</select>
        								</td>
        						</tr>
    					</table>
						<br>
    					<h2>期間指定</h2>
    					<DIV id="target_error">　</DIV>
    					<table class="list_style1">
        						<tr>
        							<th><input type="radio" name="target" id="target" value="0" onClick=rdo_Change(this)>月間（年/月指定）</th>
            						<td>
            								<select name="targetYear" id="targetYear" disabled>
            									<option value="">選択</option>
EOF;
echo "\n";
	//セレクトメニュー（年）のデータ取得
	if($ym){
    	foreach($ym as $key =>$value){
    		echo '										<option value='.$key.'>20'.$key."</option>\n";
    	}
    }
print<<<EOF
            								</select>年&nbsp;
            								<select name="targetMonth" id="targetMonth">

EOF;
echo "\n";
	//セレクトメニュー（月）データ取得
	//年のkeyに対してのvalue値
	if($ym){
    	foreach($ym as $key =>$value){
     			//年との連動用ラベル作成・表示
    			echo '										<optgroup label='.$key.">\n";
	    			//月のvalue値取得・表示
	    			foreach($value as $val){
            						echo '											<option value='.$val.'>'.$val."</option>\n";
					}
    			//ラベル閉じタグ
    			echo "										</optgroup>\n";
    	}
    }
print<<<EOF
            								</select>月
        	  	<script type="text/javascript">
        		<!--
						ConnectedSelect(['showFormDataSelectorPage','showFormDataSelectorSub']);
						ConnectedSelect(['targetYear','targetMonth']);
				-->
				</script>
        							</td>
        						</tr>
        						<tr>
        							<th><input type="radio" name="target" value="1" id="target" onClick=rdo_Change(this)>週間（最新4週分）</th>
            						<td><select name="targetWeek" id="targetWeek" disabled>
            								<option value="0">今週</option>
            								<option value="1">先週</option>
            								<option value="2">先々週</option>
            								<option value="3">3週間前</option>
            							</select>
            						</td>
        						</tr>
        						<tr>
        							<th><input type="radio" name="target" value="2" id="target" onClick=rdo_Change(this)>日指定（最新7日分）</th>
            						<td><select name="targetDay" id="targetDay"  disabled>
            								<option value="0">今日</option>
            								<option value="1">昨日</option>
            								<option value="2">一昨日</option>
            								<option value="3">3日前</option>
            								<option value="4">4日前</option>
            								<option value="5">5日前</option>
            								<option value="6">6日前</option>
            							</select>
            						</td>
        						</tr>
    					</table>
    					<br>
						<h2>種別指定　（PC用ページとスマートフォン用ページの集計切り替え）</h2>
						<DIV id="sw_error">　</DIV>
    					<table class="list_style1">
        					<tr>
        						<td>
									<input type="radio" name="Switching" value="1" id="Switching" >総合表示
								</td>
							</tr>
        					<tr>
        						<td>
									<input type="radio" name="Switching" value="2" id="Switching2" >ＰＣ用ページ集計
								</td>
							</tr>
        					<tr>
        						<td>
									<input type="radio" name="Switching" value="3" id="Switching3" >スマートフォン用ページ集計
								</td>
							</tr>
        						</tr>
    					</table>
    					<br>
						<h2>ページビューとユニークユーザーの集計切り替え</h2>
						<DIV id="view_error">　</DIV>
    					<table class="list_style1">
        					<tr>
        						<td>
									<input type="radio" name="view" value="1" id="view1" >ページビューで集計
								</td>
							</tr>
        					<tr>
        						<td>
									<input type="radio" name="view" value="2" id="view2" >ユニークユーザーで集計
								</td>
							</tr>
        						</tr>
    					</table>
						<br>
    					<h2>フィールド指定(解析したいフィールド）</h2>
    					<DIV id="chk_error">　</DIV>
    					<table class="list_style1">
        					<tr>
        							<td class="showFormDataIndex" colspan="3" style="white-space: pre; width:100px;"><input type="button" value="　全て選択　" onclick="BoxChecked(true)">　　<input type="button" value="　全て未選択　" onclick="BoxChecked(false)"></td>
        					</tr>
        					<tr>
        							<td class="showFormDataIndex" colspan="3"><input type="checkbox" name="chk1" value="hit" id="chk1">&nbsp;総ヒット数</td>
        					</tr>
        					<tr>
        							<td class="showFormDataIndex"><input type="checkbox"  name="chk2" value="browser" id="chk2">&nbsp;ブラウザ</td>
            						<td class="showFormDataIndex"><input type="checkbox" name="chk3" value="lang" id="chk3">&nbsp;言語</td>
            						<td class="showFormDataIndex"><input type="checkbox" name="chk4" value="os" id="chk4">&nbsp;OS</td>
        					</tr>
        					<tr>
        							<td class="showFormDataIndex"><input type="checkbox" name="chk5" value="rhost" id="chk5">&nbsp;リモートホスト</td>
            						<td class="showFormDataIndex"><input type="checkbox" name="chk6" value="ref" id="chk6">&nbsp;リンク元</td>
            						<td class="showFormDataIndex"><input type="checkbox" name="chk7" value="pages" id="chk7">&nbsp;ページ別</td>
        					</tr>
        					<tr>
        							<td class="showFormDataIndex"><input type="checkbox" name="chk8" value="sengine" id="chk8">&nbsp;検索エンジン</td>
            						<td class="showFormDataIndex"><input type="checkbox" name="chk9" value="sword" id="chk9">&nbsp;検索ワード</td>
        					</tr>
    					</table>
						<br>
    					<div class="Viewbtn_disp">
    							<input id="setting" type="button" value="　表　示　">
    					</div>
				</form>
				
				<noscript>&lt;span class="r_txt"&gt;*javascript が OFF になっています。&lt;/span&gt;</noscript>
       </div>
    </div>
 </div>
</body>
</html>


EOF;

?>