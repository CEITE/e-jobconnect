<?php
 	$table="employer";
    $error=0;


	if(isset($_POST['update_info'])){
        extract($_POST);
            $data="";

            foreach ($_POST as $k => $v){

                if(empty($data)){
                    $data .= " $k='$v' ";
                }else{
                    if($k=="update_info"){
                        $data .= "";
                    }else{
                        $data .= ", $k='$v' ";
                    }
                    
                }
            }

            $data;

            // $data.=", date_created=NOW()";


            // $data.=", admin_id='$user_id'";
           $sql="UPDATE $table SET $data WHERE id='$id'";

           if ($conn->query($sql) === TRUE) {
             //$last_id = $conn->insert_id;


                $error="save_info";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }

    if(isset($_POST['update_password'])){
        extract($_POST);
            $data="";

            // foreach ($_POST as $k => $v){

            //     if(empty($data)){
            //         $data .= " $k='$v' ";
            //     }else{
            //         if($k=="update_password"){
            //             $data .= "";
            //         }else{
            //             $data .= ", $k='$v' ";
            //         }
                    
            //     }
            // }

            $data="id='$id'";

            $old_password=md5($old_password);

            if($old_password==$password){

            	if($new_password==$confirm_password){

            		$new_password=md5($new_password);

            		$data.=", password='$new_password'";

            		$sql="UPDATE $table SET $data WHERE id='$id'";

		           if ($conn->query($sql) === TRUE) {
		             //$last_id = $conn->insert_id;


		                $error="save_password";
		            } else {
		              echo "Error: " . $sql . "<br>" . $conn->error;
		            }


            	}else{
            		$error="retype_password";


            	}
            }else{
            	$error="wrong_password";
            }

            
    }
?>

<div class="container p-5">
	<div class="separator separator-content my-14">
		<span class="w-125px text-gray-500 fw-semibold fs-7">Personal Information</span>

	</div>
	<div class="card">
		<div class="card-header">
			<h2>Basic Information</h2>
		</div>
		<div class="card-body">
			<?php
				if($error=="save_info"){
					?>
					<div class="alert alert-success alert-dismissible">
					  	<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
					  	<strong>Success!</strong> Information Update Successfully
					</div>
					<?php
				}
			?>
			<form method="POST">
				<div class="row input-group input-group-md">
					<input type="hidden" name="id" value="<?php echo$id?>">
					<input type="text" class="col-md-6 pt-2 mt-5 me-2 form-control" name="firstname" value="<?php echo$firstname?>" placeholder="Firstname">
					<input type="text" class="col-md-6 pt-2 mt-5 me-2 form-control" name="lastname" value="<?php echo$lastname?>"  placeholder="Lastname">
				</div>

				<div class="row input-group input-group-md">
					<input type="text" class="col-md-6 pt-2 mt-5 me-2 form-control"  name="email" value="<?php echo$email?>"   placeholder="Email">
					<input type="text" class="col-md-6 pt-2 mt-5 me-2 form-control"  name="cp_number" value="<?php echo$cp_number?>"  placeholder="Cellphone number">
				</div>
				<div class="row input-group input-group-md">
					<textarea type="text" class="col-md-6 pt-2 mt-5 me-2 form-control" name="address"  placeholder="Please fill up address"><?php echo$address?></textarea>
				</div>
				<button class="btn btn-light-primary mt-5" name="update_info">Update</button>
			</form>
		</div>
	</div>
	<div class="separator separator-content my-14">
		<span class="w-125px text-gray-500 fw-semibold fs-7">Credentials</span>
	</div>
	<div class="card">
		<div class="card-header">
			<h2>Set New Password</h2>
		</div>
		<div class="card-body">
			<?php
				if($error=="wrong_password"){
					?>
					<div class="alert alert-danger alert-dismissible">
					  	<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
					  	<strong>Error!</strong> Wrong Password
					</div>
					<?php
				} else if($error=="retype_password"){
					?>
					<div class="alert alert-danger alert-dismissible">
					  	<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
					  	<strong>Error!</strong> Please Retype Password
					</div>
					<?php
				}else if($error=="save_password"){
					?>
					<div class="alert alert-success alert-dismissible">
					  	<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
					  	<strong>Success!</strong> Password change Successfully
					</div>
					<?php
				}
			?>
			<form method="POST">
				<input type="hidden" name="id" value="<?php echo$id?>">
				<div class="row input-group input-group-md">
					<input type="password" class="col-md-4 pt-2 mt-5 me-2 form-control" name="old_password"  placeholder="Old Password">
				</div>
				<div class="row input-group input-group-md">
					<input type="password" class="col-md-4 pt-2 mt-5 me-2 form-control" name="new_password" placeholder="New Password">
				</div>

				<div class="row input-group input-group-md">
					<input type="password" class="col-md-4 pt-2 mt-5 me-2 form-control" name="confirm_password"  placeholder="Re-enter New Password">
				</div>

				<button class="btn btn-light-primary mt-5" name="update_password">Update</button>
			</form>
		</div>
	</div>
</div>