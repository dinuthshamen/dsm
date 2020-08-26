<?php include('server.php');
include('header.php');
 ?>
<?php
/*
Author: dinuth shamen
*/

$status = '';

$vehno = $_GET['vno'];
function fill_Vehical($con)  
 {  
      $output = '';  
      $sql = "SELECT * FROM Vehical";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
         
           $output .=     ' <li><a href="?vno='.$row["Vno"].'">'.$row["Vno"].'</a></li>';  

      }  
      return $output;  
 }  
 
 function fill_jobtypes($con)  
 {  
      $output = '';  
      $sql = "SELECT * FROM service_types";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
         
           $output .=     '<option value="'.$row["type_id"].'">' .$row["type_name"]. ' </option>';  

      }  
      return $output;  
 }  
 date_default_timezone_set('Asia/Colombo');
 $jobid = date("ymdHis"). "\n";
 

?>


        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>  <i class="fa fa-briefcase" style="font-size:30px;"></i> Create Job</h2> 
                    </div>
                </div> 

<hr>

                <?php include('errors.php'); ?>	
                <?php include('success.php'); ?>

		
	
                <div class="row">
                    <div class="col-lg-2 col-md-3">
                        <div class="form-group">
                            <label>Vehical No</label>
                           <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown"  >
                                    
                                    <?php if ($veno = $_GET['vno']) {
                                        echo $veno; 
                                    } else {
                                        echo "Select Vehical No";
                                        
                                        }  ?> 
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu scrollable-menu" role="menu" >
                                        <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                        <?php echo fill_Vehical($con);?>
                                        </ul>
                                       
                             </div>
                            
                             </div>             
          	 
                    </div>
                    <?php


$sql = mysqli_query($con,"select Vno,description,milage,c.cus_id,c.title,c.fname,c.lname,m.modelname from vehical v inner join customer c on v.Vowner = c.cus_id inner join vmodel m on v.vmodel = m.vmid Where Vno='$vehno'");

foreach($sql as $row){

?>
                    
                    
                    <div class="col-lg-2 col-md-3">
                        <label>Owner</label>
                        <input id="vehno" class="form-control" name="nfno" value="<?php echo $row["fname"]; ?> <?php echo $row["lname"]; ?>" readonly   type="text">
                       
                    </div>
                  
                    <div class="col-lg-3 col-md-4">
                        <div class="form-group">
                            <label>Vehical Model</label>
                            <input type="text" id="fveno"  class="form-control" name="fno"  value="<?php echo $row["modelname"]; ?>" readonly >
						 
                        </div>
                    </div>
                   
           </div>  

           <div class="row">  
                <div class="col-lg-6 col-md-6">
				  <label>Vehical Description</label>
				  <div class="form-group">
				 	<p><?php echo $row["description"]; ?> </p>
					</div>
					</div>
					
                    <?php }  ?>		
					
                </div> 
                <a href="#myModal" data-toggle="modal" ><span class="glyphicon glyphicon-calendar"></span> Service History</span></a>
                  <hr>
                

               



                <form method="post" name="myForm" action="" onsubmit="return validateForm()" >
                    <h3> Job id ( <?php echo  $jobid ?> ) </h3>
			 <div class="row">

                        <div class="col-lg-4 col-md-4">
                                <label>Service Type</label>
                                <select id="vtype"  class="form-control" name="service_type" class="dropdown_item_select"  >
                                <?php echo fill_jobtypes($con);?>
                                
                                </select>
                        </div>


                        <div class="col-lg-3 col-md-4">
                        
                                <div class="form-group">
                                <label>Current Milage(KMPH)</label>
                                        <input id="milage" type="Number" class="form-control" name="service_milage" type="text"  required  />
                                        <input type="hidden" value="<?php echo $vehno ?>" id="vehical_no"  name="vehical_no"  class="form-control" required />
                                        <input type="hidden" value="<?php echo $jobid ?>" id="job_id"  name="job_id"  class="form-control" required />
                                </div>
                        </div>

