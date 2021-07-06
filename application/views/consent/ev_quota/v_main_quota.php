<?php
/*
* v_main_quota.php
* Display v_main_quota
* @input    
* @output
* @author   Piyasak Srijan
* @Create Date 2564-04-06
*/

/*
* v_main_quota.php
* Display v_main_quota
* @input    
* @output
* @author   Piyasak Srijan
* @Create Date 2564-05-13
*/    
?>
<style>
h2 {
    color: white;
}

th {
    color: black;
    text-align: center;
    font-size: 20px;
}

td {
    text-align: center;
    font-size: 15px;
}

#add {
    margin-bottom: 4px;

}

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}

#modelText {
    text-align: center;
    color: #000000;
    font-size: 20px;
}
</style>
<script>
function get_data() {
    var qut_data = document.getElementById("qut_table").value; // get kay by id
    console.log(qut_data);
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_quota/Evs_quota/v_main_quota",
        data: {
            "qut_data": qut_data
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)
        }
    });
} //get_data
function Delete_data(qut_id) {

    console.log(qut_id);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_quota/Evs_quota/delete_quota",
        data: {
            "qut_id": qut_id
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)

        }

    });

    window.location.href = "<?php echo base_url();?>/ev_quota/Evs_quota/index";

}
//function Delete_data

function edit_data(qut_id) {

    console.log(qut_id);
    window.location.href = "<?php echo base_url(); ?>/ev_quota/Evs_quota/edit_quota_ca/" + qut_id;
}
//function edit_data

function manage_data(qut_id) {

    console.log(qut_id);
    window.location.href = "<?php echo base_url(); ?>/ev_quota/Evs_quota/manage_quota/" + qut_id;
}
</script>
<div class="col-md-12">
    <div class="panel panel-indigo">
        <div class="panel-heading">
            <h2>
                <font size="6px">Manage Quota
                </font>
            </h2>
        </div><!-- panel-heading -->

        <br>
        <div class="col-md-12 ">
            <div class="panel ">

                <div class="panel-heading bgcolor1" id="head_">

                    <a href="<?php echo base_url();?>/ev_quota/Evs_quota/add_quota_ca"><button type="submit"
                            class="btn btn-success" id="add"> <i class="fa fa-plus""></i>  &nbsp;ADD </button></a>
                    <div class=" panel-ctrls">

                </div>
                <!-- col-8 -->
            </div>
            <!-- heading -->
            <div class="panel-body no-padding">
                <div class="dataTables_wrapper form-inline no-footer" id="example_wrapper">
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6"></div>
                    </div>
					<!-- row -->
                    <table width="100%" class="table table-striped table-bordered dataTable no-footer" id="example"
                        role="grid" aria-describedby="example_info" style="width: 100%;" cellspacing="0">
                        <thead>
                            <tr role="row">
                                <th>Quota</th>
                                <th>Positon of Quota</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="qut_table">

                            <?php foreach($qut_data as $value){ ?>
                            <tr id="idquota">
                                <td><?php echo $value->qut_type;?> </td>
                                <td><?php echo $value->qut_pos;?> </td>
                                <td><?php echo $value->qut_date;?> </td>

                                <td class="center">

                                    <!-- <a href="<?php //echo base_url();?>/ev_quota/Evs_quota/manage_quota">      -->

                                    <a onclick=" manage_data( <?php echo $value->qut_id;?>)">
                                        <button type="submit" class="btn btn-info"><i
                                                class="ti ti-info-alt"></i></button></a>
                                    <a onclick="edit_data(<?php echo $value->qut_id;?>)">
                                        <button type="submit" class="btn btn-warning"><i
                                                class="ti ti-pencil-alt "></i></button></a>
                                    <a data-toggle="modal" href="#delete<?php echo $value->qut_id;?>"><button
                                            type="submit" class="btn btn-danger"><i
                                                class="ti ti-trash"></i></button></a>
                                </td>

                            </tr>

                            <?php } ?>
                        </tbody>
						<!-- tbody -->
                    </table>
					<!-- table -->
                </div>
				<!-- wrapper -->
				
            </div>
			<!--body -->

            <div class="panel-footer">

            </div>
			<!-- footer -->

        </div>
		<!-- col-12 -->
		
        <legend></legend>
        <h3>Description</h3>
        <table height="150px">
            <tr>
                <td height="20" width="50px"><button type="submit" class="btn btn-info"><i
                            class="ti ti-info-alt"></i></button></td>
                <td width="50px">
                    <h4>:</h4>
                </td>
                <td width="150px">
                    <h4>Manage quota</h4>
                </td>
            </tr>
            <tr>
                <td> <button type="submit" class="btn btn-warning"><i class="ti ti-pencil-alt "></i></button></td>
                <td width="50px">
                    <h4>:</h4>
                </td>
                <td>
                    <h4>Edit quota</h4>
                </td>
            </tr>
            <tr>
                <td><button type="submit" class="btn btn-danger"><i class="ti ti-trash"></i></button></td>
                <td width="50px">
                    <h4>:</h4>
                </td>
                <td>
                    <h4>Delete quota</h4>
                </td>
            </tr>
        </table>
		<!-- table -->
    </div>
    <!--panel-body-->
</div><!-- panel-indigo -->
</div><!-- col-md-12 -->



<?php foreach($qut_data as $value){ ?>
<!-- Modal -->
<div class="modal fade" id="delete<?php echo $value->qut_id;?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:Red;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
                    style="color:white;">&times;</button>
                <h2 class="modal-title">
                    <b>
                        <font color="white">Warning</font>
                    </b>
                </h2>
            </div>
            <div class="modal-body">
                <div class="form-horizontal">
                    <div class="form-group" align="center">
                        <div class="col-sm-12">
                            <label for="focusedinput" class="control-label" align="center">
                                <font size="5px">
                                    Do you want
                                    to delete
                                    data ?</font>
                            </label>

                        </div>
                    </div>
                </div>
                <!-- form-horizontal -->
            </div>
            <div class="modal-footer">
                <div class="btn-group pull-left">
                    <button type="button" class="btn btn-inverse" data-dismiss="modal">NO</button>
                </div>

                <button type="button" class="btn btn-success"
                    onClick="Delete_data(<?php echo $value->qut_id;?>)">YES</button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php 

} //foreach?>