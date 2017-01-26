<?php
include_once '../DAO/dbConnect.php';
  
$collegeId=$_POST['clgName'];

$error_msg = "";

$rows = array();

	$sql = "Select u905048666_demo1.streams.streamId,u905048666_demo1.streams.streamName From u905048666_demo1.colleges Inner Join u905048666_demo1.clgstrm On u905048666_demo1.clgstrm.collegeId = u905048666_demo1.colleges.collegeId Inner Join u905048666_demo1.streams On u905048666_demo1.clgstrm.streamId = u905048666_demo1.streams.streamId AND u905048666_demo1.clgstrm.collegeId='$collegeId' ORDER BY `streamId`";

	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) 
	{
	    while($row = $result->fetch_assoc())
	    {
	        //  cast results to specific data types        
	    	echo '<option value='.$row["streamId"].'>';
	        echo ''.$row["streamName"];
	        echo '</option>';
	    }
	    //echo '</option>';    
	} else 
	{
	    echo "0 results";
	}
?>


