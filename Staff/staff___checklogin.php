<?
	session_start();
	include("config.php");
	
	$sql="SELECT * FROM tb_emp WHERE Emp_User='".$_POST[Emp_User]."' AND Emp_Pass ='".$_POST[Emp_Pass]."'";
	$query=mysql_query($sql);
	$result=mysql_fetch_array($query);
	
	if($result){
		$_SESSION["Emp_ID"]=$result["Emp_ID"];
		session_write_close();
		header("location:staff_home.php");
	} else { ?>
	<? echo "ชื่อผู้ใช้ หรือ รหัสผ่าน ของท่านผิดพลาด"; ?>
<p><a href="staff_login.php">ย้อนกลับ</a>
	<?
	}
?>