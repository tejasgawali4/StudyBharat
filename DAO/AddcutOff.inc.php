<?php

include_once '../DAO/dbConnect.php';

$clgname=filter_input(INPUT_POST, 'clgName', FILTER_SANITIZE_STRING);
$StrName=filter_input(INPUT_POST, 'StrName', FILTER_SANITIZE_STRING);
$CategoryName=filter_input(INPUT_POST, 'CategoryName', FILTER_SANITIZE_STRING);
$Year=filter_input(INPUT_POST, 'Year', FILTER_SANITIZE_STRING);
$cutOffMark=filter_input(INPUT_POST, 'cutOffMark', FILTER_SANITIZE_STRING);

/*INSERT INTO `colleges` (`collegeName`, `collegeAddress`, `collegePincode`, `collegeCity`, `collegeTel`, `collegeEmail`, `collegeWebsite`) VALUES ('', '', '', '', '', '', '');*/

if ($insert_stmt=$mysqli->prepare("INSERT INTO `cutoff` (`collegeId`, `streamId`, `categoryId`, `year`, `cutoffMarks`) VALUES (?,?,?,?,?);"))
	{ 
		
		$insert_stmt->bind_param('sssss', $clgname, $StrName, $CategoryName, $Year, $cutOffMark);

		if (!$insert_stmt->execute())
		{
			echo "Failuer while inserting record";
			printf("Error: %s.\n", $insert_stmt->error);		}
		else
		{
			echo "Successfully record insert";
/*		 	header('Location: ../View/index.html');*/
		}
	}
	else
	{
		echo "Sql query Error";
	}

?>
