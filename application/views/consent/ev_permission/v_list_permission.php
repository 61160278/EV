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
<script>
function emp_insert(){
	var count = document.getElementById("count").value; 
      
    console.log(count);
	
	var empid=[]
	var Posid=[]
	var Sectioncode=[]
	var Company=[]
	

	for(i=0;i<count;i++){
		empid.push(document.getElementById("empid"+i).value); 
		console.log(empid);
		
		Posid.push(document.getElementById("Posid"+i).value); 
		console.log(Posid);
		
		Sectioncode.push(document.getElementById("Sectioncode"+i).value); 
		console.log(Sectioncode);
		
		Company.push(document.getElementById("Company"+i).value); 
		console.log(Company);
		
	} // for

	$.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_permission/Evs_permission/insert_emp",
        data: {
            "empid": empid,
            "Posid": Posid,
			"Sectioncode": Sectioncode,
			"Company": Company,
            "count": count
        }
    });
    // ajax

}  //function emp_insert






</script>

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
								<th> <center >Emp. ID </center > </th>
								<th> <center > Name – Surname </center > </th>
								<th> <center > Section Code </center > </th>
								<th> <center > Department </center > </th>
								<th> <center > Position </center > </th>
							</tr>
						</thead>
						<tbody id="show_emp" > 
							
						
							<?php 
								
								$num = 0;
								foreach($select->result() as $index => $row ) { 
							?>
							<tr class="odd gradeX" align = 'center'>
								<td><?php echo $row->Emp_ID?></td>
								<td><?php echo $row->Empname_eng." ".$row->Empsurname_eng?></td>
								<td><?php echo $row->Sectioncode_ID?></td>
								<td><?php echo $row->Department?></td>
								<td><?php echo $row->Position_name ?></td>
								
								<input id="empid<?php echo $index ;?>" name = "empid" type="hidden" value="<?php echo  $row->Emp_ID ; ?>">
								<input id="Posid<?php echo $index ;?>" name = "Posid" type="hidden" value="<?php echo  $row->Position_ID ; ?>">
								<input id="Sectioncode<?php echo $index ;?>" name = "Sectioncode" type="hidden" value="<?php echo  $row->Sectioncode_ID ; ?>">
								<input id="Company<?php echo $index ;?>" name = "Company" type="hidden" value="<?php echo  $row->Company_ID ; ?>">
								

							</tr>
							</tr>
							<?php
								$num++;
							}
							
							?>
							<input id="count"  type="hidden" value="<?php echo  $num++; ?>">


							
							
							
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
							<button class="btn btn-success btn" onclick="emp_insert()">Submit</button>

								
						</div>
							<!-- col-sm-4 -->
					</div>
		</div>
	</div>
</div>
  
