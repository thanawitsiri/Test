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
<table width="967" height="744" border="0" >
  <tr>
    <td height="260" colspan="6" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="959" height="295" /></td>
  </tr>
  <tr>
    <td height="36" align="center" bgcolor="#CCCCCC"><strong><a href="home.php">หน้าแรก</a></strong></td>
    <td width="169" align="center" bgcolor="#CCCCCC"><strong><a href="register.php">สมัครสมาชิก</a></strong></td>
    <td width="219" align="center" bgcolor="#CCCCCC"><strong><a href="room_detail.php">รายละเอียดห้องพัก</a></strong></td>
    <td width="158" align="center" bgcolor="#CCCCCC"><strong><a href="how_to_booking.php">วิธีจองห้องพัก</a></strong></td>
    <td width="184" align="center" bgcolor="#CCCCCC"><strong><a href="payment.php">ข้อมูลบัญชีธนาคาร</a></strong></td>
    <td width="93" align="center" bgcolor="#CCCCCC"><strong><a href="contact_us.php">ติดต่อเรา</a></strong></td>
  </tr>
  <tr>
    <td width="161" height="413" valign="top" nowrap="nowrap" bgcolor="#00CCFF"><form method="post" action="checklogin.php">
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
    <td colspan="5" align="center" valign="top" bgcolor="#FFCCFF">

    <form method="post" action="insert_user.php">
      <table width="819" height="432" border="0" a="a">
        <tr>
          <td height="30" colspan="6" align="center" valign="middle" bgcolor="#33FF66"><strong>สมัครสมาชิก</strong></td>
        </tr>
        <tr>
          <td height="14" colspan="6" valign="middle" bgcolor="#99FFCC">ชื่อ-นามสกุล<font color="red">*</font> :
            <input name="Cus_Name" type="text" id="Cus_Name" size="50" />
            <label for="Cus_Name"></label></td>
        </tr>
        <tr>
          <td height="37" colspan="6" valign="middle" bgcolor="#99FFCC">ที่อยู่<font color="red">*</font> :
            <textarea name="Cus_Address" cols="50" id="Cus_Address"></textarea></td>
        </tr>
        <tr>
          <td height="24" colspan="6" valign="middle" nowrap="nowrap" bgcolor="#99FFCC">เลขบัตรประจำตัวประชาชน/เลขที่หนังสือเดินทาง<font color="red">*</font> :
            <input type="text" name="Cus_IDCard" id="textfield4" />
            <label for="Cus_Phone"></label></td>
        </tr>
        <tr>
          <td height="43" colspan="3" valign="middle" nowrap="nowrap" bgcolor="#99FFCC">เบอร์ติดต่อ<font color="red">*</font> :
            <input type="text" name="Cus_Phone" id="Cus_Phone" /></td>
          <td width="486" height="43" colspan="3" valign="middle" nowrap="nowrap" bgcolor="#99FFCC">อีเมล<font color="red">*</font> :
            <input name="Cus_Email" type="text" id="Cus_Email" size="40" />
            <label for="Cus_Email"></label></td>
        </tr>
        <tr>
          <td height="25" colspan="6" align="center" valign="middle" bgcolor="#33FF66"><strong>บัญชีผู้ใช้</strong></td>
        </tr>
        <tr>
          <td height="35" colspan="6" align="center" valign="middle" bgcolor="#99FFCC">            ชื่อผู้ใช้<font color="red">*</font>              :
            <input type="text" name="Cus_User" id="Cus_User" />
            <label for="Cus_User"></label></td>
        </tr>
        <tr>
          <td height="33" colspan="6" align="center" valign="middle" bgcolor="#99FFCC">                รหัสผ่าน<font color="red">*</font>            :
            <input type="password" name="Cus_Pass" id="Cus_Pass" /></td>
        </tr>
        <tr>
          <td height="24" colspan="6" align="center" valign="middle" bgcolor="#99FFCC">              ยืนยันรหัสผ่าน<font color="red">*</font>  :
            <input name="Pass" type="password" id="Pass" /></td>
        </tr>
        <tr>
          <td height="26" colspan="6" align="center" valign="middle" bgcolor="#FFCCFF">
          <input type="submit" name="button3" id="button3" value="บันทึก" />
            <input type="reset" name="button3" id="button4" value="ยกเลิก" /></td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
