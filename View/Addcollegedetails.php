<?php 

include_once('header.php')

?>
<form name="addclg" method="POST">
    <div class="container jumbotron">
          <div class="row">
                <div class="col-sm-12 form-group btn-danger">
                    <label >Add College Details</label>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="clgid">College Id</label>
                    <input type="text" class="form-control" id="collgeId" placeholder="Auto Enter college Id" readonly>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="clgName">College Name</label>
                    <input type="text" class="form-control" id="collegeName" name="collegeName" placeholder="Enter college Name">
                </div>
                <div class="col-sm-4 form-group">
                    <label for="Address">Address</label>
                    <input type="text" class="form-control" id="collegeAddress" name="collegeAddress" placeholder="Enter Address">
                </div>
          </div>
          <div class="row">
                <div class="col-sm-4 form-group">
                    <label for="Pincode">Pincode</label>
                    <input type="text" class="form-control" id="clgPincode" name="clgPincode" placeholder="Enter Pincode">
                </div>
                <div class="col-sm-4 form-group">
                    <label for="City">City</label>
                    <select tabindex="9" class="form-control input-lg" name="collegeCity">
                    <?php include_once '../utility/city.php'; ?>
                    </select>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="Tel">Telephone</label>
                    <input type="text" class="form-control" id="collegeTel" name="collegeTel" placeholder="Enter Telephone">
                </div>
          </div>
          <div class="row">
                <div class="col-sm-4 form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" id="collegeEmail" name="collegeEmail" placeholder="Enter Email">
                </div>
                <div class="col-sm-4 form-group">
                    <label for="Website">Website</label>
                    <input type="text" class="form-control" id="collegeWebsite" name="collegeWebsite" placeholder="Enter Website URL">
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
            $('form[name=addclg]').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    cache: false,
                    url: '../DAO/AddCollege.inc.php',
                    data: $(this).serialize(),
                    dataType: "text",
                    success: function(data){
                        alert(data);
                        $('#addclg')[0].reset();
                    }
                });
            });
        });

    </script>  