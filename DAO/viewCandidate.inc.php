<?php

include_once 'con-config.php';
include_once 'dbConnect.php';

		//$PartnerId= $_SESSION['contact_id'];
		$sql="Select
  u905048666_demo1.colleges.collegeId,
  u905048666_demo1.colleges.collegeName,
  u905048666_demo1.colleges.collegeAddress,
  u905048666_demo1.colleges.collegePincode,
  u905048666_demo1.colleges.collegeCity,
  u905048666_demo1.colleges.collegeTel,
  u905048666_demo1.colleges.collegeEmail,
  u905048666_demo1.colleges.collegeWebsite
From
  u905048666_demo1.colleges  Order By
  u905048666_demo1.colleges.collegeId Desc";


		$result = mysqli_query($con, $sql);

		$index = 0;
		$data = array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
		{
			$data[$index] = $row;
			$index++;
		}

		echo json_encode($data);
		
	
?>