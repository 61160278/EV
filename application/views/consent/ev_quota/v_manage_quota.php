<?php
/*
* v_mange_quota.php
* Display v_main_permission
* @input    
* @output
* @author   Piyasak Srijan
* @Create Date 2564-04-06
*/  
?>
<script>
$(document).ready(function() {
	get_department()
	
	
}); //ready
function search_data() {
    var pos_lv_select = document.getElementById("pos_lv_select").value;
    var com_select = document.getElementById("com_select").value;
    var dep_select = document.getElementById("dep_select").value;
    var pos_select = document.getElementById("pos_select").value;

	console.log(pos_lv_select)
	console.log(com_select)
	console.log(dep_select)
	console.log(pos_select)
    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>ev_quota/Evs_quota/get_search_data",
        data: {
            "pos_lv_select": pos_lv_select,
			"com_select": com_select,
			"dep_sel": dep_select,
			"pos_select": pos_select
        },

        success: function(data) {

            data = JSON.parse(data)
             console.log(data)
			
            var table_data = ""

            // table_data += '<option value="0">Position</option>'
            // data.forEach((row, i) => {

            //     table_data += '<option value=" ' + row.Position_ID + '">' + row.Position_name +
            //         '</option>'

            // });

            // $('#pos_select').html(table_data);

        }
    });

} //search_data
function get_position() {
    var pos_sel = document.getElementById("pos_lv_select").value; // get kay by id
    // console.log(pos_sel);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>ev_quota/Evs_quota/get_position_level",
        data: {
            "position_level_id": pos_sel
        },

        success: function(data) {

            data = JSON.parse(data)
            // console.log(data)
            var table_data = ""
            table_data += '<option value="0">Position</option>'
            data.forEach((row, i) => {

                table_data += '<option value=" ' + row.Position_ID + '">' + row.Position_name +
                    '</option>'

            });

            $('#pos_select').html(table_data);
			search_data();

        }
    });
}


function get_department() {
    var dep_sel = document.getElementById("com_select").value; // get kay by id
    // console.log(dep_sel);

    $.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>ev_quota/Evs_quota/get_depamant",
        data: {
            "dep_id": dep_sel
        },

        success: function(data) {
            data = JSON.parse(data)
            // console.log(data)
            var table_data = ""
            table_data += '<option value="0">Department</option>'
            data.forEach((row, i) => {

                table_data += '<option value=" ' + row.Dep_id + '">' + row.Dep_Name + '</option>'

            });

            $('#dep_select').html(table_data);
			get_position();

        }
    });

}

</script>
<style>
h2 {
    color: white;
}

#numdatashow {
    margin-right: 290px;
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

h4 {
    color: black;
}
</style>

<div class="col-md-12">
    <div class="panel panel-indigo">
        <div class="panel-heading">
            <h2>
                <font size="6px">Manage Quota</font>
            </h2>
        </div>
        <div class="panel-body">
            <h4><b> Quota :</b></h4>
            <h4><b> Position of Quota :</b></h4>
            <legend></legend>
            <div>
                <label class="col-md-3">
                    <select id="com_select" name="example_length" class="form-control" onclick="get_department()">
                     											 -->
                        <!-- start foreach -->
                        <?php foreach($com_data->result() as $value){ ?>
                        <option value="<?php echo $value->Company_ID;?>">
                            <?php echo $value->Company_shortname;?>
                        </option>
                        <?php } ?>
                        <!-- end foreach -->
                    </select>
                </label>
                <label class="col-md-3">
                    <select name="example_length" class="form-control" id="dep_select" onclick ="search_data()">

                    </select>
                </label>
                <label class="col-md-3">
                    <select name="example_length" class="form-control" id="pos_lv_select" onclick="get_position()">
                       
                        <!-- start foreach -->
                        <?php foreach($psl_data->result() as $value){ ?>
                        <option value="<?php echo $value->psl_id;?>">
                            <?php echo $value->psl_position_level;?>
                        </option>
                        <?php } ?>
                        <!-- end foreach -->
                    </select>
                </label>
                <label class="col-md-3">
                    <select name="example_length" class="form-control" id="pos_select" onclick ="search_data()">

                    </select>
                </label>
            </div>
            <hr>
            <div class="col-md-12 ">
                <div class="panel panel-indigo">
                    <div class="row">
                        <div class="panel-heading">
                            <div class="panel-ctrls">
                            </div>
                        </div>
                        <div class="panel-body no-padding">
                            <div class="dataTables_wrapper form-inline no-footer" id="example_wrapper">
                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6"></div>
                                </div>
                                <table width="100%" class="table table-striped table-bordered dataTable no-footer"
                                    id="example" role="grid" aria-describedby="example_info" style="width: 100%;"
                                    cellspacing="0">
                                    <thead>
                                        <tr role="row">
                                            <th>Company</th>
                                            <th>Department</th>
                                            <th>position</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php	
									foreach ($pos_data->result() as $row ) { ?>
                                        <tr class="" role="">
                                            <td><?php echo $row->Company_shortname; ?></td>
                                            <td><?php echo $row->Dep_Name; ?></td>
                                            <td><?php echo $row->Position_name; ?></td>
                                            <td class="center">
                                                <a href="<?php echo base_url();?>/ev_quota/Evs_quota/detail_quota">
                                                    <button type="submit" class="btn btn-info"><i
                                                            class="ti ti-info-alt"></i></button></a>
                                            </td>
                                        </tr>
                                        <?php 
									} ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                        </div>
                    </div>
                </div>
                <div class="DTTT btn-group pull-left mt-sm">
                    <a href="<?php echo base_url(); ?>/ev_quota/Evs_quota/index">
                        <button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button></a>
                </div>
            </div>
            <!--panel-body-->
        </div>
    </div>
</div>