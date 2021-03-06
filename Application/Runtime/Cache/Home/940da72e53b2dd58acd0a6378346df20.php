<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<!-- 头部 -->
	<meta charset="utf-8">
	<!-- <meta name="renderer" content="webkit"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE">
	
	<G name="keyword" content="十年后 10years">
	<title>账户设置-十年后</title>
	<link href="/tenyears/Public/static/img/favicon.ico" rel="shortcut icon" />
	<link href="/tenyears/Public/static/css/settings.min.css" rel="stylesheet" type="text/css" />
	<link href="/tenyears/Public/static/libs/farbtastic/farbtastic.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/tenyears/Public/static/css/uploadify.css">
	<script src="/tenyears/Public/static/js/zh_cn.js" type='text/javascript'></script>

</head>
<body>
	<!-- 导航 -->
	<div id="page-header">
		<div class="transparent-wraper-header"></div>
	    
	    <?php if(empty($_SESSION['users']['id'])): ?><!-- 登录前导航栏状态 -->
		
			<ul id="navigation-bar" class="center-block list-inline">
				<li class="logo">
					<a href="#"><i class="icon icon-logo-img"></i><i id="logo" class="icon"></i></a>
				</li>
				<li id="head-wall">
					<a href="/tenyears/index.php/Home/find" class="ty-link header-item-wall">探索一下</a>
				</li>
				<li id="head-qa" class="hide">
					<a href="/tenyears/index.php/home/qa" class="ty-link header-item-qa">问道</a>
				</li>
		    	<li>
		     		<form id="search-dreams-form" class="search-box" action="/tenyears/index.php/Home/search" method="post">
						<input type="text" class="form-control" name='keyword' placeHolder="搜索梦想、成员" id="search-dreams-keyword">
		                <input type="hidden" name="tabIndex" value="" id="search-dreams-tab-index">
						<a class="search-link" id='search-dreams' href="javascript:void(0)"><i class="icon icon-search"></i></a>
					</form>
				</li>
				<li>
					<a id="about-us" href="/tenyears/index.php/Home/about" target="_blank" class="ty-link header-item-aboutus">关于我们</a>
				</li>
				<li>
					<a href="javascript:void(0)" class="ty-link" id="header-login" onclick="LoginRegist()">登录/注册</a>
				</li>
	    	</ul>
	</div>
			<!-- 登录与注册 -->
	<div class="modal fade" id="loginDialog">
		<div class="modal-dialog tydialog quickflip-wrapper" id="login-register-box">
			<div class="modal-content">
	    		<div class="modal-header">
	    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	        			<i class="icon icon-close-dialog"></i>
	    			</button>
	    			<h4 class="modal-title">登录「十年后」</h4>
	    		</div>
	    		<div class="modal-body">
					<div id="front-panel">
						<div id="main-login-form">
							<form class="form-horizontal" role="form" id="login-form" onsubmit="return false">
								<div class="form-group">
					    			<input type="text" class="form-control" id="login-account" name="account" placeholder="请输入邮箱">
								</div>
								<div class="form-group">
					    			<input type="password" typex="password" class="form-control" id="login-password" name="password" placeholder="请输入密码">
								</div>
								<div class="form-group font-small" id="auto-login-div">
									<span class="checkbox-wrap">
										<input type="checkbox" id="auto-login" name="autologin" checked>
										<label class="font-small" for="auto-login">下次自动登录</label>
									</span>
					    			<a id="foget-pass" href="javascript:void(0)" class="ty-link">忘记密码?</a>
								</div>
							    <div class="form-group" id="login-btn-div">
							        <input type="submit" id="login-btn" class="btn btn-blue btn-block" value="登录">
							        <div class="tooltip fade right in hide" style="top: 220px; left: 423px; display: block;">
    									<div class="tooltip-arrow"></div>
    									<div class="tooltip-inner">邮箱名或密码错误</div>
									</div>
							    </div>
							    <div class="form-group font-small" id="weibologin-regist-div">
									<a id="weibo-login" class="ty-link hide" href=""><i class="icon weibo-icon"></i>微博登录</a>
									<a id="regist-right-now" class="quickFlipCta ty-link" href="javascript:void(0)">立即注册</a>
								</div>
							</form>
						</div>
					</div>
	    		</div>
			</div>
		    <div class="modal-content">
		    	<div class="modal-header">
		    		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		    			<i class="icon icon-close-dialog"></i>
		    		</button>
		    		<h4 class="modal-title">注册「十年后」</h4>
		    	</div>
		    	<div class="modal-body">
					<div id="back-panel" class="hide">
						<div id="main-regist-form">
							<form class="form-horizontal" role="form" id="regist-form" class="center-block" onsubmit="return false">
								<div class="form-group">
						    		<input type="text" class="form-control" id="regist-email" name="email" placeholder="邮箱地址">
						    		<div class="tooltip fade right in hide" style="top: 34px; left: 423px; display: block;">
						    			<div class="tooltip-arrow"></div>
						    			<div class="tooltip-inner">邮箱应该这样：example@10years.me</div>
									</div>
								</div>
								<div class="form-group">
						    		<input type="password" typex="password" class="form-control" id="regist-password" name="password" placeholder="密码 6-16个字符">
						    		<div class="tooltip fade right in hide" style="top: 97px; left: 423px; display: block;">
						    			<div class="tooltip-arrow"></div>
    									<div class="tooltip-inner">
        									密码太短可不行，至少要6个字符
										</div>
									</div>
								</div>
								<div class="form-group">
						    		<input type="password" typex="password" class="form-control" id="re-password" name="repassword" placeholder="确认密码 6-16个字符">
						    		<div class="tooltip fade right in hide" style="top: 168.5px; left: 423px; display: block;">
						    			<div class="tooltip-arrow"></div>
	    								<div class="tooltip-inner">
	       									两次密码不一致
										</div>
									</div>
								</div>
								
								<div class="form-group font-small checkbox" id="use-protocal-div">
									<span class="checkbox-wrap">
										<input type="checkbox" id="use-protocal" name="useprotocal">
										<label for="use-protocal">我已经认真阅读并同意十年后</label>
									</span>
									<a href="/tenyears/index.php/home/eula" target="_blank" id="our-protocal" class="ty-link">「使用原则」</a>
								</div>
								<div class="form-group" id="regist-btn-div">
							    	<input type="submit" id="regist-btn" class="btn btn-red btn-block" value="开始探索未来" disabled="disabled">
							    	<div class="tooltip fade right in hide" style="top: 258px; left: 423px; display: block;">
						    			<div class="tooltip-arrow"></div>
						    			<div class="tooltip-inner">注册失败</div>
									</div>
								</div>
								<div id="to-login-div" class="font-small">
							    	<span>已有账号，</span><a id="login-right-now" class="quickFlipCta ty-link" href="javascript:void(0)">直接登录</a>
								</div>
							</form>
						</div>					
					</div>
		    	</div>
			</div>
		</div>
	</div>
	
	<!-- 忘记密码 -->
	<div class="modal fade" id="passwordDialog">
		<div class="modal-dialog tydialog">
			<div class="modal-content">
	    		<div class="modal-header">
	    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	        			<i class="icon icon-close-dialog"></i>
	    			</button>
	    			<h4 class="modal-title">找回密码</h4>
	    		</div>
	    		<div class="modal-body">
		    		<form class="form-horizontal" role="form" id="forget-password-form" onsubmit="return false">
		        		<div class="form-group">
		            		<input type="text" class="form-control" name="email" id="password-form-email" placeHolder="请输入您的注册邮箱">
		            		<span id="password-form-success" class="hide">密码重置链接已发送到你的邮箱，请尽快查看！</span>
		        		</div>
		        		<br>
		        		<div class="form-group">
		            		<input type="text" class="form-control" name="nickname" id="password-form-nickname" placeHolder="请输入您的昵称">
		        		</div>
		        		<div class="modal-footer">
		            		<input type="submit" class="btn btn-primary w-btn confirm-submit-btn" value="确认">
		            		<div class="tooltip fade right in hide" style="top: 10px; left: 300px; display: block;">
								<div class="tooltip-arrow"></div>
								<div class="tooltip-inner">邮箱名或昵称不存在</div>
							</div>
		        		</div>
		    		</form>
		    	</div>
			</div>
		</div>
	</div>

	<!-- 重置密码 -->
	<div class="modal fade" id="passwordreset">
		<div class="modal-dialog tydialog">
			<div class="modal-content" style="width:360px;position:relative;left:110px;">
	    		<div class="modal-header">
	    			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
	        			<i class="icon icon-close-dialog"></i>
	    			</button>
	    			<h4 class="modal-title">重置密码</h4>
	    		</div>
	    		<div class="modal-body">
		    		<form class="form-horizontal" role="form" id="forget-password-form" onsubmit="return false">
		        		<div class="form-group">
		            		<input type="password" class="form-control" name="reset-pwd" id="password-form-pwd" placeHolder="请输入新密码" style="width:298px;height:40px;position:relative;left:25px;margin-top:10px;">
		        		</div>
		        		<br>
		        		<div class="form-group">
		            		<input type="password" class="form-control" name="confirm-pwd" id="password-form-repwd" placeHolder="请输入确认密码" style="width:298px;height:40px;position:relative;left:25px;margin-top:-10px;">
		        		</div>
		        		<div class="modal-footer">
		            		<input type="submit" class="btn btn-primary w-btn reset-confirm" value="确认">
		            		<div class="tooltip fade right in hide" style="top: 10px; left: 300px; display: block;">
								<div class="tooltip-arrow"></div>
								<div class="tooltip-inner">两次密码不一致</div>
							</div>
		        		</div>
		    		</form>
		    	</div>
			</div>
		</div>
	</div>

	<div id="l10n_password_dialog" class="hide" errorEmailNull="您还没有填写邮箱" errorEmailFormat="邮箱应该这样：example@10years.me" errorEmailNotExist="该邮箱不存在"></div>	
	
	<?php else: ?>
			<!-- 登录后导航栏 -->

			<div id="chat-notice-wrapper">
			    <a href="/tenyears/index.php/Home/email"><i class="icon icon-chat-notice"></i></a>
			    <i class="icon icon-chat-new-message hide"></i>
			</div>
			<ul id="navigation-bar" class="center-block list-inline">
				<li class="logo">
					<a href="#"><i class="icon icon-logo-img"></i><i id="logo" class="icon"></i></a>
				</li>
				<li>
					<a href="/tenyears/index.php/Home/wall" class="ty-link header-item-wall">动态</a>
				</li>
			    <li>
			    	<a href="/tenyears/index.php/Home/find" class="ty-link header-item-find">发现</a>
			    </li>
			    <li class="hide">
			    	<a href="/tenyears/index.php/Home/qa" class="ty-link header-item-qa">问道</a>
			    </li>
				<li>
					<a href="/tenyears/index.php/Home/user" class="ty-link header-item-user">我的未来</a>
				</li>
					    	<li>
				 	<form id="search-dreams-form" class="search-box" action="/tenyears/index.php/Home/search" method="post">
						<input class="form-control" name="keyword" placeholder="搜索梦想、成员" id="search-dreams-keyword" type="text">
				        <input name="tabIndex" value="" id="search-dreams-tab-index" type="hidden">
						<a class="search-link" id="search-dreams" href="javascript:void(0)"><i class="icon icon-search"></i></a>
					</form>
				</li>
				<a class="search-link" id="search-dreams" href="javascript:void(0)"></a>
						
				<li id="nav-photo" class="dropdown-link">
					<a class="search-link" id="search-dreams" href="javascript:void(0)"></a>
					<a href="#" class="dropdown-toggle">
			     		<div class="header-photo">
			     			<img src="/tenyears/Public/static/uploads/<?php echo ($_SESSION['users']['headpic']); ?>" class="headpic-nav">
			     		</div>
			        	<i class="icon icon-dropdown"></i>
			 		</a>
			 		<ul class="dropdown-menu">
			 		<?php if(($_SESSION['users']['level']) == "1"): ?><li><a href="/tenyears/admin.php/admin" target="_blank"> <i class="glyphicon glyphicon-dashboard"></i>管理中心</a></li><?php endif; ?>
			    		<li><a href="/tenyears/index.php/Home/UserSettings"><i class="icon icon-setting"></i>帐户设置</a></li>
			    		<li><a href="javascript:void(0)" id="logout"><i class="icon icon-logout"></i>退出登录</a></li>
			    	</ul>
				</li>
			</ul>
		</div><?php endif; ?>

	<!-- 主体 -->
	
	<input type="hidden" value="<?php echo ($sex); ?>" id="usersex">
	<div id="content" class="main auto-resize shadow">
	<!-- 个人设置与修改密码标签页 -->
		<ul class="title-box list-inline">
			<li class="active"><a href="#settings" role="tab" data-toggle="tab">个人档案</a></li>
			<li class="unactive"><a href="#password-edit" role="tab" data-toggle="tab">修改密码</a></li>
		</ul>
  
		<div class="tab-content">
			<!-- 个人设置panel -->
		  	<div class="tab-pane active fade in" id="settings">
		  	
		  		<div  class="form-horizontal ">
				    <div class="form-group">
				        <label for="photo" class="control-label">头像:</label>

				        <div class="Avatar">

				        	<div class="photo">
				        		<img src="/tenyears/Public/static/uploads/<?php echo ($headpic); ?>" class="headpic-setting" id="headpic-setting">
				        	</div>
				        	<div  id="upphoto">
				        		<input type="file"  name="file_upload" id="file_upload">
				        	</div>
				        </div>
				    </div>
				</div>

				<span id="reviewspan">头像预览</span>
				<div id="imgs">
				    <div>
				    	<img width="200"  src="/tenyears/Public/static/uploads/<?php echo ($headpic); ?>">
				    </div>
					
				</div>
				<form class="form-horizontal settings-form" role="form" id="info-form" method="post" action="/tenyears/index.php/Home/UserSettings/infomod">
				    <div class="form-group ">
				        <label for="user-name" class="control-label">昵称:</label>
				        <div class="input">
				        	<input type="hidden" name="headpic" value= '' id="images">
				            <input type="text" value="<?php echo ($nickname); ?>" class="form-control input-count" name="nickname" id="user-name" placeHolder="给自己取个名字" min="0.5" max="8" chartype="2">
				            <div class="tooltip fade right in hide" style="top: 260px; left: 610px; display: block;">
    							<div class="tooltip-arrow"></div>
    							<div class="tooltip-inner">请输入中文，英文，数字或下划线</div>
							</div>
				        </div>
				        <div class="count hide" is-ok="ok">
				            <span class="current-count">0</span>/8
				        </div>
				        <div class="require tooltip fade right in">
				        	<div class="tooltip-arrow"></div>
				        	<div class="tooltip-inner">必填</div>
				        </div>
				    </div>
				    <div class="form-group">
				        <label for="city" class="control-label">地点:</label>
				        <div class="input">
				            <input type="text" value="<?php echo ($address); ?>" class="form-control input-count" name="address" id="city" placeHolder="你所处的地方" min="0" max="10" chartype="2">
				        </div>
				        <div class="count" is-ok="ok">
				            <span class="current-count">0</span>/10
				        </div>
				    </div>
				    <div class="form-group">
				        <label for="age" class="control-label">年龄:</label>
				        <div class="input">
				            <input type="text" value="<?php echo ($age); ?>" class="form-control" name="age" id="age" placeHolder="你多大了">
				        </div>
				        <div class="count" is-ok="ok">
				            <span id="age-count">1-99</span>
				        </div>
				    </div>
				    <div class="form-group">
				        <label class="control-label">性别:</label>
				        <div class="input">
				        	<label for="gender-male" class="radio-inline">
				            	<input type="radio" value="1" name="sex" id="gender-male"> 男
				            </label>
				            <label for="gender-female" class="radio-inline">
				            	<input type="radio" value="0" name="sex" id="gender-female" > 女
				            </label>
				        </div>
				    </div>
				    <div class="form-group">
				        <label for="current-desc" class="control-label">现在是:</label>
				        <div class="input">
				            <input type="text" value="<?php echo ($current_desc); ?>" class="form-control input-count" name="current_desc" id="current-desc" placeHolder="你现在是怎样的人" min="0" max="10" chartype="2">
				        </div>
				        <div class="count" is-ok="ok">
				        	<span class="current-count">0</span>/10
				        </div>
				    </div>
				    <div class="form-group">
				        <label for="future-desc" class="control-label">想成为:</label>
				        <div class="input">
				            <input type="text" value="<?php echo ($future_desc); ?>" class="form-control input-count" name="future_desc" id="future-desc" placeHolder="十年后你想成为怎样的人" min="0" max="10" chartype="2">
				        </div>
				        <div class="count" is-ok="ok">
				        	<span class="current-count">0</span>/10
				        </div>
				    </div>
				    <div class="form-group">
				    	<label class="control-label"></label>
				        <div class="input">
				            <button id="submit-info" class="btn btn-blue">保存</button>
				        </div>
				        <div class="tooltip fade right in hide" style="top: 555px; left: 610px; display: block;">
							<div class="tooltip-arrow"></div>
							<div class="tooltip-inner">修改成功</div>
						</div>
				    </div>
				</form>
			</div>
			
			<!-- 修改密码panel -->
			<div class="tab-pane fade" id="password-edit">

				<form class="form-horizontal" role="form" id="password-form" onsubmit="return false">
					<div class="change-password-success-tip hide"></div>
				    <div class="form-group">
				        <label for="current-password" class="control-label">当前密码:</label>
				        <div class="input">
				            <input type="password" typex="password" class="form-control input-count" name="current-password" id="current-password" min="1" max="999" chartype="1">
				        </div>
				        <div class="tooltip fade right in hide" style="top: 173px; left: 610.5px; display: block;">
    						<div class="tooltip-arrow"></div>
    						<div class="tooltip-inner">密码不正确</div>
						</div>
				    </div>
				    <div class="form-group">
				        <label for="new-password" class="control-label">新密码:</label>
				        <div class="input">
				            <input type="password" typex="password" class="form-control input-count" name="new-password" id="new-password" min="6" max="20" chartype="1">
				        </div>
				        <div class="count hide">
				            <span class="current-count">0</span>/20，至少6个字符</span>
				        </div>
				    </div>
				    <div class="form-group">
				        <label for="confirm-password" class="control-label">确认密码:</label>
				        <div class="input">
				            <input type="password" typex="password" class="form-control" name="confirm-password" id="confirm-password">
				        </div>
				        <div class="tooltip fade right in hide" style="top: 271px; left: 610.5px; display: block;">
							<div class="tooltip-arrow"></div>
    						<div class="tooltip-inner">密码不一致</div>
						</div>
				    </div>
				    <div class="form-group">
				    	<label class="control-label"></label>
				        <div class="input">
				            <button type="submit" id="mod-password" class="btn btn-blue" disabled="disabled">保存</button>
				        </div>
				        <div class="tooltip fade right in hide" style="top: 320px; left: 610px; display: block;">
							<div class="tooltip-arrow"></div>
							<div class="tooltip-inner">修改成功</div>
						</div>
				    </div>
				</form>

			</div>
		</div>
	</div>


	<!-- 页脚 -->
	<div id="page-footer">
		<div class="main">
			<div class="copyright">©2013 10years.me, All Rights Reserved. Created in China.</div>
			<div class="links">
				<a href="/tenyears/index.php/home/about" class="ty-link">关于我们</a>
				<div class="divi"></div>
				<a href="#" class="ty-link">用户协议</a>
				<div class="divi"></div>
				<a href="#" class="ty-link">联系我们</a>
			</div>
		</div>
	</div>
</body>
	<!-- 脚本 -->
	
	<script src="/tenyears/Public/static/js/jquery.js" type='text/javascript' ></script>
	<script src="/tenyears/Public/static/js/bootstrap.min.js" type='text/javascript' ></script>
	<!-- 自定义js事件，相关ajax请求 -->
	<script src="/tenyears/Public/static/js/settings.my.js" type='text/javascript' ></script>
	<script src="/tenyears/Public/static/js/login.reg.js" type='text/javascript' ></script>
	<script src='/tenyears/Public/static/js/jquery.uploadify.min.js'></script>
	<script>
        var img = '';
		$('#file_upload').uploadify({
	        	'swf'      : '/tenyears/Public/static/flash/uploadify.swf',
	        	'uploader' : '<?php echo U("UserSettings/upload");?>',
	        	'buttonText' : '上传头像',
	        	'onUploadSuccess' : function(file, data, response) {
	        	 img += "<img width='200px' src='/tenyears/Public/static/uploads/"+data+"'>";
	            $('#imgs').html(img);
	            $('#images').val(data);
        	}
    	});
    </script>


</html>