$(".email-del").click(function(){
	if($(this).attr("type")=='send-email'){
			 var url = '/tenyears/index.php/home/email/senddel';
		}
		if($(this).attr("type")=='rev-email'){
			var url ='/tenyears/index.php/home/email/revdel';
		}
		if($(this).attr("type")=='public-email'){
			var url ='/tenyears/index.php/home/email/publicdel';
		}	
	var id = $(this).attr('emailid');
	$("#confirm-email-del").modal('show');
	$("#email-del-btn").click(function(){
		$.post(url,{id:id},function(data){
			if(data == 'true'){
				location.reload();
			}else{
				// location.reload();
			}
		});
	});
});