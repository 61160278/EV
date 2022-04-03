<?php
/*
* v_main_report_payroll.php
* Display v_main_report_payroll
* @input    
* @output
* @author Kunanya Singmee
* @Create Date 2565-02-22
*/  
?>

<style>
thead {
    color: black;
    text-align: center;
    font-size: 20px;
}

tbody {
    text-align: center;
    font-size: 15px;
}

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}

.margin {
    margin-top: 10px;
}

#color_head {
    background-color: #3f51b5;
}
</style>


<script>
$(document).ready(function() {
    $("#show_export_for_hisorygrade").DataTable();
});
// document ready

function exportfile() {

    var name = document.getElementById("name_file").innerHTML;
    var name_dep = document.getElementById("dep_id").value;
    var pay_id = document.getElementById("pay_id").value;
    var size_year = document.getElementById("size_year").value;

    var sheet_name = name_dep;
    var file_name = "Report History Grade " + name_dep;

    var wb = {
        SheetNames: [],
        Sheets: {}
    };

    var objectMaxLength = [3, 10, 30, 15, 25, 25, 15, 15];
    for (i = 0; i < size_year; i++) {
        objectMaxLength.push(24);
    }
    // for 
    // console.log(objectMaxLength);

    var wscols = [];

    for (i = 0; i < objectMaxLength.length; i++) {
        temp = {
            width: objectMaxLength[i]
        };
        wscols.push(temp);
    }
    // for

    // console.log(wscols);

    var ws9 = XLSX.utils.table_to_sheet(document.getElementById('export_for_hisorygrade'), {
        raw: true
    });

    ws9["!cols"] = wscols;


    wb.SheetNames.push(sheet_name);
    wb.Sheets[sheet_name] = ws9;
    XLSX.writeFile(wb, file_name + ".xlsx", {
        cellStyles: true
    });

    $.ajax({
        type: "post",
        dataType: "json",
        url: "<?php echo base_url(); ?>ev_report/Evs_Report/insert_export_xlsx",
        data: {
            "pay_id": pay_id,
            "name_dep": name_dep,
            "type": "HistoryGrade"
        },
        success: function(data) {
            console.log(data);

        }
        // success
    });
    // ajax

}
// exportfile
</script>

