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
$(document).ready(function() {

});
// document.ready

function emp_insert() {
    var count = document.getElementById("count").value;
    var count_send = 0;
    var count_loop = 0;
    var loop_count = (count / 200).toFixed(1);
    var count_insert = 0;
    var empid = []
    var Posid = []
    var Sectioncode = []
    var Company = []

    console.log(count);
    console.log(loop_count);

    for (j = 0; j < loop_count; j++) {

        empid = []
        Posid = []
        Sectioncode = []
        Company = []

        count_send = 0 + (200 * j);
        count_loop = count_send + 199;
        count_insert = 0;

        //console.log(count_send);
        //console.log(count_loop);
        //console.log("--------------");

        for (i = count_send; i <= count_loop; i++) {
            if (i < count) {

                empid.push(document.getElementById("empid" + i).value);
                // console.log(empid);

                Posid.push(document.getElementById("Posid" + i).value);
                //console.log(Posid);

                Sectioncode.push(document.getElementById("Sectioncode" + i).value);
                //console.log(Sectioncode);

                Company.push(document.getElementById("Company" + i).value);
                //console.log(Company);
                count_insert++;
            }
            // if 

        } // for

        console.log(count_insert);

        $.ajax({
            type: "post",
            dataType: "json",
            url: "<?php echo base_url(); ?>ev_permission/Evs_permission/insert_emp",
            data: {
                "empid": empid,
                "Posid": Posid,
                "Sectioncode": Sectioncode,
                "Company": Company,
                "count_insert": count_insert
            },
            success: function(data) {
                console.log(data);
            }
        });
        // ajax

    }
    // for 

    window.location.href = "<?php echo base_url();?>ev_permission/Evs_permission/delete_emp/" + <?php echo $year; ?> +
        ""

} //function emp_insert
</script>
<!-- END Script  -->


<style>
th {
    color: black;
    text-align: center;
    font-size: 20px;
}

td {
    text-align: center;
    font-size: 15px;
}

.panel.panel-default .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 style="color:white;">
                    <font size="6px"><i class="fa fa-tasks"></i>Manage Permission</font>
                </h2>
                <input id="date" type="hidden" value="<?php echo $_POST["Date"]?>">
                <div class="panel-ctrls"></div>
            </div>
            <!-- panel-heading -->
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-11">
                        <label class="control-label">
                            <strong>
                                <font size="5px">Please check list of employees to create form</font>
                            </strong>
                        </label>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered dataTable no-footer" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th>
                                        <center>Emp. ID </center>
                                    </th>
                                    <th>
                                        <center> Name – Surname </center>
                                    </th>
                                    <th>
                                        <center> Section Code </center>
                                    </th>
                                    <th>
                                        <center> Department </center>
                                    </th>
                                    <th>
                                        <center> Position </center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="show_emp">
                                <?php 
								
								$num = 0;
								foreach($select->result() as $index => $row ) { 
							?>
                                <tr align='center'>
                                    <td><?php echo $row->Emp_ID?></td>
                                    <td><?php echo $row->Empname_eng." ".$row->Empsurname_eng?></td>
                                    <td><?php echo $row->Sectioncode_ID?></td>
                                    <td><?php echo $row->Department?></td>
                                    <td><?php echo $row->Position_name ?></td>

                                    <input id="empid<?php echo $index ;?>" name="empid" type="hidden"
                                        value="<?php echo  $row->Emp_ID ; ?>">
                                    <input id="Posid<?php echo $index ;?>" name="Posid" type="hidden"
                                        value="<?php echo  $row->Position_ID ; ?>">
                                    <input id="Sectioncode<?php echo $index ;?>" name="Sectioncode" type="hidden"
                                        value="<?php echo  $row->Sectioncode_ID ; ?>">
                                    <input id="Company<?php echo $index ;?>" name="Company" type="hidden"
                                        value="<?php echo  $row->Company_ID ; ?>">


                                </tr>
                                <?php
								$num++;
							}
							
							?>


                            </tbody>

                        </table>
                        <input id="count" type="hidden" value="<?php echo $num++; ?>">
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
            </div>
            <div class="panel-footer">

            </div>
            <!-- footer -->

        </div>
        <!--  panel-default  -->
        <div class="row">
            <div class="col-sm-8" align="left">
                <a href="http://localhost/EV/ev_permission/Evs_permission/index">
                    <button class="btn btn-inverse"><i class="fa fa-mail-reply"></i> Back</button>
                </a>
            </div>
            <!-- col-8  -->
            <div class="col-sm-4" align="right">
                <button class="btn btn-success btn" onclick="emp_insert()">Submit</button>


            </div>
            <!-- col-sm-4 -->
        </div>
        <!-- row  -->
    </div>
    <!-- col-12  -->
</div>
<!-- row  -->