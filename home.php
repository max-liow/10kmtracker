<!doctype html>
<html lang="en">
<head>
	<title>⚡10KM Challenge Tracker</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="scss/style.css">
	
</head>
<body>
	
	<style media="screen">
	tr.bold > th{
		font-weight: bold;
	}
	
	.plan{
		box-shadow: 0 1px 0 black;
		font-weight: 700;
		margin-bottom: 50px;
		cursor: pointer;
	}
	
	.margin-bot{
		margin-bottom: 1rem;
	}
	
	.table-fix-head{
		/* overflow: auto; 		 */
	}
	
	.table-fix-head thead th{
		position: sticky; 
		top: 0; 
		z-index: 1; 
		background: white;
	}
	.paceSec, tfoot{
		display: none;
	}
	
	tr:hover {
		/* color: #EEEEEE; */
		background-color: #EEEEEE;
		cursor: pointer;
	}
	
	tr:hover td {
		background-color: transparent;
	}
	
	tr.selected{
		background-color: #EEEEEE;
	}
	tr.selected td {
		background-color: transparent;
	}
	</style>
	
	<!-- Calander modal -->
	<div class="modal fade calendar-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="row justify-content-center">
					<!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
					<!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
					<button id="close_modal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=2&bgcolor=%23ffffff&ctz=Asia%2FKuala_Lumpur&showPrint=0&showTabs=0&showCalendars=0&showDate=1&src=aW1tYXhsaW93QGdtYWlsLmNvbQ&color=%23039BE5" style="border:solid 1px #777" width="1360" height="760" frameborder="0" scrolling="no"></iframe>
				</div>			
			</div>
		</div>
	</div>
	
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="text-center margin-bot">
					<h2 class="heading-section">⚡10KM Challenge Tracker</h2>
				</div>
			</div>
			
			<div class="row justify-content-center">
				<h5 class="plan" data-toggle="modal" data-target=".calendar-modal">Actual Plan</h5>
			</div>
			
			<div class="avg-summary">
				<div class="avg-distance"><span>Average distance : <b></b></span></div>
				<div class="avg-time"><span>Average time : <b></b></span></div>
				<div class="avg-pace"><span>Average pace : <b>12'49"</b></span></div>	
			</div>
			
			<div class="summary">
				<div class="esp-distance"><span>Race distance : <b>10 km</b></span></div>
				<div class="esp-time"><span>Expect Finish time : <b></b></span></div>	
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap table-fix-head">
						<!-- <div class=""> -->
						<table id="tracker_table" class="table table-responsive-xl ">
							<thead>
								<tr class="bold">
									<th>No</th>
									<th>Date</th>
									<th>Distance</th>
									<th>Start Time</th>
									<th>Duration</th>
									<th>Avg Pace</th>
									<th class="paceSec">Avg Pace(sec)</th>
								</tr>
							</thead>
							<tbody>
								<tr class="alert" role="alert">
									<td>1</td>
									<td>21/04/2022</td>
									<td class="distance">2.60 <span>km<span></td>
									<td>6.49 pm</td>
									<td class="duration">00:33:20 <spam>hr</span></td>
									<td class="pace"></td>
									<td class="paceSec"></td>
								</tr>
								<tr class="alert" role="alert">
									<td>2</td>
									<td>23/04/2022</td>
									<td class="distance">2.76 <span>km<span></td>
									<td>6.22 pm</td>
									<td class="duration">00:31:02 <spam>hr</span></td>
									<td class="pace"></td>
									<td class="paceSec"></td>
								</tr>
								<tr class="alert" role="alert">
									<td>3</td>
									<td>25/04/2022</td>
									<td class="distance">4.01 <span>km<span></td>
									<td>6.18 pm</td>
									<td class="duration">00:43:11 <spam>hr</span></td>
									<td class="pace"></td>
									<td class="paceSec"></td>
								</tr>

								<tfoot>
						            <tr>
						                <td>total</td>
						                <td>total</td>
						                <td>total</td>
						                <td>total</td>
						                <td>total</td>
						                <td>total</td>
						                <td class="paceSec">total</td>
						            </tr>
						        </tfoot>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
	
	<script>
	$('#close_modal').click(function(){
		$('.calendar-modal').modal('toggle');
	});
	
	$("tbody tr").click(function() {
		$(this).addClass('selected').siblings().removeClass("selected");
	});
	
	//calculate the total row
	var row_count = $('#tracker_table tr:not(thead tr):not(tfoot tr)').length;
	var distance_sum = 0;
	
	var totalSec = 0;
	var timeArr = [];
	i = 0;

	var totalPaceSec = 0;
	
	$(document).ready(function () {

		$('table tr:not(thead tr):not(tfoot tr)').each(function () {
			// 1. Total of distance
			var distance = $('td', this).eq(2).text().replace(/(km)/g, '');
			var t_distance = parseFloat(distance);
			distance_sum = distance_sum + t_distance;
			
			//2. Total of time (hh:mm:ss)
			var time = $('td', this).eq(4).text().replace(/(hr)/g, '');
			timeArr[i++] = time; // Loop all into an array

			//3. Auto generate the pace
			var splitSec = splitToSec(time); 
			var secKM = splitSec/distance;
			var currentRow = $(this).closest("tr");
			currentRow.find('.pace').text(secToMin(secKM)+ ' min/km');	
			currentRow.find('.paceSec').text(secKM);	
			totalPaceSec = totalPaceSec + secKM;
		});
		
		// -- Continue of (2. Total of time) --
		//Loop all the time, to sum all to seconds
		for (let j = 0; j < timeArr.length; j++) {
			var time_split = timeArr[j].split(":");
			var seconds = (+time_split[0]) * 60 * 60 + (+time_split[1]) * 60 + (+time_split[2]); 
			totalSec = totalSec + seconds;
		}
		
		function splitToSec(s){
			var time_split = s.split(":");
			var seconds = (+time_split[0]) * 60 * 60 + (+time_split[1]) * 60 + (+time_split[2]); 
			return seconds;
		}

		//Get average seconds for all the row
		var secAvg = totalSec / timeArr.length;
		// Then call the average with secondsTimeSpanToHMS(secAvg) - format HH:MM:SS
		
		function secondsTimeSpanToHMS(s) {
			var h = Math.floor(s / 3600); //Get whole hours
			s -= h * 3600;
			var m = Math.floor(s / 60); //Get remaining minutes
			s -= m * 60;
			
			if (h == 0){
				h = '00';
			}
			else if (h < 10){
				h = '0'+h;
			}
			
			var sec = parseInt((s < 10 ? '0' + s : s));
			if (sec < 10){
				sec = '0'+sec;
			}
		
			return h + ":" + (m < 10 ? '0' + m : m) + ":" + sec; //zero padding on minutes and seconds
		}
		
		// -- End of (2. Total of time) --
		
		// -- Continue of (3. Auto generate the pace) --
		// Convert sec/km to min/km
		function secToMin(s){
			var totalSeconds = s;
		
			var minutes = Math.floor(totalSeconds / 60); // 👇️ get number of full minutes
			var seconds = totalSeconds % 60; // 👇️ get remainder of seconds
			
			function padTo2Digits(num) {
			  return num.toString().padStart(2, '0');
			}
			
			// var secFormat = parseFloat(`${padTo2Digits(seconds)}`).toFixed(2); // Convert to only 2 decimal
			var secFormat = parseInt(`${padTo2Digits(seconds)}`); // Convert to the second only
			var result = `${padTo2Digits(minutes)}:`+secFormat; // ✅ format as MM:SS
			return result;
		}
		// -- End of (3. Auto generate the pace) --
		
		//4. Expect finish time, get the avg pace(sec) x 10km, then convert
		var paceAvgSec = totalPaceSec/timeArr.length;
		var tenKfinishTime = paceAvgSec * 10; //Multiple 10km
		var finishTime = secondsTimeSpanToHMS(tenKfinishTime);
		
		// Final display (total)
		$('table tfoot td').eq(2).text(distance_sum);
		$('table tfoot td').eq(4).text(secondsTimeSpanToHMS(totalSec));
		$('table tfoot td').eq(5).text(secToMin(totalPaceSec));
		$('table tfoot td').eq(6).text(totalPaceSec);
		
		//Display the Average data
		$('.avg-summary > .avg-distance').find('b').text((distance_sum/row_count).toFixed(2) +' km');
		$('.avg-summary > .avg-time').find('b').text(secondsTimeSpanToHMS(secAvg) + ' hr');
		$('.avg-summary > .avg-pace').find('b').text(secToMin(totalPaceSec/timeArr.length) + ' min/km');
		$('.summary > .esp-time').find('b').text(finishTime + ' hr') ;
	
	});



	</script>
	
</body>
</html>

