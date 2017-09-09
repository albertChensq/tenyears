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
            <h1 class="page-title">用户添加</h1>
        </div>
                <ul class="breadcrumb">
            <li><a href="/tenyears/admin.php/Admin/User">主页</a> <span class="divider">/</span></li>
            <li class="active">用户添加</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">用户信息</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form id="tab" action="/tenyears/admin.php/Admin/user/insert" method="post">
        <label>所属用户组</label>
        <select name="level"  class="input-xlarge">
          <option value="">--请选择--</option>
          <option value="0">普通用户</option>
          <option value="1">管理员</option>
        </select>
        <label>用户昵称</label>
        <input type="text" name="nickname" class="input-xlarge">
        <label>邮箱</label>
        <input type="email" name="email" class="input-xlarge">
        <label>密码</label>
        <input type="password" name="userpwd" class="input-xlarge">
        <label></label>
         <button type="sbumit" class="btn btn-primary"><i class="icon-save"></i> 保存</button>
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