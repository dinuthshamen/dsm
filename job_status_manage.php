<?php include('server.php');
include('header.php'); 
?>
<?php 

$task_cref="";

function fill_user($con)  
{  
     $output = '';  
     $usg_id = $_session['groupid'];
     $sql = "SELECT * FROM user ";  
     $result = mysqli_query($con, $sql);  
     while($row = mysqli_fetch_array($result))  
     {  
        
          $output .=     '<option value="'.$row["user_name"].'">' .$row["full_name"]. ' </option>';  
        
     }  
     return $output;  
} 

?>
 
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                    <h1> <i class="fa fa-automobile" style="font-size:30px;"></i> Job Status Management </h1>   
                    </div>
                   	
               
               
                </div> 
                <hr>
                <div class="col-md-5"> 
               
                <!-- Search form -->
                <input class="form-control" type="text" id="myInput"  onkeyup="search()" placeholder="Search by job Id" aria-label="Search">
                <br>    
            </div>
            <?php include('errors.php'); ?>	
                    <?php include('success.php'); ?>
            <div class="adv-table editable-table table-responsive">
                <table class="table table-striped table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Job Id</th>
                                    <th> Date/Time</th>
                                    <th> Vehical No</th>  
                                    <th>Service Type</th>
                                    <th>Description</th>
                                    <th>Extra Services</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                
</div>	
<?php   // generating Main Categories
 $countrow ==0;
$query = mysqli_query($con,"select job_id,date_time,ve_no,type_name,description,service_millage,c.status,button,service_millage from service_job as a inner join job_status as c on c.status_id = a.status inner join service_types as b on b.type_id = a.service_type Where a.status < 9 ORDER BY date_time ASC ");
foreach($query as $row){
   
	$countrow++;


?>
 <tr>
                                    <td><?php echo $countrow; ?></td>
                                    <td><?php echo $row["job_id"]; ?></td>
                                   
                                    <td><?php echo $row["date_time"]; ?> </td>
                                    <td><strong> <?php echo $row["ve_no"]; ?></strong></td>
                                    <td><?php echo $row["type_name"]; ?></td>
                                    <td><center><a href="#modaldesc<?php echo $row["job_id"]; ?>"  type="button"  class="btn btn-primary btn-sm" data-toggle="modal" ><span class="glyphicon glyphicon-new-window"></span> View</span></a> </a></center></td>
                                    <td> <?php 

                                    $jobid=$row["job_id"];

                                    $query = mysqli_query($con,"SELECT COUNT(extra_service_id) FROM job_extra_services WHERE service_job_id=$jobid");
                                        foreach($query as $row2){
                                          $count=  $row2["COUNT(extra_service_id)"];
                                          
                                         if ($count>=1){
                                            echo  '<center><a href="#modalextra'.$row["job_id"].'"  type="button"  class="btn btn-info btn-xs" data-toggle="modal" ><span class="glyphicon glyphicon-new-window"></span>Included</span></a> </a></center>';
                                         } else{
                                            echo  '<center> <button type="button" class="btn btn-default btn-xs">Excluded</button></center>';
                                         }

                                        
                                        ?>  

                                          
                                    <?php } ?>                    
                                    </td>    
                                    <td><center><button type="button" class="<?php echo $row["button"]; ?>"><?php echo $row["status"]; ?></button></center></td>

                                    <td>  
                                    <?php 
                                     $groupid=$_SESSION['groupid'];
                                     $sql = "SELECT *  FROM group_permission WHERE group_id=$groupid";  
                                     $result = mysqli_query($con, $sql);  
                                     while($row5 = mysqli_fetch_array($result))  
                                     {  
                                        $accesval= $row5["job_status_change"];

                                        if ($accesval==1 )  {
                                            echo  '<a href="#statchange'.$row['job_id'].'" class="btn btn-primary" type="button"  data-toggle="modal"><span class="glyphicon glyphicon-check"> </a>';
                                          
                                        } else if ($accesval==0) {
                                          
                                                echo ' <a href="#access2'.$row["job_id"].'"class="btn btn-primary" type="button"  data-toggle="modal"><span class="glyphicon glyphicon-check"> </a>';
                                        }


                                        
                               
                                     }  
                                     ?>
                                   
                                   
                                    <a href="
                                    <?php 
                                    
                                        $groupid=$_SESSION['groupid'];
                                         $sql = "SELECT job_delete  FROM group_permission WHERE group_id=$groupid";  
                                         $result = mysqli_query($con, $sql);  
                                         while($row5 = mysqli_fetch_array($result))  
                                         {  
                                            $accesval= $row5["job_delete"];

                                            if ($accesval==1 )  {
                                                echo '#myModal2'.$row["job_id"];
                                                $task_cref="";
                                            } else if ($accesval==0) {
                                                $task_cref="Job-Delete";
                                                    echo '#access'.$row["job_id"];;
                                            }


                                            
                                   
                                         }  


                                       

                                     ?>"  type="button"  class="btn btn-danger" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span></span></a>
                                
                                </td>
                                   
                                
                                </tr>

                                <?php  } ?>


</tbody>
                        </table>
                        </div>
<div id="rowcount" ></div>

<div class="col-lg-4 col-md-4"></div>
	<div class="col-lg-4 col-md-4"></div>					

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
<?php } ?>





<?php   // generating Main Categories
$query = mysqli_query($con,"select * from service_job");
foreach($query as $rows){

?>
<div id="modaldesc<?php echo $rows["job_id"]; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Description</h4>
            </div> <center>
            <p><?php  echo $rows["description"]; ?></p>
</center>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<?php } ?>



