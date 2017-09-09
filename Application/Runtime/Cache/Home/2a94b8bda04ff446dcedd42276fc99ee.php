<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="Keywords" Content="<?php echo ($web["keywords"]); ?>">
		<meta name="Description" Content="<?php echo ($web["webdesc"]); ?>">
		<title><?php echo ($web["title"]); ?></title>
		<meta name="keyword" content="十年后 10years">
		<meta charset="utf-8">
		<!-- 切换360安全浏览器的内核为webkit -->
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=EDGE">
		<link href="/tenyears/Public/static/img/favicon.ico" rel="shortcut icon">
		<link href="/tenyears/Public/static/css/cc55d1.login.min.css" rel="stylesheet" type="text/css" />
		<script src="/tenyears/Public/static/js/f7d93a.zh_CN.min.js" type="text/javascript"></script>
		<script src='/tenyears/Public/static/js/45441c.login.min.js' type='text/javascript' ></script>
		<script src="/tenyears/Public/static/libs/timeline/compiled/js/storyjs-embed.js" type="text/javascript"></script>
		<script>
			var _hmt = _hmt || [];
			(function() {
			  var hm = document.createElement("script");
			  hm.src = "//hm.baidu.com/hm.js?4369d07da0778f546a77f0364314c80f";
			  var s = document.getElementsByTagName("script")[0]; 
			  s.parentNode.insertBefore(hm, s);
			})();
		</script>
		<style charset="utf-8" class="lazyload">@import "/tenyears/Public/static/libs/timeline/compiled/css/timeline.css";</style>
		<script charset="utf-8" class="lazyload" src="/tenyears/Public/static/libs/timeline/compiled/js/timeline-min.js"></script>
		<script charset="utf-8" class="lazyload" src="/tenyears/Public/static/libs/timeline/compiled/js/locale/zh-cn.js?2.24"></script>
	</head>
	<body>
		<div class="bg"></div>
		<!--导航 -->
		<div id="page-header">
			<div class="transparent-wraper-header"></div>
			<ul id="navigation-bar" class="center-block list-inline">
				<!-- logo -->
				<li class="logo">
					<a href="/tenyears">
						<i class="icon icon-logo-img"></i>
						<i id="logo" class="icon"></i>
					</a>
				</li>
				<!-- 探索 -->
				<li id="head-wall">
					<a href="/tenyears/index.php/Home/find/index" class="ty-link header-item-wall">探索一下</a>
				</li>
				
		    	<li>
		     		<form id="search-dreams-form" class="search-box" action="/search" method="post">
						<input type="text" class="form-control" name='q' placeHolder="搜索梦想、资料、成员" id="search-dreams-keyword">
		                <input type="hidden" name="tabIndex" value="" id="search-dreams-tab-index">
						<a class="search-link" id='search-dreams' href="javascript:void(0)">
							<i class="icon icon-search"></i>
						</a>
					</form>
				</li>
				<li>
					<a id="about-us" href="/tenyears/index.php/Home/about" target="_blank" class="ty-link header-item-aboutus">关于我们</a>
				</li>
				<li>
					<a href="javascript:void(0)" class="ty-link" id="header-login">登录/注册</a>
				</li>
	    	</ul>
		</div>		
		<!-- 版权信息 -->
		<div class="outer" id="content">
			<div id="my-timeline"></div>
			<div class="record">
				<div>©2013 10years.me, All Rights Reserved. Created in China.</div>
				<div>粤ICP备17070589号-1</div>
			</div>
			<div class="photo-by">Photo by chenshiqi</div>
			<div class="tooltip top in hide" id="login-intro-tip">
			    <div class="tooltip-arrow"></div>
			    <div class="tooltip-inner">尝试点击这里</div>
			</div>
		</div>
	
		<!-- 中间部分 -->
		<div id="login-box" class="hide">

			<div class="left">
				<div class="intro-title">十年后，你会成为怎样的人？</div>
				<div class="intro-content">「十年后」是一个关于未来的匿名社交网络。在这里，你可以自由地分享关于未来与梦想的真实想法，并探索其他人的梦想，以及背后的故事。</div>
				<div>
					<a target="_blank" href="/tenyears/index.php/Home/find/index" class="go-link">
						<div>进站探索一下</div>
					</a>
					<span class="or">或者</span>
					<i class="icon icon-go-line"></i>
				</div>
				<!-- 梦想搜索 -->
				<form id="login-search-form" class="login-search-box search-box" action="/tenyears/index.php/Home/search" method="post">
					<input type="text" class="form-control search-input" name='q' placeHolder="搜索你的梦想">
	                <input type="hidden" name="tabIndex" value="0">
					<a id="login-search-link" class="search-link" href="javascript:void(0)"><i class="icon icon-search"></i></a>
				</form>
			</div>
			<!-- 登录注册 -->
			<div class="right">			    
		     	<div class="quickflip-wrapper" id="login-register-box">
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
							        <div class="tooltip fade right in hide" style="top: 220px; left: 330px; display: block;">
    									<div class="tooltip-arrow"></div>
    									<div class="tooltip-inner">邮箱名或密码错误</div>
									</div>
							    </div>
							    <div class="form-group font-small" id="weibologin-regist-div">
									<a id="weibo-login" class="hide ty-link" href="https://api.weibo.com/oauth2/authorize?client_id=xxxxxxxxxx&amp;redirect_uri=http%3A%2F%2Fxxxxxxxxxxxx%2Fcallback.php&amp;response_type=code"><i class="icon weibo-icon"></i>微博登录</a>
								    <a id="regist-right-now" class="quickFlipCta ty-link" href="javascript:void(0)">立即注册<span class="go">>></span></a>
								</div>
							</form>
						</div>
					</div>
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
										<input type="checkbox" id="use-protocal" name="useprotocal" checked="checked" is_ok="ok">
										<label for="use-protocal">我已经认真阅读并同意十年后</label>
									</span>
									<a href="/tenyears/index.php/home/eula" target="_blank" id="our-protocal" class="ty-link">「使用原则」</a>
								</div>
								<div class="form-group" id="regist-btn-div">
							    	<input type="submit" id="regist-btn" class="btn btn-red btn-block" value="开始探索未来">
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
		<!-- 介绍 -->
		<div id="history-1" class="history hide">
			<div class="intro-title">从这里开始</div>
			<div class="intro-address">@Xing的家</div>
			<div class="intro-content">提出「让人们分享未来梦想」的想法。我们已经浪费了太多时间关注琐碎的事情。但是我们可以随时选择自己的人生：创造全新的事物。</div>
		</div>
		<div id="history-2" class="history hide">
			<div class="intro-title">你想成为一个什么样的人</div>
			<div class="intro-address">@枫林</div>
			<div class="intro-content">深夜工作，提出了第一个名字 「十日后」。每个人只有一次二十三岁，我们不想等待未来的到来。</div>
		</div>
		<div id="history-3" class="history hide">
			<div class="intro-title">你在和我开玩笑吗</div>
			<div class="intro-address">@枫林</div>
			<div class="intro-content">首次技术启动会议，但是两个技术人员直接消失。这不重要。重要的是，十年后，那次会议现场的所有人会变成什么样？</div>
		</div>
		<div id="history-4" class="history hide">
			<div class="intro-title">我是希尔瑞斯</div>
			<div class="intro-address">@枫林</div>
			<div class="intro-content">更大的团队聚齐了见面。生活不该是浪费时间于自己不热爱的事物。这次，我们要做一件不一样的事。</div>
		</div>
		<div id="history-5" class="history hide">
			<div class="intro-title">冒险一次</div>
			<div class="intro-address">@北京西路</div>
			<div class="intro-content">杀不死我的只能使我更强，在一个新地方继续原先的旅程。多少个梦想才能击败现实？冒险一次。</div>
		</div>
		<div id="intro-1" class="intro hide">
			<div class="left">
				<div class="intro-title">添加「梦想」</div>
				<div class="intro-content">点击时间轴左边的十字图标即可添加梦想，我们叫「梦想」。只需填入该「梦想」的名称，对该「梦想」的描述，以及预期的实现时间，就可成功创建。</div>
			</div>
			<div class="right">
				<i class="intro-img intro-img-1"></i>
			</div>
		</div>
		<div id="intro-2" class="intro hide">
			<div class="left">
				<div class="intro-title">「记录」想法和图片</div>
				<div class="intro-content">你可以基于每个「梦想」随时记录瞬间的想法，或者通过撰写日志记录更丰富深刻的思考。</div>
			</div>
			<div class="right">
				<i class="intro-img intro-img-2"></i>
			</div>
		</div>
		<div id="intro-3" class="intro hide">
			<div class="left">
				<div class="intro-title">「存录」站内外资料</div>
				<div class="intro-content">你可以将站内的资料（别人发表的日志）以及站外的资料（任何你感兴趣的网页）存录到自己的盒子里，并通过方便的文件夹功能对资料进行分类整理。</div>
			</div>
			<div class="right">
				<i class="intro-img intro-img-3"></i>
			</div>
		</div>
		<div id="intro-4" class="intro hide">
			<div class="left">
				<div class="intro-title">「搜索」感兴趣的主题</div>
				<div class="intro-content">你可以在搜索框中输入关于各个「梦想」主题或领域的关键词，并搜索到相关的最有价值的梦想、以及「十年后」用户。</div>
			</div>
			<div class="right">
				<i class="intro-img intro-img-4"></i>
			</div>
		</div>
		<div id="intro-5" class="intro hide">
			<div class="left">
				<div class="intro-title">「关注」有想法的人并与之互动</div>
				<div class="intro-content">你也可以在「十年后」关注任何有想法、有趣的人！看到的各种有趣动态，也可以来自你主动的搜索动作。</div>
			</div>
			<div class="right">
				<i class="intro-img intro-img-5"></i>
			</div>
		</div>
			
		<!-- 登录注册提示信息 -->
		<input type="hidden" value="" id="redirect">
		<div class="l10n hide" errorRegistNameTooLong="至多16个字符（一个汉字为两个字符）" errorLoginEmailNull="您还没有填写邮箱" errorLoginEmailFormat="邮箱应该这样：example@10years.me" errorLoginPassNull="您还没有填写密码" errorLoginPassFormat="密码太短可不行，至少要6个字符" errorLoginFail="是不是记错邮箱和密码了？" errorRegistEmailNull="您还没有填写邮箱" errorRegistEmailFormat="邮箱应该这样：example@10years.me" errorRegistEmailUsed="您选的邮箱已经被注册了" errorRegistPassNull="您还没有填写密码" errorRegistPassFormat="密码太短可不行，至少要6个字符" errorRegistNameNull="给自己起个昵称" errorRegistNameFormat="请输入中文，英文，数字或下划线" errorRegistProtocal="别忘记同意我们的使用协议" errorRegistFail="出现不可预测原因，注册失败" joinUs="今天你加入我们" errorRegistNameFormat="请输入中文，英文，数字或下划线" errorRegistNameSame="请在此输入昵称，而非密码">
		</div>

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
			            	<div class="modal-footer">
			                	<input type="submit" class="btn btn-primary w-btn confirm-submit-btn" value="发送验证邮件">
			               		 <input type="button" class="btn btn-primary w-btn close-btn hide" value="我知道了" data-dismiss="modal">
			            	</div>
	        			</form>
	      			</div>
	    		</div>
	  		</div>
		</div>

		<div id="l10n_password_dialog" class="hide" errorEmailNull="您还没有填写邮箱" errorEmailFormat="邮箱应该这样：example@10years.me" errorEmailNotExist="该邮箱不存在"></div>
	</body>
</html>