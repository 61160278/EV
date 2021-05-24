<style>
table,
th,
td {
    border: 1px solid black;
    border-collapse: collapse;
}

th,
td {

    text-align: left;
}

#t01 {}



#th_empty {

    border-top: 1px solid white;
    border-bottom: 1px solid white;
}

#th_Quality {

    border-left: 1px solid white;
    border-right: 1px solid black;
    border-top: 1px solid white;
    border-bottom: 1px solid white;
}


#td_empty_plan {

    border-bottom: 1px solid white;

}

#td_PCR {

    border-left: 1px solid white;
    border-right: 1px solid white;
    border-top: 1px solid white;
    border-bottom: 1px solid white;
}

#td_ToQuality {

    border-left: 1px solid white;
    border-bottom: 1px solid white;


}


#td_empty_Resuit {

    border-bottom: 1px solid white;

}

@media print {
    @page {
        size: A4;
        margin: 0.1cm;
    }
}



/* @media all */
/* { */
/* .page-break { display:none; } */
/* .page-break-no{ display:none; } */
/* } */
/* @media print */
/* { */
/* .page-break { display:block;height:1px; page-break-before:always; } */
/* .page-break-no{ display:block;height:1px; page-break-after:avoid; }  */
/* } */
</style>




<!-- <div class="row"> -->
     <!-- <div class="col-md-12">  -->
         <!-- <div class="panel panel-info">  -->
             <div class="panel-heading">
                <h1 align='center'><b>Process Change Report</b></h1>
             </div>
            <!-- panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <!-- <div class="row"> -->
                        <table width="100%">
                            <tr>
                                <td id="td_PCR">
                                    PCR No. ___________________
                                    <br>
                                    Annual plan No. _____________
                                    <br>
                                    Subject _____________________
                                </td>
                                <!-- </div> -->
                                <br>
                                <td id="td_PCR">
                                    <Input type="radio" name="manmer" value="0">&nbsp; Normal
                                    &emsp;
                                    &emsp;
                                    &emsp;
                                    <Input type="radio" name="manmer" value="0">&nbsp; Urgent
                                </td>
                                <br>
                                <td id="td_PCR">
                                    Issue Date : ___________________
                                    <br>
                                    Department : ___________________
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- col-md-12 -->
                    <!-- class="row" PCR No. -->
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%">
                                <tr>
                                    <th>
                                        <center>PCR Rank</center>
                                    </th>
                                    <th colspan="0.5">
                                        <center>PCR Type</center>
                                    </th>

                                    <th id="th_empty"> &nbsp; &nbsp; &nbsp; &nbsp;</th>
                                    <th> &nbsp; </th>
                                    <th>
                                        <center>Acknowledge2</center>
                                    </th>
                                    <th>
                                        <center>Acknowledge1</center>
                                    </th>
                                    <th>
                                        <center>Approved</center>
                                    </th>
                                    <th>
                                        <center>Checked2</center>
                                    </th>
                                    <th>
                                        <center>Checked1</center>
                                    </th>
                                    <th>
                                        <center>Prepared</center>
                                    </th>


                                </tr>
                                <tr>
                                    <td rowspan="2">
                                        <center>C2</center>
                                    </td>
                                    <td rowspan="2">
                                        <center>Repeat</center>
                                    </td>
                                    <td id="td_empty_plan"></td>


                                    <td id="td_Plan">
                                        <center>Plan</center>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>


                                </tr>



                                <tr>
                                    <td id="td_empty_Resuit"></td>
                                    <td>
                                        <center>Resuit</center>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>
                            </table>

                        </div>
                        <!-- class="col-md-12" PCR Rank -->

                    </div>
                    <!-- class="row PCR Rank" -->

                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <center> Product name </center>
                                    </td>
                                    <td>
                                        <center> G4S Injector </center>
                                    </td>
                                    <td>
                                        <center> Critical Point </center>
                                    </td>
                                    <td> &nbsp; S &nbsp; &nbsp; S &nbsp; &nbsp; F </td>



                                </tr>
                                <tr>
                                    <td>
                                        <center>Part name</center>
                                    </td>
                                    <td>
                                        <center>G4S Injector Assy</center>
                                    </td>
                                    <td>
                                        <center>Risk and effect anaiysis</center>
                                    </td>
                                    <td>
                                        &nbsp; <Input type="radio" name="Quality" value="0">
                                        &nbsp; Quality
                                        &nbsp;
                                        &nbsp;
                                        <Input type="radio" name="Quality" value="0"> &nbsp;
                                        Safety
                                        &nbsp;
                                        &nbsp;
                                        <Input type="radio" name="Quality" value="0">&nbsp;
                                        Delivery
                                    </td>


                                </tr>
                                <tr>
                                    <td>
                                        <center>Part No.</center>
                                    </td>
                                    <td>
                                        <center>SM297500-1234</center>
                                    </td>
                                    <td>
                                        <center>Part test flow out</center>
                                    </td>
                                    <td> &nbsp; <Input type="radio" name="button" value="0">
                                        &nbsp; Yes
                                        &nbsp;
                                        &emsp;
                                        &emsp;
                                        <Input type="radio" name="button" value="0"> &nbsp; No
                                    </td>


                                </tr>
                            </table>

                        </div>
                        <!-- col-md-12 Product name -->

                    </div>
                    <!-- class="row Product name" -->
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <center> Chage Point </center>
                                    </td>
                                    <td>
                                        <center> New line/Modify line </center>
                                    </td>
                                    <td>
                                        <center> Out put </center>
                                    </td>
                                    <td> &nbsp; &nbsp; Tool cost down </td>



                                </tr>
                                <tr>
                                    <td>
                                        <center>Customer</center>
                                    </td>
                                    <td>
                                        <center>Toyota</center>
                                    </td>
                                    <td>
                                        <center>Line name </center>
                                    </td>
                                    <td>
                                        &nbsp; &nbsp; G4S Injector assembly

                                    </td>


                                </tr>

                            </table>

                        </div>
                        <!-- col-md-12 Product name -->

                    </div>
                    <!-- class="row Chage Point" -->
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <p><b> Existing Process /Proposed Process/Characteristics values affected / Remark </b>
                            </p>

                        </div>
                        <!-- col-md-12 Existing Process -->

                    </div>
                    <!-- class="row" Existing Process  -->

                    <div class="row">
                        <div class="col-md-8">
                            <h3>
                                <center>Picture before & affter</center>
                            </h3>
                        </div>
                        <!-- col-md-8 Picture -->
                    </div>
                    <!-- class="row" Picture  -->
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%">
                                <tr>
                                    <td> &nbsp; Implement plan</td>
                                    <td>
                                        <center>Fix 1 Year </center>
                                    </td>
                                    <td id="th_empty"> &nbsp; &nbsp; &nbsp; &nbsp;</td>
                                    <!-- <td> &nbsp; </td> -->
                                    <td> &nbsp;Data Attachment</td>




                                </tr>
                                <tr>
                                    <td> &nbsp; 1) PCR plan submission</td>
                                    <td> &nbsp; </td>
                                    <!-- <td id="td_empty_plan"></td> -->
                                    <td id="th_empty">
                                    <td> &nbsp; Daily check sheet</td>

                                </tr>
                                <tr>
                                    <td> &nbsp; 2) PCR plan submission</td>
                                    <td> &nbsp; </td>
                                    <!-- <td id="td_empty_plan"></td> -->
                                    <td id="th_empty">
                                    <td> &nbsp; Machine specification</td>

                                </tr>
                                <tr>
                                    <td> &nbsp; 3) PCR plan submission</td>
                                    <td> &nbsp; </td>
                                    <!-- <td id="td_empty_plan"></td> -->
                                    <td id="th_empty">
                                    <td> &nbsp; Control plan ,PCC</td>

                                </tr>
                                <tr>
                                    <td> &nbsp; 4) PCR plan submission</td>
                                    <td> &nbsp; </td>
                                    <!-- <td id="td_empty_plan"></td> -->
                                    <td id="th_empty">
                                    <td> &nbsp; PFMEA</td>

                                </tr>
                                <tr>
                                    <td> &nbsp; 5) PCR plan submission</td>
                                    <td> &nbsp; </td>
                                    <!-- <td id="td_empty_plan"></td> -->
                                    <td id="th_empty">
                                    <td> &nbsp; QA Network</td>

                                </tr>
                                <tr>
                                    <td> &nbsp; 6) PCR plan submission</td>
                                    <td> &nbsp; </td>
                                    <!-- <td id="td_empty_plan"></td> -->
                                    <td id="th_empty">
                                    <td> &nbsp; Minute Process DR meeting</td>

                                </tr>
                                <tr>
                                    <td> &nbsp; 7) PCR plan submission</td>
                                    <td> &nbsp; </td>
                                    <!-- <td id="td_empty_plan"></td> -->
                                    <td id="th_empty">
                                    <td> &nbsp; MSA</td>

                                </tr>
                                <tr>
                                    <td> &nbsp; 8) PCR plan submission</td>
                                    <td> &nbsp; </td>
                                    <!-- <td id="td_empty_plan"></td> -->
                                    <td id="th_empty">
                                    <td> &nbsp; Standardize work</td>

                                </tr>

                            </table>
                            <!-- Implement plan -->
                            &nbsp;
                        </div>
                        <!-- col-md-12 Implement plan -->

                    </div>
                    <!-- class="row" Implement plan  -->

                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <center> Planning review </center>
                                    </td>
                                    <td>
                                        &emsp; <Input type="radio" name="b" value="0"> &nbsp; Yes
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        Meeting Date ___/___/___
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        <Input type="radio" name="b" value="0">&nbsp; NO
                                    </td>



                                </tr>
                                <tr>
                                    <td>
                                        <center>Result approve</center>
                                    </td>
                                    <td>
                                        &nbsp; <Input type="radio" name="p" value="0"> &nbsp; Part Examination
                                        <Input type="radio" name="p" value="0"> &nbsp; Process Examination
                                        &ensp;

                                        <Input type="radio" name="p" value="0">&nbsp; QA meeting
                                        &ensp;

                                        <Input type="radio" name="p" value="0">&nbsp; BKD

                                        &ensp;
                                        <br>
                                        &emsp;
                                        <Input type="radio" name="p" value="0">&nbsp; Process Explanation
                                        &emsp;
                                        &nbsp;
                                        <Input type="radio" name="p" value="0">&nbsp; Total review
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        &nbsp;
                                        <Input type="radio" name="p" value="0">&nbsp; Quality report
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <center>Comment</center>
                                    </td>
                                    <td>
                                        &emsp; 1)
                                        &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                                        &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; 3)
                                        <br>
                                        &emsp; 2)
                                        &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp;
                                        &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; 4)
                                        <br>
                                    </td>

                                </tr>
                            </table>

                        </div>
                        <!-- col-md-12 Product name -->
                    </div>
                    <!-- class="row Product name" -->
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%">
                                <tr>
                                    <th id="th_Quality">
                                        &emsp; To : Quality Assurance Dept.
                                    </th>
                                    <!-- <th> 
                                            <center>PCR Rank</center>
                                        </th>
                                        <th colspan="0.5">
                                            <center>PCR Type</center>
                                        </th> -->

                                    <th id="Th_Approved"> &nbsp; &nbsp; &nbsp; </th>

                                    <th>
                                        <center>Approved</center>
                                    </th>
                                    <th>
                                        <center>Checked 3</center>
                                    </th>
                                    <th>
                                        <center>Checked 2</center>
                                    </th>
                                    <th>
                                        <center>Checked 1</center>
                                    </th>
                                </tr>
                                <tr>

                                    <td id="td_ToQuality"></td>


                                    <td id="td_Plan">
                                        <center>Plan</center>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>



                                <tr>
                                    <td id="td_ToQuality"></td>
                                    <td>
                                        <center>Resuit</center>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>
                            </table>

                        </div>
                        <!-- class="col-md-12"  Quality Assurance -->

                    </div>
                    <!-- class=" Quality Assurance" -->
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <center> Submit to customer </center>
                                    </td>
                                    <td> &nbsp; <Input type="radio" name="u" value="0"> &nbsp; Yes
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        Customer name ________________
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        <Input type="radio" name="u" value="0">&nbsp; NO
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <center> Customer Audit </center>
                                    </td>
                                    <td> &nbsp; <Input type="radio" name="t" value="0"> &nbsp; Yes
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        Meeting Date ___/___/___
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        &emsp;
                                        &nbsp;

                                        <Input type="radio" name="t" value="0">&nbsp; NO
                                    </td>

                                </tr>
                            </table>
                            <!-- Submit -->

                        </div>
                        <!-- col-md-12 Submit -->
                        <br>
                    </div>
                    <!-- class="row" Submit -->

                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <center> Customer Request </center>
                                    </td>
                                    <td>
                                        <center> Request Detail </center>
                                    </td>
                                    <td>
                                        <center> Requester </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td> &nbsp; </td>
                                    <td> &nbsp; </td>
                                    <td> &nbsp; </td>

                                </tr>

                            </table>
                            <!-- Customer -->

                        </div>
                        <!-- col-md-12 Customer Request -->

                    </div>
                    <!-- class="row" Customer   -->




                </div>
                <!-- class="row" Customer Request -->



            </div>
            <!-- panel-body -->

        </div>
        <!-- panel panel-indigo -->


    </div>
    <!-- col-md-12 -->


<!-- </div> -->
<!-- class="row" -->