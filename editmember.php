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
<title>Edit Member</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script type="text/javascript">
function MM_popupMsg(msg) { //v1.0
  alert(msg);
}
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}

function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="949" height="744" border="0" a>
  <tr>
    <td height="260" colspan="6" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="1048" height="259" /></td>
  </tr>
  <tr>
    <td width="179" height="36" align="center" bgcolor="#CCCCCC"><strong><a href="home.php">หน้าแรก</a></strong></td>
    <td width="187" align="center" bgcolor="#CCCCCC"><strong><a href="register.php">สมัครสมาชิก</a></strong></td>
    <td width="169" align="center" bgcolor="#CCCCCC"><strong><a href="room_detail.php">รายละเอียดห้องพัก</a></strong></td>
    <td width="184" align="center" bgcolor="#CCCCCC"><strong><a href="how_to_booking.php">วิธีจองห้องพัก</a></strong></td>
    <td width="175" align="center" bgcolor="#CCCCCC"><strong><a href="payment.php">ข้อมูลบัญชีธนาคาร</a></strong></td>
    <td width="100" align="center" bgcolor="#CCCCCC"><strong><a href="contact_us.php">ติดต่อเรา</a></strong></td>
  </tr>
  <tr>
    <td width="170" height="413" valign="top" nowrap="nowrap" bgcolor="#00CCFF"><form method="post" action="checklogin.php">
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

    </form></td>
    <td colspan="5" bgcolor="#9999FF">
    <form id="form1" name="form1" method="post" action="update_user.php">
      <table width="700" height="453" border="0" a="a">
        <tr>
          <td height="10" colspan="4" align="center" valign="middle" bgcolor="#33FF66"><strong>แก้ไขข้อมูลสมัครสมาชิก</strong></td>
        </tr>
        <tr>
          <td height="21" colspan="4" valign="middle" bgcolor="#99FFCC">รหัสสมาชิก  : <? echo $result["Cus_ID"]; ?></td>
        </tr>
        <tr>
          <td height="5" colspan="4" valign="middle" bgcolor="#99FFCC">ชื่อ-นามสกุล<font color="red">*</font> :
            <input name="Name" type="text" id="Name" value="<? echo $result["Cus_Name"]; ?>" size="50" />
          </td>
        </tr>
        <tr>
          <td height="10" colspan="4" valign="middle" bgcolor="#99FFCC">ที่อยู่<font color="red">*</font> :
            <textarea name="Address" cols="50" id="Address"><? echo $result["Cus_Address"]; ?></textarea></td>
        </tr>
        <tr>
          <td height="47" valign="middle" nowrap="nowrap" bgcolor="#99FFCC">เลขบัตรประจำตัวประชาชน/เลขที่หนังสือเดินทาง<font color="red">*</font> :
            <input name="IDCard" type="text" id="IDCard" value="<? echo $result["Cus_IDcard"]; ?>" /></td>
          <td height="47" valign="middle" bgcolor="#99FFCC"></td>
        </tr>
        <tr>
          <td height="10" valign="middle" nowrap="nowrap" bgcolor="#99FFCC">เบอร์ติดต่อ<font color="red">*</font> :
            <input name="Phone" type="text" id="Phone" value="<? echo $result["Cus_Phone"]; ?>" /></td>
          <td height="10" valign="middle" nowrap="nowrap" bgcolor="#99FFCC">อีเมล<font color="red">*</font> :
            <input name="Email" type="text" id="Email" value="<? echo $result["Cus_Email"]; ?>" size="40" />
            <label for="Email"></label></td>
        </tr>
        <tr>
          <td height="10" colspan="4" align="center" valign="middle" bgcolor="#33FF66"><strong>แก้ไขบัญชีผู้ใช้</strong></td>
        </tr>
        <tr>
          <td height="54" colspan="4" align="center" valign="middle" bgcolor="#99FFCC">ชื่อผู้ใช้<font color="red">*</font>      : 
            <input name="User" type="text" id="User" value="<? echo $result["Cus_User"]; ?>" />
		</td>
        </tr>
        <tr>
          <td height="54" colspan="4" align="center" valign="middle" bgcolor="#99FFCC">รหัสผ่านใหม่  :
            <input name="New_Pass" type="password" id="New_Pass" /></td>
        </tr>
        <tr>
          <td height="54" colspan="4" align="center" valign="middle" bgcolor="#99FFCC">ยืนยันรหัสผ่านใหม่  :
            <input name="New_Pass2" type="password" id="New_Pass2" /></td>
        </tr>
        <tr>
          <td height="50" colspan="4" align="center" valign="middle" bgcolor="#FFCCFF"><input name="Add2" type="submit" id="Add4" onclick="MM_validateForm('Name','','R','IDCard','','R','Phone','','R','Email','','R','User','','R','Address','','R');return document.MM_returnValue" value="บันทึก" />
            <input type="reset" name="button6" id="button8" value="ยกเลิก" /></td>
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

