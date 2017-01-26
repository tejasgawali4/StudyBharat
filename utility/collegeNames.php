<?php
include_once '../DAO/dbConnect.php';
  
$error_msg = "";

$rows = array();
$sql = "SELECT `collegeId`,`collegeName` FROM `colleges` order by `collegeId` DESC";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        //  cast results to specific data types        
    	echo '<option value='.$row["collegeId"].'>';
        echo ''.$row["collegeName"];
        echo '</option>';
    }
    //echo '</option>';    
} else {
    echo "0 results";
}
?>