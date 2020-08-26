<?php include('header.php'); 
$groupid=$_SESSION['groupid'];
$sql = "SELECT *  FROM group_permission WHERE group_id=$groupid";  
$result = mysqli_query($con, $sql);  
while($row5 = mysqli_fetch_array($result))  
{  
   $accesval= $row5["jobmange"];

   if ($accesval==0 )  {
    header('location: error.php');
     
   }
}
?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2> <i class="fa fa-briefcase"  style="font-size:48px;"></i>   Job Management</h2>  
                     <h5>Home/jobmanage</h5>    
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                
                  <!-- /. ROW  --> 
                            <div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="new_job_create.php" >
                           <i class="fa fa-automobile" style="font-size:48px;"></i>
                      <h4>Create New Job</h4>
                     
                      </a>
                      </div>
                     
                     
                  </div> 
                 
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="job_status_manage.php" >
                    <i class="fa fa-exchange fa-5x"></i>
                      <h4>Job Status Management</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="print_job.php" >
                    <i class="fa fa-print fa-5x"></i>
                      <h4>Print Jobs</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="print_cjob.php" >
                    <i class="fa fa-print fa-5x"></i>
                      <h4>Closed Jobs</h4>
                      </a>
                      </div>
                     
                     
                  </div>
            
                 <!-- /. ROW  -->   
				 
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
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
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
