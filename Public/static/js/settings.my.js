/**
*	本文档为个人信息修改页面所有js事件	
*	包括页面事件控制、表单验证、相关数据的ajax请求
*/

// 标签切换事件
$(".title-box li:eq(0)").click(function(){
	$(this).removeClass("unactive");
	$(this).siblings().removeClass("active").addClass("unactive");
});
$(".title-box li:eq(1)").click(function(){
	$(this).removeClass("unactive");
	$(this).siblings().addClass("unactive");
});

//个人设置表单验证
// 昵称(不能为空)

$("#user-name").keyup(function(){
	var username = $.trim($(this).val());
	$(this).parent().next().removeClass("hide");
	$(this).parent().next().children().html(username.length);
	if(username.length > 8){
		$(this).parent().next().children().css("color","red");
		$(this).parent().next().attr("is-ok","notok");
	}else if(username.length == 0){
		$(this).next().removeClass("hide");
		$(this).parent().next().attr("is-ok","notok");
	}else{
		$(this).parent().next().children().css("color","#33A991");
		$(this).next().addClass("hide");
		$(this).parent().next().attr("is-ok","ok");
	}
	checkInfo();
});

//地点
$("#city").keyup(function(){
	var city = $.trim($(this).val());
	$(this).parent().next().children().html(city.length);
	if(city.length > 10){
		$(this).parent().next().children().css("color","red");
		$(this).parent().next().attr("is-ok","notok");
	}else{
		$(this).parent().next().children().css("color","#33A991");
		$(this).parent().next().attr("is-ok","ok");
	}
	checkInfo();
});


// 年龄1-99
$("#age").keyup(function(){
	var age = $.trim($(this).val());
	if(age.length > 0){
		if(age > 99 || age < 1){
			$(this).parent().next().css("color","red");
			$(this).parent().next().attr("is-ok","notok");
		}else{
			$(this).parent().next().css("color","#A9A8A8");
			$(this).parent().next().attr("is-ok","ok");
		}
	}
	checkInfo();
}); 

// 现在描述
$("#current-desc").keyup(function(){
	var current = $.trim($(this).val());
	$(this).parent().next().children().html(current.length);
	if(current.length > 10){
		$(this).parent().next().children().css("color","red");
		$(this).parent().next().attr("is-ok","notok");
	}else{
		$(this).parent().next().children().css("color","#33A991");
		$(this).parent().next().attr("is-ok","ok");
	}
	checkInfo();
});

// 将来描述
$("#future-desc").keyup(function(){
	var future = $.trim($(this).val());
	$(this).parent().next().children().html(future.length);
	if(future.length > 10){
		$(this).parent().next().children().css("color","red");
		$(this).parent().next().attr("is-ok","notok");
	}else{
		$(this).parent().next().children().css("color","#33A991");
		$(this).parent().next().attr("is-ok","ok");
	}
	checkInfo();
});

// 检查是否满足所有注册要求，控制提交按钮的可用性
function checkInfo(){
	var chk_nickname = $("#user-name").parent().next().attr("is-ok");
	var chk_age = $("#age").parent().next().attr("is-ok");
	var chk_addr = $("#city").parent().next().attr("is-ok");
	var chk_current = $("#current-desc").parent().next().attr("is-ok");
	var chk_future = $("#future-desc").parent().next().attr("is-ok");
	if(chk_nickname == "ok" && chk_age == "ok" && chk_addr == "ok" && chk_current == "ok" && chk_future == "ok"){
		$("#submit-info").removeAttr("disabled");
	}else{
		$("#submit-info").attr("disabled","disabled");
	}
};


// 密码修改表单验证
$("#current-password").keyup(function(){
	var curpwd = $.trim($(this).val());
	if(curpwd.length != 0 && $("#new-password").attr("is-ok") == "ok"){
		$("#mod-password").removeAttr("disabled");
	}else{
		$("#mod-password").attr("disabled","disabled");
	}
});

// 新密码长度验证
$("#new-password").focus(function(){
	$(this).parent().next().removeClass("hide");
	$(this).parent().next().children().css("color","red");
	$("#new-password").keyup(function(){
		var newpwd = $.trim($(this).val());
		var curpwd = $.trim($("#current-password").val());
		$(this).parent().next().children().html(newpwd.length)
		if(curpwd.length != 0){
			if(newpwd.length > 5){
				$(this).parent().next().children().css("color","#33A991");
				$(this).attr("is-ok","ok");
				$("#mod-password").removeAttr("disabled")
			}else{
				$(this).parent().next().children().css("color","red");
				$(this).attr("is-ok","notok");
				$("#mod-password").attr("disabled","disabled");
			}
		}
	})
});

$("#confirm-password").focus(function(){
	$(this).parent().next().addClass("hide");
});

// 提交修改密码
$("#mod-password").click(function(){
	// 验证确认密码
	var conpwd = $.trim($("#confirm-password").val());
	var newpwd = $.trim($("#new-password").val());
	if(conpwd != newpwd){
		$("#confirm-password").parent().next().removeClass("hide");
		return;
	}else{
		// ajax请求修改密码
		var userpwd = $.trim($("#current-password").val());
		data = {"userpwd":userpwd,"newpwd":newpwd};
		$.post("./UserSettings/pwdmod",data,function(data){
			if(data == "error"){
				$("#current-password").parent().next().removeClass("hide");
			}
			if(data == "true"){
				$("#mod-password").parent().next().removeClass("hide");
			}else{
				$("#mod-password").parent().next().removeClass("hide");
				$("#mod-password").parent().next().children().eq(1).html("修改失败")
			}
		})
	}
});

$("#mod-password").mouseout(function(){
	$(this).parent().next().addClass("hide");
});

//修改性别
$(function(){
	sex = $("#usersex").val();
	if(sex == 1){
		$("#gender-male").attr("checked","checked");
	}else{
		$("#gender-female").attr("checked","checked");
	}

});
