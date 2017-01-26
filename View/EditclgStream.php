<?php 

include_once '../DAO/dbConnect.php';  

$id=$_GET['id'];

$sql="Select
  u905048666_demo1.colleges.collegeName,
  u905048666_demo1.clgstrm.collegeId,
  u905048666_demo1.streams.streamName,
  u905048666_demo1.clgstrm.streamId,
  u905048666_demo1.clgstrm.clgstrmId
From
  u905048666_demo1.clgstrm Inner Join
  u905048666_demo1.colleges
    On u905048666_demo1.clgstrm.collegeId = u905048666_demo1.colleges.collegeId
  Inner Join
  u905048666_demo1.streams
    On u905048666_demo1.clgstrm.streamId = u905048666_demo1.streams.streamId
Where
  u905048666_demo1.clgstrm.clgstrmId = '$id'";

 $result=mysqli_query($con,$sql);

 $data=mysqli_fetch_array($result,MYSQLI_ASSOC);

include_once('header.php')

?>
<form role="form" name="updatestrem" method="POST">
    <div class="container jumbotron">
            <div class="row">
                <div class="col-sm-12 form-group btn-danger">
                    <label >Edit College Streams</label>
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo $data['clgstrmId']; ?>">
                <div class="col-sm-4 form-group">
                    <label for="inputEmail">College Names</label>
                    <select class="form-control input-lg" name="college">
                    <option value="<?php echo $data['collegeId']; ?>"><?php echo $data['collegeName']; ?></option>
                    <?php include_once '../utility/collegeNames.php'; ?>
                    </select> 
                </div>

                <div class="col-sm-4 form-group">
                    <label for="inputEmail">Stream Names</label>
                    <select class="form-control input-lg" name="stream">
                    <option value="<?php echo $data['streamId']; ?>"><?php echo $data['streamName']; ?></option>
                    <?php include_once '../utility/streams.php'; ?>
                    </select>
                </div>

                <div class="col-sm-4 form-group">

                </div>
          </div>
                    <div class="row">
                <div class="col-sm-4 form-group">
                    <input type="submit" class="btn-success btn-lg" value="Update" tabindex="4">
                </div>
                <div class="col-sm-4 form-group">
                    <input type="submit" class="btn-success btn-lg" value="Clear" tabindex="4">
                </div>
                <div class="col-sm-4 form-group">

                </div>
          </div>
      </div>


</form>
<?php 
    include_once('footer.php');
 
?>
</body>
</html>
   <script> 

        $(document).ready(function()
        {   
            $('form[name=updatestrem]').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    cache: false,
                    url: '../DAO/updateclgstream.inc.php',
                    data: $(this).serialize(),
                    dataType: "text",
                    success: function(data){
                        alert(data);
                        $('#updatestrem')[0].reset();
                    }
                });
            });
        });
    </script>  


<!-- 

    Select
  nitiraj.clgstrm.collegeId As collegeId1,
  nitiraj.clgstrm.streamId,
  nitiraj.streams.streamId As streamId1,
  nitiraj.streams.streamName,
  nitiraj.colleges.collegeName
From
  nitiraj.colleges Inner Join
  nitiraj.clgstrm
    On nitiraj.clgstrm.collegeId = nitiraj.colleges.collegeId Inner Join
  nitiraj.streams
    On nitiraj.clgstrm.streamId = nitiraj.streams.streamId
Group By
  nitiraj.clgstrm.collegeId, nitiraj.clgstrm.streamId, nitiraj.streams.streamId,
  nitiraj.streams.streamName, nitiraj.colleges.collegeName 

   -->