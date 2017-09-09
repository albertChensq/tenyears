/*
*本文档为登录与注册页面的所有js操作
*包括弹窗，动态翻转，表单验证
*/


/*
 * jQuery QuickFlip v2.1.1
 * http://jonraasch.com/blog/quickflip-2-jquery-plugin
 *
 * Copyright (c) 2009 Jon Raasch (http://jonraasch.com/)
 * Licensed under the FreeBSD License:
 * http://dev.jonraasch.com/quickflip/docs#licensing
 *
 */
(function(c) {
	var a = false,
		b = null;
	c.quickFlip = {
		wrappers: [],
		opts: [],
		objs: [],
		init: function(d, f) {
			var d = d || {};
			d.closeSpeed = d.closeSpeed || 180;
			d.openSpeed = d.openSpeed || 120;
			d.ctaSelector = d.ctaSelector || ".quickFlipCta";
			d.refresh = d.refresh || a;
			d.easing = d.easing || "swing";
			d.noResize = d.noResize || a;
			d.vertical = d.vertical || a;
			var g = typeof(f) != "undefined" ? c(f) : c(".quickFlip"),
				h = g.children();
			if (g.css("position") == "static") {
				g.css("position", "relative")
			}
			var e = c.quickFlip.wrappers.length;
			h.each(function(i) {
				var k = c(this);
				if (d.ctaSelector) {
					k.find(d.ctaSelector).click(function(j) {
						j.preventDefault();
						c.quickFlip.flip(e)
					})
				}
				if (i) {
					k.hide()
				}
			});
			c.quickFlip.opts.push(d);
			c.quickFlip.objs.push({
				$box: c(g),
				$kids: c(h)
			});
			c.quickFlip.build(e);
			if (!d.noResize) {
				c(window).resize(function() {
					for (var j = 0; j < c.quickFlip.wrappers.length; j++) {
						c.quickFlip.removeFlipDivs(j);
						c.quickFlip.build(j)
					}
				})
			}
		},
		build: function(f, h) {
			c.quickFlip.opts[f].panelWidth = c.quickFlip.opts[f].panelWidth || c.quickFlip.objs[f].$box.width();
			c.quickFlip.opts[f].panelHeight = c.quickFlip.opts[f].panelHeight || c.quickFlip.objs[f].$box.height();
			var e = c.quickFlip.opts[f],
				g = {
					wrapper: c.quickFlip.objs[f].$box,
					index: f,
					half: parseInt((e.vertical ? e.panelHeight : e.panelWidth) / 2),
					panels: [],
					flipDivs: [],
					flipDivCols: [],
					currPanel: h || 0,
					options: e
				};
			c.quickFlip.objs[f].$kids.each(function(k) {
				var i = c(this).css({
					position: "absolute",
					top: 0,
					left: 0,
					margin: 0,
					padding: 0,
					width: e.panelWidth,
					height: e.panelHeight
				});
				g.panels[k] = i;
				var l = d(g, k).hide().appendTo(g.wrapper);
				g.flipDivs[k] = l;
				g.flipDivCols[k] = l.children()
			});
			c.quickFlip.wrappers[f] = g;

			function d(i, p) {
				function o(q, t) {
					var r = c("<div></div>"),
						s = q.panels[t].clone().show();
					r.css(l);
					r.html(s);
					return r
				}
				var n = c("<div></div>"),
					j = i.panels[p].html(),
					l = {
						width: e.vertical ? e.panelWidth : i.half,
						height: e.vertical ? i.half : e.panelHeight,
						position: "absolute",
						overflow: "hidden",
						margin: 0,
						padding: 0
					};
				if (e.vertical) {
					l.left = 0
				} else {
					l.top = 0
				}
				var m = c(o(i, p)).appendTo(n),
					k = c(o(i, p)).appendTo(n);
				if (e.vertical) {
					m.css("bottom", i.half);
					k.css("top", i.half);
					k.children().css({
						top: b,
						bottom: 0
					})
				} else {
					m.css("right", i.half);
					k.css("left", i.half);
					k.children().css({
						right: 0,
						left: "auto"
					})
				}
				return n
			}
		},
		flip: function(g, q, l, r) {
			function h(j, i) {
				j = j || {};
				i = i || {};
				for (opt in j) {
					i[opt] = j[opt]
				}
				return i
			}
			if (typeof g != "number" || typeof c.quickFlip.wrappers[g] == "undefined") {
				return
			}
			var n = c.quickFlip.wrappers[g],
				f = n.currPanel,
				e = (typeof(q) != "undefined" && q != b) ? q : (n.panels.length > f + 1) ? f + 1 : 0;
			n.currPanel = e, l = (typeof(l) != "undefined" && l != b) ? l : 1;
			r = h(r, c.quickFlip.opts[g]);
			n.panels[f].hide();
			if (r.refresh) {
				c.quickFlip.removeFlipDivs(g);
				c.quickFlip.build(g, e);
				n = c.quickFlip.wrappers[g]
			}
			n.flipDivs[f].show();
			var p = 0,
				o = 0,
				d = r.vertical ? {
					height: 0
				} : {
					width: 0
				},
				m = r.vertical ? {
					height: n.half
				} : {
					width: n.half
				};
			n.flipDivCols[f].animate(d, r.closeSpeed, r.easing, function() {
				if (!p) {
					p++
				} else {
					n.flipDivs[e].show();
					n.flipDivCols[e].css(d);
					n.flipDivCols[e].animate(m, r.openSpeed, r.easing, function() {
						if (!o) {
							o++
						} else {
							n.flipDivs[e].hide();
							n.panels[e].show();
							switch (l) {
								case 0:
								case -1:
									c.quickFlip.flip(g, b, -1);
									break;
								case 1:
									break;
								default:
									c.quickFlip.flip(g, b, l - 1);
									break
							}
						}
					})
				}
			})
		},
		removeFlipDivs: function(e) {
			for (var d = 0; d < c.quickFlip.wrappers[e].flipDivs.length; d++) {
				c.quickFlip.wrappers[e].flipDivs[d].remove()
			}
		}
	};
	c.fn.quickFlip = function(d) {
		this.each(function() {
			new c.quickFlip.init(d, this)
		});
		return this
	};
	c.fn.whichQuickFlip = function() {
		function f(j, h) {
			if (!j || !h || !j.length || !h.length || j.length != h.length) {
				return a
			}
			for (var g = 0; g < j.length; g++) {
				if (j[g] !== h[g]) {
					return a
				}
			}
			return true
		}
		var d = b;
		for (var e = 0; e < c.quickFlip.wrappers.length; e++) {
			if (f(this, c(c.quickFlip.wrappers[e].wrapper))) {
				d = e
			}
		}
		return d
	};
	c.fn.quickFlipper = function(d, f, e) {
		this.each(function() {
			var h = c(this),
				g = h.whichQuickFlip();
			if (g == b) {
				h.quickFlip(d);
				g = h.whichQuickFlip()
			}
			c.quickFlip.flip(g, f, e, d)
		})
	}
})(jQuery);

