
$('tr').on("click",'#managerConfirmed,#hrConfirmed,#rejected,#canceled',function(e){

	var cell = $(e.target).get(0);
	var tr = $(this).closest('tr');
	
	var id=$(this).closest('tr').attr('id');
	
	var cmd=$(this).attr("id");
	

	$.ajax({
		method:'POST',
		url:url,
		data:{
		vacation_id:id,
		cmd:cmd,
		_token:token
		}
	}).done(function(msg){
			tr_id="#"+id+' ' +'.status';
			
			//$(tr_id).css( "color", "red" );
			

			console.log(msg['message']);
			status=msg['status'];
			$(tr_id).html(status);
			//$(tr_id).html(cmd)


	});

});


 $('#orderModal').on('shown.bs.modal', function(event){ //subscribe to show method
    console.log("modal");
          var getIdFromRow = $(event.target).closest('tr').data('id'); //get the id from tr
        console.log(getIdFromRow);
        //make your ajax call populate items or what even you need
        $(this).find('#orderDetails').html($('<b> Order Id selected: ' + getIdFromRow  + '</b>'))
    });








