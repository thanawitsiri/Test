<?
	session_start();
	include("config.php");
	
	$sql="SELECT * FROM tb_customer WHERE Cus_User='".$_POST[Cus_User]."' AND Cus_Pass ='".$_POST[Cus_Pass]."'";
	$query=mysql_query($sql);
	$result=mysql_fetch_array($query);
	
	if($result){
		$_SESSION["Cus_ID"]=$result["Cus_ID"];
		session_write_close();
		header("location:home.php");
	} else {
	?> <? echo "ชื่อผู้ใช้ หรือ รหัสผ่าน ของท่านผิดพลาด";?>
  
<p><a href="home.html">ย้อนกลับ</a>
   

    <br />   
<?	}
?>