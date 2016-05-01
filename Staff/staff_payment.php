<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แสดงการรับชำระ</title>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 983px;
	top: 299px;
	width: 127px;
	height: 61px;
	z-index: 1;
}
</style>
</head>

<body>
<table width="1285" height="499" border="0"  >
  <tr>
    <td height="260" colspan="2" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="1279" height="258" /></td>
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
    <td width="1086" height="201" align="center" valign="top"><h2>แสดงการรับชำระ</h2>
      <table width="1066" height="94" border="1">
        <tr>
          <td width="88" align="center" valign="middle" nowrap="nowrap" bgcolor="#999999">เลขที่<br />
          ใบเสร็จรับเงิน</td>
          <td width="87" align="center" valign="middle" nowrap="nowrap" bgcolor="#999999">วันที่บันทึก</td>
          <td width="94" align="center" valign="middle" nowrap="nowrap" bgcolor="#999999">รหัสการเข้าพัก</td>
          <td width="138" align="center" valign="middle" nowrap="nowrap" bgcolor="#999999">ชื่อลูกค้า</td>
          <td width="82" align="center" valign="middle" nowrap="nowrap" bgcolor="#999999">ยอดสุทธิ<br />
(บาท)</td>
          <td width="81" align="center" valign="middle" bgcolor="#999999">สถานะ</td>
          <td width="65" align="center" valign="middle" bgcolor="#999999">วันที่ชำระ</td>
          <td width="76" align="center" valign="middle" bgcolor="#999999">ประเภท<br />
          การชำระ</td>
          <td width="98" align="center" valign="middle" bgcolor="#999999">รายละเอียด<br />
          การรับชำระ</td>
          <td width="89" align="center" valign="middle" bgcolor="#999999">&nbsp;</td>
          <td width="98" align="center" valign="middle" bgcolor="#999999">&nbsp;</td>
        </tr>
        <tr>
          <td height="42" align="center" valign="middle">000001</td>
          <td align="center" valign="middle">20-01-2558<br />
15:30:50 </td>
          <td align="center" valign="middle">000001</td>
          <td align="center" valign="middle">พสธร <br />
          นาคราชอวยผล</td>
          <td align="center" valign="middle">800</td>
          <td align="center" valign="middle">ยังไม่ชำระ</td>
          <td align="center" valign="middle">&nbsp;</td>
          <td align="center" valign="middle">&nbsp;</td>
          <td align="center" valign="middle">&nbsp;</td>
          <td align="center" valign="middle"><a href="staff_bill.php">บันทึกรับชำระ</a></td>
          <td align="center" valign="middle"><a href="#">ใบเสร็จรับเงิน</a></td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <p></p>
      <h2>
        <label for="textfield4"></label>
      </h2></td>
  </tr>
  <tr>
    <td height="28" colspan="2" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
