<?
session_start();
	if($_SESSION['Cus_ID'] == "")
	{
	echo "Please Login!";
	exit();
	}
	
	include("config.php");
	$sql="SELECT * FROM tb_customer WHERE Cus_ID = '".$_SESSION['Cus_ID']."'";
	$query=mysql_query($sql);
	$result=mysql_fetch_array($query);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking</title>
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
<table width="962" border="0" a>
  <tr>
    <td height="260" colspan="6" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="953" height="262" /></td>
  </tr>
  <tr>
    <td height="36" align="center" bgcolor="#CCCCCC"><strong><a href="home.php">หน้าแรก</a></strong></td>
    <td width="180" align="center" bgcolor="#CCCCCC"><strong><a href="register.php">สมัครสมาชิก</a></strong></td>
    <td width="175" align="center" bgcolor="#CCCCCC"><strong><a href="room_detail.php">รายละเอียดห้องพัก</a></strong></td>
    <td width="132" align="center" bgcolor="#CCCCCC"><strong><a href="how_to_booking.php">วิธีจองห้องพัก</a></strong></td>
    <td width="178" align="center" bgcolor="#CCCCCC"><strong><a href="payment.php">ข้อมูลบัญชีธนาคาร</a></strong></td>
    <td width="85" align="center" bgcolor="#CCCCCC"><strong><a href="contact_us.php">ติดต่อเรา</a></strong></td>
  </tr>
  <tr>
    <td width="170" valign="top" bgcolor="#00CCFF"><form method="post" action="checklogin.php">
      <p>          ยินดีต้อนรับ</p>
      <p>ชื่อผู้ใช้งาน : <? echo $result["Cus_User"]; ?></p>
      <p>ชื่อ-นามสกุล :<br />
      </p>
      <p><? echo $result["Cus_Name"]; ?>&nbsp;</p>
      <p>
        <input name="button2" type="submit" id="button6" onclick="MM_goToURL('parent','booking.php');return document.MM_returnValue" value="     แสดงห้องพัก      " />
    </p>
      <p>
        <input name="button" type="submit" id="button" onclick="MM_goToURL('parent','editmember.php');return document.MM_returnValue" value=" แก้ไขข้อมูลสมาชิก  " />
      </p>
      <p>
        <input name="button4" type="submit" id="button2" onclick="MM_goToURL('parent','booking_detail.php');return document.MM_returnValue" value="แสดงการจองห้องพัก " />
      </p>
      <p>
        <input name="button5" type="submit" id="button5" onclick="MM_goToURL('parent','logout.php');return document.MM_returnValue" value="    ออกจากระบบ      " />
      </p>
      <label for="textfield3"></label>
      <label for="textfield3"></label>
    </form></td>
    <td colspan="5" align="center" valign="top" bgcolor="#FFCCFF"><h2>แสดงห้องพักที่ว่าง</h2>
     
<table width="720" border="1" align="center">
<td width="80" align="center" bgcolor="#FFCC33"><h4>รหัสห้องพัก
</h4></td>
<td align="center" bgcolor="#FFCC33"><h4>ชื่อห้องพัก
</h4></td>
<td align="center" bgcolor="#FFCC33"><h4>รูปภาพ
</h4></td>
<td align="center" bgcolor="#FFCC33"><h4>ราคาต่อคืน (บาท)
</h4></td>
<td bgcolor="#FFCC33">
  <h4>&nbsp;</h4></td>


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
									WHERE NOT('$enddate1' <  tb_booking.BK_DateIn OR '$startdate' > tb_booking.BK_DateOut))";
									}
				$objQuery = mysql_query($strSQL2) or die (mysql_error());
					}
		//echo "<hr>";

?>

  <?
		$i=0;
		while($objResult = mysql_fetch_array($objQuery))
		{
		$i++;
?>

  <tr>
    <td align="center" valign="middle"><div align="center"><?php echo $objResult["Room_ID"];?></div></td>
    <td width="114" align="center" valign="middle"><?php echo $objResult["Room_Name"];?></td>
    <td width="249" align="center" valign="middle"><img src="Staff/myfile/<? echo $objResult["Room_Picture"]; ?>" width="249" height="150" /></td>
    <td width="133" align="center" valign="middle"><?php echo number_format($objResult["Room_Price"]);?></td>
    <td width="61" align="center" valign="middle"><a href="order.php?Room_ID=<?php echo $objResult["Room_ID"];?>">เลือก</a></td>
  </tr>
  
  <?php } ?>
</table>
<h4>
  <label for="textfield2"></label>
</h4>
      </form>
      <h4>&nbsp;</h4>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
