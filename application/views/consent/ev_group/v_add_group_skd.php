<?php
/*
* v_add_group_skd.php
* Display v_add_group_skd
* @input    
* @output
* @author Tippawan Aiemsaad, Jirayu Jaravichit
* @Create Date 2564-04-08
*/  
?>


<!-- Add group contact-->
	<div class="col-md-12">
		<div class="panel panel-indigo">
			<div class="panel-heading">
				<h1 style="font-family:'Times New Roman'"><font color = "#ffffff" size = "7px"><b> Manage Group SKD & Head Dept. </b></font></h1>
			</div>
			
			<div class = "col-sm-12">
				<h3 style="font-family:'Arial'"><font size = "3px" font color="black"> Please select contact group for add contact to the group.</font></h3>
			</div>
			
			<div class="col-md-6">
				<div class="panel-body">
					<div class="panel panel-indigo" id="table_contact">
						<div class="panel-heading">
						
						<div class="panel pull-right" id="addtable_filter">
							<select name="example_length" class="form-control" aria-controls="example" >
								<option value="">Select Group Contact </option>
								
							</select>
					</div>
						
							<div class="panel-ctrls"></div>
						</div>
						
						<div class="panel-body no-padding">
							<div id="row_addtable" class="dataTables_wrapper form-inline no-footer">
								<div class="row">
									<div class="col-sm-6"></div>
									<div class="col-sm-6"></div>
								</div>
						
								<table id="add_table" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
									<thead>
										<tr style="background-color:lavender;">
											<th><center>Select</th>
											<th><center>Emp.ID</th>
											<th><center>Name - Surname</th>
											<th><center>Section Code</th>
										</tr>
									</thead>
									
									<tbody>
										<tr class="odd gradeX" align = 'center'>
											<td>
												<div class="checked block">
													<input name="checkbox" type="checkbox">
												</div>
											</td>
											<td>00000</td>
											<td>KOBSOOK INTACHOT</td>
											<td>6190</td>
										</tr>
									</tbody>
								</table>
								<!-- table -->
							</div>
							<!-- row_addtable -->
						</div>
						<!-- panel-body no-padding -->
						
						<div class="panel-footer">
							<div class="row">
								<div class="col-sm-6">
									<div class="dataTables_info" id="table_add" role="status" aria-live="polite"></div>
								</div>
							</div>
						</div>
						<!-- panel-footer -->
						
						<div class="DTTT btn-group pull-right mt-sm">
							<a data-toggle="modal" class="btn btn btn-success">
								<i class="ti ti-plus"></i>
									<span>ADD</span>
							</a>
						</div>
						<!-- add -->
						
					</div>
					<!-- table_contact -->
					
					
					<div class="DTTT btn-group pull-left mt-sm">
						<a href ="<?php echo base_url(); ?>/ev_group/Evs_group/index">					
							<button type="button" class="btn btn-inverse" data-dismiss="modal">CANCEL</button>
						</a>
					</div>
					<!-- CANCEL -->
				</div>
				<!-- panel-body -->
			</div>
			<!-- tabel left -->
			
			<div class="col-md-6">
				<div class="panel-body">
					<div class="panel panel-indigo" id="panel-addtable">
						<div class="panel-heading">
							<h2><font size = "4px">HR AGM</font></h2>
						<div class="panel-ctrls"></div>
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
									<tr style="background-color:lavender;" align = "center">
										<th><center>Select</th>
										<th><center>Emp.ID</th>
										<th><center>Name - Surname</th>
										<th><center>Section Code</th>
									</tr>
								</thead>
								
								<tbody>
									<tr class="odd gradeX" align = 'center'>
										<td >
											<div class="checked block">
												<input name="example" type="checkbox">
											</div>
										</td>
										<td>00453</td>
										<td>KOBSOOK INTACHOT</td>
										<td>6190</td>
									</tr>
								</tbody>
							</table>
							<!-- table -->
							</div>
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
						
						<div class="DTTT btn-group pull-left mt-sm">
							&emsp;
							<a data-toggle="modal" class="btn btn btn-danger" href="#Resign">
								<i class="ti ti-share-alt"></i>
								&nbsp
								<span>RESIGN</span>
							</a>
						</div>
						<!-- RESIGN -->
						
						<div class="DTTT btn-group pull-right mt-sm">
							<a data-toggle="modal" class="btn btn btn-danger" href="#Remove">
								<i class="ti ti-share-alt"></i>
								&nbsp
								<span>REMOVE</span>
							</a>
						</div>
						<!-- REMOVE -->
					</div>
					<!-- panel-addtable -->
					
					<div class="DTTT btn-group pull-right mt-sm">
						<a href ="<?php echo base_url(); ?>/ev_group/Evs_group/index">	
							<button type="button" class="btn btn-success" data-dismiss="modal">SUBMIT</button>
						</a>
					</div>
					<!-- SUBMIT -->
				</div>
				<!-- panel-body -->
			</div>
			<!-- table right -->
		</div>
		<!-- head panel -->
	</div>
	<!-- head outside -->

<style>
thead{
  color: black;
  font-size: 14px;
}

tbody{
  color: black;
  font-size: 12px;
}
</style>

<!-- RESIGN -->
<div class="modal fade" id="Resign" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header" style="background-color:gray;">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><font color="White"><b>&times;</b></font></button>	
							</div><!-- Modal header -->
							<div class="modal-body">
							
					<div class="form-horizontal">
						<div class="form-group" align = "center">
						<div class="col-sm-12">
								<label for="focusedinput" class="control-label" style="font-family:'Courier New'" align = "center"><font size = "5px">Do you want to Resign Data YES or NO ?</font></label>
								</div> <!-- Name - Surname -->
						</div>
								</div> <!-- form-horizontal -->
					</div>
							<div class="modal-footer">
							<div class="btn-group pull-left">	
								<button type="button" class="btn btn-inverse" data-dismiss="modal">NO</button>
								</div>
								<button type="button" class="btn btn-success" data-dismiss="modal">YES</button>
							</div>
							
						</div><!-- modal-content -->
					</div><!-- modal-dialog -->
				</div><!-- /.modal-->
				
<!-- RESIGN -->
<div class="modal fade" id="Remove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header" style="background-color:gray;">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><font color="White"><b>&times;</b></font></button>	
							</div><!-- Modal header -->
							<div class="modal-body">
							
					<div class="form-horizontal">
						<div class="form-group" align = "center">
							<div class="col-sm-12">
								<label for="focusedinput" class="control-label" style="font-family:'Courier New'" align = "center"><font size = "5px">Do you want to Remove Data YES or NO ?</font></label>
							</div> <!-- Name - Surname -->
						</div>
								</div> <!-- form-horizontal -->
					</div>
							<div class="modal-footer">
							<div class="btn-group pull-left">	
								<button type="button" class="btn btn-inverse" data-dismiss="modal">NO</button>
								</div>
								<button type="button" class="btn btn-success" data-dismiss="modal">YES</button>
							</div>
							
						</div><!-- modal-content -->
					</div><!-- modal-dialog -->
				</div><!-- /.modal-->
				
			

