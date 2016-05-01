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
<title>Home</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 880px;
	top: 280px;
	width: 84px;
	height: 41px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 737px;
	top: 333px;
	width: 111px;
	height: 50px;
	z-index: 2;
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
<div id="apDiv1"></div>
<table width="962" height="497" border="0" bgcolor="#666666">
  <tr>
    <td height="260" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="961" height="274" /></td>
  </tr>
  <tr>
    <td height="201" align="center" valign="top" bgcolor="#999999"><table width="957" height="338" border="0" align="left">
      <tr>
        <td width="189" height="26" bgcolor="#666666"><input  name="button8" type="submit" id="button8" onclick="MM_goToURL('parent','staff_home.php');return document.MM_returnValue" value="                หน้าแรก                " width="500" /></td>
        <td width="758" align="center" bgcolor="#999999"> ยินดีต้อนรับ คุณ<? echo $result['Emp_Name']; ?></td>
        </tr>
      <tr>
        <td height="26" bgcolor="#666666"><input name="button2" type="submit" id="button2" onclick="MM_goToURL('parent','staff_member.php');return document.MM_returnValue" value="        แสดง/ลบข้อมูลลูกค้า       " height="100" /></td>
        <td bgcolor="#999999">&nbsp;</td>
        </tr>
      <tr>
        <td height="26" bgcolor="#666666"><a href="staff_room.html">
          <input name="button3" type="submit" id="button3" onclick="MM_goToURL('parent','staff_room.php');return document.MM_returnValue" value="       แสดง/ลบข้อมูลห้องพัก     " />
        </a></td>
        <td bgcolor="#999999">&nbsp;</td>
        </tr>
      <tr>
        <td height="26" bgcolor="#666666"><a href="staff_room.html">
          <input name="button4" type="submit" id="button4" onclick="MM_goToURL('parent','staff_service.php');return document.MM_returnValue" value="     แสดง/ลบข้อมูลค่าบริการ     " />
        </a></td>
        <td bgcolor="#999999">                                                                   
  </td>
        </tr>
      <tr>
        <td height="26" bgcolor="#666666"><input name="บันทึกการจอง2" type="submit" id="บันทึกการจอง2" onclick="MM_goToURL('parent','staff_showroom.php');return document.MM_returnValue" value="       แสดงห้องพักที่ว่างจอง      " /></td>
        <td bgcolor="#999999">&nbsp;</td>
      </tr>
      <tr>
        <td height="26" bgcolor="#666666"><input name="บันทึกการจอง" type="submit" id="บันทึกการจอง" onclick="MM_goToURL('parent','staff_showroom1.php');return document.MM_returnValue" value="    แสดงห้องพักที่ว่างเข้าพัก     " /></td>
        <td bgcolor="#999999">&nbsp;</td>
        </tr>
      <tr>
        <td height="26" bgcolor="#666666"><a href="staff_room.html">
          <input name="button5" type="submit" id="button5" onclick="MM_goToURL('parent','staff_booking_detail.php');return document.MM_returnValue" value="        แสดง/ยกเลิกการจอง       " />
        </a></td>
        <td bgcolor="#999999">&nbsp;</td>
        </tr>
      <tr>
        <td height="26" bgcolor="#666666"><input type="submit" onclick="MM_goToURL('parent','staff_stay.php');return document.MM_returnValue" value="           แสดงการเข้าพัก           " /></td>
        <td bgcolor="#999999">&nbsp;</td>
      </tr>
      <tr>
        <td height="26" bgcolor="#666666"><input type="submit" onclick="MM_goToURL('parent','staff_payment.php');return document.MM_returnValue" value="          แสดงการรับชำระ           " /></td>
        <td bgcolor="#999999">&nbsp;</td>
      </tr>
      
        <? if($result['Emp_Level'] == 1) { ?> <tr>
        <td height="26" bgcolor="#666666"><input type="submit" onclick="MM_goToURL('parent','staff_report.php');return document.MM_returnValue" value="                รายงาน                 " /></td></tr>
		<? }else { ?><tr>
        <td height="26" bgcolor="#666666"> <input type="submit" onclick="MM_goToURL('parent','boss_report.php');return document.MM_returnValue" value="                รายงาน                 " /></td></tr> <? } ?>
     <? if($result['Emp_Level'] == 2) { ?> <tr>
        <td height="26" bgcolor="#666666"><input type="submit" onclick="MM_goToURL('parent','boss_staff.php');return document.MM_returnValue" value="     แสดง/ลบข้อมูลพนักงาน      " /></td></tr>
		<? } ?>
      
      <tr>
        <td height="26" bgcolor="#666666"><input type="submit" onclick="MM_goToURL('parent','staff_editstaff.php');return document.MM_returnValue" value="        แก้ไขข้อมูลพนักงาน        " /></td>
        <td bgcolor="#999999">&nbsp;</td>
      </tr>
      <tr>
        <td height="26" bgcolor="#666666"><input type="submit" onclick="MM_goToURL('parent','staff___logout.php');return document.MM_returnValue" value="             ออกจากระบบ            " /></td>
        <td bgcolor="#999999">&nbsp;</td>
      </tr>
    </table>
    
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="28" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
