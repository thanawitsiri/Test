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
<title>แสดง/ยกเลิกการจอง</title>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>
<table width="1226" height="499" border="0"  >
  <tr>
    <td height="260" colspan="2" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="1220" height="258" /></td>
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
    <td width="1027" height="201" align="center" valign="top" bgcolor="#D8D8D8"><h1> แสดง/ยกเลิกการจอง</h1>
      <table width="992" height="97" border="1" align="center" bordercolor="black">
        <tr>
          <td width="52" height="42" align="center" valign="middle" bgcolor="#BDBDBD">รหัส<br />
            การจอง</td>
          <td width="70" align="center" valign="middle" bgcolor="#BDBDBD">วันที่จอง</td>
          <td width="138" align="center" valign="middle" bgcolor="#BDBDBD">ชื่อลูกค้า</td>
          <td width="67" height="42" align="center" valign="middle" bgcolor="#BDBDBD">สถานะ</td>
          <td width="85" align="center" valign="middle" bgcolor="#BDBDBD">วันที่แจ้ง<br />
            เข้าพัก</td>
          <td width="74" align="center" valign="middle" bgcolor="#BDBDBD">วันที่แจ้ง<br />
            ออก</td>
          <td width="80" align="center" valign="middle" bgcolor="#BDBDBD"><p>ราคารวม<br />
            (บาท)</p></td>
          <td width="66" align="center" valign="middle" bgcolor="#BDBDBD">ค่ามัดจำ (บาท)</td>
          <td width="120" align="center" valign="middle" bgcolor="#BDBDBD"><p>หลักฐาน<br />
            การชำระค่ามัดจำ<br />
          </p></td>
          <td width="50" align="center" valign="middle" bgcolor="#BDBDBD">&nbsp;</td>
          <td width="58" align="center" valign="middle" bgcolor="#BDBDBD">&nbsp;</td>
        </tr>
<?php
$strSQL = "select * from tb_booking INNER JOIN tb_customer ON tb_booking.Cus_ID = tb_customer.Cus_ID";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]"); 
?>
<?
		$i=0;
		while($objResult = mysql_fetch_array($objQuery))
		{
		$i++;
?>
        <tr>
          <td height="47" align="center" valign="middle"><? echo $objResult["BK_ID"]; ?></td>
          <td align="center" valign="middle"><? echo $objResult["BK_Date"]; ?></td>
          <td align="center" valign="middle"><? echo $objResult["Cus_Name"]; ?></td>
          <td align="center" valign="middle"><? if($objResult["BK_Status"] ==0 ){ echo "ยังไม่ได้ชำระ"; }
		  elseif($objResult["BK_Status"] ==1 ){ echo "รอตรวจสอบ"; }
		  elseif($objResult["BK_Status"] ==2 ){ echo "ชำระแล้ว"; }
		  elseif($objResult["BK_Status"] ==5 ){ echo "มีการเข้าพักแล้ว"; }
		  else{ echo "ยกเลิกการจอง"; } ?></td>
          <td align="center" valign="middle"><? echo $objResult["BK_DateIn"]; ?></td>
          <td align="center" valign="middle"><? echo $objResult["BK_DateOut"]; ?></td>
          <td align="center" valign="middle"><? echo number_format($objResult["BK_Money"]); ?></td>
          <td align="center" valign="middle"><? echo number_format($objResult["BK_Deposit"]); ?></td>
          <? if($objResult["BK_Document"] != null){ ?>
          <td align="center" valign="middle"><a href="Pic/<? echo $objResult["BK_Document"];?>" target="_blank"><img src="myfile/<? echo $objResult["BK_Document"];?>" alt="" width="80" height="100" /></a></td>
          <? }else { ?>
          <td align="center" valign="middle"></td>
          <? } ?>
          <td align="center" valign="middle"><a href="staff_editbooking.php?BK_ID=<? echo $objResult["BK_ID"]; ?>">แก้ไข</a></td>
          <? if($objResult["BK_Status"] == 2) { ?>
          <td width="56" align="center" valign="middle"><a href="staff_checkin.php?BK_ID=<? echo $objResult["BK_ID"]; ?>">เข้าพัก</a></td>
          <? } else { ?>
          <td width="56" align="center" valign="middle"></td>
		  <? } ?>
        </tr><?php } ?>
      </table>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>
        <label for="textfield4"></label>
      </p></td>
  </tr>
  <tr>
    <td height="28" colspan="2" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
