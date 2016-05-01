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
    <td height="260" colspan="6" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="953" height="277" /></td>
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
    <td height="277" valign="top" bgcolor="#00CCFF"> <form method="post" action="checklogin.php">
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
    <td colspan="5" align="center" valign="top" bgcolor="#CCCCCC"><h2>วิธีจองห้องพัก</h2>
      <table width="862" border="0">
        <tr>
          <td width="852"><p>1. ท่านต้องทำการสมัครสมาชิกก่อน เพื่อเข้าสู่ระบบ คลิกที่ลิ้งค์ด้านล่าง<br />
            <a href="register.html">http://localhost/Test/register.php</a><br />
          </p></td>
        </tr>
        <tr>
          <td>2. เมื่อท่านเข้าสู่ระบบแล้ว จะมีปุ่มแสดงห้องพักขึ้นมา <img src="Pic/7845.jpg" alt="" width="134" height="23" /> ให้ท่านคลิกเข้าไปเพื่อจองห้องพัก<br />
            <br /></td>
        </tr>
        <tr>
          <td valign="top">3. หน้าเพจจะแสดงฟอร์มขึ้นมา ให้ท่านใส่วันที่ท่านต้องการเข้าพักลงในช่องแรก <br />
            และวันที่ต้องการออกจากห้องพักในช่องที่สอง และกดปุ่มค้นหา เพื่อแสดงห้องที่ว่างในช่วงวันที่ท่านเลือก<br />
            <img src="Pic/7846.jpg" alt="" width="617" height="168" /></td>
        </tr>
        <tr>
          <td><p>4. เมื่อท่านกดปุ่มค้นหาแล้ว ระบบจะทำการแสดงห้องพักที่ว่าง ให้ท่านติ้๊กห้องที่ท่านต้องการจอง และกดปุ่มตกลง    </p>
            <p>    <img src="Pic/7847.jpg" alt="" width="627" height="569" /></p></td>
        </tr>
        <tr>
          <td><p>5. เมื่อท่านกดปุ่มตกลงแล้ว จะแสดงหน้าบันทึกการจอง เพื่อให้ท่านได้ตรวจสอบความถูกต้องของการจอง<br />
            หน้านี้จะแสดงราคารวม และค่ามัดจำ ที่ท่านต้องชำระในภายหลังการจอง ถ้าข้อมูลถูกต้องให้ท่านกดปุ่มบันทึก<br />
            <img src="Pic/7848.jpg" alt="" width="667" height="696" /></p></td>
        </tr>
        <tr>
          <td>6. ท่านสามารถดูรายละเอียดการจองได้ที่ ปุ่มแสดงการจองห้องพัก <img src="Pic/7849.jpg" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