<!DOCTYPE html>
<html>
<div class="col-md-12">
    <div class="panel panel-indigo">
        <div class="panel-heading">
            <div class="col-md-8">
                <h2>
                    <font color="#ffffff" size="6px"><b>Report for history grade</b></font>
                </h2>
            </div>
            <!-- col-8  -->
            <div class="col-md-4" align="right">
                <button class="btn btn-success" onclick="exportfile()"><i class="fa fa-download"></i>
                    Export</button>
            </div>
            <!-- col-4  -->
        </div>
        <!-- panel-heading -->

        <div class="col-md-12">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>
                            List of employee to history grade
                        </h3>
                    </div>

                </div>
                <!--div row for manage size of head panel -->
                <div class="row">
                    <div class="col-md-12">
                        <?php $name = "History grade : ". $dep ?>
                        <table class="table table-striped table-bordered" id="show_export_for_hisorygrade" width="100%"
                            style="width: 100%;">
                            <thead>
                                <tr>
                                    <th colspan="<?php echo (sizeof($all_year)+9); ?>">
                                        <h2><b><?php echo $com_info;?></b></h2>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="<?php echo (sizeof($all_year)+9); ?>">
                                        <h3>
                                            <b id="name_file">
                                                <?php echo $name; ?>
                                            </b>
                                        </h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <center>No.</center>
                                    </th>
                                    <th>
                                        <center>Emp No.</center>

                                    </th>
                                    <th>
                                        <center>Name - Surname</center>
                                    </th>
                                    <th>
                                        <center>Position</center>
                                    </th>
                                    <th>
                                        <center>Department</center>
                                    </th>
                                    <th>
                                        <center>Section</center>
                                    </th>
                                    <th>
                                        <center>Sub Section</center>
                                    </th>
                                    <th>
                                        <center>Section code</center>
                                    </th>
                                    <?php if(sizeof($all_year) != 0){
                                    foreach($all_year as $index => $row_year){?>
                                    <th>
                                        <center><?php echo "Salary Increment FY " . $row_year->pay_year; ?></center>
                                    </th>
                                    <?php }
                                    // foreach 
                                    }
                                    // if ?>
                                </tr>
                                <!-- tr -->
                            </thead>
                            <!-- thead -->
                            <tbody>
                                <?php 
                                // print_r($grade_info);
                                
                                if(sizeof($emp_info) != 0){ 
                                    foreach($emp_info as $index => $row){ ?>
                                <tr>
                                    <td><?php echo $index+1; ?></td>
                                    <td><?php echo $row->Emp_ID;?></td>
                                    <td><?php echo $row->Empname_engTitle." ".$row->Empname_eng." ".$row->Empsurname_eng ;?>
                                    </td>
                                    <td><?php echo $row->Position_name;?></td>
                                    <td><?php echo $dep_info[$index]->Department;?></td>
                                    <td>
                                        <?php if($dep_info[$index]->Section != ""){
                                            echo $dep_info[$index]->Section;
                                        }
                                        // if
                                        else {
                                            echo "-";
                                        }
                                        // else 
                                        
                                        ?>
                                    </td>
                                    <td>
                                        <?php if($dep_info[$index]->SubSection != ""){
                                            echo $dep_info[$index]->SubSection;
                                        }
                                        // if
                                        else {
                                            echo "-";
                                        }
                                        // else 
                                        
                                        ?>
                                    </td>
                                    <td><?php echo $row->Sectioncode_ID; ?></td>

                                    <?php if(sizeof($grade_info) != 0){ 
                                        foreach($grade_info[$index] as $row_grade){?>
                                    <td>
                                        <?php if($row_grade != "-"){
                                                echo $row_grade;
                                            }
                                            // if 
                                            else{
                                                echo "Wait approve !";
                                            }
                                            // else ?>
                                    </td>
                                    <?php }
                                    // foreach 
                                    }
                                    // if 
                                    ?>

                                </tr>
                                <?php
                                    }
                                    // foreach 
                                }
                                // if  ?>


                            </tbody>
                            <!-- tbody  -->
                        </table>
                        <!-- table -->
                        <input type="text" id="dep_id" value="<?php echo $dep_id; ?>" hidden>
                        <input type="text" id="size_year" value="<?php echo sizeof($all_year); ?>" hidden>
                        <input type="text" id="pay_id" value="<?php echo $year_info; ?>" hidden>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->

                <table class="table" hidden="hidden" id="export_for_hisorygrade" width="100%"
                            style="width: 100%;">
                            <thead>
                                <tr>
                                    <th colspan="<?php echo (sizeof($all_year)+9); ?>">
                                        <h2><b><?php echo $com_info;?></b></h2>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="<?php echo (sizeof($all_year)+9); ?>">
                                        <h3>
                                            <b id="name_file">
                                                <?php echo $name; ?>
                                            </b>
                                        </h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <center>No.</center>
                                    </th>
                                    <th>
                                        <center>Emp No.</center>

                                    </th>
                                    <th>
                                        <center>Name - Surname</center>
                                    </th>
                                    <th>
                                        <center>Position</center>
                                    </th>
                                    <th>
                                        <center>Department</center>
                                    </th>
                                    <th>
                                        <center>Section</center>
                                    </th>
                                    <th>
                                        <center>Sub Section</center>
                                    </th>
                                    <th>
                                        <center>Section code</center>
                                    </th>
                                    <?php if(sizeof($all_year) != 0){
                                    foreach($all_year as $index => $row_year){?>
                                    <th>
                                        <center><?php echo "Salary Increment FY " . $row_year->pay_year; ?></center>
                                    </th>
                                    <?php }
                                    // foreach 
                                    }
                                    // if ?>
                                </tr>
                                <!-- tr -->
                            </thead>
                            <!-- thead -->
                            <tbody>
                                <?php 
                                // print_r($grade_info);
                                
                                if(sizeof($emp_info) != 0){ 
                                    foreach($emp_info as $index => $row){ ?>
                                <tr>
                                    <td><?php echo $index+1; ?></td>
                                    <td><?php echo $row->Emp_ID;?></td>
                                    <td><?php echo $row->Empname_engTitle." ".$row->Empname_eng." ".$row->Empsurname_eng ;?>
                                    </td>
                                    <td><?php echo $row->Position_name;?></td>
                                    <td><?php echo $dep_info[$index]->Department;?></td>
                                    <td>
                                        <?php if($dep_info[$index]->Section != ""){
                                            echo $dep_info[$index]->Section;
                                        }
                                        // if
                                        else {
                                            echo "-";
                                        }
                                        // else 
                                        
                                        ?>
                                    </td>
                                    <td>
                                        <?php if($dep_info[$index]->SubSection != ""){
                                            echo $dep_info[$index]->SubSection;
                                        }
                                        // if
                                        else {
                                            echo "-";
                                        }
                                        // else 
                                        
                                        ?>
                                    </td>
                                    <td><?php echo $row->Sectioncode_ID; ?></td>

                                    <?php if(sizeof($grade_info) != 0){ 
                                        foreach($grade_info[$index] as $row_grade){?>
                                    <td>
                                        <?php if($row_grade != "-"){
                                                echo $row_grade;
                                            }
                                            // if 
                                            else{
                                                echo "Wait approve !";
                                            }
                                            // else ?>
                                    </td>
                                    <?php }
                                    // foreach 
                                    }
                                    // if 
                                    ?>

                                </tr>
                                <?php
                                    }
                                    // foreach 
                                }
                                // if  ?>


                            </tbody>
                            <!-- tbody  -->
                        </table>
                        <!-- table -->


                <div class="panel-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            <?php if($_SESSION['UsRole'] == 3){ ?>
                            <a href="<?php echo base_url() ?>ev_report/Evs_Report/report_history_grade">
                                <button class="btn btn-inverse">BACK</button>
                            </a>
                            <?php }
                            // if 
                            else if($_SESSION['UsRole'] == 2){ ?>
                            <a href="<?php echo base_url() ?>Evs_all_manage/index_a">
                                <button class="btn btn-inverse">BACK</button>
                            </a>
                            <?php }
                            // else if
                            else if($_SESSION['UsRole'] == 1){ ?>
                            <a href="<?php echo base_url() ?>Evs_all_manage/index_u">
                                <button class="btn btn-inverse">BACK</button>
                            </a>
                            <?php }
                            // else ?>
                        </div>
                        <!-- col-6  -->
                        <div class="col-sm-6" align="right">
                            <button class="btn btn-success" onclick="exportfile()"><i class="fa fa-download"></i>
                                Export</button>
                        </div>
                        <!-- col-6  -->
                    </div>
                    <!-- row  -->
                </div>
                <!-- panel-footer -->

            </div>
            <!-- panel-body -->
        </div>
        <!-- col inside-->
    </div>
    <!-- head panel -->
</div>
<!-- head outside -->