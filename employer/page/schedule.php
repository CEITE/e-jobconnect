<?php
    $table="schedule";
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
            // $data.=", password='4052e09931ceddc2963e2524ee2a2bc7'";
            $data.=", date_created=NOW()";


            // $data.=", admin_id='$user_id'";
           $sql="INSERT INTO $table SET $data";

           if ($conn->query($sql) === TRUE) {
             $last_id = $conn->insert_id;


                $error="save";
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
<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_1">Add New</button>
<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <thead>
        <tr class="fw-bold fs-6 text-gray-800 px-7">
            <th>Grade</th>
            <th>Strand</th>
            <th>Section</th>
            <th>Faculty</th>
            <th>Day</th>
            <th>Time</th>
            <th>Room</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT t.*,
            (SELECT lastname FROM faculty WHERE id=t.faculty_id) AS lastname,
            (SELECT firstname FROM faculty WHERE id=t.faculty_id) AS firstname
             FROM $table t";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            extract($row);
                            ?>
                            <tr>
                                <td><?php echo$grade?></td>
                                <td><?php echo$strand?></td>
                                <td><?php echo$section?></td>
                                <td><?php echo$lastname?>, <?php echo$firstname?> </td>
                                <td><?php echo$days?></td>
                                <td><?php echo$date_time?></td>
                                <td><?php echo$room?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_2"
                                    onclick="edits('<?php echo$id?>','<?php echo$grade?>','<?php echo$strand?>','<?php echo$section?>','<?php echo$faculty_id?>','<?php echo$days?>','<?php echo$date_time?>','<?php echo$room?>')"
                                    ><i class="bi bi-pencil"></i></a>
                                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_3" onclick="deletes('<?php echo$id?>')"><i class="bi bi-trash"></i></a>
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
                    <input class="form-control" type="" name="grade" placeholder="Grade"><br>
                    <select class="form-control" name="strand">
                        <option></option>
                        <option>STEM</option>
                        <option>HUMSS</option>
                        <option>ABM</option>
                    </select><br>
                    <input class="form-control" type="" name="section" placeholder="Section"><br>
                    <select class="form-control" name="faculty_id">
                        <?php
                            $sql = "SELECT * FROM faculty ";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                extract($row);
                                ?>
                                <option value="<?php echo$id?>"><?php echo$lastname?>, <?php echo$firstname?></option>
                                <?php
                              }
                            }
                        ?>
                    </select><br>
                    <input class="form-control" type="" name="days" placeholder="Day"><br>
                    <input class="form-control" type="" name="date_time" placeholder="Time"><br>
                    <input class="form-control" type="" name="room" placeholder="Room"><br>
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


    function edits(id,grade,strand,section,faculty_id,days,date_time,room){
        var form= document.edit;

        form.id.value=id;
        form.grade.value=grade;
        form.strand.value=strand;
        form.section.value=section;
        form.faculty_id.value=faculty_id;
        form.days.value=days;
        form.date_time.value=date_time;
        form.room.value=room;
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
                    <input class="form-control" type="" name="grade" placeholder="Grade"><br>
                    <select class="form-control" name="strand">
                        <option></option>
                        <option>STEM</option>
                        <option>HUMSS</option>
                        <option>ABM</option>
                    </select><br>
                    <input class="form-control" type="" name="section" placeholder="Section"><br>
                    <select class="form-control" name="faculty_id">
                        <?php
                            $sql = "SELECT * FROM faculty ";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                              // output data of each row
                              while($row = $result->fetch_assoc()) {
                                extract($row);
                                ?>
                                <option value="<?php echo$id?>"><?php echo$lastname?>, <?php echo$firstname?></option>
                                <?php
                              }
                            }
                        ?>
                    </select><br>
                    <input class="form-control" type="" name="days" placeholder="Day"><br>
                    <input class="form-control" type="" name="date_time" placeholder="Time"><br>
                    <input class="form-control" type="" name="room" placeholder="Room"><br>
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
            <form method="GET" name="delete" action="?page=schedule">
                <div class="modal-body">
                    <input type="hidden" name="page" value="<?php echo$page?>">
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


