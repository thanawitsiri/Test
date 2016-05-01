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
	('".date("Y-m-d H:i:s")."','". $_SESSION['checkin']."','". $_SESSION['checkout']."','".$a."','".$b."','".$_POST["BK_Note"]."','".$_SESSION["Cus_ID"]."') 
  ";
  mysql_query($strSQL) or die(mysql_error());

  $strBKID = mysql_insert_id();

  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
  {
	  if($_SESSION["strRoomID"][$i] != "")
	  {
			  $strSQL = "
				INSERT INTO tb_booking_detail (DB_Price,Room_ID,BK_ID)
				VALUES
				('".$_SESSION["Total"]."','".$_SESSION["strRoomID"][$i]."','".$strBKID."') 
			  ";
			  mysql_query($strSQL) or die(mysql_error());
	  }
  }

mysql_close();


header("location:home.php");
?>
