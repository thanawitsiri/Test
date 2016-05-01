<?php
ob_start();
session_start();
	
if(!isset($_SESSION["intLine"]))
{

	 $_SESSION["intLine"] = 0;
	 $_SESSION["strRoomID"][0] = $_GET["Room_ID"];
	 $_SESSION["strQty"][0] = 1;

	 header("location:staff_booking1.php");
}
else
{
	
	$key = array_search($_GET["Room_ID"], $_SESSION["strRoomID"]);
	if((string)$key != "")
	{
		 $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + 1;
	}
	else
	{
		
		 $_SESSION["intLine"] = $_SESSION["intLine"] + 1;
		 $intNewLine = $_SESSION["intLine"];
		 $_SESSION["strRoomID"][$intNewLine] = $_GET["Room_ID"];
		 $_SESSION["strQty"][$intNewLine] = 1;
	}
	
	 header("location:staff_booking1.php");

}
?>
