<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
</script>
</head>

<body>
<table width="962" height="690" border="0" >
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
    <td width="763" height="359" align="center" valign="top" bgcolor="#CED8F6"><h2>บันทึกรับชำระ </h2>
      <table width="428" border="0">
        <tr>
          <td width="171">เลขที่ใบเสร็จรับเงิน      : </td>
          <td valign="middle"><label for="textfield3"></label>
            000001</td>
        </tr>
        <tr>
          <td>รหัสการเข้าพัก          : </td>
          <td>000001</td>
        </tr>
        <tr>
          <td>รหัสสมาชิก               :</td>
          <td>000001</td>
        </tr>
        <tr>
          <td>ชื่อ-นามสกุล             :</td>
          <td>พสธร นาคราชอวยผล </td>
        </tr>
      </table>
      <br />
      <table width="726" height="104" border="1" align="center" bordercolor="black">
        <tr>
          <td height="23" colspan="6" align="center" valign="middle">รายการบริการ</td>
        </tr>
        <tr>
          <td width="116" height="23" align="center" valign="middle">รหัสค่าบริการ</td>
          <td width="133" align="center" valign="middle">รายการ</td>
          <td width="74" align="center" valign="middle">จำนวน</td>
          <td width="93" align="center" valign="middle">หน่วยนับ</td>
          <td width="166" align="center" valign="middle">ราคาต่อหน่วย (บาท)</td>
          <td width="145" height="23" align="center" valign="middle">ราคารวม (บาท)</td>
        </tr>
        <tr>
          <td height="23" align="center" valign="middle">0002</td>
          <td align="center" valign="middle">ห้องครอบครัว</td>
          <td align="center" valign="middle">3</td>
          <td align="center" valign="middle">วัน</td>
          <td align="center" valign="middle">1,800</td>
          <td height="23" align="center" valign="middle">5,400</td>
        </tr>
        <tr>
          <td height="23" align="center" valign="middle">0001</td>
          <td align="center" valign="middle">เช่ารถยนต์</td>
          <td align="center" valign="middle">1</td>
          <td align="center" valign="middle">วัน</td>
          <td align="center" valign="middle">800</td>
          <td height="23" align="center" valign="middle">800</td>
        </tr>
      </table>
      <br />
      <table width="244" border="0">
        <tr>
          <td width="93">รวมทั้งหมด     :</td>
          <td width="60" align="right">6,200</td>
          <td width="40" align="right">บาท</td>
        </tr>
        <tr>
          <td>หัก ค่ามัดจำ   :</td>
          <td align="right">2,700</td>
          <td align="right">บาท</td>
        </tr>
        <tr>
          <td>หัก ส่วนลด     :</td>
          <td align="right"><form id="form1" name="form1" method="post" action="">
            <label for="textfield4"></label>
            <input name="textfield3" type="text" id="textfield4" value="            0" size="4" />
          </form></td>
          <td align="right">บาท</td>
        </tr>
        <tr>
          <td>ราคาสุทธิ       :</td>
          <td align="right">3,500</td>
          <td align="right">บาท</td>
        </tr>
      </table>
      <p>ประเภทชำระ* :
        <label for="select"></label>
        <select name="select" id="select">
          <option selected="selected">เงินสด</option>
          <option>บัตรเครดิต</option>
        </select>
      </p>
      <p>เลขที่บัตรเครดิต :
        <label for="textfield"></label>
        <input type="text" name="textfield" id="textfield" />
      </p>
      <p>รายละเอียดการชำระ :
        <label for="textfield2"></label>
        <textarea name="textfield2" cols="30" rows="3" id="textfield2"></textarea>
      </p>
      <p>&nbsp;</p>
      <p>
        <input type="submit" name="button" id="button" value="ย้อนกลับ" />
        <input type="submit" name="button" id="button6" value="บันทึก" />
        <input type="submit" name="button" id="button7" value="ยกเลิก" />
      </p>
      <p></p>
      </p>
    <p>&nbsp; </p></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
