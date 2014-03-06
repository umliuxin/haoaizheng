<?php 
	/*
		Database function package
	
	*/
//echo "ABC";
/*$db = mysql_connect('localhost:8889','root','root');
if (!$db) { 
    die('TESTTESTTESTCould not connect: ' . mysql_error()); 
} 
mysql_select_db("MHelper");*/

header("Content-Type: text/html;charset=gbk");
$link = mysql_connect('liuxincom.ipagemysql.com', 'liuxin1009', 'liuxin1009'); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
} 
echo 'Connected successfully'; 
mysql_query("SET NAMES 'gbk'");
mysql_select_db(haoaizheng); 


function addUser($username){
	$userlist=mysql_query("SELECT wx_id FROM User");
	$flag=0;
	while($row=mysql_fetch_row($userlist)){
		if($username==$row[0])$flag=1;
	}
	if ($flag==0){
		$sql="INSERT INTO User (wx_id) 
			VALUES('".$username."')";
		mysql_query($sql);
	}
}

function response_text_generate($text,$userid){
	//Question Set
	$spyset=array(
				array('王菲','那英'),
array('元芳','展昭'),
array('麻雀','乌鸦'),
array('胖子','肥肉'),
array('眉毛','胡须'),
array('何炅','维嘉'),
array('状元','冠军'),
array('饺子','包子'),
array('端午节','中秋节'),
array('摩托车','电动车'),
array('高跟鞋','增高鞋'),
array('汉堡包','肉夹馍'),
array('小矮人','葫芦娃'),
array('蜘蛛侠','蜘蛛精'),
array('节节高升','票房大卖'),
array('反弹琵琶','乱弹棉花'),
array('玫瑰','月季'),
array('董永','许仙'),
array('若曦','晴川'),
array('谢娜','李湘 '),
array('孟非','乐嘉 '),
array('牛奶','豆浆'),
array('保安','保镖'),
array('白菜','生菜 '),
array('辣椒','芥末 '),
array('金庸','古龙'),
array('赵敏','黄蓉 '),
array('海豚','海狮'),
array('水盆','水桶'),
array('唇膏','口红 '),
array('森马','以纯'),
array('烤肉','涮肉 '),
array('气泡','水泡 '),
array('纸巾','手帕 '),
array('杭州','苏州 '),
array('香港','台湾 '),
array('首尔','东京 '),
array('橙子','橘子 '),
array('葡萄','提子 '),
array('太监','人妖 '),
array('蝴蝶','蜜蜂'),
array('小品','话剧'),
array('裸婚','闪婚'),
array('新年','跨年'),
array('吉他','琵琶'),
array('公交','地铁'),
array('剩女','御姐'),
array('童话','神话'),
array('作家','编剧'),
array('警察','捕快'),
array('结婚','订婚'),
array('奖牌','金牌'),
array('孟飞','乐嘉'),
array('那英','韩红'),
array('面包','蛋糕'),
array('作文','论文'),
array('油条','麻花'),
array('壁纸','贴画'),
array('枕头','抱枕'),
array('手机','座机'),
array('同学','同桌'),
array('婚纱','喜服'),
array('老佛爷','老天爷'),
array('魔术师','魔法师'),
array('鸭舌帽','遮阳帽'),
array('双胞胎','龙凤胎'),
array('情人节','光棍节'),
array('丑小鸭','灰姑娘'),
array('富二代','高富帅'),
array('生活费','零花钱'),
array('麦克风','扩音器'),
array('郭德纲','周立波'),
array('图书馆','图书店'),
array('男朋友','前男友'),
array('洗衣粉','皂角粉'),
array('牛肉干','猪肉脯 '),
array('泡泡糖','棒棒糖 '),
array('小沈阳','宋小宝 '),
array('土豆粉','酸辣粉 '),
array('蜘蛛侠','蝙蝠侠 '),
array('口香糖','木糖醇  '),
array('酸菜鱼','水煮鱼 '),
array('小笼包','灌汤包 '),
array('薰衣草','满天星 '),
array('张韶涵','王心凌 '),
array('刘诗诗','刘亦菲 '),
array('甄嬛传','红楼梦 '),
array('甄子丹','李连杰 '),
array('包青天','狄仁杰 '),
array('大白兔','金丝猴 '),
array('果粒橙','鲜橙多 '),
array('沐浴露','沐浴盐 '),
array('洗发露','护发素 '),
array('自行车','电动车 '),
array('班主任','辅导员 '),
array('过山车','碰碰车 '),
array('铁观音','碧螺春'),
array('十面埋伏','四面楚歌'),
array('成吉思汗','努尔哈赤'),
array('谢娜张杰','邓超孙俪'),
array('福尔摩斯','工藤新一'),
array('贵妃醉酒','黛玉葬花 '),
array('流星花园','花样男子  '),
array('神雕侠侣','天龙八部 '),
array('天天向上','非诚勿扰 '),
array('勇往直前','全力以赴 '),
array('鱼香肉丝','四喜丸子'),
array('麻婆豆腐','皮蛋豆腐 '),
array('语无伦次','词不达意 '),
array('鼠目寸光','井底之蛙  '),
array('近视眼镜','隐形眼镜  '),
array('美人心计','倾世皇妃 '),
array('夏家三千金','爱情睡醒了 '),
array('降龙十八掌','九阴白骨爪 '),
array('红烧牛肉面','香辣牛肉面 '),
array('江南style','最炫民族风 '),
array('梁山伯与祝英台','罗密欧与朱丽叶'),
array('chrome','firefox'),
array('excel','powerpoint'),
array('facebook','人人网'),
array('SHE','飞轮海'),
array('奥利奥','白加黑'),
array('巴士','公交'),
array('白菜','生菜'),
array('班主任','辅导员'),
array('棒球帽','鸭舌帽'),
array('包青天','狄仁杰'),
array('煲仔饭','砂锅饭'),
array('保安','保镖'),
array('比喻','拟人'),
array('冰红茶','乌龙茶 '),
array('菠萝蜜','榴莲'),
array('操场','跑道'),
array('朝鲜','古巴'),
array('成吉思汗','努尔哈赤'),
array('橙子','橘子'),
array('唇膏','口红'),
array('大白兔','金丝猴'),
array('袋鼠','考拉'),
array('董永','许仙'),
array('豆瓣','虾米'),
array('端午节','中秋节'),
array('断背 ','百合 '),
array('反弹琵琶','乱弹棉花'),
array('反射','折射'),
array('风衣','雨衣 '),
array('冯小刚','张艺谋'),
array('福尔摩斯','工藤新一'),
array('富士山','太平山'),
array('干脆面','泡泡糖'),
array('高跟鞋','增高鞋'),
array('公交','地铁'),
array('公式','定理'),
array('瓜子','花生'),
array('关羽','张飞'),
array('贵妃醉酒','黛玉葬花'),
array('郭德纲','周立波'),
array('果粒橙','鲜橙多'),
array('过山车','碰碰车'),
array('过山车','摩天轮 '),
array('海豚','海狮'),
array('汉堡包','肉夹馍'),
array('汉奸','特务 '),
array('杭州','苏州'),
array('呵呵','哈哈'),
array('何炅','维嘉'),
array('红领巾','小黄帽'),
array('红烧牛肉面','香辣牛肉面'),
array('蝴蝶','蜜蜂'),
array('护手霜','身体乳'),
array('荒原','沙漠'),
array('皇后','太后'),
array('黄继光','董存瑞'),
array('灰太狼','红太狼'),
array('火车','地铁 '),
array('吉他','琵琶'),
array('加菲猫 ','黑猫警长 '),
array('江南style','最炫民族风'),
array('奖牌','金牌'),
array('降龙十八掌','九阴白骨爪'),
array('饺子','包子'),
array('节节高升','票房大卖'),
array('结婚','订婚'),
array('金庸','古龙'),
array('近视眼镜','隐形眼镜'),
array('京东','凡客'),
array('警察','捕快'),
array('酒店','宾馆'),
array('咖啡馆','自习室'),
array('咖啡机','豆浆机'),
array('烤肉','涮肉'),
array('烤鱼','烤肉'),
array('空气','氧气'),
array('口香糖','木糖醇'),
array('辣椒','芥末'),
array('老子','孔子 '),
array('凉皮','凉面'),
array('梁山伯与祝英台','罗密欧与朱丽叶'),
array('刘诗诗','刘亦菲'),
array('芦荟 ','仙人掌'),
array('裸婚','闪婚'),
array('麻辣烫','火锅'),
array('麻雀','乌鸦'),
array('马克斯','恩格斯'),
array('麦克风','扩音器'),
array('玫瑰','月季'),
array('眉毛','胡须'),
array('美年达','芬达'),
array('门卡','钥匙'),
array('孟非','乐嘉'),
array('面包','蛋糕'),
array('摩托车','电动车'),
array('沐浴露','沐浴盐'),
array('拿铁','摩卡'),
array('年夜饭','谢师宴'),
array('牛奶','豆浆'),
array('牛肉干','猪肉脯'),
array('胖子','肥肉'),
array('泡泡糖','棒棒糖'),
array('泡泡糖','口香糖 '),
array('皮蛋','卤蛋'),
array('品客','可比克'),
array('葡萄','提子'),
array('普吉岛','塞班岛'),
array('骑士','武士'),
array('气泡','水泡'),
array('恰恰瓜子','真心瓜子'),
array('巧克力','朱古力'),
array('情人节','光棍节'),
array('雀巢','伊利'),
array('日光灯','白炽灯'),
array('日月星辰','风雨雷电'),
array('森马','以纯'),
array('生活费','零花钱'),
array('剩女','御姐'),
array('十面埋伏','四面楚歌'),
array('石油','煤矿'),
array('石油','汽油'),
array('手机','座机'),
array('首尔','东京'),
array('水饺','锅贴'),
array('水盆','水桶'),
array('吮指原味鸡','黄金脆皮鸡'),
array('宋祖英','彭丽媛'),
array('酸菜','苦瓜'),
array('酸菜鱼','水煮鱼'),
array('酸奶','乳酪'),
array('塔利班','本拉登 '),
array('太监','人妖'),
array('天天向上','非诚勿扰'),
array('铁观音','碧螺春'),
array('通缉令','投名状'),
array('同学','同桌'),
array('童话','神话'),
array('头盔','盔甲'),
array('拖把','扫把'),
array('王菲','那英'),
array('微信','微博'),
array('维多利亚','伊丽莎白'),
array('乌克兰','匈牙利'),
array('午餐肉','火腿'),
array('吸血鬼','僵尸'),
array('习近平','李克强'),
array('洗发水','护发素'),
array('香港','台湾'),
array('小矮人','葫芦娃'),
array('小笼包','灌汤包'),
array('小品','话剧'),
array('校徽','队徽'),
array('谢娜张杰','邓超孙俪'),
array('新年','春节'),
array('星座 ','生肖 '),
array('雪茄','香烟'),
array('薰衣草','满天星'),
array('薰衣草','玫瑰花'),
array('迅雷','电驴'),
array('牙刷','牙膏 '),
array('姚明','林书豪'),
array('一国两制','对外开放'),
array('油条','麻花'),
array('余额宝','支付宝'),
array('元芳','展昭'),
array('元素','原子'),
array('张君雅','小浣熊'),
array('张韶涵','王心凌'),
array('赵敏','黄蓉'),
array('甄嬛传','红楼梦'),
array('甄子丹','李连杰'),
array('蜘蛛侠','蜘蛛精'),
array('蜘蛛侠','蝙蝠侠'),
array('纸巾','手帕'),
array('中石油','中海油'),
array('状元','冠军'),
array('自行车','电动车'),
array('作家','编剧'),
array('作文','论文')
					);

	//End Question Set

	$returnStr="for Testing";
	if($text=='0'){
		$returnStr=
'欢迎来到好爱争
1.谁是卧底
2.捉鬼
3.双杀
0.回到首页
发送 help 查看帮助';
		$sql="UPDATE User SET talk=1 WHERE wx_id='".$userid."'";
		mysql_query($sql);
	}
	else if($text=='help'){
		$talk=get_talk($userid);
		$returnStr='帮助文档：
好爱争助手暂时只提供了谁是卧底游戏功能
助手现在只能分配角色，判定游戏结束，所以游戏需要额外的讨论组进行讨论，投票。每轮由房主输入被杀小伙伴的号码即可。（聊天，投票，描述功能的整合敬请期待）
在任意界面输入 0， 可回到主页
在任意界面输入help ， 可查看帮助文档
输入正确的数字选择菜单中的选项或人数';
	}
	else{
		$talk=get_talk($userid);
		if($talk==1){
			switch ($text) {
				//$text value table in documentation
				case 1:
					# code...
					$returnStr="谁是卧底？
1.创建游戏
2.加入游戏
3.查看统计";
					set_talk($userid,2);
					break;
				case 2:
					$returnStr="GO TO 捉鬼，却暂时没有这个功能，敬请期待
1.谁是卧底
2.捉鬼
3.双杀
0.回到首页
发送 help 查看帮助";
					//set_talk($userid,3);
					break;
				case 3:
					$returnStr="GO TO 双杀，却暂时没有这个功能，敬请期待
1.谁是卧底
2.捉鬼
3.双杀
0.回到首页
发送 help 查看帮助";
					//set_talk($userid,4);
					break;
				default:
					# code...
					$returnStr="invalid Response
1.谁是卧底
2.捉鬼
3.双杀
0.回到首页
发送 help 查看帮助";
					break;
			}
		}
		else if($talk==2){
			switch ($text) {
				case 1:
					# code...
					$returnStr="请输入参与游戏的人数（3－15人）";
					set_talk($userid,21);
					break;
				case 2:
					# code...
					$returnStr="请输入游戏房间编号:";
					set_talk($userid,22);
					break;
				case 3:
					# code...
					$returnStr=seestat($userid);
					break;
				
				default:
					# code...
					$returnStr="iNvalid Response
1.创建游戏
2.加入游戏
3.查看统计
0.回到首页
发送 help 查看帮助";	
					break;
			}

		}
		else if($talk==3){

		}
		else if($talk==21){
			if($text>2&&$text<7){
				
				$returnStr=create_spy_game($text,1,$userid,$spyset);
				
			}
			else if($text>6&&$text<11){
				$returnStr=create_spy_game($text,2,$userid,$spyset);
			}
			else if($text>10&&$text<16){
				$returnStr=create_spy_game($text,3,$userid,$spyset);
			}
			else{
				$returnStr="invaliD Response,请输入参与游戏的人数（3-15人）";
			}
		}
		else if($talk==22){
			$returnStr=join_spy_game($text,$userid,$spyset);
		}
		else if($talk>99&&$talk<200){
			//In game,first version only includes identify dead people
			$room_id=$talk-100;
			$returnStr=owner_in_game($text,$userid,$room_id,$spyset);
		}	
		else{
			$returnStr="你肯定打错了什么，所以你重新打吧";
		}

	}
	//Begin coding for showing game result
	$sql="SELECT messageflag,message FROM User WHERE wx_id='".$userid."'";
	echo $sql."<br>";
	$sqlquery=mysql_fetch_row(mysql_query($sql));
	if($sqlquery[0]==1){
		$returnStr=$sqlquery[1].
"
1.创建游戏
2.加入游戏
3.查看统计
0.回到首页
发送 help 查看帮助";	

		$sql="UPDATE User SET messageflag=0,talk=2 WHERE wx_id='".$userid."'";
		mysql_query($sql);		
}
	return $returnStr;
}

