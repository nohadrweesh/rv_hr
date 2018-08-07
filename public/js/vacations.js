
$('tr').on("click",'#mgr_confirm',function(e){

	var cell = $(e.target).get(0);
	var tr = $(this).parent();
	var id=$(this).closest('tr').attr('id');
	var cmd=$(this).attr("id");
	console.log(id);
	//alert($(this).attr("id"));

	$.ajax({
	method:'POST',
	url:url,
	data:{
	vacation_id:'6',
	cmd:cmd,
	_token=token
	}
	}).done(function(msg){
			console.log(msg['message']);
	});

});