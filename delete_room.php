<?php
	ob_start();
	session_start();

	$Line = $_GET["Line"];
	$_SESSION["strRoomID"][$Line] = "";
	$_SESSION["strQty"][$Line] = "";

	header("location:booking2.php");
?>
