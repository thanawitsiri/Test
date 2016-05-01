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
<title>Home</title>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>
<table width="962" height="608" border="0" >
  <tr>
    <td height="260" colspan="6" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="953" height="287" /></td>
  </tr>
  <tr>
    <td width="168" height="36" align="center" bgcolor="#CCCCCC"><strong><a href="home.php">หน้าแรก</a></strong></td>
    <td width="160" align="center" bgcolor="#CCCCCC"><strong><a href="register.php">สมัครสมาชิก</a></strong></td>
    <td width="175" align="center" bgcolor="#CCCCCC"><strong><a href="room_detail.php">รายละเอียดห้องพัก</a></strong></td>
    <td width="146" align="center" bgcolor="#CCCCCC"><strong><a href="how_to_booking.php">วิธีจองห้องพัก</a></strong></td>
    <td width="186" align="center" bgcolor="#CCCCCC"><strong><a href="payment.php">ข้อมูลบัญชีธนาคาร</a></strong></td>
    <td width="101" align="center" bgcolor="#CCCCCC"><strong><a href="contact_us.php">ติดต่อเรา</a></strong></td>
  </tr>
  <tr>
    <td height="277" valign="top" bgcolor="#00CCFF"><form method="post" action="checklogin.php">
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
    <td colspan="5" align="center" valign="top" bgcolor="#FFCCFF"><h2>รายละเอียดห้องพัก </h2>
      <table width="763" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="118" height="28" align="center" valign="middle"> ชื่อห้องพัก </td>
          <td width="146" align="center" valign="middle"><p align="center">ประเภทห้องพัก</p></td>
          <td width="230" align="center" valign="middle"><p align="center">รูปห้องพัก</p></td>
          <td width="96" align="center" valign="middle"><p align="center">ราคาต่อคืน (บาท)</p></td>
          <td width="161" align="center" valign="middle"><p align="center">รายละเอียด</p></td>
        </tr>
        <? 
		$sql2 = "select * from tb_room";
		$query2 = mysql_query($sql2) or die ("Error Query [".$strSQL."]");
		
		?>
        <? $i=0 ;
			while($result2 = mysql_fetch_array($query2))
			{
			$i++; ?>
        <tr>
          <td width="118" valign="top"><p><? echo $result2['Room_Name']; ?></p></td>
          <td width="146" valign="top"><p><? if($result2['Room_Type'] == 'F') { echo "ห้อง Family Cottage";}else echo"ห้อง 2 ฺBedroom Cottage"; ?></p></td>
          <td width="230" align="center" valign="top"><img src="Staff/myfile/<? echo $result2["Room_Picture"]; ?>" alt="" width="230" height="150" /></td>
          <td width="96" valign="top"><p align="center"><? echo number_format($result2['Room_Price']); ?></p></td>
          <td width="161" valign="top"><p><? echo $result2['Room_Detail']; ?></td>
        </tr>
        <? } ?>
      </table>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
