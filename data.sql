CREATE TABLE IF NOT EXISTS `pre_plugin_nenge_hunting` (
  `name` varchar(15) NOT NULL,
  `pos` varchar(15) NOT NULL,
  `point` mediumtext NOT NULL,
  `msg` text NOT NULL,
  `username` varchar(18) NOT NULL,
  `map` varchar(20) DEFAULT NULL,
  `ktime` int(10) DEFAULT NULL,
  `ltime` int(3) DEFAULT NULL,
  `ntime` int(3) NOT NULL,
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `type` char(1) NOT NULL,
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

CREATE TABLE IF NOT EXISTS `pre_plugin_nenge_huntonkill` (
  `kid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `id` mediumint(8) NOT NULL,
  `username` char(18) NOT NULL,
  `prevtime` int(10) DEFAULT NULL,
  `time` int(10) DEFAULT NULL,
  `uptime` int(10) NOT NULL,
  `x` int(2) NOT NULL,
  `y` int(2) NOT NULL,
  `auto` tinyint(1) NOT NULL DEFAULT '0',
  UNIQUE KEY `kid` (`kid`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('阿格里帕', '摩杜纳', '1,1|16,11|16,10|12,13|10,14|13,10|14,10|11,11|14,13|13,11|12,16', '扑朔迷离!如果有知道真正触发姿势告诉我1', '61.242.34.219', '', 1431000000, 4087, 0, 1, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('萨法特', '库尔札斯中央高地', '1,1|14,19|26,14|16,18|19,29|23,27|21,28|18,18|7,28|26,20|20,29|8,12|28,7|11,29', '据说要有龙骑参与跳崖(待验证)', '61.242.34.219', '', 1431000000, 3500, 0, 2, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('蚓螈巨虫', '北萨纳兰', '18,18|16,15|21,26|21,28|23,22|15,18|23,25|23,26', '<span style="font-size:10px;">参与FATE:核心危机,一部分打一部分溜达(所有队友必须在同一地图)</span>', '61.242.34.219', '', 1431000000, 3333, 0, 3, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('努纽努维', '南萨纳兰', '1,1|23,33|17,19|27,34|35,20', '短时间内完成16个FATE战斗(待验证)', '61.242.34.219', '', 1431000000, 3700, 0, 4, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('巴拉乌尔', '东萨纳兰', '12,15|15,26|17,24|23,27|14,16|25,18|26,17|19,24|24,19|28,25|24,23|14,19', '完成理符概率触发(未验证需要完成多少个)', 'Charon', '', 1431000000, 3374, 0, 5, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('布隆特斯', '中萨纳兰', '21,15|21,14|18,17|16,12|17,19|21,16|16,19|23,34|29,20|19,21|28,21|[19,21]', '推荐吃<span style="color:red;font-size:10px;">绿树蟾蜍腿</span>200+边跑边吃即可触发(精准无比)', 'Charon', '', 1431000000, 4177, 0, 6, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('虚无探索者', '西萨纳兰', '27,17|25,18|21,23|22,20|18,15|16,15|20,29|26,17|18,16|22,23|25,26|26,18|14,6', '最佳:艾欧泽亚时间0-12点碧空天气钓出铜镜(精准无比)', 'Charon', '', 1431000000, 3500, 0, 7, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('千竿口花希达', '黑衣森林北部林区', '28,21|24,25|24,26|18,26|19,28|27,26|16,25|15,27|25,22|25,28|18,28', '北森17:00-21:00 钓出审判摇(精准)', 'Charon', '', 1431000000, 3848, 0, 8, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('夺心魔', '黑衣森林南部林区', '20,27|18,21|16,23|19,27|22,22|18,22|16,32|22,19|17,23|21,19|25,18|24,18|28,14', '单人(全队)1号凌晨在森林里溜达.符合条件凌晨1点准时刷脸(精准)', 'why', '', 1431000000, 4460, 0, 9, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('乌尔伽鲁', '黑衣森林东部林区', '28,20|23,21|14,25|26,13|28,21|25,25|26,15|26,11|17,22|25,13|25,9|25,23', '雨中完成某些FATE概率触发(未验证)', '61.242.34.219', '', 1431000000, 3640, 0, 10, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('雷德罗巨蛇', '黑衣森林中央林区', '22,23|28,14|26,20|13,20|22,16|9,18|10,16|16,21|11,22|16,23|23,27|15,23|16,18', '下雨期间打FATE均可能触发,建议真空就去打(未验证)', 'why', '', 1431000000, 2820, 0, 11, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('牛头黑神', '拉诺西亚外地', '21,9|15,17|22,15|22,8|15,12|19,15|22,7|23,9|15,14|24,7|21,14|22,10', '阴云在FATE里面死亡后(推荐128),1小时地球时间内刷新', 'Charon', '', 1431000000, 3958, 0, 12, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('南迪', '拉诺西亚高地', '11,23|33,24|12,21|30,24|27,20|29,24|28,22|30,25|12,24|13,23|13,25|12,23|12,25|14,14', '最佳时间当日0-5点(雷雨天气之前)单人溜宠物100%触发也!(精准)', 'Charon', '', 1431000000, 2780, 0, 13, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('火愤牛', '西拉诺西亚', '32,20|30,26|14,35|14,24|31,28|23,24|15,35|24,22|14,34|31,29|24,23|16,35', '天气无关.即将进入循环时,挖菜99%触发(精准)', '61.242.34.219', '', 1431000000, 4260, 0, 14, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('伽洛克', '东拉诺西亚', '28,28|31,27|21,24|19,31|14,30|30,19|21,29|26,32|21,25|21,27|31,26|17,29|14,28|26,33', '推荐:在洞口处放暗影核爆,', 'xb5125', '', 1431000000, 2582, 0, 15, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('咕尔呱洛斯', '拉诺西亚低地', '22,35|28,20|25,24|17,35|24,22|32,17|30,14|31,14|33,16|[22,35]', '冷却后,15-32号18:00-21:00低地溜达均可触发(溜达不是蹲点)', '61.242.34.219', '', 1431000000, 4320, 0, 16, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('护土精灵', '中拉诺西亚', '15,15|21,16|19,16|17,13|14,13|18,9|15,11|23,19|23,23|14,14|14,11', '建议4200分钟5人以上挖3级西拉诺西亚', '61.242.34.219', '', 1431000000, 3986, 0, 17, 'S');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('库雷亚', '摩杜纳', '1,1|29,14|27,8|32,6|33,11|27,7|24,10|32,10|16,15|17,17|13,11|26,8|23,11|23,10|13,13|19,8|27,9|31,11|17,12|12,11', '常见245分钟', '61.242.34.219', '', 1431000000, 215, 0, 18, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('马拉克', '库尔札斯中央高地', '1,1|27,21|21,28|25,13|24,21|26,22|10,27|15,18|15,19|8,20|13,28|16,19|15,27|11,27|29,29|20,29|21,18|29,13|23,8|32,24', '一般不会超过240分钟,常见210分钟左右,太久就特别留意一些死角位置', '61.242.34.219', '', 1431000000, 190, 0, 19, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('菲兰德的遗火', '北萨纳兰', '1,1|17,16|21,25|15,18|23,26|23,22|22,26|18,18|22,24|20,28|24,22|18,17|16,15|23,25|15,15|21,24|16,16|24,23|16,19|20,27', '如果275分钟仍未见影,建议疯狂杀B怪', '61.242.34.219', '', 1431000000, 250, 0, 20, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('札尼戈', '南萨纳兰', '1,1|32,19|16,24|24,25|16,33|18,20|23,29|19,19|15,38|16,26|21,21|16,32|18,10|18,11|24,10|19,24|20,32|24,11|31,19|17,11', '多图循环时常见240分钟', '61.242.34.219', '', 1431000000, 223, 0, 21, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('玛赫斯', '东萨纳兰', '25,23|19,24|18,28|14,26|29,26|25,26|23,22|19,28|18,22|14,16|23,20|10,18|16,28|28,16|15,20|27,21|25,25|28,26|23,26|17,27', '如果超过240分钟,可以找找修炼所和火墙', 'ximigou115', '', 1431000000, 190, 0, 22, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('花舞仙人刺', '中萨纳兰', '1,1|21,14|19,25|18,19|23,32|27,20|25,29|17,23|28,20|23,34|29,20|27,21|21,20|17,19|22,31|19,23|25,18|20,16|24,18|25,30', '多图循环时可能会延迟到270分钟,常见240分钟', '61.242.34.219', '', 1431000000, 230, 0, 23, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('阿列刻特利昂', '西萨纳兰', '19,29|20,28|8,5|11,5|22,22|22,24|9,4|14,8|9,5|14,7|21,23|12,6|23,19|18,28|12,7|23,25|20,29|11,9|20,25|10,5', '常见220-240分钟', 'ximigou115', '', 1431000000, 210, 0, 24, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('尾宿蛛蝎', '黑衣森林北部林区', '25,27|24,25|24,28|26,26|16,27|22,20|22,24|19,28|17,26|22,19|22,27|27,26|25,26|18,26|23,19|25,22|27,22|16,25|18,27|17,25', '这个进入循环,打FATE 杀B怪均有可能加快刷新', '105184124', '', 1431000000, 235, 280, 25, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('盖得', '黑衣森林南部林区', '16,31|22,21|22,26|26,22|18,21|18,29|32,23|23,24|24,18|18,27|23,18|29,24|26,20|16,27|18,28|26,21|16,32|16,28|28,24|16,34', '这货晴天刷新很快,常见220~240分钟', 'ximigou115', '', 1431000000, 210, 0, 26, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('千眼凝胶', '黑衣森林东部林区', '16,23|23,30|30,13|21,28|19,28|29,13|28,21|25,25|27,22|17,22|22,21|25,23|13,23|26,24|25,10|21,29|14,25|17,21|24,17|18,25', '一般200分钟或者到240分钟,这个怪容易影响其他A正常刷新', 'ximigou115', '', 1431000000, 200, 0, 27, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('弗内乌斯', '黑衣森林中央林区', '19,18|9,16|15,20|29,23|15,23|26,20|29,19|23,26|10,22|28,21|13,20|31,19|9,18|13,17|21,16|31,18|22,24|21,29|26,22|9,17', '常见240分钟,地图比较大而且黑糊糊,所以自定义优先级', 'ximigou115', '', 1431000000, 220, 0, 28, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('角祖', '拉诺西亚外地', '14,12|21,15|22,15|16,17|16,15|24,16|14,14|14,8|22,7|22,14|21,6|19,15|15,10|19,38|22,6|24,7|14,17|15,15|21,9|26,7', '常见240分钟,如果看见有人传送走了很可能即刷', 'ximigou115', '', 1431000000, 210, 240, 29, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('玛贝利', '拉诺西亚高地', '32,25|33,24|28,20|28,24|11,21|30,24|27,23|12,22|12,23|28,21|28,23|29,23|13,23|29,24|27,25|13,25|30,25|34,24|28,22|33,25', '多图循环时常见刷新时间270分钟', 'ximigou115', '', 1431000000, 238, 0, 30, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('纳恩', '西拉诺西亚', '25,24|20,19|17,19|12,14|33,30|16,35|15,14|23,21|30,27|34,28|19,22|27,24|13,14|13,34|23,24|16,34|15,34|14,34|12,15|28,25', '击杀水晶点附近的B怪有助于刷新,六角长老也有概率.常见240分钟.', 'ximigou115', '', 1431000000, 210, 0, 31, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('魔导地狱爪', '东拉诺西亚', '21,28|21,24|20,32|29,20|30,20|15,30|30,19|22,24|25,21|15,28|19,31|21,27|17,29|20,25|28,19|20,31|17,33|24,21|27,7|25,20', '这个算稳定,常见220-240分钟', 'xb5125', '', 1431000000, 210, 0, 32, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('乌克提希', '拉诺西亚低地', '29,18|24,22|30,14|20,36|22,36|23,37|30,17|28,20|17,35|29,30|21,35|25,24|20,32|20,37|29,17|22,28|19,35|24,26|20,34|26,25', '常见220分钟左右.如果超过260分钟,请殴打B怪', '貓貓猪', '', 1431000000, 215, 0, 33, 'A');
INSERT INTO `pre_plugin_nenge_hunting` (`name`, `pos`, `point`, `msg`, `username`, `map`, `ktime`, `ltime`, `ntime`, `id`, `type`) VALUES('丑男子 沃迦加', '中拉诺西亚', '20,14|20,16|18,9|23,21|20,15|19,21|15,14|23,19|22,22|24,22|18,13|23,20|24,23|16,11|20,20|23,17|21,18|14,11|23,24|21,15', '常见刷新时间240分钟左右', '61.242.34.219', '', 1431000000, 220, 0, 34, 'A');
