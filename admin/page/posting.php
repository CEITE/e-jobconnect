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
                    }else if($k=="tagify"){


                        $jsonString = $v;

                        // Decode the JSON string into a PHP array of objects
                        $datas = json_decode($jsonString);
                        $datass="";

                        foreach ($datas as $item) {
                             $datass.=$item->value . ",";
                        }

                        $data .= ", $k='$datass'";

                    }else{
                        $data .= ", $k='$v' ";
                    }
                    
                }
            }

            

            $data;
            $data.=", status='pending'";
            // $data.=", password='4052e09931ceddc2963e2524ee2a2bc7'";
            $data.=", date_created=NOW()";



            // $data.=", admin_id='$user_id'";
           $sql="INSERT INTO $table SET $data";

           if ($conn->query($sql) === TRUE) {
             $last_id = $conn->insert_id;

              $error="add";
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
                    }else if($k=="tagify"){


                        $jsonString = $v;

                        // Decode the JSON string into a PHP array of objects
                        $datas = json_decode($jsonString);
                        $datass="";

                        foreach ($datas as $item) {
                             $datass.=$item->value . ",";
                        }

                        $data .= ", $k='$datass'";

                    }else{
                    if($k=="save"){
                        $data .= "";
                    }else{
                        $data .= ", $k='$v' ";
                    }
                    
                }
            }

            

            $data;

           $sql="UPDATE $table SET $data WHERE id='$id'";

           if ($conn->query($sql) === TRUE) {
             //$last_id = $conn->insert_id;


                $error="save";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }

    if(isset($_GET['approved'])){
        extract($_GET);
            $id=$approved;

            $sql="UPDATE $table SET status='approved' WHERE id='$id'";

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
                        <span>New data add successfully</span>
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
            <th>Skill requirements</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT t.*,
            (SELECT firstname FROM employer WHERE id=t.employer_id) AS firstname,
            (SELECT lastname FROM employer WHERE id=t.employer_id) AS lastname
             FROM $table t ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                extract($row);

                if($status=="pending"){
                    $colors="warning";
                }else if($status=="approved"){
                    $colors="success";
                }else{
                    $colors="danger";
                }

                ?>
                <tr>
                    <td><?php echo$firstname?> <?php echo$lastname?></td>
                    <td><?php echo$title?></td>
                    <td><?php echo$date_created?></td> 
                    <td><input class="form-control disable" disabled="" value="<?php echo$tagify?>" tagifies=''> </td>
                    <td><span class="badge badge-light-<?php echo$colors?>"><?php echo$status?></span></td>
                    <td>
                        <input type="hidden" id="description_<?php echo$id?>" value='<?php echo$description?>'>
                        <!-- <a class="btn btn-light-primary btn-sm" href="?page=application&applicant=<?php echo$id?>" ><i class="bi bi-people"></i> Applicant <span class="badge badge-primary">0</span></a> -->
                        <a class="btn btn-light-info btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_2" onclick="form_data('<?php echo$id?>','<?php echo$title?>','<?php echo$tagify?>')" ><i class="bi bi-eye"></i> View</a>
                        <?php
                            if($status=="pending"){
                                ?>
                                <a class="btn btn-light-success btn-sm" href="?page=<?php echo$page?>&approved=<?php echo$id?>" ><i class="bi bi-check"></i> Approved</a>
                                <?php
                            }
                        ?>
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

        var input1 = document.querySelector("#kt_tagify_1");
        new Tagify(input1);

       

        var options = {selector: "#kt_docs_tinymce_basic", height : "480"};

        if ( KTThemeMode.getMode() === "dark" ) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }

        tinymce.init(options);


        var options = {selector: "#kt_docs_tinymce_basics", height : "480"};

        if ( KTThemeMode.getMode() === "dark" ) {
            options["skin"] = "oxide-dark";
            options["content_css"] = "dark";
        }

        tinymce.init(options);



        var input2 = document.querySelector("[tagifies='']");
        new Tagify(input2);

         

    }, 1000);

    function tagifiess(){
        var input3 = document.querySelector("#kt_tagify_3");
        new Tagify(input3);
    }
</script>

<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-xl">
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
                    <input class="form-control" type="" name="title" placeholder="Title"><br>
                    <input type="hidden" name="employer_id" value="<?php echo$user_id?>">
                    <textarea id="kt_docs_tinymce_basic" name="description" class="tox-target" placeholder="Tell something you looking for"></textarea><br>
                    <div class="mb-10">
                            <label class="form-label">Skill Requirements </label>
                            <input class="form-control" name="tagify" value="" id="kt_tagify_1"/>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add">Add</button>
                </div>
           </form>
        </div>
    </div>
</div>

<script>
    function form_data(id,title,tagifys){
        document.edit_form.id.value=id;
        document.edit_form.title.value=title;
        // document.edit_form.description.innerHTML=description;
        document.edit_form.tagify.value=tagifys;

        var description="description_"+id;

        

        // Get the editor instance by its ID
        var editor = tinymce.get('kt_docs_tinymce_basics');

        // Set the content
        if (editor) {
          editor.setContent(document.getElementById(description).value);
        }
        tagifiess();


        

    }
</script>
<div class="modal fade" tabindex="-1" id="kt_modal_2">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

           <form method="POST" name="edit_form">
                <div class="modal-body">
                    <input type="hidden" name="id">
                    <input class="form-control" type="" name="title" placeholder="Title"><br>
                    <input type="hidden" name="employer_id" value="<?php echo$user_id?>">
                    <textarea id="kt_docs_tinymce_basics" name="description" class="tox-target" placeholder="Tell something you looking for"></textarea><br>
                    <div class="mb-10">
                        <label class="form-label">Skill Requirements </label>
                        <input class="form-control" name="tagify" value="" id="kt_tagify_3"/>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary" name="save">Save</button> -->
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
            <form method="GET" name="delete" >
                <div class="modal-body">
                    <input type="hidden" name="page" value="<?php echo$page?>">
                    <input class="" type="hidden" name="id"><br>
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
