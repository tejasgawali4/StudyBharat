<?php 

include_once('header.php')
  
?>
<form role="form" name="AddCollegestream" method="POST">
    <div class="container jumbotron">
            <div class="row">
                <div class="col-sm-12 form-group btn-danger">
                    <label >Add College Streams</label>
                </div>

                <div class="col-sm-4 form-group">
                    <label for="inputEmail">College Names</label> 
                    <select class="form-control input-lg" name="college">
                    <?php include_once '../utility/collegeNames.php'; ?>
                    </select> 
                </div>

                <div class="col-sm-4 form-group">
                    <label for="inputEmail">Stream Names</label>
                    <select class="form-control input-lg" name="stream">
                    <?php include_once '../utility/streams.php'; ?>
                    </select>
                </div>

                <div class="col-sm-4 form-group">

                </div>
          </div>
                    <div class="row">
                <div class="col-sm-4 form-group">
                    <input type="submit" class="btn-success btn-lg" value="Save" tabindex="4">
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
            $('form[name=AddCollegestream]').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    cache: false,
                    url: '../DAO/Addclgstream.inc.php',
                    data: $(this).serialize(),
                    dataType: "text",
                    success: function(data){
                        alert(data);
                        $('#AddCollegestream')[0].reset();
                    }
                });
            });
        });



/*        function getStream()
        {
                $.ajax({
                      type: "POST",
                      url: "../utility/streamName.php",
                      data:'clgName='+val,
                      success: function(data){
                          $("#StrName").html(data);
                      } 
                });
        }*/
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