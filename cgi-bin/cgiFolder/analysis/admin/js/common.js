//ConnectedSelect.js
function ConnectedSelect(selIdList){
	for(var i=0;selIdList[i];i++) {
		var CS = new Object();
		var obj = document.getElementById(selIdList[i]);
		if(i){
			CS.node=document.createElement('select');
			var GR = obj.getElementsByTagName('optgroup');
			while(GR[0]) {
				CS.node.appendChild(GR[0].cloneNode(true));
				obj.removeChild(GR[0]);
			}
			obj.disabled = true;
		}
		if(selIdList[i+1]) {
			CS.nextSelect = document.getElementById(selIdList[i+1]);
			obj.onchange = function(){ConnectedSelectEnabledSelect(this)};
		} else {
			CS.nextSelect = false;
		}
		obj.ConnectedSelect = CS;
	}
}

function ConnectedSelectEnabledSelect(oSel){
	var oVal = oSel.options[oSel.selectedIndex].value;
	if(oVal) {
		while(oSel.ConnectedSelect.nextSelect.options[1])oSel.ConnectedSelect.nextSelect.remove(1);
		var eF = false;
		for(var OG=oSel.ConnectedSelect.nextSelect.ConnectedSelect.node.firstChild;OG;OG=OG.nextSibling) {
			if(OG.label == oVal) {
				eF = true;
				for(var OP=OG.firstChild;OP;OP=OP.nextSibling)
					oSel.ConnectedSelect.nextSelect.appendChild(OP.cloneNode(true));
				break;
			}
		}
		oSel.ConnectedSelect.nextSelect.disabled = !eF;
	} else {
		oSel.ConnectedSelect.nextSelect.selectedIndex = 0;
		oSel.ConnectedSelect.nextSelect.disabled = true;
	}
	if(oSel.ConnectedSelect.nextSelect.onchange)oSel.ConnectedSelect.nextSelect.onchange();
}

//Check.js
function BoxChecked(check){
   
		document.getElementById("settingFORM").chk1.checked = check;
		document.getElementById("settingFORM").chk2.checked = check;
		document.getElementById("settingFORM").chk3.checked = check;
		document.getElementById("settingFORM").chk4.checked = check;
		document.getElementById("settingFORM").chk5.checked = check;
		document.getElementById("settingFORM").chk6.checked = check;
		document.getElementById("settingFORM").chk7.checked = check;
		document.getElementById("settingFORM").chk8.checked = check;
		document.getElementById("settingFORM").chk9.checked = check;

}


function rdo_Change(obj){
	var msg;
    msg = obj.value;
    //月間
    if(msg == 0){
    	document.getElementById("settingFORM").targetYear.disabled = false;
    	//年度に値があるときアクティブ
    	var ty	= document.getElementById("settingFORM").targetYear.value;
    	if(ty){
    		document.getElementById("settingFORM").targetMonth.disabled = false;
    	}
	}else{
		document.getElementById("settingFORM").targetYear.disabled = true;
		document.getElementById("settingFORM").targetMonth.disabled = true;
    }
    //週間
    if(msg == 1){
    	document.getElementById("settingFORM").targetWeek.disabled = false;
	}else{
		document.getElementById("settingFORM").targetWeek.disabled = true;
    }
    //日指定
    if(msg == 2){
    	document.getElementById("settingFORM").targetDay.disabled = false;
	}else{
		document.getElementById("settingFORM").targetDay.disabled = true;
    }
    //選択なしの場合
    
    if(!msg){
    	document.getElementById("settingFORM").targetYear.disabled = true;
    	document.getElementById("settingFORM").targetWeek.disabled = true;
    	document.getElementById("settingFORM").targetDay.disabled = false;
	}
	
}
