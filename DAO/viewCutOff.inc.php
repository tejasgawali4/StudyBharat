<?php

include_once 'con-config.php';
include_once 'dbConnect.php';

		//$PartnerId= $_SESSION['contact_id'];
/*		$sql="SELECT `cutoffId`, `collegeId`, `streamId`, `categoryId`, `year`, `cutoffMarks` FROM `cutoff` ORDER BY `cutoffId` DESC";
*/

$sql="Select
  u905048666_demo1.cutoff.cutoffId,
  u905048666_demo1.colleges.collegeName,
  u905048666_demo1.streams.streamName,
  u905048666_demo1.category.categoryName,
  u905048666_demo1.cutoff.year,
  u905048666_demo1.cutoff.cutoffMarks
From
  u905048666_demo1.cutoff Inner Join
  u905048666_demo1.category
    On u905048666_demo1.cutoff.categoryId = u905048666_demo1.category.categoryId Inner Join
  u905048666_demo1.clgstrm
    On u905048666_demo1.cutoff.collegeId = u905048666_demo1.clgstrm.collegeId And
    u905048666_demo1.cutoff.streamId = u905048666_demo1.clgstrm.streamId Inner Join
  u905048666_demo1.colleges
    On u905048666_demo1.clgstrm.collegeId = u905048666_demo1.colleges.collegeId Inner Join
  u905048666_demo1.streams
    On u905048666_demo1.clgstrm.streamId = u905048666_demo1.streams.streamId
Group By
  u905048666_demo1.cutoff.cutoffId, u905048666_demo1.colleges.collegeName,
  u905048666_demo1.streams.streamName, u905048666_demo1.category.categoryName,
  u905048666_demo1.cutoff.year, u905048666_demo1.cutoff.cutoffMarks Order By
  u905048666_demo1.cutoff.cutoffId Desc";	

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