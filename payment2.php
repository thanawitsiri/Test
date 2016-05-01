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
<script src="_assets/js/jquery.js" type="text/javascript"></script>
<script src="_assets/js/jquery.ui.draggable.js" type="text/javascript"></script>    
<script src="_assets/js/jquery.alerts.js" type="text/javascript"></script>
<link href="_assets/css/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แจ้งหลักฐานการชำระ</title>
</head>

<body>
<table width="962" height="744" border="0" a>
  <tr>
    <td height="260" colspan="6" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="953" height="279" /></td>
  </tr>
  <tr>
    <td height="36" align="center" bgcolor="#CCCCCC"><strong><a href="home.php">หน้าแรก</a></strong></td>
    <td width="198" align="center" bgcolor="#CCCCCC"><strong><a href="register.php">สมัครสมาชิก</a></strong></td>
    <td width="177" align="center" bgcolor="#CCCCCC"><strong><a href="room_detail.php">รายละเอียดห้องพัก</a></strong></td>
    <td width="133" align="center" bgcolor="#CCCCCC"><strong><a href="how_to_booking.php">วิธีจองห้องพัก</a></strong></td>
    <td width="180" align="center" bgcolor="#CCCCCC"><strong><a href="payment.php">ข้อมูลบัญชีธนาคาร</a></strong></td>
    <td width="86" align="center" bgcolor="#CCCCCC"><strong><a href="contact_us.php">ติดต่อเรา</a></strong></td>
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
 
    </form></td>
    <? if($_FILES["filUpload"]["name"] == null){ ?>
    	
        <td colspan="5" align="center" valign="top" bgcolor="#FFCCFF"><h2><br />
      กรุณากรอกข้อมูลให้ครบถ้วน
      </h2>
       <p><a href="javascript:history.back();">Back</a></p>
     <? }else { ?>
 	 <td colspan="5" align="center" valign="top" bgcolor="#FFCCFF"><h2><br />
      บันทึกข้อมูลเสร็จสิ้น
      </h2>
      <p><a href="booking_detail.php">แสดงการจองห้องพัก</a></p>
      <? } ?>
    <?php
	if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"Staff/myfile/".$_FILES["filUpload"]["name"]))
	{
		$objConnect = mysql_connect("localhost","root","123456789") or die("Error Connect to Database");
		$objDB = mysql_select_db("toobnaya");
		//*** Insert Record ***//

		$strSQL = "UPDATE tb_booking SET BK_Bankname = '".$_POST["BK_Bankname"]."',
										 BK_Bankno = '".$_POST["BK_Bankno"]."',
										 BK_Datepay = '".$_POST["BK_Datepay"]."',
										 BK_Timepay = '".$_POST["BK_Timepay"]."',
										 BK_Status = 1,
										 BK_Document = '".$_FILES["filUpload"]["name"]."'

				WHERE BK_ID = '".$_GET["BK_ID"]."'";
		$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]"); 
		
	}?>
</td> 

  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
