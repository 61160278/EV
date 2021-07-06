<?php
/*
* report_grade.php
* Display report_grade
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2564-04-06
*/  
?>

<style>
#color_head {
    background-color: #3f51b5;
}

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}
</style>
<!-- END style -->

<script>
$(document).ready(function() {


});
// document ready

function save_group_to_HR() {

    var Emp_ID = [];
    var index = document.getElementById("table_index").value;

    for (i = 0; i < index; i++) {
        Emp_ID.push(document.getElementById("Emp_ID" + i).value);
    }
    // for 

    console.log(Emp_ID);
    console.log(index);

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_form_HD/Evs_form_HD/save_group_to_HR",
        data: {
            "Emp_ID": Emp_ID,
            "index": index
        },
        success: function(data) {
            console.log(data);
            main_index();
        },
        // success
        error: function(data) {
            console.log("9999 : error");
        }
        // error
    });
    // ajax

}
// save_group_to_HR

function main_index() {
    window.location.href = "<?php echo base_url();?>/ev_form_HD/Evs_form_HD/index";
}
// main_index 
</script>
<!-- END script -->

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading ">
                <h2>
                    <font color="#ffffff" size="6px"><b> Report Grade </b></font>
                </h2>
            </div>
            <!-- heading -->
            <div class="panel-body">
			
				<div class="row">
					<div class="col-md-6">
						<h4> Report grade myself </h4>
					</div>
					<!-- col-6 -->
				</div>
				<!-- row -->
				
				<table class="table table-bordered table-striped m-n">
                    <thead>
                        <tr>
                            <th width="2%">
                                <center> No.</center>
                            </th>
                            <th width="15%">
                                <center>Employee id</center>
                            </th>
                            <th width="15%">
                                <center>Name-Surname</center>
                            </th>
                            <th width="15%">
                                <center>Group</center>
                            </th>
                            <th width="10%">
                                <center>Year</center>
                            </th>
							<th width="20%">
                                <center>Grade</center>
                            </th>
                            <th width="10%">
                                <center>Detail</center>
                            </th>
                        </tr>
                    </thead>
                    <!-- thead -->

                    <tbody id="row_mbo">
                        <?php 
          
                                $table_index = 0;

							    foreach($emp_info as $index => $row) {
                                    if($row->emp_employee_id == $data_emp_id){
                            ?>
                        <input name="Emp_ID" id="Emp_ID<?php echo $index; ?>" type="text"
                            value="<?php echo $row->emp_employee_id ?>" hidden>
                        <tr>
                            <td>
                                <center>
                                    <?php echo $table_index+1 ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo  $row->emp_employee_id ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $row->Empname_engTitle." ".$row->Empname_eng." ".$row->Empsurname_eng ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $row->gru_name ?>
                                </center>
                            </td>
							                            <td>
                                <center>
                                    <?php echo $row->pay_year ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php 
        
                                   foreach($data_grades as $index => $row_grade) {
                                       if($row_grade->dgr_emp_id == $row->emp_id){
                                            echo $row_grade->dgr_grade;
                                       }
									   // if
                                   }
								   // foreach 
                                ?>
                                    <center>
                            </td>


                            <td align="center">
							<?php if(sizeof($data_grade) != 0){ 
								foreach($data_grades as $index => $row_grade) {
									if($row_grade->dgr_emp_id == $row->emp_id){
									?>
										
									<button class="btn btn-info" data-toggle="modal" data-target="#detail_<?php echo $row_grade->dgr_id; ?>">
										<i class="ti ti-info-alt"></i>
									</button>
								
							<?php
							        }
									// if
                                }
								// foreach
							}
							// if
							else { ?>
								<button class="btn btn-info" disabled>
                                    <i class="ti ti-info-alt"></i>
                                </button>
							<?php }
							// else 
							?>
								
                            </td>
                        </tr>
                        <?php 
                            $table_index += 1;
                                         
                                         // if
                                    }
                                    // foreach 
                                }
                                // if
                            ?>

                        <input type="text" id="table_index" value="<?php echo $table_index; ?>" hidden>
                    </tbody>
                    <!-- tbody  -->
                </table>
                <!-- table  -->
			
				<br>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<h4> Report grade of associte in group </h4>
					</div>
					<!-- col-6 -->
				</div>
				<!-- row -->
                <table class="table table-bordered table-striped m-n">
                    <thead>
                        <tr>
                            <th width="2%">
                                <center> No.</center>
                            </th>
                            <th width="15%">
                                <center>Employee id</center>
                            </th>
                            <th width="15%">
                                <center>Name-Surname</center>
                            </th>
                            <th width="15%">
                                <center>Group</center>
                            </th>
                            <th width="10%">
                                <center>Year</center>
                            </th>
							<th width="20%">
                                <center>Grade</center>
                            </th>
                            <th width="10%">
                                <center>Detail</center>
                            </th>
                        </tr>
                    </thead>
                    <!-- thead -->

                    <tbody >
                        <?php 
          
                                $table_index = 0;

							    foreach($data_group as $index => $row) {
									
                            ?>
                        <input name="Emp_ID" id="Emp_ID<?php echo $index; ?>" type="text"
                            value="<?php echo $row->emp_employee_id ?>" hidden>
                        <tr>
                            <td>
                                <center>
                                    <?php echo $index+1 ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo  $row->emp_employee_id ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $row->Empname_engTitle." ".$row->Empname_eng." ".$row->Empsurname_eng ?>
                                </center>
                            </td>
							<td>
                                <center>
                                    <?php echo $row->gru_name; ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php echo $row->pay_year; ?>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <?php 
                                   foreach($data_grade as $index => $row_grade) {
                                       if($row_grade->dgr_emp_id == $row->emp_id){
                                            echo $row_grade->dgr_grade;
                                       }
									   // if
                                   }
								   // foreach 
                                ?>
                                    <center>
                            </td>


                            <td align="center">
							<?php if(sizeof($data_grade) != 0){ 
								foreach($data_grade as $index => $row_grade) {
									if($row_grade->dgr_emp_id == $row->emp_id){
									?>
										
									<button class="btn btn-info" data-toggle="modal" data-target="#detail_<?php echo $row_grade->dgr_id; ?>">
										<i class="ti ti-info-alt"></i>
									</button>
								
							<?php
							        }
									// if
									else { ?>
									<button class="btn btn-info" disabled>
										<i class="ti ti-info-alt"></i>
									</button>
								<?php	}
									// else 
                                }

								// foreach
							}
							// if
							else { ?>
								<button class="btn btn-info" disabled>
                                    <i class="ti ti-info-alt"></i>
                                </button>
							<?php }
							// else 
							?>
								
                            </td>
                        </tr>
                        <?php 
                            $table_index += 1;
                                         
                                         // if
                                    }
                                    // foreach 
                                
                                // if
                            ?>

                        <input type="text" id="table_index" value="<?php echo $table_index; ?>" hidden>
                    </tbody>
                    <!-- tbody  -->
                </table>
                <!-- table  -->

                <br>
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <!-- col-6  -->
                    <div class="col-md-6" align="right">

                    </div>
                    <!-- col-6  -->
                </div>
                <!-- row  -->
            </div>
            <!-- body -->
        </div>
        <!-- panel -->
    </div>
    <!-- col-12  -->
