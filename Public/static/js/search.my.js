/**
*	本文档为搜索页面所有js事件	
*	包括页面事件控制与相关数据的ajax请求
*/

$(function(){
	var dreamfun = baidu.template("t:dream-list");
	var keyword = $.trim($("#keyword").val());
	var url = "/tenyears/index.php/home/search/searchdream";
	$.post(url,{keyword:keyword},function(data){
		$(".search-body").append("<ul class='dream-list'></ul>");
		for(var i=0;i<data.length;i++){
	 		var res = dreamfun(data[i])
	 		$(".dream-list").append(res);
	 	}	
	},"json")
})

	// 搜索结果梦想与用户标签切换
	var dreamfun = baidu.template("t:dream-list");
	$(".dream-tab").click(function(){
		$(this).next().addClass("unactive").removeClass("active");
		$(this).removeClass("unactive").addClass("active");
		$(".search-body ul").remove();
		// ajax请求搜索结果
		var keyword = $.trim($("#keyword").val());
		var url = "/tenyears/index.php/home/search/searchdream";
		$.post(url,{keyword:keyword},function(data){
			$(".search-body").append("<ul class='dream-list'></ul>");
			for(var i=0;i<data.length;i++){
		 		var res = dreamfun(data[i])
		 		$(".dream-list").append(res);
		 	}
		 		focus();
		},"json")
	});

	var userfun = baidu.template("t:user-list");
	$(".user-tab").click(function(){
		$(this).prev().addClass("unactive").removeClass("active");
		$(this).removeClass("unactive").addClass("active");
		$(".search-body ul").remove();
		// ajax请求搜索的用户
		var keyword = $.trim($("#keyword").val());
		var url = "/tenyears/index.php/home/search/searchuser";
		$.post(url,{keyword:keyword},function(data){
			$(".search-body").append("<ul class='user-list'></ul>");
			for(var i=0;i<data.length;i++){
		 		var res = userfun(data[i])
		 		$(".user-list").append(res);
		 	}			
		 		focus();
		},"json");
	});

function focus(){
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
}

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

focus()