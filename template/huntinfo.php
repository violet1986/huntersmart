<?php if(!defined('IN_N')) exit('Access Denied');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $query['name'];?> 怪物狩猎</title>
<script type="text/javascript" src="c.js"></script>
<script src="main.js" type="text/javascript"></script>
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
.listn,.listnx{height:20px;display:inline-block;overflow:hidden;text-align:center}
.listn{width:100px;}
.listnx{width:20px;}
</style>
</head>

<body>
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div class="wp" style="width:980px;">
    <form action="index.php?action=info&amp;xid=<?php echo $query['id'];?>&amp;do=uprtime" method="post">
<div class="bm">
    	<h3 class="bm_h">修改时间间隔</h3>
        <div class="bm_c"><input name="min" type="text" value="<?php echo $query['ltime'];?>" size="3" />分钟<input name="" type="submit" /></div>
    </div>
    
    </form>
<div class="bm">
    	<h3 class="bm_h">击杀记录,<?php if($query['ltime']) { ?>目前刷新间隔<?php echo $query['ltime'];?>分钟<?php } else { ?>未校正刷新时间<?php } ?>,A为3-5小时,S:36-72小时 </h3><div class="bm_c">
        <div class="module cl xl xl1">
        	<ul>
            <li style="background:#000; color:#FFF">
            <div class="l">
            <span class="listn" style="width:60px;'">过去</span>
            <span class="listnx">-</span>
            <span class="listn" style="width:50px; text-align:left">坐标</span>
            <span class="listnx">-</span>
            <span class="listn" style="width:180px;">击杀时间</span>
            <span class="listnx">-</span>
            <span class="listn" style="width:250px;">艾欧泽亚时间</span>
            <span class="listnx">-</span> 
            <span class="listn">间隔</span>
            <span class="listnx">-</span> 
            <span class="listn" style="width:90px;">数据贡献者</span>
            </div>
            </li>
            <?php if(is_array($infodata)) foreach($infodata as $k => $v) { ?>            <li  title="贡献人于服务器时间 <?php echo $v['update'];?> 提交了数据">
            <div class="l">
            <span class="listn" style="width:60px;'"><?php echo $v['pass'];?>分钟前</span>
            <span class="listnx">-</span>
            <span class="listn" style="width:50px; text-align:left"><?php echo $v['x'];?>,<?php echo $v['y'];?></span>
            <span class="listnx">-</span>
            <span class="listn" style="width:180px;"><?php echo $v['date'];?></span>
            <span class="listnx">-</span>
            <span class="listn" style="width:250px;"><script type="text/javascript">document.write(dtEorzea.tostr(<?php echo $v['time'];?>));</script></span>
            <span class="listnx">-</span> 
            <span class="listn"><?php if($v['auto']) { ?>指定时间<?php } else { ?><?php echo $v['minutes'];?>分<?php } ?></span>
            <span class="listnx">-</span> 
            <span class="listn" style="text-align:right;width:90px;"><a href="home.php?mod=space&amp;username=<?php echo $v['username'];?>" target="_blank"><?php echo $v['username'];?></a></span>
            </div>
            </li>
            <?php } ?>
            </ul>
        </div></div>
    </div>
</div></body>
</html>
