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
        <h1 class="page-title">网站配置</h1>
    </div>
        <ul class="breadcrumb">
            <li>
              <a href="/tenyears/admin.php/Admin/Web">主页</a>
              <span class="divider">/</span>
            </li>
            <li class="active">网站配置</li>
        </ul> 
<div class="container-fluid">
<div class="row-fluid">
  <div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">网站配置</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form id="tab" action="/tenyears/admin.php/Admin/web/update" enctype="multipart/form-data" method="post">
         <label>网站名称</label>
          <input type="text" name="webname" value="<?php echo ($web["webname"]); ?>" class="input-xlarge">
        <label>网站标题</label>
          <input type="text" name="title" value="<?php echo ($web["title"]); ?>" class="input-xlarge">
       <!--   <label>网站LOGO</label>
        <img src="/tenyears/Public/static/uploads/<?php echo ($web["logo"]); ?>" width="30" alt="">
        <label>新LOGO</label> -->
        <!-- <input type="file" name="logo" class="input-xlarge"> -->
         <label>关键字</label>
        <textarea value="keywords" rows="3" class="input-xlarge">
            <?php echo ($web["keywords"]); ?>
        </textarea>
        <label>站点描述</label>
        <textarea name=" webdesc"rows="3" class="input-xlarge">
            <?php echo ($web["webdesc"]); ?>
        </textarea>
         <label>网站版权</label>
        <textarea name="copyright" rows="3" class="input-xlarge">
            <?php echo ($web["copyright"]); ?>
        </textarea>
        <label></label>
         <button type="sbumit" class="btn btn-primary"><i class="icon-save"></i> 保存</button>
    </form>
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