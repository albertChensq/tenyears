<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bootstrap Admin</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

     <link rel="stylesheet" type="text/css" href="/tenyears/Public/admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/tenyears/Public/admin/css/theme.css">
    <link rel="stylesheet" type="text/css" href="/tenyears/Public/admin/css/my.css">
    <link rel="stylesheet" href="/tenyears/Public/admin/css/font-awesome.css">
    <script src="/tenyears/Public/admin/js/jquery-1.7.2.min.js" type="text/javascript"></script>
  </head>
  <body class=""> 
        <div class="header">
            <h1 class="page-title">权限添加</h1>
        </div>
                <ul class="breadcrumb">
            <li><a href="/tenyears/admin.php/Admin/Auth">主页</a> <span class="divider">/</span></li>
            <li class="active">权限添加</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">权限添加</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form id="tab" action="/tenyears/admin.php/Admin/auth/insert" method="post">
        <input type="hidden" name="condition">
        <label>规则简述</label>
        <input type="text" name="ruletitle" class="input-xlarge">
        <label>规则标识</label>
        <input type="text" name="rulename" class="input-xlarge">
        <label >是否启用</label>        
        <input type="radio" name="status" value="1" class="input-xlarge">开启
        <input type="radio" name="status" value="0" class="input-xlarge">禁用
        <label></label>
         <button type="sbumit" class="btn btn-primary"><i class="icon-save"></i>添加</button>
    </form>
      </div>
  </div>
</div>
  <footer>
      <hr>
      <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
      <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
  </footer>
</div>
</div>
</div>
  </body>
</html>
<script src="/tenyears/Public/admin/js/bootstrap.js"></script>