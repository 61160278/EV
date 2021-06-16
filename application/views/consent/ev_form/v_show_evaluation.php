<?php
/*
* v_show_evaluation.php
* Display v_show_evaluation
* @input    
* @output
* @author   Kunanya Singmee
* @Create Date 2564-06-16
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

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-indigo" data-widget='{"draggable": "false"}'>
            <div class="panel-heading" height="50px">
                <h2 id="tabmenu">
                    <font color="#ffffff" size="6px"> Evaluation </font>
                </h2>
            </div>
            <!-- heading -->

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>List of employees to approve</h3>
                    </div>
                    <!-- col-12  -->
                </div>
                <!-- row  -->
                <hr>

                <div class="row">
                    <div class="col-md-1"></div>
                    <!-- col-2  -->
                    <div class="col-md-2" align="right">
                        <label for="depart_search">Department : </label>
                    </div>
                    <!-- col-2  -->
                    <div class="col-md-2">
                        <select id="depart_search" class="form-control">
                            <option value="1">123456789</option>
                            <option value="2">999999999</option>
                            <option value="3">888888888</option>
                        </select>
                        <!-- select  -->
                    </div>
                    <!-- col-4  -->
                    <div class="col-md-2" align="right">
                        <label for="pos_lev_search">Level : </label>
                    </div>
                    <!-- col-2  -->
                    <div class="col-md-2">
                        <select class="form-control">
                            <option value="1">123456789</option>
                            <option value="2">999999999</option>
                            <option value="3">888888888</option>
                        </select>
                        <!-- select  -->
                    </div>
                    <!-- col-4  -->
                </div>
                <!-- row  -->
                <hr>

                <table class="table m-n">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee ID</th>
                            <th>Name - surname</th>
                            <th>Section Code</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- thead  -->
                    <tbody>
                        <?php for($i=0; $i < 10; $i++){ ?>
                        <tr>
                            <td><?php echo ($i+1); ?></td>
                            <td><?php echo "0000".$i; ?></td>
                            <td><?php echo "Name-Surname".$i; ?></td>
                            <td><?php echo "100".$i; ?></td>
                            <td><?php echo "Dep".$i; ?></td>
                            <td><?php echo "Pos".$i; ?></td>
                            <td><button type="button" class="btn btn-info"><i class="fa fa-info-circle"></i></button>
                            </td>
                        </tr>
                        <?php }
                    // for  ?>

                    </tbody>
                    <!-- tbody  -->
                </table>
                <!-- table  -->
            </div>
            <!-- body -->
        </div>
        <!-- panel-indigo -->
    </div>
    <!-- col-12 -->
</div>
<!-- row -->