 <?php
 
include_once '../DAO/dbConnect.php';

$clgname=filter_input(INPUT_POST, 'collegeName', FILTER_SANITIZE_STRING);
$clgaddress=filter_input(INPUT_POST, 'collegeAddress', FILTER_SANITIZE_STRING);
$clgpin=filter_input(INPUT_POST, 'clgPincode', FILTER_SANITIZE_STRING);
$clgcity=filter_input(INPUT_POST, 'collegeCity', FILTER_SANITIZE_STRING);
$clgTel=filter_input(INPUT_POST, 'collegeTel', FILTER_SANITIZE_STRING);
$clgEmail=filter_input(INPUT_POST, 'collegeEmail', FILTER_SANITIZE_STRING);
$clgweb=filter_input(INPUT_POST, 'collegeWebsite', FILTER_SANITIZE_STRING);
$AssociateId=1;
$isSupport=1;

/*INSERT INTO `colleges` (`collegeName`, `collegeAddress`, `collegePincode`, `collegeCity`, `collegeTel`, `collegeEmail`, `collegeWebsite`) VALUES ('', '', '', '', '', '', '');*/

if ($insert_stmt=$mysqli->prepare("INSERT INTO `colleges` (`collegeName`, `collegeAddress`, `collegePincode`, `collegeCity`, `collegeTel`, `collegeEmail`, `collegeWebsite`) VALUES (?, ?,?, ?, ?, ?,?);"))
	{ 
		
		$insert_stmt->bind_param('sssssss', $clgname, $clgaddress, $clgpin, $clgcity, $clgTel, $clgEmail, $clgweb);

		if (!$insert_stmt->execute())
		{
			echo "Failuer while inserting record";
			printf("Error: %s.\n", $insert_stmt->error);		}
		else
		{
			echo "Successfully record insert";
		 /*	header('Location: ../View/index.html');*/
		}
	}
	else
	{
		echo "Sql query Error";
	}




?>
