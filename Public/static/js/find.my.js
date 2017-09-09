/**
*	本文档为发现页面所有js事件	
*	包括页面事件控制与相关数据的ajax请求
*/

// 页面默认加载全部梦想
$(function(){
	getdream(0);
})


// 热门标签点击事件
$("#hot-tags-wrap").children().click(function(){
	// 选中状态切换
	$(this).siblings().removeClass("active");	
	$(this).addClass("active");
	$("#tags-selected-value").html($(this).html());
	if($(this)[0].attributes['tag-id'].value == 0){
		$("#tags-selected-meta").addClass("hide");
	}

	// 清空#feeds,重置offset,curtag-id
	var tagid = $(this).attr("tag-id");
	$("#feeds").empty();
	$("#offset").val('0');
	$("#curtag-id").val(tagid);
	//触发ajax查询
	if($(".type-item[feed-type='dream']").hasClass("active")){
		getdream(tagid);
	}
	if($(".type-item[feed-type='mood']").hasClass("active")){
		getmood(tagid);
	}
	if($(".type-item[feed-type='moodpic']").hasClass("active")){
		getpic(tagid);
	}

});

// 梦想、想法、图片标签切换
$(".type-item").click(function(){
	$(this).siblings().removeClass("active");
	$(this).addClass("active");

	// 清空#feeds,重置offset
	var tagid = $("#curtag-id").val();
	$("#feeds").empty();
	$("#offset").val('0');

	if($(this).attr("feed-type") == "dream"){
		getdream(tagid);
	}
	if($(this).attr("feed-type") == "mood"){
		getmood(tagid);
	}
	if($(this).attr("feed-type") == "moodpic"){
		getpic(tagid);
	}

});

// 获取更多单击事件
$("#get-more").click(function(){
	var tagid = $("#curtag-id").val();
	//触发ajax查询
	if($(".type-item[feed-type='dream']").hasClass("active")){
		getdream(tagid);
	}
	if($(".type-item[feed-type='mood']").hasClass("active")){
		getmood(tagid);
	}
	if($(".type-item[feed-type='moodpic']").hasClass("active")){
		getpic(tagid);
	}

})

// 获取梦想
function getdream(tagid){
	var dreamfun = baidu.template("t:dreamlist");
	var offset = $("#offset").val();
	$.post("/tenyears/index.php/home/dreams/findsec",{offset:offset,tagid:tagid},function(data){
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
	 	findpage();
	},"json");
}

//获取想法
function getmood(tagid){
	var moodfun = baidu.template("t:moodlist");
	var offset = $("#offset").val();
	$.post("/tenyears/index.php/home/ideas/findsec",{offset:offset,tagid:tagid},function(data){
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
	 	findpage();
	},"json");

}

// 获取图片
function getpic(tagid){
	var picfun = baidu.template("t:piclist");
	var offset = $("#offset").val();
	$.post("/tenyears/index.php/home/dmpics/findsec",{offset:offset,tagid:tagid},function(data){
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
	 	findpage();
	},"json");
}

function findpage(){
	
	// 回复区块隐藏与点赞事件阻止冒泡
	$(".like-icon-button").click(function(event){
		event.stopPropagation();
		var islogin = $("#isLogin").val();
		if(islogin == "false"){
			$("#loginDialog").modal("show");
			return;
		}

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
		var islogin = $("#isLogin").val();
		if(islogin == "false"){
			$("#loginDialog").modal("show");
			return;
		}
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
			}else{
				return;
			}
			replylink();
		},"json");
	});
};

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

findpage();
