<?php
$table="attendance";
$error="";
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
<button class="btn btn-primary" onclick="window.print()">Print</button>
<table id="kt_datatable_dom_positioning" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <thead>
        <tr class="fw-bold fs-6 text-gray-800 px-7">
            <th>Full name</th>
            <th>Date Time</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT t.*,
            (SELECT firstname FROM faculty WHERE id=t.fingerprint) AS firstname,
            (SELECT lastname FROM faculty WHERE id=t.fingerprint) AS lastname
            FROM $table t  WHERE t.table_name='faculty'";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                extract($row);
                ?>
                <tr>
                 <td><?php echo$lastname?>,<?php echo$firstname?></td>
                 <td><?php echo$date_time?></td>
                 <td><a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_3" onclick="deletes('<?php echo$id?>')"><i class="bi bi-trash"></i></a></td>
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
            "order": [[1, 'desc']],
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