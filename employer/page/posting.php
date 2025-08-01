<?php
    $table="posting";
    $error=0;

    if(isset($_POST['add'])){
        extract($_POST);
            $data="";

            foreach ($_POST as $k => $v){

                if(empty($data)){
                    $data .= " $k='$v' ";
                }else{
                    if($k=="add"){
                        $data .= "";
                    }else{
                        $data .= ", $k='$v' ";
                    }
                    
                }
            }

            

            $data;
            $data.=", password='4052e09931ceddc2963e2524ee2a2bc7'";
            $data.=", date_created=NOW()";



            // $data.=", admin_id='$user_id'";
           $sql="INSERT INTO $table SET $data";

           if ($conn->query($sql) === TRUE) {
             $last_id = $conn->insert_id;

             ?>
             <script type="text/javascript">
                window.open('fingerprint.php?page=student&id=<?php echo$last_id?>&action=enroll','_parent');
                 //location.href="?page=student&id=<?php echo$last_id?>&action=enroll"
             </script>
             <?php
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }

    }

    if(isset($_POST['save'])){
        extract($_POST);
            $data="";

            foreach ($_POST as $k => $v){

                if(empty($data)){
                    $data .= " $k='$v' ";
                }else{
                    if($k=="save"){
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


                $error="save";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }
    
    if(isset($_GET['remove'])){
        extract($_GET);
            $data="";

            $sql="DELETE FROM $table WHERE id='$id'";

           if ($conn->query($sql) === TRUE) {
             //$last_id = $conn->insert_id;


                $error="delete";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }

    }

?>
<?php
        if($error == "add"){
            ?>
                <!--begin::Alert-->
                <div class="alert alert-success d-flex align-items-center p-5">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
                    <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column">
                        <!--begin::Title-->
                        <h4 class="mb-1 text-success">This is an alert</h4>
                        <!--end::Title-->

                        <!--begin::Content-->
                        <span>New user add successfully</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Alert-->
            <?php
        }else if($error == "save"){
            ?>
                <!--begin::Alert-->
                <div class="alert alert-success d-flex align-items-center p-5">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-shield-tick fs-2hx text-success me-4"><span class="path1"></span><span class="path2"></span></i>
                    <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column">
                        <!--begin::Title-->
                        <h4 class="mb-1 text-success">This is an alert</h4>
                        <!--end::Title-->

                        <!--begin::Content-->
                        <span>Save successfully</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Alert-->
            <?php
        
        }else if($error == "delete"){
            ?>
                <!--begin::Alert-->
                <div class="alert alert-danger d-flex align-items-center p-5">
                    <!--begin::Icon-->
                    <i class="ki-duotone ki-shield-tick fs-2hx text-danger me-4"><span class="path1"></span><span class="path2"></span></i>
                    <!--end::Icon-->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column">
                        <!--begin::Title-->
                        <h4 class="mb-1 text-danger">This is an alert</h4>
                        <!--end::Title-->

                        <!--begin::Content-->
                        <span>Deleted successfully</span>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Alert-->
            <?php
        
        }else{

        }
?>
<!-- <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_1">Add New</button> -->
<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <thead>
        <tr class="fw-bold fs-6 text-gray-800 px-7">
            <th>Employer</th>
            <th>Title</th>
            <th>Date Created</th>
            <th>Tagify</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM $table";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                extract($row);
                ?>
                <tr>
                    <td><?php echo$employer?></td>
                    <td><?php echo$title?></td>
                    <td><?php echo$date_created?></td>
                    <td><?php echo$tagify?></td>
                    <td><span class="badge badge-light-success"><?php echo$status?></td>
                    <td>
                        <a class="btn btn-light-info btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_3" onclick="deletes('<?php echo$id?>')"><i class="bi bi-eye"></i> View</a>
                        <a class="btn btn-light-danger btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_3" onclick="deletes('<?php echo$id?>')"><i class="bi bi-trash"></i> Remove</a>
                    </td>
                </tr>
                <?php
              }
            }
        ?>
    </tbody>
</table>

<script type="text/javascript">
    function table(){
        $("#kt_datatable_dom_positioning").DataTable({
            "language": {
                "lengthMenu": "Show _MENU_",
            },
            "dom":
                "<'row mb-2'" +
                "<'col-sm-6 d-flex align-items-center justify-conten-start dt-toolbar'l>" +
                "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                ">" +

                "<'table-responsive'tr>" +

                "<'row'" +
                "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                ">"
        });
    }

    setTimeout(function() {
        table();
        $('#myModal').modal('show');

    }, 1000);
</script>

<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

           <form method="POST">
                <div class="modal-body">
                    <input class="form-control" type="" name="firstname" placeholder="Firstname"><br>
                    <input class="form-control" type="" name="lastname" placeholder="Lastname"><br>
                    <input class="form-control" type="email" name="email" placeholder="Email"><br>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add">Save changes</button>
                </div>
           </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    function edits(id,student_number,firstname,lastname,email,contact,strand,grade,section){
        var form= document.edit;

        form.id.value=id;
        form.student_number.value=student_number;
        form.firstname.value=firstname;
        form.lastname.value=lastname;
        form.email.value=email;
        form.contact.value=contact;
        form.strand.value=strand;
        form.grade.value=grade;
        form.section.value=section;
    }
</script>
<div class="modal fade" tabindex="-1" id="kt_modal_2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit New</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

           <form method="POST" name="edit">
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="id"><br>
                    <input class="form-control" type="" name="student_number" placeholder="Student Number"><br>
                    <input class="form-control" type="" name="firstname" placeholder="Firstname"><br>
                    <input class="form-control" type="" name="lastname" placeholder="Lastname"><br>
                    <input class="form-control" type="" name="email" placeholder="Email"><br>
                    <input class="form-control" type="" name="contact" placeholder="Contact"><br>
                    <input class="form-control" type="" name="strand" placeholder="Strand"><br>
                    <input class="form-control" type="" name="grade" placeholder="Grade"><br>
                    <input class="form-control" type="" name="section" placeholder="Section"><br>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="save">Save changes</button>
                </div>
           </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function deletes(id){
        var form=document.delete;

        form.id.value=id;
    }
</script>
<div class="modal fade" tabindex="-1" id="kt_modal_3">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"></h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <form method="GET" name="delete" action="fingerprint.php">
                <div class="modal-body">
                    <input class="form-control" type="hidden" name="id"><br>
                    <input type="hidden" name="action" value="delete">
                    <center><label class="h1">Are you sure want to delete?</label></center>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="remove">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
