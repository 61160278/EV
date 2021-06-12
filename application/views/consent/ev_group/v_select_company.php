<?php
/*
* v_select_company.php
* Display v_main_group
* @input    
* @output
* @author Tippawan Aiemsaad, Jirayu Jaravichit
* @Create Date 2564-04-08
*/  
?>
<script>
function select_company(value) {
    if (value == "1") {
        window.location.href = "<?php echo base_url();?>/ev_group/Evs_group/select_company_sdm";
    } else {
        window.location.href = "<?php echo base_url();?>/ev_group/Evs_group/select_company_skd";
    }
}
</script>
<style>
.margin {
    margin-top: 10px;
}

.panel.panel-indigo .panel-heading {
    color: #e8eaf6;
    background-color: #134466;
}
</style>
<!DOCTYPE html>
<html>
<div class="col-md-12">
    <div class="panel panel-indigo">
        <div class="panel-heading ">
            <h2><font color="#ffffff" size="6px"><b>Manage Group</b></font></h2>
            <div class="pull-right margin">
                <select class="form-control " aria-controls="example" onChange="select_company(value)">
                    <option value="">Select Company</option>
                    <option value="1">SDM</option>
                    <option value="2">SKD</option>
                </select>
            </div>
            <!-- select company -->
        </div>
        <!-- panel-heading -->

        <div class="col-md-12">
            <div class="panel-body">
                <div class="col-md-12" align="right">
                    <img height ="500px" src="<?php echo base_url();?>/pic/main_select_company.jpg">
                </div>
                <!-- col-12  -->
            </div>
            <!-- panel-body -->
        </div>
        <!-- col-md-12 -->
    </div>
    <!-- panel panel-indigo -->
</div>
    <!-- col-md-12 -->

</html>