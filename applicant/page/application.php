<?php


$ids=$_GET['applicant'];

	$sql = "SELECT p.*,
            (SELECT firstname FROM employer WHERE id=p.employer_id) AS firstname,
            (SELECT lastname FROM employer WHERE id=p.employer_id) AS lastname,
            (SELECT email FROM employer WHERE id=p.employer_id) AS email
             FROM posting p WHERE id='$ids'";
	$result = $conn->query($sql);

	$row = $result->fetch_assoc();

	extract($row);

?>

<div class="container">
	<div class="card">
		<div class="card-header">
			<h1> <?php
				echo$title;
			?></h1>


		</div>
		<div class="card-body">
			<h1>Contact Person</h1><br>
			Email:<span class="badge badge-light-info"><?php echo$email; ?></span><br>

			Name:<span class="badge badge-light-info"><?php echo$firstname; ?><?php echo$lastname; ?></span>
			<?php
				echo$description;
			?>

			<br>

			

			<input class="form-control" name="tagify" value="<?php echo$tagify?>"   id="kt_tagify_1" style="border: none !important;">
		</div>
		<div class="card-footer">
			<!--begin::Form-->
			<form class="form" action="#" method="post">
			    <!--begin::Input group-->
			    <div class="fv-row">
			        <!--begin::Dropzone-->
			        <div class="dropzone" id="kt_dropzonejs_example_1">
			            <!--begin::Message-->
			            <div class="dz-message needsclick">
			                <i class="ki-duotone ki-file-up fs-3x text-primary"><span class="path1"></span><span class="path2"></span></i>

			                <!--begin::Info-->
			                <div class="ms-4">
			                    <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to upload your CV here.</h3>
			                    <span class="fs-7 fw-semibold text-gray-500">Upload  1 file</span>
			                </div>
			                <!--end::Info-->
			            </div>
			        </div>
			        <!--end::Dropzone-->
			    </div>
			    <!--end::Input group-->
			</form>
			<!--end::Form-->
			
		</div>
	</div>
</div>



<script>
	setTimeout(function() {

        var input1 = document.querySelector("#kt_tagify_1");
        new Tagify(input1);

        var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
		    url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
		    paramName: "file", // The name that will be used to transfer the file
		    maxFiles: 10,
		    maxFilesize: 10, // MB
		    addRemoveLinks: true,
		    accept: function(file, done) {
		        if (file.name == "wow.jpg") {
		            done("Naha, you don't.");
		        } else {
		            done();
		        }
		    }
		});
         
    }, 1000);
</script>