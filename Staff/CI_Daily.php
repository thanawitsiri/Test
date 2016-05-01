<?
include("config.php");	
	date_default_timezone_set('Asia/Bangkok');
	
?>
<?php
function ThaiDay($dayoffWeek)
{
	$tmps = array (
	Sunday =>'วันอาทิตย์',
	Monday => 'วันจันทร์',
	Tuesday =>'วันอังคาร',
	Wednesday =>'วันพุธ',
	Thursday =>'วันพฤหัสบดี',
	Friday=>'วันศุกร์',
	Saturday =>'วันเสาร์');
	return $tmps[$dayoffWeek];
}
function ThaiMonth($Month)
{
	$temp = array (
	January =>'มกราคม',
	February => 'กุมภาพันธ์',
	March =>'มีนาคม',
	April =>'เมษายน',
	May =>'พฤษภาคม',
	June =>'มิถุนายน',
	July =>'กรกฎาคม',
	August => 'สิงหาคม',
	September => 'กันยายน',
	October => 'ตุลาคม',
	November => 'พฤศจิกายน',
	December => 'ธันวาคม');
	return $temp[$Month];
}
function thaiDate($datetime) {
	list($date,$time) = split(' ',$datetime);
	list($H,$i,$s) = split(':',$time); 
	list($Y,$m,$d) = split('-',$date);
	$Y = $Y+543; 
	
	switch($m) {
		case "01":	$m = "ม.ค."; break;
		case "02":	$m = "ก.พ."; break;
		case "03":	$m = "มี.ค."; break;
		case "04":	$m = "เม.ย."; break;
		case "05":	$m = "พ.ค."; break;
		case "06":	$m = "มิ.ย."; break;
		case "07":	$m = "ก.ค."; break;
		case "08":	$m = "ส.ค."; break;
		case "09":	$m = "ก.ย."; break;
		case "10":	$m = "ต.ค."; break;
		case "11":	$m = "พ.ย."; break;
		case "12":	$m = "ธ.ค."; break;
	}
		return $d." ".$m." ".$Y;
}
function timee($datetime){
	list($date,$time) = split(' ',$datetime);
	list($H,$i,$s) = split(':',$time); 
	list($Y,$m,$d) = split('-',$date);
	$Y = $Y+543; 
	
	return $H.":".$i.":".$s;
}
?>

 
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">

