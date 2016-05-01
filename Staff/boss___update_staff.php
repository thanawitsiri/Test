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
	function utf8_strlen($s) {
	 $c = strlen($s); $l = 0;
 	for ($i = 0; $i < $c; ++$i)
 	if ((ord($s[$i]) & 0xC0) != 0x80) ++$l;
 	return $l;
	}
	if($_POST[User] != NULL  and utf8_strlen($_POST[User]) >= 8
	and $_POST[Name] != NULL

	and $_POST[Phone] != NULL
	and $_POST[Email] != NULL
	and $_POST[Address] != NULL

	and $_POST[New_Pass] == NULL)
	{
	$sql="UPDATE tb_emp SET Emp_Name = '".$_POST[Name]."',
								 Emp_User = '".$_POST[User]."',
								 Emp_Address = '".$_POST[Address]."',
								 Emp_Email = '".$_POST[Email]."',
								 Emp_Phone = '".$_POST[Phone]."' 
		WHERE Emp_ID = '".$_GET['Emp_ID']."'";
	$query=mysql_query($sql) or die(mysql_error());
	if($query)
	{
		$str="แก้ไขข้อมูลเสร็จสิ้น!";
	} 
	else
	{
	$str="แก้ไขข้อมูลล้มเหลว!";
	}

	} elseif($_POST[User] != NULL and utf8_strlen($_POST[User]) >= 8
	and $_POST[Name] != NULL

	and $_POST[Phone] != NULL
	and $_POST[Email] != NULL
	and $_POST[Address] != NULL
	and $_POST[New_Pass] != NULL

	and utf8_strlen($_POST[New_Pass]) >= 8)
	{
	$sql="UPDATE tb_emp SET Emp_Name = '".$_POST[Name]."',
								 Emp_User = '".$_POST[User]."',
								 Emp_Pass = '".$_POST[New_Pass]."',
								 Emp_Address = '".$_POST[Address]."',
								 Emp_Email = '".$_POST[Email]."',
								 Emp_Phone = '".$_POST[Phone]."' 
		WHERE Emp_ID = '".$_GET['Emp_ID']."'";
		$query=mysql_query($sql) or die(mysql_error());
		if($query)
	{
		$str="แก้ไขข้อมูลเสร็จสิ้น!";
	} 
	else
	{
	    $str="แก้ไขข้อมูลล้มเหลว!";
	}
	}

	
	header("location:boss_staff.php");
?>