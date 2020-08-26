<?php 
include 'db.php';
if(isset($_GET['rclistid']))
		{
			$rclistid=$_GET['rclistid'];
			$sql="Delete From Customer Where cus_id='$rclistid'";
			mysqli_query($con,$sql);
			header("Location: customer_list.php");
		}	
		
	?> 