/**
*	本文档为个人中心页面所有js事件	
*	包括页面事件控制与相关数据的ajax请求
*/


// 回复区块隐藏与点赞事件阻止冒泡
$(".item-action-like").click(function(event){
	event.stopPropagation();
	var islogin = $("#isLogin").val();
	if(islogin == "false"){
		$("#loginDialog").modal("show");
		return;
	}

	var like = $(this);
	if($(this).attr("type") == "moodlike"){
		var table = "dmideas";
		var id = $(this).attr("iid");		
	}

	if($(this).attr("type") == "piclike"){
		var table = "dmpics";
		var id = $(this).attr("pid");
	}
	$.post("/tenyears/index.php/home/admire/admire",{table:table,id:id},function(data){
		if(data == "add"){
			var anum = like.children().eq(1).html() - 0 + 1;
			like.children().eq(1).html(anum);
		}
		if(data == "del"){
			var anum = like.children().eq(1).html() - 0 - 1;
			like.children().eq(1).html(anum);
		}
	});
});	

// 回复操作栏点击展开回复区
$(".reply-collapse").click(function(){
	$(this).next().collapse("toggle");
	var collapse = $(this);
	var replywrap = $(this).next().children(".replys");

	if(collapse.attr("status") == "close"){
		// 置展开状态open
		collapse.attr("status","open");
		// ajax请求评论信息
		var url = "/tenyears/index.php/home/ideacomments/sec";
		var id = $(this).attr("iid");	
		// 遍历回复信息
		var replyfun = baidu.template("t:replytpl");
		$.post(url,{id:id},function(data){
			if(data){
				for(var i=0;i<data.length;i++){
			 		var res = replyfun(data[i])
			 		replywrap.append(res);
			 	}
			 }else{
			 	return;
			 }
			replylink();
		},"json");
	}else{
		// 修改关闭状态
		collapse.attr("status","close");
		replywrap.empty();
	}
});


// 点击取消后，隐藏评论，并清空textarea内容
$(".reply-cancel-link").click(function(){
	$(this).parent().prev().val("");	
});

// 有用户输入后，激活评论按钮
$(".reply-block .reply-input").keyup(function(){
	if($(this).val()){
		$(this).next().children().eq(1).removeAttr("disabled");
	}else{
		$(this).next().children().eq(1).attr("disabled","disabled");
	}
});


// 添加梦想
$("#btn-adddream").click(function(){
	var d = new Date();
	var date = (d.getMonth() + 1) + "/" + d.getDate() + "/" + d.getFullYear();
	$("#add-deadline").val(date);
	$("#add-dream-dialog").modal("show");
	
	// 初始化日期选择器
	$('#add-deadline').daterangepicker({
		singleDatePicker: true,
		minDate: date
	});
});

$("#add-dream-submit-btn").click(function(){
	var title = $.trim($("#new-dream-name").val()),
		dmdesc = $.trim($("#new-dream-desc").val()),
		deadline = $("#add-deadline").val();
	data = {title:title,dmdesc:dmdesc,deadline:deadline};
	$.post("/tenyears/index.php/home/dreams/add",data,function(data){
		if(data){
			location.reload();
		}
	});

});

// 删除梦想
$(".dream-info-delete").click(function(){
	var did = $(this).attr("dreamid");
	$("#confirm-dialog").modal("show");
		// 确认删除
	$("#confirm-dialog .confirm-submit-btn").click(function(){
		var url = "/tenyears/index.php/home/dreams/del";
			
		$.post(url,{id:did},function(data){
			if(data == "ok"){
				$("#confirm-dialog").modal("hide");
				location.href="/tenyears/index.php/home/user";
			}else{
				$("#confirm-dialog").modal("hide");
				location.href="/tenyears/index.php/home/user";
				return;
			}
		});
	})
})

// 发表新想法
$(".addMoodButton").click(function(){
	var idea = $(".add-mood-input").val();
	var did = $(this).attr("did");	
	if(idea.length > 0){
		var uid = $("#curid").val();
		// ajax提交数据
		var url = "/tenyears/index.php/home/ideas/add";
		var postdata = {uid:uid,content:idea,did:did};
		$.post(url,postdata,function(data){
			if(data == "ok"){
				location.reload();
			}else{
				return;
			}
		})
	}else{
		return;
	}
})

