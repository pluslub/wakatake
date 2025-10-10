<?php

//==========================================================//
//ログファイル削除の画面
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
	
//変数取得
	$del			=	$_POST['del'];
	$confirmed		=	$_POST['confirmed'];
	$flag			=	$_POST['flag'];
	$targetYear		=	$_POST['targetYear'];
	$targetMonth	=	$_POST['targetMonth'];

	//期間判定
		if($targetYear && $targetMonth){
				$ym_flag	=	1;
		}



//デフォルト＆エラー表示
if($del != "del" || !$confirmed || !$ym_flag){



print<<<EOF

        <div id="right1">
        		
            <script type="text/javascript" src="./js/common.js"></script>
			<h2>ログファイル削除</h2>
			<p>収集したログファイルの削除を行います。</p>
			<p>削除対象となるログファイルの期間(年/月)を入力してください。</p>
			<br>
			<form method="post" action="./" NAME="form1" id="settingFORM">
				<input type="hidden" name="contents" value="file">
				<input type="hidden" name="flag" value="1">
				<input type="hidden" name="del" value="del">
				
				
    			<table class="list_style3">
                		<tr><th style="width:100;padding-left:10px; padding-right:0px;">削除対象</th>
            				<td>
            					<select name="targetYear" id="targetYear">
            							<option value="">選択</option>
EOF;
echo "\n";
	//セレクトメニュー（年）のデータ取得
    foreach($ym as $key =>$value){
	
    echo '										<option value='.$key.'>20'.$key."</option>\n";
     
    }
print<<<EOF
            					</select>年
                				<select name="targetMonth" id="targetMonth">
EOF;
echo "\n";
	//セレクトメニュー（月）データ取得
	//年のkeyに対してのvalue値
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
print<<<EOF
    							</select>月分

            				</td>
        				</tr>
    					<tr><td colspan="2">
EOF;
//同意エラー表示
if($flag && $ym_flag != 1){
	echo '　　　　　<span class="r_txt">　　期間が選択されていません。</span>';
}else{
	echo '　';
}

print<<<EOF

							</td></tr>
                		<tr>
    						<td style="padding-left:50px; padding-right:0px;"><input type="checkbox" name="confirmed" id="confirmed" value="1"></td>
            				<td>削除に同意します</td>
        				</tr>
    					<tr><td colspan="2">
EOF;

//同意エラー表示
if($flag && !$confirmed){
	echo '　　　　　<span class="r_txt">↑確認にチェックがされていません。</span><br><br>';
}else{
	echo '　';
}

print<<<EOF
    					</td></tr>
    					<tr>
    						<td colspan="2" style="padding-left:10px;"><span class="r_txt">※削除したログファイルは完全に削除されます。</span></td>
    					</tr>
    			</table>
				<br>
				<br>
    				<input type="submit" value="　削　除　">
			</form>
			<br>
			<div class="Viewerr2">
			</div>
			
			<noscript>&lt;span class="r_txt"&gt;*Javascript が無効になっています。&lt;/span&gt;</noscript>
			
        </div>
     </div>
   </div>
<script type="text/javascript">
<!--
	ConnectedSelect(['targetYear','targetMonth']);
-->
</script>
</body>
</html>

EOF;

//ログファイル削除
}elseif($del == "del" && $confirmed && $ym_flag){


//セレクトメニューの値取得
	//ログファイルディレクトリ
	$dir = '../works/log';
	
	//ディレクトリ内のファイル名取得して格納
	$file_names = scandir($dir);

	//選択された年月設定
	$ym	=	$targetYear . $targetMonth;
	
	//検索パラメータ
	$ym_prm	=	'/' . $ym . '/i';
	
	//データ確認用
	//$ym_tmp	=	array();
	
		//データ一斉削除
		foreach($file_names as $value){
        	
        	//ファイルマッチング
        	if(preg_match($ym_prm , $value)){
				
				//データ確認用
				//$ym_tmp[]	=	$value;
				unlink($dir."/".$value);
				
	    	}
			
    	}

//データ確認用
//var_dump($ym_tmp);



//削除後の表示
print<<<EOF

        <div id="right1">
        		
                <script type="text/javascript" src="./js/ConnectedSelect.js"></script>
				<script type="text/javascript">
				

</script>

			<h2>ログファイル削除</h2>
			<p>収集したログファイルの削除を行います。</p>
			<p>削除対象となるログファイルの期間(年/月)を入力してください。</p>
			<br>
			<form method="post" action="./" NAME="form1" id="settingFORM">
        		<input type="hidden" name="contents" value="file">
				<p>ログファイルを削除しました。</p>
				<br>
				<br>
    			<div class="Viewbtn">
        			<input type="submit" value="戻る">
    			</div>
			</form>
			<br>
			<div class="Viewerr2">
			</div>
			
			<noscript>&lt;span class="r_txt"&gt;*Javascript が無効になっています。&lt;/span&gt;</noscript>
			
        </div>
     </div>
   </div>
<script type="text/javascript">
<!--
	ConnectedSelect(['targetYear','targetMonth']);
-->
</script>
</body>
</html>

EOF;

}
?>