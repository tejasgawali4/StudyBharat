<?php

include_once '../DAO/dbConnect.php';

$id=$_GET['id'];

$sql="SELECT `collegeId`, `collegeName`, `collegeAddress`, `collegePincode`, `collegeCity`, `collegeTel`, `collegeEmail`, `collegeWebsite` FROM `colleges` WHERE `collegeId`='$id'";

$result=mysqli_query($con,$sql);

$data=mysqli_fetch_array($result,MYSQLI_ASSOC);


include_once('header.php')

?>
<form name="updateclg" method="POST">
    <div class="container jumbotron">
          <div class="row">
                <div class="col-sm-12 form-group btn-danger">
                    <label >Edit College Details</label>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="clgid">College Id</label>
                    <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['collegeId'] ?>" readonly>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="clgName">College Name</label>
                    <input type="text" class="form-control" id="collegeName" name="collegeName" value="<?php echo $data['collegeName'] ?>">
                </div>
                <div class="col-sm-4 form-group">
                    <label for="Address">Address</label>
                    <input type="text" class="form-control" id="collegeAddress" name="collegeAddress" value="<?php echo $data['collegeAddress'] ?>">
                </div>
          </div>
          <div class="row">
                <div class="col-sm-4 form-group">
                    <label for="Pincode">Pincode</label>
                    <input type="text" class="form-control" id="clgPincode" name="clgPincode" value="<?php echo $data['collegePincode'] ?>"
>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="City">City</label>
                    <select tabindex="9" class="form-control input-lg" name="collegeCity">
                    <option value="<?php echo $data['collegeCity'] ?>"><?php echo $data['collegeCity'] ?></option>
                    <?php include_once '../utility/city.php'; ?>
                    </select>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="Tel">Telephone</label>
                    <input type="text" class="form-control" id="collegeTel" name="collegeTel" value="<?php echo $data['collegeTel'] ?>">
                </div>
          </div>
          <div class="row">
                <div class="col-sm-4 form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" id="collegeEmail" name="collegeEmail" value="<?php echo $data['collegeEmail'] ?>">
                </div>
                <div class="col-sm-4 form-group">
                    <label for="Website">Website</label>
                    <input type="text" class="form-control" id="collegeWebsite" name="collegeWebsite" value="<?php echo $data['collegeWebsite'] ?>">
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
            $('form[name=updateclg]').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    cache: false,
                    url: '../DAO/UpdateCollege.inc.php',
                    data: $(this).serialize(),
                    success: function(data){
                        alert(data);
                        $('#updateclg')[0].reset();
                    }
                });
            });
        });
    </script>  
