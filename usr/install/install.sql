/*
 Navicat Premium Dump SQL
 Source Server         : bbb
 Source Server Type    : SQLite
 Source Server Version : 3045000 (3.45.0)
 Source Schema         : main
 Target Server Type    : SQLite
 Target Server Version : 3045000 (3.45.0)
 File Encoding         : 65001
 Date: 01/11/2024 13:25:20
*/
PRAGMA foreign_keys = false;
-- ----------------------------
-- Table structure for sqlite_sequence
-- ----------------------------
-- ----------------------------
-- Records of sqlite_sequence
-- ----------------------------
-- ----------------------------
-- Table structure for zyyo_data
-- ----------------------------
DROP TABLE IF EXISTS "zyyo_data";
CREATE TABLE "zyyo_data" (
  "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  "user" TEXT(255),
  "pwd" INTEGER,
  "sitename" TEXT(255),
  "keywords" TEXT(255),
  "description" TEXT(255),
  "ico" TEXT(255),
  "logo" TEXT(255),
  "author" TEXT(255),
  "title1" TEXT(255),
  "title2" TEXT(255),
  "beian" TEXT(255),
  "header" TEXT(255),
  "footer" TEXT(255),

   "bgurl" TEXT(255),
  "footurl" TEXT(255),
  "icon" TEXT(255)
);
-- ----------------------------
-- Records of zyyo_data
-- ----------------------------
INSERT INTO "zyyo_data" VALUES (
1, 
'admin',
123456, 
'Zyyo', 
'zyyo,张扬YO,ZYYO,张扬主页,ZYYO引导页,zhangyang', 
'整天半吊子和不学无术的坏孩子,梦想成为庄稼地里的读书人.....',
'./static/img/favicon.ico', 

'./static/img/logo.png',
'./static/img/tx.jpg', 
'标题1',
'标题2',
'备案吗', 
'<!--这里只能放link之类的-->', 
'<!--这里是随意的底部html-->',
'./static/img/lxbg.jpeg',
'./static/img/lxbg.jpeg', 
'1,2,3,4'
);
-- ----------------------------
-- Table structure for zyyo_icon
-- ----------------------------
DROP TABLE IF EXISTS "zyyo_icon";
CREATE TABLE "zyyo_icon" (
  "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  "tip" TEXT(255),
  "icon" TEXT(255),
  "href" TEXT(255),
  "onclick" TEXT(255),
  "power" TEXT(255) DEFAULT 0
);
-- ----------------------------
-- Records of zyyo_icon
-- ----------------------------

