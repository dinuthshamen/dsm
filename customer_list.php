<?php include 'db.php'; 
include('header.php'); ?>

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                     <h2>Customer Register </h2>   
                    </div>
                </div> 
 <div class="row">
                    <div class="col-lg-1 col-md-1">
					 <label>No</label>

					</div>
					 <div class="col-lg-2 col-md-2">
					 <label>Name</label>
					
					</div>
					 <div class="col-lg-2 col-md-2">
					 <label>Contact No</label>
			
					</div>
					 <div class="col-lg-2 col-md-2">
					 <label>Home Tp</label>
				
					</div>
					<div class="col-lg-2 col-md-2">
					 <label>Email</label>
					
					</div>
					<div class="col-lg-2 col-md-2">
					 <label>Edit or Delete</label>
					 <br>
				
					</div>
						
</div>	
<?php   // generating Main Categories
$count = 0;
$query = mysqli_query($con,"SELECT * FROM customer");
foreach($query as $row){
	$count++;


?>
<div class="row">
                    <div class="col-lg-1 col-md-1">
					
					<p> <?php echo $row["cus_id"]; ?> </p>
					
					</div>
					 <div class="col-lg-2 col-md-2">
				
					<p><?php echo $row["title"]; ?> <?php echo $row["fname"]; ?>  <?php echo $row["lname"]; ?></p>
					</div>
					 <div class="col-lg-2 col-md-2">
				
					<p> <?php echo $row["contact"]; ?>  </p>
					</div> 
					 <div class="col-lg-2 col-md-2">
				
					<p><?php echo $row["hometp"]; ?></p>
					</div>
					<div class="col-lg-2 col-md-2">
				
					<p> <?php echo $row["email"]; ?></p>
					</div>
					<div class="col-lg-2 col-md-2">
			<a href="customer_edit.php?eclistid=<?php echo $row["cus_id"]; ?>" class="btn btn-primary" > Edit </a>
					<a href="dataevent.php?rclistid=<?php echo $row["cus_id"]; ?>" class="btn btn-danger" > Remove </a> 
					</div>
					
			
</div>
<hr>		
<?php
						} ?>		
<div class="col-lg-4 col-md-4"></div>
	<div class="col-lg-4 col-md-4"></div>					
<div class="col-lg-4 col-md-4">
			<a href="customer_register.php" >Add  New Customer</a></div>					
					
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
