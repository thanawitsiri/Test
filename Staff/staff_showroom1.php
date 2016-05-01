<?
session_start();
	if($_SESSION['Emp_ID'] == "")
	{
	echo "Please Login!";
	exit();
	}
	
	include("config.php");
	$sql="SELECT * FROM tb_emp WHERE Emp_ID = '".$_SESSION['Emp_ID']."'";
	$query=mysql_query($sql);
	$result=mysql_fetch_array($query);
		error_reporting(0);
	date_default_timezone_set("Asia/Bangkok");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แสดงห้องพักที่ว่าง</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 780px;
	top: 301px;
	width: 112px;
	height: 32px;
	z-index: 1;
}
</style>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>

<link rel="stylesheet" media="all" type="text/css" href="jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />

<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>

<script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="jquery-ui-sliderAccess.js"></script>
</head>

<body>
<table width="1032" height="711" border="0" >
  <tr>
    <td height="260" colspan="2" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="1026" height="261" /></td>
  </tr>
  <tr>
    <td width="189" height="201" align="left" valign="top" bgcolor="#999999"><h2>
      <input  name="button8" type="submit" id="button8" onclick="MM_goToURL('parent','staff_home.php');return document.MM_returnValue" value="              หน้าแรก                  " width="500" />
      <br />
      <input name="button2" type="submit" id="button2" onclick="MM_goToURL('parent','staff_member.php');return document.MM_returnValue" value="        แสดง/ลบข้อมูลลูกค้า       " height="100" />
      <br />
      <a href="staff_room.html">
        <input name="button3" type="submit" id="button3" onclick="MM_goToURL('parent','staff_room.php');return document.MM_returnValue" value="       แสดง/ลบข้อมูลห้องพัก     " />
        </a> <br />
      <a href="staff_room.html">
        <input name="button4" type="submit" id="button4" onclick="MM_goToURL('parent','staff_service.php');return document.MM_returnValue" value="     แสดง/ลบข้อมูลค่าบริการ     " />
        </a> <br />
      <input name="บันทึกการจอง" type="submit" id="บันทึกการจอง" onclick="MM_goToURL('parent','staff_showroom.php');return document.MM_returnValue" value="       แสดงห้องพักที่ว่างจอง     " />
      <br />
      <a href="staff_showroom1.php">
        <input name="บันทึกการจอง" type="submit" id="บันทึกการจอง" onclick="MM_goToURL('parent','staff_showroom1.php');return document.MM_returnValue" value="    แสดงห้องพักที่ว่างเข้าพัก     " />
        </a> <br />
      <a href="staff_room.html">
        <input name="button5" type="submit" id="button5" onclick="MM_goToURL('parent','staff_booking_detail.php');return document.MM_returnValue" value="        แสดง/ยกเลิกการจอง       " />
        </a> <br />
      <input type="submit" onclick="MM_goToURL('parent','staff_stay.php');return document.MM_returnValue" value="           แสดงการเข้าพัก           " />
      <input type="submit" onclick="MM_goToURL('parent','staff_payment.php');return document.MM_returnValue" value="         แสดงการรับชำระ           " />
      <br />
      <? if($result['Emp_Level'] == 1) { ?>
      <input type="submit" onclick="MM_goToURL('parent','staff_report.php');return document.MM_returnValue" value="                รายงาน                 " />
      <? } else { ?>
      <input type="submit" onclick="MM_goToURL('parent','boss_report.php');return document.MM_returnValue" value="                รายงาน                 " />
      <? } ?>
      <? if($result['Emp_Level'] == 2) { ?>
      <br />
      <input type="submit" onclick="MM_goToURL('parent','boss_staff.php');return document.MM_returnValue" value="     แสดง/ลบข้อมูลพนักงาน      " />
      <? }?>
      <br />
      <input type="submit" onclick="MM_goToURL('parent','staff_editstaff.php');return document.MM_returnValue" value="        แก้ไขข้อมูลพนักงาน        " />
      <br />
      <input type="submit" onclick="MM_goToURL('parent','staff___logout.php');return document.MM_returnValue" value="             ออกจากระบบ            " />
      <br />
      <br />
      <br />
      <br />
      <br />
    </h2>
      <p></p></td>
    <td width="833" height="413" align="center" valign="top" bgcolor="#D8D8D8"><h2>แสดงห้องพักที่ว่างเข้าพัก</h2>
      <form method="get" name="form2" id="frmSearch" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
        <p>ค้นหาลูกค้า :
          <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $_GET["txtKeyword"];?>" />
          <input type="submit" value="Search" />
        </p>
        <? if($_GET["txtKeyword"] != "")
	{
	$strSQL1 = "SELECT * FROM tb_customer WHERE (Cus_Phone LIKE '%".$_GET["txtKeyword"]."%' or Cus_Name LIKE '%".$_GET["txtKeyword"]."%' or Cus_Email  LIKE '%".$_GET["txtKeyword"]."%' )";
	$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
	$objResult1 = mysql_fetch_array($objQuery1);
	$_SESSION['cusid'] = $objResult1['Cus_ID'];
	}
	?>
        <p>รหัสลูกค้า : <? echo $objResult1['Cus_ID']; ?> / ชื่อลูกค้า : <? echo $objResult1['Cus_Name']; ?></p>
        <p>เลขประจำตัวประชาชน/เลขที่หนังสือเดินทาง	 : <? echo $objResult1['Cus_IDcard']; ?> 
      </form>
      <p>
        <script type="text/javascript">