-- ----------------------------
-- Table structure for zyyo_item
-- ----------------------------
DROP TABLE IF EXISTS "zyyo_item";
CREATE TABLE "zyyo_item" (
  "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  "name" TEXT(255),
  "des" TEXT(255),
  "icon" TEXT(255),
  "project" INTEGER,
  "href" TEXT(255),

  "power" TEXT(255) DEFAULT 0
);
-- ----------------------------
-- Records of zyyo_item
-- ----------------------------
INSERT INTO "zyyo_item" VALUES (1, '博客', '记录摆烂日常', 'https://files.codelife.cc/wallhaven/full/lm/wallhaven-lmxrmy.jpg?x-oss-process=image/resize,limit_0,m_fill,w_184,h_103/quality,Q_90/format,webp', 1, 'https://blog.yilx.net',0);
INSERT INTO "zyyo_item" VALUES (2, '资源站', '记录学习笔记', 'https://files.codelife.cc/wallhaven/full/lm/wallhaven-lmxrmy.jpg?x-oss-process=image/resize,limit_0,m_fill,w_184,h_103/quality,Q_90/format,webp', 1, 'https://pan.yilx.net',0);
INSERT INTO "zyyo_item" VALUES (3, '测试', '测试', 'https://files.codelife.cc/wallhaven/full/lm/wallhaven-lmxrmy.jpg?x-oss-process=image/resize,limit_0,m_fill,w_184,h_103/quality,Q_90/format,webp', 1, 'https://yilx.net',0);
INSERT INTO "zyyo_item" VALUES (4, '测试', '测试', 'https://files.codelife.cc/wallhaven/full/lm/wallhaven-lmxrmy.jpg?x-oss-process=image/resize,limit_0,m_fill,w_184,h_103/quality,Q_90/format,webp', 1, 'https://yilx.net',0);
INSERT INTO "zyyo_item" VALUES (5, 'YILXIY主页', '本站同款', 'https://files.codelife.cc/wallhaven/full/lm/wallhaven-lmxrmy.jpg?x-oss-process=image/resize,limit_0,m_fill,w_184,h_103/quality,Q_90/format,webp', 2, 'https://github.com/linxiqt/homepage',0);
INSERT INTO "zyyo_item" VALUES (6, 'ZYYO主题', '一款ty主题', 'https://files.codelife.cc/wallhaven/full/lm/wallhaven-lmxrmy.jpg?x-oss-process=image/resize,limit_0,m_fill,w_184,h_103/quality,Q_90/format,webp', 2, 'https://github.com/ZYYO666/ZYYO',0);
-- ----------------------------
-- Table structure for zyyo_project
-- ----------------------------
DROP TABLE IF EXISTS "zyyo_project";
CREATE TABLE "zyyo_project" (
  "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  "name" TEXT(255),
  "icon" TEXT(255),
  "power" TEXT(255) DEFAULT 0
);
-- ----------------------------
-- Records of zyyo_project
-- ----------------------------
INSERT INTO "zyyo_project" VALUES (1, 'site', '<svg t="1705257422086" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1891">
                        <path d="M629.333333 202.666667v213.333333h277.333334v448h-512v-213.333333h-277.333334v-448h512z m213.333334 277.333333h-213.333334v170.666667h-170.666666v149.333333h384v-320z m-277.333334-213.333333h-384v320h213.333334v-170.666667h170.666666v-149.333333z m0 213.333333h-106.666666v106.666667h106.666666v-106.666667z" p-id="1892"></path>
                    </svg>', 0);
INSERT INTO "zyyo_project" VALUES (2, 'project', '<svg t="1705257422086" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1891">
                        <path d="M629.333333 202.666667v213.333333h277.333334v448h-512v-213.333333h-277.333334v-448h512z m213.333334 277.333333h-213.333334v170.666667h-170.666666v149.333333h384v-320z m-277.333334-213.333333h-384v320h213.333334v-170.666667h170.666666v-149.333333z m0 213.333333h-106.666666v106.666667h106.666666v-106.666667z" p-id="1892"></path>
                    </svg>', 0);




DROP TABLE IF EXISTS "zyyo_nav";
CREATE TABLE "zyyo_nav" (
  "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  "name" TEXT(255),
  "href" TEXT(255),
  "power" TEXT(255) DEFAULT 0
);
-- ----------------------------
-- Records of zyyo_project
-- ----------------------------
INSERT INTO "zyyo_nav" VALUES (1, '链接1', 'https://yilx.net',0);
INSERT INTO "zyyo_nav" VALUES (2, '链接2', 'https://yilx.net',0);




DROP TABLE IF EXISTS "zyyo_friends";
CREATE TABLE "zyyo_friends" (
  "id" INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  "name" TEXT(255),

  "des" TEXT(255),
    "ico" TEXT(255),
  "href" TEXT(255),
  "status" TEXT(255) DEFAULT 1,
  "power" TEXT(255) DEFAULT 0
);
-- ----------------------------
-- Records of zyyo_project
-- ----------------------------
INSERT INTO "zyyo_friends" VALUES (1, 'zyyo', '你好','https://files.codelife.cc/wallhaven/full/e7/wallhaven-e7g71w.jpg?x-oss-process=image/resize,limit_0,m_fill,w_307,h_172/quality,Q_90/format,webp', 'http://zyyo.net',0,0);
INSERT INTO "zyyo_friends" VALUES (2, 'zyyo','你好', 'https://files.codelife.cc/wallhaven/full/e7/wallhaven-e7g71w.jpg?x-oss-process=image/resize,limit_0,m_fill,w_307,h_172/quality,Q_90/format,webp','http://zyyo.net',1,0);

-- Auto increment value for zyyo_data
-- ----------------------------
PRAGMA foreign_keys = true;
