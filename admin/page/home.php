<div class="container">
	<div class="col-md-12">
		<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end  mb-5 mb-xl-10 bg-danger" style="background-image:url('./assets/media/patterns/vector-1.png')">
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
			<div class="col-md-3 col-6">
				<div class="card card-flush  mb-5 mb-xl-10">
				    <!--begin::Header-->
				    <div class="card-header pt-5">
				        <!--begin::Title-->
				        <div class="card-title d-flex flex-column">                
				            <!--begin::Amount-->
				            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2"><?php echo$applicant?></span>
				            <!--end::Amount--> 
				            <!--begin::Subtitle-->
				            <span class="text-gray-500 pt-1 fw-semibold fs-6">Applicant</span>
				            <!--end::Subtitle--> 
				        </div>
				        <!--end::Title-->           
				    </div>
				    <!--end::Header-->
				</div>
			</div>
			<div class="col-md-3 col-6">
				<div class="card card-flush  mb-5 mb-xl-10">
				    <!--begin::Header-->
				    <div class="card-header pt-5">
				        <!--begin::Title-->
				        <div class="card-title d-flex flex-column">                
				            <!--begin::Amount-->
				            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2"><?php echo$employer?></span>
				            <!--end::Amount--> 
				            <!--begin::Subtitle-->
				            <span class="text-gray-500 pt-1 fw-semibold fs-6">Employer</span>
				            <!--end::Subtitle--> 
				        </div>
				        <!--end::Title-->           
				    </div>
				    <!--end::Header-->
				</div>
			</div>
			<div class="col-md-3 col-6">
				<div class="card card-flush  mb-5 mb-xl-10">
				    <!--begin::Header-->
				    <div class="card-header pt-5">
				        <!--begin::Title-->
				        <div class="card-title d-flex flex-column">                
				            <!--begin::Amount-->
				            <span class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2"><?php echo$posting?></span>
				            <!--end::Amount--> 
				            <!--begin::Subtitle-->
				            <span class="text-gray-500 pt-1 fw-semibold fs-6">Posted</span>
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
<script type="text/javascript">
	function startTime(){
		




		var ctx = document.getElementById("myChart").getContext("2d");

		var data = {
		    labels: [],
		    datasets: [
		        {
		            label: "Post",
		            backgroundColor: "red",
		            data: [20]
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