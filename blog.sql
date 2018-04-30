/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-04-30 17:15:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog
-- ----------------------------
INSERT INTO `blog` VALUES ('1', '标题1', '内容1', '1', null, '1', '2018-04-22 21:12:51', null);
INSERT INTO `blog` VALUES ('2', '标题2', '内容2', '2', null, '1', null, null);
INSERT INTO `blog` VALUES ('3', '文章32', 'ABCD', '1', null, '1', null, null);
INSERT INTO `blog` VALUES ('4', '4', '4', null, '2018-04-21 19:13:49', '1', '2018-04-21 19:13:49', null);
INSERT INTO `blog` VALUES ('5', 'xz', 'zx', '2', null, '17', '2018-04-22 16:51:02', '2018-04-22 16:51:02');
INSERT INTO `blog` VALUES ('6', 'sd', 'ddd', null, '2018-04-24 22:46:04', '17', '2018-04-24 22:46:04', '2018-04-22 16:53:34');
INSERT INTO `blog` VALUES ('7', 'ddd', 'ddd', null, '2018-04-24 22:42:05', '17', '2018-04-24 22:42:05', '2018-04-22 16:54:14');
INSERT INTO `blog` VALUES ('8', 'qqq', 'qqq', '1', '2018-04-24 21:42:08', '17', '2018-04-24 21:42:08', '2018-04-22 16:55:08');
INSERT INTO `blog` VALUES ('9', 'test 啊', 'a a a', '1', '2018-04-26 20:13:41', '17', '2018-04-26 20:13:41', '2018-04-22 20:50:16');

-- ----------------------------
-- Table structure for class
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('1', '分类1', null, '2018-04-24 22:40:35', null);
INSERT INTO `class` VALUES ('2', '分类2', null, null, null);
INSERT INTO `class` VALUES ('5', 'test', '2018-04-24 22:52:00', '2018-04-24 22:52:00', '2018-04-24 22:24:37');

