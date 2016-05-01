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
  $sqlStr = "update tb_booking set BK_Status = '".$_POST['Status']."' where BK_ID = '".$_GET['BK_ID']."'";
  $sqlquery=mysql_query($sqlStr);
  header("location:staff_booking_detail.php");
?>