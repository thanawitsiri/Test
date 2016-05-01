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
<title>Untitled Document</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 780px;
	top: 301px;
	width: 112px;
	height: 32px;
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
<table width="1001" height="710" border="0" >
  <tr>
    <td height="260" colspan="2" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="993" height="258" /></td>
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
    <td width="802" height="413" align="center" valign="top" bgcolor="#D8D8D8"><h2>เลือก/ยกเลิกรายการห้องพัก </h2>
      <table width="724" height="214" border="5" align="center" bordercolor="black">
        <tr>
          <td width="116" align="center" valign="middle">รหัสห้องพัก</td>
          <td width="116" height="30" align="center" valign="middle">ชื่อห้องพัก</td>
          <td width="230" height="30" align="center" valign="middle">รูปภาพ</td>
          <td width="98" height="30" align="center" valign="middle">ราคาต่อคืน</td>
          <td width="122" align="center" valign="middle">&nbsp;</td>
        </tr>
        <?php

$Total = 0;

$SumTotal = 0;

 
for($i=0;$i<=(int)$_SESSION["intLine"];$i++)

{

if($_SESSION["strRoomID"][$i] != "")

{

$strSQL = "SELECT * FROM tb_room WHERE Room_ID = '".$_SESSION["strRoomID"][$i]."' ";

$objQuery = mysql_query($strSQL)  or die(mysql_error());

$objResult = mysql_fetch_array($objQuery);

$Total = $_SESSION["strQty"][$i] * $objResult["Room_Price"];

$SumTotal = $SumTotal + $Total;

?>

<tr>

<td align="center"><?php echo $_SESSION["strRoomID"][$i];?></td>

<td align="center"><?php echo $objResult["Room_Name"];?></td>
<td align="center"><img src="myfile/<? echo $objResult["Room_Picture"]; ?>" width="220" height="150" /></td>

<td align="center"><?php echo number_format($objResult["Room_Price"]);?></td>

<td align="center"><a href="delete_room.php?Line=<?php echo $i;?>">ลบ</a></td>

</tr>

<?php
}
}
?>
        </tr>
</table>
      <p>ราคารวม : <strong><?php echo number_format($SumTotal);?></strong> บาท      </p>

      <p>
        <input name="button5" type="submit" id="button5" onclick="MM_goToURL('parent','booking1.php');return document.MM_returnValue" value="เลือกห้องเพิ่ม" />
         
         
<input name="button2" type="submit" id="button2" onclick="MM_goToURL('parent','staff_booking2.php');return document.MM_returnValue" value="  ตกลง  " />
         
         
        <input type="submit" name="button3" id="button3" value="  ยกเลิก  " />
      </p>
 
      </table>
      <p>ราคารวม : <strong><?php echo number_format($SumTotal);?></strong> บาท </p>
      <p>
        <input name="button" type="submit" id="button" onclick="MM_goToURL('parent','staff_showroom.php');return document.MM_returnValue" value="เลือกห้องเพิ่ม" />
         
        <input name="button2" type="submit" id="button2" onclick="MM_goToURL('parent','staff_booking2.php');return document.MM_returnValue" value="  บันทึกจอง  " />
         
        <input type="reset" name="button3" id="button3" value="  ยกเลิก  " />
                 
        <input name="button6" type="submit" id="button6" onclick="MM_goToURL('parent','staff_checkin2.php');return document.MM_returnValue" value="คำนวณใหม่" />
      </p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="27" colspan="2" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
