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
date_default_timezone_set('Asia/Bangkok');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Booking3</title>
<script type="text/javascript">
function MM_popupMsg(msg) { //v1.0
  alert(msg);
}
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>
<table width="962" height="744" border="0" a>
  <tr>
    <td height="260" colspan="6" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="953" height="258" /></td>
  </tr>
  <tr>
    <td height="36" align="center" bgcolor="#CCCCCC"><strong><a href="home.php">หน้าแรก</a></strong></td>
    <td width="190" align="center" bgcolor="#CCCCCC"><strong><a href="register.php">สมัครสมาชิก</a></strong></td>
    <td width="177" align="center" bgcolor="#CCCCCC"><strong><a href="room_detail.php">รายละเอียดห้องพัก</a></strong></td>
    <td width="133" align="center" bgcolor="#CCCCCC"><strong><a href="how_to_booking.php">วิธีจองห้องพัก</a></strong></td>
    <td width="180" align="center" bgcolor="#CCCCCC"><strong><a href="payment.php">ข้อมูลบัญชีธนาคาร</a></strong></td>
    <td width="86" align="center" bgcolor="#CCCCCC"><strong><a href="contact_us.php">ติดต่อเรา</a></strong></td>
  </tr>
  <tr>
    <td width="170" height="413" valign="top" bgcolor="#00CCFF">
    <form method="post" action="checklogin.php">
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
    <td colspan="5" align="center" valign="top" bgcolor="#FFCCFF"><h2>บันทึกการจองห้องพัก
        <label for="select"></label>
    </h2>
      <table width="569" height="202" border="5" align="center" bordercolor="black">
        <tr>
          <td width="171" height="30" align="center" valign="middle">รหัสห้องพัก</td>
                    <td width="192" height="30" align="center" valign="middle">ชื่อห้องพัก</td>
          <td width="192" height="30" align="center" valign="middle">รูปภาพ</td>
          <td width="192" height="30" align="center" valign="middle">ราคาต่อคืน (บาท)</td>
        </tr>
        <tr>

<?php

if(!empty($_POST['Room_ID']))
{
	$data_chk = serialize($_POST['Room_ID']);

	$rev_data = unserialize($data_chk);  // เวลา select ออกมาใช้ ใช้แบบนี้ครับ
	
	foreach($rev_data as $r){
		$strSQL2 ="select * from tb_room where Room_ID ='".$r."'";
  		$objQuery = mysql_query($strSQL2) or die (mysql_error());
		$objResult = mysql_fetch_array($objQuery);
	$Total =  $objResult["Room_Price"];
	$SumTotal = $SumTotal + $Total; 
	$_SESSION['R_ID'] = $_POST['Room_ID'];
	$_SESSION['R'] = $rev_data;
	$_SESSION['Room_Price'] = $objResult["Room_Price"];

	
?>
        </tr>
         <tr>
            <td align="center" valign="middle"><div align="center"><?php echo $objResult["Room_ID"];?></div></td>
            <td width="114" align="center" valign="middle"><?php echo $objResult["Room_Name"];?></td>
            <td width="249" align="center" valign="middle"><img src="Staff/myfile/<? echo $objResult["Room_Picture"]; ?>" alt="" width="249" height="150" /></td>
            <td width="133" align="center" valign="middle"><?php echo number_format($objResult["Room_Price"]);?></td>
   
   <? } ?>
            </tr>
   
<?php } ?>

      </table>
 <form name="form1" method="post" action="save_booking.php">
      <p>ชื่อลูกค้า :   
        <?php echo $result["Cus_Name"];?>
 /        เบอร์ติดต่อ : <?php echo $result["Cus_Phone"];?> </p>
      <p> วันที่แจ้งเข้าพัก :
        <?php echo $_SESSION['checkin'];?></p>
      <p>    วันที่แจ้งออก :
        <?php echo $_SESSION['checkout'];?></p>
        <?php if(round(abs(strtotime($_SESSION['checkout']) - strtotime($_SESSION['checkin']))/60/60/24) == 0) {
	  								$_SESSION['a'] = $SumTotal ;}
								else
								{
									$_SESSION['a'] = $SumTotal*(round(abs(strtotime($_SESSION['checkout']) - strtotime($_SESSION['checkin']))/60/60/24)); 
								}
								?>
        <?php if(round(abs(strtotime($_SESSION['checkout']) - strtotime($_SESSION['checkin']))/60/60/24) == 0) {
	  								$_SESSION['b'] = $SumTotal/2; }
								else
								{
									$_SESSION['b'] = ($SumTotal*(round(abs(strtotime($_SESSION['checkout']) - strtotime($_SESSION['checkin']))/60/60/24))/2); 
								}
								?>
      <p>ราคารวม : <strong><? echo number_format($_SESSION['a']); ?></strong> บาท</p>
      <p>ค่ามัดจำ : <strong><? echo number_format($_SESSION['b']); ?></strong> บาท</p>
      <p>หมายเหตุ :
        <input name="BK_Note" type="text" id="BK_Note" size="40" />
      </p>
        <label for="textfield5"></label>

      <p>
        <input type="submit" name="button" id="button" onclick="MM_goToURL('parent','booking.php');return document.MM_returnValue" value="เลือกห้องใหม่" />
        
        
  <input name="button2" type="submit" id="button2" onclick="MM_popupMsg('บันทึกการจองของท่านเสร็จสิ้นแล้ว\rท่านสามารถดูบัญชีธนาคารของเราได้ที่เมนูบัญชีธนาคาร')" value="  บันทึก  " />
        
        
  <input type="reset" name="button" id="button2" value="  ยกเลิก  " />
      </p>
      <p>
        <label for="textfield4"></label>
      </p>
      <h4>
        <label for="textfield3"></label>
      </h4>      </form>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