<?php   // generating Main Categories
$query = mysqli_query($con,"select * from service_job");
foreach($query as $rows){

?>
<div id="modalextra<?php echo $rows["job_id"]; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Includes</h4>
            </div> <center>
            <?php  $id = $rows["job_id"];  // generating Main Categories
$query = mysqli_query($con,"select extra_service_id,es_name,b.description,service_job_id from job_extra_services as a inner join extra_services as b on a.extra_service_id=b.es_id WHERE service_job_id=$id");
foreach($query as $row){

?>
 <h4><li> <?php  echo $row["es_name"]; ?> </li></h4>

<?php } ?>
           
</center>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<?php } ?>

<?php   // generating Main Categories
$query = mysqli_query($con,"select * from service_job");
foreach($query as $rows){

?>
<div id="myModal2<?php echo $rows["job_id"]; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">


        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Confirmation.</h4>
            </div> 
            <div class="modal-body">
                <p>Are you sure want to delete? <stong><?php echo $rows["job_id"]; ?> </strong> </p>

                <form method="post" >	
                <input type="hidden" value="<?php echo $rows["job_id"]; ?>" id="job_id "  name="jobid"  class="form-control" required />

            </div>
             

            <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default" name="delete_job"><span>Yes</span></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
            </form>
        </div>

    </div>
</div>
<?php } ?>


<?php   // generating Main Categories
$query = mysqli_query($con,"select * from service_job");
foreach($query as $rows){

?>
<div id="statchange<?php echo $rows["job_id"]; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">


        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Status Manage.</h4>
            </div> 
            <div class="modal-body">
               

                <form method="post" >	
                <input type="hidden" value="<?php echo $rows["job_id"]; ?>" id="job_id "  name="jobid"  class="form-control" required />
                  <!-- Modal content-->
                
                  <?php   // generating Main Categories
                $query = mysqli_query($con,"select * from job_status");
                foreach($query as $ro){

                ?>
                  <label class="radiocontainer"><?php echo $ro["status"]; ?>
                    <input type="radio" value="<?php echo $ro["status_id"]; ?>" 
                    <?php $st= $ro["status_id"];
                    if ($st==$rows["status"]){

                        echo "checked";
                    }
                    
                    
                    ?> name="status">
                    <span class="checkmark"></span>
                    </label>
                    
                <?php } ?> 
               
                <textarea style="width:100%;" name="stat_message"  id="stat_message" required placeholder="Status Message"><?php echo $rows["status_message"]; ?></textarea>
                
                
                
                
                <!-- Modal content-->  
            </div>
             

            <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default" name="stat_change"><span>Save Changes</span></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>

    </div>
</div>
<?php } ?>


<?php   // generating Main Categories
$query = mysqli_query($con,"select * from service_job");
foreach($query as $rows){

?>

<div id="access<?php echo $rows["job_id"]; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">


        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Access denied!</h4>
            </div> 
            <div class="modal-body">
                <p>Sorry!!! You don't have access to this function. If you want to delete, create a task for the management user. <stong> </strong> </p>
                <form method="post" >	
               
                
                
                <div class="row">
                <div class="col-lg-6 col-md-4">
                        <div class="form-group">
                            <label>User </label>
                            <select type=""class="form-control" name="user" class="dropdown_item_select"  required="required"   >
                            <?php echo fill_user($con);?>
                          </select>
                        </div>
                    </div>
                    
                   
                <div class="col-lg-5 col-md-4">
                        <div class="form-group">
                            <label>Ref Id </label>
                            <input type="text" value=" <?php  echo " Job-Delete:"; echo $rows["job_id"]; ?>" id="ref "  name="ref"  class="form-control" readonly />
                        </div>
                    </div>
                    </div>


                    <div class="row">
                <div class="col-lg-11 col-md-4">
				  <label>Message</label>
                    <div class="form-group">
                    
                        <textarea style="width:100%;" name="message"  id="message" required></textarea>
                    </div>
				</div>
                </div>
               
              
            </div>
             

            <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default" name="create_task"><span>Send</span></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
            </form>
               
        </div>

    </div>
</div>
<?php } ?>

<?php   // generating Main Categories
$query = mysqli_query($con,"select * from service_job");
foreach($query as $rows){

?>

<div id="access2<?php echo $rows["job_id"]; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">


        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Access denied!</h4>
            </div> 
            <div class="modal-body">
                <p>Sorry!!! You don't have access to this function. If you want to delete, create a task for the management user. <stong> </strong> </p>
                <form method="post" >	
               
                
                
                <div class="row">
                <div class="col-lg-6 col-md-4">
                        <div class="form-group">
                            <label>User </label>
                            <select type=""class="form-control" name="user" class="dropdown_item_select"  required="required"   >
                            <?php echo fill_user($con);?>
                          </select>
                        </div>
                    </div>
                    
                   
                <div class="col-lg-5 col-md-4">
                        <div class="form-group">
                            <label>Ref Id </label>
                            <input type="text" value=" <?php echo "Status-Change:"; echo $rows["job_id"]; ?>" id="ref "  name="ref"  class="form-control" readonly />
                        </div>
                    </div>
                    </div>


                    <div class="row">
                <div class="col-lg-11 col-md-4">
				  <label>Message</label>
                    <div class="form-group">
                    
                        <textarea style="width:100%;" name="message"  id="message" required></textarea>
                    </div>
				</div>
                </div>
               
              
            </div>
             

            <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default" name="create_task"><span>Send</span></button>
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
