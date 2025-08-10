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

			<?php


				$sql = "SELECT * FROM application WHERE posting_id='$ids' AND applicant_id='$user_id'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				  // output data of each row
				  while($row = $result->fetch_assoc()) {
				    extract($row);
				    if($status=='pending'){
				    	?>
				    	<!--begin::Alert-->
		                <div class="alert alert-warning d-flex align-items-center p-5">
		                    <!--begin::Icon-->
		                    <i class="ki-duotone ki-shield-tick fs-2hx text-warning me-4"><span class="path1"></span><span class="path2"></span></i>
		                    <!--end::Icon-->

		                    <!--begin::Wrapper-->
		                    <div class="d-flex flex-column">
		                        <!--begin::Title-->
		                        <h4 class="mb-1 text-warning">Pending</h4>
		                        <!--end::Title-->

		                        <!--begin::Content-->
		                        <span>Your application is currently on pending</span>
		                        <!--end::Content-->
		                    </div>
		                    <!--end::Wrapper-->
		                </div>
		                <!--end::Alert-->
				    	<?php
				    }
				  }
				} else {
				  ?>
				  	<!--begin::Form-->
				<h1>Send Resume/CV</h1><br>
				<form action="../upload.php" method="POST" enctype="multipart/form-data">
				  Select file to upload:
				  <input type="hidden" name="applicant_id" value="<?php echo$user_id?>">
				  <input type="hidden" name="posting_id" value="<?php echo$id?>">
				  <input type="file" name="fileToUpload" id="fileToUpload">
				  <input type="submit" value="Upload Image" name="submit">
				</form>
				  <?php
				}
			?>
			
		</div>
	</div>
</div>



<script>
	setTimeout(function() {

        var input1 = document.querySelector("#kt_tagify_1");
        new Tagify(input1);

        // var myDropzone = new Dropzone("#kt_dropzonejs_example_1", {
        	
		//     url: "../upload.php", // Set the url for your upload script location
		//     paramName: "file", // The name that will be used to transfer the file
		//     maxFiles: 15,
		//     // maxFilesize: 10, // MB
		//     addRemoveLinks: true,
		//     accept: function(file, done) {

		//         if (file.name == "wow.jpg") {
		//             done("Naha, you don't.");
		//         } else {
		//             done();
		//         }

		//         alert(done);
		//     }
		// });
         
    }, 1000);
</script>