<?php
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
	
mysql_connect("localhost","root","123456789");
mysql_select_db("toobnaya");

	date_default_timezone_set("Asia/Bangkok");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 844px;
	top: 299px;
	width: 98px;
	height: 34px;
	z-index: 1;
}
</style>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>
<table width="974" height="591" border="0" >
  <tr>
    <td height="260" colspan="2" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="963" height="260" /></td>
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
    <td width="775" align="center" valign="top" bgcolor="#D8D8D8"><form id="form1" name="form1" method="post" action="">
      <h2>แสดงค่าบริการ</h2>
      <table width="685" height="59" border="1" align="center" bordercolor="black">
        <tr>
          <td height="23" align="center" valign="middle" nowrap="nowrap" bgcolor="#33CC66">รหัสค่าบริการ</td>
          <td height="23" align="center" valign="middle" nowrap="nowrap" bgcolor="#33CC66">รายการ</td>
          <td align="center" valign="middle" nowrap="nowrap" bgcolor="#33CC66">สถานะ</td>
          <td height="23" align="center" valign="middle" nowrap="nowrap" bgcolor="#33CC66">หน่วยนับ</td>
          <td align="center" valign="middle" nowrap="nowrap" bgcolor="#33CC66"><p>ราคาต่อหน่วย (บาท)</p></td>
          <td align="center" valign="middle" nowrap="nowrap" bgcolor="#33CC66">จำนวน</td>
        </tr>
        <? 
			$sql1 = "select * from tb_service";
			$query1 = mysql_query($sql1) or die(mysql_error());
			$sql2 = "select * from tb_room,tb_checkin where tb_checkin.Room_ID = tb_room.Room_ID and tb_checkin.CheckIn_ID = '".$_GET['CheckIn_ID']."'";
			$query2 = mysql_query($sql2) or die(mysql_error());
			$result2 = mysql_fetch_array($query2);
		?>
        <? $i=0;
			while($result1 = mysql_fetch_array($query1))
			{
				$i++;
		?>
        <tr>
          <td width="88" height="28" align="center" valign="middle"><? echo $result1['Service_ID']; ?></td>
          <td width="153" align="center" valign="middle"><? echo $result1['Service_Name']; ?></td>
          <td width="58" align="center" valign="middle"><p><? if($result1['Service_Status'] == 'Y') { echo "ใช้งาน"; }else{ echo "ไม่ใช้งาน"; }?></p></td>
          <td width="78" align="center" valign="middle"><p><? echo $result1['Service_Unit']; ?></p></td>
          <td width="139" align="center" valign="middle"><p><? echo number_format($result1['Service_Price']); ?></p></td>
          <td width="67" align="center" valign="middle">
            <? if($result2['Room_Type'] == 'F' and $result1['Service_ID'] == 1){?>
            <input name="textfield" type="text" id="textfield"  size="3" value="<? echo round(abs(strtotime(date("Y-m-d")) - strtotime($result2['CheckIn_Date']))/60/60/24); ?>" /></td><? }elseif($result2['Room_Type'] == 'D' and $result1['Service_ID'] == 2){ ?>
            <input name="textfield" type="text" id="textfield"  size="3" value="<? echo round(abs(strtotime(date("Y-m-d")) - strtotime($result2['CheckIn_Date']))/60/60/24); ?>" /></td>
            <? }else{ ?>
            <input name="textfield" type="text" id="textfield"  size="3" />
            <? } ?>
        </tr>
        <? } ?>
      </table>
      <p><br />
      <input type="submit" name="button" id="button" value="   ตกลง   " />         
        <input type="submit" name="button" id="button" value="  ย้อนกลับ  " />
      </p>
    </form>
      <h2>&nbsp;</h2>
    </p></td>
  </tr>
  <tr>
    <td height="36" colspan="2" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
