<?php include('header.php'); 


$groupid=$_SESSION['groupid'];
$sql = "SELECT *  FROM group_permission WHERE group_id=$groupid";  
$result = mysqli_query($con, $sql);  
while($row5 = mysqli_fetch_array($result))  
{  
   $accesval= $row5["user_manage"];

   if ($accesval==0 )  {
    header('location: error.php');
     
   }

}  

?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2><i class="fa fa-user " style="font-size:48px"></i>   User Manage</h2> 
                     <h5>Home/User_manage</h5>    
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                
                  <!-- /. ROW  --> 
                            <div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="user_register.php" >
                           <i class="fa fa-user fa-5x"></i>
                      <h4>Add New User</h4>
                      </a>
                      </div>
                     
                     
                  </div> 
                 
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="#" >
                           <i class="fa fa-users fa-5x"></i>
                          
                      <h4>User Groups</h4>
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
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
