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
	require_once('mpdf/mpdf.php');
	ob_start();
	
?>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8">



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
@page rotated { size: landscape; }
.style1 {
	font-family: "TH SarabunPSK";
	font-size: 18pt;
	font-weight: bold;
}
.style2 {
	font-family: "TH SarabunPSK";
	font-size: 16pt;
	font-weight: bold;
}
.style3 {
	font-family: "TH SarabunPSK";
	font-size: 16pt;
	
}
.style5 {cursor: hand; font-weight: normal; color: #000000;}
.style9 {font-family: Tahoma; font-size: 12px; }
.style11 {font-size: 12px}
.style13 {font-size: 9}
.style16 {font-size: 9; font-weight: bold; }
.style17 {font-size: 12px; font-weight: bold; }
-->
</style>
<title></title>
</head>
<body>
<div class="Section2">
  <table width="704" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>

      <td width="291" align="center">ตูบนายาโฮมสเตย์</td>
    </tr>
    <tr>
      <td height="27" align="center"><span class="style2">รายงานการจองประจำวัน</span></td>
    </tr>
    <tr>
      <td height="25" align="center"><span class="style2">ตั้งแต่วันที่ <? echo$_POST['date1'];?> ถึงวันที่ <? echo $_POST['date2'];?></span></td>
    </tr>
  </table>
  <table width="200" border="0" align="center">
    <tbody>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <table bordercolor="#424242" width="1141" height="78" border="1"  align="center" cellpadding="0" cellspacing="0" class="style3">
    <tr align="center">
      <td width="99" height="23" align="center" bgcolor="#D5D5D5"><strong>วันที่จอง</strong></td>
      <td width="104" align="center" bgcolor="#D5D5D5"><strong>รหัสการจอง</strong></td>
      <td width="162" align="center" bgcolor="#D5D5D5"><strong>รหัสสมาชิก</strong></td>
      <td width="151" align="center" bgcolor="#D5D5D5"><strong>ชื่อ-นามสกุล</strong></td>
      <td width="133" align="center" bgcolor="#D5D5D5"><strong>ค่ามัดจำ (บาท)</strong></td>
      <td width="109" align="center" bgcolor="#D5D5D5"><strong>สถานะ</strong></td>
      <td width="100" align="center" bgcolor="#D5D5D5"><strong>วันที่แจ้งเข้าพัก</strong></td>
      <td width="101" align="center" bgcolor="#D5D5D5"><strong>วันที่แจ้งออก</strong></td>
      <td width="162" align="center" bgcolor="#D5D5D5"><strong>ชื่อห้องพัก</strong></td>
    </tr>
<?
$sql1 = "select * from tb_booking, tb_customer, tb_booking_detail ,tb_room where tb_booking.BK_ID = tb_booking_detail.BK_ID 
and tb_booking_detail.Room_ID = tb_room.Room_ID 
and tb_booking.Cus_ID = tb_customer.Cus_ID
and BK_Date Between '".$_POST['date1']."' and '".$_POST['date2']."'
GROUP BY tb_booking.BK_Date"; 
$query1 = mysql_query($sql1) or die(mysql_error());
?>  
<?
		$i=0;
		while($result1 = mysql_fetch_array($query1))
		{
		$i++;
?>
    <tr>
      <td height="22" align="center"><? echo substr($result1['BK_Date'],0,10); ?></td>
      <td align="center" class="style3"><? echo $result1['BK_ID']; ?></td>
      <td align="center" class="style3"><? echo $result1['Cus_ID']; ?></td>
      <td align="right" class="style3"><? echo $result1['Cus_Name']; ?></td>
      <td align="right" class="style3"><? echo number_format($result1['BK_Deposit']); ?></td>
      <td align="center" class="style3"><? if($result1["BK_Status"] ==0 ){ echo "ยังไม่ได้ชำระ"; }
		  elseif($result1["BK_Status"] ==1 ){ echo "รอตรวจสอบ"; }
		  elseif($result1["BK_Status"] ==2 ){ echo "ชำระแล้ว"; }
		  elseif($result1["BK_Status"] ==5 ){ echo "มีการเข้าพักแล้ว"; }
		  else{ echo "ยกเลิกการจอง"; } ?></td>
      <td align="center" class="style3"><? echo $result1['BK_DateIn']; ?></td>
      <td align="center" class="style3"><? echo $result1['BK_DateOut']; ?></td>
      <td align="center" class="style3"><? echo $result1['Room_Name']; ?></td>
    </tr>
<? } ?>  
    <tr>
      <td height="23">&nbsp;</td>
      <td align="center" class="style3">&nbsp;</td>
      <td align="right" class="style3">&nbsp;</td>
      <td align="right" class="style3">&nbsp;</td>
      <td align="right" class="style3">&nbsp;</td>
      <td align="right" class="style3">&nbsp;</td>
      <td align="right" class="style3">&nbsp;</td>
      <td align="right" class="style3"><strong> <strong>รวม</strong></strong></td>
      <td align="center" class="style3"><strong><? echo $i ?>  รายการ</strong></td>
    </tr>
  </table>
  <table width="200" border="0">
    <tbody>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>

</div>
<div class=Section2>
<table width="704" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
 </body></html>
 <?Php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4-L', '0', ''); //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
$pdf->SetAutoFont();
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>
