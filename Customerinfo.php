<?php include('header.php'); 
$groupid=$_SESSION['groupid'];
$sql = "SELECT *  FROM group_permission WHERE group_id=$groupid";  
$result = mysqli_query($con, $sql);  
while($row5 = mysqli_fetch_array($result))  
{  
   $accesval= $row5["customeronfo"];

   if ($accesval==0 )  {
    header('location: error.php');
     
   }
}
?>


        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2><i class="fa fa-comments-o fa-2x"></i>  Customer Informations</h2>   
                     <h5>Home/Customer-Informations</h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
              
                  <!-- /. ROW  --> 
                            <div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="customer_register.php" >

 <i class="fa fa-users fa-5x"></i>
                      <h4>Add New Customer</h4>
                      </a>
                      </div>
                     
                     
                  </div> 
                 
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="customer_list.php" >
                           <i class="fa fa-users fa-5x"></i>
                      <h4>Registered Customers</h4>
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
