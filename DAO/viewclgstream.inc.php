<?php
include_once 'con-config.php';
include_once 'dbConnect.php';


		//$PartnerId= $_SESSION['contact_id'];
		$sql="Select u905048666_demo1.clgstrm.clgstrmId, u905048666_demo1.colleges.collegeName, u905048666_demo1.streams.streamName From u905048666_demo1.clgstrm Inner Join u905048666_demo1.colleges On u905048666_demo1.clgstrm.collegeId = u905048666_demo1.colleges.collegeId Inner Join u905048666_demo1.streams On u905048666_demo1.clgstrm.streamId = u905048666_demo1.streams.streamId Group By u905048666_demo1.clgstrm.clgstrmId, u905048666_demo1.colleges.collegeId, u905048666_demo1.clgstrm.collegeId, u905048666_demo1.clgstrm.streamId, u905048666_demo1.streams.streamId, u905048666_demo1.colleges.collegeName, u905048666_demo1.streams.streamName Order By u905048666_demo1.clgstrm.clgstrmId Desc";

		$result = mysqli_query($con, $sql);
		
		$index = 0;
		$data = array();
		while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$data[$index] = $row;
			$index++;
		}

		echo json_encode($data);

?>