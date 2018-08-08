/*
***converts time string to seconds
***from"09:30:51" to 3450 e.g

**/

var toHMSFunction=function(hms){
	var a = hms.split(':'); // split it at the colons

	// minutes are worth 60 seconds. Hours are worth 60 minutes.
	var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 

	return seconds;
}
/*
***converts back seconds to h:m:s string
***from 3450 to"09:30:51" e.g

**/
var convertSeconds = function(sec) {
            var hrsRem = Math.floor(sec / 3600);
            var hrs = Math.floor(sec / 3600)%24;

            var minRem = Math.floor((sec - (hrsRem * 3600)) / 60);
            var min = Math.floor((sec - (hrsRem * 3600)) / 60)%60;

            var seconds = sec - (hrsRem * 3600) - (minRem * 60);
            seconds = Math.round(seconds * 100) / 100
           
            var result = (hrs < 10 ? "0" + hrs : hrs);
            result += ":" + (min < 10 ? "0" + min : min);
            result += ":" + (seconds < 10 ? "0" + seconds : seconds);
            return result;
         }
/*
**Handle Change status in response to buttons click
**send a post ajax request to update request in the DB
**Then update UI with the correct status
*/

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

/*
**Handle showing vacation details working hoursfor each vacation
**send a get ajax request to update request in the DB
*/



$("#vacations-table tbody tr").on("click",function(e){
	

	console.log("test");
	var id=$(this).attr('id');
	console.log(id);
	//$('#orderModal').modal('show');

	$.ajax({
		method:'GET',
		url:url1,
		data:{
		vacation_id:id,
		
		_token:token
		}
	}).done(function(msg){
			
			
		console.log(msg.workingHours);
		console.log(msg.workingHours.length);
		
		var availability=msg.availability;
		console.log(availability,'availability');
		if(availability==1){
			$("#vacationWorkingsTable tbody ").empty();
			$("#vacationWorkingsTable thead ").append("<tr> <th scope='col'>Date</th>"+
              '<th scope="col">Hours</th>'+
              '<th scope="col">From</th>'+
              '<th scope="col">To</th></tr>');
			$("#orderModal h5").text("Vacation Working Hours  ");
			
              
              
            

			for(var i=0; i<msg.workingHours.length ;i++){
				
				if(msg.workingHours[i].from !==null){
					
					var to=convertSeconds(toHMSFunction(msg.workingHours[i].from)+
							(msg.workingHours[i].hours)*60*60);
					
					
					$("#vacationWorkingsTable tbody ").append("<tr><td>"+msg.workingHours[i].date+"</td>"+
							"<td>"+msg.workingHours[i].hours+"</td>"+
							"<td>"+msg.workingHours[i].from+"</td>"+
							"<td>"+to+"</td></tr>");
					}else{
						$("#vacationWorkingsTable tbody ").append("<tr><td>"+msg.workingHours[i].date+"</td>"+
							"<td>0</td>"+
							"<td></td>"+
							"<td></td></tr>");
					}
				}

		}else{
			$("#orderModal h5").text("Not available To work during this vacation");
			$("#vacationWorkingsTable thead,#vacationWorkingsTable tbody").empty();

		}
		



	});

});

 