$(function(){

	var startDateTextBox = $('#txtcheckin');
	var endDateTextBox = $('#txtChekout');

	startDateTextBox.datepicker({ 
		dateFormat: 'yy-mm-dd',
		onClose: function(dateText, inst) {
			if (endDateTextBox.val() != '') {
				var testStartDate = startDateTextBox.datetimepicker('getDate');
				var testEndDate = endDateTextBox.datetimepicker('getDate');
				if (testStartDate > testEndDate)
					endDateTextBox.datetimepicker('setDate', testStartDate);
			}
			else {
				endDateTextBox.val(dateText);
			}
		},
		onSelect: function (selectedDateTime){
			endDateTextBox.datetimepicker('option', 'minDate', startDateTextBox.datetimepicker('getDate') );
		}
	});
	endDateTextBox.datepicker({ 
		dateFormat: 'yy-mm-dd',
		onClose: function(dateText, inst) {
			if (startDateTextBox.val() != '') {
				var testStartDate = startDateTextBox.datetimepicker('getDate');
				var testEndDate = endDateTextBox.datetimepicker('getDate');
				if (testStartDate > testEndDate)
					startDateTextBox.datetimepicker('setDate', testEndDate);
			}
			else {
				startDateTextBox.val(dateText);
			}
		},
		onSelect: function (selectedDateTime){
			startDateTextBox.datetimepicker('option', 'maxDate', endDateTextBox.datetimepicker('getDate') );
		}
	});

});

        </script>
      </h2>
      </p>
      <form id="form1" name="form1" method="post" action="">

        ในช่วงวันที่
        <input type="text" name="txtcheckin" id="txtcheckin" value="<? echo $_POST['txtcheckin']?>"/>
ถึงวันที่
<input type="text" name="txtChekout" id="txtChekout" value="<? echo $_POST['txtChekout']?>" />
<input type="submit" name="button3" id="button3" value="ค้นหา" />
<br />
<br />

      </form>
      <form action="staff_checkin2.php" method="post" name="form1" id="form1">
        <table width="720" border="1" align="center">
          <tr>
            <td width="80" align="center" bgcolor="#FFCC33"><h4>รหัสห้องพัก </h4></td>
            <td align="center" bgcolor="#FFCC33"><h4>ชื่อห้องพัก </h4></td>
            <td align="center" bgcolor="#FFCC33"><h4>รูปภาพ </h4></td>
            <td align="center" bgcolor="#FFCC33"><h4>ราคาต่อคืน (บาท) </h4></td>
            <td bgcolor="#FFCC33"><h4>&nbsp;</h4></td>
