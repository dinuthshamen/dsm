<?php include('server.php'); 

?>
<?php include('header.php'); ?>

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Customer Register </h2>   
                    </div>
                </div> 
<?php include('errors.php'); ?>	
<?php echo $_SESSION['success'] ?>	
<?php   // generating Main Categories
$count = 0;
$id = $_GET['eclistid'];
$query = mysqli_query($con,"SELECT * FROM customer WHERE cus_id=$id");
foreach($query as $row){
	$count++;


?>
<form method="post" action="customer_register.php">				
                <div class="row">
                    <div class="col-lg-2 col-md-4">
                        <div class="form-group">
                            <label>Title</label>
                           <select type=""class="form-control" name="title" class="dropdown_item_select"  required="required" selected="<?php echo $row["title"]; ?>"  >
                            <option value="Mr.">Mr.</option>
							<option value="Mrs.">Mrs.</option>
							<option value="Ms.">Ms.</option>
                          </select>
						  </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <label>First Name</label>
                        <input class="form-control" name="fname"  required="required"  value="<?php echo $row["fname"]; ?>" />
                    </div>
                    <div class="col-lg-3 col-md-4">
                    <label>Last Name</label>
                        <input class="form-control" name="lname"  required="required" value="<?php echo $row["lname"]; ?>"  />
                    </div>
                    <div class="col-lg-3 col-md-4">
                    <label>NIC</label>
                        <input class="form-control" name="nic" value="<?php echo $row["NIC"]; ?>"required="required"  />
                    </div>
                </div>
				 <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Address Line 01</label>
                            <input class="form-control" name="address1" value="<?php echo $row["address1"]; ?>"   />
                        </div>
                    </div>
					  <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Address Line 02</label>
                            <input class="form-control" name="address2" value="<?php echo $row["address2"]; ?>"  />
                        </div>
                    </div>
					<div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Address Line 03</label>
                            <input class="form-control" name="address3" value="<?php echo $row["address3"]; ?>"  />
                        </div>
                    </div>
					</div>
					<div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Contact No</label>
                            <input  type="phone" class="form-control" name="cno"  required="required"  value="<?php echo $row["contact"]; ?>"  />
                        </div>
                    </div>
					  <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Home TP</label>
                            <input  type="phone" class="form-control" name="hometp" value="<?php echo $row["hometp"]; ?>" />
                        </div>
                    </div>
					<div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            <input  type="email" class="form-control" name="email" value="<?php echo $row["email"]; ?>"/>
                        </div>
                    </div>
					</div>
					<input  type="hidden" class="form-control" name="id" value="<?php echo $id; ?>"/>
				<div class="row">
				<div class="col-lg-4 col-md-4"></div>
				<div class="col-lg-4 col-md-4">
			<a href="customer_list.php" class="btn btn-success btn-lg btn-block">Go to Customer List</a></div>
			
				<div class="col-lg-4 col-md-4">
				<button type="submit" class="btn btn-danger btn-lg btn-block" name="edit_customer"><span>Edit Submit</span></button>
				</div>
				</div>
				</form>
	<?php
						} ?>				
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
