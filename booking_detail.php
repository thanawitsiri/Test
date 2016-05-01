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
<title>แสดงการจอง</title>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>
<table width="1114" height="744" border="0" a>
  <tr>
    <td height="260" colspan="6" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="1102" height="288" /></td>
  </tr>
  <tr>
    <td height="36" align="center" bgcolor="#CCCCCC"><strong><a href="home.php">หน้าแรก</a></strong></td>
    <td width="229" align="center" bgcolor="#CCCCCC"><strong><a href="register.php">สมัครสมาชิก</a></strong></td>
    <td width="205" align="center" bgcolor="#CCCCCC"><strong><a href="room_detail.php">รายละเอียดห้องพัก</a></strong></td>
    <td width="155" align="center" bgcolor="#CCCCCC"><strong><a href="how_to_booking.php">วิธีจองห้องพัก</a></strong></td>
    <td width="209" align="center" bgcolor="#CCCCCC"><strong><a href="payment.php">ข้อมูลบัญชีธนาคาร</a></strong></td>
    <td width="100" align="center" bgcolor="#CCCCCC"><strong><a href="contact_us.php">ติดต่อเรา</a></strong></td>
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
    <td colspan="5" align="center" valign="top" bgcolor="#FFCCFF"><h2>แสดงการจองห้องพัก</h2>
      <table width="854" height="85" border="1" align="center" bordercolor="black">
        <tr>
          <td width="55" height="30" align="center" valign="middle" bgcolor="#996666">รหัส<br />
          การจอง</td>
          <td width="86" align="center" valign="middle" bgcolor="#996666">วันที่จอง</td>
          <td width="93" height="30" align="center" valign="middle" bgcolor="#996666">สถานะ</td>
          <td width="89" align="center" valign="middle" bgcolor="#996666">วันที่แจ้ง<br />
          เข้าพัก</td>
          <td width="88" align="center" valign="middle" bgcolor="#996666">วันที่แจ้ง<br />
          ออก</td>
          <td width="83" align="center" valign="middle" bgcolor="#996666"><p>ราคารวม<br />
          (บาท)</p></td>
          <td width="109" align="center" valign="middle" bgcolor="#996666">ค่ามัดจำ (บาท)</td>
          <td width="113" align="center" valign="middle" bgcolor="#996666"><p>แจ้งหลักฐาน<br />
            ชำระค่ามัดจำ
          </p></td>
          <td width="80" align="center" valign="middle" bgcolor="#996666">ใบจอง</td>
        </tr>
          <?php
$strSQL = "select * from tb_booking where Cus_ID = '".$_SESSION['Cus_ID']."'";
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
          <td align="center" valign="middle"><? if($objResult["BK_Status"] ==0 ){ echo "ยังไม่ได้ชำระ"; }
		  elseif($objResult["BK_Status"] ==1 ){ echo "รอตรวจสอบ"; }
		  elseif($objResult["BK_Status"] ==2 ){ echo "ชำระแล้ว"; }
		  else{ echo "ยกเลิกการจอง"; } ?></td>
          <td align="center" valign="middle"><? echo $objResult["BK_DateIn"]; ?></td>
          <td align="center" valign="middle"><? echo $objResult["BK_DateOut"]; ?></td>
          <td align="center" valign="middle"><? echo number_format($objResult["BK_Money"]); ?></td>
          <td align="center" valign="middle"><? echo number_format($objResult["BK_Deposit"]); ?></td>
   		  <td align="center" valign="middle"><a href="payment1.php?BK_ID=<? echo $objResult["BK_ID"]; ?>">
		  <? if($objResult["BK_Status"] ==0 ){ echo "แจ้งหลักฐาน";} else{ echo"";} ?> </a></td>
          <td align="center" valign="middle"><a href="#"> <? if($objResult["BK_Status"] == 2 ){ echo "พิมพ์";} else{ echo"";} ?></a></td>
        </tr>
          <?php } ?>
      </table>
      <p>
        <label for="textfield4"></label>
      </p>
      <h4>
        <label for="textfield3"></label>
      </h4>
    <p><a href="home.php">คลิกเพื่อกลับหน้าแรก</a></p></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