</div>
<!-- row  -->


<?php
foreach($data_group as $index => $row) {
		foreach($data_grade as $index => $row_grade) {
			if($row_grade->dgr_emp_id == $row->emp_id){
			?> 

<!-- Modal show detail -->
<div class="modal fade" id="detail_<?php echo $row_grade->dgr_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:gray;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <font color="White"><b>&times;</b></font>
                </button>
                <h2 class="modal-title">
                    <b>
                        <font color="white">Report Grade</font>
                    </b>
                </h2>
            </div>
            <!-- modal header -->

            <div class="modal-body">
                <br>
                <div class="row">
					<div class="col-md-6" align="center">
                        <img src="http://10.73.148.5/DBMC/IMG/emp120/<?echo $row->Emp_ID;?>.jpg" width="30%" class="img-responsive img-circle">
					</div>
                    <!-- col-6  -->
				    <div class="col-md-6" align="center">
						<h4><?php echo "Employee ID : ".$row->Emp_ID; ?><h4>
                        <h4><?php echo $row->Empname_engTitle." ".$row->Empname_eng." ".$row->Empsurname_eng ?><h4>
                    </div>
                    <!-- col-6  -->
	
                </div>
                <!-- row  -->
				
				<hr> 
				
				<div class="row">
					<div class="col-md-6" align="center">
						<div class="alert alert-dismissable alert-success">
							<font color="Black"><h2>Grade : <?php echo $row_grade->dgr_grade; ?> </h2></font>
						</div>
						<!-- alert -->
					</div>
                    <!-- col-6  -->
					
					<div class="col-md-6" >
						<center>
							<h5>Comment</h5>
						</center>
						<hr>
						<p><?php echo $row_grade->dgr_comment; ?></p>
					</div>
                    <!-- col-6  -->
				</div>
                <!-- row  -->
				
                </div>
                <!-- row  -->
            </div>
            <!-- row  -->
        </div>
        <!-- modal-body -->
    </div>
    <!-- modal-content -->
</div>
<!-- modal-dialog -->
</div>
<!-- End Modal show detail-->

		<?php }
				// if
			}
			// foreach
	}
	// foreach 
		?>