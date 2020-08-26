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

                    <h1> <i class="fa fa-print" style="font-size:30px;"></i> Invoice Print </h1>   
                    </div>
                   	
               
               
                </div> 
                <hr>
                <div class="col-md-5"> 
               
                <!-- Search form -->
                <input class="form-control" type="text" id="myInput"  onkeyup="search()" placeholder="Search by Invoice Number" aria-label="Search">
                <br>  
                <p> Show as incompleted invoices </p>  
            </div>
            <?php include('errors.php'); ?>	
                    <?php include('success.php'); ?>

                   
            <div class="adv-table editable-table table-responsive">
          
                <table class="table table-striped table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Invoice Number</th>
                                    <th> Date/Time</th>
                                    <th> Job ID</th>  
                                    <th>Status</th>
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                
</div>	
<?php   // generating Main Categories
 $countrow ==0;
$query = mysqli_query($con,"select a.invoice_no,a.date_time,a.job_id,a.amount,a.discount,e.full_name,a.is_print,a.is_cancelled,b.ve_no,c.Vowner,d.title,d.fname,d.lname,d.address1,d.address2,d.address3,d.email
from invoice_header as a inner join service_job as b 
on a.job_id = b.job_id 
inner join vehical as c 
on b.ve_no = c.Vno 
inner join customer as d
on c.Vowner = d.cus_id
inner join user as e
on a.user_name = e.user_name where is_done=0");
foreach($query as $row){
   
	$countrow++;


?>
 <tr>
                                    <td><?php echo $countrow; ?></td>
                                    <td>INV-000<?php echo $row["invoice_no"]; ?></td>
                                   
                                    <td><?php echo $row["date_time"]; ?> </td>
                                    <td><strong> <?php echo $row["job_id"]; ?></strong></td>
                                   
                                   
                                    <td><center><?php  if ($row["is_cancelled"]==0){
                            echo '<center><button type="button" class="btn btn-success btn-xs">Active</button></center>';

                        }  else {
                            echo '<center><button type="button" class="btn btn-warning btn-xs">Cancelled</button></center>';

                        }?></center></td>
                                  
                                    <td>  
                                    <a href="Invoice.php?jobid=<?php echo $row['job_id']?>&invno=<?php echo $row['invoice_no']?>" class="btn btn-info" type="button">Edit <span class="glyphicon glyphicon-print"> </a>
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
