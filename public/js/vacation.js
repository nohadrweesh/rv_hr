//var dateFrom,dateTo;

var toHMSFunction=function(hms){
	var a = hms.split(':'); // split it at the colons

	// minutes are worth 60 seconds. Hours are worth 60 minutes.
	var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 ; 

	return seconds;
}

var toType = function(obj) {
  return ({}).toString.call(obj).match(/\s([a-zA-Z]+)/)[1].toLowerCase()
}
 
/*var date = new Date();
date=nextDayDate(date);
console.log(nextDayDate(date));
console.log(((date.getMonth() + 1) + '/' + date.getDate() + '/' +  date.getFullYear()));

*/
// $('#fromInput , #toInput').change(function() {
//     var dateFrom = $("#fromInput").val();
//     console.log(dateFrom);
//     //var dateFromFormated=((dateFrom.getMonth() + 1) + 
//     //	'/' + dateFrom.getDate() + '/' +  dateFrom.getFullYear());
//     $("table tbody").empty();
//     var dateTo = $("#toInput").val();
//     console.log(dateTo);
    

// 	var startDate = Date.parse(dateFrom);
// 	var endDate = Date.parse(dateTo);
// 	var timeDiff = endDate - startDate;
// 	daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24)) +1;
// 	console.log(daysDiff);
// 	var tempDate=new Date(dateFrom);
	
// 	for(i=0;i<daysDiff;i++){
// 		tempDate=((tempDate.getMonth() + 1) + 
//     	'/' + tempDate.getDate() + '/' +  tempDate.getFullYear());
// 		$('tbody').append("<tr> <th scope='row'>"+tempDate+"</th>"+
// 	      "<td><input type='number' value='0' name='working_hours[]'></td>"+
// 	      "<td> <input type='time' name='working_hours_from[]' ></td>"+
// 	      "<td> <input type='time' name='working_hours_to[]' ></td>"+
// 	    "</tr>");
// 	    tempDate=nextDayDate(tempDate);
	   
// 	}

	


// });


$('#datepicker_start, #datepicker_end').change(function(e) {
	var dateFrom=$('#datepicker_start').datepicker('getDate')
	var dateTo=$('#datepicker_end').datepicker('getDate')

	    $("table tbody").empty();
    
    

	var startDate = Date.parse(dateFrom);
	var endDate = Date.parse(dateTo);
	var timeDiff = endDate - startDate;
	daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24)) +1;
	console.log(startDate,'startDate');
	console.log(endDate,'endDate');
	console.log(daysDiff,'daysDiff');
	
	var tempDate=new Date(dateFrom);
	console.log(tempDate,'tempDate');


	/*var date1 = new Date(dateFrom);

	var date2 = new Date(dateTo);

	console.log(date1,'date1');
	console.log(date2,'date2');
	var timeDiff = Math.abs(date2.getTime() - date1.getTime());
	var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
	alert(diffDays);*/
	
	for(i=0;i<daysDiff;i++){
		/*tempDate=((tempDate.getMonth() + 1) + 
    	'/' + tempDate.getDate() + '/' +  tempDate.getFullYear());*/
    	var datestring = tempDate.getDate()  + "-" +
    	 (tempDate.getMonth()+1) + "-" + tempDate.getFullYear();

    	 var datestring =  tempDate.getFullYear()   + "-" +
    	 (tempDate.getMonth()+1) + "-" +tempDate.getDate();

		$('tbody').append("<tr class='item'> <th scope='row'>"+datestring+"</th>"+
	      "<td><input class='hours' type='number' value='0' name='working_hours[]'></td>"+
	      "<td> <input class='from' type='time' name='working_hours_from[]' ></td>"+
	      "<td> <input class='to' type='time' name='working_hours_to[]' ></td>"+
	    "</tr>");
	    tempDate.setDate(tempDate.getDate()+1);
	   
	}
   console.log("p1,2 change finall");


});


$(document).on('click', 'form button[type=submit]', function(e) {
		var er=0;
		$(".alert").empty();
	$("tr.item").each(function(){
		var hours=$(this).find("input.hours").val();
		var from=$(this).find("input.from").val();
		var to=$(this).find("input.to").val();
		var err=toHMSFunction(to)-toHMSFunction(from);
		var error=(err!=hours*60*60);
		if((from=="" && to=="" && hours=="0")||(from=="" && to==""))
			var error=false;
		console.log(hours,"hours",from,"from",to,"to",error,"error");
		if(error==true){
			er++;
			$(this).css('background-color','#721c24');
			$(".alert").css('display','block');
			$(".alert").append("<p>Error from,to and hours fields aren't compatible</p>");
		}

	});
	console.log(er,"er");
    if(er!=0){
      e.preventDefault(); //prevent the default action
    }
    
});
$("#testButton").on("click",function(){
	var e=0;
	$("tr.item").each(function(){
		var hours=$(this).find("input.hours").val();
		var from=$(this).find("input.from").val();
		var to=$(this).find("input.to").val();
		var e=toHMSFunction(to)-toHMSFunction(from);
		var error=(e!=hours*60*60);
		if((from=="" && to=="" && hours=="0")||(from=="" && to==""))
			var error=false;
		console.log(hours,"hours",from,"from",to,"to",error,"error");
		if(error==true){
			e++;
			$(this).css('background-color','#f8d7da');
			$(".alert").css('display','block');
			$(".alert").append("<p>Error from,to and hours fields aren't compatible</p>");
		}

	});
});




