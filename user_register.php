<?php include('server.php');
include('header.php'); 


function fill_usergroups($con)  
{  
     $output = '';  
     $sql = "SELECT * FROM user_group";  
     $result = mysqli_query($con, $sql);  
     while($row = mysqli_fetch_array($result))  
     {  
        
          $output .=     '<option value="'.$row["group_id"].'">' .$row["group_name"]. ' </option>';  
        
     }  
     return $output;  
} 



?>

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>User Register </h2>   
                    </div>
                </div> 
				
                <?php include('errors.php'); ?>	
                <?php include('success.php'); ?>
               
				
				

<form method="post" action="user_register.php">				
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>User Name</label>
                            <input class="form-control" name="username"  required="required"  />
						  </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <label>Full name</label>
                        <input class="form-control" name="fullname"  required="required"  />
                    </div>
                   
                </div>
				 <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Phone No</label>
                            <input class="form-control" name="phone"  />
                        </div>
                    </div>
					  <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>User Group</label>
                            <select type=""class="form-control" name="group" class="dropdown_item_select"  required="required"   >
                            <?php echo fill_usergroups($con);?>
                          </select>
                        </div>
                    </div>
                </div>
					<div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label>Password</label>
                                <input  type="password" class="form-control" name="pass1"  required="required"   />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label>Re enter password</label>
                                <input  type="password" class="form-control" name="pass2"  />
                            </div>
                        </div>
					
					</div>
				<div class="row">
				<div class="col-lg-4 col-md-4"></div>
				<div class="col-lg-4 col-md-4">
                <button type="submit" class="btn btn-danger btn-lg btn-block" name="reg_user"><span>Register</span></button></div>
				
				</div>
				</form>
				
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
