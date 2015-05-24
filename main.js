var ajax_update = new Ajax(),_ShowStat=null,_UpTimeId,_UpDataTimeId,_PostID=0;
var dtEorzea = {
timeAdjust:1278950400,
timeGame:144,
timeEarth:7,
etMonthName:[ "",
	"魔羯(冰)",
	"水瓶(冰)",
	"双鱼(水)",
	"白羊(水)",
	"金牛(风)",
	"双子(风)",
	"巨蟹(雷)",
	"狮子(雷)",
	"处女(火)",
	"天秤(火)",
	"天蝎(土)",
	"射手(土)",
],
etDayName:[ "",
	"风属日", "雷属日", "火属日", "土属日", "冰属日", "水属日", "星极日", "灵极日",
	"风属日", "雷属日", "火属日", "土属日", "冰属日", "水属日", "星极日", "灵极日",
	"风属日", "雷属日", "火属日", "土属日", "冰属日", "水属日", "星极日", "灵极日",
	"风属日", "雷属日", "火属日", "土属日", "冰属日", "水属日", "星极日", "灵极日",
],
etHourName:[
	"冰之刻", "冰之刻", "冰之刻", "冰之刻", 
	"水之刻", "水之刻", "水之刻", "水之刻", 
	"风之刻", "风之刻", "风之刻", "风之刻", 
	"雷之刻", "雷之刻", "雷之刻", "雷之刻", 
	"火之刻", "火之刻", "火之刻", "火之刻", 
	"土之刻", "土之刻", "土之刻", "土之刻", 
],
get:function (s){
	var F = this;
	var timeEorzea = Math.round((s / 1000 - F.timeAdjust) * F.timeGame / F.timeEarth);
	timeEorzea = Math.round(timeEorzea / 10) * 10;
	return {'year':Math.floor(timeEorzea / 33177600),'month':Math.floor(timeEorzea % 33177600 / 2764800) + 1,'day':Math.floor(timeEorzea % 2764800 / 86400) + 1,'hour':Math.floor(timeEorzea % 86400 / 3600),'min':Math.floor(timeEorzea % 3600 / 60),'sec':timeEorzea % 60}
},
tostr:function (s){
	var M=this,F = M.get(s*1000);
	F.days  = M.B(F.day);
	F.months  = M.B(F.month);
	F.hours  = M.B(F.hour);
	F.mins  = M.B(F.min);
	return F.months+'月'+F.days+'日'+F.hours+'时'+F.mins +'分&nbsp;'+M.etMonthName[F.month]+'&nbsp;'+M.etDayName[F.day]+'&nbsp;'+M.etHourName[F.hour];
},
apply:function(s){var F = this;for(var i in s){F[i]=s[i];}},
init:function (){
	var F =this;
	F.timeJST = new Date().getTime();
	F.apply(F.get(F.timeJST));
	F.epoch = timeEorzea;
	F.days  = F.B(F.day);
	F.months  = F.B(F.month);
	F.hours  = F.B(F.hour);
	F.mins  = F.B(F.min);
},
B:function (s){
	return s<10==1?0+''+s:s;
},
show:function (){
	var F =this;
	F.init();
	return F.months+'月'+F.days+'日'+F.hours+'时'+F.mins +'分&nbsp;'+F.etMonthName[F.month]+'&nbsp;'+F.etDayName[F.day]+'&nbsp;'+F.etHourName[F.hour];
},
setHTML:function (){
	var F=this;
	$('timeEorzea').innerHTML = F.show();
	$('timeEarth').innerHTML = TimeToDate(F.timeJST,true);
	setTimeout(function (){F.setHTML()},3000);
}
};
function TimeToMin(s){
//取得分钟
	s = parseInt(s);
	if(!s)return 0;
	var m = Math.floor(s/60);
	return m;
}
function GetTimeOffset(t){
	var str="";
	if(t>3600){
		var h = Math.floor(t/3600);
		str+=h+"时";
		t -=h*3600;
	}
	if(t>60){
		var m = Math.floor(t/60)
		str+=m+"分";
		t -=m*60;
	}
	if(t>0){
		str += t+'秒';
	}
	return str;
	
}
function ShowDateOn(s,t){
	if(_ShowStat==s){return ;}
	for(var i=0;i<serverdata.length;i+=1){if(s=='ALL'){
		$('list-data-id-'+serverdata[i]['id']).style.display='';
		}else if(serverdata[i]['type']==s){
			$('list-data-id-'+serverdata[i]['id']).style.display='';
			}else{
				$('list-data-id-'+serverdata[i]['id']).style.display='none';
				}
	}
	_ShowStat =s;
	if(!t){saveConfig();}
}
 var QuickSort = function(arr) {
//快速排序
    　　if (arr.length <= 1) { return arr; }

    　　var pivotIndex = Math.floor(arr.length / 2);

    　　var pivot = arr.splice(pivotIndex, 1)[0];

    　　var left = [];

    　　var right = [];

    　　for (var i = 0; i < arr.length; i++){
		if (arr[i]['speed'] == pivot['speed']) {
		if (arr[i]['pass'] < pivot['pass']) {

    　　　　　　left.push(arr[i]);

    　　　　} else {

    　　　　　　right.push(arr[i]);

    　　　　}

    　　　　}else if (arr[i]['speed'] < pivot['speed']) {

    　　　　　　left.push(arr[i]);

    　　　　} else {

    　　　　　　right.push(arr[i]);

    　　　　}

    　　}
    　　return QuickSort(left).concat([pivot], QuickSort(right));

    };
