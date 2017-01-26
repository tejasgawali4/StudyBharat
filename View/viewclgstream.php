<?php 

include_once('header.php')
  
?>

 <div class="row-fluid">
    <div class="span12" onTablet="span12" onDesktop="span12" style="text-align : center;">
            <h1>View College Stream</h1>
    </div>
    </div>
        <div class="row-fluid sortable">        
                <div class="span12">
                    <div class="box-content">
                        <table id="clgstr" class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                  <tr>
                                      <th>college stream Id</th>
                                      <th>Stream Name</th>
                                      <th>College Name</th>
                                      <th><a href="#">Edit</a></th>
                                  </tr>
                            </thead>
                            
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
            //alert ("Your page is ready!");
            $.ajax({
                        url: '../DAO/viewclgstream.inc.php',
                        type: 'POST',
                        dataType: 'json',
                        success: function(data)
                        { 
                            
                            var t = $('#clgstr').DataTable();
                            if(data.length > 0)
                            {
                                
                            t.clear();
                        
                                for (var i = 0; i < data.length; i++)
                                {          
                                                       
                                    t.row.add([
                                      data[i].clgstrmId,
                                      data[i].collegeName,
                                      data[i].streamName,
                                      '<a href="#" onclick="show_page('+data[i].clgstrmId+')"><button class="btn-danger btn-lg">Edit</button></a>'
                                    ] ).draw();
                                
                                }
                            }
                        }
                });
        });

        function show_page(id)
        {
          window.location.href="../View/EditclgStream.php?id="+id;
        }
    </script>