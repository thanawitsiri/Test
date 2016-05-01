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
<title>แจ้งหลักฐานการชำระ</title>
<script type="text/javascript">
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui.css" />
<link rel="stylesheet" media="all" type="text/css" href="jquery-ui-timepicker-addon.css" />

<script type="text/javascript" src="jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>

<script type="text/javascript" src="jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="jquery-ui-sliderAccess.js"></script>

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
      <label for="BK_Bankno"></label>
      <label for="BK_Bankno"></label>
    </form></td>
    <td colspan="5" align="center" valign="top" bgcolor="#FFCCFF"><h2>แจ้งหลักฐานการชำระ</h2>
    
	  <form id="form1" name="form1" method="post" action="payment2.php?BK_ID=<?php echo $_GET["BK_ID"];?>" enctype="multipart/form-data">
	    <?php
$strSQL = "select * from tb_booking where BK_ID = '".$_GET["BK_ID"]."'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]"); 
$objResult=mysql_fetch_array($objQuery);
?>
        <p>รหัสการจอง : <? echo $objResult["BK_ID"];?></p>
        <p>วันที่จอง : <? echo $objResult["BK_Date"];?>
          <label for="textfield4"></label>
        </p>
        <p>ชื่อ-นามสกุล : <? echo $result["Cus_Name"];?></p>
        <p>จำนวนเงินที่ต้องชำระ : <? echo $objResult["BK_Deposit"];?> บาท</p>
        <p>ธนาคารที่โอนเข้า<font color="red">*</font> :
          <select name="BK_Bankname" id="BK_Bankname">
            <option value="ไทยพาณิชย์ (357-2-54969-3)" selected="selected">ไทยพาณิชย์ (357-2-54969-3)</option>
            <option value="ธนาคารกรุงเทพ (088-0-56320-0)">ธนาคารกรุงเทพ (088-0-56320-0)</option>
            <option value="ธนาคารกรุงไทย (493-0-28582-8)">ธนาคารกรุงไทย (493-0-28582-8)</option>
            <option value="ธนาคารกสิกรไทย (726-2-08379-5)">ธนาคารกสิกรไทย (726-2-08379-5)</option>
          </select>
        </p>
        <p>เลขที่บัญชีของท่าน<font color="red">*</font> :
          <input name="BK_Bankno" type="text" id="BK_Bankno" value="" />
   
          <label for="textfield6"></label>
          <br />
        </p>
        <p>
          <label for="textfield7"></label>
          วันที่แจ้งชำระ<font color="red">*</font> :
  <script type="text/javascript">

$(function(){
	$("#BK_Datepay").datepicker({
		dateFormat: 'yy-mm-dd'
	});
});

</script>
<input name="BK_Datepay" type="text" id="BK_Datepay" value="" size="15" /> 

        </p>
        <p>เวลาที่แจ้งชำระ<font color="red">*</font> :

		<script type="text/javascript">

$(function(){
	$("#BK_Timepay").timepicker({
		timeFormat: "HH:mm"
	});
});

</script>
<input name="BK_Timepay" type="text" id="BK_Timepay" value="" size="5" /> 

        <p>หลักฐานการโอน/รูป Slip<font color="red">*</font> : <font color="#FF0000">รองรับไฟล์ jpg,gif,png เท่านั้น </font></p>
        <p><font color="#FF0000">                              
          <input type="file" name="filUpload"><input type="hidden" name="hdnOldFile" value="<?php echo $objResult["BK_Document"];?>">
        </font></p>
        <p> </p>
        <p>
          <input name="button6" type="submit" id="button4" onclick="MM_goToURL('parent','booking_detail.php');return document.MM_returnValue" value="ย้อนกลับ" />
          
          
  <input name="button3" type="submit" id="button7" onclick="MM_validateForm('BK_Bankno','','RisNum','BK_Datepay','','R','BK_Timepay','','R');return document.MM_returnValue" value=" บันทึก " />
          
          
  <input type="reset" name="button3" id="button8" value=" ยกเลิก " />
        </p>
        <p></p>
      </form>
	  <p>&nbsp;</p>

<h4>
        <label for="BK_Bankno"></label>
      </h4>
    <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="6" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
