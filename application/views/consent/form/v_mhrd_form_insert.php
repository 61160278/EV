<?php
/*
* v_form_mbo_insert
* Display form MBO management
* @input  -  
* @output -
* @author Piyasak Srijan
* @Create Date 2563-09-01
*/ 

/*
* v_form_mbo_insert
* Display form MBO management
* @input  -  
* @output -
* @author Piyasak Srijan
* @Update Date 2563-10-19
*/
?>
<?php
    $row = $info_pattern_year->row();
    $year_id = $row->pay_id;
?>
<input type="hidden" id="value_pos_id" name="value_pos_id" value="<?php echo $info_pos_id; ?>">
<input type="button" id="year" name="year" value="<?php echo $year_id; ?>">

<script>
// var index_fielld = 0; // index of field
var value_pos_id = document.getElementById("value_pos_id").value; //position ID
var value_year_id = document.getElementById("year").value; // year now ID

$(document).ready(function() {

    // load_data();

    // function load_data()
    // {
    // 	$.ajax({
    // 		url:"<?php //echo base_url(); ?>/Evs_mhrd_form/fetch",
    // 		type:"POST",
    // 		success:function(data){
    // 			$('#customer_data').html(data);
    // 		}
    // 	})
    // }

    $('#import_form').on('submit', function(form_submit) {
        form_submit.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>/Evs_mhrd_form/import",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                $('#file').val('');
                output = "";
                output += '<table class="table table-striped table-bordered">'
                output += '<tr>'
                output += '<th>Customer Name</th>'
                output += '	<th>Address</th>'
                output += '		<th>City</th>'
                output += '		<th>Postal Code</th>'
                output += '		<th>Country</th>'
                output += '	</tr>'

                data.forEach((row, index) => {
                    output += '<tr>'
                    output += '<td>' + row.CustomerName + '</td>'
                    output += '<td>' + row.Address+
                    '</td>'
                    output += '<td>' + row.City+
                    '</td>'
                    output += '<td>' + row.PostalCode+
                    '</td>'
                    output += '<td>' + row.Country+
                    '</td>'
                    output += '</tr>'

                });
                output += '</table>';
                $('#customer_data').html(output);
            }
        });
    });
});
</script>

<style>
#t01 th {

    background-color: #2c2c2c;
    color: white;

}

#panel_th_topManage {
    background-color: #c1432e;
}
</style>


<!-- Start Page Content -->
<div class="container-fluid">

    <div class="col-lg-12">
        <!-- Start Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3" id="panel_th_topManage">
                <div class="col-xl-12">
                    <h1 class="m-0 font-weight-bold text-primary">
                        <a
                            href="<?php echo base_url(); ?>/Evs_form/form_position/<?php echo $info_pos_id; ?>/<?php echo $row->pay_id; ?>">
                            <i class="fa fa-chevron-circle-left text-white"></i>
                        </a>
                        <i class="fa fa-book text-white"></i>
                        <font color="white">&nbsp;Manage Form : MHRD Form</font>
                    </h1>
                </div>
            </div>
            <div class="card-body">

                <div class="row">

                    <!-- Start Widgets -->
                    <div class="col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat">
                                            <?php 
                                               
                                                // display level of position
                                            ?>
                                        </div>
                                        <div class="text-left dib">
                                            <div class="stat-text"><span>
                                                    <?php 
                                                    // start foreach
                                                    foreach ($info_pos->result() as $row) {
                                                        //start if
                                                        if($row->Position_ID == $info_pos_id){
                                                            $pos_name_form = $row->Position_name;
                                                        }
                                                        //end if
                                                    } 
                                                    // end foreach
                                                    
                                                    echo $pos_name_form;
                                                    // display name of position

                                                    ?>

                                                </span></div>
                                            <div class="stat-heading">Position</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widgets  -->

                    <!-- Start Widgets -->
                    <div class="col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat">Fiscal year : <?php echo date("Y"); ?> </div>
                                        <div class="text-left dib">
                                            <br>

                                            <!-- start patten grade -->
                                            <div class="stat">Grade pattern :
                                                <?php 

                                                // start foreach
                                                foreach ($info_pattern_year->result() as $row) {
                                                    $year = $row->pay_pattern;
                                                } 
                                                // end foreach
                                                
                                                echo "Pettern ".$year;
                                                // display Grade pattern

                                                ?>
                                            </div>
                                            <!--End  pattern grade -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Widgets  -->
                </div>


                <div class="row">
                    <div class="container">
                        <br>
                        <form method="post" id="import_form" enctype="multipart/form-data">
                            <p><label>Select Excel File</label>
                                <input type="file" name="file" id="file" required accept=".xls, .xlsx" />
                            </p>
                            <br />
                            <input type="submit" name="import" value="Import" class="btn btn-info" />
                        </form>
                        <br />
                        <div class="table-responsive" id="customer_data">

                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-sm-12" align="right">
                        <a
                            href="<?php echo base_url(); ?>/Evs_form/form_position/<?php echo $info_pos_id; ?>/<?php echo $row->pay_id; ?>">
                            <button type="button" class="btn btn-secondary float-left">Back</button>
                        </a>


                    </div>
                    <!-- Back to main form by position  -->
                </div>
                <hr>
                <!-- Start Description -->
                <div>
                    <h4 class="text">Description</h4><br>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- <p> SDGs : Sustainable Development Goals</p><br> -->
                    </div>
                </div>
                <!-- SDGs  -->

                <!-- End Description -->

            </div>
        </div>
        <!-- End Card -->
        <br>
    </div>
</div>
<!-- End Page Content -->
<!-- Start Moal -->
<div class="modal fade" id="confirm_save" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <h4 class="modal-title" id="staticModalLabel">
                    <center>Do you want to save ?</center>
                </h4>
            </div>
            <!-- header   -->

            <div class="modal-body">
                <p>
                    Please verify the accuracy of the information.
                </p>
            </div>
            <!-- body  -->

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary float-left" data-dismiss="modal"
                    id="cancel_modal">Cancel</button>
                <button type="button" class="btn btn-success float-right" id="confirm_modal" onclick="confirm_save()"
                    data-dismiss="modal">Confirm</button>
            </div>
            <!-- footer  -->
        </div>
        <!-- content -->
    </div>
    <!-- modal-dialog modal-md -->
</div>
<!-- End Modal -->