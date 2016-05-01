<?php
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
	
mysql_connect("localhost","root","123456789");
mysql_select_db("toobnaya");

	date_default_timezone_set("Asia/Bangkok");
?>

<?
  $strSQL = "
	INSERT INTO tb_booking(BK_Date,BK_DateIn,BK_DateOut,BK_Money,BK_Deposit,BK_Note,Cus_ID)
	VALUES
	('".date("Y-m-d H:i:s")."','". $_SESSION['checkin']."','". $_SESSION['checkout']."','".$_SESSION['a']."','".$_SESSION['b']."','".$_POST["BK_Note"]."','".$_SESSION["Cus_ID"]."') 
  ";
  mysql_query($strSQL) or die(mysql_error());

  $strBKID = mysql_insert_id();

	$data = serialize($_SESSION['R_ID']);

	$rev = unserialize($data); 
	foreach($rev as $r){
		$bb = $_SESSION['Room_Price'];
		$strSQL3 = "select * from tb_room where Room_ID = '".$r."'";
		$querySQL3 = mysql_query($strSQL3) or die(mysql_error());
		$result3 = mysql_fetch_array($querySQL3);
		$strSQL2 = "INSERT INTO tb_booking_detail(DB_Price,Room_ID,BK_ID)
				VALUES('".$result3['Room_Price']."','".$r."','".$strBKID."')";	  
			  mysql_query($strSQL2) or die(mysql_error());
			  echo $result3['Room_Price'];
	  }
		
		
mysql_close();


header("location:booking_detail.php");
?>
