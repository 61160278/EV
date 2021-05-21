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
#th_empty {

border-top: 1px solid white;
border-bottom: 1px solid white;
}
#t01 {}

.header{
    display : block;
}
@media print {
  @page {
    size: A4;
    margin: 2.6cm;
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




<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h1 align='center'><b>Process Change Report</b></h1>
            </div>
            <!-- panel-heading -->
     

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-4">PCR No. ___________________
                                <br>
                                Annual plan No. _____________
                                <br>
                                Subject _____________________
                            </div>
                            <!-- col-md-4 -->

                            <div class="col-md-4">
                                <br>
                                <Input type="radio" name="manmer" value="0">&nbsp; Normal
                                &emsp;
                                &emsp;
                                &emsp;
                                <Input type="radio" name="manmer" value="0">&nbsp; Urgent
                                <br>
                            </div>
                            <!-- col-md-4 Normal -->

                            <div class="col-md-4">Issue Date : ___________________
                                <br>
                                Department : ___________________
                            </div>
                            <!-- col-md-4 Issue Date  -->
                        </div>
                        <!-- class="row" PCR No. -->
                        <br>

                        <div class="row">
                            <div class="col-md-4">
                                <table width="50%">
                                    <tr>
                                        <th>
                                            <center>PCR Rank</center>
                                        </th>
                                        <th>
                                            <center>PCR Type</center>
                                        </th>

                                    </tr>
                                    <tr>
                                        <td>
                                            <center>C2</center>
                                        </td>
                                        <td>
                                            <center>Repeat</center>
                                        </td>

                                    </tr>

                                </table>

                            </div>
                            <!-- class="col-md-4" PCR Rank -->

                            <div class="col-md-8">

                                <table id="t01" width="50%">
                                    <tr>
                                        <th></th>
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
                                        <td>
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
                                <!-- id="t01" -->
                            </div>
                            <!-- class="col-md-8" Acknowledge2 -->


                        </div>
                        <!-- class="row PCR Rank" -->

                        <br>
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <table width="100%">
                                    <tr>
                                        <td> &nbsp; Product name</td>
                                        <td> &nbsp; G4S Injector</td>



                                    </tr>
                                    <tr>
                                        <td> &nbsp; Part name</td>
                                        <td> &nbsp; G4S Injector Assy</td>

                                    </tr>

                                    <tr>
                                        <td> &nbsp; Part No.</td>
                                        <td> &nbsp; SM297500-1234</td>

                                    </tr>

                                </table>
                                <!-- Product name -->
                                &nbsp;
                            </div>
                            <!-- col-md-6 Product name -->

                            <div class="row">
                                <div class="col-md-5">
                                    <table width="100%">
                                        <tr>
                                            <td> &nbsp; Critical Point</td>
                                            <td> &nbsp; S  &nbsp;  &nbsp; S   &nbsp;  &nbsp; F</td> 



                                        </tr>
                                        <tr>
                                            <td> &nbsp; Risk and effect anaiysis</td>
                                            <td> &nbsp; <Input type="radio" name="Quality" value="0"> &nbsp; Quality
                                                &nbsp;
                                                &nbsp;
                                                <Input type="radio" name="Quality" value="0"> &nbsp; Safety
                                                &nbsp;
                                                &nbsp;
                                                <Input type="radio" name="Quality" value="0">&nbsp; Delivery
                                            </td>

                                        </tr>

                                        <tr>
                                            <td> &nbsp; Part test flow out</td>
                                            <td> &nbsp; <Input type="radio" name="button" value="0"> &nbsp; Yes
                                                &nbsp;
                                                &emsp;
                                                &emsp;
                                                <Input type="radio" name="button" value="0"> &nbsp; No
                                            </td>

                                        </tr>

                                    </table>
                                    <!-- Critical Point -->

                                </div>
                                <!-- col-md-6 Critical Point -->


                            </div>
                            <!-- class="row" Critical Point -->
                            <br>
                        </div>
                        <!-- class="row" Product name -->

                        <div class="row">
                            <div class="col-md-6">
                                <table width="100%">
                                    <tr>
                                        <td> &nbsp; Chage Point</td>
                                        <td> &nbsp; New line/Modify line</td>

                                    </tr>
                                    <tr>
                                        <td> &nbsp; Customer</td>
                                        <td> &nbsp; Toyota</td>

                                    </tr>

                                </table>
                                <!-- Chage Point -->
                                &nbsp;
                            </div>
                            <!-- col-md-6 Chage Point -->

                            <div class="row">
                                <div class="col-md-5">
                                    <table width="100%">
                                        <tr>
                                            <td> &nbsp; Out put</td>
                                            <td> &nbsp; Tool cost down</td>



                                        </tr>
                                        <tr>
                                            <td> &nbsp; Line name</td>
                                            <td> &nbsp; G4S Injector assembly</td>

                                        </tr>

                                    </table>
                                    <!-- Out put -->

                                </div>
                                <!-- col-md-6 Out put -->

                            </div>
                            <!-- Out put     -->
                        </div>
                        <!-- class="row" chage Point  -->
                        <br>
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
                                <h3>
                                    <center>** รูปภาพ ปรึกษาทาง HR </center>
                                </h3>

                            </div>
                            <!-- col-md-8 Picture -->
                        </div>
                        <!-- class="row" Picture  -->
                        <div class="row">
                            <div class="col-md-7">
                                <table width="100%">
                                    <tr>
                                        <td> &nbsp; Implement plan</td>
                                        <td>
                                            <center>Fix 1 Year </center>
                                        </td>



                                    </tr>
                                    <tr>
                                        <td> &nbsp; 1) PCR plan submission</td>
                                        <td> &nbsp; </td>

                                    </tr>
                                    <tr>
                                        <td> &nbsp; 2) PCR plan submission</td>
                                        <td> &nbsp; </td>

                                    </tr>
                                    <tr>
                                        <td> &nbsp; 3) PCR plan submission</td>
                                        <td> &nbsp; </td>

                                    </tr>
                                    <tr>
                                        <td> &nbsp; 4) PCR plan submission</td>
                                        <td> &nbsp; </td>

                                    </tr>
                                    <tr>
                                        <td> &nbsp; 5) PCR plan submission</td>
                                        <td> &nbsp; </td>

                                    </tr>
                                    <tr>
                                        <td> &nbsp; 6) PCR plan submission</td>
                                        <td> &nbsp; </td>

                                    </tr>
                                    <tr>
                                        <td> &nbsp; 7) PCR plan submission</td>
                                        <td> &nbsp; </td>

                                    </tr>
                                    <tr>
                                        <td> &nbsp; 8) PCR plan submission</td>
                                        <td> &nbsp; </td>

                                    </tr>

                                </table>
                                <!-- Implement plan -->
                                &nbsp;
                            </div>
                            <!-- col-md-8 Implement plan -->

                            <div class="row">
                                <div class="col-md-3">
                                    <table width="100%">
                                        <tr>
                                            <td> &nbsp;Data Attachment</td>



                                        </tr>
                                        <tr>
                                            <td> &nbsp; Daily check sheet</td>


                                        </tr>

                                        <tr>
                                            <td> &nbsp; Machine specification</td>


                                        </tr>
                                        <tr>
                                            <td> &nbsp; Control plan ,PCC</td>


                                        </tr>
                                        <tr>
                                            <td> &nbsp; PFMEA</td>


                                        </tr>
                                        <tr>
                                            <td> &nbsp; QA Network</td>


                                        </tr>
                                        <tr>
                                            <td> &nbsp; Minute Process DR meeting</td>


                                        </tr>
                                        <tr>
                                            <td> &nbsp; MSA</td>


                                        </tr>
                                        <tr>
                                            <td> &nbsp; Standardize work</td>


                                        </tr>



                                    </table>
                                    <!-- Data Attachment -->

                                </div>
                                <!-- col-md-4 Data Attachment -->

                            </div>
                            <!-- Data Attachment     -->
                        </div>
                        <!-- class="row" Implement plan  -->
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table width="100%">
                                    <tr>
                                        <td>
                                            <center> Planning review </center>
                                        </td>
                                        <td> &emsp; <Input type="radio" name="b" value="0"> &nbsp; Yes
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
                                            <center> Result approve </center>
                                        </td>
                                        <td> &nbsp;  <Input type="radio" name="p" value="0"> &nbsp; Part Examination
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
                                            <center> Comment </center>
                                        </td>
                                        <td> &emsp; 1)
                                            &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; 3)
                                            <br>
                                            &emsp; 2)
                                            &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; 4)
                                            <br>
                                        </td>
                                    </tr>
                                </table>
                                <!-- Planning review -->

                            </div>
                            <!-- col-md-12 Planning review -->
                            <br>
                        </div>
                        <!-- class="row" Planning review -->
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    &emsp; To : Quality Assurance Dept.
                                </p>

                            </div>
                            <!-- col-md-6 Quality -->
                            <div class="col-md-6">

                                <table id="t01" width="100%">
                                    <tr>
                                        <th></th>
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
                                            <center>Checked 1 </center>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <center>Plan</center>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <center>Resuit</center>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                </table>
                                <!-- id="t01" Approved -->
                            </div>
                            <!-- class="col-md-6" Approved -->

                        </div>
                        <!-- class="row" Quality  -->
                        <br>
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
                            <!-- col-md-12 Customer  -->

                        </div>
                        <!-- class="row" Customer   -->



















                    </div>
                    <!-- col-md-12" -->



                </div>
                <!-- class="row" -->



            </div>
            <!-- panel-body -->

        </div>
        <!-- panel panel-indigo -->

    </div>
    <!-- col-md-12 -->


</div>
<!-- class="row" -->
