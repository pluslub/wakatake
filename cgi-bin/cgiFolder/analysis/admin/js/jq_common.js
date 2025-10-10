//最終更新　2012/06/27
$(function(){
	//ログインフォームから値を取得
        $("#send").click(function(){
        	var loginFormInputUid		= $("#loginFormInputUid").val();
        	var loginFormInputPwd		= $("#loginFormInputPwd").val();
         	
		 	
		  	var form = document.createElement('form');
    				form.style.display = 'none';
    				document.body.appendChild(form);
    				
   			// エレメントの属性を設定 エレメント名.setAttribute(name,value);
   			
   			if(loginFormInputUid != ""){
   					var input1 = document.createElement('input');
    						input1.setAttribute('type','hidden');
    						input1.setAttribute('name','uid');
    						input1.setAttribute('value',loginFormInputUid );
    						form.appendChild(input1);
    		}
    		if(loginFormInputPwd != ""){
					var input2 = document.createElement('input');
    						input2.setAttribute('type','hidden');
    						input2.setAttribute('name','pwd');
    						input2.setAttribute('value',loginFormInputPwd );
    						form.appendChild(input2);
    		}
    				
    				//アクションフラグ
    				
    				if(loginFormInputUid == "" || loginFormInputPwd == ""){
    						document.getElementById('login_error2').innerHTML = '<FONT COLOR=RED><B>ID、またはパスワードを入力してください</B></FONT>';
    						document.getElementById('login_error1').innerHTML = "　";
					}else{
    						document.getElementById('login_error2').innerHTML = "　";
							/**/
							var input3 = document.createElement('input');
    							input3.setAttribute('type','hidden');
    							input3.setAttribute('name','contents');
    							input3.setAttribute('value','start');
    							form.appendChild(input3);
    							
    						var input4 = document.createElement('input');
    							input4.setAttribute('type','hidden');
    							input4.setAttribute('name','logins');
    							input4.setAttribute('value','on');
    							form.appendChild(input4);
    							
    							form.setAttribute('action','index.php');
    							form.setAttribute('method','post');
    							form.submit();
    			}
       	 })
        
	//表示設定画面から値を取得
        $("#setting").click(function(){
			
        	//そのまま取得
        	var page			= $("#showFormDataSelectorPage").val();
        	var subPage			= $("#showFormDataSelectorSub").val();
        	
		    var form = document.createElement('form');
    		form.style.display = 'none';
    		document.body.appendChild(form);
			
        	//チェックボックス用
   			var err_chk	=	"";
        	var chk1	=	"";
   			if(document.getElementById("chk1").checked == true) {
    				err_chk		=	"chk";
   					var input1 = document.createElement('input');
    					input1.setAttribute('type','hidden');
    					input1.setAttribute('name','chk1');
    					input1.setAttribute('value',$("#chk1").val() );
    				form.appendChild(input1);
    		}
    		var chk2	=	"";
    		if(document.getElementById("chk2").checked == true) {
    				err_chk		=	"chk";
   					var input2 = document.createElement('input');
    					input2.setAttribute('type','hidden');
    					input2.setAttribute('name','chk2');
    					input2.setAttribute('value',$("#chk2").val() );
    				form.appendChild(input2);
    		}
    		var chk3	=	"";
    		if(document.getElementById("chk3").checked == true) {
    				err_chk		=	"chk";
   					var input3 = document.createElement('input');
    					input3.setAttribute('type','hidden');
    					input3.setAttribute('name','chk3');
    					input3.setAttribute('value',$("#chk3").val() );
    				form.appendChild(input3);
    		}
    		var chk4	=	"";
    		if(document.getElementById("chk4").checked == true) {
    				err_chk		=	"chk";
   					var input4 = document.createElement('input');
    					input4.setAttribute('type','hidden');
    					input4.setAttribute('name','chk4');
    					input4.setAttribute('value',$("#chk4").val() );
    				form.appendChild(input4);
    		}
    		var chk5	=	"";
    		if(document.getElementById("chk5").checked == true) {
    				err_chk		=	"chk";
   					var input5 = document.createElement('input');
    					input5.setAttribute('type','hidden');
    					input5.setAttribute('name','chk5');
    					input5.setAttribute('value',$("#chk5").val() );
    				form.appendChild(input5);
    		}
    		var chk6	=	"";
    		if(document.getElementById("chk6").checked == true) {
    				err_chk		=	"chk";
   					var input6 = document.createElement('input');
    					input6.setAttribute('type','hidden');
    					input6.setAttribute('name','chk6');
    					input6.setAttribute('value',$("#chk6").val() );
    				form.appendChild(input6);
    		}
    		var chk7	=	"";
    		if(document.getElementById("chk7").checked == true) {
    				err_chk		=	"chk";
   					var input7 = document.createElement('input');
    					input7.setAttribute('type','hidden');
    					input7.setAttribute('name','chk7');
    					input7.setAttribute('value',$("#chk7").val() );
    				form.appendChild(input7);
    		}
    		var chk8	=	"";
    		if(document.getElementById("chk8").checked == true) {
    				err_chk		=	"chk";
   					var input8 = document.createElement('input');
    					input8.setAttribute('type','hidden');
    					input8.setAttribute('name','chk8');
    					input8.setAttribute('value',$("#chk8").val() );
    				form.appendChild(input8);
    		}
    		var chk9	=	"";
    		if(document.getElementById("chk9").checked == true) {
    				err_chk		=	"chk";
   					var input15 = document.createElement('input');
    					input15.setAttribute('type','hidden');
    					input15.setAttribute('name','chk9');
    					input15.setAttribute('value',$("#chk9").val() );
    				form.appendChild(input15);
    		}
    				
   			var input9 = document.createElement('input');
    				input9.setAttribute('type','hidden');
    				input9.setAttribute('name','target');
    				input9.setAttribute('value',target );
    				form.appendChild(input9);
    				
    		//種別変更
    		var Switching = "";
    		var Switching_name	=	document.getElementsByName("Switching");
    		for(var i=0; i < Switching_name.length; i++){
    			if(Switching_name[i].checked){
					Switching		= Switching_name[i].value;
				}
			}
			if(Switching != ""){
   				var input10 = document.createElement('input');
    				input10.setAttribute('type','hidden');
    				input10.setAttribute('name','Switching');
    				input10.setAttribute('value',Switching );
    				form.appendChild(input10);
    				
    		}else{
    			Switching	= "error";
    		}
    		
    		//ユーザー切り替え
    		var view = "";
    		var view_name	=	document.getElementsByName("view");
    		for(var i=0; i < view_name.length; i++){
    			if(view_name[i].checked){
					view		= view_name[i].value;
				}
			}
			if(view != ""){
   				var input_view = document.createElement('input');
    				input_view.setAttribute('type','hidden');
    				input_view.setAttribute('name','view');
    				input_view.setAttribute('value',view );
    				form.appendChild(input_view);
    				
    		}else{
    			view	= "error";
    		}
    		
    		
    		//期間指定の時、取得＆hidden構築
    		var target = 999;
    		var target_name	=	document.getElementsByName("target");
    		for(var i=0; i < target_name.length; i++){
    			if(target_name[i].checked){
					target		= target_name[i].value;
				}
			}
			//alert(target);
        	if(target == 0){
        			//年
        			var targetYear		= $("#targetYear").val();
        			
        			if(targetYear != ""){
   						var input11 = document.createElement('input');
    						input11.setAttribute('type','hidden');
    						input11.setAttribute('name','targetYear');
    						input11.setAttribute('value',targetYear );
    						form.appendChild(input11);
    						
    					//月
    					var targetMonth		= $("#targetMonth").val();
   						var input12 = document.createElement('input');
    						input12.setAttribute('type','hidden');
    						input12.setAttribute('name','targetMonth');
    						input12.setAttribute('value',targetMonth );
    						form.appendChild(input12);
    						if($("#targetMonth").val() != ""){
    								var target_ymdw	=	"ok";
    						}
    				}
    				
        	//週表示
        	}else if(target == 1){
        			var targetWeek		= $("#targetWeek").val();
        			var input11 = document.createElement('input');
    						input11.setAttribute('type','hidden');
    						input11.setAttribute('name','targetWeek');
    						input11.setAttribute('value',$("#targetWeek").val() );
    						form.appendChild(input11);
    						if($("#targetWeek").val() != ""){
    								var target_ymdw	=	"ok";
    						}
        	//日表示
        	}else if(target == 2){
        			var targetDay		= $("#targetDay").val();
        			var input11 = document.createElement('input');
    						input11.setAttribute('type','hidden');
    						input11.setAttribute('name','targetDay');
    						input11.setAttribute('value',$("#targetDay").val() );
    						form.appendChild(input11);
    						if($("#targetDay").val() != ""){
    								var target_ymdw	=	"ok";
    						}
        	}else{
        		target	= "error";
        		var target_ymdw	=	"ng";
        	}
			if(target != "error" || target != 999){
   					var input_tgt = document.createElement('input');
    						input_tgt.setAttribute('type','hidden');
    						input_tgt.setAttribute('name','target');
    						input_tgt.setAttribute('value',target );
    						form.appendChild(input_tgt);
    		}
        	
    		//alert(target);
    		
   			var input13 = document.createElement('input');
    				input13.setAttribute('type','hidden');
    				input13.setAttribute('name','page');
    				input13.setAttribute('value',page );
    				form.appendChild(input13);
    				
			var input14 = document.createElement('input');
    				input14.setAttribute('type','hidden');
    				input14.setAttribute('name','subPage');
    				input14.setAttribute('value',subPage );
    				form.appendChild(input14);
					
    				
    		//アクションフラグ
			if(err_chk == ""){
					error_flag1 = 1;
    				document.getElementById('chk_error').innerHTML = '<FONT COLOR=RED><B>表示フィールドにチェックが入っていません。</B></FONT>';
    		}else{
    				document.getElementById('chk_error').innerHTML = "　";
    		}
    		if(target == "error"){
    				document.getElementById('target_error').innerHTML = '<FONT COLOR=RED><B>期間選択がされていません。</B></FONT>';
    		}else{
    				document.getElementById('target_error').innerHTML = "　";
    		}
    		if(target_ymdw != "ok"){
    				document.getElementById('target_error').innerHTML = '<FONT COLOR=RED><B>年月日選択がされていません。</B></FONT>';
    		}else{
    				document.getElementById('target_error').innerHTML = "　";
    		}
    		if(Switching == "error"){
    				document.getElementById('sw_error').innerHTML = '<FONT COLOR=RED><B>種別指定が選択されていません。</B></FONT>';
    		}else{
    				document.getElementById('sw_error').innerHTML = "　";
    		}
    		if(view == "error"){
    				document.getElementById('view_error').innerHTML = '<FONT COLOR=RED><B>集計切り替えが選択されていません。</B></FONT>';
    		}else{
    				document.getElementById('view_error').innerHTML = "　";
    		}
    		if(target_ymdw == "ok" && err_chk != "" && target != "error" && Switching != "error" && view != "error"){
    				//正常
    				var input23 = document.createElement('input');
    						input23.setAttribute('type','hidden');
    						input23.setAttribute('name','contents');
    						input23.setAttribute('value','log_report');
    						form.appendChild(input23);
    						form.setAttribute('action','index.php');
    						form.setAttribute('method','post');
    						form.submit();
    		}
        })
        	
    //$('dl dd').css('display', 'none');
    //アコーディオン
	$('dl dt').click(function(){
		var d = {height:'toggle', opacity:'toggle'};
		$(this).toggleClass('active');
		$('+dd:not(:animated)',this).animate(d);
	}).mouseover(function(){
		$(this).addClass('ov');
	}).mouseout(function(){
		$(this).removeClass('ov');
	});
	
	//初期値設定
	//期間指定
	$("#target").ready(function(){
		if(document.getElementById("targetDay")){
			$("input[name='target']").val(["2"]);
			document.getElementById("settingFORM").targetDay.disabled = false;
		}
	});
	
	//種別指定
	$("#Switching").ready(function(){
			$("input[name='Switching']").val(["1"]);
	});
	
	//集計切り替え
	$("#view1").ready(function(){
			$("input[name='view']").val(["1"]);
	});
	
	//フィールド指定
	if(document.getElementById("chk1")){
		$("#chk1").ready(function(){
						document.getElementById("settingFORM").chk1.checked = true;
		});
		$("#chk2").ready(function(){
						document.getElementById("settingFORM").chk2.checked = true;
		});
		$("#chk4").ready(function(){
						document.getElementById("settingFORM").chk4.checked = true;
		});
	}

})
