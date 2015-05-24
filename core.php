<?php
function showmessage($s){
	echo $s.'<a href="'.$_SERVER["HTTP_REFERER"].'">返回</a>';
	
}
function updataSql($n,$arr,$w){
	global $_G;
	if($arr){
		foreach($arr as $k=>$v){
			$s[] = ' `'.$k.'` = '.$v;
		}
		$set = '  set  '.implode(' , ',$s);
	}
	if($w){
		if(is_array($w)){
			foreach($arr as $a=>$b){
				$c[] = '`'.$a.'` = '.$b;
			}
			$m = implode(' and ',$c);
		}
		$where = ' where '.$m;
	}
	$_G['mysql']->runSql('UPDATE `'.$n.'` '.$set.$where.';');
}
function insertSql($n,$arr){
	global $_G;
	if($arr){
		foreach($arr as $k=>$v){
			$x[]=$k;
			$y[]=$v;
		}
		$id = ' (`'.implode('`,` ',$x).'`) ';
		$v = ' VALUES (\''.implode('\',\'',$y).'\') ';
		
	}
	$_G['mysql']->runSql('INSERT INTO `'.$n.'` '.$id.$v);
}
function multi(){
	
}
function template($s){
	global $_G;
	return $_G['root'].'/template/'.$s.'.php';
}
?>