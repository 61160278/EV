<?php
/*
* v_main_permission.php
* Display v_main_permission
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2563-10-1
*/  
?>
<div data-widget-group="group1">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>List of Permission for Create MBO</h2>
					<input id="date" type="hidden" value="<?php echo $_POST["Date"]?>">
					<div class="panel-ctrls"></div>
				</div>
				<div class="panel-body no-padding">
					<table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>Emp. ID</th>
								<th>Name – Surname</th>
								<th>Section Code</th>
								<th>Department</th>
								<th>Position</th>
							</tr>
						</thead>
						<tbody id="show_emp" > 
							
						
							<?php 
								
								$num = 1;
								foreach($select->result() as $row ) { 
							?>
							<tr class="odd gradeX" align = 'center'>
								<td><?php echo $row->Emp_ID?></td>
								<td><?php echo $row->Empname_eng." ".$row->Empsurname_eng?></td>
								<td><?php echo $row->Sectioncode_ID?></td>
								<td><?php echo $row->Department?></td>
								<td><?php echo $row->Position_name ?></td>
							</tr>
							<?
								}
							?>
							
							
							
						</tbody>
					</table>
				</div>
				<div class="panel-footer">
				
				</div>
					
			</div>
			<div class="row">
						<div class="col-sm-8" align= "left">
							<button class="btn btn-inverse">BACK</button>
						</div>
						<div class="col-sm-4" align= "right">
							<button class="btn btn-success btn" >Submit</button>
								
						</div>
							<!-- col-sm-4 -->
					</div>
		</div>
	</div>
</div>
  
