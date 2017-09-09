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
      <link rel="stylesheet" href="/tenyears/Public/admin/css/my.css">
    <script src="/tenyears/Public/admin/js/jquery-1.7.2.min.js" type="text/javascript"></script>
   </head>
  <body>
    <div class="header">
      <div class="stats">
        <p class="stat"><span class="number">35</span>loading</p>
        <p class="stat"><span class="number">27</span>tasks</p>
        <p class="stat"><span class="number">15</span>waiting</p>
      </div>
        <h1 class="page-title">网站信息</h1>
    </div>
        <ul class="breadcrumb">
            <li>
              <a href="/tenyears/admin.php/Admin/Web">主页</a>
              <span class="divider">/</span>
            </li>
            <li class="active">网站信息</li>
        </ul> 
<div class="container-fluid">
    <div class="row-fluid">
    <div class="row-fluid">

    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Just a quick note:</strong> Hope you like the theme!
    </div>
        <div class="block">
            <a href="#page-stats" class="block-heading" data-toggle="collapse">统计信息</a>
            <div id="page-stats" class="block-body collapse in">
                <div class="stat-widget-container">
                    <div class="stat-widget">
                        <div class="stat-button">
                            <p class="title"><?php echo ($usercount); ?></p>
                            <p class="detail">会员数</p>
                        </div>
                    </div>

                    <div class="stat-widget">
                        <div class="stat-button">
                            <p class="title"><?php echo ($dreamscount); ?></p>
                            <p class="detail">梦想数</p>
                        </div>
                    </div>
                    <div class="stat-widget">
                        <div class="stat-button">
                            <p class="title"><?php echo ($dmideascount); ?></p>
                            <p class="detail">想法数</p>
                        </div>
                    </div>
                    <div class="stat-widget">
                        <div class="stat-button">
                            <p class="title"><?php echo ($dmpicscount); ?></p>
                            <p class="detail">图片数</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
  <footer>
    <hr>
    <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p
    <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
  </footer>
      </div>
    </div>
  </div>
   <script src="/tenyears/Public/admin/js/bootstrap.js"></script>
  </body>
</html>