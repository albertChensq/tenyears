$("#sys-message-already").click(function(){
	var content = $("#message-content").html();
	$.post('/tenyears/index.php/home/email/messageadd',{content:content},function(data){
		if(data == 'true'){
			location.reload();
		}else{
			location.reload();
		}
	});
});