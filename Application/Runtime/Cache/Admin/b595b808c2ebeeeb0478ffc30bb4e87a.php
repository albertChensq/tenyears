<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Ten Years</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="/tenyears/Public/admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/tenyears/Public/admin/css/theme.css">
    <link rel="stylesheet" href="/tenyears/Public/admin/css/font-awesome.css">
    <link rel="stylesheet" href="/tenyears/Public/admin/css/myadmin.css">
    <script src="/tenyears/Public/admin/js/jquery-1.7.2.min.js" type="text/javascript"></script>
  </head>
  <body> 
    <div class="navbar">
        <div class="navbar-inner">
            <ul class="nav pull-right">
                <li id="fat-menu" class="dropdown">
                    <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-user"></i> 
                            <?php echo ($nickname); ?>
                        <i class="icon-caret-down"></i>
                    </a>

                    <!-- 用户登录 -->
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" class="visible-phone" href="#">Settings</a></li>
                        <li class="divider visible-phone"></li>

                        <!-- 用户退出 -->
                        <li><a tabindex="-1" href="/tenyears/admin.php/Admin/login/logout">退出</a></li>
                    </ul>
                </li>
            </ul>

            <!-- LOGO -->
            <a class="brand" href="/tenyears" target="_blank">
                <span class="first">Ten</span> 
                <span class="second">Years</span>
            </a>
        </div>
    </div>

    <!-- 左侧菜单导航栏 -->
    <div class="sidebar-nav">

        <!-- 网站信息导航 -->
        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse">
            <i class="icon-leaf"></i>
                网站信息
            <!-- <i class="icon-chevron-up"></i> -->
        </a>

        <!-- 子菜单栏 -->
        <ul id="dashboard-menu" class="nav nav-list collapse">
            <li><a href="/tenyears/admin.php/Admin/Web/index.html" target="main" >网站首页</a></li>
            <li><a href="/tenyears/admin.php/Admin/Web/webconf.html" target="main" >网站配置</a></li>
        </ul>
      

        <!-- 用户信息导航 -->
        <a href="#accounts-menu" class="nav-header" data-toggle="collapse">
            <i class="icon-user"></i>
                用户信息
            <!-- <i class="icon-chevron-up"></i> -->
        </a>

        <!-- 子菜单栏 -->
        <ul id="accounts-menu" class="nav nav-list collapse">
            <li >
                <a href="/tenyears/admin.php/Admin/User/index.html" target="main">用户管理</a>
            </li>
            <li >
                <a href="/tenyears/admin.php/Admin/User/add" target="main">添加用户</a>
            </li>
        </ul>
        
         <!-- 权限管理 -->
        <a href="#level-menu" class="nav-header" data-toggle="collapse">
            <i class="icon-user"></i>
                权限管理
            <!-- <i class="icon-chevron-up"></i> -->
        </a>

        <!-- 子菜单栏 -->
        <ul id="level-menu" class="nav nav-list collapse">
            <li >
                <a href="/tenyears/admin.php/Admin/Auth/index" target="main">权限列表</a>
            </li>
            <li >
                <a href="/tenyears/admin.php/Admin/Auth/add" target="main">添加权限</a>
            </li>
        </ul>

        <a href="#error-menu" class="nav-header collapsed  " data-toggle="collapse">
            <i class="icon-heart"></i>
                梦想 
            <!-- <i class="icon-chevron-up"></i></a> -->
        </a>
        <ul id="error-menu" class="nav nav-list collapse ">
            <li ><a href="/tenyears/admin.php/Admin/Dreams/index.html" target="main">梦想列表</a></li>
            <li ><a href="/tenyears/admin.php/Admin/Dmideas/index.html" target="main">想法列表</a></li>
            <li ><a href="/tenyears/admin.php/Admin/Dmpics/index.html" target="main">照片列表</a></li>
        </ul>

        <a href="#legal-menu" class="nav-header" data-toggle="collapse">
            <i class="icon-comments"></i>
                评论
            <!-- <i class="icon-chevron-up"></i> -->
        </a>
        <ul id="legal-menu" class="nav nav-list collapse ">
            <li ><a href="/tenyears/admin.php/Admin/Dmcomments/index.html" target="main">梦想评论</a></li>
            <li ><a href="/tenyears/admin.php/Admin/Ideacomments/index.html" target="main">想法评论</a></li>
            <li ><a href="/tenyears/admin.php/Admin/Piccomments/index.html" target="main">照片评论</a></li>
        </ul>
		
		<a href="#message-menu" class="nav-header" data-toggle="collapse">
            <i class="icon-envelope-alt"></i>
                站内信
           <!--  <i class="icon-chevron-up"></i> -->
        </a>
        <ul id="message-menu" class="nav nav-list collapse ">
            <li ><a href="/tenyears/admin.php/Admin/Email/index.html" target="main">系统信息</a></li>
            <li ><a href="/tenyears/admin.php/Admin/Email/add.html" target="main">发站内信</a></li>
            <li ><a href="/tenyears/admin.php/Admin/Revemail/index.html" target="main">收件箱</a></li>
            <li ><a href="/tenyears/admin.php/Admin/Sendemail/index.html" target="main">发件箱</a></li>
        </ul>



        <a href="#notice-menu" class="nav-header" data-toggle="collapse">
            <i class="icon-tags"></i>
                NOTICE && TAGS
            <!-- <i class="icon-chevron-up"></i> -->
        </a>
        <ul id="notice-menu" class="nav nav-list collapse ">
            <li ><a href="/tenyears/admin.php/Admin/Notice/index.html" target="main">NOTICE</a></li>
             <li ><a href="/tenyears/admin.php/Admin/Notice/add.html" target="main">NOTICE Add</a></li>
            <li ><a href="/tenyears/admin.php/Admin/Tags/index.html" target="main">TAGS</a></li>
             <li ><a href="/tenyears/admin.php/Admin/Tags/add.html" target="main">TAGS Add</a></li>
        </ul>
    </div>

    <!-- iframe 窗口 -->
    <div class="content">
        <iframe src="/tenyears/admin.php/Admin/Web/index.html" name="main" frameborder="0" width="100%" scrolling="no" height="1200px"></iframe>
    </div>
  </body>
</html>
<script src="/tenyears/Public/admin/js/bootstrap.js"></script>