function owner_in_game($text,$userid,$room_id,$spyset){
	//$text is the index of death
	if(is_numeric($text)){
		$sql="SELECT * FROM Spygame WHERE num_id=".$room_id." AND isEnd=0 or isENd=2 ORDER BY id DESC LIMIT 1";
		$result=mysql_fetch_row(mysql_query($sql));
		if($result[8]==0){
			$num=$result[1]-$result[4];
			$returnStr="游戏尚未开始，还需".$num."人";
		}
		else{

		if($result[10]==$userid){
			if(empty($result)){
				$returnStr="UNKNOWN GAME ERROR.请报告给作者，请输入0重新进入游戏";
			}
			else{
				if($text>$result[1]){
					$num=$result[1];
					$returnStr="作为房主，你应该负起责任
你应该输入一个存在的玩家(1-".$num.")
而不是".$text."
请重新输入";
				}
				else{

				
				$spy_index=$result[6];
				$dead_index=$result[7].$text."#$#";
				$num_player=$result[1];
				$flag=is_end($dead_index,$spy_index,$num_player);
				if($flag==2){
					//Game End
					$returnStr="游戏结束,卧底获胜
1.创建游戏
2.加入游戏
3.查看统计
0.回到首页
发送 help 查看帮助";
					$sql="UPDATE Spygame SET isEnd=1,isSpyWin=1 WHERE id='".$result[0]."'";
					mysql_query($sql);
					$playerarray=explode("#$#", $result[3]);
					for ($i=1; $i <sizeof($playerarray)-1; $i++) { 
						# code...
						//set_talk($playerarray[$i],2);
						$isspy=0;
						$spyarray=explode("#$#", $result[5]);
						for ($j=1; $j <sizeof($spyarray)-1 ; $j++) { 
							# code...
							if($spyarray[$j]==$playerarray[$i])$isspy=1;
						}
						if($isspy==1){
							$sqlstr="你又获胜了!你是卧底,卧底获胜!";
						$sql="UPDATE User SET talk=2,messageflag=1,message='".$sqlstr."',game1_t=game1_t+1,game1_w=game1_w+1 WHERE wx_id='".$playerarray[$i]."'";

						}
						else{
							$sqlstr="你又输了!你是正常人,卧底获胜!";
						$sql="UPDATE User SET talk=2,messageflag=1,message='".$sqlstr."',game1_t=game1_t+1 WHERE wx_id='".$playerarray[$i]."'";

						}
						mysql_query($sql);
						
					}
				}
				else if($flag==1){
					$returnStr="游戏结束，正常人获胜
1.创建游戏
2.加入游戏
3.查看统计
0.回到首页
发送 help 查看帮助";
					$sql="UPDATE Spygame SET isEnd=1,isSpyWin=0 WHERE id='".$result[0]."'";
					mysql_query($sql);
					$playerarray=explode("#$#", $result[3]);
					for ($i=1; $i <sizeof($playerarray)-1; $i++) { 
						# code...
						//set_talk($playerarray[$i],2);
						$isspy=0;
						$spyarray=explode("#$#", $result[5]);
						for ($j=1; $j <sizeof($spyarray)-1 ; $j++) { 
							# code...
							if($spyarray[$j]==$playerarray[$i])$isspy=1;
						}
						if($isspy==1){
							$sqlstr="你又输了!你是卧底,正常人获胜!";
							$sql="UPDATE User SET talk=2,messageflag=1,message='".$sqlstr."',game1_t=game1_t+1 WHERE wx_id='".$playerarray[$i]."'";
						}
						else{
							$sqlstr="你又获胜了!你是正常人,正常人获胜!";
							$sql="UPDATE User SET talk=2,messageflag=1,message='".$sqlstr."',game1_t=game1_t+1,game1_w=game1_w+1 WHERE wx_id='".$playerarray[$i]."'";
						}
						
						mysql_query($sql);

					}

				}
				else{
					//Game not end, continue
					$sql="UPDATE Spygame SET dead_index='".$dead_index."' WHERE id='".$result[0]."'";
					mysql_query($sql);
					$returnStr=$text."号死亡，游戏继续，请输入下一轮投票结果";
				}
			}
			}
		}
		else{
			$dead=explode("#$#", $result[7]);

			if(sizeof($dead)==2){$deadstr="还没人死";
			$returnStr="你不是房主，所以没用，但我能告诉你进程
本次游戏共".$result[1]."人
".sizeof(explode("#$#", $result[6]))."个卧底
小伙伴".$deadstr."
赶紧去找卧底吧
";
		}
			elseif(sizeof($dead)>2){
				$deadstr="按顺序";
				for ($i=1; $i < sizeof($dead)-1; $i++) { 
					# code...
					$deadstr=$deadstr.$dead[$i]."号";
				}
				$deadstr=$deadstr."死去";
				$returnStr="你不是房主，所以没用，但我能告诉你进程
本次游戏共".$result[1]."人
".sizeof(explode("#$#", $result[6]))."个卧底
小伙伴".$deadstr."
赶紧去找卧底吧
";
			}
			else{
				$returnStr="游戏已经结束";
			}
			

			
		}
	}
	}
	else{
		$returnStr="Invilad Response.请输入正确的数字";
	}


	return $returnStr;
}

