<?php

//==========================================================//
//除外ホストの設定画面
//最終更新　2012/01/27
//==========================================================//

//除外ホスト設定画面
print<<<EOF
        <div id="right1">
			<h2>取得拒否ホスト設定</h2>
			<p>・ログの取得を行なわないホスト名を入力してください。</p>
			<p>・禁止したホストの取得を行う場合は下記リストから削除して変更ボタンを押してください。</p>
			<br>
			<div id="notice"></div>
			<form method="post" action="./">
			<input type="hidden" name="contents" value="hosts">
			<input type="hidden" name="hosts" value="1">
    			<table class="list_style6" border=0>
                	<tr>
        				<td colspan="3">　</td>
    				</tr>
    				<tr><td colspan="3">登録中のホスト一覧：</td>
    				</tr>
    				<tr><td colspan="3" class="Text"><font size="4"><textarea id="block_list" name="block_list" style=" padding-left:5px; width:330px; height:250px;">$hosts</textarea></font></td>
        			</tr>
        		</table>
				<br>
				<br>
    			<input type="submit" value="　更　新　">
			</form>
			
			
			<noscript>&lt;span class="r_txt"&gt;*Javascript が無効になっています。&lt;/span&gt;</noscript>
        </div>
      </div>
    </div>
</body>
</html>
EOF;

?>