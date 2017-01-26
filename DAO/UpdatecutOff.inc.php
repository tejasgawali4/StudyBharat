<?php

include_once 'dbConnect.php';

$id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
$clgname=filter_input(INPUT_POST, 'clgName', FILTER_SANITIZE_STRING);
$StrName=filter_input(INPUT_POST, 'StrName', FILTER_SANITIZE_STRING);
$CategoryName=filter_input(INPUT_POST, 'CategoryName', FILTER_SANITIZE_STRING);
$Year=filter_input(INPUT_POST, 'Year', FILTER_SANITIZE_STRING);
$cutOffMark=filter_input(INPUT_POST, 'cutOffMark', FILTER_SANITIZE_STRING);


$sql="UPDATE `cutoff` SET `collegeId`='$clgname',`streamId`='$StrName',`categoryId`='$CategoryName',`year`='$Year',`cutoffMarks`='$cutOffMark' WHERE `cutoffId`='$id'";

 		if (!mysqli_query($con,$sql))
		{
			echo "Failuer while inserting record";		
		}
		else
		{
			echo "Successfully record Updated";
		 /*	header('Location: ../View/index.html');*/
		}


?>
