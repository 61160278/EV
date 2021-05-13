<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>css print report table continue</title>
    <style type="text/css">
    * {
        margin: 0;
        padding: 0;
        font-family: Arial, "times New Roman", tahoma;
        font-size: 12px;
    }

    html {
        font-family: Arial, "times New Roman", tahoma;
        font-size: 12px;
        color: #000000;
    }

    body {
        font-family: Arial, "times New Roman", tahoma;
        font-size: 12px;
        padding: 0;
        margin: 0;
        color: #000000;
    }

    .headTitle {
        font-size: 12px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .headerTitle01 {
        border: 1px solid #333333;
        border-left: 2px solid #000;
        border-bottom-width: 2px;
        border-top-width: 2px;
        font-size: 11px;
    }

    .headerTitle01_r {
        border: 1px solid #333333;
        border-left: 2px solid #000;
        border-right: 2px solid #000;
        border-bottom-width: 2px;
        border-top-width: 2px;
        font-size: 11px;
    }

    /* สำหรับช่องกรอกข้อมูล  */
    .box_data1 {
        font-family: Arial, "times New Roman", tahoma;
        height: 18px;
        border: 0px dotted #333333;
        border-bottom-width: 1px;
    }

    /* กำหนดเส้นบรรทัดซ้าย  และด้านล่าง */
    .left_bottom {
        border-left: 2px solid #000;
        border-bottom: 1px solid #000;
    }

    /* กำหนดเส้นบรรทัดซ้าย ขวา และด้านล่าง */
    .left_right_bottom {
        border-left: 2px solid #000;
        border-bottom: 1px solid #000;
        border-right: 2px solid #000;
    }

    /* สร้างช่องสี่เหลี่ยมสำหรับเช็คเลือก */
    .chk_box {
        display: block;
        width: 10px;
        height: 10px;
        overflow: hidden;
        border: 1px solid #000;
    }

    /* css ส่วนสำหรับการแบ่งหน้าข้อมูลสำหรับการพิมพ์ */
    @media all {
        .page-break {
            display: none;
        }

        .page-break-no {
            display: none;
        }
    }

    @media print {
        .page-break {
            display: block;
            height: 1px;
            page-break-before: always;
        }

        .page-break-no {
            display: block;
            height: 1px;
            page-break-after: avoid;
        }
    }
    </style>
</head>

<body>

    <table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" class="headTitle" style="font-size:15px;">Process Change Report<br /></td>
        </tr>
        <tr>
            <td align="left">
                <table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>&nbsp;</td>
                        <td align="center">
                            <div class="text"></div>
                        </td>
                        <td align="left">PCR No. ___________________</td>
                        <td align="center">
                            <div class="text"></div>
                        </td>
                        <td align="left"></td>
                        
                        <td align="center">
                            <div class="text"></div>
                        </td>
                        <td align="left"></td>
                        
                        
                        <td align="center">
                            <div class="text"></div>
                        </td>
                        <td align="right">Issue Date : ___________________</td>


                    </tr>
                    <tr>
                        <td></td>
                        <td align="center">&nbsp;</td>
                        <td align="left"></td>
                        <td align="center">&nbsp;</td>
                        <td align="left"></td>
                        <td>&nbsp;</td>
                        <td align="left"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="center">
                            <div class="text"></div>
                        </td>
                        <td align="left"> Annual plan No. _____________</td>
                        <td align="center">
                            <div class="chk_box"></div>
                        </td>
                        <td align="left"> Normal</td>
                        <td align="center">
                            <div class="chk_box"></div>
                        </td>
                        <td align="left">Urgent</td>
                        <td align="center">
                            <div class="text"></div>
                        </td>
                        <td align="left"> &nbsp; &nbsp; &nbsp; Department : ______________</td>
                        <td>&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td align="center">&nbsp;</td>
                        <td align="left"></td>
                        <td align="center">&nbsp;</td>
                        <td align="left"></td>
                        <td>&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="center">
                            <div class="text"></div>
                        </td>
                        <td align="left"> Subject _____________________</td>
                        <td align="center">
                            <div class="text"></div>
                        </td>
                        <td align="left"></td>
                        <td>&nbsp;</td>
                        <td align="left">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- PCR No. -->
        <tr>
            <td align="left">From</td>
        </tr>
        <tr>
            <td align="left">
                <table width="750" border="0" align="left" cellpadding="0" cellspacing="0"
                    style="border-collapse:collapse;border-top:2px double #000;">
                    <tr>
                        <th width="50" class="headerTitle01"  align="left"> <center>PCR Rank </center></th>
                        
                        <th width="50" class="headerTitle01" align="left"> <center>PCR Type </center></th>
                        
                    </tr>
                    <!-- PCR Rank -->
                    <tr>
                        <td height="20" align="center" class="left_bottom top_right">C2</td>
                        <td height="20" align="center" class="left_bottom">Repeat </td>
                       </tr>
                </table>
        
               
                
                
                <!-- PCR Rank -->
            </td>
            <!-- PCR Rank -->
        </tr> 
        <!-- PCR Rank -->
        
        
        <tr>
            <td align="left">
                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="50%" align="left">- ใบรับฝากนี้ใช้เป็นหลักฐานการฝากส่ง
                            โปรดเก็บรักษาไว้จนหมดอายุ<br />
                            การสอบสวน คือ ระยะเวลา 6 เดือน นับจากวันต่อจากวันที่ฝากส่ง<br /></td>
                        <td width="50%" align="left">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="left">- การติดต่อในเรื่องใดเกี่ยวกับการฝากส่ง ต้องนำใบฝากฉบับนี้<br />
                            มาแสดงทุกครั้ง มิฉะนั้น ปณท อาจไม่ทำการตรวจสอบหรือสอบสวนให้</td>
                        <td align="left">
                            <table width="300" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="100" align="right">พนักงานรับฝาก</td>
                                    <td width="62%"><input name="textfield10" type="text" class="box_data1"
                                            id="textfield10" style="text-align:center;width:200px;" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Counter Clerk</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>