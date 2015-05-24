<?php
//remove this when submit
include_once("saemysql.php");
define("IN_N",true);
$_G['root'] = dirname(__FILE__);
//定义绝对路径
$_G['mysql'] = new SaeMysql();
//新浪数据库查询接口
$page = max(1, $_GET['page']);
//页码
$listnum = 50;
//记录查询条数
function showmessage($s){
		echo $s.'<a href="'.$_SERVER["HTTP_REFERER"].'">返回</a>';

}

function multi(){

}
function template($s){
		global $_G;
		return $_G['root'].'/template/'.$s.'.php';
}
//加载核心函数
//$data = $_G['mysql']->getData('SELECT * FROM `pre_plugin_nenge_hunting` ORDER BY id ASC');
//print_r($data);
//exit;
if($_GET['action']=='info'){
		//查询数据历史记录
		$xid = intval($_GET['xid']);
		if($xid>0){
				//"SELECT * FROM %t where id = %d ORDER BY TYPE ASC"
				$query = $_G['mysql']->getLine('SELECT * FROM `pre_plugin_nenge_hunting` where id = '.$xid.' ORDER BY TYPE ASC');
				if($query['id']){
						if($_GET['do']=='uprtime'){
								//更新时间间隔
								$min = intval($_POST['min']);
								if($query['type']=='A'){
										$min = $min<180?0:($min>300?300:$min);
								}
								if($query['type']=='S'){
										$min = $min<2160?0:($min>4320?4320:$min);
								}
								$_G['mysql']->runSql('UPDATE `pre_plugin_nenge_hunting` SET `ltime` = \''.$min.'\' WHERE `id` ='.$xid.';');
								header('location:'.$_SERVER["HTTP_REFERER"]);
								exit();
						}
						$order = (($page-1)*50).',50';
						$nowtime = time();
						$infodata = $_G['mysql']->getData('SELECT * FROM `pre_plugin_nenge_huntonkill` where id='.$query['id'].' ORDER BY kid DESC limit '.$order);
						if($infodata){
								foreach($infodata as $k=>$v){
										$infodata[$k]['date'] = date('Y/m/d H:i:s',$v['time']);
										$infodata[$k]['pass'] = floor(($nowtime - $v['time'])/60);
										$infodata[$k]['minutes'] = floor(($v['time'] - $v['prevtime'])/60);
										$infodata[$k]['update'] = date('Y/m/d H:i:s',$v['uptime']);
								}
						}
				}else{
						showmessage('数据不存在');
				}
				include template('huntinfo');
				exit();
		}
}elseif($_GET['action']=='savekill'){
		//刷新记录	
		$data = '{"erro":"提交数据错误或者提交失败!"}';
		//定义错误返回值
		$id = intval($_POST['postid']);
		if($id){
				$query = $_G['mysql']->getLine('SELECT * FROM `pre_plugin_nenge_hunting` where id = '.$id.' ORDER BY TYPE ASC');
		}
		if($query['id']){
				$nowtime = time();
				if($_POST['posttime']&&$_POST['postchange']){
						//指定时间
						$time = strtotime($_POST['posttime']);
						if($time&&$time<=$nowtime){
								//时间有效且不能大于当前时间
								if(abs($time-$query['ktime'])<100){
										//指定时间不能与记录时间S少于100秒
										$query['success'] = '<span style="color:red;">你提交的时间'.$_POST['posttime'].'</span><br />与当前的时间'.date('Y/m/d H:i:s',$query['ktime']).'<br />有区别吗!<br />';
										$erro =1;
								}else{
										$mtimes = $query['type'] == 'S'? 259200:18000;
										if($nowtime - $time <$mtimes){
												//提交的时间不能小于怪物强刷时间
												$uptime = $time;
												$query['success'] = '1.指定时间有效.坐标信息强制为0,0<br />';
												$x = 0;
												$y = 0;
												$auto = 1;
										}else{
												//提交的时间过于原始!
												$query['success'] = '你提交的时间有这么前吗??';
												$erro =1;
										}
								}
						}else{
								$query['success'] = '<span style="color:red;">你指定的时间'.$_POST['posttime'].'</span><br />与服务器时间'.date('Y/m/d H:i:s',$nowtime).'<br />超前了或者无效!请不要恶意提交@!<br />';
								$erro = 1;
						}
				}else{
						//坐标模式更新
						$ltimes = $query['type'] == 'S'? 129600:10800;
						$x = intval($_POST['postx']);
						$y = intval($_POST['posty']);
						$auto = 0;
						if($nowtime-$query['ktime']>=$ltimes){
								//更新时间不能低于最低循环
								$uptime = $nowtime;
								$query['success'] = '恭喜你!提交的击杀数据已经记录.<br />';

						}else{
								$query['success'] = '<span style="color:red;font-size:16px;">提醒!</span><br />'.$query['username'].' 已经更新此数据!!<br />更新时间:'.date('Y/m/d H:i:s',$query['ktime']).'<br /><span style="color:red;">你的时间:'.date('Y/m/d H:i:s',$nowtime).'</span><br />如果认为击杀时间误差太大<br />请使用指定时间微调(A超过3分钟,S超过30分钟)';
						}
				}
				if($uptime){
						if($x>0&&$y>0){
								$point_array = explode('|',$query['point']);
								array_unshift($point_array,$x.','.$y);
								$point_array = array_unique($point_array);
								$point_array = array_slice($point_array,0,20);
								$point = implode('|',$point_array);
								$query['point'] = $point;
						}else{
								$point = $query['point'];
						}

						$_G['mysql']->runSql('UPDATE `pre_plugin_nenge_hunting` set `ktime`=\''.$uptime.'\' ,`username`=\''.$_SERVER['REMOTE_ADDR'].'\',`point`=\''.$point.'\' where `id`=\''.$query['id'].'\'');
						$_G['mysql']->runSql('INSERT INTO `pre_plugin_nenge_huntonkill` (`id`, `username`, `prevtime`, `time`, `uptime`, `x`, `y`, `auto`) VALUES (\''.$query['id'].'\', \''.$_SERVER['REMOTE_ADDR'].'\', \''.$query['ktime'].'\', \''.$uptime.'\',\''.time().'\',\''.$x.'\',\''.$y.'\', \''.$auto.'\');');
						$query['ktime'] = $uptime;
						$query['success'] .= '<span style="color:red;">数据已更新成功!</span>';
						$query['username'] = $_SERVER['REMOTE_ADDR'];
				}else{
						$query['success'] .= '<br /><span style="color:red;">&gt;&gt;&gt;数据同步成功,页面稍后会进行排序.</span>';				
				}
				$data = json_encode($query);
		}
		if($_GET['inajax']){
				include template('ajax');
				exit();
		}
		header('location:'.$_SERVER["HTTP_REFERER"]);
		exit();
}
$huntingdata = $_G['mysql']->getData('SELECT * FROM `pre_plugin_nenge_hunting` ORDER BY id ASC');
//查询列表
if($_GET['action']=='showall'){
		$nowtime = time();
		foreach($huntingdata as $k=>$v){
				$name_data[$v['id']] = $v['name'];
				$pos_data[$v['id']] = $v['pos'];
		}
		if($_GET['type']=='A'||$_GET['type']=='S'){
				$c = $_GET['type']=='A'?'where id>17':'where id<=17';$type=$_GET['type'];
		}
		$num = $_G['mysql']->get_var('SELECT count(*) FROM `pre_plugin_nenge_huntonkill`  '.$c);
		$maxpage = ceil($num/50);
		$page = max(1, $_G['page']);
		if($page>$maxpage){
				$page = $maxpage;
		}
		$order = (($page-1)*50).',50';
		$multipage = multi($num +1,50,$page,'index.php?action=showall'.($type?'&type='.$type:''));
		$infodata = $_G['mysql']->getData('SELECT * FROM `pre_plugin_nenge_huntonkill`  '.$c.' ORDER BY  kid DESC limit '.$order);
		if($infodata){
				foreach($infodata as $k=>$v){
						$infodata[$k]['name'] = $name_data[$v['id']];
						$infodata[$k]['map'] = $pos_data[$v['id']];
						$infodata[$k]['date'] = date('Y/m/d H:i:s',$v['time']);
						$infodata[$k]['kdate'] = date('Y/m/d H:i:s',$v['prevtime']);
						$infodata[$k]['update'] = date('Y/m/d H:i:s',$v['uptime']);
						$infodata[$k]['pass'] = floor(($nowtime - $v['time'])/60);
						$infodata[$k]['minutes'] = floor(($v['time'] - $v['prevtime'])/60);
				}}
		include template('hunt_list');
		exit();

}elseif($_GET['action']=='fresh'&&$_GET['inajax']){
		//同步更新记录
		foreach($huntingdata as $k=>$v){
				$datas[] ='"'.$v['id'].'":'.json_encode($v); 
		}
		$data = '{'.implode(',',$datas).'}';
		include template('ajax');
		exit();

}
foreach($huntingdata as $k=>$v){
		$datas[] = json_encode($v);
}
$serverdatajsdata = 'var serverdata = ['.implode(',',$datas).'];';
include template('hunting');

?>
