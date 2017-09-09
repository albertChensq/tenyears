<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<!-- 头部 -->
	<meta charset="utf-8">
	<!-- <meta name="renderer" content="webkit"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE">
	
	<meta name="keyword" content="十年后 10years">
	<meta name="Description" Content="基于未来时间轴的梦想社交网络，让年轻人分享想法与思考，基于梦想进行深度交流。人们可以计划规划自己10years后的未来人生，制定关于未来的计划，并寻求别人的建议，细分自己的未来时间表，对别人进行指导。">
	<title>关于我们-十年后</title>
	<link href="/tenyears/Public/static/img/favicon.ico" rel="shortcut icon" />
	<link href="/tenyears/Public/static/css/about.min.css" rel="stylesheet" type="text/css" />
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
	

	<div id="content" class="main auto-resize shadow">
		<ul class="title-box list-inline">
			<li>关于我们</li>
		</ul>
		<div class="nav nav-tabs right-nav">
			<div class="about-us-link list-inline">
				<div class="divider"></div>
				<a href="#aboutus" role="tab" data-toggle="tab">关于「十年后」</a>
			</div>
			<div class="about-us-link list-inline">
				<div class="divider hide"></div>
				<a href="#contactus" role="tab" data-toggle="tab">联系我们</a>
			</div>
		</div>

		<div class="tab-content">
			<div class="tab-pane fade in active" id="aboutus">
				<div class="content-text">
					<div class="text-block-1">
						<div class="text-block-1-title about-us-text-title">十年后，你会成为怎样的人？</div>
						<div class="text-block-1-line1 about-us-text-content">十年后是一个基于未来时间轴的社交网络。在这里，你可以在未来时间轴上创建最多8个盒子，并利用这些盒子：</div>
						<ul>
							<li class="text-block-1-li about-us-text-content">分享你十日后到十年后的人生轨迹</li>
							<li class="text-block-1-li about-us-text-content">分享你关于人生梦想和各个梦想的思考</li>
							<li class="text-block-1-li about-us-text-content">认识有各种想法和梦想的人</li>
							<li class="text-block-1-li about-us-text-content">找到并分享关于各个话题最好的资源</li>
						</ul>
					</div>
					<div class="text-block-2">
						<div class="text-block-2-title about-us-text-title">为什么我们要做「十年后」？</div>
						<div class="text-block-2-content about-us-text-content">也许，大多数人都不愿意承认的残酷现实是，看着现在的自己，你基本上就知道10年后你会成为怎样的人，是不是会成功，会不会改变世界。不愿意承认的原因是，我们还愿意相信“人生是不可控制的”，“永远不知道下一个是什么，生活才会更有趣么”“要等待机会到来”这样的鬼话。</div>
						<div class="text-block-2-content about-us-text-content">从高考填志愿的那一刻开始，到经历整个学生时代、开始工作，我们中的大多数都没有一个属于自己的“想法”，也很少有人会有一个能够支撑自己为之而不断努力的最终的梦想。或者有的时候我们也总是想到，自己几十年以后要改变世界什么的，但从没有真正属于自己的计划。总是觉得自己还年轻，还有很长时间去思考、去开始真正的人生，所以觉得目前的现状没有什么未来性也没关系，“反正生活总归有一天会回到真正的轨道”。</div>
						<div class="text-block-2-content about-us-text-content">但是，你的人生由你的每一个选择所决定，没有一个突变的瞬间，也没有一条所谓的“你终将回到的轨道”。你现在这段生活的一点一滴，你现在所做的每个选择就已经构成了你的人生。人生也只有一次23岁，一次24岁。而我们，每天更多所做的就是完成今天的工作或学习，回到家，刷刷微博，或者看场电影，陪陪朋友。我们浪费了太多时间关注琐碎的事情，琐碎的新闻，琐碎的小说，琐碎的笑话，琐碎的视频，琐碎的知识。我们看着好玩的作品发笑，然后琐碎的人和物。然后等待未来的到来。</div>
						<blockquote class="text-block-2-introduction">
							<div class="text-block-2-introduction-content">大半的人在20岁或30岁上就死了：一过这个年龄，他们只变了自己的影子；以后的生命不过是用来模仿自己，把以前真正有人味儿的时代所说的，所做的，所想的，所喜欢的，一天天地重复，而且重复的方式越来越机械，越来越脱腔走板。</div>
							<div class="text-block-2-introduction-end"> —— 罗曼•罗兰</div>
						</blockquote>
						<div class="text-block-2-content about-us-text-content">不要这样死去。</div>
						<div class="text-block-2-content about-us-text-content">当你意识到，最重要的事情在你自己心里，受你自己的控制，你自己选择自己的人生，激励自己不浪费时间，持续地做正确的事，坚持积累，在计划的指导下思考，这一切都在乎于你自己头脑中的驱动力，你自己头脑里的选择，你的坚持力，你的计划，你的梦想，你的决心。你要下决心打败概率，闻达于天下，你大可以制定秘密计划，然后一步一步规划，持续地去做。没有人在肉体上和精神上会阻止你，一切只在于你自己。所以生活中的波折起伏也因此失去意义，要看到更长远的方向和趋势，真正面对自我思考问题，制定计划。依赖你的头脑。思考。</div>
						<div class="text-block-2-content about-us-text-content">不要害怕。</div>
					</div>
				</div>
			</div>	

			<div class="tab-pane fade" id="contactus">
				<div class="content-text">
					<div class="text-block-1">
						<div class="text-block-1-title about-us-text-title">和我们交流你关于「十年后」的任何想法！</div>
						<div class="text-block-1-line1 about-us-text-content">如果你对于「十年后」有任何的建议，或乐意和我们交流关于未来、人生和社交网路的理念</div>
						<div class="text-block-1-li about-us-text-content">请发邮件至 talk@10years.me</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="l10n hide"></div> -->
	
	



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
<script src='/tenyears/Public/static/js/login.reg.js' type='text/javascript' ></script>
<script>
	$(".right-nav a").click(function(){
		$(".right-nav a").not($(this)).prev().addClass("hide");
		$(this).prev().removeClass("hide");
	})
</script>

</html>