<?php 
  
include_once('header.php')

?>

 <div class="row-fluid">
    <div class="span12" onTablet="span12" onDesktop="span12" style="text-align : center;">
            <h1>View CutOff</h1>
    </div>
    </div>
        <div class="row-fluid sortable">        
                <div class="span12">
                    <div class="box-content">
                        <table id="cuoff" class="table table-striped table-bordered bootstrap-datatable datatable">
                            <thead>
                                  <tr>
                                      <th>CutOff Id</th>
                                      <th>College Name</th>
                                      <th>Stream Name</th>
                                      <th>Category Name</th>
                                      <th>year</th>
                                      <th>cutoffMarks</th>
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
                        url: '../DAO/viewCutOff.inc.php',
                        type: 'POST',
                        dataType: 'json',
                        success: function(data)
                        { 
                            if(data.length > 0)
                            {
                                var tab = $('#cuoff').DataTable();
                                    tab.clear();
                                    
                                for (var i = 0; i < data.length; i++)
                                {                                    
                                    tab.row.add([
                                      data[i].cutoffId,
                                      data[i].collegeName,
                                      data[i].streamName,
                                      data[i].categoryName,
                                      data[i].year,
                                      data[i].cutoffMarks,
                                      '<a href="#" onclick="show_page('+data[i].cutoffId+')"><button class="btn-danger btn-lg">Edit</button></a>'
                                    ] ).draw();
                                }
                            }
                        }
                });
        });

        function show_page(id)
        {
          window.location.href="EditCutOff.php?id="+id;
        }
    </script>