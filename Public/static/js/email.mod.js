$("#cancel-status-btn").click(function(){
	var id = $(this).attr('emailid');
	$.post('/tenyears/index.php/home/email/modstatus',{id:id},function(data){
		if(data == 'false'){
			location.reload();
		}else{
			location.reload();
		}
	});

});