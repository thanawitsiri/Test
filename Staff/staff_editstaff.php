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
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Staff</title>
<script type="text/javascript">
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
</head>

<body>
<table width="962" height="690" border="0" >
  <tr>
    <td height="260" colspan="2" align="center" bgcolor="#000000"><img src="Pic/1.jpg" alt="" width="953" height="266" /></td>
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
    <td width="763" height="359" align="center" valign="top" bgcolor="#CED8F6">
      <form id="form1" name="form1" method="post" action="staff___update_staff.php">
        <h2>แก้ไขข้อมูลพนักงาน</h2>
        <table width="475" border="0">
          <tr>
            <td width="248">รหัสพนักงาน                       :</td>
            <td width="217"><?php echo $result['Emp_ID'];?></td>
          </tr>
          <tr>
            <td>ชื่อ-สกุล<font color="red">*</font>                            : </td>
            <td><input name="Name" type="text" id="Name" value="<?php echo $result["Emp_Name"];?>" /></td>
          </tr>
          <tr>
            <td>เบอร์ติดต่อ<font color="red">*</font>                        :</td>
            <td><input name="Phone" type="text" id="Phone" value="<?php echo $result["Emp_Phone"];?>" size="15" /></td>
          </tr>
          <tr>
            <td>อีเมล<font color="red">*</font>                                 :</td>
            <td><input name="Email" type="text" id="Email" value="<?php echo $result["Emp_Email"];?>" size="30" /></td>
          </tr>
          <tr>
            <td>ที่อยู่<font color="red">*</font>                                   :</td>
            <td><textarea name="Address" cols="30" rows="3" id="Address"><?php echo $result["Emp_Address"];?></textarea></td>
          </tr>
        </table>
        <h3>
          
        แก้ไขบัญชีพนักงาน</h3>
        <table width="481" border="0">
          <tr>
            <td width="223">ชื่อผู้ใช้<font color="red">*</font>                             	      :</td>
  <td width="248" align="left"><input name="User" type="text" id="User"value="<?php echo $result["Emp_User"];?>" size="10" /></td>
          </tr>
          <tr>
            <td>รหัสผ่านใหม่                         :</td>
            <td><input name="New_Pass" type="password" id="New_Pass" size="10" /></td>
          </tr>
          <tr>
            <td>ยืนยันรหัสผ่านใหม่               :</td>
            <td><input name="New_Pass2" type="password" id="New_Pass2" size="10" /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>
        </p>
        <p>
          <input name="button" type="submit" id="button" onclick="MM_goToURL('parent','staff_home.php');return document.MM_returnValue" value="ย้อนกลับ" />
          <input name="button" type="submit" id="button" onclick="MM_validateForm('Name','','R','Phone','','R','Email','','R','User','','R','Pass','','R','Pass1','','R','Address','','R');return document.MM_returnValue" value="บันทึก" />
          <input type="reset" name="Reset" id="button6" value="ยกเลิก" />
        </p>
      </form>
      <h2>&nbsp;</h2>
      <p>&nbsp;</p>
      </p></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>