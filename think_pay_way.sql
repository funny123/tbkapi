/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50710
Source Host           : 127.0.0.1:3306
Source Database       : eintcoin

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2018-04-02 18:38:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `think_pay_way`
-- ----------------------------
DROP TABLE IF EXISTS `think_pay_way`;
CREATE TABLE `think_pay_way` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL COMMENT '用户ID',
  `aliPay_status` tinyint(1) DEFAULT NULL COMMENT '0支付宝支付关掉1支付宝开启',
  `aliPay_img` varchar(255) DEFAULT NULL COMMENT '支付宝支付二维码',
  `wechatPay_status` tinyint(1) DEFAULT NULL COMMENT '0支微信支付关掉1微信开启',
  `wechatPay_img` varchar(255) DEFAULT NULL COMMENT '微信支付二维码',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_pay_way
-- ----------------------------
INSERT INTO `think_pay_way` VALUES ('1', '212071', '0', '20180402\\58715ef887eeec0b1005eb2058997d1e.jpg', null, null, '1522660820', '1522660820');
