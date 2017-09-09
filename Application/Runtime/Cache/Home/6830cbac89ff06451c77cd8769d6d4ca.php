<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<!-- 头部 -->
	<meta charset="utf-8">
	<!-- <meta name="renderer" content="webkit"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=EDGE">
	
    <meta name="Keywords" Content="梦想,人生,未来,计划,时间轴,迷茫,10years">
    <meta name="Description" Content="基于未来时间轴的梦想社交网络，让年轻人分享想法与思考，基于梦想进行深度交流。人们可以计划规划自己10years后的未来人生，制定关于未来的计划，并寻求别人的建议，细分自己的未来时间表，对别人进行指导。">
    <title>我的未来-十年后</title>
    <link href="/tenyears/Public/static/img/favicon.ico" rel="shortcut icon">
    <link href="/tenyears/Public/static/css/user.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/tenyears/Public/static/css/elastislide.css" />
    <!-- <link rel="stylesheet" type="text/css" href="/tenyears/Public/static/css/custom.css" /> -->
    <link href="/tenyears/Public/static/css/user.my.css" rel="stylesheet" type="text/css" />
    <link href="/tenyears/Public/static/css/daterangepicker-bs3.css" rel="stylesheet" type="text/css">
    <script src="/tenyears/Public/static/js/zh_cn.js" type="text/javascript"></script>
    <script src="/tenyears/Public/static/js/modernizr.custom.17475.js"></script>
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

    <input type="hidden" value="1" id="isOwner">
    <input type="hidden" value="<?php echo ($_SESSION['users']['id']); ?>" name="current-userid" id="curid">
    <input type="hidden" value="<?php echo ($_SESSION['users']['nickname']); ?>" name="current-username" id="curname">
    <input type="hidden" value="<?php echo ($_SESSION['users']['headpic']); ?>" name="current-userpic" id="curpic">
    <input type="hidden" value="<?php echo ($owner["nickname"]); ?>" name="ownername" id="ownername">
    <input type="hidden" value="<?php echo ($followlist); ?>" name="followlist">
    <div id="content" class="owner">
        <input type="hidden" value="<?php echo ($owner["id"]); ?>" id="ownerid">
        <input type="hidden" value="true" id="isUserLogin">
        <!-- <input type="hidden" value="1" id="userAge"> -->
        <div id="top" class="shadow">
            <div class="info-name-wrap">
                <span id="info-name"><?php echo ($owner["nickname"]); ?></span>
                <ul class="count">
                    <li class="dream-count"><span class="count-type">梦想</span></br><span class="total"><?php echo ($dream_num); ?></span></li>
                    <li class="mood-count"><span class="count-type">想法</span></br><span class="total"><?php echo ($dmidea_num); ?></span></li>
                    <li class="pic-count"><span class="count-type">图片</span></br><span class="total"><?php echo ($dmpic_num); ?></span></li>
                    <li class="answer-count"><span class="count-type">钦佩</span></br><span class="total"><?php echo ($admire_num); ?></span></li>
                </ul>
            </div>
            <div id="photo-box">
                <div id="photo" class="user-photo">
                    <img src="/tenyears/Public/static/uploads/<?php echo ($owner["headpic"]); ?>" class="headpic-user">
                </div>
            </div>
            <ul id="info-box" class="list-unstyled">
                <li id="info-follow-wrap">
                    <!-- 判断当前登录用户是否是所属者 -->
                    <?php if(($_SESSION['users']['id']) != $owner["id"]): if(in_array(($owner["id"]), is_array($followlist)?$followlist:explode(',',$followlist))): ?><button class="ru-follow btn-follow hide" user-id="<?php echo ($owner["id"]); ?>">关注</button>
                          <button class="ru-del-follow btn-del-follow" user-id="<?php echo ($owner["id"]); ?>">取消</button>
                        <?php else: ?>
                          <button class="ru-follow btn-follow" user-id="<?php echo ($owner["id"]); ?>">关注</button>
                          <button class="ru-del-follow btn-del-follow hide" user-id="<?php echo ($owner["id"]); ?>">取消</button><?php endif; ?>  
                        <button class="btn-chat" user-id="<?php echo ($owner["id"]); ?>"><i class="icon icon-chat"></i><div class="btn-chat-desc">私信</div></button><?php endif; ?>
                </li>
                <li id="info-city"><i class="icon icon-location"></i><?php echo ($owner["address"]); ?><i class="divider"></i><span id="info-age" class="age-male"><?php echo ($owner["age"]); ?>岁</span>
                </li>
                <li id="info-current"><i class="icon icon-now">现在是</i><span><?php echo ($owner["current_desc"]); ?></span></li>
                <li id="info-future"><i class="icon icon-want">想成为</i><span><?php echo ($owner["future_desc"]); ?></span></li>              
            </ul>
        </div>
        <!-- 所有梦想标题 -->
        <div class="container demo-1">
            <div class="main demo-1" style="width:1000px">
                <ul id="carousel" class="elastislide-list">
                    <?php if(is_array($dreamlist)): foreach($dreamlist as $key=>$dm): ?><li>
                            <a href="/tenyears/index.php/Home/user/index/id/<?php echo ($owner["id"]); ?>/did/<?php echo ($dm["id"]); ?>" did="<?php echo ($dm["id"]); ?>">
                                <!-- <div class="d-title"><?php echo ($dm["title"]); ?></div> -->
                                <img src="/tenyears/Public/static/uploads/<?php echo ($dm["dmpic"]); ?>" width="297px" height="40px">
                            </a>
                        </li><?php endforeach; endif; ?>
                </ul>
            </div>
        </div>

        <div class="slider-content">
            
            <i class="icon icon-arrow-up slider-content-arrow"></i>
            <div class="slider-dream-info">
                <div class="dream-info-title-box">
                    <span class="dream-info-title">「梦想」屋</span>
                    
                    <?php if(($_SESSION['users']['id']) == $owner["id"]): ?><button class="btn btn-blue adddream" id="btn-adddream">筑梦</button><?php endif; ?>    
                </div>
            <?php if(!empty($curdream)): ?><div class="dream-info-detail-box" dream-id="<?php echo ($curdream["id"]); ?>">
                    <ul class="list-unstyled">
                        <li>
                            <span class="dream-info-label">名称</span>
                            <div class="dream-info-value dream-info-name"><?php echo ($curdream["title"]); ?></div>
                        </li>
                        <li>
                            <span class="dream-info-label">描述</span>
                            <div class="dream-info-value dream-info-desc"><?php echo ($curdream["dmdesc"]); ?></div>
                        </li>
                        <li>
                            <span class="dream-info-label">时点</span>
                            <div class="dream-info-value dream-info-deadline"><?php echo (date("Y-m-d",$curdream["deadline"])); ?></div>
                        </li>
                    </ul>
                    <?php if(($_SESSION['users']['id']) == $owner["id"]): ?><div class="dream-info-actions ty-dropdown">
                            <i class="icon icon-dropdown-big"></i>
                            <ul class="list-unstyled">
                                <li class="option dream-info-delete" dreamid="<?php echo ($curdream["id"]); ?>"><i class="icon icon-trash"></i>删除梦想</li>
                            </ul>
                        </div><?php endif; ?>
                </div><?php endif; ?>
            </div>

            <?php if(!empty($curdream)): ?><div class="slider-dream-main">
                <ul class="title-box list-inline" role="tablist">
                    <li class="active tab-pic dream-tab"><a href="#main-pic" role="tab" data-toggle="tab">相册</a></li>
                    <li class="unactive tab-road dream-tab"><a href="#main-mood" role="tab" data-toggle="tab">想法</a></li>
                    <li class="unactive tab-plan dream-tab hide"><a href="#main-timeline" role="tab" data-toggle="tab">计划</a></li>
                </ul>
                <div class="tab-content">

                    <!-- 想法模块 -->
                    <div class="tab-pane main-mood fade" id="main-mood">
                        <?php if(($_SESSION['users']['id']) == $owner["id"]): ?><div class="add-item-box">                                                 
                            <ul class="list-inline">
                                <li><a href="javascript:void(0)" class="add-mood-link"><i class="icon icon-mood"></i><span>分享想法</span></a></li>
                            </ul>
                            <form class="add-item-form" onsubmit="return false">
                                <textarea style="overflow: hidden; word-wrap: break-word; resize: none; height: 53px;" class="form-control add-mood-input" name="content" placeholder="分享你关于梦想的思考！" rows="2"></textarea>
                                <div class="submit-button-wraper">
                                    <input class="btn btn-red addMoodButton" value="记录" type="submit" did="<?php echo ($curdream["id"]); ?>">
                                </div>
                            </form>
                        </div><?php endif; ?> 

                        <!-- 遍历当前梦想的想法 -->
                    <?php if(!empty($moodlist)): if(is_array($moodlist)): foreach($moodlist as $key=>$mood): ?><div class="item item-mood">
                            <div class="item-icon">
                                <i class="icon icon-circle"></i>
                                <i class="icon icon-mood"></i>
                                <!--<i class="item-line"></i>-->
                            </div>
                            <div class="item-content">
                                <i class="icon icon-arrow-left"></i>
                                <div class="item-content-top-wraper">
                                    <div class="item-content-top-box">
                                        <!-- 删除按钮 -->
                                        <?php if(($_SESSION['users']['id']) == $owner["id"]): ?><i class="icon icon-close action-delete mood-delete" mid="<?php echo ($mood["id"]); ?>"></i><?php endif; ?>
                                        
                                        <!-- 想法内容 -->
                                        <div class="item-mood-detail">
                                            <i class="icon icon-leftbracket"></i>
                                            <span class="item-mood-content"><?php echo ($mood["content"]); ?></span>
                                            <i class="icon icon-rightbracket"></i>
                                        </div>
                                        
                                        <!-- 操作栏 -->
                                        <div class="actions-wrap reply-collapse" iid="<?php echo ($mood["id"]); ?>" status="close">
                                            <span class="item-date"><?php echo (date("m-d H:i",$mood["posttime"])); ?></span>
                                            <div class="item-actions">
                                                <!-- 点赞数 -->
                                                <span class="item-action-like item-action" iid="<?php echo ($mood["id"]); ?>" type="moodlike">
                                                    <i class="icon icon-unlike"></i>
                                                    <span class="like-times"><?php echo ($mood["admirenum"]); ?></span>
                                                </span>

                                                <!-- 回复数 -->
                                                <span item-type="mood" item-id="28" class="item-action-reply item-action">
                                                    <i class="icon icon-reply"></i>
                                                    <span class="reply-times"><?php echo ($mood["replynum"]); ?></span>
                                                    <i class="icon icon-arrow-up2 hide"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="reply-mood" class="collapse replys-wrap reply-block">
                                            <textarea style="overflow: hidden; word-wrap: break-word; resize: none; height:30px;width:530px" placeholder="在这里讨论" class="reply-input form-control"></textarea>
                                            <div class="reply-button">
                                                <a href="javascript:void(0)" class="reply-cancel-link ty-link">取消</a>
                                                <button iid="<?php echo ($mood["id"]); ?>" submit-type="mood" disabled="disabled" class="btn btn-green2 ty-button btn-reply">评论</button>
                                            </div>

                                            <!-- 回复遍历 -->
                                            <div class="replys">
                                                

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><?php endforeach; endif; ?>
                    <?php else: ?>
                        <div class="no-road">该梦想还没有记录</div><?php endif; ?>
                    </div>

                    <!-- 相册模块 -->
                    <div class="tab-pane main-pic fade in active" id="main-pic">
                        <div id="masonry" class="container-fluid" style="margin-top:10px;">
                        <?php if(($_SESSION['users']['id']) == $owner["id"]): ?><div class="col-sm-6 col-md-4 pic-box" style="float:left;cursor:pointer">
                                <div class="thumbnail" id="add-pic" did="$curdream.id">
                                    <img src="/tenyears/Public/static/img/addpic.jpg">
                                    <div class="caption" style="text-align:center">
                                        <h4>添加图片</h4>
                                    </div>
                                </div>
                            </div><?php endif; ?>
                        <?php if(is_array($piclist)): foreach($piclist as $key=>$pic): ?><div class="col-sm-6 col-md-4 pic-box" style="float:left">
                            <?php if(($_SESSION['users']['id']) == $owner["id"]): ?><span class="glyphicon glyphicon-remove pic-del" pid="<?php echo ($pic["id"]); ?>"></span><?php endif; ?>
                                <div class="thumbnail">
                                    <img src="/tenyears/Public/static/uploads/<?php echo ($pic["pic"]); ?>">
                                    <div class="caption">
                                        <p><?php echo ($pic["content"]); ?></p>
                                        <span class="item-action-like item-action" pid="<?php echo ($pic["id"]); ?>" style="top:10px;left:145px" type="piclike">
                                            <i class="icon icon-unlike"></i>
                                            <span class="like-times"><?php echo ($pic["admirenum"]); ?></span>
                                        </span>
                                    </div>
                                </div>
                            </div><?php endforeach; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
                <div class="no-info">他还没有创建梦想</div><?php endif; ?>
           
        </div>
        <!-- </div> -->
    </div><!-- 上半部分个人信息终点 -->
    
    <!-- replytpl -->
        <script id="t:replytpl" type="text/html">
            <div class="reply">
                <a href="javascript:void(0)">
                    <img src="/tenyears/Public/static/uploads/<%=headpic%>" class="headpic-reply">
                </a>
                <span class="reply-content">
                    <a class="ty-link" target="_blank" href="/tenyears/index.php/Home/user/index/id/<%=uid%>"><%=nickname%></a>

                <%
                    var curidinput = document.getElementById('curid');
                    var curid = curidinput.value;
                    if(curid == uid){
                %>
                    <i replyid="<%=id%>" style="display:block" class="icon icon-close reply-delete"></i>
                <%}%>
                    <div class="reply-text"><%=content%></div>
                    <div class="reply-actions-wrap">
                        <span class="reply-time"><%=getLocalTime(posttime)%></span>
                        <a href="javascript:void(0)" nickname="<%=nickname%>" userid="<%=uid%>" class="reply-link"><i class="icon icon-reply2"></i><span>回复</span></a>
                    </div>
                </span>
            </div>
        </script>




    <div id="scroll-top" style="display:block"><i class="icon icon-top"></i></div>
    
    <!-- 添加梦想面板 -->
    <div class="modal fade" id="add-dream-dialog" tabindex="-1" role="dialog" aria-labelledby="addDreamDialogLabel" aria-hidden="true">
        <div class="modal-dialog tydialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="icon icon-close-dialog"></i>
                    </button>
                    <h4 class="modal-title">添加「梦想」</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="add-dream-form" onsubmit="return false">
                        <div class="form-group">
                            <label for="name" class="control-label">名称:</label>
                            <div class="input">
                                <input type="text" placeholder="你真正的一个梦想" class="form-control input-count" name="name" id="new-dream-name" min="1" max="24" chartype="2">
                             </div>
                            <div class="count hide">
                                <span class="current-count">0</span>/12
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">描述:</label>
                            <div class="input">
                                <textarea placeholder="任何相关的信息，原因、畅想、秘密计划等" class="form-control input-count" name="description" id="new-dream-desc" min="1" max="240" chartype="2" rows="2"></textarea>
                            </div>
                            <div class="count hide">
                                <span class="current-count">0</span>/120
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="add-deadline" class="control-label">时点:</label>
                            <div class="input" id="new-dream-deadline">
                                <div class="input-group" style="width:250px">
                                    <div class="input-group-addon">
                                        <i class="glyphicon glyphicon-th"></i>
                                    </div>
                                    <input type="text" style="width:200px" class="form-control" value="" id="add-deadline" name="add_deadline">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input id="add-dream-submit-btn" type="button" class="btn btn-primary w-btn" value="确定">
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  

    <!-- 私信发送窗口 -->
    <div class="modal fade" id="sendmsg" tabindex="-1" role="dialog" aria-labelledby="sendmsgDialogLabel" aria-hidden="true">
        <div class="modal-dialog tydialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="icon icon-close-dialog"></i>
                    </button>
                    <h4 class="modal-title">发送信息</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="add-dream-form" onsubmit="return false">
                        <div class="form-group">
                            <label for="description" class="control-label">内容:</label>
                            <div class="input">
                                <textarea placeholder="你要和他说的话" class="form-control input-count" name="description" id="msgcontent" min="1" max="240" chartype="2" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input id="sendmsg-submit-btn" type="button" class="btn btn-primary w-btn" value="确定">
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->





    <!-- 图片发布 -->
    <div class="modal fade" id="postpic" tabindex="0" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="uploadPic-wrap">
                        <div class="tyPicUploader tyPicUploader-right" id="tyPicUploader">
                            <label class="tyPicUploader-tipWraper" for="tyPicUploader-file">
                                <i class="icon tyPicUploader-camera"></i>
                                <div class="tyPicUploader-tip">添加一张照片</div>
                                <img src="/tenyears/Public/static/img/loading.gif" class="tyPicUploader-loading hide">
                            </label>
                            <div class="tyPicUploader-preview hide">
                                <div class="tyPicUploader-picWrap">
                                    <img src="" class="tyPicUploader-pic" style="max-width:500px;max-height:260px" name="pickname">
                                    <i class="icon tyPicUploader-deletePic"></i>
                                </div>
                                <textarea class="form-control" rows="1" placeholder="写下对该照片的介绍" id="picdesc"></textarea>
                            </div>
                            <div class="tyPicUploader-actions">
                                <button class="btn tyPicUploader-cancel" class="close" data-dismiss="modal" aria-hidden="true">取消</button>
                                <div class="tyPicUploader-dropdown tyPicUploader-submit hide">
                                    <button class="btn btn-red" id="btn-postpic" dream-id="<?php echo ($curdream["id"]); ?>">
                                        <span class="btn-text">发布</span>
                                    </button>
                                </div>
                            </div>
                            <iframe name="tyPicUploader-frame" id="tyPicUploader-frame" class="hide"></iframe>
                            <form action="/tenyears/index.php/home/dmpics/upload" class="hide" method="post" enctype="multipart/form-data" target="tyPicUploader-frame" id="upload-form">
                                <input name="postpic" id="tyPicUploader-file" type="file">
                                <input type="submit" value="upload">
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
                    <div class="confirm-text">你确认要删除吗？</div>
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
	
    <script src="/tenyears/Public/static/js/jquery.js" type="text/javascript"></script>
    <script src="/tenyears/Public/static/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/tenyears/Public/static/js/login.reg.js" type="text/javascript"></script>
    <script src="/tenyears/Public/static/js/moment.min.js" type="text/javascript" ></script>
    <script src="/tenyears/Public/static/js/daterangepicker.js" type="text/javascript" ></script>
    <script type="text/javascript" src="/tenyears/Public/static/js/masonry.min.js"></script>
    <!-- 自定义js -->
    <script src="/tenyears/Public/static/js/user.my.js" type="text/javascript"></script> 
    <script type="text/javascript" src="/tenyears/Public/static/js/jquerypp.custom.js"></script>
    <script type="text/javascript" src="/tenyears/Public/static/js/jquery.elastislide.js"></script>
    <script type="text/javascript">           
        $( '#carousel' ).elastislide({
            speed : 1000,
            minItems : 3,
            start : 0,
        });
        $(function(){
            var $container = $('#masonry');
            $container.imagesLoaded( function(){
                $container.masonry({
                    itemSelector : '.pic-box',
                    gutterWidth : 0,
                    isAnimated: true,
                });
            });
        });
    </script>   

</html>