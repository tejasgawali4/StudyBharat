<?php
 
include_once '../DAO/dbConnect.php';

$clgname=filter_input(INPUT_POST, 'college', FILTER_SANITIZE_STRING);
$strmName=filter_input(INPUT_POST, 'stream', FILTER_SANITIZE_STRING);

/*INSERT INTO `colleges` (`collegeName`, `collegeAddress`, `collegePincode`, `collegeCity`, `collegeTel`, `collegeEmail`, `collegeWebsite`) VALUES ('', '', '', '', '', '', '');*/

if ($insert_stmt=$mysqli->prepare("INSERT INTO `clgstrm` (`collegeId`, `streamId`) VALUES (?,?);"))
	{ 
		
		$insert_stmt->bind_param('ss', $clgname, $strmName);

		if (!$insert_stmt->execute())
		{
			echo "Failuer while inserting record";
			printf("Error: %s.\n", $insert_stmt->error);		}
		else
		{
			echo "Successfully record insert";
		 	/*header('Location: ../View/index.html');*/
		}
	}
	else
	{
		echo "Sql query Error";
	}


?>
