<?php

include_once 'dbConnect.php';

$id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
$clgname=filter_input(INPUT_POST, 'college', FILTER_SANITIZE_STRING);
$strmName=filter_input(INPUT_POST, 'stream', FILTER_SANITIZE_STRING);



$sql="UPDATE `clgstrm` SET `collegeId`='$clgname=',`streamId`='$strmName' WHERE `clgstrmId`='$id'";

		if (!mysqli_query($con,$sql))
		{
			echo "Failuer while updating record";		
		}
		else
		{
			echo "Successfully record updated";
		 	/*header('Location: ../View/index.html');*/
		}


?>