function is_end($dead,$spy,$num_player){
	$deadarray=explode("#$#", $dead);
	$spyarray=explode("#$#", $spy);
	$num_spy=sizeof($spyarray);
	$dead_spy=0;
	for ($i=0; $i < $num_spy ; $i++) { 
		# code...
		for ($j=1; $j<sizeof($deadarray)-1 ; $j++) { 
			# code...
			if($spyarray[$i]==$deadarray[$j]){
				$dead_spy++;
			}
		}
	}
	if ($dead_spy==$num_spy){
		return 1;
	}
	else{
		$num_dead=sizeof($deadarray)-2;
		$num_live=$num_player-$num_dead;
		$flag=0;
		if($num_player>2&&$num_player<7){
			if($num_live<3)$flag=2;
			}
		else if($num_player>6&&$num_player<11){
			if($num_live<4)$flag=2;
			}
		else if($num_player>10&&$num_player<16){
			if($num_live<5)$flag=2;
			}
		return $flag;
	}
}


function get_talk($userid){
	$sql="SELECT talk FROM User WHERE wx_id='".$userid."'";
		$result=mysql_query($sql);
		while($row=mysql_fetch_row($result)){
			//echo $row[0];
			return $row[0];
		}
}
function set_talk($userid,$talk){
	$sql="UPDATE User SET talk=".$talk." WHERE wx_id='".$userid."'";
	mysql_query($sql);
}

