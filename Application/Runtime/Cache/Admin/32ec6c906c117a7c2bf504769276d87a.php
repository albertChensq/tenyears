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
  <body class=""> 
    <div class="navbar">
        <div class="navbar-inner">
               <!--  <ul class="nav pull-right">
                    
                </ul> -->
                <a class="brand" href="index.html">
                <span class="first">Ten</span> 
                <span class="second">Years</span></a>
        </div>
    </div>
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">用户登录</p>
            <div class="block-body">
                <form action = "/tenyears/admin.php/Admin/Login/prologin" method="post" onsubmit="return false" id = "loginform">
                    <label>邮箱</label>
                    <input type="email" id="email" name="email" class="span12">
                    <label>密码</label>
                    <input type="password" id="userpwd" name="userpwd" class="span12">
                    <label>验证码</label>
                    <input type="text" name="vcode" id="vcode" class="span12">
                    <label ></label>
                    <a href="/tenyears/admin.php/Admin/Login/index"><img src="/tenyears/admin.php/Admin/Login/verify" id="imgcode"/></a>
                    <label for=""></label>
                    <button type="sbumit" id="login"class="btn btn-primary pull-right" >登录</button>
                    <label class="remember-me"><input id ="autologin" type="checkbox"> 自动登录</label>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- 警告弹窗 邮箱或者密码不正确时 -->
<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">警告</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>邮箱或密码不正确</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">确定</button>
    </div>
</div>

<!-- 警告弹窗 验证码不正确时 -->
<div class="modal small hide fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">警告</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>验证码不正确</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">确定</button>
    </div>
</div>

<!-- 警告弹窗 验证码和邮箱都不正确 -->
<div class="modal small hide fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">警告</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>不过了？邮箱和验证码都填错了！！</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">确定</button>
    </div>
</div>

<script src="/tenyears/Public/admin/js/bootstrap.js"></script>
<script src="/tenyears/Public/admin/js/my.login.js"></script>
  </body>
</html>