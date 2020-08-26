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

                    <h1> <i class="fa fa-print" style="font-size:30px;"></i> Payments Print </h1>   
                    </div>
                   	
               
               
                </div> 
                <hr>
                <div class="col-md-5"> 
               
                <!-- Search form -->
                <input class="form-control" type="text" id="myInput"  onkeyup="search()" placeholder="Search by Payment Number" aria-label="Search">
                <br>  
                <p> Show as non print Payments </p>  
            </div>
            <?php include('errors.php'); ?>	
                    <?php include('success.php'); ?>

                   
            <div class="adv-table editable-table table-responsive">
          
                <table class="table table-striped table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Receipt Number</th>
                                    <th> Date/Time</th>
                                    <th> Invoice No</th>  
                                    <th>Status</th>
                                    <th>Is printed</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                
</div>	
<?php   // generating Main Categories
 $countrow ==0;
$query = mysqli_query($con,"SELECT * from payment ORDER BY rec_no DESC");
foreach($query as $row){
   
	$countrow++;


?>
 <tr>
                                    <td><?php echo $countrow; ?></td>
                                    <td>REC-000<?php echo $row["rec_no"]; ?></td>
                                   
                                    <td><?php echo $row["date"]; ?> </td>
                                    <td>INV-000<?php echo $row["Invoice_no"]; ?></td>
                                   
                                   
                                    <td><center><?php  if ($row["is_cancelled"]==0){
                            echo '<center><button type="button" class="btn btn-success btn-xs">Active</button></center>';

                        }  else {
                            echo '<center><button type="button" class="btn btn-warning btn-xs">Cancelled</button></center>';

                        }?></center></td>
                                    <td><?php  if ($row["is_print"]==0){
                            echo '<center><button type="button" class="btn btn-danger btn-xs">No</button></center>';

                        }  else {
                            echo '<center><button type="button" class="btn btn-warning btn-xs">Yes</button></center>';

                        }?>
                                
                                
                                </td>
                                    <td>  
                                    <a href="reports/payment_report.php?rec_no=<?php echo $row['rec_no']?>"  target='blank' class="btn btn-info" type="button">Print <span class="glyphicon glyphicon-print"> </a>
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
       
     



     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="jscript/tablefilter.js"></script>
    <script type="text/javascript">
function FocusOnInput()
{
     document.getElementById("myInput").focus();
}
</script>
   
</body>
</html>
