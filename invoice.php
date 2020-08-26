<?php include('server.php');
include('header.php');
 ?>
<?php
/*
Author: dinuth shamen
*/

$status = '';
$invoice_amount =0;
$jobid = $_GET['jobid'];
$invno = $_GET['invno'];
$vehno="";
$is_done=""; 





if ($jobid AND  $invno) {

$sql = "SELECT * FROM invoice_header WHERE invoice_no=$invno AND  job_id=$jobid";  
$result = mysqli_query($con, $sql); 
$countus = mysqli_num_rows($result); 

$sql1 = "SELECT * FROM invoice_header WHERE invoice_no=$invno ";  
      $result1 = mysqli_query($con, $sql1);  
      while($row = mysqli_fetch_array($result))  
      {  
         
        $is_done= $row['is_done'] ;  

      }


if ($countus==0){

    header('location: error.php');
}

}

function fill_Vehical($con)  
 {  
      $output = '';  
      $sql = "SELECT * FROM service_job WHERE closed=0 ";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
         
           $output .=     ' <li><a href="?jobid='.$row["job_id"].'">'.$row["job_id"].' - '.$row["ve_no"].'</a></li>';  

      }  
      return $output;  
 }  
 
 function fill_products($con)  
 {  
      $output = '';  
      $sql = "SELECT * FROM inventory ORDER BY product_name ASC";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
         
           $output .=     '<option value="'.$row["product_id"].'">'.$row["product_name"].' - ' .$row["qty"].' '.$row["unit"]. '</option>';  

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
                     <h2>  <i class="fa fa-briefcase" style="font-size:30px;"></i> Add New Invoice</h2> 
                    </div>
                </div> 

<hr>

                <?php include('errors.php'); ?>	
                <?php include('success.php'); ?>

		
	
                <div class="row">
                    <div class="col-lg-4 col-md-3">
                        <div class="form-group">
                            <label>Select Job id or Vehical Number</label>
                           <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown"  >
                                    
                                    <?php if ($jobid = $_GET['jobid']) {
                                        echo "Job id : $jobid" ; 
                                    } else {
                                        echo "Select Job id or Vehical Number";
                                        
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
$sql = mysqli_query($con,"select job_id,ve_no,Vowner,fname,lname,type_name,a.description
from service_job a 
inner join vehical b 
on a.ve_no = b.Vno 
inner join customer c 
on b.Vowner = c.cus_id
inner join service_types d 
on a.service_type = d.type_id    
Where job_id='$jobid' ");
foreach($sql as $row){
?>      
                    
                    <div class="col-lg-3 col-md-3">
                        <label>Customer Name</label>
                        <input id="vehno" class="form-control" name="nfno" value="<?php echo $row['fname'];?>  <?php echo $row['lname'];?>" readonly   type="text">
                       
                    </div>
                  
                    <div class="col-lg-2 col-md-4">
                        <div class="form-group">
                            <label>Vehical No</label>
                            <input type="text" id="fveno"  class="form-control" name="fno"  value="<?php $vehno =$row['ve_no'];  echo $row['ve_no'];?>" readonly >
                            <a href="#myModal3" data-toggle="modal" ><span class="glyphicon glyphicon-calendar"></span> Service History</span></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="form-group">
                            <label>Service Type</label>
                            <input type="text" id="fveno"  class="form-control" name="fno"  value="<?php echo $row['type_name'];?>" readonly >
						 
                        </div>
                    </div>
                    </div>
                      

           <div class="row">  
                    <div class="col-lg-11 col-md-4">
                        <div class="form-group">
                            <label>Description</label>
                           <p> <?php echo $row['description'];?> </p>
                        </div>
                    </div>
            

           
            <?php } ?>
            </div>


            <div class="row"> <div class="col-lg-5 col-md-4">    <label>Extra services </label> </div>   <div class="col-lg-11 col-md-4"> 
           
            <?php
$sql = mysqli_query($con,"select service_job_id,es_name
from job_extra_services a 
inner join extra_services b 
on a.extra_service_id = b.es_id     
Where service_job_id='$jobid' ");
foreach($sql as $row){
?>   

<button type="button" class="btn btn-success btn-xs"><?php echo $row['es_name'];?></button>

<?php } ?>   </div>
</div>
  <div class="row">  
  <div class="col-lg-8 col-md-4">
  <form method="post" name="myForm" action="" onsubmit=" return validateForm()" >
  <input type="hidden" value="<?php echo $jobid ?>" id="job_id"  name="job_id"  class="form-control"  />
 
</div>
  

           <div class="col-lg-3 col-md-4">
                        <div class="form-group">
                            <?php if ($invno) {
                      
                            }else{
                                echo  '<button type="submit" class="btn btn-primary btn-lg btn-block " name="new_invoice"><span>Add New Invoice</span></button>';
                            }
                            ?>
                        </div>
                    </div>
                </div> 
                </form>
                 
                
                <hr>
                 
   
        <form method="post" name="invdetail" action=""  >
                <div class="row">
                <div class="col-lg-8 col-md-4">
                        </div>
                    <div class="col-lg-3 col-md-4">
                    
                        <h3> <strong>Invoice No :000<?php echo $invno; ?> </strong></h3>
                    </div>
                </div>
			 <div class="row">

                        <div class="col-lg-3 col-md-4">
                                <label>Insert product</label>
                                <select id="product"  class="form-control" name="product_id" class="dropdown_item_select"  onchange="insert_amount()" >
                                <option value="0"> --Select--   </option>
                                <?php echo fill_products($con);?>
                                
                                </select>
                        </div>


                        <div class=" col-md-1">
                        
                                <div class="form-group">
                                <label>QTY</label>
                                        <input id="qty" type="text" class="form-control" name="service_milage" required  oninput="validateForm2()" />
                                        <input type="hidden" value="<?php echo $invno ?>" id="invoice_no"  name="invoice_no"  class="form-control"  />
                                        <input type="hidden" value="<?php echo $jobid ?>" id="job_id"  name="job_id"  class="form-control"  />
                                </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                        
                                <div class="form-group">
                                <label>Description</label>
                                        <input id="desc" type="text" class="form-control" name="desc" required  />
                                      
                                </div>
                        </div>
                        <div class="col-lg-2 col-md-4">
                        
                                <div class="form-group">
                                <label>Amount</label>
                                
                        <input id="pramount" type="text" class="form-control" name="amount" required oninput="validateForm3()" />
                                      
                                </div>
                        </div>

                        <div class="col-lg-1 col-md-4">
                        
                                <div class="form-group">
                                <label>Action</label>
                                
                                <?php  if($is_done==0) {

                                    echo '  <button type="button" id="insert" class="btn btn-primary">---Insert---</button>';
                                }
                              
                                    ?>  
                                </div>
                        </div>

                </div>
            </form>
                



    <div class="row">
            <div class="col-lg-12 col-md-4">
                <div class="adv-table editable-table table-responsive">
                <table class="table table-striped table-bordered table-hover" id="detailtable" >
                        <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Product Name</th>
                                    <th> Description</th>
                                    <th> QTY</th>  
                                    <th> Amount</th>  
                                    <?php if($is_done==0) { 
                                    echo '<th> Action</th> ';
                                    }?>
                                </tr>
                            </thead>
                            <tbody id="detailstbody">
                            <?php

$count=0;
$inv_val=0;

$sql = mysqli_query($con,"SELECT a.product_id,product_name,a.description,a.qty,a.amount from  invoice_details as a
inner join inventory as b on a.product_id = b.product_id  Where invoice_no=$invno ");
foreach($sql as $row){
    $count++;

    $inv_val += $row['amount'];
   
?> 


        <tr>
            <td><?php echo $count; ?>   </td>
            <td><?php echo $row['product_name']; ?>   </td>
            <td><?php echo $row['description']; ?>   </td>
            <td><?php echo $row['qty']; ?>   </td>
            <td><?php echo $row['amount']; ?>   </td>
        <?php if($is_done==0) { 
           echo '<td><center><a href="#myModal2'.$row['product_id'].'"type="button"  class="btn btn-danger btn-sm" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span>  Delete</span></a> </a></center></td>';
        }
       ?>
            </tr>
<?php } ?>
                            </tbody>
                </table>
                </div>
            </div> </div>
          
                  
            <div class="row">
                    <div class="col-lg-7 col-md-4"></div>
                    <div class="col-lg-5 col-md-4">
                            <h3 id="netamount"> Total Amount : Rs <?php $finv_val = number_format($inv_val, 2, '.', '');   echo $finv_val; ?> </h3>

                    </div>
                    
            </div>
            <br>
                <div class="col-md-7">

                </div>
               
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                    <?php  if($invno) {  if($is_done==0) { echo "<a href=' #myModal1'type='button'  id='SButton' class='btn btn-success btn-lg btn-block' data-toggle='modal' ><span class='glyphicon glyphicon-tasks'></span>  Submit</span></a> </a>";} } ?> 
                        
                    </div>
                    
                    <br>
            
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

    <?php   // generating Main Categories
$query = mysqli_query($con,"select * from inventory");
foreach($query as $rows){

?>
<div id="myModal2<?php echo $rows["product_id"]; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">


        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Confirmation.</h4>
            </div> 
            <div class="modal-body">
                <p>Are you sure want to delete? <stong><?php echo $rows["product_name"]; ?> </strong> </p>

                <form method="post" >	
                <input type="hidden" value="<?php echo $rows["product_id"]; ?>" id="product_id "  name="product_id"  class="form-control" required />
                <input type="hidden" value="<?php echo $invno; ?>" id="invoice_no "  name="invoice_no"  class="form-control" required />
                <input type="hidden" value="<?php echo $jobid; ?>" id="jobid "  name="jobid"  class="form-control" required />
            </div>
             

            <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default" name="delete_invoice_details"><span>Yes</span></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
            </form>
        </div>

    </div>
</div>
<?php } ?>
    
<div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">


        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Invoice Finalizing.</h4>
            </div> 
            <div class="modal-body">
               

            <form method="post" >
                <div class="row">
                    <div class="col-lg-6 col-md-4">
                       
                            <label>Invoice Amount </label>	
                            <input type="text" value="<?php $finv_val = number_format($inv_val, 2, '.', '');   echo $finv_val; ?>" id="Inv_amount"  name="Invoice_amount"  autofocus  class="form-control"  readonly />
                        
                    </div>
                </div>

           
           <div class="row">
                 <div class="col-lg-6 col-md-4">
                    <div class="form-group">
                        <label>Discount Amount </label>	
                         <input type="text" value="0.00" id="discount"  name="discount"  class="form-control" required  onfocusout="Function5()" onchange="validateForm4()" />
                         <input type="hidden" value="<?php echo $invno; ?>" id="inv_no"  name="inv_no"  class="form-control" required   />
                         <input type="hidden" value="<?php echo $jobid; ?>" id="Job_id"  name="Job_id"  class="form-control" required  />
                    </div>
                </div>

            </div>
            <div class="row">
                 <div class="col-lg-6 col-md-4">
                    <div class="form-group">
                        <label>Net Amount </label>	
                         <input type="text" value="<?php $finv_val = number_format($inv_val, 2, '.', '');   echo $finv_val; ?>" id="net_amount"  name="netamount"  class="form-control" readonly />
                    </div>
                </div>

            </div>
             

            <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default" name="save_invoice_details"><span>Yes</span></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
            </form>
        </div>

    </div>
</div> 
</div> 

<div id="myModal3" class="modal fade" role="dialog">
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
                                    <th>job ID</th>
                                    <th>Date</th>
                                    <th>Service Type</th>
                                    <th>service millage</th>
                                    <th>Description</th>
                                    <th>Status Message</th>

								</tr>
                            </thead>
							
							<tbody>
							
							

                            <?php

                                    $count=0;
                                    $sql = mysqli_query($con,"select job_id,date_time,ve_no,status_message,service_type,description,service_millage,c.type_name from service_job v inner join service_types c on v.service_type = c.type_id  Where ve_no='$vehno' ORDER BY date_time DESC LIMIT 5 ");

                                    foreach($sql as $row){
                                        $count++;
                                    ?>
                                    <tr>
                                                                <td><?php echo  $count; ?></td>
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
function validateForm() {

  var veno = document.forms["myForm"]["job_id"].value;
  if (veno == "") {
   alert("Job is required");
   return false;
 }
}

function validateForm2()
{

    var z = document.forms["invdetail"]["qty"].value;
    if(!z.match(/^\d+/))
        {
        alert("Please only enter numeric characters only for the Quantity")
        document.getElementById('qty').value = '';
        }
}

function validateForm3()
{

    var z = document.forms["invdetail"]["pramount"].value;
    if(!z.match(/^\d+/))
        {
          
        alert("Please only enter numeric characters only for the Amount")
        document.getElementById('pramount').value = '';
        }   
}

function validateForm4()
{

    var z = document.getElementById('discount').value;
    if(!z.match(/^\d+/))
        {
          
        alert("Please only enter numeric characters only for the Discount")
        document.getElementById('discount').value = '';
        }   
}

function Function5()
{
    var z = document.getElementById('Inv_amount').value;
    var d = document.getElementById('discount').value;
    var n =  z-d;
    var c = n.toFixed(2);
       
    document.getElementById('net_amount').value = c;
    document.getElementById('discount').value = d.toFixed(2);    
}

function insert_amount() {
	
    var z = document.getElementById("product").value;
    $.ajax({  
                  url:"load_data.php",  
                  method:"POST",  
                  data:{z:z},  
                  success:function(data){  
                   
                    document.getElementById('pramount').value =data;
                  }  
             });  
  }

</script>

<script>
$("#insert").click(function(){
  var qty = document.forms["invdetail"]["qty"].value;
  var amount = document.forms["invdetail"]["pramount"].value;
  var job_id = document.forms["invdetail"]["job_id"].value;
  var inv_no = document.forms["invdetail"]["invoice_no"].value;
  var product_id = document.forms["invdetail"]["product_id"].value;
  var desc = document.forms["invdetail"]["desc"].value;
  var product = document.forms["invdetail"]["product"].value;
  var x = 0;
  
  if (product == 0) {
    alert("Please insert product");
    return false;
  } 
  else if (amount == "") {
    alert("amount is required");
    return false;
  }  else if (job_id == "") {
    alert("Please add new Invoice");
    return false;
  } else if (inv_no == "") {
    alert("Please add new Invoice");
    return false;
  } 

  $.ajax({
                    url:'insert.php',
                    method:'POST',
                    dataType: 'JSON',
                    data:{
                        inv_no:inv_no,
                        product_id:product_id,
                        desc:desc,
                        qty:qty,
                        amount:amount
                        
                    },
                   success:function(response){
                    $("#detailstbody").empty();
                   
                    document.getElementById('pramount').value = '';
                    document.getElementById('desc').value = '';
                    document.getElementById('qty').value = '';


                    var len = response.length;
                   
                    for(var i=0; i<len; i++){
                               var productid = response[i].product_id;
                               var product_name = response[i].product_name;
                               var description = response[i].description;
                               var qty = response[i].qty;
                               var amount = response[i].amount;
                               var val = Number(amount);
                               
                               x += val;


                       var tr_str = "<tr>" +
                           "<td>" +  (i+1) + "</td>" +
                           "<td>" + product_name + "</td>" +
                           "<td>" + description + "</td>" +
                           "<td>" + qty + "</td>" +
                           "<td>" + amount + "</td>" +
                           "<td><center><a href='#myModal2"+ productid +"'type='button'  class='btn btn-danger btn-sm' data-toggle='modal' ><span class='glyphicon glyphicon-trash'></span>  Delete</span></a> </a></center> </td>" +
                           "</tr>";
                       
                       $("#detailtable tbody").append(tr_str);

                  }
                    var n = x.toFixed(2);
                    document.getElementById('Inv_amount').value = n;
                    document.getElementById('netamount').innerHTML = "Total Amount: RS " + n;
                    document.getElementById('net_amount').value = n;
                    document.getElementById('discount').value = 0.00;
                  
                }
                 
            });

 });



</script>


</body>
</html>
