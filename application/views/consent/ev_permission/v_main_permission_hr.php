<?php
/*
* v_main_group.php
* Display v_main_group
* @input    
* @output
* @author Tippawan Aiemsaad, Jirayu Jaravichit
* @Create Date 2564-04-08
*/  
?>

<script>

function test(value){
if(value == "0"){window.location.href = "<?php echo base_url();?>/ev_permission/Evs_permission/index";}
	else if(value == "1"){
	window.location.href = "<?php echo base_url();?>/ev_permission/Evs_group/select_company_sdm";}
	else{window.location.href = "<?php echo base_url();?>/ev_permission/Evs_permission/select_Department_PD";}
}


</script>

<!DOCTYPE html>
<html>
	<div class="col-md-12">
		<div class="panel panel-indigo">
			<div class="panel-heading">
				<h1 style="font-family:'Times New Roman'"><font color = "#ffffff" size = "7px"><b>Manage Group SDM</b></font>
					<div class="panel pull-right" id="addtable_filter">
							<select name="example_length" class="form-control" aria-controls="example" onChange="test(value)">
								<option value="0">Select Department</option>
								<option value="1" selected>PD</option>
								<option value="2">LU</option>
								<option value="3">PUR</option>
								<option value="4">CORPS</option>
								<option value="5">HR</option>
								<option value="6">GA</option>
								<option value="7">PE</option>
								<option value="8">QA</option>
								<option value="9">PC</option>
								<option value="10">TIE</option>
								<option value="11">SE</option>
								<option value="12">MC</option>
								<option value="13">MS</option>
								<option value="14">CPC</option>
								<option value="15">GM</option>
								<option value="16">PD</option>
								<option value="17">PUR</option>
								<option value="18">PE</option>
								
							</select>
					</div>
					<!-- select company -->
				</h1>
			</div>
			<!-- panel-heading -->
			
			
			<div class="col-md-12">
				<div class="panel-body">
					<div class="panel panel-indigo" id="panel-addtable">
						<div class="panel-heading">
							<div class="panel-ctrls"></div>
								<div class="DTTT btn-group pull-right mt-sm">
									&emsp;
									<a data-toggle="modal" class="btn btn btn-success" href="#Add">
										<i class="ti ti-plus"></i>
											<span>ADD</span>
									</a>
								</div>
								<!-- add page 1 -->
						</div>
						<!-- panel-heading -->
						
						<div class="panel-body no-padding">
							<div id="example_wrapper" class="dataTables_wrapper form-inline no-footer">
								<div class="row">
									<div class="col-sm-6"></div>
									<div class="col-sm-6"></div>
								</div>
						
								<table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
									<thead>
										<tr style="background-color:lavender;">
											<th><center>No.</th>
											<th><center>Group</th>
											<th><center>Head Dept.</th>
											<th><center>Action</th>
										</tr>
									</thead>
									
									<tbody>
										<tr class="odd gradeX" align = 'center'>
											<td>1</td>
											<td>ACC</td>
											<td>TAKUMA YAMAMOTO</td>
											<td>
												<div class="demo-btns">
													<a data-toggle="modal" class="btn btn btn-danger" href="#Delete">
														<i class="ti ti-trash"></i>
													</a>
													<a data-toggle="modal" class="btn btn-warning" href="#Edit">
														<i class="ti ti-pencil-alt"></i>
													</a>
													<a href ="<?php echo base_url(); ?>/ev_group/Evs_group/add_group_sdm"  data-toggle="modal" class="btn btn-info" href="#">
														<i class="ti ti-info-alt"></i>
													</a>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
								<!-- table -->
							</div>
							<!-- example_wrapper -->
						</div>
						<!-- no-padding -->
						
						<div class="panel-footer">
							<div class="row">
								<div class="col-sm-6">
									<div class="dataTables_info" id="example_info" role="status" aria-live="polite"></div>
								</div>
							</div>
						</div>
						<!-- panel-footer -->
					</div>
					<!-- panel-addtable -->
					<h4 class="text">Description</h4>
					<div>
						<a class="btn btn-danger" href="#">
							<i class="ti ti-trash"></i>
							&nbsp;
							Delete
						</a>
						<a class="btn btn-warning" href="#">
							<i class="ti ti-pencil-alt"></i>
							&nbsp;
							Edit
						</a>
						<a class="btn btn-info" href="#">
							<i class="ti ti-info-alt"></i>
							&nbsp;
							Info
						</a>
					</div>
				</div>
				<!-- panel-body -->
			</div>
			<!-- col inside-->
		</div>
		<!-- head panel -->
	</div>
	<!-- head outside -->
