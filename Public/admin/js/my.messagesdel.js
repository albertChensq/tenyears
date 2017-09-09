//notice 控制器 删除弹窗文件
$(".deluser").click(function(){
	var id = $(this).attr('messagesid');
	$("#myModal").modal('show');
	$("#btn-del").click(function(){
		$.post('/tenyears/admin.php/admin/email/del',{id:id},function(data){
			if(data=='ok'){
				 location.reload();
			}else{
				 location.reload();
			}
		});
		
	});
});