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
<?
$strSQL = "SELECT * FROM tb_room WHERE Room_ID = '".$_GET["Room_ID"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if(!$objResult)
{
echo "Not found Room_ID=".$_GET["Room_ID"];	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Room</title>
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
</head>

<body>
<table width="1005" height="744" border="0" >
  <tr>
    <td height="260" colspan="2" align="center" bgcolor="#000000"><img src="Pic/1.jpg" width="998" height="317" /></td>
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
    <td width="806" align="center" valign="top" bgcolor="#D8D8D8">
      <form id="form1" name="form1" method="post" action="staff___update_room.php?Room_ID=<?php echo $_GET["Room_ID"];?>" enctype="multipart/form-data">
        <h2>แก้ไขข้อมูลห้องพัก</h2>
        <table width="451" border="0">
          <tr>
            <td>รหัสห้องพัก                 : </td>
            <td><?php echo $objResult["Room_ID"];?></td>
          </tr>
          <tr>
            <td>ชื่อห้องพัก<font color="red">*</font>                 : </td>
            <td><input name="Room_Name" type="text" id="Room_Name" value="<?php echo $objResult["Room_Name"];?>" size="15" /></td>
          </tr>
          <tr>
            <td>ประเภทห้องพัก<font color="red">*</font>          :</td>
            <td><select name="Room_Type" id="Room_Type" >
              <option value="<?php echo $objResult["Room_Type"];?>"><?php if($objResult["Room_Type"] == 'F'){ echo "Family Cottage"; } elseif($objResult["Room_Type"] == 'D'){echo "2 Bedroom Cottage";} ?></option>
              <option value="F">Family Cottage</option>
              <option value="D">2 Bedroom Cottage</option>
            </select></td>
          </tr>
          <tr>
            <td>รายละเอียดห้องพัก<font color="red">*</font>    :</td>
            <td><textarea name="Room_Detail" cols="30" rows="3" id="Room_Detail"><?php echo $objResult["Room_Detail"];?></textarea></td>
          </tr>
          <tr>
            <td>สถานะ<font color="red">*</font>                        :</td>
            <td><select name="Room_Status" id="Room_Status">
              <option value="<?php echo $objResult["Room_Status"];?>"><?php if($objResult["Room_Status"] == 'Y'){ echo "ใช้งานได้"; } elseif($objResult["Room_Type"] == 'N'){echo "ซ่อมแซม";} ?></option>
              <option value="Y">ใช้งานได้</option>
              <option value="N">ซ่อมแซม</option>
            </select></td>
          </tr>
          <tr>
            <td>ราคาต่อคืน<font color="red">*</font>                 :</td>
            <td><input name="Room_Price" type="text" id="Room_Price" align="right" value="<?php echo $objResult["Room_Price"];?>" size="6" />
            บาท</td>
          </tr>
          <tr>
            <td rowspan="2">รูปภาพ                       :</td>
            <td><img src="myfile/<? echo $objResult["Room_Picture"]; ?>" alt="" width="288" height="189" /></td>
          </tr>
          <tr>
            <td align="right"><input type="file" name="filUpload"><br>
              <input type="hidden" name="hdnOldFile" value="<?php echo $objResult["Room_Picture"];?>">
            </td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>
          <input name="button" type="submit" id="button6" onclick="MM_goToURL('parent','staff_room.php');return document.MM_returnValue" value="ย้อนกลับ" />
          <input name="button" type="submit" id="button7" onclick="MM_validateForm('Room_Name','','R','Room_Price','','R','Room_Detail','','R');return document.MM_returnValue" value="บันทึก" />
          <input type="reset" name="Reset" id="button" value="ยกเลิก" />
        </p>
      </form>
      <h2>&nbsp;</h2>
    <p>&nbsp; </p></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#CCCCCC">2016 Toobnaya Homestay All Right Reserved</td>
  </tr>
</table>
</body>
</html>
