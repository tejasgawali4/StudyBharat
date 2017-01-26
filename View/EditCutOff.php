 <?php
 
include_once '../DAO/dbConnect.php';

$id=$_GET['id'];

$sql="Select
  u905048666_demo1.cutoff.collegeId,
  u905048666_demo1.colleges.collegeId As collegeId1,
  u905048666_demo1.colleges.collegeName,
  u905048666_demo1.cutoff.streamId,
  u905048666_demo1.streams.streamId As streamId1,
  u905048666_demo1.streams.streamName,
  u905048666_demo1.cutoff.categoryId,
  u905048666_demo1.category.categoryId As categoryId1,
  u905048666_demo1.category.categoryName,
  u905048666_demo1.cutoff.year,
  u905048666_demo1.cutoff.cutoffMarks,
  u905048666_demo1.cutoff.cutoffId
From
  u905048666_demo1.category Inner Join
  u905048666_demo1.cutoff
    On u905048666_demo1.cutoff.categoryId = u905048666_demo1.category.categoryId
  Inner Join
  u905048666_demo1.clgstrm
    On u905048666_demo1.cutoff.collegeId = u905048666_demo1.clgstrm.collegeId
    And u905048666_demo1.cutoff.streamId = u905048666_demo1.clgstrm.streamId
  Inner Join
  u905048666_demo1.colleges
    On u905048666_demo1.clgstrm.collegeId = u905048666_demo1.colleges.collegeId
  Inner Join
  u905048666_demo1.streams
    On u905048666_demo1.clgstrm.streamId = u905048666_demo1.streams.streamId
Where
  u905048666_demo1.cutoff.cutoffId = '$id'
Group By
  u905048666_demo1.cutoff.collegeId, u905048666_demo1.colleges.collegeId,
  u905048666_demo1.colleges.collegeName, u905048666_demo1.cutoff.streamId,
  u905048666_demo1.streams.streamId, u905048666_demo1.streams.streamName,
  u905048666_demo1.cutoff.categoryId, u905048666_demo1.category.categoryId,
  u905048666_demo1.category.categoryName, u905048666_demo1.cutoff.year,
  u905048666_demo1.cutoff.cutoffMarks, u905048666_demo1.cutoff.cutoffId";

$result=mysqli_query($con,$sql);

$data=mysqli_fetch_array($result,MYSQLI_ASSOC);


include_once('header.php')

?>
<form name="UpdatecutOff" method="POST">
    <div class="container jumbotron">
            <div class="row">
                <div class="col-sm-12 form-group btn-danger">
                    <label >Edit CutOff Marks</label>
                </div>
                <input type="hidden" name="id" value="<?php echo $data['cutoffId'];?>">
                <div class="col-sm-4 form-group">
                    <label for="inputEmail">College Names</label>
                    <select tabindex="9" class="form-control input-lg" id="clgName" name="clgName" onChange="getCollege(this.value);">
                    <option value="<?php echo $data['collegeId'];?>"><?php echo $data['collegeName'];?></option>
                    <?php include_once '../utility/collegeNames.php';?>
                    </select> 
                </div>

                <div class="col-sm-4 form-group">
                    <label for="inputEmail">Stream Names</label>
                    <select tabindex="9" class="form-control input-lg" id="StrName" name="StrName" onChange="getStreams(this.value);">
                    <option value="<?php echo $data['streamId'];?>"><?php echo $data['streamName'];?></option>   
                    </select>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="inputEmail">Category Name</label>
                    <select tabindex="9" class="form-control input-lg" id="CategoryName" name="CategoryName">
                    <option value="<?php echo $data['categoryId'];?>"><?php echo $data['categoryName'];?></option>
                    <?php include_once '../utility/category.php';?>
                    </select>
                </div>
          </div>
          <div class="row">
                <div class="col-sm-4 form-group">
                    <label for="inputEmail">Year</label>
                    <select tabindex="9" class="form-control input-lg" name="Year">
                    <option value="<?php echo $data['year'];?>"><?php echo $data['year'];?></option>
                          <option>2014</option>
                          <option>2015</option>
                          <option>2016</option>
                          <option>2017</option>
                    </select> 
                </div>
                <div class="col-sm-4 form-group">
                    <label for="inputEmail">CutOff Marks</label>
                    <input type="cutOff" class="form-control" name="cutOffMark" placeholder="Enter cutOff" value="<?php echo $data['cutoffMarks'];?>">
                </div>
                <div class="col-sm-4 form-group">

                </div>
          </div>
          <div class="row">
              
          </div>
          <div class="row">
                <div class="col-sm-4 form-group">
                    <input type="submit" class="btn-success btn-lg" value="Save" tabindex="4">
                </div>
                <div class="col-sm-4 form-group">
                    <input type="submit" class="btn-success btn-lg" value="clear" tabindex="4">
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
            $('form[name=UpdatecutOff]').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    cache: false,
                    url: '../DAO/UpdatecutOff.inc.php',
                    data: $(this).serialize(),
                    dataType: "text",
                    success: function(data){
                        alert(data);
                        $('#UpdatecutOff')[0].reset();
                    }
                });
            });
        });


        function getCollege(val) {
            $.ajax({
            type: "POST",
            url: "../utility/streamName.php",
            data:'clgName='+val,
            success: function(data){
                $("#StrName").html(data);
            } 
            });
        }

/*        function getStreams(val) {
            $.ajax({
            type: "POST",
            url: "category.php",
            data:'StrName='+val,
            success: function(data){
                $("#CategoryName").html(data);
            }
            });
        }*/

        function showMsg()
        {

            $("#msgC").html($("#College-list option:selected").text());
            $("#msgS").html($("#Stream-list option:selected").text());
            return false;
        }

    </script>  