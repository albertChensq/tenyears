<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<!-- 头部 -->
	<meta charset="utf-8">
	<!-- <meta name="renderer" content="webkit"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE">
	
	<meta name="Description" Content="基于未来时间轴的梦想社交网络，让年轻人分享想法与思考，基于梦想进行深度交流。人们可以计划规划自己10years后的未来人生，制定关于未来的计划，并寻求别人的建议，细分自己的未来时间表，对别人进行指导。">
	<meta name="keyword" content="十年后 10years">
	<title>发现-十年后</title>
	<link href="/tenyears/Public/static/img/favicon.ico" rel="shortcut icon">
	<link href="/tenyears/Public/static/css/find.min.css" rel="stylesheet" type="text/css" />
	<script src="/tenyears/Public/static/js/zh_cn.js" type="text/javascript"></script>
	<script src='/tenyears/Public/static/js/baiduTemplate.js' type='text/javascript' ></script>

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
	
	
	<?php if(!empty($_SESSION['users']['id'])): ?><input type="hidden" value="true" id="isLogin">
	<?php else: ?>
		<input type="hidden" value="false" id="isLogin"><?php endif; ?>
	<input type="hidden" value="<?php echo ($_SESSION['users']['id']); ?>" name="current-userid" id="curid">
	<input type="hidden" value="<?php echo ($_SESSION['users']['nickname']); ?>" name="current-username" id="curname">
	<input type="hidden" value="<?php echo ($_SESSION['users']['headpic']); ?>" name="current-userpic" id="curpic">
	<input type="hidden" value="<?php echo ($followlist); ?>" name="followlist">
	<input type="hidden" value="0" name="offset" id="offset">
	<input type="hedden" value="0" name="curtag" id="curtag-id">

	<div id="head" class="main shadow">
		<div id="tags-label-box">
			<span id="tags-label-out">
				<span id="tags-label-wrap" active="hot">
					<span id="hot-tags-label" class="tags-label">热门标签</span>
				</span>
			</span>

		</div>
		<div id="tags-wrap">
			<div id="hot-tags-box">
				<div id="hot-tags-wrap">
					<span id="tag-all" class="tag active" tag-id="0">全部</span>
					<!-- 遍历tags -->
					<?php if(is_array($taglist)): foreach($taglist as $key=>$tag): ?><span class="tag" tag-id="<?php echo ($tag["id"]); ?>"><?php echo ($tag["tagname"]); ?></span><?php endforeach; endif; ?>
				</div>
			</div>
		</div>
		<div id="tags-selected-box">
			<div id="tags-selected-value">全部</div>
		</div>
	</div>

	<div id="content" class="main auto-resize" style="min-height:530px">
		<div class="left shadow" style="min-height:1170px">
			<div>
				<ul class="feeds-menu login title-box" role="tablist">
					<li>最新</li>
				</ul>
			</div>
			<div id="type-menu">
				<span class="type-item active" feed-type="dream" id="getdream">梦想</span>
				<span class="type-item" feed-type="mood" id="getmood">想法</span>
				<span class="type-item" feed-type="moodpic" id="getpic">照片</span>
			</div>
			
			<!-- 动态 -->
			<div id="feeds">
			</div>	<!-- feeds -->

			<div id="no-feeds" class="hide no-info">暂时还没有相关的内容</div>
			<div id="get-more" class="load-more">加载更多</div>
			<!-- end of 动态-->
		</div>
		<!-- dreamlist -->
		<script id="t:dreamlist" type="text/html">

			<div class="item-has-reply" itemid="<%=id%>">
				<!--头像和类型图标区-->
				<a target="_blank" href="/tenyears/index.php/Home/user/index/id/<%=uid%>" class="photo">
					<img src="/tenyears/Public/static/uploads/<%=headpic%>" class="headpic-post">
				</a>
				<span class="icon-wrap">
					<span class="icon-bg">
						<span class="icon icon-dream"></span>
					</span>
				</span>

				<div class="summary-wrap">
					<span class="arrow"></span>
					<div class="summary-text">
						<!--主题-->
						<div class="username-wrap">
							<span class="username">
								<a class="ty-link" target="_blank" href="/tenyears/index.php/Home/user/index/id/<%=uid%>"><%=nickname%></a>
							</span>创建了一个新梦想
						</div>
						<a class="ty-link bold-link" href="/tenyears/index.php/Home/user/index/id/<%=uid%>/did/<%=id%>"><%=title%></a>
						<span class="dream-year"><%=getyear(deadline)%></span>
						<span class="dream-month"><%=getmonth(deadline)%></span>


						<div class="summary">
							<%=dmdesc%>
						</div>
						<!--回复操作栏-->
						<div class="actions-wrap reply-collapse" did="<%=id%>" status="close">
							<span class="time"><%=getLocalTime(posttime)%></span>
							<span class="actions">
								<span class="like-icon-button" did="<%=id%>" type="d"><%=admirenum%></span>
								<span class="reply-icon-button">
									<span class="reply-times"><%=replynum%></span>
								</span>
							</span>
						</div>
						<!--回复隐藏块-->
						<div class="collapse replys-wrap reply-block">
							<textarea style="overflow: hidden; word-wrap: break-word; resize: none; height: 32px;" placeholder="在这里评论" class="reply-input form-control"></textarea>
							<div class="reply-button">
								<a href="javascript:void(0)" class="reply-cancel-link ty-link">取消</a>
								<button class="btn btn-success btn-reply" disabled="disabled" did="<%=id%>" type="d">评论</button>
							</div>
							<!--回复区-->
							<div class="reply-wrap">

							</div>
						</div>
					</div>
				</div> 
			</div>
		</script>
		
		<!-- moodlist -->
		<script id="t:moodlist" type="text/html">
			<div class="item-has-reply" itemid="<%=id%>">
				<!--头像和类型图标区-->
				<a target="_blank" href="/tenyears/index.php/Home/user/index/id/<%=uid%>" class="photo">
					<img src="/tenyears/Public/static/uploads/<%=headpic%>" class="headpic-post">
				</a>
				<span class="icon-wrap">
					<span class="icon-bg">
						<span class="icon icon-mood"></span>
					</span>
				</span>

				<div class="summary-wrap">
					<span class="arrow"></span>
					<div class="summary-text">
						<!--主题-->
						<div class="username-wrap">
							<span class="username">
								<a class="ty-link" target="_blank" href="/tenyears/index.php/Home/user/index/id/<%=uid%>"><%=nickname%></a>
							</span>在梦想「<a  class="ty-link bold-link" href="javascript:void(0)"><%=title%></a>」中记录了想法
						</div>
						<div class="mood-text">
							<%=content%>
						</div>
						<!--回复操作栏-->
						<div class="actions-wrap reply-collapse" iid="<%=id%>" status="close">
							<span class="time"><%=getLocalTime(posttime)%></span>
							<span class="actions">
								<span class="like-icon-button" iid="<%=id%>" type="m"><%=admirenum%></span>
								<span class="reply-icon-button">
									<span class="reply-times"><%=replynum%></span>
								</span>
							</span>
						</div>
						<!--回复隐藏块-->
						<div class="collapse replys-wrap reply-block">
							<textarea style="overflow: hidden; word-wrap: break-word; resize: none; height: 32px;" placeholder="在这里评论" class="reply-input form-control"></textarea>
							<div class="reply-button">
								<a href="javascript:void(0)" class="reply-cancel-link ty-link">取消</a>
								<button class="btn btn-success btn-reply" disabled="disabled" iid="<%=id%>" type="i">评论</button>
							</div>
							<!--回复区-->
							<div class="reply-wrap">
							</div>
						</div>
					</div>
				</div> 
			</div>
		</script>
		
		<!-- piclist -->
		<script id="t:piclist" type="text/html">

			<div class="item-has-reply" itemid="<%=id%>">
				<!--头像和类型图标区-->
				<a target="_blank" href="/tenyears/index.php/Home/user/index/id/<%=uid%>" class="photo">
					<img src="/tenyears/Public/static/uploads/<%=headpic%>" class="headpic-post">
				</a>
				<span class="icon-wrap">
					<span class="icon-bg">
						<span class="icon icon-pic"></span>
					</span>
				</span>

				<div class="summary-wrap">
					<span class="arrow"></span>
					<div class="summary-text">
						<!--主题-->
						<div class="username-wrap">
							<span class="username">
								<a class="ty-link" target="_blank" href="/tenyears/index.php/Home/user/index/id/<%=uid%>"><%=nickname%></a>
							</span>在梦想「<a  class="ty-link bold-link" href="javascript:void(0)"><%=title%></a>」中发布了图片
						</div>
						<div class="summary">
							<img src="/tenyears/Public/static/uploads/<%=pic%>" style="max-height:200px;max-width:400px;"><br>
							<%=content%>
						</div>
						<!--回复操作栏-->
						<div class="actions-wrap reply-collapse" pid="<%=id%>" status="close">
							<span class="time"><%=getLocalTime(posttime)%></span>
							<span class="actions">
								<span class="like-icon-button" pid="<%=id%>" type="p"><%=admirenum%></span>
								<span class="reply-icon-button">
									<span class="reply-times"><%=replynum%></span>
								</span>
							</span>
						</div>
						<!--回复隐藏块-->
						<div class="collapse replys-wrap reply-block">
							<textarea style="overflow: hidden; word-wrap: break-word; resize: none; height: 32px;" placeholder="在这里评论" class="reply-input form-control"></textarea>
							<div class="reply-button">
								<a href="javascript:void(0)" class="reply-cancel-link ty-link">取消</a>
								<button class="btn btn-success btn-reply" disabled="disabled" pid="<%=id%>" type="p">评论</button>
							</div>
							<!--回复区-->
							<div class="reply-wrap">
							</div>
						</div>
					</div>
				</div> 
			</div>
		</script>

		<!-- replytpl -->
		<script id="t:replytpl" type="text/html">
			<div class="reply">
				<a href="javascript:void(0)">
					<img src="/tenyears/Public/static/uploads/<%=headpic%>" class="headpic-reply">
				</a>
				<span class="content">
					<a class="ty-link" target="_blank" href="/tenyears/index.php/Home/user/index/id/<%=uid%>"><%=nickname%></a>

				<%
					var curidinput = document.getElementById('curid');
					var curid = curidinput.value;
					if(curid == uid){
				%>
					<i replyid="<%=id%>" style="display:block" class="icon icon-close reply-delete"></i>
				<%}%>
					<div class="reply-content"><%=content%></div>
					<div class="reply-link-wrap">
						<span class="reply-time"><%=getLocalTime(posttime)%></span>
						<a href="javascript:void(0)" nickname="<%=nickname%>" userid="<%=uid%>" class="reply-link"><i class="icon icon-reply2"></i><span>回复</span></a>
					</div>
				</span>
			</div>
		</script>

		<!-- 右侧梦想家组 -->
		<div class="right shadow">
			<span class="right-title">梦想家</span>
			<div class="h-divider"></div>
			<div id="ru-boxes">

			<!-- 遍历梦想家 -->
			<?php if(is_array($dreamerlist)): foreach($dreamerlist as $key=>$dl): ?><div class="ru-box" ru-id="<?php echo ($dl["id"]); ?>">					
					<div class="ru-photo">
						<img src="/tenyears/Public/static/uploads/<?php echo ($dl["headpic"]); ?>" class="headpic-dreamer">
					</div>
					<a target="_blank" class="ru-name ty-link" href="/tenyears/index.php/home/user/index/id/<?php echo ($dl["id"]); ?>"><?php echo ($dl["nickname"]); ?></a>
					<?php if(in_array(($dl["id"]), is_array($followlist)?$followlist:explode(',',$followlist))): ?><button class="ru-follow btn-follow hide" user-id="<?php echo ($dl["id"]); ?>">关注</button>
						<button class="ru-del-follow btn-del-follow" user-id="<?php echo ($dl["id"]); ?>">取消</button>
					<?php else: ?>
						<button class="ru-follow btn-follow" user-id="<?php echo ($dl["id"]); ?>">关注</button>
						<button class="ru-del-follow btn-del-follow hide" user-id="<?php echo ($dl["id"]); ?>">取消</button><?php endif; ?><br>
					<div><i class="icon icon-current">现在是</i><span class="ru-current"><?php echo ($dl["current_desc"]); ?></span></div>
					<div><i class="icon icon-future">想成为</i><span class="ru-future"><?php echo ($dl["future_desc"]); ?></span></div>
				</div>  <!-- 一个梦想家块结束 --><?php endforeach; endif; ?>	
			</div>
		</div>
	</div>

	<div id="scroll-top" style="display:block"><i class="icon icon-top"></i></div>

    <!-- Confirm Dialog-->

	<div class="modal fade" id="confirm-dialog" tabindex="0" role="dialog" aria-labelledby="confirmDialogLabel" aria-hidden="true">
		<div class="modal-dialog tydialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<i class="icon icon-close-dialog"></i>
					</button>
					<h4 class="modal-title">确认</h4>
				</div>
				<div class="modal-body">
					<div class="confirm-text">您确定要删除该回复吗？</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary w-btn confirm-submit-btn" value="确定">
					</div>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->



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
	
	<script src='/tenyears/Public/static/js/jquery.js' type='text/javascript' ></script>
	<script src='/tenyears/Public/static/js/bootstrap.min.js' type='text/javascript' ></script>
	<!-- 自定义JS事件(页面单击事件，ajax请求处理) find.my.js -->
	<script src='/tenyears/Public/static/js/find.my.js' type='text/javascript' ></script>
	<script src='/tenyears/Public/static/js/login.reg.js' type='text/javascript' ></script>

</html>