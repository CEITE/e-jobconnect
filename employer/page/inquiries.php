<?php
$table="msg";
$error="";
	extract($_GET);


				$sql = "SELECT * FROM applicant WHERE id='$applicant'";
				$result = $conn->query($sql);

				$row = $result->fetch_assoc();
				extract($row);

				 if(isset($_POST['send'])){
			        extract($_POST);
			            $data="";

			            foreach ($_POST as $k => $v){

			                if(empty($data)){
			                    $data .= " $k='$v' ";
			                }else{
			                    if($k=="send"){
			                        $data .= "";
			                    }else{
			                        $data .= ", $k='$v' ";
			                    }
			                    
			                }
			            }

			            

			            $data;
			            $data.=", date_created=NOW()";



			            // $data.=", admin_id='$user_id'";
			           $sql="INSERT INTO $table SET $data";

			           if ($conn->query($sql) === TRUE) {
			             $last_id = $conn->insert_id;

			             $error="sent";

			            } else {
			              echo "Error: " . $sql . "<br>" . $conn->error;
			            }

			    }
?>		
						<div class="d-flex flex-column flex-lg-row">
										<!--begin::Content-->
										<div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
											<!--begin::Messenger-->
											<div class="card" id="kt_chat_messenger">
												<!--begin::Card header-->
												<div class="card-header" id="kt_chat_messenger_header">
													<!--begin::Title-->
													<div class="card-title">
														<!--begin::Users-->
														<div class="symbol-group symbol-hover">
															<!--begin::Avatar-->
															<!-- <div class="symbol symbol-35px symbol-circle">
																<img alt="Pic" src="../assets/media/avatars/blank.jpg">
															</div> -->
															<?php echo$firstname?> <?php echo$lastname?>
														</div>
														<!--end::Users-->
													</div>
													<!--end::Title-->
												</div>
												<!--end::Card header-->
												<!--begin::Card body-->
												<div class="card-body" id="kt_chat_messenger_body">
													<!--begin::Messages-->
													<div class="scroll-y me-n5 pe-5 h-300px h-lg-auto" data-kt-element="messages" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_header, #kt_app_header, #kt_app_toolbar, #kt_toolbar, #kt_footer, #kt_app_footer, #kt_chat_messenger_header, #kt_chat_messenger_footer" data-kt-scroll-wrappers="#kt_content, #kt_app_content, #kt_chat_messenger_body" data-kt-scroll-offset="5px" style="max-height: 487px;">
														<!--begin::Message(in)-->

														<?php

															$sql = "SELECT * FROM $table WHERE sender='$user_id' AND receiver='$applicant' OR sender='$applicant' AND receiver='$user_id'";
															$result = $conn->query($sql);

															if ($result->num_rows > 0) {
															  // output data of each row
															  while($row = $result->fetch_assoc()) {
															   		extract($row);

															   		if($sender==$user_id){
															   			?>
															   				<!--begin::Message(out)-->
																		<div class="d-flex justify-content-end mb-10">
																			<!--begin::Wrapper-->
																			<div class="d-flex flex-column align-items-end">
																				<!--begin::Text-->
																				<div class="p-5 rounded bg-light-primary text-gray-900 fw-semibold mw-lg-400px text-end" data-kt-element="message-text"><?php echo$msg?></div>
																				<!--end::Text-->
																			</div>
																			<!--end::Wrapper-->
																		</div>
																		<!--end::Message(out)-->
															   			<?php
															   		}else{
															   			?>
															   			<div class="d-flex justify-content-start mb-10">
																			<!--begin::Wrapper-->
																			<div class="d-flex flex-column align-items-start">
																				<!--end::User-->
																				<!--begin::Text-->
																				<div class="p-5 rounded bg-light-info text-gray-900 fw-semibold mw-lg-400px text-start" data-kt-element="message-text"><?php echo$msg?></div>
																				<!--end::Text-->
																			</div>
																			<!--end::Wrapper-->
																		</div>
																		<!--end::Message(in)-->
															   			<?php
															   		}
															  }
															} else {
															  echo "Start a message";

															  ?>
															  	
																
															  <?php
															}
														?>
														
													</div>
													<!--end::Messages-->
												</div>
												<!--end::Card body-->
												<!--begin::Card footer-->
												<div class="card-footer pt-4" id="kt_chat_messenger_footer">
													<form method="POST">
														<!--begin::Input-->
														<textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input" name="msg" placeholder="Type a message"></textarea>
														<!--end::Input-->
														<!--begin:Toolbar-->
														<div class="d-flex flex-stack">
															<!--begin::Actions-->
															<div class="d-flex align-items-right me-2">
																<input type="hidden" name="receiver" value="<?php echo$applicant?>">
																<input type="hidden" name="sender" value="<?php echo$user_id?>">
																<button class="btn btn-primary" type="submit"  name="send" >Send</button>
															</div>
															<!--end::Actions-->
															<!--begin::Send-->
															
															<!--end::Send-->
														</div>
														<!--end::Toolbar-->
													</form>
												</div>
												<!--end::Card footer-->
											</div>
											<!--end::Messenger-->
										</div>
										<!--end::Content-->
									</div>