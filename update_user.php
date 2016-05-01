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
<?
	function utf8_strlen($s) {
	 $c = strlen($s); $l = 0;
 	for ($i = 0; $i < $c; ++$i)
 	if ((ord($s[$i]) & 0xC0) != 0x80) ++$l;
 	return $l;
	}
	if($_POST[User] != NULL  and utf8_strlen($_POST[User]) >= 8
	and $_POST[Name] != NULL
	and $_POST[IDCard] != NULL
	and $_POST[Phone] != NULL
	and $_POST[Email] != NULL
	and $_POST[Address] != NULL
	and $_POST[Pass] == $_POST[Pass1]
	and $_POST[New_Pass] == NULL
	and  $_POST[New_Pass2] == NULL)
	{
	$sql="UPDATE tb_customer SET Cus_Name = '".$_POST[Name]."',
								 Cus_IDCard = '".$_POST[IDCard]."',
								 Cus_User = '".$_POST[User]."',
								 Cus_Address = '".$_POST[Address]."',
								 Cus_Email = '".$_POST[Email]."',
								 Cus_Phone = '".$_POST[Phone]."' 
		WHERE Cus_ID = '".$_SESSION['Cus_ID']."'";
	$query=mysql_query($sql) or die(mysql_error());
	if($query)
	{
		$str="แก้ไขข้อมูลสมาชิกเสร็จสิ้น";
	} 
	else
	{
	$str="แก้ไขข้อมูลรสมาชิกล้มเหลว กรุณากรอกข้อมูลให้ครบถ้วน";
	}
	} elseif($_POST[User] != NULL and utf8_strlen($_POST[User]) >= 8
	and $_POST[Name] != NULL
	and $_POST[IDCard] != NULL
	and $_POST[Phone] != NULL
	and $_POST[Email] != NULL
	and $_POST[Address] != NULL
	and $_POST[New_Pass] != NULL
	and $_POST[New_Pass2] != NULL
	and $_POST[New_Pass] == $_POST[New_Pass2]
	and utf8_strlen($_POST[New_Pass]) >= 8
	and utf8_strlen($_POST[New_Pass2]) >= 8)
	{
	$sql="UPDATE tb_customer SET Cus_Name = '".$_POST[Name]."',
								 Cus_IDCard = '".$_POST[IDCard]."',
								 Cus_User = '".$_POST[User]."',
								 Cus_Pass = '".$_POST[New_Pass]."',
								 Cus_Address = '".$_POST[Address]."',
								 Cus_Email = '".$_POST[Email]."',
								 Cus_Phone = '".$_POST[Phone]."' 
		WHERE Cus_ID = '".$_SESSION['Cus_ID']."'";
		$query=mysql_query($sql) or die(mysql_error());
	if($query)
	{
		$str="แก้ไขข้อมูลสมาชิกเสร็จสิ้น";
	} 
	else
	{
	$str="แก้ไขข้อมูลรสมาชิกล้มเหลว กรุณากรอกข้อมูลให้ครบถ้วน";
	}}
	 else{
	$str="แก้ไขข้อมูลสมาชิกล้มเหลว กรุณากรอกข้อมูลให้ครบถ้วน"; }
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>

</head>

<body onload="MM_popupMsg('สมัครสมาชิกเสร็จสิ้น');MM_goToURL('parent','home.php');return document.MM_returnValue">
<table width="962" height="744" border="0" >
  <tr>
    <td height="260" colspan="6" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="953" height="294" /></td>
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
    <td height="413" valign="top" bgcolor="#00CCFF">
   <form method="post" action="checklogin.php">
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

    </form>
      <p>           </p>
      <p>           </p>
    </td> 	
    <td colspan="5" align="center" valign="top" bgcolor="#FFCCFF"><h4><? echo $str; ?></h4>
    <p><a href="javascript:history.back();">ย้อนกลับ</a></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
