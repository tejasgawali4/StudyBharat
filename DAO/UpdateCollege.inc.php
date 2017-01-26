 <?php
 
include_once 'dbConnect.php';

$id=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
$clgname=filter_input(INPUT_POST, 'collegeName', FILTER_SANITIZE_STRING);
$clgaddress=filter_input(INPUT_POST, 'collegeAddress', FILTER_SANITIZE_STRING);
$clgpin=filter_input(INPUT_POST, 'clgPincode', FILTER_SANITIZE_STRING);
$clgcity=filter_input(INPUT_POST, 'collegeCity', FILTER_SANITIZE_STRING);
$clgTel=filter_input(INPUT_POST, 'collegeTel', FILTER_SANITIZE_STRING);
$clgEmail=filter_input(INPUT_POST, 'collegeEmail', FILTER_SANITIZE_STRING);
$clgweb=filter_input(INPUT_POST, 'collegeWebsite', FILTER_SANITIZE_STRING);


	$sql="UPDATE `colleges` SET `collegeName`='$clgname',`collegeAddress`='$clgaddress',`collegePincode`='$clgpin',`collegeCity`='$clgcity',`collegeTel`='$clgTel',`collegeEmail`='$clgEmail',`collegeWebsite`='$clgweb' WHERE `collegeId`='$id'";

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
