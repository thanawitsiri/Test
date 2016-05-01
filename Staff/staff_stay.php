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
	date_default_timezone_set("Asia/Bangkok");
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แสดงการเข้าพัก</title>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>
<table width="1285" height="499" border="0"  >
  <tr>
    <td height="260" colspan="2" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="1279" height="258" /></td>
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
    <td width="1086" height="201" align="center" valign="top" bgcolor="#D8D8D8"><h2>แสดงการเข้าพัก</h2>
      <table width="788" height="98" border="1">
        <tr>
          <td width="97" align="center" valign="middle" nowrap="nowrap" bgcolor="#999999">รหัสการเข้าพัก</td>
          <td width="126" align="center" valign="middle" nowrap="nowrap" bgcolor="#999999">วันที่เข้าพัก</td>
          <td width="99" align="center" valign="middle" nowrap="nowrap" bgcolor="#999999">วันที่แจ้งออก</td>

          <td width="76" align="center" valign="middle" bgcolor="#999999">รหัสสมาชิก</td>
          <td width="165" align="center" valign="middle" bgcolor="#999999">ชื่อลูกค้า</td>
          <td width="88" align="center" valign="middle" bgcolor="#999999">รหัสการจอง</td>
          <td width="91" align="center" valign="middle" bgcolor="#999999">&nbsp;</td>
        </tr>
<? 
	$sql1 = "select * from tb_checkin, tb_room ,tb_customer 
	where tb_checkin.Room_ID = tb_room.Room_ID and tb_checkin.Cus_ID = tb_customer.Cus_ID
	GROUP BY tb_checkin.CheckIn_Date Order by tb_checkin.CheckIn_ID";
	$query1 = mysql_query($sql1) or mysql_error();
?>
<?
		$i=0;
		while($result1 = mysql_fetch_array($query1))
		{
		$i++;
?>
        <tr>
          <td height="46" align="center" valign="middle"><? echo $result1['CheckIn_ID'];?></td>
          <td align="center" valign="middle"><? echo $result1['CheckIn_Date'];?> </td>
          <td align="center" valign="middle"><? echo $result1['CheckIn_Out'];?></td>
          <td align="center" valign="middle"><? echo $result1['Cus_ID'];?></td>
          <td align="center" valign="middle"><? echo $result1['Cus_Name'];?></td>

          <td align="center" valign="middle"><a href="staff_addservice1.php?CheckIn_ID=<? echo $result1['CheckIn_ID'];?>">คิดค่าบริการ</a></td>
          <td align="center" valign="middle"><a href="#">เช็คเอ้าท์</a></td>
        </tr>
<? } ?> 
      </table>
      <p>&nbsp;</p>
      <p></p>
      <h2>
        <label for="textfield4"></label>
      </h2></td>
  </tr>
  <tr>
    <td height="28" colspan="2" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
