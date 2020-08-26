<?php include('header.php');
$groupid=$_SESSION['groupid'];
$sql = "SELECT *  FROM group_permission WHERE group_id=$groupid";  
$result = mysqli_query($con, $sql);  
while($row5 = mysqli_fetch_array($result))  
{  
   $accesval= $row5["sales"];

   if ($accesval==0 )  {
    header('location: error.php');
     
   }

} ?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                    <h2><i class="fa fa-clipboard" style="font-size:48px;"></i>  Sales Management</h2>  
                    <h5>Home/sale-management</h5> 
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                
                  <!-- /. ROW  --> 
                            <div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="Invoice.php" >
                           <i class="fa fa-clipboard" style="font-size:48px;"></i>
                      <h4>Create Invoice</h4>
                      </a>
                      </div>
                     
                     
                  </div> 
                 
                 
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="print_incinvoice.php" >
                           <i class="fa fa-clipboard" style="font-size:48px;"></i>
                      <h4>Incompleted Invoice</h4>
                      </a>
                      </div>
                     
                     
                  </div> 

                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="print_invoice.php" >
                    <i class="fa fa-print fa-5x"></i>
                      <h4>Invoice Print</h4>
                      </a>
                      </div>
                     
                     
                  </div>

                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="print_cinvoice.php" >
                    <i class="fa fa-print fa-5x"></i>
                      <h4>Completed Invoice List</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="new_payment.php" >
                    <i class="fa fa-clipboard fa-5x"></i>
                      <h4>New Payments</h4>
                      </a>
                      </div>
                     
                     
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="print_payment.php" >
                    <i class="fa fa-print fa-5x"></i>
                      <h4>Payments Print</h4>
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
