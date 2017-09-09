
//User 控制器 删除弹窗文件
$(".deluser").click(function(){
	var id = $(this).attr('userid');
	$("#myModal").modal('show');
	$("#btn-del").click(function(){
		$.post('/tenyears/admin.php/admin/user/del',{id:id},function(data){
			if(data=='ok'){
				 location.reload();
			}else{
				 location.reload();
			}
		});
		
	});
});


//Dreams 控制器 删除弹窗文件
$(".deluser").click(function(){
	var id = $(this).attr('dreamsid');
	$("#myModal").modal('show');
	$("#btn-del").click(function(){
		$.post('/tenyears/admin.php/admin/dreams/del',{id:id},function(data){
			if(data=='ok'){
				 location.reload();
			}else{
				 location.reload();
			}
		});
		
	});
});

