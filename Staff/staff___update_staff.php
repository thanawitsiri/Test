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
<?
	function utf8_strlen($s) {
	 $c = strlen($s); $l = 0;
 	for ($i = 0; $i < $c; ++$i)
 	if ((ord($s[$i]) & 0xC0) != 0x80) ++$l;
 	return $l;
	}
	if($_POST[User] != NULL  and utf8_strlen($_POST[User]) >= 8
	and $_POST[Name] != NULL

	and $_POST[Phone] != NULL
	and $_POST[Email] != NULL
	and $_POST[Address] != NULL
	and $_POST[New_Pass2] == NULL
	and $_POST[New_Pass] == NULL)
	{
	$sql="UPDATE tb_emp SET Emp_Name = '".$_POST[Name]."',
								 Emp_User = '".$_POST[User]."',
								 Emp_Address = '".$_POST[Address]."',
								 Emp_Email = '".$_POST[Email]."',
								 Emp_Phone = '".$_POST[Phone]."' 
		WHERE Emp_ID = '".$_SESSION['Emp_ID']."'";
	$query=mysql_query($sql) or die(mysql_error());
	if($query)
	{
		$str="แก้ไขข้อมูลเสร็จสิ้น!";
	} 
	else
	{
	$str="แก้ไขข้อมูลล้มเหลว!";
	}

	} elseif($_POST[User] != NULL and utf8_strlen($_POST[User]) >= 8
	and $_POST[Name] != NULL

	and $_POST[Phone] != NULL
	and $_POST[Email] != NULL
	and $_POST[Address] != NULL
	and $_POST[New_Pass] != NULL
	and $_POST[New_Pass2] != NULL
	and $_POST[New_Pass] == $_POST[New_Pass2]
	and utf8_strlen($_POST[New_Pass2]) >= 8
	and utf8_strlen($_POST[New_Pass]) >= 8)
	{
	$sql="UPDATE tb_emp SET Emp_Name = '".$_POST[Name]."',
								 Emp_User = '".$_POST[User]."',
								 Emp_Pass = '".$_POST[New_Pass]."',
								 Emp_Address = '".$_POST[Address]."',
								 Emp_Email = '".$_POST[Email]."',
								 Emp_Phone = '".$_POST[Phone]."' 
		WHERE Emp_ID = '".$_SESSION['Emp_ID']."'";
		$query=mysql_query($sql) or die(mysql_error());
		if($query)
	{
		$str="แก้ไขข้อมูลเสร็จสิ้น!";
	} 
	else
	{
	    $str="แก้ไขข้อมูลล้มเหลว!";
	}
	}

	
	//header("location:staff_home.php");
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
    <td width="763" height="359" align="center" valign="top" bgcolor="#CED8F6"><p><? echo $str;?></p>
      <p><a href="javascript:history.back();">ย้อนกลับ</a></p>
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