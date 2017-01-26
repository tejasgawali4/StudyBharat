<?php 

include_once('header.php')

?>
<form name="AddcutOff" method="POST">
    <div class="container jumbotron">
            <div class="row">
                <div class="col-sm-12 form-group btn-danger">
                    <label >Add CutOff Marks</label>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="inputEmail">College Names</label>
                    <select tabindex="9" class="form-control input-lg" id="clgName" name="clgName" onChange="getCollege(this.value);">
                    <option>Select College Name</option>
                    <?php include_once '../utility/collegeNames.php';?>
                    </select> 
                </div>

                <div class="col-sm-4 form-group">
                    <label for="inputEmail">Stream Names</label>
                    <select tabindex="9" class="form-control input-lg" id="StrName" name="StrName" onChange="getStreams(this.value);">
                    
                    </select>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="inputEmail">Category Name</label>
                    <select tabindex="9" class="form-control input-lg" id="CategoryName" name="CategoryName">
                    <?php include_once '../utility/category.php';?>
                    </select>
                </div>
          </div>
          <div class="row">
                <div class="col-sm-4 form-group">
                    <label for="inputEmail">Year</label>
                    <select tabindex="9" class="form-control input-lg" name="Year">
                          <option>2014</option>
                          <option>2015</option>
                          <option>2016</option>
                          <option>2017</option>
                    </select>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="inputEmail">CutOff Marks</label>
                    <input type="cutOff" class="form-control" name="cutOffMark" placeholder="Enter cutOff">
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
            $('form[name=AddcutOff]').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    cache: false,
                    url: '../DAO/AddcutOff.inc.php',
                    data: $(this).serialize(),
                    dataType: "text",
                    success: function(data){
                        alert(data);
                        $('#AddcutOff')[0].reset();
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