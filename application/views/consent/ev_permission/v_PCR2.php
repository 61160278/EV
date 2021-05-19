<style type="text/css">
#container {
    width: 600px;
    font: bold 14px TAahoma, "MS Sans Serif"
}

#containerLeft {
    float: left;
    width: 400px;
}

#containerRight {
    float: right;
    width: 200px;
    height: 150px;
}

#containerCenter {
    float: center;
    width: 200px;
    height: 150px;
}

#col1 {
    float: left;
    width: 200;
    height: 200px;
}

#col2 {
    float: center;
    width: 100;
    height: 150px;
}

table,
th,
td {
    border: 1px solid black;
    width: 200;
}
</style>

<h1 align='center'><b>Process Change Report</b></h1>
<div class="row">
    <div id="container">
        <div id="containerLeft">
            <div id="col1">PCR No. ___________________
                <br> <br>
                Annual plan No. _____________
                <br> <br>
                Subject _____________________
            </div>
            <div id="col2">
                &nbsp; &nbsp; &emsp; &emsp;
                <br> <br>
                <Input type="radio" name="manmer" value="0">&nbsp; Normal
                &nbsp; &nbsp;
                <Input type="radio" name="manmer" value="0">&nbsp; Urgent
            </div>
        </div>
        <!-- containerLeft -->
        <div id="containerRight">Issue Date : ____________
            <br> <br>
            Department : ___________
        </div>
        <!-- Issue Date : ___________ -->
    </div>
    <!-- container -->
    <div id="container">
        <table>
            <div id="containerRight">
                <div id="col1">
                    <tr>
                        <th>PCR Rank</th>
                        <th>PCR Type</th>


                    </tr>
                    <tr>
                        <td>
                            <center>C2</center>
                            </th>
                        <td>
                            <center>Repeat</center>
                            </th>
                    </tr>
                </div>
            </div>
            <div id="containerRight">
            <div id="col1">
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
            </div>
        </div>
        </table>
    </div>
    <!-- container -->

</div>
<!-- class="row" -->