/*
*登录与注册
*弹出与翻转效果
*/
function LoginRegist() {
	var a = {};
	return a.initLoginDialog = function() {
		$("#loginDialog").length > 0 && $(document).ajaxError(function(a, b) {
			403 == b.status ? $("#loginDialog").modal("show") : 404 == b.status && window.open("/404")
		}), $("#header-login").click(function() {
			$("#loginDialog").modal("show")
		})
	}, a.initQuickFlipEffect = function() {
		$(".quickflip-wrapper").quickFlip({
			closeSpeed: 200,
			openSpeed: 150
		})
	}, a.initLogin = function() {
		$("#login-form").submit(function() {
			a.login()
		})
	}, a.initRegist = function() {
		$("#regist-form").submit(function() {
			a.regist()
		})
	}, 

	// 登录ajax
	a.login = function() {
		var account = $.trim($("#login-account").val()),
			password = $.trim($("#login-password").val()),
			autologin = $("#auto-login")[0].checked;
			postdata = {"email":account,"userpwd":password,"autologin":autologin},
			url = "/tenyears/index.php/home/Login/login";
			$.post(url,postdata,function(data){
			// 如果登录成功，跳回登录页面 
			if(data == "true"){
				$("#loginDialog").modal("hide");
				location.reload();
			}else{
				$("#login-btn").next().removeClass("hide");
				$("#login-btn").mouseout(function(){
					$(this).next().addClass("hide");
				})
			}
			
		})

	}, 

	//注册ajax 
	a.regist = function() {
			var email = $.trim($("#regist-email").val()),
				password = $.trim($("#regist-password").val());
				postdata = {"email":email,"userpwd":password};

			$.post('/tenyears/index.php/home/Login/reg',postdata,function(data){
				// 如果注册成功，跳到个人中心
				if(!isNaN(data)){
					$("#loginDialog").modal("hide");
					var url = "/tenyears/index.php/home/user/index/id/" + data;
					location.href = url;
				}else{
					// 注册失败，提示信息
					$("#regist-btn").next().removeClass("hide");
					$("#regist-btn").mouseout(function(){
						$(this).next().addClass("hide");
					});
				}			
			})

	}, a.initForgetPassword = function() {
		$("#fogt-pass").click(function() {
			var a = $("#passwordDialog");
			a.find(".close-btn").addClass("hide"), a.find("#password-form-success").addClass("hide"), a.find(".confirm-submit-btn").removeClass("hide"), a.find("#password-form-email").removeClass("hide"), a.modal("show")
		})
	}, a
}
$(function() {
	$("#back-panel").removeClass("hide"), loginRegist = new LoginRegist, loginRegist.initLoginDialog(), loginRegist.initLogin(), loginRegist.initRegist(), loginRegist.initQuickFlipEffect()
})


