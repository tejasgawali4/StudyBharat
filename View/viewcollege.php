<?php 

include_once('header.php')

?>

 <div class="row-fluid">
    <div class="span12" onTablet="span12" onDesktop="span12" style="text-align : center;">
            <h1>View Colleges</h1>
    </div>
    </div>
        <div class="row-fluid sortable">        
                <div class="span12">
                    <div class="box-content">
                        <table id="clg" class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                  <tr>
                                      <th>College Id</th>
                                      <th>College Name</th>
                                      <th>College Address</th>
                                      <th>College Pincode</th>
                                      <th>College City</th>
                                      <th>College Tel</th>
                                      <th>College Email</th>
                                      <th>College Website</th>
                                      <th><a href="#">Edit</a></th>
                                  </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>  
        </div>
    </div><!--/.fluid-container-->
    </div><!--/#content.span10-->
    </div><!--/fluid-row-->
    
    <div class="clearfix"></div>

<?php 
    include_once('footer.php');

?>
 <script type="text/javascript">
        $(document).ready(function()
        {   
            $.ajax({
                        url: '../DAO/viewCandidate.inc.php',
                        type: 'POST',
                        dataType: 'json',
                        success: function(data)
                        { 
                            if(data.length > 0)
                            {
                                var tab = $('#clg').DataTable();
                                    tab.clear();
                                    
                                for (var i = 0; i < data.length; i++)
                                {                                    
                                    tab.row.add([
                                      data[i].collegeId,
                                      data[i].collegeName,
                                      data[i].collegeAddress,
                                      data[i].collegePincode,
                                      data[i].collegeCity,
                                      data[i].collegeTel,
                                      data[i].collegeEmail,
                                      data[i].collegeWebsite,
                                      '<a href="#" onclick="show_page('+data[i].collegeId+')"><button class="btn-danger btn-lg">Edit</button></a>'
                                    ] ).draw();
                                }
                            }
                        }
                });
        });
 
        function show_page(id)
        {
          window.location.href="../View/EditCollege.php?id="+id;
        }
    </script>