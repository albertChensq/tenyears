/*
Navicat MySQL Data Transfer

Source Server         : php
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : tenyears

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-09-09 13:32:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ten_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `ten_auth_group`;
CREATE TABLE `ten_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` varchar(255) NOT NULL DEFAULT '',
  `describe` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_auth_group
-- ----------------------------
INSERT INTO `ten_auth_group` VALUES ('1', '超级管理员', '1', '11,12,13,14,2,1,3,4,5,6,7,8,9,10,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48', '拥有全部权限');
INSERT INTO `ten_auth_group` VALUES ('2', '默认分组', '1', '', '拥有相对多的权限');
INSERT INTO `ten_auth_group` VALUES ('3', '发布人员', '1', '2,15,16,17', '拥有发布、修改文章的权限');
INSERT INTO `ten_auth_group` VALUES ('4', '编辑', '1', '11,12,13,14,2', '拥有文章模块的所有权限');
INSERT INTO `ten_auth_group` VALUES ('5', '积分小于50', '1', '2,15', '积分小于50');
INSERT INTO `ten_auth_group` VALUES ('6', '积分大于50小于200', '1', '2,16', '积分大于50小于200');
INSERT INTO `ten_auth_group` VALUES ('7', '积分大于200', '1', '2,17', '积分大于200');
INSERT INTO `ten_auth_group` VALUES ('8', '默认组', '1', '2,1,3', '拥有一些通用的权限');

-- ----------------------------
-- Table structure for ten_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `ten_auth_group_access`;
CREATE TABLE `ten_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_auth_group_access
-- ----------------------------
INSERT INTO `ten_auth_group_access` VALUES ('1', '1');
INSERT INTO `ten_auth_group_access` VALUES ('2', '2');
INSERT INTO `ten_auth_group_access` VALUES ('4', '4');
INSERT INTO `ten_auth_group_access` VALUES ('5', '5');
INSERT INTO `ten_auth_group_access` VALUES ('6', '6');
INSERT INTO `ten_auth_group_access` VALUES ('7', '7');
INSERT INTO `ten_auth_group_access` VALUES ('8', '1');
INSERT INTO `ten_auth_group_access` VALUES ('10', '3');
INSERT INTO `ten_auth_group_access` VALUES ('18', '1');
INSERT INTO `ten_auth_group_access` VALUES ('19', '1');
INSERT INTO `ten_auth_group_access` VALUES ('20', '2');
INSERT INTO `ten_auth_group_access` VALUES ('21', '2');
INSERT INTO `ten_auth_group_access` VALUES ('22', '2');
INSERT INTO `ten_auth_group_access` VALUES ('23', '2');
INSERT INTO `ten_auth_group_access` VALUES ('24', '2');
INSERT INTO `ten_auth_group_access` VALUES ('25', '2');
INSERT INTO `ten_auth_group_access` VALUES ('26', '2');
INSERT INTO `ten_auth_group_access` VALUES ('27', '2');

-- ----------------------------
-- Table structure for ten_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `ten_auth_rule`;
CREATE TABLE `ten_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_auth_rule
-- ----------------------------
INSERT INTO `ten_auth_rule` VALUES ('1', 'Admin/Auth/index', '权限列表', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('2', 'Admin/Index/index', '后台首页', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('3', 'Admin/Auth/Add', '添加权限页面', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('4', 'Admin/Auth/groupList', '角色管理页面', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('5', 'Admin/Auth/insert', '添加权限', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('6', 'Admin/Auth/groupAddHandle', '添加角色', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('7', 'Admin/Auth/accessSelect', '角色授权页面', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('8', 'Admin/Auth/accessSelectHandle', '更新角色权限', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('9', 'Admin/Auth/groupMember', '角色组成员列表', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('10', 'Admin/Auth/accessDelHandle', '删除权限', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('11', 'Admin/User/index', '会员列表', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('12', 'Admin/User/add', '添加用户页面', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('13', 'Admin/User/insert', '添加用户', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('14', 'Admin/User/mod', '用户修改页面', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('15', 'Admin/User/update', '用户修改', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('16', 'Admin/User/del', '用户删除', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('18', 'Admin/Dreams/index', '梦想列表', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('19', 'Admin/Dreams/del', '梦想删除', '1', '1', null);
INSERT INTO `ten_auth_rule` VALUES ('20', 'Admin/dmcomments/index', '梦想评论列表', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('21', 'Admin/dmcomments/del', '梦想评论删除', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('22', 'Admin/dmideas/index', '想法列表', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('23', 'Admin/dmideas/del', '想法删除', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('24', 'Admin/ideacomments/index', '想法评论列表', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('25', 'Admin/ideacomments/del', '想法评论删除', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('26', 'Admin/dmpics/index', '图片列表', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('27', 'Admin/dmpics/del', '图片删除', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('28', 'Admin/piccomments/index', '图片评论列表', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('29', 'Admin/piccomments/del', '图片评论删除', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('30', 'Admin/notice/index', 'Notice列表', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('31', 'Admin/notice/del', 'Notice删除', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('32', 'Admin/notice/add', 'Notice添加显示页面', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('33', 'Admin/notice/insert', 'Notice添加', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('34', 'Admin/revemail/index', '收信箱列表', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('35', 'Admin/revemail/del', '收信箱删除', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('36', 'Admin/sendemail/index', '发信箱列表', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('37', 'Admin/sendemail/del', '发信箱删除', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('38', 'Admin/email/index', '系统信息列表', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('39', 'Admin/email/del', '系统信息列表的删除', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('40', 'Admin/email/add', '系统信息添加页面', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('41', 'Admin/email/insert', '系统信息添加', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('42', 'Admin/tags/index', '标签列表', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('43', 'Admin/tags/del', '标签删除', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('44', 'Admin/tags/add', '标签添加页面', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('45', 'Admin/tags/insert', '标签添加', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('46', 'Admin/web/index', '网站配置首页', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('47', 'Admin/web/webconf', '网站配置页面', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('48', 'Admin/web/update', '网站配置修改', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('49', 'Home/usersettings/index', '前台用户设置页面', '1', '1', '');
INSERT INTO `ten_auth_rule` VALUES ('50', 'Home/wall/index', '前台动态页面', '1', '1', '');

-- ----------------------------
-- Table structure for ten_dmcomments
-- ----------------------------
DROP TABLE IF EXISTS `ten_dmcomments`;
CREATE TABLE `ten_dmcomments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `did` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `posttime` int(11) NOT NULL DEFAULT '0',
  `content` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_dmcomments
-- ----------------------------
INSERT INTO `ten_dmcomments` VALUES ('53', '24', '16', '1407917651', '啊啊撒打算');
INSERT INTO `ten_dmcomments` VALUES ('54', '24', '16', '1407917651', '啊啊撒打算');
INSERT INTO `ten_dmcomments` VALUES ('55', '24', '16', '1407917653', '啊啊撒打算');
INSERT INTO `ten_dmcomments` VALUES ('56', '24', '16', '1407917653', '啊啊撒打算');
INSERT INTO `ten_dmcomments` VALUES ('57', '24', '16', '1407917653', '啊啊撒打算');
INSERT INTO `ten_dmcomments` VALUES ('58', '24', '16', '1407917653', '啊啊撒打算');
INSERT INTO `ten_dmcomments` VALUES ('64', '40', '1', '1408502707', '十年后 what？');
INSERT INTO `ten_dmcomments` VALUES ('61', '25', '1', '1408439873', 'fsdafas');
INSERT INTO `ten_dmcomments` VALUES ('62', '25', '1', '1408453425', 'dsfdas ');
INSERT INTO `ten_dmcomments` VALUES ('65', '39', '1', '1408519955', 'fdsafdsaf');
INSERT INTO `ten_dmcomments` VALUES ('66', '39', '1', '1408519959', '回复admin：fasdfdsa');
INSERT INTO `ten_dmcomments` VALUES ('68', '43', '1', '1408688726', 'fasfdsf');

-- ----------------------------
-- Table structure for ten_dmideas
-- ----------------------------
DROP TABLE IF EXISTS `ten_dmideas`;
CREATE TABLE `ten_dmideas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `did` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `admire` varchar(255) NOT NULL,
  `admirenum` int(11) NOT NULL DEFAULT '0',
  `posttime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_dmideas
-- ----------------------------
INSERT INTO `ten_dmideas` VALUES ('13', '0', '16', '测试啊啊 啊', '', '0', '1407917605');
INSERT INTO `ten_dmideas` VALUES ('12', '21', '2', '法撒旦发射大幅度释放', '', '0', '1407913853');
INSERT INTO `ten_dmideas` VALUES ('25', '37', '1', '这是一个神奇的世界', '', '0', '1408498608');
INSERT INTO `ten_dmideas` VALUES ('26', '36', '26', 'Day8 insanity03 &amp; 腹肌撕裂者X 。爽啊。不过臂力不够啊，一个标准的俯卧撑都做不起来。', '', '0', '1408498751');
INSERT INTO `ten_dmideas` VALUES ('27', '36', '26', 'Day8 insanity03 &amp; 腹肌撕裂者X 。爽啊。不过臂力不够啊，一个标准的俯卧撑都做不起来。', '', '0', '1408498763');
INSERT INTO `ten_dmideas` VALUES ('23', '34', '23', '我要好好学习天天向上', '', '0', '1408455499');
INSERT INTO `ten_dmideas` VALUES ('24', '35', '25', 'adadad', '', '0', '1408497809');
INSERT INTO `ten_dmideas` VALUES ('28', '38', '1', '幸福是你们共同努力,携手共进退,一个眼神,一个动作,他或她就明白了你的想法!', '', '0', '1408499194');
INSERT INTO `ten_dmideas` VALUES ('29', '38', '1', '幸福不是目的，幸福是起点，是动力。', '', '0', '1408500532');
INSERT INTO `ten_dmideas` VALUES ('30', '39', '1', '我的team 三个人  mj mm ldl', '', '0', '1408500707');
INSERT INTO `ten_dmideas` VALUES ('31', '40', '26', '可能在大多数人眼里，这个世界上除了学霸、学渣和学弱以外，就一定只剩学神了。而“渺然别过”（十年后用户）却用现身说法告诉我们，在任何方面，不光是学习，只要怀抱着梦想的热情并对生活用力，我们都可以成为资深达人。', '', '0', '1408501312');
INSERT INTO `ten_dmideas` VALUES ('32', '40', '26', '十年后背后的故事① 做自己生命里的英雄', '', '0', '1408501436');
INSERT INTO `ten_dmideas` VALUES ('33', '41', '26', '在移动端将只可以创建三种内容：梦想，想法与照片。想法必须是纯文字，而照片将可以添加文字水印。我们希望通过这种减法使我们的移动端产品更符合使用场景。', '', '0', '1408501550');
INSERT INTO `ten_dmideas` VALUES ('38', '43', '1', 'dfasdfasdfsdfsdaf ', '', '0', '1408522341');
INSERT INTO `ten_dmideas` VALUES ('36', '38', '1', '分过讽德诵功', '', '0', '1408520079');
INSERT INTO `ten_dmideas` VALUES ('37', '44', '27', '看过就看过个h规划局', '', '0', '1408521571');
INSERT INTO `ten_dmideas` VALUES ('39', '42', '1', 'fasdfsad', '', '0', '1408927643');

-- ----------------------------
-- Table structure for ten_dmpics
-- ----------------------------
DROP TABLE IF EXISTS `ten_dmpics`;
CREATE TABLE `ten_dmpics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `did` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `pic` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `posttime` int(11) NOT NULL DEFAULT '0',
  `admire` varchar(255) NOT NULL,
  `admirenum` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_dmpics
-- ----------------------------
INSERT INTO `ten_dmpics` VALUES ('16', '24', '2', '53eb0ff643db4.jpg', '发顺丰到发', '1407913978', '', '0');
INSERT INTO `ten_dmpics` VALUES ('15', '21', '2', '53eb0f61dbc4e.jpg', '搭法撒旦法', '1407913828', ',2,1', '2');
INSERT INTO `ten_dmpics` VALUES ('14', '0', '2', '53eb0f2f06698.jpg', 'fdsfdsfdas', '1407913778', '', '0');
INSERT INTO `ten_dmpics` VALUES ('17', '0', '16', '53eb1e0aa5861.jpg', '测试', '1407917583', '', '0');
INSERT INTO `ten_dmpics` VALUES ('18', '0', '16', '53eb1e153a663.jpg', '测试', '1407917594', '', '0');
INSERT INTO `ten_dmpics` VALUES ('19', '25', '2', '53ecbb0ef401d.jpg', 'fsdasdfasfd', '1408023314', '', '0');
INSERT INTO `ten_dmpics` VALUES ('40', '37', '1', '53f3fbd79f693.jpg', '开始北漂生活', '1408498667', ',1', '1');
INSERT INTO `ten_dmpics` VALUES ('41', '36', '26', '53f3fc5233518.png', '若没有瘦十斤，简直浪费了', '1408498781', ',1', '1');
INSERT INTO `ten_dmpics` VALUES ('22', '31', '21', '53f30f4525096.jpg', '法撒旦法撒分', '1408438096', '', '0');
INSERT INTO `ten_dmpics` VALUES ('23', '34', '23', '53f352ca47906.jpg', '风骚的背影你不懂 丶', '1408455393', '', '0');
INSERT INTO `ten_dmpics` VALUES ('24', '35', '25', '53f3f81a4c188.gif', 'sdad', '1408497694', '', '0');
INSERT INTO `ten_dmpics` VALUES ('25', '35', '25', '53f3f82e3cfe8.gif', 'sdadd', '1408497713', '', '0');
INSERT INTO `ten_dmpics` VALUES ('26', '35', '25', '53f3f8435a1e0.gif', 'sdadd', '1408497732', '', '0');
INSERT INTO `ten_dmpics` VALUES ('27', '35', '25', '53f3f84e40838.gif', 'sdadd', '1408497743', '', '0');
INSERT INTO `ten_dmpics` VALUES ('28', '35', '25', '53f3f85c6d770.gif', 'sdadd', '1408497757', '', '0');
INSERT INTO `ten_dmpics` VALUES ('29', '35', '25', '53f3f86bc3ea3.gif', 'sdadd', '1408497772', '', '0');
INSERT INTO `ten_dmpics` VALUES ('30', '35', '25', '53f3f87359fbd.gif', 'sdadd', '1408497780', '', '0');
INSERT INTO `ten_dmpics` VALUES ('31', '35', '25', '53f3f87d588ad.gif', 'sdadd', '1408497790', '', '0');
INSERT INTO `ten_dmpics` VALUES ('32', '35', '25', '53f3f88750fc8.gif', 'sdadd', '1408497800', '', '0');
INSERT INTO `ten_dmpics` VALUES ('33', '35', '25', '53f3f8fb27895.gif', '六将很快很快', '1408497919', '', '0');
INSERT INTO `ten_dmpics` VALUES ('34', '35', '25', '53f3f90ab3670.gif', '六将很快很快', '1408497932', '', '0');
INSERT INTO `ten_dmpics` VALUES ('35', '35', '25', '53f3f91783f94.gif', '六将很快很快', '1408497944', '', '0');
INSERT INTO `ten_dmpics` VALUES ('36', '35', '25', '53f3f9265cbb5.gif', '六将很快很快', '1408497960', '', '0');
INSERT INTO `ten_dmpics` VALUES ('37', '35', '25', '53f3f934b6ded.gif', '六将很快很快', '1408497973', '', '0');
INSERT INTO `ten_dmpics` VALUES ('38', '35', '25', '53f3f94422d06.gif', '六将很快很快', '1408497989', '', '0');
INSERT INTO `ten_dmpics` VALUES ('39', '36', '26', '53f3f9e7c9a47.jpg', '若没有瘦十斤，简直浪费了', '1408498171', ',1', '1');
INSERT INTO `ten_dmpics` VALUES ('42', '38', '1', '53f3fcc1d4f30.jpg', '小萌子是我的', '1408498917', ',1', '1');
INSERT INTO `ten_dmpics` VALUES ('43', '38', '1', '53f3fda585904.jpg', '幸福。。。。。', '1408499120', ',1', '1');
INSERT INTO `ten_dmpics` VALUES ('44', '38', '1', '53f3fdc85150a.jpg', '幸福。。。。。so sweet', '1408499156', ',1', '1');
INSERT INTO `ten_dmpics` VALUES ('45', '40', '26', '53f4060350fca.png', 'THE future is happening。', '1408501267', '', '0');
INSERT INTO `ten_dmpics` VALUES ('46', '39', '1', '53f4065d9e76f.jpg', '不抛弃不放弃', '1408501350', ',1', '1');
INSERT INTO `ten_dmpics` VALUES ('47', '41', '26', '53f4074092ec4.jpg', '在移动端将只可以创建三种内容：梦想，想法与照片。想法必须是纯文字，而照片将可以添加文字水印。我们希望通过这种减法使我们的移动端产品更符合使用场景。', '1408501573', '', '0');
INSERT INTO `ten_dmpics` VALUES ('48', '42', '1', '53f4098822935.jpg', 'php 教程', '1408502161', ',1', '1');
INSERT INTO `ten_dmpics` VALUES ('49', '42', '1', '53f40a135652f.jpg', 'linux 。。。。。。', '1408502300', ',1', '1');
INSERT INTO `ten_dmpics` VALUES ('50', '42', '1', '53f40ab020d97.jpg', 'Apache..........', '1408502459', ',1', '1');
INSERT INTO `ten_dmpics` VALUES ('51', '42', '1', '53f40aee13a38.jpg', 'MySQL..........', '1408502519', '', '0');
INSERT INTO `ten_dmpics` VALUES ('52', '42', '1', '53f41a685661a.jpg', '', '1408506473', '', '0');
INSERT INTO `ten_dmpics` VALUES ('53', '44', '27', '53f45568a392f.jpg', 'k就赶快脚后跟快结婚', '1408521582', '', '0');

-- ----------------------------
-- Table structure for ten_dreams
-- ----------------------------
DROP TABLE IF EXISTS `ten_dreams`;
CREATE TABLE `ten_dreams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `dmdesc` text NOT NULL,
  `posttime` int(11) NOT NULL DEFAULT '0',
  `deadline` int(11) NOT NULL DEFAULT '0',
  `admire` varchar(255) NOT NULL,
  `admirenum` int(11) NOT NULL DEFAULT '0',
  `dmpic` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_dreams
-- ----------------------------
INSERT INTO `ten_dreams` VALUES ('21', '2', '第一个梦想', '发送到发大水法撒旦法', '1407913815', '1408464000', '', '0', '20140813151015282.jpg');
INSERT INTO `ten_dreams` VALUES ('22', '2', '第二个梦想', '发送到发大水法撒旦法富士达', '1407913887', '1407859200', ',16,1', '2', '20140813151127654.jpg');
INSERT INTO `ten_dreams` VALUES ('25', '2', 'fsdafsdfsd', 'fsdafsdaf', '1408023300', '1408550400', ',1', '1', '20140814213500532.jpg');
INSERT INTO `ten_dreams` VALUES ('24', '2', '三点多萨法撒旦法3123', '似懂非懂萨芬', '1407913921', '1407859200', ',16,1', '2', '20140813151201354.jpg');
INSERT INTO `ten_dreams` VALUES ('37', '1', '毕业找个工作', '结束五个月的php培训 开始新的生活', '1408498579', '1408464000', '', '0', '20140820093619654.jpg');
INSERT INTO `ten_dreams` VALUES ('38', '1', '幸福总是那么突然', '没有做不到 只有想不到 意外的惊喜', '1408498722', '1408464000', '', '0', '20140820093842426.jpg');
INSERT INTO `ten_dreams` VALUES ('39', '1', '我们要成为怎样的人', '介绍我们的团队', '1408500683', '1408464000', ',1', '1', '20140820101123600.jpg');
INSERT INTO `ten_dreams` VALUES ('31', '21', '梦想', '我的第一个梦想', '1408437957', '1408377600', '', '0', '20140819164557464.jpg');
INSERT INTO `ten_dreams` VALUES ('32', '21', '第二个梦想', '减肥', '1408438210', '1408377600', '', '0', '20140819165010900.jpg');
INSERT INTO `ten_dreams` VALUES ('33', '21', '第三个梦想 减肥', '发送仿盛大私服', '1408438236', '1408377600', ',1', '1', '20140819165036863.jpg');
INSERT INTO `ten_dreams` VALUES ('34', '23', '我是大神啊', '我是大神啊', '1408455357', '1408377600', '', '0', '20140819213557870.jpg');
INSERT INTO `ten_dreams` VALUES ('40', '26', '十年后', '', '1408501233', '1409068800', '', '0', '20140820102033195.jpg');
INSERT INTO `ten_dreams` VALUES ('35', '25', 'sdada', 'asdsadads', '1408497668', '1408464000', '', '0', '20140820092108219.jpg');
INSERT INTO `ten_dreams` VALUES ('36', '26', '瘦成一道闪电', '', '1408498130', '1411660800', '', '0', '20140820092850229.jpg');
INSERT INTO `ten_dreams` VALUES ('41', '26', '推出「十年后」移动端」', '', '1408501516', '1408464000', '', '0', '20140820102516376.jpg');
INSERT INTO `ten_dreams` VALUES ('42', '1', '做一个技术大牛', '面包会有的', '1408502052', '1408464000', '', '0', '20140820103412809.jpg');
INSERT INTO `ten_dreams` VALUES ('43', '1', '测试111', '测试法萨芬的萨菲', '1408519996', '1408377600', ',1', '1', '20140820153316473.jpg');
INSERT INTO `ten_dreams` VALUES ('44', '27', '有车', '快结婚', '1408521555', '1409155200', ',1', '1', '20140820155915733.jpg');

-- ----------------------------
-- Table structure for ten_follow
-- ----------------------------
DROP TABLE IF EXISTS `ten_follow`;
CREATE TABLE `ten_follow` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `followers` int(11) NOT NULL DEFAULT '0',
  `followed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_follow
-- ----------------------------
INSERT INTO `ten_follow` VALUES ('56', '21', '4');
INSERT INTO `ten_follow` VALUES ('55', '21', '2');
INSERT INTO `ten_follow` VALUES ('91', '1', '4');
INSERT INTO `ten_follow` VALUES ('69', '1', '3');
INSERT INTO `ten_follow` VALUES ('53', '21', '1');
INSERT INTO `ten_follow` VALUES ('61', '1', '5');
INSERT INTO `ten_follow` VALUES ('67', '22', '3');
INSERT INTO `ten_follow` VALUES ('66', '22', '2');
INSERT INTO `ten_follow` VALUES ('65', '22', '1');
INSERT INTO `ten_follow` VALUES ('64', '1', '18');
INSERT INTO `ten_follow` VALUES ('63', '1', '9');
INSERT INTO `ten_follow` VALUES ('99', '1', '6');
INSERT INTO `ten_follow` VALUES ('33', '1', '15');
INSERT INTO `ten_follow` VALUES ('34', '1', '15');
INSERT INTO `ten_follow` VALUES ('35', '2', '1');
INSERT INTO `ten_follow` VALUES ('36', '2', '1');
INSERT INTO `ten_follow` VALUES ('68', '1', '2');
INSERT INTO `ten_follow` VALUES ('57', '21', '5');
INSERT INTO `ten_follow` VALUES ('73', '23', '1');
INSERT INTO `ten_follow` VALUES ('74', '1', '21');
INSERT INTO `ten_follow` VALUES ('75', '1', '25');
INSERT INTO `ten_follow` VALUES ('97', '1', '27');
INSERT INTO `ten_follow` VALUES ('77', '26', '1');
INSERT INTO `ten_follow` VALUES ('78', '26', '2');
INSERT INTO `ten_follow` VALUES ('79', '26', '3');
INSERT INTO `ten_follow` VALUES ('80', '26', '4');
INSERT INTO `ten_follow` VALUES ('81', '26', '5');
INSERT INTO `ten_follow` VALUES ('82', '26', '6');
INSERT INTO `ten_follow` VALUES ('83', '26', '22');
INSERT INTO `ten_follow` VALUES ('84', '1', '22');
INSERT INTO `ten_follow` VALUES ('96', '27', '22');
INSERT INTO `ten_follow` VALUES ('95', '27', '26');
INSERT INTO `ten_follow` VALUES ('94', '27', '4');
INSERT INTO `ten_follow` VALUES ('92', '27', '1');
INSERT INTO `ten_follow` VALUES ('90', '1', '26');
INSERT INTO `ten_follow` VALUES ('98', '1', '28');

-- ----------------------------
-- Table structure for ten_ideacomments
-- ----------------------------
DROP TABLE IF EXISTS `ten_ideacomments`;
CREATE TABLE `ten_ideacomments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `iid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `posttime` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_ideacomments
-- ----------------------------
INSERT INTO `ten_ideacomments` VALUES ('46', '12', '2', '1407913877', '回复test：电风扇发疯');
INSERT INTO `ten_ideacomments` VALUES ('45', '12', '2', '1407913870', '回复test：电风扇');
INSERT INTO `ten_ideacomments` VALUES ('47', '12', '2', '1407913878', '回复test：电风扇发疯');
INSERT INTO `ten_ideacomments` VALUES ('48', '12', '2', '1407913878', '回复test：电风扇发疯');
INSERT INTO `ten_ideacomments` VALUES ('49', '12', '2', '1407913879', '回复test：电风扇发疯');
INSERT INTO `ten_ideacomments` VALUES ('58', '37', '1', '1408521947', 'g');

-- ----------------------------
-- Table structure for ten_messages
-- ----------------------------
DROP TABLE IF EXISTS `ten_messages`;
CREATE TABLE `ten_messages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `posttime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_messages
-- ----------------------------
INSERT INTO `ten_messages` VALUES ('1', 'yoursister', '0');
INSERT INTO `ten_messages` VALUES ('2', 'fasfasd', '0');
INSERT INTO `ten_messages` VALUES ('3', 'dafsafsdaf', '1407939110');
INSERT INTO `ten_messages` VALUES ('4', 'fsdafasdf', '1407939181');
INSERT INTO `ten_messages` VALUES ('6', 'fdasfasfsdaf', '0');
INSERT INTO `ten_messages` VALUES ('13', '        fsfsasasfsaf', '1407948764');
INSERT INTO `ten_messages` VALUES ('9', '我是测试', '1407939110');
INSERT INTO `ten_messages` VALUES ('10', 'fdsafsdfsadf', '234324324');
INSERT INTO `ten_messages` VALUES ('12', '        fadfasfsad', '1407948732');
INSERT INTO `ten_messages` VALUES ('14', '        fsasafdsf', '1407948836');
INSERT INTO `ten_messages` VALUES ('16', '        我是测试1', '1408512750');

-- ----------------------------
-- Table structure for ten_notice
-- ----------------------------
DROP TABLE IF EXISTS `ten_notice`;
CREATE TABLE `ten_notice` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_notice
-- ----------------------------
INSERT INTO `ten_notice` VALUES ('1', '希望我们都能找到自己真正想要的东西。');
INSERT INTO `ten_notice` VALUES ('2', '谢谢你用这个网站记梦。');
INSERT INTO `ten_notice` VALUES ('3', '那首诗曾把他捧得很高，为的是以后把他摔得粉碎 - 茨威格');
INSERT INTO `ten_notice` VALUES ('4', 'Stay hungry, stay foolish.  - Steve Jobs');
INSERT INTO `ten_notice` VALUES ('5', 'A lot of times, people don\'t know what they want until you show it to them. - Steve Jobs');
INSERT INTO `ten_notice` VALUES ('6', 'However vast the darkness, we must supply our own light. - Stanley Kubrick');
INSERT INTO `ten_notice` VALUES ('7', 'When you stop doing things for fun, you might as well be dead. - Ernest Hemingway');
INSERT INTO `ten_notice` VALUES ('9', 'Do things that have never been done before. - Russell Kirsch');
INSERT INTO `ten_notice` VALUES ('10', 'A life spent making mistakes is not only more honorable, but more useful than a life spent doing nothing. - George Bernard Shaw');
INSERT INTO `ten_notice` VALUES ('98', '1111');
INSERT INTO `ten_notice` VALUES ('12', 'There\'s a difference between knowing the path and walking the path. – Morpheus');
INSERT INTO `ten_notice` VALUES ('13', 'Without pain, without sacrifice, we would have nothing. - Tyler Durden');
INSERT INTO `ten_notice` VALUES ('14', 'The problem with the future is that it keeps turning into the present. - Bill Watterson');
INSERT INTO `ten_notice` VALUES ('15', 'You don\'t learn to walk by following rules. You learn by doing, and by falling over. - Richard Branson');
INSERT INTO `ten_notice` VALUES ('16', 'If everyone is thinking alike then somebody isn’t thinking. - George Patton');
INSERT INTO `ten_notice` VALUES ('17', '当为了什么事情使尽全力拼搏，把近段时间所有的决心和希望都寄托于它时，无论结果如何，其实我都已经输了。因为这样就是承认这件事的结果比我的生活以及你自身不可被夺走的东西都更重要。');
INSERT INTO `ten_notice` VALUES ('18', 'To infinity and beyond! - Buzz Lightyear');
INSERT INTO `ten_notice` VALUES ('19', 'You are never too old to set another goal or to dream a new dream. - C. S. Lewis');
INSERT INTO `ten_notice` VALUES ('20', 'Things do not happen. Things are made to happen. - John F. Kennedy');
INSERT INTO `ten_notice` VALUES ('21', 'If you want to succeed, strike out on new paths rather than travel the worn paths of accepted success. - John D. Rockefeller');
INSERT INTO `ten_notice` VALUES ('22', 'I can, therefore I am. - Simone Weil');
INSERT INTO `ten_notice` VALUES ('23', 'Action will delineate and define you. - Thomas Jefferson');
INSERT INTO `ten_notice` VALUES ('24', 'Begin at the beginning and go on till you come to the end; then stop. - Lewis Carroll');
INSERT INTO `ten_notice` VALUES ('25', 'A man who dares to waste one hour of time has not discovered the value of life. - Charles Darwin');
INSERT INTO `ten_notice` VALUES ('26', '肖恩知道一个初创公司最要紧的事情就是创始人的激情和抱负。如果你要做这样的事情——真的做它，真的成功了——你必须时刻和事业待在一起。每分每秒都要。 - The Accidental Billionaires: The Founding of Facebook, A Tale of Sex, Money, Genius, and Betrayal');
INSERT INTO `ten_notice` VALUES ('27', 'I don’t know where I’m going, but I’m on my way. - Carl Sagan');
INSERT INTO `ten_notice` VALUES ('28', 'I do not want to waste any time. And if you are not working on important things, you are wasting time. - Dean Kamen');
INSERT INTO `ten_notice` VALUES ('29', 'I confess that in 1901 I said to my brother Orville that man would not fly for fifty years. - Wilbur Wright');
INSERT INTO `ten_notice` VALUES ('30', 'Efficiency is doing things right; effectiveness is doing the right things. - Peter Drucker');
INSERT INTO `ten_notice` VALUES ('31', 'I’ve failed over and over and over again in my life and that is why I succeed. - Michael Jordan');
INSERT INTO `ten_notice` VALUES ('32', '当你意识到，最重要的事情在你自己心里，受你自己的控制，你自己选择自己的人生，激励自己不浪费时间，持续地做正确的事，坚持积累，在计划的指导下思考，这一切都在乎于你自己头脑中的驱动力，你自己头脑里的选择，你的坚持力，你的计划，你的梦想，你的决心。你要下决心打败概率，闻达于天下，你大可以制定周密计划，然后一步一步规划，持续地去做。没有人在肉体上和精神上会阻止你，一切只在于你自己。所以生活中的波折起伏也因此失去意义，要看到更长远的方向和趋势，真正面对自我思考问题，制定计划。依赖你的头脑。思考。不要害怕。');
INSERT INTO `ten_notice` VALUES ('33', 'Nothing will work unless you do. - Maya Angelou');
INSERT INTO `ten_notice` VALUES ('34', 'Your time is limited, so don’t waste it living someone else’s life. - Steve Jobs');
INSERT INTO `ten_notice` VALUES ('35', 'Haters don\'t build things. Just use them as extra motivation. - XD');
INSERT INTO `ten_notice` VALUES ('36', 'Doing the best at this moment puts you in the best place for the next moment. - Oprah Winfrey');
INSERT INTO `ten_notice` VALUES ('37', '安全感（INNER PEACE）不能来源于物质，不能以往的成就，标签，或者来源于习惯的生活，安全感应该来源于你现在这一刻的状态。如果你做事的基调来源于你对当下这个时刻自己的信心，你就不可战胜。安全感只能来自于不可被夺走或评论的东西。如果仅仅知道自己在变得越来越好，也会得到安全感，但是那样不可靠，来源于不可预测和控制的未来。如果只是知道自己做过很伟大的事情，可以得到的是虚幻的，很容易被评论或者打破的安全感。只有现在的内在的自我是我们唯一可以确认的东西，所以请思考你，现在在这个时刻，是怎样的人。');
INSERT INTO `ten_notice` VALUES ('38', '就像安提赛尼斯说的一样，真正幸福的人不应该依赖稍纵即逝的外在物质，真正的幸福一旦获得就没法被夺去。真正的人关注自己的内心。');
INSERT INTO `ten_notice` VALUES ('39', 'There are people who accomplish things, and people who claim to have accomplished things. The first group is less crowded. - Mark Twain');
INSERT INTO `ten_notice` VALUES ('40', 'Take time to deliberate, but when the time for action has arrived, stop thinking and go in. - Napoleon Bonaparte');
INSERT INTO `ten_notice` VALUES ('41', 'A person who never made a mistake never tried anything new. - Albert Einstein');
INSERT INTO `ten_notice` VALUES ('42', 'There are only two mistakes one can make along the road to truth; not going all the way, and not starting. - Buddha');
INSERT INTO `ten_notice` VALUES ('43', '“你可以通过预测大小官员的仕途来关心国家的前途、间接地尽匹夫之责，也可以努力朝体格强健心灵健康术业有专攻的大好青年方向发展，直接成为国家的前途。青年人本应怀有的高远理想，振兴一个庞大国家所需要做的方方面面的艰巨工作，这些都是大词儿，往小里说，就是别把大好年华虚掷在官场的繁琐哲学里。”来自《坂上之云》书评');
INSERT INTO `ten_notice` VALUES ('44', 'I never see what has been done; I only see what remains to be done. – Buddha');
INSERT INTO `ten_notice` VALUES ('45', 'Wherever you go, go with all your heart. - Confucius');
INSERT INTO `ten_notice` VALUES ('46', 'When it is obvious that the goals cannot be reached, don’t adjust the goals, adjust the steps. - Confucius');
INSERT INTO `ten_notice` VALUES ('47', 'I wasted time, and now doth time waste me.  - William Shakespeare');
INSERT INTO `ten_notice` VALUES ('48', 'Ambition should be made of sterner stuff. - William Shakespeare');
INSERT INTO `ten_notice` VALUES ('49', '大多数人的都不愿意承认的残酷现实是，看着现在的自己，你基本上就知道10年后你会成为怎样的人，是不是会成功，会不会改变世界。不愿意承认的原因是，我们还愿意相信“人生是不可控制的”，“永远不知道下一个是什么，生活才会更有趣么”“要等待机会到来”这样的鬼话。');
INSERT INTO `ten_notice` VALUES ('50', 'They always say time changes things, but you actually have to change them yourself. - Andy Warhol');
INSERT INTO `ten_notice` VALUES ('51', 'The best way out is always through. - Robert Frost');
INSERT INTO `ten_notice` VALUES ('52', 'The only way of finding the limits of the possible is by going beyond them into the impossible.  - Arthur C. Clarke');
INSERT INTO `ten_notice` VALUES ('53', '在耶鲁大二期间，Ben Silberman萌生了从商的想法，但又不知从何做起，于是他成为了 DC 公司执行委员会的咨询顾问。一次偶然的机会，他接触到了著名科技博客 Techcrunch，并发现自己开始慢慢沉迷其中，于是他渐渐意识到他现在的生活并不是他想要的生活，而《硅谷海盗》这部电影使他萌生了去西部的想法，电影中的一句台词对他触动很大：现在加州也许正在经历一场变革。经再三考虑，他从 DC 辞职去了加州。');
INSERT INTO `ten_notice` VALUES ('54', 'You miss 100% of the shots you don’t take. - Wayne Gretzky');
INSERT INTO `ten_notice` VALUES ('55', 'I’m as proud of what we don’t do as I am of what we do.  - Steve Jobs');
INSERT INTO `ten_notice` VALUES ('56', 'There’s a way to do it better – find it.  - Thomas Edison');
INSERT INTO `ten_notice` VALUES ('57', 'If you spend too much time thinking about a thing, you’ll never get it done.  - Bruce Lee');
INSERT INTO `ten_notice` VALUES ('58', '我们已经浪费了太多时间关注琐碎的事情，琐碎的新闻，琐碎的小说，琐碎的笑话，琐碎的视频。琐碎的人和物。然后等待未来的到来。');
INSERT INTO `ten_notice` VALUES ('59', '你一定得认识到自己想往哪个方向发展，然后一定要对准那个方向出发，要马上。你再也浪费不起多一秒的时间了，你浪费不起。一个不成熟的人的标志是他愿意为了某个理由而轰轰烈烈地死去，而一个成熟的人的标志是他愿意为了某个理由而谦恭的活下去。 - 塞林格（Jerome David Salinger，作家）');
INSERT INTO `ten_notice` VALUES ('60', '大多数人不愿意用实际的眼光面对未来，因为他们觉得未来的不确定性会掌控他们的生活，不确定性当然存在，可是仔细回想，在一个长达三十年的样本区间中，（除了个例）概率会抹平它们，大部分的你们终会回归预期轨迹。你没法挣脱。如果现在不思考未来，你虽然可以得到虚幻假象带来的宽慰，却失去了思考和改变的机会。你只能沿着现在的轨迹做出微小的改变，你做不了革命，因为你不敢推翻现有的生活，你觉得现有的生活是天经地义的，所以你只能沿着它走（被它推着走），所以你从20岁开始就失去了思考它的自由。');
INSERT INTO `ten_notice` VALUES ('61', 'Absorb what is useful, reject what is useless, add what is specifically your own. - Bruce Lee');
INSERT INTO `ten_notice` VALUES ('62', 'I start where the last man left off.  - Thomas Edison');
INSERT INTO `ten_notice` VALUES ('63', 'Never leave that till tomorrow which you can do today.  - Ben Franklin');
INSERT INTO `ten_notice` VALUES ('64', 'How can you quit now when we\'re so near the end!  - Prof. Henry Jones');
INSERT INTO `ten_notice` VALUES ('65', 'The best thinking has been done in solitude. The worst has been done in turmoil. - Thomas Edison');
INSERT INTO `ten_notice` VALUES ('66', '挣脱出现实思考问题是最重要的。要把自己当做一个不依存于现实状态的人，你的一生是一段人生，你可以控制它，而不是让现实影响它：它和现实的关系会被你此刻在日常事务上的挣扎所放大，让你只能着眼于并被困在现在，让你没法看到更有可能性的未来。如果能够跳脱出＂现在＂这个状态，人才可以完成自己。思考＂你＂的人生。而不是思考＂现在的你＂的人生。');
INSERT INTO `ten_notice` VALUES ('67', '人間的事情，其实都是遵从最有可能发生的情形来运作，即使看上去有百种可能性。要有勇气面对未来，基于预测制定切实可行的计划，放弃考虑小概率惊喜，仔细思量小概率灾难。建立由习惯带动的整部计划，从中获得安全感。这样就可以不被无聊和毒品类似物侵入。然后尽全力。每次失败意味着要调整计划，所以要总是留够时间。注重可持续性和未来性。用预测，习惯性重复，未来性思考编织强力的网络。这就是我的人生哲学。人间发生的事情千奇百怪，你要分清偶然性和大概率事件，主流和分流，哪个是主导因素，应该着重于什么，长期与短期。');
INSERT INTO `ten_notice` VALUES ('68', '意识一旦觉醒，意志就一分为二：行为者和旁观者，两者必然冲突。因为，行为者的我要求摆脱旁观者的我的约束。作为观我者，他极易受伤。而当悟时，弟子发现，既无“观我者”，也无“作为无知或不可知之量的灵体”，只有目标及实现目标的行动，此外皆不存在。 -《菊与刀》');
INSERT INTO `ten_notice` VALUES ('69', '我们越来越多地关注事务性的事情，没有人关注你的“想法”，逐渐地，你自己也不关注了，你只是完成一个又一个的任务：你并不是真正地活着。事务性的事情让你的内心变弱，人们越来越依赖于他们，拥有越来越强的社会性，但是精神被弱化，变得肤浅而软弱。');
INSERT INTO `ten_notice` VALUES ('70', '时间都用来陪他人，你陪自己的时间有多少？你只是把自己当成了工具，但是你应该是目的，你不是工具。不是说你应该为别人而活，而是你应该先意识到“自己”的存在。');
INSERT INTO `ten_notice` VALUES ('71', '大半的人在20岁或30岁上就死了：一过这个年龄，他们只变了自己的影子；以后的生命不过是用来模仿自己，把以前真正有人味儿的时代所说的，所做的，所想的，所喜欢的，一天天地重复，而且重复的方式越来越机械，越来越脱腔走板。  - 《约翰•克里斯朵夫》 ，罗曼•罗兰（Romain Rolland，作家）');
INSERT INTO `ten_notice` VALUES ('72', 'There is no happiness except in the realization that we have accomplished something. - Henry Ford');
INSERT INTO `ten_notice` VALUES ('73', 'The ability to convert ideas to things is the secret to outward success. - Henry Ward Beecher');
INSERT INTO `ten_notice` VALUES ('74', '如果你想要做成什么，那就从今天开始。');
INSERT INTO `ten_notice` VALUES ('76', 'Nothing will ever be attempted if all possible objections must first be overcome. - Samuel Johnson');
INSERT INTO `ten_notice` VALUES ('77', '社交网络不是让人与人的距离越来越远，而是消耗人花在自我事务上的时间，更加关注他人，只是肤浅的碎片化的关注。你和朋友聊天时也看手机，上班时也上网，你不是和网友聊天，那种所谓网络时代让人与人之间距离更远的老套说法早就他妈的该过时了。现在没有傻子在网上交友。这个时代的网络只是让人与人的距离更近，你想了解谁的生活都可以，但只是皮肤一下两厘米的深度。');

-- ----------------------------
-- Table structure for ten_piccomments
-- ----------------------------
DROP TABLE IF EXISTS `ten_piccomments`;
CREATE TABLE `ten_piccomments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `posttime` int(11) NOT NULL,
  `content` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_piccomments
-- ----------------------------
INSERT INTO `ten_piccomments` VALUES ('28', '16', '1', '1408105528', '回复admin：fdsafsadfsad');
INSERT INTO `ten_piccomments` VALUES ('29', '16', '1', '1408105533', '回复admin：fdsafsad');
INSERT INTO `ten_piccomments` VALUES ('31', '19', '1', '1408453993', '回复admin：是否sad');

-- ----------------------------
-- Table structure for ten_revemails
-- ----------------------------
DROP TABLE IF EXISTS `ten_revemails`;
CREATE TABLE `ten_revemails` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ruid` int(11) NOT NULL,
  `suid` int(11) NOT NULL,
  `content` text NOT NULL,
  `posttime` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_revemails
-- ----------------------------
INSERT INTO `ten_revemails` VALUES ('1', '2', '3', 'yoursister', '0', '1');
INSERT INTO `ten_revemails` VALUES ('3', '3', '3', '哈哈哈', '123232', '0');
INSERT INTO `ten_revemails` VALUES ('6', '2', '2', 'dafsafsdaf', '1407897391', '1');
INSERT INTO `ten_revemails` VALUES ('13', '3', '2', 'fdasfsdafsdafdsaf', '1407900436', '0');
INSERT INTO `ten_revemails` VALUES ('15', '2', '1', 'fsdafasdf', '1407939915', '0');
INSERT INTO `ten_revemails` VALUES ('17', '2', '1', 'fdasfasfsdaf', '1407943533', '0');
INSERT INTO `ten_revemails` VALUES ('18', '2', '1', 'fsafasfdsf', '1408105291', '0');
INSERT INTO `ten_revemails` VALUES ('19', '2', '1', 'fsdafasfdsa', '1408451341', '0');
INSERT INTO `ten_revemails` VALUES ('21', '22', '1', 'fadsfsad', '1408452446', '0');
INSERT INTO `ten_revemails` VALUES ('22', '1', '1', 'yoursister', '1408452470', '0');
INSERT INTO `ten_revemails` VALUES ('23', '1', '1', 'fasfasd', '1408452473', '0');
INSERT INTO `ten_revemails` VALUES ('25', '1', '1', 'dafsafsdaf', '1408453276', '0');
INSERT INTO `ten_revemails` VALUES ('27', '1', '1', 'fdasfasfsdaf', '1408512601', '0');
INSERT INTO `ten_revemails` VALUES ('31', '1', '1', 'fdsafsdfsadf', '1408512773', '0');
INSERT INTO `ten_revemails` VALUES ('32', '1', '1', 'fsdafasdf', '1408512821', '0');

-- ----------------------------
-- Table structure for ten_sendemails
-- ----------------------------
DROP TABLE IF EXISTS `ten_sendemails`;
CREATE TABLE `ten_sendemails` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ruid` int(11) NOT NULL DEFAULT '0',
  `suid` int(11) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `posttime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_sendemails
-- ----------------------------
INSERT INTO `ten_sendemails` VALUES ('2', '2', '2', 'fdsfdafasfdsa', '1407850532');
INSERT INTO `ten_sendemails` VALUES ('4', '3', '2', 'fsdafsadf', '1407857597');
INSERT INTO `ten_sendemails` VALUES ('5', '3', '2', 'fasffsaf', '1407857772');
INSERT INTO `ten_sendemails` VALUES ('6', '3', '2', 'dfsda 发放大', '1407858049');
INSERT INTO `ten_sendemails` VALUES ('7', '3', '2', 'dfsda 发放大地方撒法', '1407858094');
INSERT INTO `ten_sendemails` VALUES ('8', '3', '2', 'dfsda 发\n发放sad', '1407858113');
INSERT INTO `ten_sendemails` VALUES ('9', '3', '2', 'dfsda 发\n发放sad发撒法撒旦', '1407858337');
INSERT INTO `ten_sendemails` VALUES ('10', '3', '2', '法法撒旦法', '1407858413');
INSERT INTO `ten_sendemails` VALUES ('11', '3', '2', '法法撒旦法', '1407858413');
INSERT INTO `ten_sendemails` VALUES ('12', '3', '2', '法法撒旦法', '1407858413');
INSERT INTO `ten_sendemails` VALUES ('13', '3', '2', 'fasffsaf', '1407862683');
INSERT INTO `ten_sendemails` VALUES ('14', '3', '2', 'fasffsaf', '1407862690');
INSERT INTO `ten_sendemails` VALUES ('15', '3', '2', 'fasffsaf', '1407862782');
INSERT INTO `ten_sendemails` VALUES ('22', '4', '2', 'fsdafsadfsd', '1407891414');
INSERT INTO `ten_sendemails` VALUES ('23', '4', '2', 'fsdafsadfsd', '1407891426');
INSERT INTO `ten_sendemails` VALUES ('34', '2', '1', 'fsdafasfdsa', '1408451341');
INSERT INTO `ten_sendemails` VALUES ('35', '1', '22', '范德萨发达省份三大', '1408452424');
INSERT INTO `ten_sendemails` VALUES ('36', '22', '1', 'fadsfsad', '1408452446');

-- ----------------------------
-- Table structure for ten_tags
-- ----------------------------
DROP TABLE IF EXISTS `ten_tags`;
CREATE TABLE `ten_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_tags
-- ----------------------------
INSERT INTO `ten_tags` VALUES ('35', 'u有');
INSERT INTO `ten_tags` VALUES ('2', '考试');
INSERT INTO `ten_tags` VALUES ('3', '英语');
INSERT INTO `ten_tags` VALUES ('4', '工作');
INSERT INTO `ten_tags` VALUES ('5', '生活');
INSERT INTO `ten_tags` VALUES ('6', '职业');
INSERT INTO `ten_tags` VALUES ('7', '爱情');
INSERT INTO `ten_tags` VALUES ('8', '梦想');
INSERT INTO `ten_tags` VALUES ('9', '减肥');
INSERT INTO `ten_tags` VALUES ('10', '健康');
INSERT INTO `ten_tags` VALUES ('11', '创业');
INSERT INTO `ten_tags` VALUES ('12', '考研');
INSERT INTO `ten_tags` VALUES ('13', '坚持');
INSERT INTO `ten_tags` VALUES ('14', '出国');
INSERT INTO `ten_tags` VALUES ('15', '家庭');
INSERT INTO `ten_tags` VALUES ('16', '大学');
INSERT INTO `ten_tags` VALUES ('17', '赚钱');
INSERT INTO `ten_tags` VALUES ('18', '人生');
INSERT INTO `ten_tags` VALUES ('19', '事业');
INSERT INTO `ten_tags` VALUES ('20', '自我');
INSERT INTO `ten_tags` VALUES ('22', '   标签');
INSERT INTO `ten_tags` VALUES ('23', '          请输入标签\r\n           标签');
INSERT INTO `ten_tags` VALUES ('24', '          请输入标签\r\n           标签');
INSERT INTO `ten_tags` VALUES ('25', '          请输入标签\r\n           标签');
INSERT INTO `ten_tags` VALUES ('26', '          请输入标   标签签\r\n        ');
INSERT INTO `ten_tags` VALUES ('34', '     测试');
INSERT INTO `ten_tags` VALUES ('30', '          请输入标签\r\n        ');
INSERT INTO `ten_tags` VALUES ('31', '          请输入标签\r\n        ');

-- ----------------------------
-- Table structure for ten_users
-- ----------------------------
DROP TABLE IF EXISTS `ten_users`;
CREATE TABLE `ten_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userpwd` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `headpic` varchar(100) NOT NULL DEFAULT 'headpic.jpg',
  `age` int(11) NOT NULL DEFAULT '0',
  `sex` tinyint(4) NOT NULL DEFAULT '0',
  `address` varchar(100) NOT NULL DEFAULT '地球',
  `current_desc` varchar(100) NOT NULL,
  `future_desc` varchar(100) NOT NULL,
  `regtime` int(11) NOT NULL DEFAULT '0',
  `level` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_users
-- ----------------------------
INSERT INTO `ten_users` VALUES ('1', 'e10adc3949ba59abbe56e057f20f883e', 'admin@admin.me', 'admin', '53f346cfe041f.jpg', '25', '1', '萌萌 星球', '幸福的人', '更幸福的人', '1407284670', '1');
INSERT INTO `ten_users` VALUES ('27', 'e10adc3949ba59abbe56e057f20f883e', 'admin123@qq.com', 'admin123', '53f454f050e7c.jpg', '0', '0', '地球', '洪荒剑君快叫', '廻', '1408521358', '0');
INSERT INTO `ten_users` VALUES ('3', '21232f297a57a5a743894a0e4a801fc3', 'mj@mj.me', 'mj', 'headpic.jpg', '0', '0', '火星', '不知道', '更不知道了', '1407373526', '0');
INSERT INTO `ten_users` VALUES ('4', '21232f297a57a5a743894a0e4a801fc3', 'test1@test.me', 'test1', 'headpic.jpg', '0', '0', '土星', '创业者', '企业家', '1407374153', '0');
INSERT INTO `ten_users` VALUES ('5', '21232f297a57a5a743894a0e4a801fc3', 'test2@test.me', 'test2', 'headpic.jpg', '0', '0', '水星', '幸福的人', '更幸福的人', '1407374694', '0');
INSERT INTO `ten_users` VALUES ('6', '21232f297a57a5a743894a0e4a801fc3', 'test3@test.me', 'test3', 'headpic.jpg', '0', '0', '金星', '空想家', '行动家', '1407374738', '0');
INSERT INTO `ten_users` VALUES ('26', 'e10adc3949ba59abbe56e057f20f883e', '9876@qq.com', 'lll', '53f3f9884efaa.jpg', '0', '0', '地球', '', '', '1408497965', '0');
INSERT INTO `ten_users` VALUES ('28', 'admin', '123@123.com', 'admin', 'headpic.jpg', '0', '0', '地球', '', '', '0', '0');
INSERT INTO `ten_users` VALUES ('22', 'e10adc3949ba59abbe56e057f20f883e', 'test@test.mm', 'test', '53f3472eb76a4.jpg', '45', '1', '北京', 'php菜鸟', 'php工程师', '1408452376', '0');
INSERT INTO `ten_users` VALUES ('23', '62c8ad0a15d9d1ca38d5dee762a16e01', 'qwer@qq.com', 'qwer', '53f353c89b445.jpg', '22', '1', '北京昌平', '菜鸟', '大神', '1408455322', '0');
INSERT INTO `ten_users` VALUES ('24', 'fcea920f7412b5da7be0cf42b8c93759', '123456@123.com', '123456', '53f3558cb88b4.jpg', '20', '1', '北京', '浪人', '武僧', '1408455970', '0');
INSERT INTO `ten_users` VALUES ('25', '828fd9255753432d51df95eb62d61722', '12345678@qq.com', '12345678', '53f3fa2873a25.gif', '0', '0', '地球', '浪人', '流浪武士', '1408497657', '0');

-- ----------------------------
-- Table structure for ten_web
-- ----------------------------
DROP TABLE IF EXISTS `ten_web`;
CREATE TABLE `ten_web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isopen` tinyint(4) NOT NULL DEFAULT '1',
  `logo` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `webdesc` varchar(100) NOT NULL,
  `copyright` varchar(100) NOT NULL,
  `webname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ten_web
-- ----------------------------
INSERT INTO `ten_web` VALUES ('1', '1', '53f3008f79bb4.jpg', '十年后', '\'梦想,人生,未来,计划,时间轴,迷茫,10years\'', '                                                               基于未来时间轴的梦想社交网络，让年轻人分享想法与思考，基于梦想进行深度交流', '                                     ©2013 10years.me, All Rights Reserved. Created By V2Ex         ', '十年后11');