function create_spy_game($num,$spy_num,$owner,$spyset){
	//$num is num_player
	

	//Get id to calc room id
	$sql="SELECT id FROM Spygame ORDER BY id DESC LIMIT 1";
	$row=mysql_fetch_row(mysql_query($sql));
	if(!empty($row)){
		$room_id=($row[0]+1)%100;
	}
	else{
		$room_id=1;
	}
	
	$player_id='#$#';
	$spy_id='#$#';
	$spy_index=random_index($spy_num,$num);
	$dead_index='#$#';
	$isend=0;
	$isspywin=-1;
	$ran=rand(0,sizeof($spyset)-1);
	$insert="INSERT INTO Spygame (num_player,num_id,player_id,spy_id,spy_index,dead_index,isEnd,isSpyWin,owner_id,question_id) 
			VALUES(".$num.",".$room_id.",'".$player_id."','".$spy_id."','".$spy_index."','".$dead_index."',".$isend.",".$isspywin.",'".$owner."',".$ran.")";
	mysql_query($insert);
	$returnStr="房间创建成功！你成为房主！
".join_spy_game($room_id,$owner,$spyset);
	return $returnStr;
}

function join_spy_game($text,$userid,$spyset){
	if(is_numeric($text)){
			$sql="SELECT * FROM Spygame WHERE isEnd=0 and num_id=".$text." ORDER BY id DESC LIMIT 1";
			$result=mysql_fetch_row(mysql_query($sql));
			if(!empty($result)){
				$players=explode("#$#", $result[3]);
				$flag=0;//Not in game
				for ($i=1; $i <sizeof($players)-1 ; $i++) { 
					# code...
					if($players[$i]==$userid)$flag=$i;
				}

				if($flag){
					$spys=explode("#$#", $result[3]);
					$sflag=0;//Not in game
					for ($i=0; $i <sizeof($spys) ; $i++) { 
					# code...
						if($players[$i]==$userid)$sflag=1;
					}

					if($sflag){
						$word=$spyset[$result[11]][1];//是卧底
					}
					else{
						$word=$spyset[$result[11]][0];
					}
					$num_spy=explode("#$#", $result[5]);
					$returnStr="你已经在房间：".$text."号"
."
你是：".$flag."号"
."
配置：".$num_spy."个卧底,".$result[1]-$num_spy."个平民"
."
你的词： ".$word
;					
					set_talk($userid,100+$result[2]);
				}
				else{
				if($result[1]==$result[4]){
					$returnStr="该房间人数已满,请输入其他房间号";
				}
				else{
					$spy_index=explode("#$#", $result[6]);
					$isspyflag=0;
					$normal=$result[1]-sizeof($spy_index);
					for ($i=0; $i <sizeof($spy_index) ; $i++) { 
						if($spy_index[$i]==$result[4]+1)$isspyflag=1;
					}
					if($isspyflag){
						$player_id=$result[3].$userid."#$#";
						$spy_id=$result[5].$userid."#$#";
						$num_part=$result[4]+1;
						$word=$spyset[$result[11]][1];
						if($num_part==$result[1]){
							$sql="UPDATE Spygame SET player_id='".$player_id."', num_part=".$num_part.",isEnd=2,spy_id='".$spy_id."' WHERE isEnd=0 and num_id=".$text;

						}
						else{
							$sql="UPDATE Spygame SET player_id='".$player_id."', num_part=".$num_part.",spy_id='".$spy_id."' WHERE isEnd=0 and num_id=".$text;
						}
					}
					else{
						$player_id=$result[3].$userid."#$#";
						$num_part=$result[4]+1;
						$word=$spyset[$result[11]][0];
						if($num_part==$result[1]){
							$sql="UPDATE Spygame SET player_id='".$player_id."', num_part=".$num_part.",isEnd=2 WHERE isEnd=0 and num_id=".$text;

						}
						else{
							$sql="UPDATE Spygame SET player_id='".$player_id."', num_part=".$num_part." WHERE isEnd=0 and num_id=".$text;
						}
					}
					mysql_query($sql);
					$returnStr="欢迎进入房间：".$text."号"
."
你是：".$num_part."号"
."
配置：".sizeof($spy_index)."个卧底,".$normal."个平民"
."
你的词： ".$word
."
游戏开始";
					set_talk($userid,100+$text);
				}
				}
			}
			else{
				$returnStr="Invilad Response,请输入正确的房间号";
			}
		}		
	else{
			$returnStr="Invilad Response,请输入正确的数字";
		}
	return $returnStr;
}

