<?php include('server.php');
include('header.php');
 ?>


        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>  <i class="fa fa-briefcase" style="font-size:30px;"></i> Add New Extra services</h2> 
                     <h5>Home/add-New-extra-services</h5>    
                    </div>
                </div> 

<hr>

                <?php include('errors.php'); ?>	
                <?php include('success.php'); ?>

       
        <form method="post" name="invdetail" action=""  >
			 <div class="row">

                       
                        <div class="col-lg-4 col-md-4">
                        
                                <div class="form-group">
                                <label>Service Name</label>
                                        <input id="name" type="text" class="form-control" name="name" required />
                                      
                                </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                        
                        <div class="form-group">
                        <label>Description</label>
                                <input id="name" type="text" class="form-control" name="desc" required />
                              
                        </div>
                </div>
                    

                        <div class="col-lg-1 col-md-4">
                        
                                <div class="form-group">
                                <label>Action</label>
                                
                             <button type="submit"  name="newes" class="btn btn-primary">--- Add ---</button>
                              
                                </div>
                        </div>

                </div>
            </form>
                



    <div class="row">
            <div class="col-lg-12 col-md-4">
                <div class="adv-table editable-table table-responsive">
                <table class="table table-striped table-bordered table-hover" id="detailtable" >
                        <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Category ID</th>
                                    <th> Category Name</th>
                                    <th> Description</th>
                                    <th> Action </th>
                            </thead>
                            <tbody id="detailstbody">
<?php
$count=0;
$sql = mysqli_query($con,"SELECT * from extra_services");
foreach($sql as $row){
    $count++; 
?> 


        <tr>
            <td><?php echo $count; ?>   </td>
            <td>ES-00<?php echo $row['es_id']; ?>   </td>
            <td><?php echo $row['es_name']; ?>   </td>
            <td><?php echo $row['description']; ?>   </td>
           <td><center><a href="#myModal2<?php echo $row['es_id']; ?>"type="button"  class="btn btn-danger btn-sm" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span>  Delete</span></a> </a></center></td>
        
     
            </tr>
<?php } ?>
                            </tbody>
                </table>
                </div>
            </div> </div>
          
                  
           
            <br>
               
               
               
            </div>
        </div>




        
    <div class="footer">
      
    
             <div class="row">
                <div class="col-lg-12" >
                    &copy;  2020 DS software engineering works | Design by: <a href="dssoftwareengineering.lk" style="color:#fff;"  target="_blank">www.dsnetworks.com</a>
                </div>
            </div>
    </div>

    <?php
$count=0;
$sql = mysqli_query($con,"SELECT * from extra_services");
foreach($sql as $row){
    $count++; 
?> 
<div id="myModal2<?php echo $row['es_id']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">


        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Confirmation.</h4>
            </div> 
            <div class="modal-body">
                <p>Are you sure want to delete? <stong><?php echo $row['es_name']; ?> </strong> </p>

                <form method="post" >	
                <input type="hidden" value="<?php echo $row['es_id']; ?>"  name="id"  class="form-control" required />
            
            </div>
             

            <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default" name="deletees"><span>Yes</span></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
            </form>
        </div>

    </div>
</div>
<?php } ?>
    





<script src="assets/js/custom.js"></script>
<script src="jscript/dataselect.js"></script>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    




</body>
</html>
