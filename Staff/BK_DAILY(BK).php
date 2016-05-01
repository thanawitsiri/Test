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
?>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<style type="text/css">
<!--
@page rotated { size: landscape; }
body {
 	
}
.style1 {
	font-family: "Tahoma";
	font-size: 14pt;
	font-weight: bold;
}
.style2 {
	font-family: "Tahoma";
	font-size: 16px;
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
-->
</style>
<!doctype html>
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">
<title>รายงานการจองประจำวัน</title>

</head><!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<div class="style3" style="height:100%">

<?php 
$sql2 = "SELECT 
tb_booking.BK_Date,
tb_booking.BK_ID,
tb_booking.BK_Deposit,
tb_booking.BK_Status,
tb_booking.BK_DateIn,
tb_booking.BK_DateOut,
tb_booking.Cus_ID,
tb_customer.Cus_Name,
tb_room.Room_Name
FROM tb_booking
INNER JOIN tb_customer 
	ON tb_booking.Cus_ID = tb_customer.Cus_ID
INNER JOIN tb_booking_detail
	ON tb_booking.BK_ID = tb_booking_detail.BK_ID
INNER JOIN tb_room
	ON tb_booking_detail.Room_ID = tb_room.Room_ID 
	WHERE tb_booking.BK_Date between '".$_POST['day1']."' and '".$_POST['day2']."'GROUP BY BK_Date";
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
  <table class="report-title" width="497" border="0" align="center" style="margin-bottom: 15px;">
    <tbody>
      <tr>
        <td width="254" class="style2">ตูบนายา โฮมสเตย์</td>
      </tr>
      <tr>
        <td class="style2">รายงานการจองประจำวัน</td>
      </tr>
      <tr>
        <td class="style3">ตั้งแต่วันที่ <? echo $startDate;?> <? echo $startM;?> พ.ศ. <? echo $startY;?> ถึง วันที่ <? echo $endDate;?> <? echo $endM;?> พ.ศ. <? echo $endY;?></td>

      </tr>
    </tbody>
  </table>
  <table class="table table-bordered table-hover style3 report" width="770" border="3" align="center">
  	<thead>
        <tr style="font-weight: bold">
        <td>วันที่จอง</td>
        <td>รหัสการจอง</td>
        <td>รหัสสมาชิก</td>
        <td>ชื่อ - นามสกุล</td>
        <td>ค่ามัดจำ(บาท)</td>
        <td>สถานะ</td>
        <td>วันที่แจ้งเข้าพัก</td>
        <td>วันที่แจ้งออก</td>
        <td>ชื่อห้องพัก</td>
      </tr>
    </thead>
    <tbody> 
    
<?php 
$sql = "SELECT 
tb_booking.BK_Date,
tb_booking.BK_ID,
tb_booking.BK_Deposit,
tb_booking.BK_Status,
tb_booking.BK_DateIn,
tb_booking.BK_DateOut,
tb_booking.Cus_ID,
tb_customer.Cus_Name,
tb_room.Room_Name
FROM tb_booking
INNER JOIN tb_customer 
	ON tb_booking.Cus_ID = tb_customer.Cus_ID
INNER JOIN tb_booking_detail
	ON tb_booking.BK_ID = tb_booking_detail.BK_ID
INNER JOIN tb_room
	ON tb_booking_detail.Room_ID = tb_room.Room_ID
WHERE tb_booking.BK_Date between '".$_POST['day1']."' and '".$_POST['day2']."'  GROUP BY BK_Date";
$dbname = "toobnaya";
$conn=new mysqli("localhost","root","123456789",$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query($sql);

if($result === FALSE) { 
    die(mysql_error()); //test result
}
$num_rows = mysqli_num_rows($result);	
$lastDate = null;
$count = 0;
$countRow = 0;
while($row = mysqli_fetch_array($result)){ ?> 
<? 
		$inputD = $row["BK_Date"];
		$tmpsTest=  $inputD ;
		$dd = new DateTime($tmpsTest);
		$d = ($dd->format('d'));
if (is_null($lastDate))	{
	$count++;
}
else if (!is_null($lastDate) && $lastDate == $d){
	$count++;
}
		
if (!is_null($lastDate) && $lastDate !== $d){?>
	<tr style="font-weight: bold"> 
        <td colspan="7">&nbsp;</td>
        <td>รวม</td>
        <td><? echo $count; ?> รายการ</td>
      </tr>
<? $count = 1;}?>

<tr>
<td><? echo substr($row['BK_Date'],0,10);  ?></td>
<td><? echo $row['BK_ID'];  ?></td>
<td><? echo $row['Cus_ID'];  ?></td>
<td><? echo $row['Cus_Name'];  ?></td>
<td><? echo number_format($row['BK_Deposit']);  ?></td>
<td><? if($row['BK_Status'] == 0) { echo "ยังไม่ได้ชำระ";  }
	   elseif($row['BK_Status'] == 1) { echo "รอตรวจสอบ";  } 
	   elseif($row['BK_Status'] == 2) { echo "ชำระแล้ว";  }
	   elseif($row['BK_Status'] == 3) { echo "ยกเลิกการจอง";  } 
	   elseif($row['BK_Status'] == 1) { echo "มีการเข้าพักแล้ว";  }  ?>
       </td>
<td><? echo $row['BK_DateIn'];  ?></td>
<td><? echo $row['BK_DateOut'];  ?></td>
<td><? echo $row['Room_Name'];  ?></td>
</tr>
<? if (++$counRow == $num_rows) {?>
       <tr style="font-weight: bold"> 
        <td colspan="7">&nbsp;</td>
        <td>รวม</td>
        <td><? echo $count ?> รายการ</td>
      </tr>
<? 
    } 
$lastDate = $d;

}?>
<tr style="font-weight: bold">
<td colspan="7">&nbsp;</td>
        <td>รวมทั้งหมด</td>
        <td><? echo $num_rows; ?> รายการ</td>
</tr>
    </tbody>
  </table>
  


  <p>&nbsp;</p>
	
</div>

<script src="https://code.jquery.com/jquery-1.11.3.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<body style="text-align: center">
</body>
</html>
