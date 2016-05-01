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
 /* $strSQL = "
	INSERT INTO tb_booking(BK_Date,BK_DateIn,BK_DateOut,BK_Money,BK_Deposit,BK_Note,Cus_ID)
	VALUES
	('".date("Y-m-d H:i:s")."','". $_SESSION['checkin']."','". $_SESSION['checkout']."','".$_SESSION['a']."','".$_SESSION['b']."','".$_POST["BK_Note"]."','".$_SESSION["Cus_ID"]."') 
  ";
  mysql_query($strSQL) or die(mysql_error());

  $strBKID = mysql_insert_id();*/


	$data = serialize($_SESSION['R_ID']);

	$rev = unserialize($data); 
	foreach($rev as $r){
		$strSQL2 = "INSERT INTO tb_checkin(CheckIn_Date,CheckIn_Out,CheckIn_Status,Total,Room_ID,Cus_ID)
				VALUES('".date("Y-m-d H:i:s")."','".$_SESSION['checkout']."','Y','".$_SESSION['a']."','".$r."','".$_SESSION['cusid']."')";	  
			  mysql_query($strSQL2) or die(mysql_error());
	  }
		
header("location:staff_stay.php");	

?>