// 注册表单邮箱验证
$("#regist-email").blur(function(){
	var email = $.trim($("#regist-email").val()),
	reg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,4}$/;
	if(Number(email) != 0){
		// 如果邮箱格式正确，ajax请求验证邮箱是否已注册
		if(reg.test(email)){
			$.post("/tenyears/index.php/home/Login/unique",{"email":email},function(data){
				// 存在返回"true"
				if(data == "true"){
					$("#regist-email").next().removeClass("hide");
					$("#regist-email").next().children().eq(1).html("邮箱已注册");
				}else{
					$("#regist-email").next().addClass("hide");
					$("#regist-email").attr("is_ok","ok");				
				}
			})

		}else{
			$(this).next().removeClass("hide");
			$(this).attr("is_ok","notok");
		}

		checkRegist();
	}
});
$("#regist-email").focus(function(){
	$(this).next().addClass("hide");
});

// 注册表单密码长度验证
$("#regist-password").blur(function(){
	var registpwd = $.trim($("#regist-password").val());
	if(Number(registpwd) != 0){
		if(registpwd.length < 6){
			$(this).next().removeClass("hide");
			$(this).attr("is_ok","notok");
		}else{
			$(this).next().addClass("hide");
			$(this).attr("is_ok","ok");
		}

		checkRegist();
	}
});
$("#regist-password").focus(function(){
	$(this).next().addClass("hide");
});

// 注册表单确认密码验证
$("#re-password").blur(function(){
	var registpwd = $.trim($("#regist-password").val());
	var repassword = $.trim($("#re-password").val());
	if(Number(repassword) != 0){
		if(repassword != registpwd){
			$(this).next().removeClass("hide");
			$(this).attr("is_ok","notok");
		}else{
			$(this).next().addClass("hide");
			$(this).attr("is_ok","ok");
		}

		checkRegist();
	}
});

$("#re-password").focus(function(){
	$(this).next().addClass("hide");
});

// 用户协议checkbox
$("#use-protocal").click(function(){
	checkRegist();
});

// 检查是否满足所有注册要求，控制提交按钮的可用性
function checkRegist(){
	var protocal = $("#use-protocal")[0].checked;
	var chk_email = $("#regist-email").attr("is_ok");
	var chk_registpwd = $("#regist-password").attr("is_ok");
	var chk_repassword = $("#re-password").attr("is_ok");
	if(protocal && chk_email == "ok" && chk_repassword == "ok" && chk_email == "ok" && chk_registpwd == "ok"){
		$("#regist-btn").removeAttr("disabled");
	}else{
		$("#regist-btn").attr("disabled","disabled");
	}
}

// 退出登录ajax
$("#logout").click(function(){

	$.post("/tenyears/index.php/home/Login/logout",function(data){
		if(data == "ok"){
			location.href = "/tenyears";
		}
	})
});

// 找回密码
$("#foget-pass").click(function(){
	$("#loginDialog").modal("hide");
	$("#passwordDialog").modal("show");
	$(".confirm-submit-btn").click(function(){
		var checkbtn = $(this);
		// ajax请求验证邮箱和昵称是否存在
		var email = $.trim($("#password-form-email").val());
		var nickname = $.trim($("#password-form-nickname").val());
		var url = "/tenyears/index.php/home/userSettings/checkreset";
		$.post(url,{email:email,nickname:nickname},function(data){
			if(data == "true"){
				$("#passwordDialog").modal("hide");
				$("#passwordreset").modal("show");
				// 重置密码
				$(".reset-confirm").click(function(){
					var resetpwd = $.trim($("#password-form-pwd").val());
					var repwd = $.trim($("#password-form-repwd").val());
					var resetsub = $(this);

					// 如果两次密码相同，ajax请求重置
					if(resetpwd == repwd){
						var newpwd = resetpwd;
						$.post("/tenyears/index.php/home/userSettings/resetpwd",{userpwd:newpwd},function(data){
							if(data == "true"){
								$("#passwordreset").modal("hide");
								$("#loginDialog").modal("show");
							}else{
								resetsub.next().children().eq(1).html("重置失败");
								resetsub.next().removeClass("hide");
								resetsub.mouseout(function(){
									$(this).next().addClass("hide");
								});
								return;
							}
						})

					}else{
						resetsub.next().removeClass("hide");
						resetsub.mouseout(function(){
							$(this).next().addClass("hide");
						});
						return;
					}					
				})

			}else{
				checkbtn.next().removeClass("hide");
				checkbtn.mouseout(function(){
					$(this).next().addClass("hide");
				});
				return;
			}
		})

	})
})