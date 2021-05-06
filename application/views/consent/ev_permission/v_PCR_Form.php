<h1>
    <center>Form</center>
</h1>

<div data-widget-group="group1"> -->
    <div class="row">
        <div class="col-xs-12">

            <div class="panel panel-info" data-widget='{"draggable": "false"}'>
                <div class="panel-heading">
                    <h2>CREATE FORM : PROCESS CHANGE REPORT SYSTEM</h2>
                    <div class="options">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#PCR Form" data-toggle="tab">PCR Form</a></li>
                            <li><a href="#Flow Popover" data-toggle="tab">Flow Popover</a></li>
                        </ul>
                    </div>
                    <!-- class="options" -->
                </div>
                <!-- class="panel-heading" -->
                <div class="panel-body">
                    <div class="tab-content">

                        <!-- the only difference between the inline and popover styles are the modes set in th demo js -->

                        <div class="tab-pane active" id="PCR Form">
                            <form action="" class="form-horizontal row-border">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><b>General Data</b></label>
                                </div>
                                <!-- General Data -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">No.<br>DN.PCR-FY20-013</label>
                                    <label class="col-sm-3 control-label">DATE<br>01-Feb-21</label>
                                    <label class="col-sm-3 control-label">REGISTANT<br>SID J.</label>
                                    <label class="col-sm-3 control-label">DEPARTMENT<br>Production Engineering</label>
                                </div>
                                <!-- No. -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">PCR Type
                                        <br>
                                        <br>
                                        Part Test Flow Out
                                    </label> 
                                    <!-- PCR Type -->

                                    <label class="col-sm-2 control-label">
                                        <Input type="radio" name="manmer" value="0">Normal
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                        <Input type="radio" name="manmer" value="0">Urgent
                                        <br>
                                        <br>
                                        <Input type="radio" name="button" value="0"> &nbsp; Yes
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                        <Input type="radio" name="button" value="0"> &nbsp; No
                                    </label>
                                    <!-- Normal -->
                                </div>
                                <!-- PCR Type -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><b>Risk and Effect Analysis</b></label>
                                </div>
                                <!-- Risk and Effect -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Quality
                                        <br>
                                        <br>
                                        Safety
                                        <br>
                                        <br>
                                        Delivery
                                    </label> 
                                    <!-- Quality -->

                                    <label class="col-sm-2 control-label">
                                        <Input type="radio" name="manmer" value="0"> &nbsp; Yes
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                        <Input type="radio" name="manmer" value="0">No
                                        <br>
                                        <br>
                                        <Input type="radio" name="button" value="0"> &nbsp; Yes
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                        <Input type="radio" name="button" value="0"> &nbsp; No
                                        <br>
                                        <br>
                                        <Input type="radio" name="bt" value="0"> &nbsp; Yes
                                        &nbsp;
                                        &nbsp;
                                        &nbsp;
                                        <Input type="radio" name="bt" value="0"> &nbsp; No
                                    </label>
                                    <!-- button Yes,No -->
                                </div>
                                <!-- Quality -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><b>Annual Data</b></label>
                                </div>
                                <!-- Annual Data -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ANNUAL PLAN<br>DN.PCR-FY20-005</label>
                                    <label class="col-sm-4 control-label">ADDITON ITEM<br>NO</label>
                                    
                                </div>
                                <!-- No. -->
                                <div class="form-group">
                                   
                                    
                                </div>
                                <!-- No. -->
                            </form>
                            <!-- class="form-horizontal row-border" -->
                        </div>
                        <!-- id="PCR Form" -->






























                        <div class="tab-pane" id="Flow Popover">
                            <form action="" class="form-horizontal row-border">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Simple Text Field</label>
                                    <div class="col-sm-8">
                                        <a href="#" id="username" data-type="text" data-pk="1"
                                            data-title="Enter username">superuser</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Empty text field, required</label>
                                    <div class="col-sm-8">
                                        <a href="#" id="firstname" data-type="text" data-pk="1" data-placement="right"
                                            data-placeholder="Required" data-title="Enter your firstname"></a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Select, local array, custom display</label>
                                    <div class="col-sm-8">
                                        <a href="#" id="sex" data-type="select" data-pk="1" data-value=""
                                            data-title="Select sex"></a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Select, error while loading</label>
                                    <div class="col-sm-8">
                                        <a href="#" id="status" data-type="select" data-pk="1" data-value="0"
                                            data-source="/status" data-title="Select status">Active</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Combodate</label>
                                    <div class="col-sm-8">
                                        <a href="#" id="dob" data-type="combodate" data-value="1984-05-15"
                                            data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY"
                                            data-template="D / MMM / YYYY" data-pk="1"
                                            data-title="Select Date of birth"></a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Textarea, buttons below. Submit by
                                        <i>ctrl+enter</i></label>
                                    <div class="col-sm-8">
                                        <a href="#" id="comments" data-type="textarea" data-pk="1"
                                            data-placeholder="Your comments here..." data-title="Enter comments">awesome
                                            user!</a>
                                    </div>
                                </div>
                            </form>
                            <!-- class="form-horizontal row-border" -->
                        </div>
                        <!-- id="Flow Popover" -->















                    </div>
                    <!-- class="tab-content" -->
                </div>
                <!-- class="panel-body" -->
            </div>
            <!-- class="panel panel-info" -->
        </div>
        <!-- class="col-xs-12" -->
    </div>
    <!-- class="row" -->
</div>
<!-- group1 -->