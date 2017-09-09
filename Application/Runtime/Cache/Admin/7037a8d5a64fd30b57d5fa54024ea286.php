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
    <link rel="stylesheet" type="text/css" href="/tenyears/Public/admin/css/my.css">
    <link rel="stylesheet" href="/tenyears/Public/admin/css/font-awesome.css">
    <script src="/tenyears/Public/admin/js/jquery-1.7.2.min.js" type="text/javascript"></script>
  </head>
  <body class=""> 
        <div class="header">
            <h1 class="page-title">用户权限</h1>
        </div>
          <ul class="breadcrumb">
            <li><a href="/tenyears/admin.php/Admin/Auth">主页</a> <span class="divider">/</span></li>
            <li class="active">权限列表</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">

      <!-- 搜索分页-->
       <!--  <form class="form-inline form-left" action="/tenyears/admin.php/Admin/Auth/index" method="get">
            <input name="email" class="input-xlarge" placeholder="Search...." id="appendedInputButton" type="text">
            <button class="btn" type="submit"><i class="icon-search"></i> Go</button>
        </form> -->

<!-- 列表分页 -->
<div class="well">
    <table class="table ">
      <thead>
        <tr>
          <th>ID</th>
          <th>规则标识</th>
          <th>规则简述</th>
          <th>状态</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <?php if(is_array($rules)): foreach($rules as $key=>$vo): ?><tr>
          <td><?php echo ($vo['id']); ?></td>
          <td><?php echo ($vo['name']); ?></td>
          <td><?php echo ($vo['title']); ?></td>
          <?php if($vo['status'] == 1): ?><td>开启</td>
            <?php else: ?> <td>关闭</td><?php endif; ?>
          <td>
              <a href="/tenyears/admin.php/Admin/auth/mod/id/<?php echo ($vo["id"]); ?>"><i class="icon-pencil"></i></a>
              <a href="javascript:void(0)" class="deluser" role="button" userid = "<?php echo ($vo["id"]); ?>"><i class="icon-remove"></i></a>
          </td>
        </tr><?php endforeach; endif; ?>
      </tbody>
    </table>
</div>

<!-- 分页样式 -->
<div class="pagination">
  <?php echo ($page); ?>
</div>

<!-- 删除弹窗 -->
<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">删除信息</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>你确定删除该用户吗</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
        <button class="btn btn-danger" id="btn-del" data-dismiss="modal">删除</button>
    </div>
</div>
    <!-- 页脚 -->
    <footer>
      <hr>
      <p class="pull-right">A <a href="http://www.portnine.com/bootstrap-themes" target="_blank">Free Bootstrap Theme</a> by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>

      <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
    </footer>
  </div>
</div>
</div>
   <script src="/tenyears/Public/admin/js/bootstrap.js"></script>
   <script src="/tenyears/Public/admin/js/my.admin.js"></script>  
  </body>
</html>