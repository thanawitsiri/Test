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
	left: 594px;
	top: 428px;
	width: 68px;
	height: 30px;
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
    <td width="763" height="201" align="center" valign="top" bgcolor="#D8D8D8"><h2>บันทึกข้อมูลการจอง</h2>
      <p> ชื่อลูกค้า :
        <label for="textfield"></label>
        ธนาวิทย์ ศิรินันท์ <img src="Pic/mag.gif" alt="" width="37" height="37" /></p>
      <p>  เบอร์ติดต่อ : 0978461324</p>
      <p>ประเภทการจอง* :
        <label for="select"></label>
        <select name="select" id="select">
          <option>จองผ่านโทรศัพท์</option>
        </select>
      </p>
      <table width="397" height="94" border="1" align="center" bordercolor="black">
        <tr>
          <td height="28" colspan="4" align="center" valign="middle"><strong>ห้องพักที่จอง</strong></td>
        </tr>
        <tr>
          <td width="103" height="28" align="center" valign="middle">รหัสห้องพัก</td>
          <td width="116" height="28" align="center" valign="middle">ชื่อห้องพัก</td>
          <td width="156" align="center" valign="middle">ราคาต่อคืน (บาท)</td>
         
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
		<td align="center"><?php echo number_format($objResult["Room_Price"]);?></td>
	  </tr>
	  <?php
	  }
  }
  ?>
  <? $_SESSION["Total"] = $Total; $_SESSION["SumTotal"] = $SumTotal;?>
        </tr>
      </table>
      <p>วันที่แจ้งเข้าพัก :
        20-01-2558        </p>
      <p>     วันที่แจ้งออก :
        23-01-2558        </p>
      <p>หมายเหตุ :
        <label for="textfield3"></label>
        <textarea name="textfield4" cols="30" rows="3" id="textfield3"></textarea>
      </p>
      <p>ราคารวม : 5,400 บาท</p>
      <p>ค่ามัดจำ : 2,000 บาท<br />
      </p>
      <p>&nbsp; </p>
      <p>
        <input type="submit" name="button4" id="button4" value="ย้อนกลับ" />
        
        
        <input name="button2" type="submit" id="button2" onclick="MM_popupMsg('บันทึกการจองเสร็จสิ้น !')" value="บันทึก" />
        
        
        <input type="submit" name="button3" id="button3" value="ยกเลิก" />
      </p>
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
