
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
</head>

<body>
<table width="1028" height="744" border="0" >
  <tr>
    <td height="260" colspan="6" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="1022" height="295" /></td>
  </tr>
  <tr>
    <td height="36" align="center" bgcolor="#CCCCCC"><strong><a href="home.html">หน้าแรก</a></strong></td>
    <td width="194" align="center" bgcolor="#CCCCCC"><strong><a href="register.html">สมัครสมาชิก</a></strong></td>
    <td width="193" align="center" bgcolor="#CCCCCC"><strong><a href="room_detail.html">รายละเอียดห้องพัก</a></strong></td>
    <td width="189" align="center" bgcolor="#CCCCCC"><strong><a href="how_to_booking.html">วิธีจองห้องพัก</a></strong></td>
    <td width="156" align="center" bgcolor="#CCCCCC"><strong><a href="payment.html">ข้อมูลบัญชีธนาคาร</a></strong></td>
    <td width="109" align="center" bgcolor="#CCCCCC"><strong><a href="contact_us.html">ติดต่อเรา</a></strong></td>
  </tr>
  <tr>
    <td width="171" height="413" valign="top" bgcolor="#00CCFF"><form method="post" action="checklogin.php">
      <p>           เข้าสู่ระบบ</p>
      <p>ชื่อผู้ใช้    :
        <input name="Cus_User" type="text" id="Cus_User" size="15" />
      </p>
      <p>รหัสผ่าน  :
        <input name="Cus_Pass" type="password" id="Cus_Pass" size="15" />
      </p>
      <p>    
        <input name="button" type="submit" id="button" onclick="MM_goToURL('parent','booking_detail.php');return document.MM_returnValue" value="ตกลง" />
        
  <input type="reset" name="button2" id="button2" value="ยกเลิก" />
      </p>
  </form></td>
    <td colspan="5" align="center" valign="top" bgcolor="#FFCCFF">

    <form method="post" action="insert_user.php">
      <table width="877" height="432" border="0" a="a">
        <tr>
          <td height="30" colspan="6" align="center" valign="middle" bgcolor="#33FF66"><strong>สมัครสมาชิก</strong></td>
        </tr>
        <tr>
          <td height="14" colspan="6" valign="middle" bgcolor="#99FFCC">ชื่อ-นามสกุล* :
            <input name="Cus_Name" type="text" id="Cus_Name" size="50" />
            <label for="Cus_Name"></label></td>
        </tr>
        <tr>
          <td height="37" colspan="6" valign="middle" bgcolor="#99FFCC">ที่อยู่* :
            <textarea name="Cus_Address" cols="50" id="Cus_Address"></textarea></td>
        </tr>
        <tr>
          <td height="24" colspan="6" valign="middle" nowrap="nowrap" bgcolor="#99FFCC">เลขบัตรประจำตัวประชาชน/เลขที่หนังสือเดินทาง* :
            <input type="text" name="Cus_IDCard" id="textfield4" />
            <label for="Cus_Phone"></label></td>
        </tr>
        <tr>
          <td height="43" colspan="3" valign="middle" nowrap="nowrap" bgcolor="#99FFCC">เบอร์ติดต่อ* :
            <input type="text" name="Cus_Phone" id="Cus_Phone" /></td>
          <td width="511" height="43" colspan="3" valign="middle" nowrap="nowrap" bgcolor="#99FFCC">อีเมล* :
            <input name="Cus_Email" type="text" id="Cus_Email" size="40" />
            <label for="Cus_Email"></label></td>
        </tr>
        <tr>
          <td height="25" colspan="6" align="center" valign="middle" bgcolor="#33FF66"><strong>บัญชีผู้ใช้</strong></td>
        </tr>
        <tr>
          <td height="35" colspan="6" align="center" valign="middle" bgcolor="#99FFCC">            ชื่อผู้ใช้*              :
            <input type="text" name="Cus_User" id="Cus_User" />
            <label for="Cus_User"></label></td>
        </tr>
        <tr>
          <td height="33" colspan="6" align="center" valign="middle" bgcolor="#99FFCC">                รหัสผ่าน*            :
            <input type="password" name="Cus_Pass" id="Cus_Pass" /></td>
        </tr>
        <tr>
          <td height="24" colspan="6" align="center" valign="middle" bgcolor="#99FFCC">              ยืนยันรหัสผ่าน*  :
            <input type="password" name="Cus_Pass" id="Cus_Pass" /></td>
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
<?
$allowFields = array('$_POST[Cus_ID]','$_POST[Cus_Name]','$_POST[Cus_IDCard]','$_POST[Cus_User]'
			    ,'$_POST[Cus_Pass]','$_POST[Cus_Address]','$_POST[Cus_Email]','$_POST[Cus_Phone]');
$requiredFields = array('$_POST[Cus_ID]','$_POST[Cus_Name]','$_POST[Cus_IDCard]','$_POST[Cus_User]'
			    ,'$_POST[Cus_Pass]','$_POST[Cus_Address]','$_POST[Cus_Email]','$_POST[Cus_Phone]');
$errors = array();
foreach($_POST AS $key => $value)
{
		if(in_array($key, $allowFields))
		{
			$$key = $value;
			if(in_array($key, $requiredFields) && $value == '')
			{
				$errors[] = "The field $key is required.";	
			}
		}
}
if(count($errors) > 0)
{	$errorString = '<p> There was an error processing the form.</p>';
	 $errorString .= '<ul>';
	 foreach($error as $errors)
	 {
		 $errorString .= "<li>$error</li>";
	 }
	 $errorString .= '</ul>';
	 include 'register.html';
}
else
{
	header("Location: insert_user.html");
}
?>
