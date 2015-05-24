<?php if(!defined('IN_N')) exit('Access Denied');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>怪物狩猎</title>
<script type="text/javascript" src="c.js"></script>
<script type="text/javascript">var STYLEID = '6', STATICURL = 'static/', IMGDIR = 'static/image/common', VERHASH = 'dR4', charset = 'utf-8', discuz_uid = '1', cookiepre = 'kWRi_2132_', cookiedomain = '', cookiepath = '/', showusercard = '1', attackevasive = '0', disallowfloat = 'newthread', creditnotice = '1|威望|,2|金钱|,3|贡献|', defaultstyle = '', REPORTURL = 'aHR0cDovLzE4Mi4yNTQuMjI3LjExMC91cGxvYWQvcGx1Z2luLnBocD9pZD1uZW5nZV9xOmh1bnRpbmcmYWN0aW9uPWluZm8meGlkPTEz', SITEURL = '', JSPATH = 'data/cache/', CSSPATH = 'data/cache/style_', DYNAMICURL = '';</script>
<link href="c.css"  rel="stylesheet" type="text/css" />
<style type="text/css">
object{visibility:hidden;}
#list-table td{height:30px; text-align:center; font-size:14px; border-bottom:#000 1px solid; text-align:center; vertical-align:middle;}
#list-table .list_load{background:#000;color:#FFF; border:1px solid #FFF;}
.list_S td{ background:#FFC}
.list_A{}
.list_small{font-size:12px}
.list-data{
clear: both;
float: none;
}
.list-data ul,.list-data li{margin:0px; padding:0px; display:block;}
.list-data li{
width: 50%;
float: left;
position: relative;
height: 104px;
overflow: hidden;
margin-bottom: 5px;
background-color: #FFF;
}
.list-div-out {
clear: both;
height: 102px;
border: 1px solid #333;
overflow: hidden;
margin-right: 5px;
margin-left: 5px;
}
.list-div-in,.list-div-in2 {
clear: both;
height: 100px;
border: 1px solid #000;
overflow: hidden;
background-color: #CCC;
}
.list-div-in2{
border: 1px solid #039;
background-color: #FC6;
color: #333;
}
.data-table {
height: 100px;
width: 100%;
overflow: hidden;
table-layout:fixed; 
}
.data-table td {
overflow: hidden;
text-overflow:clip;
}
.h-name {
overflow: hidden;
height: 26px;
width: 100%;
display: block;
font: bold 14px/26px "Lucida Console", Monaco, monospace;
}
.data-time {
overflow: hidden;
height: 20px;
width: 100%;
line-height: 20px;
font-size: 12px;
text-indent: 5px;
}
.data-time .pic {
vertical-align: middle;
}
.data-p {
overflow: hidden;
width: 100%;
height: 18px;
white-space: nowrap;
line-height: 18px;
text-indent: 5px;
}
</style>
</head>

<body>
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<script src="main.js" type="text/javascript"></script>
<script type="text/javascript">
<?php 
echo $serverdatajsdata;
?>
</script>

<div class="wp" style="width:980px;">
<div id="uppoint_menu" class="bm" style="display:none; position:absolute; z-index:999999;">
<h3 class="bm_h" id="uppoint_menu-title"></h3>
<div class="bm_c">输入坐标(X,Y)<input name="" id="data_point" type="text" onblur="check_point(this)" onkeypress="var e = getEvent();if(e.keyCode == 13){check_point(this);updata_point();}" onkeydown="var e = getEvent();if(e.keyCode == 13){updata_point();}"/><input value="更新" id="uppoint_menu_button" onclick="updata_point();" type="button" /><input value="取消" id="uppoint_menu_button" onclick="hideMenu('uppoint_menu');return false;" type="button" /><br />
<label>我确认要修改坐标<input id="data_change" type="checkbox" onclick="if(this.checked){alert('本功能主要是修正错误记录使用!\n一般亲手杀死A提交坐标更新即可.如果仅仅更新刚击杀的怪物最别勾选!否则会造成重复记录!')}"/></label>
</div></div>
<!--页头文字-->
<div style="color: #FC6; padding:5px; border:#000 1px solid; background:#FCE4BE; color:#000; font-size:16px;">
地球时间:<span id="timeEarth"></span> &nbsp;&nbsp;<a target="_blank" href="forum.php?mod=redirect&amp;tid=18&amp;goto=lastpost#lastpost" style="color:#000" target="_blank">S怪触发条件.</a> | <a href="forum.php?mod=viewthread&amp;tid=23&amp;page=1&amp;extra=#pid50" target="_blank" style="color:red;">第六感神器.(你懂的)</a> | <a href="http://www.firefox.com.cn/download/" target="_blank" style="font-size:14px">下载火狐浏览器(推荐)</a>
<br />艾欧泽亚时间:<span id="timeEorzea"></span><hr style="margin-bottom:5px;" />
1.这是一个公共数据平台.更新错误可以根据历史记录自行修正,无需要自责.懒汉自行找狩猎贝,当然自己动手丰衣足食亦可也!<br />
2.如果有任何疑问<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=40e1b72a3132f97ad9918f523ef568591946ded3481d6379c98823ea4f5e3ab7"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="黑色城堡" title="黑色城堡"></a>24099771 如果你被禁言,通常是多次提交虚假坐标等原因!<br /></div>

<!--页头文字-->
  <div class="bm">
<h3 class="bm_h"><input value="只显示A" onclick="ShowDateOn('A')" type="button" /><input value="只显示S" onclick="ShowDateOn('S')" type="button" /><input value="显示全部" onclick="ShowDateOn('ALL')" type="button" /><input type="button" onclick="ajax_update.get('index.php?action=fresh&inajax=1',function(s,x){AjaxToGetData(s);});return false;" value="同步数据" title="每隔1小时自动刷新" /> <input  type="button" value="最近记录" onclick="window.open('index.php?action=showall','_check')" /><input name="开启提醒器" type="checkbox" id="alarm_desktop" onclick="_ShowTips.initNP();saveConfig()" />窗口提醒,<select id="alarm_sound" onchange="saveConfig();">
  <option value="" selected="selected">无</option>
  <option value="1.wav">铃声1</option>
  <option value="flash.wav">思密达</option>
  <option value="jingle03.wav">嗯嗯嗯</option>
        </select><input type="range" id="alarm_volume" class="control_general" value="30" max="100" style="width:40px;" min="0" step="1" onchange="saveConfig()"><input  type="button" value="试听" onclick="_ShowTips.TPS()"/>推荐使用火狐 谷歌 其他双核浏览器(极速模式)</h3>
<div class="bm_c cl">
    <div class="list-data">
    <ul id="new-list-data">
<script type="text/javascript">
DoWrite();
dtEorzea.setHTML();
</script>
    </ul>
    </div>
</div>
</div>
</body>
</html>