// 想法的删除
$(".mood-delete").click(function(){
	var mid = $(this).attr("mid");
	$("#confirm-dialog").modal("show");
		// 确认删除
	$("#confirm-dialog .confirm-submit-btn").click(function(){
		var url = "/tenyears/index.php/home/ideas/del";
			
		$.post(url,{id:mid},function(data){
			if(data == "ok"){
				$("#confirm-dialog").modal("hide");
				location.reload();
			}else{
				$("#confirm-dialog").modal("hide");
				return;
			}
		});
	})
})

// 发布新图片
$("#add-pic").click(function(){
	$("#postpic").modal("show");
})

$("#tyPicUploader-file").change(function(){
	$("#upload-form").submit();
	$(".tyPicUploader-tipWraper i").addClass("hide");
	$(".tyPicUploader-tipWraper div").addClass("hide");
	$(".tyPicUploader-tipWraper img").removeClass("hide");
	$(".tyPicUploader-tipWraper").attr("onclick","return false");
})

// 图片预览
function uploadcallback(pickname){
	$(".tyPicUploader-tipWraper").addClass("hide");
	$(".tyPicUploader-preview").removeClass("hide");
	$(".tyPicUploader-submit").removeClass("hide");
	$(".tyPicUploader-preview img").attr("src","/tenyears/Public/static/uploads/"+pickname);
	$(".tyPicUploader-preview img").attr("name",pickname);
}

// 叉掉图片，删除本地文件
$(".tyPicUploader-deletePic").click(function(){
	$(".tyPicUploader-tipWraper").removeClass("hide");
	$(".tyPicUploader-preview").addClass("hide");
	$(".tyPicUploader-submit").addClass("hide");
	$(".tyPicUploader-tipWraper i").removeClass("hide");
	$(".tyPicUploader-tipWraper div").removeClass("hide");
	$(".tyPicUploader-tipWraper img").addClass("hide");
	$(".tyPicUploader-tipWraper").removeAttr("onclick");
	delpic();
});

// 取消按钮，删除本地文件
$(".tyPicUploader-cancel").click(function(){
	$(".tyPicUploader-tipWraper").removeClass("hide");
	$(".tyPicUploader-preview").addClass("hide");
	$(".tyPicUploader-submit").addClass("hide");
	$(".tyPicUploader-tipWraper i").removeClass("hide");
	$(".tyPicUploader-tipWraper div").removeClass("hide");
	$(".tyPicUploader-tipWraper img").addClass("hide");
	$(".tyPicUploader-tipWraper").removeAttr("onclick");
	delpic();
});

// 删除本地图片文件
function delpic(){
	var picname = $(".tyPicUploader-preview img").attr("name");
	$.post("/tenyears/index.php/home/dmpics/cancelpic",{picname:picname},function(data){
	});
};

// 图片确认发布
$("#btn-postpic").click(function(){
	var picdesc = $.trim($("#picdesc").val());
	var pickname = $(".tyPicUploader-preview img").attr("name");
	var did = $(this).attr("dream-id");	
	if(pickname.length > 0){
		var uid = $("#curid").val();
		// ajax提交数据
		var url = "/tenyears/index.php/home/dmpics/add";
		var postdata = {uid:uid,content:picdesc,did:did,pic:pickname};
		$.post(url,postdata,function(data){
			if(data == "true"){
				location.reload();
			}else{
				return;
			}
		})
	}else{
		return;
	}

	$(".tyPicUploader-tipWraper").removeClass("hide");
	$(".tyPicUploader-preview").addClass("hide");
	$(".tyPicUploader-submit").addClass("hide");
	$(".tyPicUploader-tipWraper i").removeClass("hide");
	$(".tyPicUploader-tipWraper div").removeClass("hide");
	$(".tyPicUploader-tipWraper img").addClass("hide");
	$(".tyPicUploader-tipWraper").removeAttr("onclick");
	$("#postpic").modal("hide");
})

// 图片删除
$(".pic-del").click(function(){
	var pid = $(this).attr("pid");
	var url = "/tenyears/index.php/home/dmpics/del";
	$("#confirm-dialog").modal("show");
	$(".confirm-submit-btn").click(function(){
		$.post(url,{id:pid},function(data){
			if(data == "true"){
				$("#confirm-dialog").modal("hide");
				location.reload();
			}
			else{
				$("#confirm-dialog").modal("hide");
				return;
			}
		});		
	})
})