<style type="text/css">
<!--
@page rotated { size: landscape; }
.style1 {
	font-family: "TH SarabunPSK";
	font-size: 18pt;
	font-weight: bold;
}
.style2 {
	font-family: "TH SarabunPSK";
	font-size: 16pt;
	font-weight: bold;
	text-align: center;
}
.style3 {
    font-family: "Tahoma";
    font-size: 10pt;
    text-align: center;
    padding: 2% 10%;
}
.style5 {cursor: hand; font-weight: normal; color: #000000;}
.style9 {font-family: Tahoma; font-size: 12px; }
.style11 {font-size: 12px}
.style13 {font-size: 9}
.style16 {font-size: 9; font-weight: bold; }
.style17 {font-size: 12px; font-weight: bold; }
.report thead {
	background-color: lightgray;	
}
.report thead td{
	text-align: center;
	font-size: 23px;
    font-weight: bolder;
}

.report thead span {
	font-family: "Tahoma";
    font-size: 14pt;
    font-weight: bold;
}

.report-title .title-bolder{
	font-family: "Tahoma";
    font-size: 16px;
    font-weight: bold;
    text-align: center;
}
-->
</style>
<!doctype html>
<html>
    <head>
        <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
        <title>รายงานการจองประจำวัน</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" 
        	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
            integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" 
            crossorigin="anonymous">
        
        <!-- Optional theme -->
        <link rel="stylesheet" 
        	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" 
            integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" 
            crossorigin="anonymous">
    </head>
<?php 
$sql2 = "SELECT 
tb_checkin.CheckIn_Date,
tb_checkin.CheckIn_ID,
tb_customer.Cus_ID,
tb_customer.Cus_Name,
tb_booking.BK_ID,
tb_room.Room_Name,
tb_checkin.CheckIn_Status
FROM tb_checkin
INNER JOIN tb_room
	ON tb_checkin.Room_ID = tb_room.Room_ID
INNER JOIN tb_customer
	ON tb_checkin.Cus_ID = tb_customer.Cus_ID
INNER Join tb_booking
	ON tb_checkin.BK_ID = tb_booking.BK_ID
WHERE tb_checkin.CheckIn_Date between '".$_POST['day1']."' and '".$_POST['day2']."'GROUP BY CheckIn_Date";
$dbname = "toobnaya";
$conn=new mysqli("localhost","root","123456789",$dbname);
$result2 = $conn->query($sql2);

$startDate = $_POST['day1'];
$startM = $_POST['day1'];
$startY = $_POST['day1'];
$endDate = $_POST['day2'];
$endM = $_POST['day2'];
$endY = $_POST['day2'];
$rowCheck = 0;
$countDateRow = 1;
$numOfRows = mysqli_num_rows($result2);
while($row = mysqli_fetch_array($result2)){
	
   $inputDate = $_POST['day1'];
   $tmps=  $inputDate ;
   $date = new DateTime($tmps);
   $day = ($date->format('d'));
   $month = ThaiMonth($date->format('F') );
   $year = ($date->format('Y') + 0);
   $yearp = $year + 543;
     
   $inputDate1 = $_POST['day2'];
   $tmps1=  $inputDate1 ;
   $date1 = new DateTime($tmps1);
   $day1 = ($date1->format('d'));
   $month1 = ThaiMonth($date1->format('F') );
   $year1 = ($date1->format('Y') + 0);
   $yearp1 = $year1 + 543;
   if($rowCheck ==0){
		$startDate = $day;
		$startM = $month;
		$startY = $yearp;
	}
   else if (++$countDateRow == $numOfRows) {
	   
	   $endDate = $day1;
	   $endM = $month1;
	   $endY = $yearp1;
   }
	$rowCheck++;
}
?>
    <body style="text-align: center">
        <div class="style3">
            <table class="report-title" width="400" border="0" align="center">
                <tbody>
                  <tr>
                    <td width="254" class="style2 title-bolder">ตูบนายา โฮมสเตย์</td>
                  </tr>
                  <tr>
                    <td class="style2 title-bolder">รายงานการเข้าพักประจำวัน</td>
                  </tr>
                  <tr>
                    <td class="style2">ตั้งแต่วันที่ <? echo $startDate;?> <? echo $startM;?> พ.ศ. <? echo $startY;?> ถึง วันที่ <? echo $endDate;?> <? echo $endM;?> พ.ศ. <? echo $endY;?></td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-bordered table-hover style3 report" width="770" border="3" align="center" class="style3">
                <thead>
                	<tr style="font-weight: bold">
                        <td><span>วันที่เข้าพัก</span></td>
                        <td><span>รหัสการเข้าพัก</span></td>
                        <td><span>รหัสสมาชิก</span></td>
                        <td><span>ชื่อ - นามสกุล</span></td>
                        <td><span>รหัสการจอง</span></td>
                        <td><span>ชื่อห้องพัก</span></td>
                        <td><span>เวลาที่เข้าพัก</span></td>
                        <td><span>สถานะ</span></td>
                  	</tr>
                </thead>
                <tbody>
                  
                  <tr>
                    <td>&nbsp;<? echo thaiDate($row['CheckIn_Date']);  ?></td>
                    <td>&nbsp;<? echo $row['CheckIn_ID'];  ?></td>
                    <td>&nbsp;<? echo $row['Cus_ID'];  ?></td>
                    <td>&nbsp;<? echo $row['Cus_Name'];  ?></td>
                    <td>&nbsp;<? echo $row['BK_ID'];  ?></td>
                    <td>&nbsp;<? echo $row['Room_Name'];  ?></td>
                    <td>&nbsp;<? echo timee($row['CheckIn_Date']);  ?></td>
                    <td>&nbsp;<? if($row['CheckIn_Status'] == 'Y') {echo "มีการเข้าพัก";} elseif($row['CheckIn_Status'] == 'N'){echo "ออกจากการเข้าพัก";}?></td>  
                  </tr>
                  
                  
                  <tr>
                    <td>2016-04-12</td>
                    <td>1</td>
                    <td>2</td>
                    <td>MAx CMU</td>
                    <td>1</td>
                    <td>Sweet</td>
                    <td>2016-04-12</td>
                    <td>Yes</td>  
                  </tr>
                  <tr>
                    <td>2016-04-12</td>
                    <td>1</td>
                    <td>2</td>
                    <td>MAx CMU</td>
                    <td>1</td>
                    <td>Sweet</td>
                    <td>2016-04-12</td>
                    <td>Yes</td>  
                  </tr>
                   <tr>
                    <td>2016-04-12</td>
                    <td>1</td>
                    <td>2</td>
                    <td>MAx CMU</td>
                    <td>1</td>
                    <td>Sweet</td>
                    <td>2016-04-12</td>
                    <td>Yes</td>  
                  </tr>
                   <tr>
                    <td>2016-04-12</td>
                    <td>1</td>
                    <td>2</td>
                    <td>MAx CMU</td>
                    <td>1</td>
                    <td>Sweet</td>
                    <td>2016-04-12</td>
                    <td>Yes</td>  
                  </tr>
                  
                  <tr>
                    <td colspan="6">&nbsp;</td>
                    <td style="font-weight: bold">รวม</td>
                    <td style="font-weight: bold">รายการ</td>
                  </tr>
                  <tr>
                    <td colspan="6">&nbsp;</td>
                    <td style="font-weight: bold">รวมมีการเข้าพัก</td>
                    <td style="font-weight: bold">รายการ</td>
                  </tr>
                  <tr>
                    <td colspan="6">&nbsp;</td>
                    <td style="font-weight: bold">รวมออกจากการเข้าพัก</td>
                    <td style="font-weight: bold">รายการ</td>
                  </tr>
                  <tr>
                    <td colspan="6">&nbsp;</td>
                    <td style="font-weight: bold">รวมทั้งสิ้น</td>
                    <td style="font-weight: bold">รายการ</td>
                  </tr>
                </tbody>
              </table>
          </div>
          
          <script src="https://code.jquery.com/jquery-1.11.3.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
			integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" 
			crossorigin="anonymous"></script>
    </body>
</html>