</div>

                <div class="row">
					<div class="col-lg-7 col-md-4">
                    <label>Description</label>
                    <textarea style="width:100%;" name="service_desc"  id="service_desc" required></textarea>
                    </div>
                </div>

                <div class="row">
                        <div class="col-lg-7 col-md-4">
                        <label>Extra Services </label>
                    </div>
                </div>


                <div class="row">
                        <div class="col-lg-7 col-md-4">
                 <?php     

                    $sql = "SELECT * FROM extra_services";  
                    $result = mysqli_query($con, $sql);  
                    while($row = mysqli_fetch_array($result))  
                    {  

                        
                        echo '​<label class="checkcontainer">'.$row["es_name"].'
                        <input type="checkbox"  name="'.$row["es_id"].'">
                        <span class="checkmark"></span>
                        </label>';
                        
                        
                        
                        
                        // echo '
                        // <input  type="checkbox" id="gridCheck" name="'.$row["es_id"].'">
                        // <label class="form-checkcontainer" for="gridCheck">
                        // '.$row["es_name"].' |
                        // </label> 
                        // ';
                    }  

                    ?>
                   
                </div>
                </div>
                <div class="row"> 
                <div class="col-lg-7 col-md-4">
                    <label>Collectings </label>
                </div>
                </div>

                    <div class="row">  
                    <div class="col-lg-7 col-md-4">  
                        <label for="primary" class="btn btn-primary">Helmat <input type="checkbox" id="primary" name="helmat" class="badgebox"><span class="badge">&check;</span></label>
                        <label for="info" class="btn btn-info">Carpet <input type="checkbox" id="info" name="carpet" class="badgebox"><span class="badge">&check;</span></label>
                        <label for="success" class="btn btn-success">keyset <input type="checkbox" id="success" name="keyset" class="badgebox"><span class="badge">&check;</span></label>
                        <label for="warning" class="btn btn-warning">Other <input type="checkbox" id="warning" name="other" class="badgebox"><span class="badge">&check;</span></label>
                        
                                
                                
                    </div> 
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-3">
                <br>
                <button type="submit" class="btn btn-danger btn-lg btn-block " name="create_job"><span>Submit</span></button><a href="job_status_manage.php">Go to job status</a>

                
                </div>
               
                   
				</form>  
                 </div>
            </div>
        </div>




        
    <div class="footer">
      
    
             <div class="row">
                <div class="col-lg-12" >
                    &copy;  2020 DS software engineering works | Design by: <a href="dssoftwareengineering.lk" style="color:#fff;"  target="_blank">www.dsnetworks.com</a>
                </div>
            </div>
    </div>


<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">

        <!-- Modal content-->
    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Service History.</h4>
            </div> 
        <div class="modal-body">
            <div class="adv-table editable-table table-responsive">
                <table class="table table-striped table-bordered table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Service Type</th>
                                    <th>service millage</th>
                                    <th>Description</th>

								</tr>
                            </thead>
							
							<tbody>
							
							

                            <?php


                                    $sql = mysqli_query($con,"select job_id,date_time,ve_no,service_type,description,service_millage,c.type_name from service_job v inner join service_types c on v.service_type = c.type_id  Where ve_no='$vehno' ORDER BY date_time DESC LIMIT 5 ");

                                    foreach($sql as $row){

                                    ?>
                                    <tr>
                                                                <td><?php echo $row["job_id"]; ?></td>
                                                                <td><?php echo $row["date_time"]; ?></td>
                                                                <td><?php echo $row["type_name"]; ?></td>
                                                                <td><?php echo $row["service_millage"]; ?></td>
                                                                <td><?php echo $row["description"]; ?></td>
                                                                </tr>
                                    <?php } ?>		
                                  
                            
							</tbody>
				</table>
            </div>

        </div>

    </div>
</div>
</div>

<script src="assets/js/custom.js"></script>
    <script src="jscript/dataselect.js"></script>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".dropdown-menu li").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


<script>
function validateForm() {
  var veno = document.forms["myForm"]["vehical_no"].value;
 

  
  if (veno == "") {
    alert("Vehical is required");
    return false;
  }
  

}
</script>
</body>
</html>
