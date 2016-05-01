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
<title>Check In</title>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>
<table width="962" height="499" border="0"  >
  <tr>
    <td height="260" colspan="2" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="953" height="258" /></td>
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
    <?php
$strSQL = "select * from tb_booking, tb_customer where BK_ID = '".$_GET['BK_ID']."' and tb_booking.Cus_ID = tb_customer.Cus_ID";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]"); 
$objResult = mysql_fetch_array($objQuery);
?>
    <td width="763" align="center" valign="top" bgcolor="#D8D8D8">
    <form id="form2" name="form2" method="post" action="staff___save_checkin.php?BK_ID=<? echo $objResult['BK_ID']; ?>">

      <h2>บันทึกการเข้าพัก</h2>
      <p>รหัสการจอง : <? echo $objResult['BK_ID']; ?></p>
      <p>ชื่อลูกค้า :        <? echo $objResult['Cus_Name']; ?></p>
      <?
$strSQL1 = "select * from tb_booking_detail, tb_room where BK_ID = '".$_GET['BK_ID']."' and tb_booking_detail.Room_ID = tb_room.Room_ID";
$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL."]"); 
?>
      <table width="372" height="142" border="1" align="center" bordercolor="black">
        <tr>
          <td height="29" colspan="3" align="center" valign="middle"><strong>ห้องพักที่จอง</strong></td>
        </tr>
        <tr>
          <td width="100" height="28" align="center" valign="middle">รหัสห้องพัก</td>
          <td width="122" height="28" align="center" valign="middle">ชื่อห้องพัก</td>
          <td width="128" align="center" valign="middle">ราคาต่อคืน (บาท)</td>
        </tr>
        <?
$strSQL1 = "select * from tb_booking_detail, tb_room where BK_ID = '".$_GET['BK_ID']."' and tb_booking_detail.Room_ID = tb_room.Room_ID";
$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL."]"); 
?>
        <?
		$i=0;
		while($objResult1 = mysql_fetch_array($objQuery1))
		{
		$i++;
?>
        <tr>
          <td height="43" align="center" valign="middle"><? echo $objResult1["Room_ID"]; ?></td>
          <td align="center" valign="middle"><? echo $objResult1["Room_Name"]; ?></td>
          <td align="center" valign="middle"><? echo number_format($objResult1["Room_Price"]); ?></td>
        </tr>
        <? } ?>
      </table>
      
      <p>วันที่แจ้งเข้าพัก  : <? echo $objResult['BK_DateIn']; ?></p>
      <p>วันที่แจ้งออก     :
        <label for="textfield3"></label>
        <? echo $objResult['BK_DateOut']; ?></p>
      <p> วันที่เข้าพัก :
        <input name="CheckIn_Date" type="text" id="textfield2" value="<? echo date("Y-m-d H:i:s"); ?>" size="15" />
      </p>
      <p>&nbsp;</p>
      <p>
        <input type="submit" name="button6" id="button" onclick="javascript:history.back();" value="ย้อนกลับ" />
        <input type="submit" name="button" id="button6" value="บันทึก" />
        <input type="reset" name="Reset" id="button7" value="ยกเลิก" />
      </p>
    </form>
    <?
	 $_SESSION['aa'] = $objResult['BK_DateOut'];
	 $_SESSION['bb'] = $objResult['BK_Deposit'];
	 $_SESSION['cc'] = $objResult1['Room_ID'];
	 $_SESSION['dd'] = $objResult['Cus_ID'];
	 $_SESSION['ee'] = $objResult['BK_ID'];
	?>
      <h2><br />
      </h2>
    <p>&nbsp; </p></td>
  </tr>
  <tr>
    <td height="28" colspan="2" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