Date.prototype.patterns=function(fmt) {
//匹配日期
    var o = {         
    "M+" : this.getMonth()+1, //月份         
    "d+" : this.getDate(), //日         
    "h+" : this.getHours()%12 == 0 ? 12 : this.getHours()%12, //小时         
    "H+" : this.getHours(), //小时         
    "m+" : this.getMinutes(), //分         
    "s+" : this.getSeconds(), //秒         
    "q+" : Math.floor((this.getMonth()+3)/3),         
    "S" : this.getMilliseconds() //毫秒         
    };         
    var week = {         
    "0" : "\u65e5",         
    "1" : "\u4e00",         
    "2" : "\u4e8c",         
    "3" : "\u4e09",         
    "4" : "\u56db",         
    "5" : "\u4e94",         
    "6" : "\u516d"        
    };         
    if(/(y+)/.test(fmt)){         
        fmt=fmt.replace(RegExp.$1, (this.getFullYear()+"").substr(4 - RegExp.$1.length));         
    }         
    if(/(E+)/.test(fmt)){         
        fmt=fmt.replace(RegExp.$1, ((RegExp.$1.length>1) ? (RegExp.$1.length>2 ? "\u661f\u671f" : "\u5468") : "")+week[this.getDay()+""]);         
    }         
    for(var k in o){         
        if(new RegExp("("+ k +")").test(fmt)){         
            fmt = fmt.replace(RegExp.$1, (RegExp.$1.length==1) ? (o[k]) : (("00"+ o[k]).substr((""+ o[k]).length)));         
        }         
    }         
    return fmt;         
}
function TimeToDate(time,ms,str){
	var time=parseInt(time);
	if(isNaN(time)){return '时间数据不可用'};
	if(!ms){time = time*1000;}
	if(!str){str = 'yyyy/MM/dd HH:mm:ss EEE';}
	return (new Date(time)).patterns(str);
}
var hunt_name=[];
var _ShowTips = {
desktop_notify:true,
isForceDNCheck:false,
initNP:function() {
	if (this.isForceDNCheck) {
		return;
	}
	if (!$("alarm_desktop").checked) {
		return;
	}
	if (!("Notification" in window)) {
		showPrompt(null,null,"阁下浏览器不支持窗口提醒");
		this.isForceDNCheck = true;
		$("alarm_desktop").disabled=true;
		$("alarm_desktop").checked=false;
		this.isForceDNCheck = false;
		return;
	} else if (Notification.permission === "granted") {
		this.doDesktopNotify(null, null, "窗口提醒可用");

	} else if (Notification.permission !== 'denied') {
		Notification.requestPermission(function (permission) {
			if (!('permission' in Notification)) {
				Notification.permission = permission;
				if (permission === "granted") {
					this.doDesktopNotify(null, null, "窗口提醒可用");
				}
			}
 		});
	}

},
doDesktopNotify:function (icon, title, message,t) {
	if(!$("alarm_desktop").checked)return ;
	if(!window.Notification)return ;
	if (Notification.permission !== "granted") {
        return;
    }
	if (!icon) {
		icon ="/images/50.png";
	}
	if (!title) {
		title = "FF14狩猎提醒";
	}
	if (!t) {
		t = 5000;
	}
	this.PS();
	var notification = new Notification(title, {"icon": icon, "body": message});
	setTimeout(function(){
		notification.close();
	}, t);
},
TPS:function () {
	this.PS();

},
PS:function () {
	if (!window.HTMLAudioElement) {
		return;
	}
	var index = $("alarm_sound").selectedIndex;
	if(!$("alarm_sound").options[index].value){return ;} 
	var audio = new Audio();
	audio.src = '/images/sound/'+$("alarm_sound").options[index].value;
	audio.volume = Number($("alarm_volume").value)/100;
	audio.play();
}
}
if (!window.webkitNotifications) {
	_ShowTips.desktop_notify = false;
}
function AjaxChangeVisit(s){
	s!='1'?$('gvisit').value='启用计时器访问权':$('gvisit').value='关闭计时器访问权';
	
}
function AjaxToGetData(s){
//取得更新信息
	clearTimeout(_UpTimeId);
	clearTimeout(_UpDataTimeId);
	var data = ReJson(s);
	if(data){
	for(var i=0;i<serverdata.length;i++){
			var id = serverdata[i]['id'],ktime = parseInt(data[id]['ktime']);
			var ltime = parseInt(data[id]['ltime']);
			serverdata[i]['point'] = data[id]['point'];
			var point = data[id]['point'];
			$('list-data-id-'+id+'-point').value = point;
			$('list-data-id-'+id+'-msg').innerHTML = data[id]['msg']?data[id]['msg']:'';
			$('list-data-id-'+id+'-user').innerHTML = 'by <a href="home.php?mod=space&username='+encodeURI(data[id]['username'])+'" target="_blank">'+data[id]['username'];
			if(ltime!=serverdata[i]['ltime']){
				serverdata[i]['maxtips'] = false;
				serverdata[i]['ltime'] = ltime;
				serverdata[i]['rtime'] =  serverdata[i]['ltime'] >1 ? serverdata[i]['ltime']*60 :(serverdata[i]['type']=='A'? 3*60*60:36*60*60);
				$('list-data-id-'+id+'-needtime').innerHTML =  TimeToMin(serverdata[i]['rtime']);
			}
			if(ktime!=serverdata[i]['ktime']){
				serverdata[i]['tips'] = false;
				serverdata[i]['maxtips'] = false;
				serverdata[i]['ktime'] = ktime;
				$('list-data-id-'+id+'-killtime').innerHTML = TimeToDate(serverdata[i]['ktime']);
			}
		
	}
	//showDialog(msg, mode, t, func, cover, funccancel, leftmsg, confirmtxt, canceltxt, closetime, locationtime) {
	showDialog('所有数据已经跟服务器同步!再也不用担心被窗口提醒!','notice','提示',null,null,null,null,null,null,null,2);
	}
	_UpTimeId = setTimeout(function (){ajax_update.get('index.php?action=fresh&inajax=1',function(s,x){AjaxToGetData(s);})},1800000);
	UpDate();
}
function AjaxPostData(s){
//post更新数据
	clearTimeout(_UpDataTimeId);
	var data = ReJson(s);
	if(data){
		for(var i=0;i<serverdata.length;i++){
			if(serverdata[i]['id'] == parseInt(data['id'])){
				//同步时间
				var id = serverdata[i]['id'];
				serverdata[i]['ktime'] =  parseInt(data['ktime']);
				serverdata[i]['ltime'] =  parseInt(data['ltime']);
				serverdata[i]['point'] =  data['point'];
				var point = data['point'];
				$('list-data-id-'+id+'-point').value = point;
				$('list-data-id-'+id+'-speed').innerHTML = '数据更新成功';
				serverdata[i]['rtime'] =  serverdata[i]['ltime'] >1 ? serverdata[i]['ltime']*60 :(serverdata[i]['type']=='A'? 3*60*60:36*60*60);
				serverdata[i]['tips'] =  false;
				serverdata[i]['maxtips'] =  false;
				$('list-data-id-'+id+'-killtime').innerHTML = TimeToDate(serverdata[i]['ktime']);
				$('list-data-id-'+id+'-msg').innerHTML = data['msg'];
				$('list-data-id-'+id+'-user').innerHTML = 'by <a href="home.php?mod=space&username='+encodeURI(data['username'])+'" target="_blank">'+data['username'];
				showDialog(data['success'],'notice','提示',null,null,null,null,null,null,null,10);
			}
		}
	}
	_UpDataTimeId = setTimeout(function (){return UpDate();},10000);
}
function ReJson(s){
	if(!s||s.indexOf('{')!==0){
		clearTimeout(_UpDataTimeId);
		clearTimeout(_UpTimeId);
		showDialog("数据解释错误,请刷新浏览器.",'notice','提示',null,null,null,null,null,null,null,1000);
		return null;
	}
	var obj = (new Function('return '+s))();
	if(obj['erro']){
		showDialog(obj['erro'],'notice','提示');
		return null;
	}
	return obj;
}
function UpDate(){
	clearTimeout(_UpDataTimeId);
	var nowtime = Math.floor((new Date()).getTime()/1000),tips=false;
	for(var i=0;i<serverdata.length;i+=1){
		var data = serverdata[i],ltime = data['ktime']+data['rtime'] - nowtime,id='list-data-id-'+data['id'];
		if(!data['ktime'])return ;
		if(ltime<=0){
			$(id+'-in').className = 'list-div-in2';
			serverdata[i]['speed'] = 100;
			$(id+'-speed').innerHTML = Math.floor((1-ltime/data['rtime'])*100)+'%';
			$(id+'-nowtime').innerHTML = data['maxtime']-data['rtime']+ltime >0 ? (data['type']=='A'?'5小时':'72小时')+'倒计:'+GetTimeOffset(data['maxtime']-data['rtime']+ltime) :'<span style="color:red;">'+(data['type']=='A'?'无人更新':'S未触发或者无人更新')+'</span>';
		}else{
			$(id+'-in').className = 'list-div-in';
			serverdata[i]['speed'] = Math.floor((1-ltime/data['rtime'])*100);
			$(id+'-speed').innerHTML = serverdata[i]['speed']+'%';
			$(id+'-nowtime').innerHTML = '冷却倒计:'+GetTimeOffset(ltime);
		}
		if(ltime<80&&!serverdata[i]['tips']&&!tips){
			serverdata[i]['tips'] = true;
			tips =true;
			_ShowTips.doDesktopNotify('/images/'+data['id']+'.jpg',serverdata[i]['name']+' - Rank'+serverdata[i]['type'],(ltime>0?TimeToMin(ltime)+'分钟后进入循环':'已经进入循环过去了'+TimeToMin(-ltime)+'分钟')+',请注意蹲点!!\n已经距离上次击杀时间'+TimeToMin(nowtime-data['ktime'])+'分钟',5000);
		}else if((nowtime - data['ktime']>data['maxtime'])&&!serverdata[i]['maxtips']&&!tips){
			serverdata[i]['maxtips'] = true;
			tips =true;
			_ShowTips.doDesktopNotify('/images/'+data['id']+'.jpg',serverdata[i]['name']+' - Rank'+serverdata[i]['type'],'进入强制刷新时间',5000);
			
		}
		serverdata[i]['pass'] = data['rtime']-ltime;
		$(id+'-passtime').innerHTML = TimeToMin(serverdata[i]['pass']);
		
		
	}
//	serverdata = QuickSort(serverdata);
	for(var i=serverdata.length-1;i>-1;i-=1){
		$('new-list-data').appendChild($('list-data-id-'+serverdata[i]['id']));
	}
	_UpDataTimeId = setTimeout(function (){return UpDate();},10000);
}

