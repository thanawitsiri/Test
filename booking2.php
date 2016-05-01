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
<title>Booking2</title>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>
<table width="962" height="744" border="0" a>
  <tr>
    <td height="260" colspan="6" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="953" height="261" /></td>
  </tr>
  <tr>
    <td height="36" align="center" bgcolor="#CCCCCC"><strong><a href="home.php">หน้าแรก</a></strong></td>
    <td width="189" align="center" bgcolor="#CCCCCC"><strong><a href="register.php">สมัครสมาชิก</a></strong></td>
    <td width="179" align="center" bgcolor="#CCCCCC"><strong><a href="room_detail.php">รายละเอียดห้องพัก</a></strong></td>
    <td width="135" align="center" bgcolor="#CCCCCC"><strong><a href="how_to_booking.php">วิธีจองห้องพัก</a></strong></td>
    <td width="182" align="center" bgcolor="#CCCCCC"><strong><a href="payment.php">ข้อมูลบัญชีธนาคาร</a></strong></td>
    <td width="88" align="center" bgcolor="#CCCCCC"><strong><a href="contact_us.php">ติดต่อเรา</a></strong></td>
  </tr>
  <tr>
    <td width="170" height="413" valign="top" bgcolor="#00CCFF"><form method="post" action="checklogin.php">
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
      <label for="textfield3"></label>
      <label for="textfield3"></label>
    </form></td>
    <td colspan="5" align="center" valign="top" bgcolor="#FFCCFF"><h2>เลือก/ยกเลิกรายการห้องพัก</h2>
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
<td align="center"><img src="Staff/myfile/<? echo $objResult["Room_Picture"]; ?>" width="220" height="150" /></td>

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
         
         
<input name="button2" type="submit" id="button2" onclick="MM_goToURL('parent','booking3.php');return document.MM_returnValue" value="  ตกลง  " />
         
         
        <input type="submit" name="button3" id="button3" value="  ยกเลิก  " />
      </p>


    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
