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
<title>Bank Detail</title>
</head>

<body>
<table width="962" height="744" border="0" a>
  <tr>
    <td height="260" colspan="6" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="953" height="265" /></td>
  </tr>
  <tr>
    <td height="36" align="center" bgcolor="#CCCCCC"><strong><a href="home.php">หน้าแรก</a></strong></td>
    <td width="174" align="center" bgcolor="#CCCCCC"><strong><a href="register.php">สมัครสมาชิก</a></strong></td>
    <td width="175" align="center" bgcolor="#CCCCCC"><strong><a href="room_detail.php">รายละเอียดห้องพัก</a></strong></td>
    <td width="132" align="center" bgcolor="#CCCCCC"><strong><a href="how_to_booking.php">วิธีจองห้องพัก</a></strong></td>
    <td width="178" align="center" bgcolor="#CCCCCC"><strong><a href="payment.php">ข้อมูลบัญชีธนาคาร</a></strong></td>
    <td width="84" align="center" bgcolor="#CCCCCC"><strong><a href="contact_us.php">ติดต่อเรา</a></strong></td>
  </tr>
  <tr>
    <td width="193" height="413" valign="top" bgcolor="#00CCFF"><form method="post" action="checklogin.php">
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
    <td colspan="5" align="center" valign="top" bgcolor="#FFCCFF"><h2><strong>ข้อมูลบัญชีธนาคาร</strong></h2>
      <table width="694" border="1" align="center" cellpadding="4" cellspacing="1">
      <tbody>
        <tr>
          <th width="165">ธนาคาร</th>
          <th width="202">สาขา</th>
          <th width="144">เลขที่บัญชี</th>
          <th width="136">ชื่อบัญชี</th>
        </tr>
        <tr>
          <td><table border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td id="TableLineBottomNoLine"><img alt="ธนาคารกรุงศรีอยุธยา" src="Pic/bay.gif" /></td>
                <td id="TableLineBottomNoLine">ธนาคารกรุงศรีอยุธยา</td>
              </tr>
            </tbody>
          </table></td>
          <td>สาขาเชียงใหม่ :ออมทรัพย์</td>
          <td>463-1-22762-4</td>
          <td>คุณวริศรา เชื่อมั่น</td>
        </tr>
        <tr>
          <td><table border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td id="TableLineBottomNoLine"><img alt="ธนาคารกรุงเทพ" src="Pic/bkb.gif" /></td>
                <td id="TableLineBottomNoLine">ธนาคารกรุงเทพ</td>
              </tr>
            </tbody>
          </table></td>
          <td>สาขาเชียงใหม่ :ออมทรัพย์</td>
          <td>088-0-56320-0</td>
          <td>คุณวริศรา เชื่อมั่น</td>
        </tr>
        <tr>
          <td><table border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td id="TableLineBottomNoLine"><img alt="ธนาคารกรุงไทย" src="Pic/ktb.gif" /></td>
                <td id="TableLineBottomNoLine">ธนาคารกรุงไทย</td>
              </tr>
            </tbody>
          </table></td>
          <td>สาขาเชียงใหม่ :ออมทรัพย์์</td>
          <td>493-0-28582-8</td>
          <td>คุณวริศรา เชื่อมั่น</td>
        </tr>
        <tr>
          <td><table border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td id="TableLineBottomNoLine"><img alt="ธนาคารกสิกรไทย" src="Pic/tfb.gif" /></td>
                <td id="TableLineBottomNoLine">ธนาคารกสิกรไทย</td>
              </tr>
            </tbody>
          </table></td>
          <td>สาขาเชียงใหม่ :ออมทรัพย์</td>
          <td>726-2-08379-5</td>
          <td>คุณวริศรา เชื่อมั่น</td>
        </tr>
        <tr>
          <td><table border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td id="TableLineBottomNoLine"><img alt="ธนาคารไทยพาณิชย์" src="Pic/scb.gif" /></td>
                <td id="TableLineBottomNoLine">ธนาคารไทยพาณิชย์</td>
              </tr>
            </tbody>
          </table></td>
          <td>สาขาเชียงใหม่ :ออมทรัพย์</td>
          <td>357-2-54969-3</td>
          <td>คุณวริศรา เชื่อมั่น</td>
        </tr>
        <tr>
          <td><table border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td id="TableLineBottomNoLine"><img src="Pic/tanachart.gif" alt="" width="22" height="22" /></td>
                <td id="TableLineBottomNoLine">ธนาคารธนชาต</td>
              </tr>
            </tbody>
          </table></td>
          <td>สาขาเชียงใหม่ :ออมทรัพย์</td>
          <td>011-6-03088-8</td>
          <td>คุณวริศรา เชื่อมั่น</td>
        </tr>
      </tbody>
  </table>
      <form id="form4" name="form4" method="post" action="">
        <label for="select"></label>
      </form>
<h4>
        <label for="textfield3"></label>
</h4></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