function saveConfig() {
	if (!window.localStorage) {
		return;
	}
	var data = {};
	data["notify"] = $("alarm_desktop").checked;
	data["sound"] = $("alarm_sound").selectedIndex;
	data["volume"] = $('alarm_volume').value;
	data["show"] = _ShowStat;
	window.localStorage.setItem("htConfig", JSON.stringify(data));
}
function loadConfig() {
	if (!window.localStorage) {
		return;
	}
	var htConfig = window.localStorage.getItem("htConfig"),data = htConfig ? ReJson(htConfig):'';;
	if (!data){ 
		data = {};
	}
	if (!data["notify"]) {
		data["notify"] = false;
	}
	if (!data["sound"]) {
		data["sound"] = 0;
	}
	if (!data["volume"]) {
		data["volume"] = 30;
	}
	if (!data["show"]) {
		data["show"] = 'A';
		
	}
	if (data["sound"]&&$("alarm_sound")) {
		$("alarm_sound").selectedIndex = data["sound"];
		$("alarm_sound").options[data["sound"]].checked = true;
	$("alarm_volume").value = Number(data["volume"]);
	}
	if(data["notify"]&&$("alarm_desktop")){
		$("alarm_desktop").checked = true;
	}else if($("alarm_desktop")){
		$("alarm_desktop").checked = false;
	}
	ShowDateOn(data["show"],1);
	
}
function ShowPoitSet(id,oid){
	if($('uppoint_menu').style.display!='none'){hideMenu('uppoint_menu');}
	$('data_point').value = '';
	_PostID = null;
	$('data_change').checked = false;
	for(var i=0;i<serverdata.length;i++){
		if(serverdata[i]['id']==id){
			_PostID = id;
			$('uppoint_menu-title').innerHTML = '<span class="y">'+serverdata[i]['pos']+'</span>'+serverdata[i]['name'] + ' Rank ' +serverdata[i]['type'];
				showMenu({'ctrlid':oid,'evt':'click','menuid':'uppoint_menu','pos':'10','duration':3});
		}
	}
	
}
function check_point(s){
	var str = s.value,m=str.match(/\d{1,2}[,\.，。]\d{1,2}/);
	if(m){
		s.value=m;
		s.value = (s.value).replace(/[,\.，。]/ig,',');
		
	}else{
	 	s.value ='';	
	}	
}
function updata_point(){
	check_point($('data_point'));
	if(_PostID&&$('data_point').value){
		var point= ($('data_point').value).split(','),x=point[0],y=point[1],data = {"id":_PostID,"x":x,"y":y,'time':$('data_time').value,"change":$('data_change').checked?1:0};
		$('data_change').checked = false;
		ajax_update.post("index.php?action=save&inajax=1",objtoPost(data),function (s){AjaxPostData(s)});
		hideMenu('uppoint_menu');
		
	}else{
		showPrompt(null,null,'提交信息有误',1000);
	}
	
}
function updata_kill(){
	if(_PostID){
		var data = {"id":_PostID,'time':$('data_time').value,"change":$('data_change').checked?1:0};
		$('data_change').checked = false;
		ajax_update.post("index.php?action=savekill&inajax=1",objtoPost(data),function (s){AjaxPostData(s)});
		hideMenu('uppoint_menu');
		
	}else{
		showPrompt(null,null,'提交信息有误',1000);
	}
	
}

