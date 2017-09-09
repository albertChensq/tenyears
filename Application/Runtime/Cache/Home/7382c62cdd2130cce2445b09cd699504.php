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
	<link href="/tenyears/Public/static/css/email.min.css" rel="stylesheet" type="text/css" />
	<script src="/tenyears/Public/static/js/zh_cn.js" type="text/javascript"></script>

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
	
	<div style="min-height: 551px;" id="content" class="main auto-resize shadow">

		<!-- 导航信息 -->
		<ul class="title-box list-inline " role="tablist">
			<li class="notification-type active" id="notification-message" type="message">
				<a href="#permessage" role="tab" data-toggle="tab">收信箱</a>
				<i count="0" class="hide icon icon-redPoint"></i>
			</li>
			<li class="unactive notification-type" id="notification-message" type="friend">
				<a href="#publicmessage" role="tab" data-toggle="tab">发信箱</a>
				<i count="0" class=" hide icon icon-redPoint"></i>
			</li>
			<li class="unactive notification-type " id="notification-question" type="question">
				<a href="#sendmessage" role="tab" data-toggle="tab">公共信息</a>
				<i count="0" class=" hide icon icon-redPoint"></i>
			</li>
		</ul>

		<!-- 内容信息 -->
		<div class=" tab-content">
			<!-- 收信箱 -->
			<div class="tab-pane active" id="permessage">
				<div id="notification-list" >
			        <ul class="notification-list " id="notification-list-question">
			        	<?php if(is_array($revemails)): foreach($revemails as $key=>$vo): ?><li viewed="true" time="2014-08-07 09:43:30" operationtype="REPLY" itemtype="QUESTION" itemid="473" class="notification">
					       		<div class="notification-img"><img class="message-img" src="/tenyears/Public/static/uploads/<?php echo ($vo["headpic"]); ?>" alt="">
					       		</div>
						        	<div class="notification-detail">
							        	<div class="notification-description">
							        		<a href="/user/7668" class="from-username ty-link"><?php echo ($vo["nickname"]); ?></a> 对你说
							        	「<a href="javascript:void(0)" class="ty-link notification-content"><?php echo ($vo["content"]); ?></a>」
							        	</div>
						        		<div class="notification-date">
						        			<?php echo (date("Y-m-d H:i:s",$vo["posttime"])); ?>
						        			<a href="javascript:void(0)" emailid ="<?php echo ($vo["suid"]); ?>" class="email-reply"><i class="icon icon-reply2"></i><span>回复</span></a>
						        			<a href="javascript:void(0)" emailid="<?php echo ($vo["id"]); ?>" class="email-del" type="rev-email"><i class="icon icon-close1"></i><span>删除</span></a>
						        		</div>
						        		
						        	</div>
						        	<?php if(($vo["status"]) == "0"): ?><span id="cancel-status-btn" class="notification-tip" emailid="<?php echo ($vo["id"]); ?>">点击标为已读</span><?php endif; ?>
					        		
					        	<div>
					        		<span class=" notification-empty hide" id="notification-friend-empty" >对您的私人信息将出现在这里</span>
					        	</div>
				        	</li><?php endforeach; endif; ?>
			        <!-- </foreach> -->
			        </ul>

			    </div>

			</div> <!-- end 收信箱 -->
			
			<!-- 发信箱 -->
			<div class="tab-pane" id="publicmessage">
					<button class="btn btn-question" id="email-send" type="button">
                		<span class="email-label">发信息</span>
            		</button>
				<div id="notification-list" >
			        <ul class="notification-list " id="notification-list-question">
			        <?php if(is_array($sendemails)): foreach($sendemails as $key=>$vo): ?><li viewed="true" time="2014-08-07 09:43:30" operationtype="REPLY" itemtype="QUESTION" itemid="473" class="notification">
				       		<div class="notification-img">
				       			<img class="message-img" src="/tenyears/Public/static/uploads/<?php echo ($headpic); ?>">
				       		</div>
				        	<div class="notification-detail">
					        	<div class="notification-description">
					        	你对<a href="/user/7668" class="from-username ty-link"><?php echo ($vo["nickname"]); ?></a> 
					        		说
					        	「<a href="javascript:void(0)" class="ty-link notification-content"><?php echo ($vo["content"]); ?></a>」
					        	</div>
				        		<div class="notification-date">
				        			<?php echo (date("Y-m-d H:i:s",$vo["posttime"])); ?>
				        			<a href="javascript:void(0)" emailid="<?php echo ($vo["id"]); ?>" class="email-del" type="send-email"><i class="icon icon-close1"></i><span>删除</span></a>
					        	</div>
				        	</div>
				        	<div>
				        		<span class=" notification-empty hide" id="notification-friend-empty" >对您的私人信息将出现在这里</span>
				        	</div>
			        	</li><?php endforeach; endif; ?>
			        </ul>
			    </div>
			</div>   <!-- end  发信箱 -->

			<!--公共信息 -->
			<div class="tab-pane" id="sendmessage">
				<div id="notification-list" >
			        <ul class="notification-list " id="notification-list-question">
			        	<?php if(is_array($messages)): foreach($messages as $key=>$vo): ?><li viewed="true"  class="notification">
				       		<div class="notification-img">
				       			<img class="message-img" src="/tenyears/Public/static/uploads/headpic.jpg" alt="">
				       		</div>
				        	<div class="notification-detail">
					        	<div class="notification-description">
					       			<a href="javascript:void(0)" class="from-username ty-link">管理员</a> 
					        		给你发送了一条系统信息
					        	「<a id="message-content"href="javascript:void(0)" class="ty-link notification-content"><?php echo ($vo["content"]); ?></a>」
					        	</div>
				        		<div class="notification-date">
				        			<?php echo (date("Y-m-d H:i:s",$vo["posttime"])); ?>
				        		</div>
				        	</div>
				        	<span id="sys-message-already" class="notification-tip">点击标为已读</span>
				        	<div>
				        		<span class=" notification-empty hide" id="notification-friend-empty" >对您的私人信息将出现在这里</span>
				        	</div>
			        	</li><?php endforeach; endif; ?>
			        </ul>
			    </div>
			</div>   <!-- end  公共信息 -->
		</div>   <!--  end tab-content  -->
	</div>  <!-- main auto-resize shadow -->

	<!-- 回复弹窗 -->
    <div class="modal fade" id="add-reply-dialog" tabindex="-1" role="dialog" aria-labelledby="addDreamDialogLabel" aria-hidden="true">
        <div class="modal-dialog tydialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="icon icon-close-dialog"></i>
                    </button>
                    <h4 class="modal-title">「回复」</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="add-dream-form" onsubmit="return false">
                        <div class="form-group">
                            <label for="description" class="control-label-email">内容:</label>
                            <div class="input">
                                <textarea id="revcontent" class="form-control input-count" name="description" cols="40"></textarea>
                            </div>
                            <div class="count hide">
                                <span class="current-count">0</span>/120
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input id="email-btn" type="button" class="btn btn-primary w-btn" value="确定">
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- 删除弹窗-->
	<div class="modal fade" id="confirm-email-del" tabindex="0" role="dialog" aria-labelledby="confirmDialogLabel" aria-hidden="true">
		<div class="modal-dialog tydialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<i class="icon icon-close-dialog"></i>
					</button>
					<h4 class="modal-title">确认</h4>
				</div>
				<div class="modal-body">
					<div class="confirm-text">您确定要删除该信息吗？</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary w-btn confirm-submit-btn" id="email-del-btn"value="确定">
					</div>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- 发信箱弹窗 -->
    <div class="modal fade" id="send-email-dialog" tabindex="-1" role="dialog" aria-labelledby="addDreamDialogLabel" aria-hidden="true">
        <div class="modal-dialog tydialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="icon icon-close-dialog"></i>
                    </button>
                    <h4 class="modal-title">「发信息」</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="add-dream-form" onsubmit="return false">
                        <div class="form-group">
                            <label for="name" class="control-label-email">昵称:</label>
                            <div class="input">
                                <input type="text" placeholder="昵称" class="form-control input-count" id="nickname" min="1" max="24" chartype="2" >
                               <div class="tooltip fade right in hide" style="top: 27px; left:270px; display: block;">
									<div class="tooltip-arrow"></div>
    								<div class="tooltip-inner">昵称不存在</div>
								</div>
								 <div id="sendmyself" class="tooltip fade right in hide" style="top: 27px; left:270px; display: block;">
									<div class="tooltip-arrow"></div>
    								<div class="tooltip-inner">不能给自己发信息</div>
								</div>
                             </div>
                            <div class="count hide">
                                <span class="current-count">0</span>/12
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label-email">内容:</label>
                            <div class="input">
                                <textarea id = "sendcontent" class="form-control placeholder="发送内容" input-count" name="description" cols="40"></textarea>
                            </div>
                            <div class="count hide">
                                <span class="current-count">0</span>/120
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input id="send-email-btn" type="button" disabled="disabled" class="btn btn-primary w-btn" value="确定">
                        </div>
                    </form>
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
	<script src='/tenyears/Public/static/js/login.reg.js' type='text/javascript' ></script>
	<script src='/tenyears/Public/static/js/email.add.js' type='text/javascript' ></script>
	<script src='/tenyears/Public/static/js/email.del.js' type='text/javascript' ></script>
	<script src='/tenyears/Public/static/js/email.send.js' type='text/javascript' ></script>
	<script src='/tenyears/Public/static/js/email.mod.js' type='text/javascript' ></script>
	<script src='/tenyears/Public/static/js/email.message.js' type='text/javascript' ></script>

</html>