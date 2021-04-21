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
function get_position() {
	var pos_sel = document.getElementById("pos_select").value; // get kay by id
	console.log(pos_sel);
	
	$.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_quota/v_mange_quota",
        data: {
            "pos_id": pos_sel
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)
		}
	});
}
function get_company() {
	var cpn_sel = document.getElementById("com_select").value; // get kay by id
	console.log(cpn_sel);
	
	$.ajax({
        type: "post",
        url: "<?php echo base_url(); ?>/ev_quota/v_mange_quota",
        data: {
            "cpn_id": cpn_sel
        },
        dataType: "JSON",
        success: function(data) {
            console.log(data)
		}
	});
}

</script>
<style>
h2 {
	color : white;
}
#numdatashow{
	margin-right:290px;	
}
th {
	color:black;
	text-align: center;
	font-size: 20px;
}
td{
	text-align: center;
	font-size: 15px;
}
h4 {
	color : black;
}
</style>

<div class="col-md-12">		
	<div class="panel panel-indigo" >
		<div class="panel-heading">
			<h2><font size = "6px">Manage Quota</font></h2>	
		</div>
		<div class="panel-body">
			<h4><b> Quota	:</b></h4>
			<h4><b> Position of Quota	:</b></h4>
			<legend></legend>
			<div>	
				<label class ="col-md-4">
					<select id = "com_select" name="example_length" class="form-control">
						<option value="0">Company</option>												
						<!-- start foreach -->
						<?php foreach($com_data as $value){ ?>
						<option value="<?php echo $value->Company_ID;?>">
						<?php echo $value->Company_shortname;?>
						</option>
						<?php } ?>
						<!-- end foreach -->											
					</select>
				</label>
				<label class ="col-md-4">
					<select name="example_length" class="form-control" >												
						<option value="Human Resource">Human Resource</option>												
						<option value="25">25</option>												
						<option value="50">50</option>												
						<option value="100">100</option>											
					</select>
				</label>
				<label class ="col-md-4">
					<select name="example_length" class="form-control" id = "pos_select">									
						<option value="0">Position</option>												
						<!-- start foreach -->
						<?php foreach($pos_data as $value){ ?>
						<option value="<?php echo $value->Position_ID;?>">
						<?php echo $value->Position_name;?>
						</option>
						<?php } ?>
						<!-- end foreach -->											
					</select>
				</label>
			</div>
			<hr>
			<div class="col-md-12 " >
				<div class="panel panel-indigo" >
					<div class = "row">
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
								<table width="100%" class="table table-striped table-bordered dataTable no-footer" id="example" role="grid" aria-describedby="example_info" style="width: 100%;" cellspacing="0">
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
									foreach ($pos_data as $row ) { ?>
									<tr class="" role="">
										<td><?php echo $row->Company_shortname; ?></td>
										<td><?php echo $row->Dep_Name; ?></td>
										<td><?php echo $row->Position_name; ?></td>
										<td class="center">
											<a href= "<?php echo base_url();?>/ev_quota/Evs_quota/detail_quota">
											<button type="submit" class="btn btn-info"><i class="ti ti-info-alt"></i></button></a>
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
					<!--<a href ="<?php echo base_url(); ?>/ev_group/Evs_group/main_group">	</a>-->				
					<button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button>		
				</div>
			</div><!--panel-body-->	
		</div>
	</div>
</div>