function objtoPost(s){
	var str = "";
	for(var i in s){
		str += '&post'+i+'='+encodeURI(s[i]);
	}
	return str;
}
function GetDateStr(s){
	if(!s.value){
		var t = new Date();
		s.value = t.patterns('yyyy/MM/dd HH:mm:ss');
	}else{
		var m = s.value.match(/\d{4}\/\d{2}\/\d{2}\s\d{2}:\d{2}:\d{2}/);
		if(!m){
			showDialog("时间格式错误!重新初始化.",'notice','提示',null,null,null,null,null,null,null,2);
			$('data_change').checked = false;
			var t = new Date();
			s.value = t.patterns('yyyy/MM/dd HH:mm:ss');
		}
	}
}
function DoWrite(){
//输出页面数据
for(var i=0;i<serverdata.length;i+=1){
	serverdata[i]['ktime'] = parseInt(serverdata[i]['ktime']);
	var data = serverdata[i];
	serverdata[i]['maxtime'] = serverdata[i]['type']=='A'? 5*60*60:72*60*60;
	serverdata[i]['rtime'] = parseInt(data['ltime'])>1 ? parseInt(data['ltime'])*60 :(data['type']=='A'? 3*60*60:36*60*60);
	serverdata[i]['tips'] = false;
	serverdata[i]['maxtips'] = false;
	var point = serverdata[i]['point'];
	var HTML = '<li id="list-data-id-'+data['id']+'"><div class="list-div-out"><div class="list-div-in" id="list-data-id-'+data['id']+'-in">';
	HTML += '<table width="465" border="0" cellspacing="0" cellpadding="0" class="data-table">';
	HTML += '<tr><td rowspan="5" style=width:100px;height:100px;"">';
	HTML += '<img src="/images/'+data['id']+'.jpg" width="100" height="100" border="0">';
	HTML += '</td><td><p class="h-name">';
	HTML += '<span class="z">&nbsp;<span id="list-data-id-'+data['id']+'-speed">0%</span> '+data['name']+' '+data['type']+'</span>';
	HTML += '<span class="y" style="font-size:12px; font-weight:normal;">'+data['pos'];
	HTML += '<input value="更新" onclick="ShowPoitSet('+data['id']+',this.id);return false;" id="list-data-id-'+data['id']+'-button" type="button">';
	HTML += '<input value="历史" onclick="window.open(\'index.php?action=info&amp;xid='+data['id']+'\');return false;" id="list-data-id-'+data['id']+'-button-2" type="button">';
	HTML += '</span></p></td></tr><tr><td>';
	HTML += '<p class="data-time"><span class="z">'
	HTML += '历时:<span id="list-data-id-'+data['id']+'-passtime">0</span>分钟';
	HTML += '&nbsp;最低循环:<span id="list-data-id-'+data['id']+'-needtime">'+TimeToMin(data['rtime'])+'</span>分钟</span>';
	HTML += '<span id="list-data-id-'+data['id']+'-nowtime" class="y">0秒</span></p>';
	HTML += '</td></tr><tr><td><p class="data-p">';
	HTML += '<span class="z"上次击杀记录:<span id="list-data-id-'+data['id']+'-killtime">'+TimeToDate(data['ktime'],false,'')+'</span></span>';
	HTML += '<span class="y" id="list-data-id-'+data['id']+'-user">by '+data['username']+'</span>';
	HTML += '</p><tr><td><p class="data-p">';
	HTML += '以往坐标:<span><input id="list-data-id-'+data['id']+'-point" value="'+point+'" style="width:280px;background:none;height:18px;border:none;padding:0px 2px;"/></span>';
	HTML += '</p></td></tr><tr><td><p class="data-p">';
	HTML += '<span id="list-data-id-'+data['id']+'-msg" style="font-size:12px;">'+(data['msg']?data['msg']:'')+'</span>';
	HTML += '</p></td></tr></td></tr></table></div></div></li>';
	document.write(HTML);
}

	loadConfig();
	UpDate();
	_UpTimeId = setTimeout(function (){ajax_update.get('index.php?action=fresh&inajax=1',function(s,x){AjaxToGetData(s);})},1800000);
}
