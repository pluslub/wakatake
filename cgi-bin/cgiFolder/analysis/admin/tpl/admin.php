<?php

//==========================================================//
//管理者の設定画面
//最終更新　2012/01/27
//==========================================================//

print<<<EOF

        <div id="right1">
                <h2>管理者情報設定</h2>
				<p>・登録済みの管理者情報の変更を行ないます。</p>
				<p>・アクセス解析を管理する管理ID、パスワード、およびメールアドレスを入力してください。</p>
				<p>・初期IDとパスワードは使えなくなりますので必ず新しいIDとパスワードをメモ等にお控えください。</p>
				<br>
				
				<form method="post" action="./">
					<input type="hidden" name="contents" value="admin">
					<input type="hidden" name="ac" value="admin2">
    				<table class="list_style1">
        					<tr>
        						<th>管理者ID<span class="r_txt">（必須）</span></th>
            					<td><input size="45px" type="text" id="loginFormInputnewUid" name="newUid" value="$user" style="width:50%"><span class="r_txt">&nbsp;&nbsp;&nbsp;半角英数字4～15文字（記号不可）</span><br><span class="r_txt">$error1</span></td>
        					</tr>
                			<tr> <th></th><td></td></tr>
        					
        					<tr><th>パスワード<span class="r_txt">（必須）</span></th>
            					<td><input size="45px" type="password" id="loginFormInputnewPwd1" name="newPwd1" value="" style="width:50%"><span class="r_txt">&nbsp;&nbsp;&nbsp;半角英数字4～15文字（記号不可）</span><br><span class="r_txt">$error2</span></td>
        					</tr>
                			<tr><th></th>
            					<td></td>
        					</tr>
                			<tr><th>パスワード確認<span class="r_txt">（必須）</span></th>
            					<td><input size="45px" type="password" id="loginFormInputnewPwd2" name="newPwd2" style="width:50%"><span class="r_txt">&nbsp;&nbsp;&nbsp;確認のため再度入力してください。</span><br><span class="r_txt">$error3</span></td>
        					</tr>
                			<tr><th></th>
            					<td></td>
        					</tr>
        					
        					<tr><th>メールアドレス<span class="r_txt">（必須）</span></th>
            					<td><input size="45px" type="text" id="loginFormInputnewMaddr1" name="newMaddr1" value="$mail" style="width:50%"><span class="r_txt">&nbsp;&nbsp;&nbsp;（上限50文字）</span><br><span class="r_txt">$error4</span></td>
        					</tr>
                			<tr><th></th>
            					<td></td>
        					</tr>
                			<tr><th>メールアドレス確認<span class="r_txt">（必須）</span></th>
                				<td><input size="45px" type="text" id="loginFormInputnewMaddr2" name="newMaddr2" value="" style="width:50%"><span class="r_txt">&nbsp;&nbsp;&nbsp;確認のため再度入力してください。</span><br><span class="r_txt">$error5</span></td></tr>
                			<tr><th></th>
            					<td></td>
        					</tr>
            		</table>
					<br>
    				<div style="width:300px; margin:0 auto 0 auto;">
        					<input type="submit" value="　更　新　">
    				</div>
				</form>
				
				<noscript>&lt;span class="r_txt"&gt;*Javascript が無効になっています。&lt;/span&gt;</noscript>
        </div>
      </div>
    </div>
</body>
</html>

EOF;
?>