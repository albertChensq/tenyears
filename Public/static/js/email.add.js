$(".email-reply").click(function(){
	var id = $(this).attr('emailid');
		
	$("#add-reply-dialog").modal('show');
	$("#email-btn").click(function(){
	var revcontent = $("#revcontent").val();
		$.post('/tenyears/index.php/home/email/revadd',{id:id,revcontent:revcontent},function(data){
			if(data == 'true'){
				location.reload();
			}else{
				location.reload();
			}
		});
	});
});