<h1>
    <center>Form</center>
</h1>

<div data-widget-group="group1">
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
                                    <label class="col-sm-2 control-label">No.<br>DN.PCR-FY20-013 </label>
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
                                <!-- ADDITON ITEM -->

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">TITLE</label>
                                </div>
                                <!-- TITLE -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">CHANGE TYPE<br>New</label>
                                    <label class="col-sm-4 control-label">RANK</label>
                                </div>
                                <!-- CHANGE TYPE -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">CUSTOMER SUBMISSON</label>
                                    <label class="col-sm-4 control-label">PROCESS DESIGN REVIEW<br>No</label>
                                </div>
                                <!-- CUSTOMER SUBMISSON -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">PRODUCT</label>
                                    <label class="col-sm-4 control-label">PART NAME</label>
                                </div>
                                <!-- PRODUCT -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">PART NUMBER<br>123456</label>
                                    <label class="col-sm-4 control-label">CHANGE POINT<br>No</label>
                                </div>
                                <!-- PART NUMBER -->
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><b>Priority Management Category</b></label>
                                </div>
                                <!-- Priority -->
                                <div class="form-group">
                                    <label class="col-sm-6 control-label"><b>Details Process Change (File upload plan
                                            <font color="red">*Maximum file upload size 9.5 MB</font>)
                                        </b></label>
                                </div>
                                <!-- Details -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-8">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group">
                                                <div class="form-control uneditable-input" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;<span
                                                        class="fileinput-filename"></span>
                                                </div>
                                                <span class="input-group-btn">
                                                    <a href="#" class="btn btn-default fileinput-exists"
                                                        data-dismiss="fileinput">Remove</a>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileinput-new">Select file</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="...">
                                                    </span>

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Select file -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><b>Implementation Plan</b></label>
                                </div>
                                <!-- Implementation -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">1.PCR plan submission</label>
                                    <div class="col-sm-8">
                                        <div class="input-group date" id="datepicker-pastdisabled">
                                            <span class="input-group-addon"><i class="ti ti-calendar"></i></span>
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- PCR plan -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">2.Planning review</label>
                                    <div class="col-sm-8">
                                        <div class="input-group date" id="datepicker-pastdisabled">
                                            <span class="input-group-addon"><i class="ti ti-calendar"></i></span>
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- Planning review -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">3.Process preparation</label>
                                    <div class="col-sm-8">
                                        <div class="input-group date" id="datepicker-pastdisabled">
                                            <span class="input-group-addon"><i class="ti ti-calendar"></i></span>
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- Process preparation -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">4.Product Process evaluation</label>
                                    <div class="col-sm-8">
                                        <div class="input-group date" id="datepicker-pastdisabled">
                                            <span class="input-group-addon"><i class="ti ti-calendar"></i></span>
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- Process preparation -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">5.Revise document standard</label>
                                    <div class="col-sm-8">
                                        <div class="input-group date" id="datepicker-pastdisabled">
                                            <span class="input-group-addon"><i class="ti ti-calendar"></i></span>
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- Revise document -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">6. 6 step / Quality report</label>
                                    <div class="col-sm-8">
                                        <div class="input-group date" id="datepicker-pastdisabled">
                                            <span class="input-group-addon"><i class="ti ti-calendar"></i></span>
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- 6 step -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">7. PCR result submisson</label>
                                    <div class="col-sm-8">
                                        <div class="input-group date" id="datepicker-pastdisabled">
                                            <span class="input-group-addon"><i class="ti ti-calendar"></i></span>
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- PCR result -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">8. Production Start Date</label>
                                    <div class="col-sm-8">
                                        <div class="input-group date" id="datepicker-pastdisabled">
                                            <span class="input-group-addon"><i class="ti ti-calendar"></i></span>
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- Production -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><b>Data attachments</b></label>
                                </div>
                                <!-- Implementation -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                    <div class="col-sm-8">
                                        <label class="checkbox-inline icheck">
                                            <input type="checkbox" id="inlinecheckbox1" value="option1"> PFMEA
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        </label>

                                        <label class="checkbox-inline icheck">
                                            <input type="checkbox" id="inlinecheckbox2" value="option2"> QA Network
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        </label>

                                        <label class="checkbox-inline icheck">
                                            <input type="checkbox" id="inlinecheckbox3" value="option3"> Control plan
                                            ,PCC
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        </label>
                                        <br>
                                        <label class="checkbox-inline icheck">
                                            <input type="checkbox" id="inlinecheckbox1" value="option1"> Standarize work
                                            , WI
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        </label>

                                        <label class="checkbox-inline icheck">
                                            <input type="checkbox" id="inlinecheckbox2" value="option2"> Machine
                                            specifcation
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        </label>
                                        <label class="checkbox-inline icheck">
                                            <input type="checkbox" id="inlinecheckbox3" value="option3"> Daily check
                                            sheet
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        </label>
                                        <br>
                                        <label class="checkbox-inline icheck">
                                            <input type="checkbox" id="inlinecheckbox3" value="option3"> Other
                                        </label>
                                    </div>
                                </div>
                                <!-- checkbox-inline -->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><b>Approve of Department</b></label>
                                </div>
                                <!-- Approve -->
                                <label class="col-sm-4 control-label">(CHECKER 1 EMPLOYEE ID.)</label>
                                <label class="col-sm-4 control-label">NAME-SURNAME</label>
                                <label class="col-sm-4 control-label">POSITION / DEPARTMENT</label>
                                <br>
                                <label class="col-sm-4 control-label">(CHECKER 2 EMPLOYEE ID.)</label>
                                <label class="col-sm-4 control-label">NAME-SURNAME</label>
                                <label class="col-sm-4 control-label">POSITION / DEPARTMENT</label>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><b>Approve Acknowledge Department</b></label>
                                </div>
                                <!-- Approve -->
                                <label class="col-sm-4 control-label">EMPLOYEE ID.</label>
                                <label class="col-sm-4 control-label">NAME-SURNAME</label>
                                <label class="col-sm-4 control-label">POSITION / DEPARTMENT</label>
                            </form>
                            <!-- class="form-horizontal row-border" -->
                            <br>
                            <br>

                            <div class="panel-footer">
                                <div class="row" align='right'>
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <button class="btn-primary btn">SUBMIT FORM</button>
                                        <button class="btn-default btn">Cancel</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!-- id="PCR Form" -->
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