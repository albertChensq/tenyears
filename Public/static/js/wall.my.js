/**
*	本文档为动态页面所有js事件	
*	包括页面事件控制与相关数据的ajax请求
*/
$(function(){
	// 检查是否登录用户
	var islogin = $("#isLogin").val();
	if(islogin == "false"){
		location.href = "/tenyears";
	}	
	// 默认加载梦想
	getdream();
})

$("#get-more").click(function(){
	if($("#getdream").hasClass("active")){
		getdream();		
	}
	if($("#getmood").hasClass("active")){
		getmood();		
	}
	if($("#getpic").hasClass("active")){
		getpic();		
	}

})

// 梦想tab单击事件
$("#getdream").click(function(){
	$(this).siblings().removeClass("active");
	$(this).addClass("active");
	$("#feeds").empty();
	$("#offset").val('0');
	getdream();
});

// 想法tab单击事件
$("#getmood").click(function(){
	$(this).siblings().removeClass("active");
	$(this).addClass("active");
	$("#feeds").empty();
	$("#offset").val('0');
	getmood();
});

// 图片tab单击事件
$("#getpic").click(function(){
	$(this).siblings().removeClass("active");
	$(this).addClass("active");
	$("#feeds").empty();
	$("#offset").val('0');
	getpic();
});

// 获取梦想
function getdream(){
	var dreamfun = baidu.template("t:dreamlist");
	var offset = $("#offset").val();
	$.post("/tenyears/index.php/home/dreams/wallsec",{offset:offset},function(data){
		for(var i=0;i<data.length;i++){
	 		var res = dreamfun(data[i])
	 		$("#feeds").append(res);
	 	}

	 	if(data.length < 10){
	 		$("#get-more").addClass("hide");
	 	}else{
	 		$("#get-more").removeClass("hide");
	 	}

	 	newoffset = offset - 0 + 10;
	 	$("#offset").val(newoffset);
	 	wallpage();
	},"json");
}

// 获取想法
function getmood(){
	var moodfun = baidu.template("t:moodlist");
	var offset = $("#offset").val();
	$.post("/tenyears/index.php/home/ideas/wallsec",{offset:offset},function(data){
		for(var i=0;i<data.length;i++){
	 		var res = moodfun(data[i])
	 		$("#feeds").append(res);
	 	}

	 	if(data.length < 10){
	 		$("#get-more").addClass("hide");
	 	}else{
	 		$("#get-more").removeClass("hide");
	 	}
	 	newoffset = offset - 0 + 10;
	 	$("#offset").val(newoffset);
	 	wallpage();
	},"json");
}

// 获取图片
function getpic(){
	var picfun = baidu.template("t:piclist");
	var offset = $("#offset").val();
	$.post("/tenyears/index.php/home/dmpics/wallsec",{offset:offset},function(data){
		for(var i=0;i<data.length;i++){
	 		var res = picfun(data[i])
	 		$("#feeds").append(res);
	 	}

	 	if(data.length < 10){
	 		$("#get-more").addClass("hide");
	 	}else{
	 		$("#get-more").removeClass("hide");
	 	}

	 	newoffset = offset - 0 + 10;
	 	$("#offset").val(newoffset);
	 	wallpage();
	},"json");
}

// 发表新想法
$(".addmood").click(function(){
	var idea = $("#add-idea").val();
	var did = $(this).attr("dream-id");	
	if(idea.length > 0){
		var uid = $("#curid").val();
		// ajax提交数据
		var url = "/tenyears/index.php/home/ideas/add";
		var postdata = {uid:uid,content:idea,did:did};
		$.post(url,postdata,function(data){
			if(data == "ok"){
				// 有返回值发表成功
				$("#add-mood-ok").fadeIn(), setTimeout(function() {
					$("#add-mood-ok").fadeOut(), $("#add-idea").val("");
				}, 1e3)
			}else{
				return;
			}
		})
	}else{
		return;
	}
})

// 发布新图片
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
$(".addpic").click(function(){
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
				// 有返回值发表成功
				$("#add-mood-ok").fadeIn(), setTimeout(function() {
					$("#add-mood-ok").fadeOut(), $("#add-idea").val("");
				}, 1e3)
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


function wallpage(){
	// 回复区块隐藏与点赞事件阻止冒泡
	$(".like-icon-button").click(function(event){
		event.stopPropagation();
		var like = $(this);
		// ajax点赞
		if($(this).attr("type") == 'd'){
			var table = "dreams";
			var id = $(this).attr("did");
		}
		if($(this).attr("type") == "m"){
			var table = "dmideas";
			var id = $(this).attr("iid");
		}
		if($(this).attr("type") == "p"){
			var table = "dmpics";
			var id = $(this).attr("pid");
		}

		$.post("/tenyears/index.php/home/admire/admire",{table:table,id:id},function(data){
			if(data == "add"){
				var anum = like.html() - 0 + 1;
				like.html(anum);
			}
			if(data == "del"){
				var anum = like.html() - 0 - 1;
				like.html(anum);
			}
		});
		

	});

	// 回复操作栏点击展开回复区
	$(".reply-collapse").click(function(){
		$(this).next().collapse("toggle");
		var collapse = $(this);
		var replywrap = $(this).next().children().eq(2);

		if(collapse.attr("status") == "close"){
			// 置展开状态open
			collapse.attr("status","open");
			// 展开时ajax请求回复信息
			if($("#getdream").hasClass("active")){
				var url = "/tenyears/index.php/home/dmcomments/sec";
				var id = $(this).attr("did");	
			}
			if($("#getmood").hasClass("active")){
				var url = "/tenyears/index.php/home/ideacomments/sec";
				var id = $(this).attr("iid");	
			}
			if($("#getpic").hasClass("active")){
				var url = "/tenyears/index.php/home/piccomments/sec";
				var id = $(this).attr("pid");		
			}

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
// 发表评论
	$(".btn-reply").click(function(){
		var replywrap = $(this).parent().next();
		if($("#getdream").hasClass("active")){
			var url = "/tenyears/index.php/home/dmcomments/add";
			var id = $(this).attr("did");	
		}
		if($("#getmood").hasClass("active")){
			var url = "/tenyears/index.php/home/ideacomments/add";
			var id = $(this).attr("iid");	
		}
		if($("#getpic").hasClass("active")){
			var url = "/tenyears/index.php/home/piccomments/add";
			var id = $(this).attr("pid");		
		}
		var content = $(this).parent().prev().val();
		var replyfun = baidu.template("t:replytpl");
		$.post(url,{id:id,content:content},function(data){
			if(data){
				var res = replyfun(data[0])
			 	replywrap.prepend(res);
			}
			replylink();
		},"json");
	});

}

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
			if($("#getdream").hasClass("active")){
				var url = "/tenyears/index.php/home/dmcomments/del";
			}
			if($("#getmood").hasClass("active")){
				var url = "/tenyears/index.php/home/ideacomments/del";
			}
			if($("#getpic").hasClass("active")){
				var url = "/tenyears/index.php/home/piccomments/del";
			}

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
		$(this).closest(".reply-wrap").siblings("textarea").val("回复"+replynickname+"：");
	})
}

// 锚点处理
$("#scroll-top").click(function(){
	$('html,body').animate({scrollTop:'0px'}, 500);
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

wallpage();


