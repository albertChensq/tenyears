
$("#login").click( function(){
	var email = $("#email").val();
		userpwd = $("#userpwd").val();
		vcode = $("#vcode").val();
		autologin = $("#autologin")[0].checked;
		datas = {email:email,userpwd:userpwd,vcode:vcode,autologin:autologin};
	$.post('/tenyears/admin.php/admin/Login/prologin',datas,function(data){

		// 用户名或者密码输入错误
		if(data.res == 'noexist' && data.vcode == 'ok'){
			$("#myModal").modal('show');
		}

		//验证码错误
		if(data.vcode == 'nook' && data.res == 'exist'){
			$("#myModal1").modal('show');
		}

		// 用户名和密码都输入错误
		if(data.vcode == 'nook' && data.res =='noexist'){
			$("#myModal2").modal('show');
		}
		if(data.res == 'exist' && data.vcode == 'ok'){
			location.href = "/tenyears/admin.php/admin/index/"
		}
	},'json');
	
});

$("#imgcode").click(function() {
	$(this).attr('src' ,'/tenyears/admin.php/admin/login/code?a='+"Math.random()");
});

