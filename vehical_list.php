<?php include 'db.php';
include('header.php');
include('server.php');

?>
 
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                    <h1> <i class="fa fa-automobile" style="font-size:30px;"></i> Vehical Register </h1>   
                    </div>
                    <?php include('errors.php'); ?>	
                <?php include('success.php'); ?>
              
           

                </div> 
                <hr>
                <div class="col-md-5"> 
               
                <!-- Search form -->
                <input class="form-control" type="text" id="myInput"  onkeyup="search()" placeholder="Search by Vehical No" aria-label="Search">
                <br>    
            </div>
            <div class="adv-table editable-table table-responsive">
                <table class="table table-striped table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Vehical No</th>
                                    <th>Name</th>
                                    <th>Vehical Model</th>
                                    <th>Description</th>
                                    <th>Last Service Milage</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                
</div>	
<?php   // generating Main Categories
$count = 0;
$query = mysqli_query($con,"select a.Vno,c.title,c.fname,c.lname,vt.typename,catname,modelname,description,milage,image,logo from vehical as a inner join customer as c on c.cus_id = a.Vowner inner join vtype as vt on a.vtype =vt.typeid inner join vcategory as vc on a.vcat =vc.catid inner join vmodel as vm on a.vmodel =vm.vmid");
foreach($query as $row){
	$count++;


?>
 <tr>
                                    <td><img src="<?php echo $row["logo"]; ?>"  width="50px;" height="50px"alt=""></td>
                                    <td><?php echo $row["Vno"]; ?></td>
                                   
                                    <td><?php echo $row["title"]; ?> <?php echo $row["fname"]; ?>   <?php echo $row["lname"]; ?></td>
                                    <td><?php echo $row["catname"]; ?>  <?php echo $row["typename"]; ?> <?php echo $row["modelname"]; ?></td>
                                    <td><?php echo $row["description"]; ?></td>
                                    <td><m1><?php echo $row["milage"]; ?></m1></td>
                                    <td>  <a href="#myModal<?php echo $row["Vno"]; ?>"  type="button"  class="btn btn-info" data-toggle="modal" ><span class="glyphicon glyphicon-camera"></span></a>
                                    <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-edit"> </a>
                                   
                                    <a href="#myModal2<?php echo $row["Vno"]; ?>"  type="button"  class="btn btn-danger" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span></span></a>
                                
                                </td>
                                   
                                
                                </tr>

                                <?php } ?>


</tbody>
                        </table>
                        </div>
<div id="rowcount" ></div>

<div class="col-lg-4 col-md-4"></div>
	<div class="col-lg-4 col-md-4"></div>					
<div class="col-lg-4 col-md-4">
			<a href="new_vehical.php" >Add  New Vehical</a></div>					
					
                  <hr />
              
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
        <div class="footer">
      
    
      <div class="row">
         <div class="col-lg-12" >
             &copy;  2020 DS software engineering works | Design by: <a href="dssoftwareengineering.lk" style="color:#fff;"  target="_blank">www.dsnetworks.com</a>
         </div>
     </div>
</div>
       
        <!-- Modal -->
        <?php   // generating Main Categories
$query = mysqli_query($con,"select a.Vno,c.title,c.fname,c.lname,vt.typename,catname,modelname,description,milage,image,logo from vehical as a inner join customer as c on c.cus_id = a.Vowner inner join vtype as vt on a.vtype =vt.typeid inner join vcategory as vc on a.vcat =vc.catid inner join vmodel as vm on a.vmodel =vm.vmid");
foreach($query as $rows){

?>
<div id="myModal<?php echo $rows["Vno"]; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Vehical Preview</h4>
            </div> <center>
            <img width="200px" height="200px" src="<?php  echo $rows["image"]; ?>" alt="Vehical Image" >
</center>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<div id="myModal2<?php echo $rows["Vno"]; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Confirmation.</h4>
            </div> 
            <div class="modal-body">
                <p>Are you sure want to delete? <stong><?php echo $rows["Vno"]; ?> </strong> </p>

                <form method="post" >	
                <input type="hidden" value="<?php echo $rows["Vno"]; ?>" id="vno"  name="vno"  class="form-control" required />

            </div>
             

            <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default" name="delete_vehical"><span>Yes</span></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
            </form>
        </div>

    </div>
</div>

<?php } ?>



     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="jscript/tablefilter.js"></script>
    
   
</body>
</html>
