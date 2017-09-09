$("#email-send").click(function(){
	$("#send-email-dialog").modal('show');
	$("#send-email-btn").click(function(){
		var nickname = $("#nickname").val();
		 sendcontent = $("#sendcontent").val();
		$.post('/tenyears/index.php/home/email/sendadd',{nickname:nickname,sendcontent:sendcontent},function(data){
			if(data == 'false'){
				location.reload();
			}else{
				location.reload();
			}
		});
	});
});

$("#nickname").blur(function(){
	var nickname = $("#nickname").val();
	data = {nickname:nickname};
	$.post('/tenyears/index.php/home/email/check',data,function(data){
			if(data == 'no'){
				$("#sendmyself").removeClass("hide");
				$("#send-email-btn").attr('disabled','disabled');
			}else if(data == 'false'){
				$("#sendmyself").addClass("hide");
				$("#nickname").next().removeClass("hide");
				$("#send-email-btn").attr('disabled','disabled');
			}else{
				$("#sendmyself").addClass("hide");
				$("#nickname").next().addClass("hide");
				$("#send-email-btn").removeAttr('disabled');
			}
	});
});