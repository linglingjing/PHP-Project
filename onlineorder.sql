-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-06-05 11:56:12
-- 服务器版本： 5.7.10-log
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineorder`
--

-- --------------------------------------------------------

--
-- 表的结构 `onlineorder_admin`
--

CREATE TABLE `onlineorder_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `super` tinyint(1) NOT NULL,
  `regtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `onlineorder_admin`
--

INSERT INTO `onlineorder_admin` (`id`, `name`, `pwd`, `super`, `regtime`) VALUES
(1, 'admin', 'admin', 1, '2017-05-15 04:16:04'),
(3, 'ad2', 'ad2', 0, '2017-05-07 13:59:59'),
(4, 'liangjing', '1111111111', 1, '2017-05-08 04:27:32'),
(6, '李艳', '123', 1, '2017-05-08 14:08:03');

-- --------------------------------------------------------

--
-- 表的结构 `onlineorder_cart`
--

CREATE TABLE `onlineorder_cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) UNSIGNED NOT NULL,
  `dishid` int(11) NOT NULL,
  `dishcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `onlineorder_cart`
--

INSERT INTO `onlineorder_cart` (`id`, `userid`, `dishid`, `dishcount`) VALUES
(1, 1, 60, 3),
(2, 1, 61, 1),
(4, 37, 60, 2),
(5, 37, 61, 1);

-- --------------------------------------------------------

--
-- 表的结构 `onlineorder_comment`
--

CREATE TABLE `onlineorder_comment` (
  `id` int(11) UNSIGNED NOT NULL,
  `userid` int(11) UNSIGNED NOT NULL,
  `content` varchar(1000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `scorc` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `onlineorder_comment`
--

INSERT INTO `onlineorder_comment` (`id`, `userid`, `content`, `time`, `scorc`) VALUES
(2, 1, 'dgdfgzd', '2017-06-03 08:39:19', 3),
(3, 1, 'gyfxmxxnn', '2017-06-03 08:40:50', 3),
(4, 1, 'jingtina', '2017-06-04 10:39:11', 0),
(5, 36, '餐厅环境很好，服务员很好，菜也很好，价格公正，两个老板娘都很漂亮。', '2017-06-04 15:15:59', 1),
(6, 1, '54541230312', '2017-06-05 03:55:51', 0),
(7, 1, 'sfghfmbv bv nn', '2017-06-05 03:56:22', 4);

-- --------------------------------------------------------

--
-- 表的结构 `onlineorder_dish`
--

CREATE TABLE `onlineorder_dish` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `subdishtypeid` int(11) NOT NULL,
  `price` float NOT NULL,
  `info` varchar(1000) NOT NULL,
  `sellcount` int(11) DEFAULT '0',
  `small_pic` varchar(255) DEFAULT NULL,
  `middle_pic` varchar(255) DEFAULT NULL,
  `big_pic1` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `onlineorder_dish`
--

INSERT INTO `onlineorder_dish` (`id`, `name`, `subdishtypeid`, `price`, `info`, `sellcount`, `small_pic`, `middle_pic`, `big_pic1`) VALUES
(55, '葱香掉渣饼', 6, 12, '猪肉500克、洋葱半个、姜1小块、葱1小段、熟鸡蛋2个。\r\n这道饭菜肉香浓郁、甜咸适口、肥而不腻、卤汁香醇。将卤肉浇在米饭上，让每一粒米都吸满了肉汁，吃起来非常解馋过瘾。\r\n', 2, '/onlineorder/Public/Upload/Dish/2017-06-03/240x240_5932cd6e01e1e.jpg', '/onlineorder/Public/Upload/Dish/2017-06-03/350x350_5932cd6e01e1e.jpg', '/onlineorder/Public/Upload/Dish/2017-06-03/600x600_5932cd6e01e1e.jpg'),
(56, '红枣小麦米糊', 5, 23, '麦仁，红枣，糯米，白糖。小麦仁具有宁心安神的功效；糯米和红枣可起到益气补血的作用，三者打磨成米糊食用可缓解女性月经期容易发生的心神不宁。', 2, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_59339666de0fb.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_59339666de0fb.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_59339666de0fb.jpg'),
(60, '玫瑰山药泥', 6, 34, '山药，食用玫瑰花瓣，芝士片，白砂糖,	山药健脾，玫瑰柔肝醒胃，美容养颜，若再配上芝士奶香提升口感，岂不妙哉。', 4, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_593399774cfbc.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_593399774cfbc.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_593399774cfbc.jpg'),
(61, '牛奶南瓜羹', 5, 32, '南瓜，牛奶，炼乳，枸杞子,细腻顺滑，喝了还想喝的感觉。南瓜保留了南瓜皮、嚷和籽，原汁原味，香甜可口，奶香浓郁，营养丰富呢。', 7, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_593399c7e20ef.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_593399c7e20ef.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_593399c7e20ef.jpg'),
(64, '酥香老婆饼', 6, 10, '面粉，绿豆馅，猪油，白砂糖，鸡蛋液，白芝麻.老婆饼是广东的一种特色传统点心，以其皮薄馅厚，馅心滋润软滑、味道甜而不腻而著称。老婆饼好吃，关键在于“酥”，薄薄的饼皮，却有着数十层，齿间滋味，非同凡想~', 40, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_59339a7619daa.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_59339a7619daa.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_59339a7619daa.JPG'),
(66, '肉丁剁椒炸酱面', 7, 32, '豆腐，古称“福黎”，是由我国最早发明、制造，而后传往世界各地的。豆腐是我国素食菜肴的主要原料，历来受到人们的欢迎，被誉为“植物肉”。豆腐主要以大豆为原料加工制成，大豆含有较多的蛋白质和脂肪，因此豆腐营养价值较高。', 25, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933acb02b0a5.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933acb02b0a5.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933acb02b0a5.jpg'),
(67, '彩虹糯米饭', 1, 30, '玉米粒、土豆、胡萝卜、黄瓜、香菇切成粒，豆角用手掰，红辣椒滚刀切，葱花，蒜末。糯米隔天晚上就开始浸泡，大概七八小时就会发涨。倒入适量的油、辣椒油、香油、盐、花椒粉。搅拌均匀，热锅，把加好料的糯米饭放在锅中不断翻炒，直至炒熟，盛到碗中。 洗锅，热锅，倒入食用油，油稍热后，蒜泥爆香，加入香菇，豆角、胡萝卜、土豆翻炒，然后加入黄瓜、红辣椒，最后加入适量的盐、耗油即可。', 14, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_59339c4b9adeb.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_59339c4b9adeb.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_59339c4b9adeb.jpg'),
(68, '蛋包饭', 1, 28, '做个蛋包饭吧，加了番茄酱的炒饭香而不腻与诱人滑嫩的煎蛋皮完美结合，看上去非常华丽小资，也可以让人垂涎欲滴…...', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_59339cf9e3e38.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_59339cf9e3e38.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_59339cf9e3e38.jpg'),
(69, '腊肠土豆焖饭', 1, 28, '香香的腊肠，微甜的玉米，糯糯的土豆，一碗五彩缤纷的腊肠土豆焖饭，再配上一碗肉片汤，或者番茄蛋汤。也是美哉美哉的一顿！', 45, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_59339dcf74e64.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_59339dcf74e64.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_59339dcf74e64.jpg'),
(70, '蔓越莓糯米饭', 1, 36, '台湾凤梨酸甜味特浓，剩下半只凤梨做了一道儿子喜爱的美食，凤梨蔓越莓糯米饭，用凤梨，蔓越莓，樱桃，红豆和糯米一起蒸熟的，原汁原味的果肉香甜味和糯米融合一体味道超赞，深受家人的喜欢。', 84, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_59339ec078306.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_59339ec078306.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_59339ec078306.jpg'),
(71, '香蒸米饭', 1, 12, '蒸出来的米饭口感松软，米香味也很浓ヽ(￣▽￣)ﾉヽ(￣▽￣)ﾉ', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_59339f3d23fd3.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_59339f3d23fd3.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_59339f3d23fd3.jpg'),
(72, '南瓜糯米饭', 1, 29, '南瓜一分两半，用小刀斜着插入左一刀右一刀，不断做W形直到一圈相连。用不锈钢汤勺将南瓜内部挖空、做成盅状。将煮好的米饭捞出放入挖空的南瓜内（喜欢软的稍加些汤进去）。放入白糖拌匀，放入葡萄干和果脯。蒸锅里放够足量的水，将南瓜入蒸锅蒸50分钟即可。', 39, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_59339fac90bab.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_59339fac90bab.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_59339fac90bab.jpg'),
(73, '鸡肉蘑菇焖饭', 1, 35, '饭菜合一的做法很省事，将菜与饭合二为一焖在一个锅里，小火慢炖让每粒米饭吸收了大量的菜汁和肉汤，吃到嘴里颗颗米饭都充满了浓郁的菜香！', 15, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933a02cea8ef.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933a02cea8ef.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933a02cea8ef.jpg'),
(74, '韩式南瓜粥', 2, 19, '简单又好吃的韩式南瓜粥，吃完油腻的食物后来上一小碗，清新又解腻。小圆子超市有卖,也可以自己做.葡萄干可以换成蜜豆或者自己喜欢的东，加少量盐可以使南瓜粥的口感更甜，糯米粉的具体使用量自己调整', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933a2b0380f8.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933a2b0380f8.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933a2b0380f8.jpg'),
(75, '红枣莲子八宝粥', 2, 25, '红枣、莲子、大红豆、小红豆、薏仁、芡实等，最后还加了少许红糖调味，是一款既补血养颜又健脾养生的粥品。莲子的营养很丰富，含有大量的钙、磷和钾以及多种维生素和微量元素。其中，所含的棉子糖，更是老少皆宜的滋补品。具有养心安神、益肾固精、补脾养胃的功能。', 48, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933a31a7d02c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933a31a7d02c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933a31a7d02c.jpg'),
(76, '香菇瘦肉粥', 2, 16, '瘦肉里面加入香菇味道很浓，很香的，又加了几个鸡爪让粥的胶原蛋白丰富一下~粥也更好喝一点呢~', 47, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933a54805df5.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933a54805df5.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933a54805df5.jpg'),
(77, '猪肝瘦肉粥', 2, 22, '人体血液中缺铁会怕冷，当增加铁的摄入后，耐寒能力会明显增强。因此，怕冷的女性可增加对含铁高的食物的摄入量，如多吃点动物肝脏、瘦肉、菠菜、蛋黄等。菁厨今天要介绍的香粥——猪肝瘦肉粥就是一款不错的补铁美食，大家不妨试试，营养又美味！', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933a5ec32b2b.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933a5ec32b2b.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933a5ec32b2b.jpg'),
(78, '薏米红豆粥', 2, 28, '薏米红豆粥是粥也是药，它具有治湿邪功效。薏米，在中药里称“薏苡仁”，《神农本草经》将其列为上品，它可以治湿痹，利肠胃，消水肿，健脾益胃，久服轻身益气。红豆，在中药里称作为“赤小豆”，也有明显的利水，消肿，健脾胃之功效，因为它是红色的，红色入心，因此它还能补心。', NULL, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933a61d19c1f.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933a61d19c1f.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933a61d19c1f.jpg'),
(79, '香菇鸡肉粥', 2, 27, '熬好粥底，再放其他料，熬煮时间不超过10分钟，这样熬出的粥清爽，每样东西的味道都熬出来了又不串味。特别是辅料为肉及海鲜时，更应粥底和辅料分开。粥养胃，广式粥，滋味更加丰富，适合节后调养肠胃时食用。 ', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933a679ca268.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933a679ca268.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933a679ca268.jpg'),
(80, '五谷杂粮粥', 1, 30, '这一碗五谷杂粮粥，包含了十多种原料，包括几种米、豆、干果、果干、薯类，营养极为丰富。其中有美白消肿的薏米，抗衰老的荞麦米、燕麦，有补血乌发又富含膳食纤维的红豆、黑豆，有富含花青素的黑米、紫薯，有补肾养脾的山药，有养颜补血的红枣、葡萄干，有润肤的核桃仁、花生，营养、暖身、养颜、减肥。', 45, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933a6ced361b.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933a6ced361b.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933a6ced361b.jpg'),
(81, '皮蛋瘦肉粥', 2, 15, '清粥可以很好的调养肠胃。还可以增强食欲，补充体力，喝粥对防止喉咙干涩也很有好处。假日里友人相约唱K、吃了大量刺激性食物容易导致喉咙不适，温热的粥汁能滋润喉咙，有效缓解不适感的妙用。', 10, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933a77dc6e7d.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933a77dc6e7d.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933a77dc6e7d.jpg'),
(82, '豆角焖面', 7, 29, '山西是面食之都，有上千种面食，我们山西很喜欢吃焖面，家家都会做，做的都很好吃，今天再一次介绍正宗的山西面食，豆角焖面', 12, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933a9cdf13ee.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933a9cdf13ee.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933a9cdf13ee.jpg'),
(83, '茄汁培根炒意面', 7, 36, '这次炒意面把一个比较熟的番茄切碎一起炒，只用了一点点番茄酱，味道很赞，能用新鲜食材就用新鲜食材，天然的味道总是最好的', 14, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933a9fae571b.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933a9fae571b.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933a9fae571b.JPG'),
(84, '炸酱面', 7, 26, '材料：猪肉、黄瓜、绿豆芽、面条、葱、姜。\r\n材料：黄酱、甜面酱、淀粉、料酒。', 15, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933aa58e1aa8.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933aa58e1aa8.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933aa58e1aa8.jpg'),
(85, '鸡枞油拌面', 7, 32, '所谓鸡枞油，并不是油腻腻的感觉，只是一种做法，简单来说就是将新鲜鸡枞菌洗干净后撕成小条，放到锅里油炸，加一些香料，把鸡枞里面的水分榨干之后就制作完成了，做好的鸡枞油保存时间可以很长，并且带有独特的香味，直接吃当然可以，用来拌面条或是米饭更是美味。', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933aac8795e2.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933aac8795e2.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933aac8795e2.jpg'),
(86, '牛肉豆腐丁拌面', 7, 21, '食材明细：牛肉200克、豆腐500克、韭菜少许、姜少许、大葱一根、青椒两个、红椒一个、蒜瓣三个、面条适量、食用油适量、甜面酱两勺、盐适量、味精适量、凉开水适量\r\n', 14, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933ab77da1b0.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933ab77da1b0.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933ab77da1b0.jpg'),
(87, '川味炸酱面', 7, 34, '川味炸酱面和一般的炸酱面口味略有不同。\r\n炸酱用的是川味的经典--郫县豆瓣酱，炸好的酱汁干香微辣，拌好的面条每一口都是诱惑，让你越吃越上瘾。', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933abab9bc01.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933abab9bc01.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933abab9bc01.jpg'),
(88, '酱爆鸭酱面', 7, 38, ' 1、将鸭腿洗净，去骨去筋。2、鸭肉切成细丝待用。3、鸭丝加入啤酒、姜片腌制20分钟。4、刀切宽面条，抖散待用。5、豆瓣酱加少许清水稀释，冰糖5-6粒放入碗中搅匀。6、锅置火上，将腌制好的鸭丝下入炒至变色盛出。 7、黄瓜、葱白洗净，切丝待用。', 78, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933ac2accc29.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933ac2accc29.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933ac2accc29.jpg'),
(89, '南瓜小米粥', 2, 28, '南瓜是天然的甜品，生南瓜熟南瓜都有种自然的甜香，加上能量不高而且属于粗粮，健康晚饭做起来！', 45, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933ad3d648d5.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933ad3d648d5.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933ad3d648d5.JPG'),
(90, '素烧鹅', 8, 45, '吃起来，外脆里香，简直超好吃，假如不想自己做，可以去本店买，建议买来在煎一下，然后切好下酒，非常棒！！！', 50, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933af19e06fc.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933af19e06fc.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933af19e06fc.jpg'),
(91, '糖醋素排骨', 8, 46, '	食材明细：山药适量、油豆皮适量、蚝油适量、料酒适量、白糖适量。', 12, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933af8b3d9b1.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933af8b3d9b1.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933af8b3d9b1.jpg'),
(92, '樱桃素肉', 8, 60, '用大豆拉丝蛋白代替了肉。味道和口感以及品相都不比正版樱桃肉逊色。大豆拉丝蛋白一:产品特性拉丝蛋白:蛋白质含量高,不含胆固醇 ,弹性纤维结构,具有真实肉类的咀嚼感。爱吃肉又怕胖 的姐妹可以试试哟。', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933afcdd5e30.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933afcdd5e30.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933afcdd5e30.jpg'),
(93, '素四喜丸子', 8, 48, '食材明细：豆腐500克、鸡蛋1个、香菜适量、姜适量、葱适量、胡萝卜适量、淀粉适量、八角适量、芝麻油适量、盐适量、胡椒粉适量、小苏打适量、糖适量。', 15, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b04dbf3c7.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b04dbf3c7.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b04dbf3c7.jpg'),
(94, '五香素鸭', 8, 56, '这个菜的确是经典美味，很适合当个下酒凉菜，过年上肉菜的同时\r\n来上这么一盘素荤菜，也是很不错的', 52, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b078cceaa.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b078cceaa.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b078cceaa.jpg'),
(95, '鉴真素鸭', 8, 58, '笋切丝，胡萝卜切丝，红椒青椒切丝，香菇切丝， 3锅中入油，下葱花姜末煸香，下青红椒丝略炒。加入盐、味精、酱油、料酒、五香粉等材料炒匀。再加入胡萝卜丝，笋丝，香菇丝炒拌均匀后装盘。', 12, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b0eed999c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b0eed999c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b0eed999c.jpg'),
(96, '糖醋荸荠素肉片', 8, 65, '拉丝蛋白：蛋白质含量高，不含胆固醇 ，弹性纤维结构，具有真实肉类的咀嚼感 ，蛋白体细密均匀，性价比好。是替代肉类蛋白应用在肉制品及素食制品中最理想的产品。用这大豆拉丝蛋白片，过油炸至香酥，用糖醋汁调味，搭配了荸荠和木耳，营养丰富，口感香脆清爽。酸酸甜甜的很下饭。是一道营养高，热量低的减肥菜。', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b13901286.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b13901286.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b13901286.jpg'),
(97, '红烧素鸡', 8, 40, '素鸡是豆制品的一种，较有韧性，口感与肉类相似，适合于各种烹饪方式。\r\n素鸡中含有丰富蛋白质和卵磷脂，可防止血管硬化、预防心血管疾病、保护心脏、促进骨骼发育的功效。', 12, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b17532f7c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b17532f7c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b17532f7c.jpg'),
(98, '土豆鸡蛋煎', 9, 18, '材料：土豆 鸡蛋 小葱 碎米芽菜\r\n调料：盐 胡椒粉 烹调油 香料粉', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b32f590a1.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b32f590a1.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b32f590a1.jpg'),
(99, '牛油果鸡蛋沙拉', 9, 34, '牛油果和鸡蛋搭配，味道堪称完美。2牛油果对半切开，取一半用刀在果肉处竖向划开几刀，再模向划开几刀到皮部，将块状牛油果倒出即可。', 11, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b36d02a19.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b36d02a19.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b36d02a19.jpg'),
(100, '鸡蛋火腿沙拉', 9, 36, '沙拉是用各种凉透的熟料或是可以直接食用的生料加工成较小的形状后，再加入调味品或浇上各种冷沙司或冷调味汁拌制而成的。', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b39baf840.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b39baf840.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b39baf840.JPG'),
(101, '丝瓜炒鸡蛋', 9, 31, '丝瓜去皮，切滚刀块，鸡蛋打散，煎熟备用，平底锅放油爆香葱姜，下丝瓜块翻炒，加适量盐，放入煎好的鸡蛋，翻匀即可。', 20, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b4126b7a8.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b4126b7a8.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b4126b7a8.JPG'),
(102, '茼蒿杆炒香干', 9, 38, '食材明细：\r\n香干三块、茼蒿杆一把、胡萝卜半根、干辣椒二个、花椒少量、葱花少量、盐少量、酱油少量、蒜适量。', 20, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b4737b7d1.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b4737b7d1.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b4737b7d1.jpg'),
(103, '青椒酿肉', 9, 42, '青椒酿肉，很好吃的一款家常菜，感觉像虎皮青椒的升级版。', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b49c2d3ec.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b49c2d3ec.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b49c2d3ec.jpg'),
(104, '肉末胡萝卜丝', 9, 38, '肉末小火慢炒，炒到香酥，跟炒好的胡萝卜丝拌在一起，怎么吃都觉得舒服！\r\n材料：胡萝卜 牛肉 葱姜\r\n调料：盐 生抽 老抽 胡椒粉 糖 烹调油', 10, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b4c912647.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b4c912647.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b4c912647.jpg'),
(105, '蛋皮西红柿', 9, 28, '鸡蛋似乎和其他食材都能搭配在一起~~~如青椒，韭菜，洋葱，木耳，西红柿等~~~\r\n虽然鸡蛋的包容性强~~但我相信，鸡蛋与西红柿才是天生一对~~~~', 37, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b4f1761a9.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b4f1761a9.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b4f1761a9.jpg'),
(106, '棒棒糖蛋糕', 5, 15, '食材说明：低粉120克、全蛋液120克、黄油110克、砂糖50克、泡打粉2克、白巧克力150克、粉巧克力100克、彩珠1匙、橙子果酱1勺', 10, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b642abf37.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b642abf37.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b642abf37.jpg'),
(107, '蓝莓木糠布丁杯', 5, 20, '食材明细：玛利饼干16块、淡奶油100克、蓝莓果酱15克、炼乳30克、云呢拿香油2-3滴\r\n', 52, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b68d4d37c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b68d4d37c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b68d4d37c.jpg'),
(108, '火龙果冰淇淋', 5, 12, '用的慢汁机做的纯水果冰淇淋，真的好健康，放暑假了，可以放心给孩子吃咯！', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b6b15c881.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b6b15c881.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b6b15c881.jpg'),
(109, '蓝莓豆腐生乳酪', 5, 16, '内酯豆腐和奶油奶酪，完全依靠食材自身的特质来凝固，不需要吉利丁鱼胶粉等等凝固剂，更加健康放心。', 15, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b6e683c34.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b6e683c34.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b6e683c34.jpg'),
(110, '豆浆布丁', 5, 12, '边听音乐边做美食，真的非常惬意，尤其是做好以后在布丁上浇上草莓酱，用小勺子舀起来送入口中那时，感觉清凉爽口，带着浓浓的豆浆味混合着草莓酱的香甜，口感真的很好，尤其适合炎炎夏日品尝！', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b7149ac9c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b7149ac9c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b7149ac9c.jpg'),
(111, '芒果布丁', 5, 13, '食材明细：芒果肉300g、淡奶油100g、牛奶100g、吉利丁片10g、白砂糖50g', 36, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b7adc1600.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b7adc1600.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b7adc1600.jpg'),
(112, '荷花酥', 6, 18, '喜欢荷花，喜欢她的出淤泥而不染，濯清涟而不妖，喜欢她的香远益清，亭亭净植。其实，谁又会不喜欢呢？', 16, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b8cc45ce8.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b8cc45ce8.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b8cc45ce8.jpg'),
(113, '莲蓉一口酥', 6, 16, '简单的莲蓉馅被香酥的外皮包裹着，脆脆甜甜的味道特别适合大家欢聚的小点心，相信会深受小孩老人的喜爱喔', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b8fb7434b.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b8fb7434b.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b8fb7434b.jpg'),
(114, '椰蓉开口酥', 6, 20, '食材明细：椰蓉陷适量、黄油100g、椰蓉200g、鸡蛋2个、糖粉80g、奶粉20g、牛奶20g、油皮适量、中粉200g、砂糖20g、水90g、猪油90g、低粉180g', 45, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b9c507007.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b9c507007.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b9c507007.jpg'),
(115, '抹茶蛋黄酥', 6, 22, '猪油版的蛋黄酥，抹茶和红曲粉的。超级美味！', 12, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933b9e35a284.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933b9e35a284.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933b9e35a284.jpg'),
(116, '动物烧果子', 6, 22, ' 小动物们，集合了集合了。仙子姐姐给你们开会了”。萌萌的动物烧果子，很招孩子们喜爱，好看又好吃！！！\r\n', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933ba56d38b4.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933ba56d38b4.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933ba56d38b4.jpg'),
(117, '冬瓜排骨汤', 3, 38, '煲一锅热汤，喝到肚子里，别样的舒服。\r\n记住秘诀：喝汤时排骨要冷水下锅，吃肉肉时热水下锅。', 10, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933bc64c8e38.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933bc64c8e38.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933bc64c8e38.jpg'),
(118, '枸杞鲫鱼豆腐汤', 3, 38, '奶白的鱼汤，煮浮起的豆腐，都赛过了鲫鱼的消耗！', 54, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933bc939f274.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933bc939f274.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933bc939f274.jpg'),
(119, '阿胶鸽子汤', 3, 68, '食材明细：鸽子1只、东阿阿胶1块 约20克、红枣8粒、百合15克、姜片3片、盐适量\r\n', 14, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933bce666a4f.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933bce666a4f.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933bce666a4f.jpg'),
(120, '紫薯莲子银耳羹', 3, 20, '食材明细：紫薯1个、银耳适量、莲子适量、冰糖适量、蜜枣适量', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933bd2c0b0f0.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933bd2c0b0f0.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933bd2c0b0f0.jpg'),
(121, '红枣桂圆银耳汤', 3, 22, '功效：补血气、益脾胃。适用于贫血、神经衰弱、失眠、脾胃虚弱等症。', 15, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933bd56957cf.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933bd56957cf.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933bd56957cf.jpg'),
(123, '玉米山药排骨汤', 3, 60, '春天，是身体继续钙和维生素的季节。最好的进补方法就是蔬菜骨头汤，即不损伤蔬菜的营养，又充分汲取了猪骨的钙质，补进营养、远离油腻，这岂不是所有爱美女士的极致追求么？', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933bdad01201.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933bdad01201.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933bdad01201.jpg'),
(124, '罗宋汤', 3, 46, '食材明细：牛肉250g、红萝卜一个、洋葱一个、番茄二个、土豆一个、袖珍菇八根、橄榄油适量、盐半茶匙、黑胡椒粉少许、蒜头二个、香叶二片', 10, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933be06515b8.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933be06515b8.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933be06515b8.jpg'),
(125, '虾皮萝卜丝汤', 3, 23, '清甜的基础上，多了一份咸香和鲜美。虽然都只是淡淡的，但却实在是非常好喝。\r\n尤其在这样一个肠胃疲累受损的时期，更是让人觉得无比的舒服呢~', 21, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933be95eb042.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933be95eb042.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933be95eb042.jpg'),
(126, '美容草莓酒', 4, 32, '送给自己一份美味又养生的礼物——秘酿养颜美容草莓酒，在暖暖的午后坐在佑大的落地窗前，细细斟酌，草莓独特的香味便扑鼻而来，草莓独有的色彩令人陶醉。', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c016de38a.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c016de38a.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c016de38a.jpg'),
(127, '鸡尾酒', 4, 28, '入口实在是太棒了，很清新，不过鸡尾酒最擅长就是欺骗，酒精浓度虽然不高，但是喝一杯下去，脸上会泛起红晕。', 45, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c14670285.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c14670285.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c14670285.jpg'),
(128, '覆盆子热红酒', 4, 32, '食材明细：普通红酒1瓶、柑橘1只、丁香适量、桂皮2根、迷迭香2根、白砂糖适量\r\n', 0, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c19a67110.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c19a67110.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c19a67110.JPG'),
(129, '蛋奶酒', 4, 26, '天冷了来一杯，浑身暖洋洋的，有一点点晕乎乎的，感觉特别的好！', 10, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c1ce0905c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c1ce0905c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c1ce0905c.jpg'),
(130, '芬芳杨梅酒', 4, 19, '杨梅酒,其口感独特, 香味浓郁,口味香醇。具有通气活血，清热解暑，能治腹泻，消除疲劳，增进食欲的功效。', 30, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c203cf10b.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c203cf10b.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c203cf10b.jpg'),
(131, '自酿红酒', 4, 36, '八月葡萄成熟的季节，摘颜色最深的葡萄酿上两大罐葡萄酒，现在开启盖子，瞬间便能闻到满屋子的酒香，颜色透亮的红，煞是好看，口感甘甜适口，此为佳酿。', 25, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c22f2064a.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c22f2064a.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c22f2064a.jpg'),
(132, '钻石红酒冻', 4, 25, '这款甜品口感很清爽，颜色漂亮希望能给大家一个冰凉的夏天。', 24, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c266c4a48.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c266c4a48.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c266c4a48.jpg'),
(133, '鸡尾酒果汁', 4, 21, '喝这道果汁，最好用一根吸管从下往上吸入口中，你会层次分明地感受到“她”带给你的惊喜――略酸的葡萄汁、甜甜的西瓜汁、酸甜的橙子汁、清淡略苦的黄瓜汁。让我们感受到浓浓的夏日带来的火热和香甜，最后又带来一丝清凉、清新', 21, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c2cc8e27d.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c2cc8e27d.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c2cc8e27d.jpg'),
(134, '奶香玉米汁', 10, 11, '食材明细：甜玉米2个、牛奶500ML、清水200ML、白糖适量\r\n', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c53e43952.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c53e43952.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c53e43952.jpg'),
(135, '紫苏汁', 10, 12, '紫苏则多用来给食物染色,比如说做腌梅子的时候用紫苏可以使腌好的梅子看起来色泽红润,还有就是夏天用来做紫苏饮料啦。', 10, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c5784850c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c5784850c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c5784850c.jpg'),
(136, '菠萝橙子汁', 10, 13, '食材明细：\r\n菠萝半个、橙子2个、凉白开适量\r\n', 25, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c5b7f0e5c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c5b7f0e5c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c5b7f0e5c.jpg'),
(137, '芒果菠萝汁', 10, 15, '春天，好喝不过一杯营养满满的鲜榨果汁，芒果菠萝汁，在家自己做，只需几分钟就可以轻松搞定，健康营养无任何添加剂哦！', 14, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c5df6a320.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c5df6a320.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c5df6a320.JPG'),
(138, '芒果西米露', 10, 9, '超级美味的下午茶伴侣！食材明细：西米100g、芒果3个、砂糖50g、牛奶100g\r\n', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c61f484aa.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c61f484aa.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c61f484aa.jpg'),
(139, '牛油果奶昔', 10, 16, '用牛油果和养乐多搅打均匀后成奶昔，味道一级棒！食材明细：牛油果1个、养乐多2小瓶、谷物片', 14, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c66d84cf2.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c66d84cf2.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c66d84cf2.JPG'),
(140, '花生豆奶', 10, 12, '夏天是健身的旺季，而蛋白质是健身之后需要大量补充的。花生豆奶，能完美地在健身之后补充身体所需，让健身事半功倍。其中花生被称为性价比最高的坚果，而黄豆又被称为“豆中皇帝”，二者强强联合碰撞出不一样的营养火花！', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c6a823efe.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c6a823efe.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c6a823efe.jpg'),
(141, '木瓜牛奶', 10, 13, '木瓜所含的木瓜酵素能促进肌肤代谢,帮助溶解毛孔中堆积的皮脂及老化角质,让肌肤显得更明亮,更清新!常吃木瓜牛奶,不仅可以调经益气,滋补身体,更能让肌肤呈现纯净、细致、清新健康的外观。', 12, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933c6ca8082f.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933c6ca8082f.JPG', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933c6ca8082f.JPG'),
(142, '雪梨干茶饮', 11, 12, '食材明细：雪梨干3块、冰糖6颗、枸杞适量、红枣6颗、纯净水适量', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933ccc505876.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933ccc505876.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933ccc505876.jpg'),
(143, '薄荷茶', 11, 8, '清清凉凉的薄荷能消除夏日的火气与胃肠郁闷，而且如果有夏季热感冒，这是一道很不错的饮品。', 10, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933cd108d97f.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933cd108d97f.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933cd108d97f.jpg'),
(144, '菊花茶', 11, 10, '菊花茶是适合四季饮用的茶，它能散发体内的寒邪，促进阳气的生发。如果再配上一份贡菊或杭白菊，三份绿豆沙，与花茶同泡则可起到清肝明目的功效，最适合缓解视疲劳。', 35, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933cd69c6427.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933cd69c6427.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933cd69c6427.jpg'),
(145, '柚子蜜', 11, 12, '常饮蜂蜜柚子茶，能化痰止咳、开胃怡神、软化血管、美容养颜，还能强身健体，提高免疫力。蜂蜜柚子茶不仅是味道清香可口，更是一款有美白祛斑、嫩肤养颜功效的食品。', 20, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933cdc3ca33c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933cdc3ca33c.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933cdc3ca33c.jpg'),
(146, '红茶', 11, 14, '红茶总是适合体寒的女人们，放一包袋茶在办公室抽屉里，方便随时冲泡，一点不麻烦。如果再放几朵玫瑰花，一杯芳香又养颜的茶饮就OK 了', 20, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933cdf06581a.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933cdf06581a.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933cdf06581a.jpg'),
(147, '豆腐红糖水', 11, 11, '原料：豆腐100克，红糖60克，清水1碗；做法：红糖用清水冲开，加入豆腐，煮10分钟后即成；功效：经常服食，和胃止血，吐血明显者可选用此食疗方治疗。', 34, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933ce5d96268.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933ce5d96268.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933ce5d96268.jpg'),
(148, '陈皮红枣饮', 11, 14, '原料：橘子皮1块，红枣3枚；做法：红枣去核与橘子皮共煎水即成； 　　功效：每日1次，此食疗方行气健脾，降逆止呕，适用于虚寒呕吐。', 20, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933ce878854f.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933ce878854f.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933ce878854f.jpg'),
(149, '柠檬红茶', 11, 13, '柠檬的青酸与红茶醇厚的味道相结合，爽口又开胃，特别适合午后，搭配各式甜点，非常享受。', 12, '/onlineorder/Public/Upload/Dish/2017-06-04/240x240_5933cecd8b433.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/350x350_5933cecd8b433.jpg', '/onlineorder/Public/Upload/Dish/2017-06-04/600x600_5933cecd8b433.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `onlineorder_dishtype`
--

CREATE TABLE `onlineorder_dishtype` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `onlineorder_dishtype`
--

INSERT INTO `onlineorder_dishtype` (`id`, `name`) VALUES
(1, '主食'),
(4, '小吃'),
(5, '饮品');

-- --------------------------------------------------------

--
-- 表的结构 `onlineorder_dishtypeitem`
--

CREATE TABLE `onlineorder_dishtypeitem` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `typeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `onlineorder_dishtypeitem`
--

