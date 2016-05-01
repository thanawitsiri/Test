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
	date_default_timezone_set('Asia/Bangkok');
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แสดงห้องพักที่ว่าง</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 780px;
	top: 301px;
	width: 112px;
	height: 32px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 465px;
	top: 470px;
	width: 521px;
	height: 149px;
	z-index: 1;
}
</style>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
function MM_popupMsg(msg) { //v1.0
  alert(msg);
}
</script>
</head>

<body>
<table width="1032" height="744" border="0" >
  <tr>
    <td height="260" colspan="2" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="1026" height="261" /></td>
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
    <td width="833" height="413" align="center" valign="top" bgcolor="#D8D8D8"><h2>บันทึกการจองห้องพัก
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
	$_SESSION['R'] = $r;
	$_SESSION['R_ID'] = $_POST['Room_ID'];
	$_SESSION['Room_Price'] = $objResult["Room_Price"];
	
?>
        </tr>
        <tr>
          <td align="center" valign="middle"><div align="center"><?php echo $objResult["Room_ID"];?></div></td>
          <td width="114" align="center" valign="middle"><?php echo $objResult["Room_Name"];?></td>
          <td width="249" align="center" valign="middle"><img src="myfile/<? echo $objResult["Room_Picture"]; ?>" alt="" width="249" height="150" /></td>
          <td width="133" align="center" valign="middle"><?php echo number_format($objResult["Room_Price"]);?></td>
          <? } ?>
        </tr>
        <?php } ?>
      </table>
      <? 
	$strSQL5 = "select * from tb_customer where Cus_ID = '".$_SESSION['cusid']."'"; 
	$objQuery5 = mysql_query($strSQL5) or die (mysql_error());
	$objResult5 = mysql_fetch_array($objQuery5);
	?>
      
      <form id="form1" name="form1" method="post" action="staff___save_booking.php">
        <p>รหัสลูกค้า : <? echo $objResult5['Cus_ID'];?> / ชื่อลูกค้า : <? echo $objResult5['Cus_Name'];?></p>
        <p>ประเภทการจอง : 
          <label for="select2"></label>
          <select name="Type" id="select2">
            <option value="P" selected="selected">Phone</option>
            <option value="A">Agency</option>
          </select>
        </p>
        <p>วันที่แจ้งเข้าพัก : <?php echo $_SESSION['checkin'];?></p>
        <p>    วันที่แจ้งออก : <?php echo $_SESSION['checkout'];?></p>
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
          <input type="submit" name="button" id="button" onclick="MM_goToURL('parent','staff_showroom.php');return document.MM_returnValue" value="เลือกห้องใหม่" />
          <input name="button" type="submit" id="button" onclick="MM_popupMsg('บันทึกการจองของท่านเสร็จสิ้นแล้ว\rท่านสามารถดูบัญชีธนาคารของเราได้ที่เมนูบัญชีธนาคาร')" value="  บันทึก  " />
          <input type="reset" name="button" id="button" value="  ยกเลิก  " />
        </p>
        <p>&nbsp;</p>
      </form></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
