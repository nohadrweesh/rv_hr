//var dateFrom,dateTo;

function nextDayDate(date) {
  var ret = new Date(date||new Date());
  ret.setDate(ret.getDate() +  1);
  return ret;
}
 
var date = new Date();
date=nextDayDate(date);
console.log(nextDayDate(date));
console.log(((date.getMonth() + 1) + '/' + date.getDate() + '/' +  date.getFullYear()));


$('#fromInput , #toInput').change(function() {
    var dateFrom = $("#fromInput").val();
    console.log(dateFrom);
    //var dateFromFormated=((dateFrom.getMonth() + 1) + 
    //	'/' + dateFrom.getDate() + '/' +  dateFrom.getFullYear());
    
    var dateTo = $("#toInput").val();
    console.log(dateTo);
    

	var startDate = Date.parse(dateFrom);
	var endDate = Date.parse(dateTo);
	var timeDiff = endDate - startDate;
	daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24)) +1;
	console.log(daysDiff);
	var tempDate=new Date(dateFrom);
	
	for(i=0;i<daysDiff;i++){
		tempDate=((tempDate.getMonth() + 1) + 
    	'/' + tempDate.getDate() + '/' +  tempDate.getFullYear());
		$('tbody').append("<tr> <th scope='row'>"+tempDate+"</th>"+
	      "<td><input type='number' value='0' name='working_hours[]'></td>"+
	      "<td> <input type='time' name='working_hours_from[]' ></td>"+
	      "<td> <input type='time' name='working_hours_to[]' ></td>"+
	    "</tr>");
	    tempDate=nextDayDate(tempDate);
	   
	}

	


});



