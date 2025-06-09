<?php
include 'usr/inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title><?= $data['sitename'] ?></title>
    <link rel="icon" href="<?= $data['ico'] ?>">
    <meta name="description" content="<?= $data['description'] ?>">
    <meta name="keywords" content="<?= $data['keywords'] ?>">
    <link rel="stylesheet" href="./static/css/index.css">
    <?= $data['header'] ?>
</head>

<body>

    <div class="center" style="background-image: url(<?=$data['bgurl']?>);">
        <!-- ************************************** -->
        <!-- pc端顶部导航栏 -->
        <div class="header">
            <div class="header_box">
                <div class="logo">
                    <img src="<?= $data['logo'] ?>" alt="logo">
                </div>
                <div class="bar">
                    <span class="bar_btn">

                        <a class="nav-item  <?php if ($page == 'index') {
                                                echo 'active';
                                            } else {
                                                echo '';
                                            } ?>" data-page="home" href="/">
                            <i class="menu-icon">🏠</i>
                            <span>首页</span>
                        </a>
                        <?= echoNav() ?>
                        <a class="nav-item <?php if ($page == 'friends') {
                                                echo 'active';
                                            } else {
                                                echo '';
                                            } ?>" href="/friends.php">
                            <i class="menu-icon"></i>
                            <span>友情链接</span>
                        </a>

                    </span>
                </div>
            </div>

        </div>
        <!-- 移动端侧边栏 -->
        <div class="sidebar" id="sidebar">
            <!-- 添加头像和个人信息区域 -->
            <div class="sidebar-profile">
                <img src="<?= $data['author'] ?>" alt="头像" class="sidebar-avatar">
                <div class="sidebar-info">
                    <h3><?= $data['title1'] ?></h3>
                    <p>欢迎光临我的小站~</p>
                </div>
            </div>
            <!-- 菜单项添加图标 -->
            <a class="menu-item <?php if ($page == 'index') {
                                    echo 'active';
                                } else {
                                    echo '';
                                } ?>" data-page="home" href="/">
                <i class="menu-icon ">🏠</i>
                <span>首页</span>
            </a>
            <?= echoMobileNav() ?>
            <a class="menu-item <?php if ($page == 'friends') {
                                    echo 'active';
                                } else {
                                    echo '';
                                } ?>" data-page="home" href="/friends.php">

                <span>友情链接</span>
            </a>
            <!-- 添加二次元装饰元素 -->
            <div class="sidebar-decoration">
                <p class="kawaii-text">ヾ(≧▽≦*)o</p>
            </div>
        </div>
        <!-- 侧边栏展开按钮 -->
        <div class="sidebar_toggle" onclick="toggleSidebar()">☰</div>
        <!-- ************************************** -->


        <!-- 中间内容 -->
        <div class="main_center">
            <div class="main_cn">
                <img src="<?= $data['author'] ?>" alt="用户头像" class="avatar">
                <h1 class="site-title"><?= $data['title1'] ?></h1>
                <p class="motto"><?= $data['title2'] ?></p>
                <p class="line"></p>
                <p class="dynamics_text"><!-- 你在黄昏寄一场梦给我 满载相思的欢喜和宇宙的星辰♡ --></p>
                <span class="contact_me">
                <?php $urls = explode(",", $data['icon']);?>
                    <a class="image_box" href="<?=$urls[0]?>" target="_blank">
                        <img src="../static/img/lianxiwo/github-fill.png" alt="github">
                    </a>
                    <a class="image_box" href="<?=$urls[1]?>" target="_blank">
                        <img src="../static/img/lianxiwo/zhihu.png" alt="知乎">
                    </a>
                    <a class="image_box" href="<?=$urls[2]?>" target="_blank">
                        <img src="../static/img/lianxiwo/weibo-copy.png" alt="微博">
                    </a>
                    <a class="image_box" href="<?=$urls[3]?>" target="_blank">
                        <img src="../static/img/lianxiwo/youxiang.png" alt="邮箱">
                    </a>
                </span>
            </div>
        </div>
        <div id="bannerWave1"></div>
        <div id="bannerWave2"></div>
    </div>