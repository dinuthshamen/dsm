<?php include('server.php');
include('header.php');
 ?>
<?php
/*
Author: dinuth shamen
*/

$status = '';

$invno = $_GET['inv_no'];
function fill_Vehical($con)  
 {  
      $output = '';  
      $sql = "select a.invoice_no,a.date_time,a.job_id,a.amount,a.outstanding,a.is_done,a.discount,e.full_name,a.is_print,a.is_cancelled,b.ve_no,c.Vowner,d.title,d.fname,d.lname,d.address1,d.address2,d.address3,d.email
      from invoice_header as a inner join service_job as b 
      on a.job_id = b.job_id 
      inner join vehical as c 
      on b.ve_no = c.Vno 
      inner join customer as d
      on c.Vowner = d.cus_id
      inner join user as e
      on a.user_name = e.user_name Where outstanding>0";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
         
           $output .=     ' <li><a href="?inv_no='.$row["invoice_no"].'"> INV-NO'.$row["invoice_no"].' - '.$row["ve_no"].'</a></li>';  

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
                     <h2>  <i class="fa fa-briefcase" style="font-size:30px;"></i> Payments</h2> 
                    </div>
                </div> 

<hr>

                <?php include('errors.php'); ?>	
                <?php include('success.php'); ?>

		
	
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <label>Invoice No</label>
                           <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown"  >
                                    
                                    <?php if ($invno = $_GET['inv_no']) {
                                        echo "INV-NO " .$invno; 
                                    } else {
                                        echo "Select Invoice No";
                                        
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


$sql = mysqli_query($con,"select a.invoice_no,a.date_time,b.description,a.job_id,a.amount,a.is_done,a.discount,e.full_name,a.is_print,a.is_cancelled,b.ve_no,c.Vowner,d.title,d.fname,d.lname,d.address1,d.address2,d.address3,d.email
from invoice_header as a inner join service_job as b 
on a.job_id = b.job_id 
inner join vehical as c 
on b.ve_no = c.Vno 
inner join customer as d
on c.Vowner = d.cus_id
inner join user as e
on a.user_name = e.user_name WHERE invoice_no='$invno'");

foreach($sql as $row){
    $vehno=$row["ve_no"];
?>
                    
                    
                    <div class="col-lg-2 col-md-3">
                        <label>Owner</label>
                        <input id="vehno" class="form-control" name="nfno" value="<?php echo $row["fname"]; ?> <?php echo $row["lname"]; ?>" readonly   type="text">
                       
                    </div>
                  
                    <div class="col-lg-3 col-md-4">
                        <div class="form-group">
                            <label>Vehical No</label>
                            <input type="text" id="fveno"  class="form-control" name="fno"  value="<?php echo $row["ve_no"]; ?>" readonly >

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
                  <?php


$sql = mysqli_query($con,"select a.invoice_no,a.date_time,a.job_id,a.outstanding,a.amount,a.is_done,a.discount,e.full_name,a.is_print,a.is_cancelled,b.ve_no,c.Vowner,d.title,d.fname,d.lname,d.address1,d.address2,d.address3,d.email
from invoice_header as a inner join service_job as b 
on a.job_id = b.job_id 
inner join vehical as c 
on b.ve_no = c.Vno 
inner join customer as d
on c.Vowner = d.cus_id
inner join user as e
on a.user_name = e.user_name WHERE invoice_no='$invno'");

foreach($sql as $row){

?>             

               



                <form method="post" name="myForm" action="" onsubmit="return validateForm()" >
                   
			 <div class="row">

                        <div class="col-lg-4 col-md-4">
                                <label>Invoice Amount</label>
                                <input id="Invoice_amount" type="text" value="<?php echo $row["amount"]; ?>" readonly class="form-control" name="invoice_amount" required  />
                        </div>
                        <div class="col-lg-4 col-md-4">
                                <label>Invoice Outstanding</label>
                                <input id="outst" type="text" value="<?php echo $row["outstanding"]; ?>" readonly class="form-control" name="" required  />
                        </div>


                       
</div>

<div class="row">
<div class="col-lg-4 col-md-4">
                        
                        <div class="form-group">
                        <label>Payed Amount</label>
                        <input id="pay" type="text" value="0.00" class="form-control" name="" required onfocusout="Function5()"  />
                                
                               
                        </div>
                </div>



</div>

<div class="row">
<div class="col-lg-4 col-md-4">
                        
                        <div class="form-group">
                        <label>Settled Amount</label>
                        <input id="payeed_amount" type="text" value="<?php echo $row["outstanding"]; ?>" class="form-control" name="payed_amount" required onfocusout="Function5()"  />
                                
                               
                        </div>
                </div>



</div>
<div class="row">
<div class="col-lg-4 col-md-4">
                        
                        <div class="form-group">
                        <label> Cash Balance Amount</label>
                        <input id="bal" type="text" value="0.00" class="form-control" name="" readonly  onfocusout="Function5()"  />
                                
                               
                        </div>
                </div>



</div>
<div class="row">
<div class="col-lg-4 col-md-4">
                        
                        <div class="form-group">
                        <label>Outstanding C/F Amount</label>
                        <input id="balance_amount" type="text" value="<?php echo $row["outstanding"]; ?>" readonly class="form-control" name="" required  />
                                <input type="hidden" value="<?php echo $invno; ?>" id="invno"  name="invno"  class="form-control" required />
                                <input id="balance_amount2" type="hidden" value=""  class="form-control" name="outstanding" required  />
                        </div>
                </div>



</div>
                <div class="row">
					<div class="col-lg-7 col-md-4">
                    <label>Description</label>
                    <textarea style="width:100%;" name="description"  id="service_desc" ></textarea>
                    </div>
                </div>

             
                 
                <div class="col-md-4">

                </div>
                <div class="col-md-3">
                <br>
                <button type="submit" class="btn btn-danger btn-lg btn-block " name="new_payment"><span>Submit</span></button>

                
                </div>
               
                   
				</form>  

<?php } ?>
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
                                    <th>Status Message</th>
                        

								</tr>
                            </thead>
							
							<tbody>
							
							

                            <?php


                                    $sql = mysqli_query($con,"select job_id,date_time,ve_no,service_type,description,status_message,service_millage,c.type_name from service_job v inner join service_types c on v.service_type = c.type_id  Where ve_no='$vehno' ORDER BY date_time DESC LIMIT 5 ");

                                    foreach($sql as $row){

                                    ?>
                                    <tr>
                                                                <td><?php echo $row["job_id"]; ?></td>
                                                                <td><?php echo $row["date_time"]; ?></td>
                                                                <td><?php echo $row["type_name"]; ?></td>
                                                                <td><?php echo $row["service_millage"]; ?></td>
                                                                <td><?php echo $row["description"]; ?></td>
                                                                <td><?php echo $row["status_message"]; ?></td>
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
function Function5()
{
    var z = document.getElementById('outst').value;
    var d = document.getElementById('payeed_amount').value;
    var r = document.getElementById('pay').value;
    var n =  z-d;
    var n1 =  r-d;
    var c = n.toFixed(2);
       
    document.getElementById('balance_amount').value = c;
    document.getElementById('balance_amount2').value = c;
    document.getElementById('bal').value = n1.toFixed(2);
    document.getElementById('payeed_amount').value = d.toFixed(2);    
    document.getElementById('pay').value = r.toFixed(2);   
}
</script>
</body>
</html>
