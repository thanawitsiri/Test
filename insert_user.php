<?
include("config.php");
?>
<?
	if($_POST[Cus_User] != NULL 
	and $_POST[Cus_Name] != NULL
	and $_POST[Cus_IDCard] != NULL
	and $_POST[Cus_Pass] != NULL
	and $_POST[Cus_Phone] != NULL
	and $_POST[Cus_Email] != NULL
	and $_POST[Cus_Address] != NULL
	and $_POST[Cus_Pass] == $_POST[Pass]){
	$sql="INSERT INTO tb_customer (Cus_ID,Cus_Name,Cus_IDCard,Cus_User,Cus_Pass,Cus_Address,Cus_Email,Cus_Phone) 
	VALUES ('NULL','".$_POST[Cus_Name]."','".$_POST[Cus_IDCard]."','".$_POST[Cus_User]."','".$_POST[Cus_Pass]."','".$_POST[Cus_Address]."'
	,'".$_POST[Cus_Email]."','".$_POST[Cus_Phone]."')";
	$query=mysql_query($sql) or die(mysql_error());
	if($query){
		$str="สมัครสมาชิกเสร็จสิ้น!";
	} else{
	$str="ล้มเหลว!";
	}
	} else{
	$str="ล้มเหลว!"; }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
</head>

<body>
<table width="962" height="744" border="0" >
  <tr>
    <td height="260" colspan="6" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="953" height="294" /></td>
  </tr>
  <tr>
    <td width="168" height="36" align="center" bgcolor="#CCCCCC"><strong><a href="home.html">หน้าแรก</a></strong></td>
    <td width="160" align="center" bgcolor="#CCCCCC"><strong><a href="register.html">สมัครสมาชิก</a></strong></td>
    <td width="175" align="center" bgcolor="#CCCCCC"><strong><a href="room_detail.html">รายละเอียดห้องพัก</a></strong></td>
    <td width="146" align="center" bgcolor="#CCCCCC"><strong><a href="how_to_booking.html">วิธีจองห้องพัก</a></strong></td>
    <td width="186" align="center" bgcolor="#CCCCCC"><strong><a href="payment.html">ข้อมูลบัญชีธนาคาร</a></strong></td>
    <td width="101" align="center" bgcolor="#CCCCCC"><strong><a href="contact_us.html">ติดต่อเรา</a></strong></td>
  </tr>
  <tr>
    <td height="413" valign="top" bgcolor="#00CCFF">
    <form method="post" action="checklogin.php">
      <p>           เข้าสู่ระบบ</p>
      <p>ชื่อผู้ใช้    :
        <input name="Cus_User" type="text" id="Cus_User" size="15" />
      </p>
      <p>รหัสผ่าน  :
        <input name="Cus_Pass" type="password" id="Cus_Pass" size="15" />
      </p>
      <p>    
        <input name="button" type="submit" id="button" value="ตกลง" />
        
  <input type="reset" name="button2" id="button2" value="ยกเลิก" />
      </p>
    </form>
      <p>           </p>
      <p>           </p>
    </td>
    <td colspan="5" align="center" valign="top" bgcolor="#FFCCFF"><h4><? echo $str; ?></h4>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>