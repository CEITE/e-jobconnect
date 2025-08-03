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
			
			
		</div>
	</div>
</div>



<script>
	setTimeout(function() {

        var input1 = document.querySelector("#kt_tagify_1");
        new Tagify(input1);
         
    }, 1000);
</script>