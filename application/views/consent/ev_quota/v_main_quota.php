<?php
/*
* v_main_quota.php
* Display v_main_permission
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2563-10-1
*/  
?>
<style>
h2 {
	color : white;
}
th{
	color:black;
	text-align: center;
	font-size: 20px;
}
td{
	text-align: center;
	font-size: 15px;
}
#add{
	margin-bottom: 4px;

}

#modelText{
	text-align: center;
	color: #000000;	
	font-size: 20px;
}

</style>
<div class="col-md-12">	
	<div class="panel panel-indigo">
	<div class="panel-heading">
					<h2><font size = "6px">Manage Quota</></font></h2>	
	</div><!-- panel-heading -->
	
	<br>
						<div class="col-md-12 " >
						<div class="panel panel-indigo">
					
							<div class="panel-heading" id="head_">
					
							<a href= "<?php echo base_url();?>/ev_quota/Evs_quota/add_quota_ca"><button type="submit" class="btn btn-success" id="add"> +  ADD </button></a>
								<div class="panel-ctrls">
									
									
									
							
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
								<table width="100%" class="table table-striped table-bordered dataTable no-footer" id="example" role="grid" aria-describedby="example_info" style="width: 100%;" cellspacing="0">
									<thead>
										<tr role="row">
											<th>Quota</th>
											<th>Positon of Quota</th>
											<th>data</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<tr class="gradeA odd" role="row">
								<td class="sorting_1">Year End Bonus </td>
								<td>Team Associates Above</td>
								<td>2019-05-21</td>
								<td class="center">
									<a href= "<?php echo base_url();?>/ev_quota/Evs_quota/manage_quota">
									<button type="submit" class="btn btn-info"><i class="ti ti-info-alt"></i></button></a>
									<a href= "<?php echo base_url();?>/ev_quota/Evs_quota/edit_quota">
									<button type="submit" class="btn btn-warning"><i class="ti ti-pencil-alt "></i></button></a>
									<a data-toggle = "modal" href = "#delete"><button type="submit" class="btn btn-danger" ><i class="ti ti-trash"></i></button></a>
									
									
								</td>
								
							</tr><tr class="gradeA even" role="row">
								<td class="sorting_1">Salary Increment</td>
								<td>Staff Above</td>
								<td>2019-05-21</td>
								<td class="center">
									<a href= "<?php echo base_url();?>/ev_quota/Evs_quota/manage_quota">
									<button type="submit" class="btn btn-info"><i class="ti ti-info-alt"></i></button></a>
								<a href= "<?php echo base_url();?>/ev_quota/Evs_quota/edit_quota">
									<button type="submit" class="btn btn-warning"><i class="ti ti-pencil-alt "></i></button></a>
									<a data-toggle = "modal" href = "#delete"><button type="submit" class="btn btn-danger" ><i class="ti ti-trash"></i></button></a>
									
									
								</td>
								
								
							</tr>
									</tbody>
								</table>
								</div>
							</div>
						
							<div class="panel-footer">
					
							</div>
						
					</div>
					
				</div><!--panel-body-->

	</div><!-- panel-indigo -->
</div><!-- col-md-12 -->

				<!-- Modal -->
				<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header" style = "background-color:Gray;">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true" style = "color:white;">&times;</button>
							</div>
							<div class="modal-body">
							
								<p id = "modelText"> ต้องการลบใช่ หรือ ไม่ ? </p>
	
							</div>
							<div class="modal-footer">
								<div class="btn-group pull-left">	
									<button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
								</div>
								<button type="button" class="btn btn-success">YES</button>
								
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
