<div class="container">
	<div class="col-md-12">
		<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end  mb-5 mb-xl-10 bg-primary" style="background-image:url('./assets/media/patterns/vector-1.png')">
		    <!--begin::Header-->
		    <div class="card-header pt-5">
		        <!--begin::Title-->
		        <div class="card-title d-flex flex-column">   
		            <!--begin::Amount-->
		            <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">Statistic</span>
		            <!--end::Amount-->

		            <!--begin::Subtitle-->
		            <span class="text-white opacity-75 pt-1 fw-semibold fs-6"></span>             
		            <!--end::Subtitle--> 
		        </div>
		        <!--end::Title-->         
		    </div>
		    <!--end::Header-->
		</div>
		<div class="row">
			<div class="col-md-4 col-6">
				<div class="card card-flush  mb-5 mb-xl-10">
				    <!--begin::Header-->
				    <div class="card-header pt-5">
				        <!--begin::Title-->
				        <div class="card-title d-flex flex-column">                
				            <!--begin::Amount-->
				            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2"><?php echo$faculty_count?></span>
				            <!--end::Amount--> 
				            <!--begin::Subtitle-->
				            <span class="text-gray-500 pt-1 fw-semibold fs-6">Faculty</span>
				            <!--end::Subtitle--> 
				        </div>
				        <!--end::Title-->           
				    </div>
				    <!--end::Header-->
				</div>
			</div>
			<div class="col-md-4 col-6">
				<div class="card card-flush  mb-5 mb-xl-10">
				    <!--begin::Header-->
				    <div class="card-header pt-5">
				        <!--begin::Title-->
				        <div class="card-title d-flex flex-column">                
				            <!--begin::Amount-->
				            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2"><?php echo$student_count?></span>
				            <!--end::Amount--> 
				            <!--begin::Subtitle-->
				            <span class="text-gray-500 pt-1 fw-semibold fs-6">Student</span>
				            <!--end::Subtitle--> 
				        </div>
				        <!--end::Title-->           
				    </div>
				    <!--end::Header-->
				</div>
			</div>
			<div class="col-md-4 col-6">
				<div class="card card-flush  mb-5 mb-xl-10">
				    <!--begin::Header-->
				    <div class="card-header pt-5">
				        <!--begin::Title-->
				        <div class="card-title d-flex flex-column">                
				            <!--begin::Amount-->
				            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2"><?php echo$remaining_days?></span>
				            <!--end::Amount--> 
				            <!--begin::Subtitle-->
				            <span class="text-gray-500 pt-1 fw-semibold fs-6">Remaining Days</span>
				            <!--end::Subtitle--> 
				        </div>
				        <!--end::Title-->           
				    </div>
				    <!--end::Header-->
				</div>
			</div>
		</div>
	</div>
	<canvas id="myChart" style="width:100%;"></canvas>
</div>
<?php
			
	$day7=date('Y-m-d', strtotime('-7 days'));
	$day6=date('Y-m-d', strtotime('-6 days'));
	$day5=date('Y-m-d', strtotime('-5 days'));
	$day4=date('Y-m-d', strtotime('-4 days'));
	$day3=date('Y-m-d', strtotime('-3 days'));
	$day2=date('Y-m-d', strtotime('-2 days'));
	$day1=date('Y-m-d', strtotime('-1 days'));
	$day0=date('Y-m-d');

		$sql = "SELECT * FROM attendance WHERE date_time BETWEEN '$day7' AND '$day6'";
		$result = $conn->query($sql);
		$days7=$result->num_rows;


		$sql = "SELECT * FROM attendance WHERE date_time BETWEEN '$day6' AND '$day5'";
		$result = $conn->query($sql);
		$days6=$result->num_rows;

		$sql = "SELECT * FROM attendance WHERE date_time BETWEEN '$day5' AND '$day4'";
		$result = $conn->query($sql);
		$days5=$result->num_rows;

		$sql = "SELECT * FROM attendance WHERE date_time BETWEEN '$day4' AND '$day3'";
		$result = $conn->query($sql);
		$days4=$result->num_rows;

		$sql = "SELECT * FROM attendance WHERE date_time BETWEEN '$day3' AND '$day2'";
		$result = $conn->query($sql);
		$days3=$result->num_rows;

		$sql = "SELECT * FROM attendance WHERE date_time BETWEEN '$day2' AND '$day1'";
		$result = $conn->query($sql);
		$days2=$result->num_rows;

		$sql = "SELECT * FROM attendance WHERE date_time BETWEEN '$day1' AND '$day0'";
		$result = $conn->query($sql);
		$days1=$result->num_rows;


?>
<script type="text/javascript">
	function startTime(){
		




		var ctx = document.getElementById("myChart").getContext("2d");

		var data = {
		    labels: ['<?php echo date('D', strtotime($day7));?>','<?php echo date('D', strtotime($day6));?>','<?php echo date('D', strtotime($day5));?>','<?php echo date('D', strtotime($day4));?>','<?php echo date('D', strtotime($day3));?>','<?php echo date('D', strtotime($day2));?>','<?php echo date('D', strtotime($day1));?>'],
		    datasets: [
		        {
		            label: "Attendance",
		            backgroundColor: "lightblue",
		            data: [<?php echo$days7?>,<?php echo$days6?>,<?php echo$days5?>,<?php echo$days4?>,<?php echo$days3?>,<?php echo$days2?>,<?php echo$days1?>]
		        },
		        // {
		        //     label: "Time out",
		        //     backgroundColor: "gray",
		        //     data: [2]
		        // },

		    ]
		};

		var myBarChart = new Chart(ctx, {
		    type: 'bar',
		    data: data,
		    options: {
		        barValueSpacing: 20,
		        scales: {
		            yAxes: [{
		                ticks: {
		                    min: 0,
		                }
		            }]
		        }
		    }
		});
	}

	setTimeout(function() {
        startTime();
    }, 1000);
</script>