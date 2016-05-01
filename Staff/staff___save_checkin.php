<?php
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
	
mysql_connect("localhost","root","123456789");
mysql_select_db("toobnaya");

	date_default_timezone_set("Asia/Bangkok");
?>

<?
  $sql1="UPDATE tb_booking set BK_Status = '5' where BK_ID = '".$_GET['BK_ID']."'";
  $query1=mysql_query($sql1);
?>
<?php
$strSQL = "select * from tb_booking,tb_booking_detail where tb_booking.BK_ID = tb_booking_detail.BK_ID and tb_booking.BK_ID = '".$_GET['BK_ID']."'";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<?
		$i=0;
		while($objResult = mysql_fetch_array($objQuery))
		{
		$i++;
$sql2 = "INSERT INTO tb_checkin(CheckIn_Date,CheckIn_Out,CheckIn_Status,Total,Deposit,Room_ID,Cus_ID,BK_ID)
		VALUE('".date("Y-m-d H:i:s")."','".$objResult['BK_DateOut']."','Y','".$objResult['BK_Money']."','".$objResult['BK_Deposit']."','".$objResult['Room_ID']."','".$objResult['Cus_ID']."','".$objResult['BK_ID']."')";
$query2 = mysql_query($sql2) or die("Error Query [".$sql2."]");
		} ?>
        
<?
	$sql3 = "UPDATE tb_room,tb_booking_detail SET Room_St = '2' where tb_booking_detail.BK_ID = '".$_GET['BK_ID']."' and tb_room.Room_ID = tb_booking_detail.Room_ID"; 
	$query3 = mysql_query($sql3) or die("Error Query [".$sql3."]");
?>

<?
mysql_close();
header("location:staff_stay.php");
?>