// 加关注与取消关注
$(".btn-follow").click(function(){

	var islogin = $("#isLogin").val();
	if(islogin == "false"){
		$("#loginDialog").modal("show");
		return;
	}

	var followed = $(this).attr("user-id");
	var curbtn = $(this);
	$.post("/tenyears/index.php/home/user/follow",{followed:followed},function(data){
		if(data){
			curbtn.addClass("hide");
			curbtn.next().removeClass("hide");
		}else{
			return;
		}
	});
});

$(".btn-del-follow").click(function(){
	var followed = $(this).attr("user-id");
	var curbtn = $(this);
	$.post("/tenyears/index.php/home/user/unfollowed",{followed:followed},function(data){
		if(data){
			curbtn.addClass("hide");
			curbtn.prev().removeClass("hide");
		}else{
			return;
		}
	});
});

// 发送私信
$(".btn-chat").click(function(){
	var islogin = $("#isLogin").val();
	if(islogin == "false"){
		$("#loginDialog").modal("show");
		return;
	}




})

// 添加评论
$(".btn-reply").click(function(){

	var islogin = $("#isLogin").val();
	if(islogin == "false"){
		$("#loginDialog").modal("show");
		return;
	}

	var replywrap = $(this).parent().next();

	var url = "/tenyears/index.php/home/ideacomments/add";
	var id = $(this).attr("iid");	

	var content = $(this).parent().prev().val();
	var replyfun = baidu.template("t:replytpl");
	$.post(url,{id:id,content:content},function(data){
		if(data){
			var res = replyfun(data[0])
		 	replywrap.prepend(res);
		}else{
			return;
		}
		replylink();
	},"json");
});


function replylink(){
	/* 删除回复操作 */
	//弹出确认框 
	$(".reply-delete").click(function(){
		var thisreply = $(this).closest(".reply");
		$("#confirm-dialog").modal("show");
		var reply_id = $(this).attr("replyid");
		// 确认删除
		$("#confirm-dialog .confirm-submit-btn").click(function(){
			// ajax请求删除该回复，删除页面回复节点
			var url = "/tenyears/index.php/home/ideacomments/del";
			
			$.post(url,{id:reply_id},function(data){
				if(data == "true"){
					thisreply.remove();
					$("#confirm-dialog").modal("hide");
				}else{
					return;
				}
			})

		});
	});

	// 回复评论
	$(".reply-link").click(function(){
		var replynickname = $(this).attr("nickname");
		$(this).closest(".replys").siblings("textarea").val("回复"+replynickname+"：");
	})

}

$(".pic-box").mouseenter(function(){
	$(this).children(".pic-del").fadeIn();
})
$(".pic-box").mouseleave(function(){
	$(this).children(".pic-del").fadeOut();
})

// 锚点处理
$("#scroll-top").click(function(){
	$('html,body').animate({scrollTop:'0px'}, 500);
})

// 发送私信
$(".btn-chat").click(function(){

	var islogin = $("#isLogin").val();
	if(islogin == "false"){
		$("#loginDialog").modal("show");
		return;
	}

	$("#sendmsg").modal("show");
	var nickname = $("#ownername").val();
	var msgarea = $("#msgcontent");
	var url = "/tenyears/index.php/home/email/sendadd";

	$("#sendmsg-submit-btn").click(function(){
		if(msgarea.val().length > 0){
			$.post(url,{nickname:nickname,sendcontent:msgarea.val()},function(data){
				if(data == "true"){
					location.href = "/tenyears/index.php/home/email";
				}else{
					$("#sendmsg").modal("hide");
					return;
				}
			})
		}else{
			return;
		}		
	})

})





// 格式化时间戳
function getLocalTime(nS) { 
	return new Date(parseInt(nS) * 1000).toLocaleString().replace(/年|月/g, "-").replace(/日/g, " "); 
};

function getyear(nS){
	var d = new Date();
	return d.getFullYear(nS);
};

function getmonth(nS){
	var d = new Date();
	var m = d.getMonth(nS) + 1;
	if (String(m).length < 2) {
		m = '0' + m;
	};
	return m;
};