-- ----------------------------
-- Table structure for discuss
-- ----------------------------
DROP TABLE IF EXISTS `discuss`;
CREATE TABLE `discuss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(255) DEFAULT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of discuss
-- ----------------------------
INSERT INTO `discuss` VALUES ('1', 'test评论', '1', '10', '2018-04-06 16:11:00', null, null);
INSERT INTO `discuss` VALUES ('2', 'test评论2', '1', '12', '2018-04-06 16:33:48', '2018-04-26 22:03:52', '2018-04-26 22:03:52');
INSERT INTO `discuss` VALUES ('3', 'test评论3', '2', '10', '2018-04-06 16:42:30', '2018-04-26 22:01:47', '2018-04-26 22:01:47');
INSERT INTO `discuss` VALUES ('5', 'xcaaaaa', '1', '1', '2018-04-06 17:11:21', '2018-04-26 22:00:50', '2018-04-26 22:00:50');
INSERT INTO `discuss` VALUES ('6', '不知道啊', '1', '1', '2018-04-06 17:11:31', '2018-04-26 21:57:54', '2018-04-26 21:57:54');
INSERT INTO `discuss` VALUES ('7', '是是是', '1', '1', '2018-04-06 17:11:45', '2018-04-26 21:57:05', '2018-04-26 21:57:05');
INSERT INTO `discuss` VALUES ('8', 's', '1', '1', '2018-04-08 21:24:43', '2018-04-26 21:55:50', '2018-04-26 21:55:50');
INSERT INTO `discuss` VALUES ('9', 'ddd', '1', '15', '2018-04-08 21:27:31', '2018-04-26 21:54:52', '2018-04-26 21:54:52');
INSERT INTO `discuss` VALUES ('10', '123', '1', '15', '2018-04-08 21:53:52', '2018-04-26 21:53:20', '2018-04-26 21:53:20');
INSERT INTO `discuss` VALUES ('11', 'adc', '1', null, '2018-04-26 21:31:56', '2018-04-26 21:52:56', '2018-04-26 21:52:56');
INSERT INTO `discuss` VALUES ('12', '1', '2', null, '2018-04-26 22:02:00', '2018-04-26 22:02:10', '2018-04-26 22:02:10');
INSERT INTO `discuss` VALUES ('13', '2', '2', null, '2018-04-26 22:02:03', '2018-04-26 22:02:10', '2018-04-26 22:02:10');
INSERT INTO `discuss` VALUES ('14', '3', '2', null, '2018-04-26 22:02:06', '2018-04-26 22:02:08', '2018-04-26 22:02:08');
INSERT INTO `discuss` VALUES ('15', '22', '2', null, '2018-04-26 22:02:14', '2018-04-26 22:02:14', null);
INSERT INTO `discuss` VALUES ('16', '33', '2', null, '2018-04-26 22:02:17', '2018-04-26 22:02:17', null);
INSERT INTO `discuss` VALUES ('17', '33', '1', null, '2018-04-26 22:03:55', '2018-04-26 22:04:05', '2018-04-26 22:04:05');
INSERT INTO `discuss` VALUES ('18', 'sd\r\n12', '1', null, '2018-04-26 22:04:02', '2018-04-26 22:04:04', '2018-04-26 22:04:04');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `isAdmin` int(11) DEFAULT '0',
  `qq` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `make_friends` varchar(255) DEFAULT NULL,
  `self_info` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '$2y$10$MQFNQXkxqdiaHaP9h3Jfpuekj/fznf2F1cq8iJ09A2KPjGgoZ.maq', '1', '1305548489', 'admin@admin.com', 'g', 'g', '2018-04-30 17:13:13', '2018-04-18 11:49:49', 'NAOivXqzaV2J0NG85giZCKWg0IbUDZqlmZ7SRF55wYycQJv8N5KU4EovBTK1', null);
INSERT INTO `users` VALUES ('2', 'exiugai', '$2y$10$xJFi1OOlblB0DZl2FF0mPO3EVjla2M/nlCfvZAOZYvGXR3HDiT.lO', '0', null, 'e@e.com', null, null, '2018-04-25 16:25:53', null, 'IBmho0orRNRcx5GNjUf5EhIO8brP2tUsKaYgd4gYu1h0cL7yfPFXAvYF1SPM', '2018-04-25 16:25:53');
INSERT INTO `users` VALUES ('8', 'm1', 'nn', '0', null, null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('9', 'nn', 'nn', '0', null, null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('10', 'g', 'g', '0', null, null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('11', 'ssdd', 'dd', '0', null, null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('12', 'momo', 'momo', '0', null, null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('13', 'momo1', 'momo', '0', null, null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('14', 'eeee', 'e', '0', null, null, null, null, null, null, null, null);
INSERT INTO `users` VALUES ('15', 'ddd', 'd', '0', '123', '123@qq.com', 'jyxy', 'grjj', null, null, null, null);
INSERT INTO `users` VALUES ('16', '1234@qq.com', '$2y$10$nt1tZi1d9Wc2hsay5v/.fObLFXMeUirzU2OQbucE9TqgCgoClSRLy', '0', null, '1234@qq.com', null, null, '2018-04-18 11:44:18', '2018-04-18 11:44:18', 'PyAbgWUg7DwRmuJSF2o3DRLaiR5zKy0mDEyAwi6EsmJqoJY2x6rVSWerbKRt', null);
INSERT INTO `users` VALUES ('18', 'chenjiacheng', '$2y$10$lf.9IW0BbXIbUFIjPQHKjeepb1co/O4t43qcHrM1DUYsvrcFgcT9m', '0', null, '456@qq.com', null, null, '2018-04-19 09:13:43', '2018-04-19 09:13:43', 'qJ8fyqWpNVcJXK6o6SJPb0bhyM3PMpwSZ9Q92Scii4zDlfadv84ekmxLmV1U', null);