<? 
$_POST['chktype'] = 2;
if($_POST['txtcheckin'] != "" || $_POST['txtChekout'] != "")
				{
				date_default_timezone_set('UTC');		
				$startdate = $_POST['txtcheckin']; 
				$enddate = $_POST['txtChekout']; 
				$enddate1 = $_POST['txtcheckin'];
				$_POST['chktype'] = 2;
	
			
		if  ($_POST['chktype'] == 1 ){
		$strSQL2 ="SELECT
				tb_booking.BK_ID,
				tb_booking.BK_Date,
				tb_booking.BK_DateIn,
				tb_booking.BK_DateOut,
				tb_booking.BK_Money,
				tb_booking.BK_Deposit,
				tb_booking.BK_Note,
				tb_booking.BK_Status,
				tb_booking.BK_Type,
				tb_booking.BK_Document,
				tb_booking.BK_Bankno,
				tb_booking.BK_Bankname,
				tb_booking.BK_Datepay,
				tb_booking.BK_Timepay,
				tb_booking.Cus_ID
				FROM
				tb_booking
				INNER JOIN tb_booking_detail ON tb_booking.BK_ID = tb_booking_detail.BK_ID
				INNER JOIN tb_room ON tb_booking_detail.Room_ID = tb_room.Room_ID
				WHERE NOT('$enddate1' <  tb_booking.BK_DateIn OR '$startdate' > tb_booking.BK_DateOut)
											ORDER BY tb_room.Room_ID";
									} 
									if  ($_POST['chktype'] == 2 ){
									$strSQL2 ="SELECT
									tb_room.Room_ID,
									tb_room.Room_Name,
									tb_room.Room_Type,
									tb_room.Room_Status,
									tb_room.Room_St,
									tb_room.Room_Price,
									tb_room.Room_Detail,
									tb_room.Room_Picture
									FROM
									tb_room
									WHERE tb_room.Room_ID NOT IN (SELECT tb_room.Room_ID FROM tb_room
									INNER JOIN tb_booking_detail ON tb_booking_detail.Room_ID = tb_room.Room_ID
									INNER JOIN tb_booking ON tb_booking.BK_ID = tb_booking_detail.BK_ID
									WHERE NOT('$enddate1' <  tb_booking.BK_DateIn OR '$startdate' > tb_booking.BK_DateOut))
									and tb_room.Room_St != 2";
									}
				$objQuery = mysql_query($strSQL2) or die (mysql_error());
					}
		

?>
        <?
		$i=0;
		while($objResult = mysql_fetch_array($objQuery))
		{
		$i++;
?>
          </tr>
          <tr>
            <td align="center" valign="middle"><div align="center"><?php echo $objResult["Room_ID"];?></div></td>
            <td width="114" align="center" valign="middle"><?php echo $objResult["Room_Name"];?></td>
            <td width="249" align="center" valign="middle"><img src="myfile/<? echo $objResult["Room_Picture"]; ?>" alt="" width="249" height="150" /></td>
            <td width="133" align="center" valign="middle"><?php echo number_format($objResult["Room_Price"]);?></td>
            <td width="61" align="center" valign="middle"><input name="Room_ID[]" type="checkbox" value="<? echo $objResult["Room_ID"] ?>" /></td>
          </tr>
          <?php } ?>
          <?php 
		  $_SESSION['checkin'] = $_POST['txtcheckin'];
		  $_SESSION['checkout'] = $_POST['txtChekout'];
		  $_SESSION['Room_ID'] = $_POST['Room_ID'];
		  ?>


        </table>
        <p>
          <input type="submit" name="button6" id="button4" value="ตกลง" />
          <br />
          <br />
        </p>
      </form>
  </tr>
  <tr>
    <td height="27" colspan="2" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