function random_index($num,$total){
	if($num==1){
		return rand(1,$total);
	}
	else if($num==2){
		$opt1=rand(1,$total);
		do {
			# code...
			$opt2=rand(1,$total);
		} while ($opt1==$opt2);
		return $opt1."#$#".$opt2;
	}
	else if($num==3){
		$opt1=rand(1,$total);
		do {
			# code...
			$opt2=rand(1,$total);
		} while ($opt1==$opt2);
		do {
			# code...
			$opt3=rand(1,$total);
		} while ($opt1==$opt3||$opt2==$opt3);
		return $opt1."#$#".$opt2."#$#".$opt3;
	}
}
function seestat($userid){
	$sql="SELECT game1_t,game1_w FROM User WHERE wx_id='".$userid."'";
	$result=mysql_fetch_row(mysql_query($sql));
	$lose=$result[0]-$result[1];
	$cpl=round( $result[1]/$result[0] * 100 , 2) . "％";
	if($result[0]==0){
		$returnStr="谁是卧底游戏统计
你还没有进行游戏!
1.创建游戏
2.加入游戏
3.查看统计
0.回到首页
发送 help 查看帮助";
	}
	else{
		$returnStr="谁是卧底游戏统计
游戏数:".$result[0]."
获胜:".$result[1]."
失败:".$lose."
胜率:".$cpl." 
1.创建游戏
2.加入游戏
3.查看统计
0.回到首页
发送 help 查看帮助";
	}
	return $returnStr;
	
}

 ?>
