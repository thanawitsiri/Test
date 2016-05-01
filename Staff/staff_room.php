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
<title>Room</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 1054px;
	top: 309px;
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
<div id="apDiv1">
  <form id="form1" name="form1" method="post" action="">
    <input name="button" type="submit" id="button" onclick="MM_goToURL('parent','staff_addroom.php');return document.MM_returnValue" value="เพิ่มห้องพัก" />
  </form>
</div>
<table width="962" height="744" border="0" >
  <tr>
    <td height="260" colspan="3" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="1171" height="263" /></td>
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
    <td width="978" height="413" align="center" valign="top" bgcolor="#D8D8D8"><h2>แสดง/ลบข้อมูลห้องพัก
      </h2>
      <table width="956" height="187" border="1" align="center" bordercolor="black">
        <tr>
          <td align="center" valign="middle" nowrap="nowrap" bgcolor="#6699CC">รหัสห้องพัก</td>
          <td height="23" align="center" valign="middle" nowrap="nowrap" bgcolor="#6699CC">ชื่อห้องพัก</td>
          <td height="23" align="center" valign="middle" nowrap="nowrap" bgcolor="#6699CC">ประเภทห้องพัก</td>
          <td align="center" valign="middle" nowrap="nowrap" bgcolor="#6699CC">รายละเอียดห้องพัก</td>
          <td align="center" valign="middle" nowrap="nowrap" bgcolor="#6699CC">รูปภาพ</td>
          <td align="center" valign="middle" nowrap="nowrap" bgcolor="#6699CC">ราคาต่อคืน <br />
          (บาท)<br /></td>
          <td align="center" valign="middle" nowrap="nowrap" bgcolor="#6699CC">สถานะ</td>
          <td align="center" valign="middle" nowrap="nowrap" bgcolor="#6699CC">&nbsp;</td>
          <td width="38" align="center" valign="middle" nowrap="nowrap" bgcolor="#6699CC">&nbsp;</td>
        </tr>
        <?php
	$strSQL = "SELECT * FROM tb_room";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
        <?
		$i=0;
		while($objResult = mysql_fetch_array($objQuery))
		{
		$i++;
?>
        <tr>
          <td width="75" height="137" align="center" valign="middle"><div align="center"><?php echo $objResult["Room_ID"];?></div></td>
          <td width="111" align="left" valign="middle"><?php echo $objResult["Room_Name"];?></td>
          <td width="108" align="center" valign="middle"><?php if($objResult["Room_Type"] == 'F'){ echo "Family Cottage"; } elseif($objResult["Room_Type"] == 'D'){echo "2 Bedroom Cottage";} ?></td>
          <td width="143" align="left" valign="middle"><?php echo $objResult["Room_Detail"];?></td>
          <td width="220" align="left" valign="middle"><img src="myfile/<? echo $objResult["Room_Picture"]; ?>" width="220" height="150" /></td>
          <td width="80" align="center" valign="middle"><?php echo number_format($objResult["Room_Price"]);?></td>
          <td width="75" align="center" valign="middle"><?php if($objResult["Room_Status"] = 'Y'){ echo "ใข้งานได้"; } else{ echo "ซ่อมแซม"; }?></td>
          <td width="48" align="center" valign="middle"><a href="staff_editroom.php?Room_ID=<?php echo $objResult["Room_ID"];?>">แก้ไข</a></td>
          <td align="center"><a href="JavaScript:if(confirm('ยืนยันการลบข้อมูล?')==true){window.location='staff___delete_room.php?Room_ID=<?php echo $objResult["Room_ID"];?>';}">ลบ</a></td>
        </tr>
        <?php } ?>  
      </table>
      
      <p>&nbsp;</p>      
    </p></td>
    
  </tr>
  <tr>
    <td colspan="3" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