INSERT INTO `onlineorder_dishtypeitem` (`id`, `name`, `typeid`) VALUES
(1, '米饭', 1),
(2, '粥品', 1),
(3, '靓汤', 5),
(4, '酒水', 5),
(5, '甜品', 4),
(6, '点心', 4),
(7, '面食', 1),
(8, '肉食', 1),
(9, '蔬菜', 1),
(10, '饮料', 5),
(11, '茶饮', 5);

-- --------------------------------------------------------

--
-- 表的结构 `onlineorder_order`
--

CREATE TABLE `onlineorder_order` (
  `id` int(11) NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `seatid` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `mealtime` date NOT NULL,
  `creattime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `onlineorder_order`
--

INSERT INTO `onlineorder_order` (`id`, `userid`, `seatid`, `totalprice`, `mealtime`, `creattime`) VALUES
(1496485711, 1, 2, 114, '2017-06-03', '2017-06-03'),
(1496486468, 1, 2, 114, '2017-06-13', '2017-06-03'),
(1496488897, 1, 2, 114, '2017-06-20', '2017-06-03'),
(1496588070, 1, 2, 70, '2017-06-20', '2017-06-04'),
(1496589974, 36, 3, 259, '2017-06-04', '2017-06-04'),
(1496637756, 37, 3, 32, '2017-06-19', '2017-06-05');

-- --------------------------------------------------------

--
-- 表的结构 `onlineorder_orderitem`
--

CREATE TABLE `onlineorder_orderitem` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `dishid` int(11) NOT NULL,
  `dishamount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `onlineorder_orderitem`
--

INSERT INTO `onlineorder_orderitem` (`id`, `orderid`, `dishid`, `dishamount`) VALUES
(1, 1496588070, 55, 2),
(2, 1496588070, 56, 2),
(3, 1496589974, 105, 2),
(4, 1496589974, 93, 1),
(5, 1496589974, 72, 1),
(6, 1496589974, 118, 1),
(7, 1496589974, 125, 1),
(8, 1496589974, 111, 1),
(9, 1496589974, 99, 1),
(10, 1496589974, 112, 1),
(11, 1496637756, 61, 1);

-- --------------------------------------------------------

--
-- 表的结构 `onlineorder_seat`
--

CREATE TABLE `onlineorder_seat` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `stock` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `onlineorder_seat`
--

INSERT INTO `onlineorder_seat` (`id`, `type`, `stock`) VALUES
(2, '两人座', 0),
(3, '四人座', 13),
(4, '六人座', 10);

-- --------------------------------------------------------

--
-- 表的结构 `onlineorder_user`
--

CREATE TABLE `onlineorder_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `tel` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `onlineorder_user`
--

INSERT INTO `onlineorder_user` (`id`, `name`, `pwd`, `tel`) VALUES
(1, 'liangjing', '123456', '13160678169'),
(30, 'liangliang', 'liangjing', '13160678169'),
(31, 'liuyan', '123456', '12345678901'),
(32, 'liuyan1111', '111111', '12345678901'),
(33, 'liyan1', '123456', '12123456789'),
(36, 'libitao', '111111', '13160665115'),
(37, 'liyan2', '111111', '13160665090');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `onlineorder_admin`
--
ALTER TABLE `onlineorder_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `onlineorder_cart`
--
ALTER TABLE `onlineorder_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `dishid` (`dishid`);

--
-- Indexes for table `onlineorder_comment`
--
ALTER TABLE `onlineorder_comment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `onlineorder_dish`
--
ALTER TABLE `onlineorder_dish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subdishtypeid` (`subdishtypeid`);

--
-- Indexes for table `onlineorder_dishtype`
--
ALTER TABLE `onlineorder_dishtype`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `onlineorder_dishtypeitem`
--
ALTER TABLE `onlineorder_dishtypeitem`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `typeid` (`typeid`);

--
-- Indexes for table `onlineorder_order`
--
ALTER TABLE `onlineorder_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `seatid` (`seatid`);

--
-- Indexes for table `onlineorder_orderitem`
--
ALTER TABLE `onlineorder_orderitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderid` (`orderid`),
  ADD KEY `dishid` (`dishid`);

--
-- Indexes for table `onlineorder_seat`
--
ALTER TABLE `onlineorder_seat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type` (`type`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `onlineorder_user`
--
ALTER TABLE `onlineorder_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `name_2` (`name`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `onlineorder_admin`
--
ALTER TABLE `onlineorder_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `onlineorder_cart`
--
ALTER TABLE `onlineorder_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `onlineorder_comment`
--
ALTER TABLE `onlineorder_comment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `onlineorder_dish`
--
ALTER TABLE `onlineorder_dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- 使用表AUTO_INCREMENT `onlineorder_dishtype`
--
ALTER TABLE `onlineorder_dishtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `onlineorder_dishtypeitem`
--
ALTER TABLE `onlineorder_dishtypeitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `onlineorder_order`
--
ALTER TABLE `onlineorder_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1496637757;
--
-- 使用表AUTO_INCREMENT `onlineorder_orderitem`
--
ALTER TABLE `onlineorder_orderitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `onlineorder_seat`
--
ALTER TABLE `onlineorder_seat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `onlineorder_user`
--
ALTER TABLE `onlineorder_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- 限制导出的表
--

--
-- 限制表 `onlineorder_cart`
--
ALTER TABLE `onlineorder_cart`
  ADD CONSTRAINT `onlineorder_cart_ibfk_1` FOREIGN KEY (`dishid`) REFERENCES `onlineorder_dish` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `onlineorder_cart_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `onlineorder_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `onlineorder_comment`
--
ALTER TABLE `onlineorder_comment`
  ADD CONSTRAINT `onlineorder_comment_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `onlineorder_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `onlineorder_dish`
--
ALTER TABLE `onlineorder_dish`
  ADD CONSTRAINT `onlineorder_dish_ibfk_1` FOREIGN KEY (`subdishtypeid`) REFERENCES `onlineorder_dishtypeitem` (`id`);

--
-- 限制表 `onlineorder_dishtypeitem`
--
ALTER TABLE `onlineorder_dishtypeitem`
  ADD CONSTRAINT `onlineorder_dishtypeitem_ibfk_1` FOREIGN KEY (`typeid`) REFERENCES `onlineorder_dishtype` (`id`);

--
-- 限制表 `onlineorder_order`
--
ALTER TABLE `onlineorder_order`
  ADD CONSTRAINT `onlineorder_order_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `onlineorder_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `onlineorder_order_ibfk_2` FOREIGN KEY (`seatid`) REFERENCES `onlineorder_seat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `onlineorder_orderitem`
--
ALTER TABLE `onlineorder_orderitem`
  ADD CONSTRAINT `onlineorder_orderitem_ibfk_1` FOREIGN KEY (`orderid`) REFERENCES `onlineorder_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `onlineorder_orderitem_ibfk_2` FOREIGN KEY (`dishid`) REFERENCES `onlineorder_dish` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