</html>

<head>
	<style>
	thead{
	  color: black;
	  font-size: 17px;
	}

	tbody{
	  color: black;
	  font-size: 14px;
	}
	</style>
</head>

<!-- Modal Add -->
	<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color:gray;">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><font color="White"><b>&times;</b></font></button>
						<h2 class="modal-title"><b><font color="white">Add Group Data & Head Dept.</font></b></h2>		
				</div>
				<!-- modal header -->
				
				<div class="modal-body">
					<form class="form-horizontal">
						<div class="form-group">
							<label for="focusedinput" class="col-sm-3 control-label">Group Name</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="focusedinput" placeholder="HR AGM">
								</div>						
						</div>
						<!-- Group Name -->
						
						<h2 style="font-family:'Courier New'"><b><font size = "4px" color="Black">Select Head Dept.</font></b></h2>
						
						<div class="form-group">
							<label for="focusedinput" class="col-sm-3 control-label">Emp. ID</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="focusedinput" placeholder="JS000xxx">
								</div>
						</div>
						<!--Emp. ID -->
								
						<div class="form-group">
							<label for="focusedinput" class="col-sm-3 control-label">Name - Surname</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="focusedinput" placeholder="Name Surname">
								</div>
						</div>
						<!-- Name Surname -->
					</form>
					<!-- form-horizontal -->
				</div>
				<!-- modal-body -->
							
				<div class="modal-footer">
					<div class="btn-group pull-left">	
						<button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button>
					</div>
						<a href ="<?php echo base_url(); ?>/ev_group/Evs_group/add_group_sdm">
							<button type="button" class="btn btn-success">SAVE</button>
						</a>
				</div>
				<!-- modal-footer -->
			</div>
			<!-- modal-content -->
		</div>
		<!-- modal-dialog -->
	</div>
	<!-- End Modal Add-->

<!-- Model Edit -->	
	<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color:gray;">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><font color="White"><b>&times;</b></font></button>
						<h2 class="modal-title"><b><font color="white">Edit Group Data & Head Dept.</font></b></h2>		
				</div>
				<!-- modal header -->
				
				<div class="modal-body">
					<form class="form-horizontal">
						<div class="form-group">
							<label for="focusedinput" class="col-sm-3 control-label">Group Name</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="focusedinput" placeholder="HR AGM">
								</div>						
						</div>
						<!-- Group Name -->
						
						<h2 style="font-family:'Courier New'"><b><font size = "4px" color="Black">Select Head Dept.</font></b></h2>
						
						<div class="form-group">
							<label for="focusedinput" class="col-sm-3 control-label">Emp. ID</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="focusedinput" placeholder="JS000xxx">
								</div>
						</div>
						<!--Emp. ID -->
								
						<div class="form-group">
							<label for="focusedinput" class="col-sm-3 control-label">Name - Surname</label>
								<div class="col-sm-6">
									<input type="text" class="form-control" id="focusedinput" placeholder="Name Surname">
								</div>
						</div>
						<!-- Name Surname -->
					</form>
					<!-- form-horizontal -->
				</div>
				<!-- modal-body -->
							
				<div class="modal-footer">
					<div class="btn-group pull-left">	
						<button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button>
					</div>
						<a href ="<?php echo base_url(); ?>/ev_group/Evs_group/select_company_sdm">
							<button type="button" class="btn btn-success">SAVE</button>
						</a>
				</div>
				<!-- modal-footer -->
			</div>
			<!-- modal-content -->
		</div>
		<!-- modal-dialog -->
	</div>
	<!-- End Modal Edit_add-->	
	
<!-- Modal Delete -->
	<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color:gray;">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><font color="White"><b>&times;</b></font></button>	
				</div>
				<!-- Modal header -->
				
				<div class="modal-body">	
					<div class="form-horizontal">
						<div class="form-group" align = "center">
							<div class="col-sm-12">
								<label for="focusedinput" class="control-label" style="font-family:'Courier New'" align = "center"><font size = "5px">Do you want to Delete Data YES or NO ?</font></label>
							</div>
						</div>
					</div>
					<!-- form-horizontal -->
				</div>
				<!-- Modal body -->
				
				<div class="modal-footer">
					<div class="btn-group pull-left">	
						<button type="button" class="btn btn-inverse" data-dismiss="modal">NO</button>
					</div>
						<button type="button" class="btn btn-success" data-dismiss="modal">YES</button>
				</div>
				<!-- Modal footer -->
			</div>
			<!-- modal-content -->
		</div>
		<!-- modal-dialog -->
	</div>
	<!-- End Modal Delete -->	
	
	
	
