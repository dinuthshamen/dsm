<?php include('server.php');
include('header.php');
 
 
function vcategory($con)  
{  
     $output = '';  
     $sql = "SELECT * FROM vtype";  
     $result = mysqli_query($con, $sql);  
     while($row = mysqli_fetch_array($result))  
     {  
        
          $output .=     ' <option value="'.$row["typeid"].'">'.$row["typename"].'</option>';  

     }  
     return $output;  
} 

 ?>


        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>  <i class="fa fa-briefcase" style="font-size:30px;"></i> Inventory</h2> 
                     <h5>Home/Inventory</h5>    
                    </div>
                </div> 

<hr>

                <?php include('errors.php'); ?>	
                <?php include('success.php'); ?>

       
        <form method="post" name="invdetail" action=""  >
			 <div class="row">
             <div class="col-lg-3 col-md-4">
                        
                                <div class="form-group">
                                <label>Product Name</label>
                                        <input id="name" type="text" class="form-control" name="name" required />
                                      
                                </div>
                        </div>
                       
                        <div class="col-lg-1 col-md-4">
                        
                                <div class="form-group">
                                <label>Unit</label>
                                <select id="product"  class="form-control" name="unit" class="dropdown_item_select"  onchange="insert_amount()" >
                                <option value=""> --Select--   </option>
                                <option value="mm"> mm </option>
                                <option value="cm"> cm </option>
                                <option value="Foot"> Foot </option>
                                <option value="ml"> ml </option>
                                <option value="L"> L</option>
                                <option value="Nos"> Nos</option>
                                <option value="Module"> Module</option>
                                <option value=""> N/A</option>
                                </select>
                                </div>
                        </div>
                       
                        <div class="col-lg-2 col-md-4">
                        
                        <div class="form-group">
                        <label>Qty</label>
                                <input id="name" type="text" class="form-control" name="qty" required />
                              
                        </div>
                </div>
                <div class="col-lg-2 col-md-4">
                        
                        <div class="form-group">
                        <label>Cost Price</label>
                                <input id="name" type="text" class="form-control" name="cp" required />
                              
                        </div>
                </div>
                <div class="col-lg-2 col-md-4">
                        
                        <div class="form-group">
                        <label>Sales Price</label>
                                <input id="name" type="text" class="form-control" name="sp" required />
                              
                        </div>
                </div>

                        <div class="col-lg-1 col-md-4">
                        
                                <div class="form-group">
                                <label>Action</label>
                                
                             <button type="submit"  name="newproduct" class="btn btn-primary">--- Add ---</button>
                              
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
                                    <th> Product ID</th>
                                    <th> Product Name</th>
                                    <th> Unit</th>
                                    <th> Qty</th>
                                    <th> Cost Price</th>
                                    <th> Sales Price</th>
                                    <th> Created Date</th>
                                    
                                    <th> Action </th>
                            </thead>
                            <tbody id="detailstbody">
<?php
$count=0;
$sql = mysqli_query($con,"SELECT * from  inventory");
foreach($sql as $row){
    $count++; 
?> 


        <tr>
            <td><?php echo $count; ?>   </td>
            <td>IPR-00<?php echo $row['product_id']; ?>   </td>
            <td><?php echo $row['product_name']; ?>   </td>
            <td><?php echo $row['unit']; ?>   </td>
            <td><?php echo $row['qty']; ?>   </td>
            <td><?php echo $row['GRN_price']; ?>   </td>
            <td><?php echo $row['Sale_price']; ?>   </td>
            <td><?php echo $row['created_date']; ?>   </td>
           
           <td><center><a href="#myModal2<?php echo $row['product_id']; ?>"type="button"  class="btn btn-danger btn-sm" data-toggle="modal" ><span class="glyphicon glyphicon-trash"></span>  Delete</span></a> </a></center></td>
        
     
            </tr>
<?php } ?>
                            </tbody>
                </table>
                </div>
            </div> </div>
          
                  
           
            <br>
               
               
               
            </div>
        </div>




        
    <div class="footer">
      
    
             <div class="row">
                <div class="col-lg-12" >
                    &copy;  2020 DS software engineering works | Design by: <a href="dssoftwareengineering.lk" style="color:#fff;"  target="_blank">www.dsnetworks.com</a>
                </div>
            </div>
    </div>

    <?php
$count=0;
$sql = mysqli_query($con,"SELECT * from  inventory");
foreach($sql as $row){
    $count++; 
?> 
<div id="myModal2<?php echo $row['product_id']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">


        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Confirmation.</h4>
            </div> 
            <div class="modal-body">
                <p>Are you sure want to delete? <stong><?php echo $row['product_name']; ?> </strong> </p>

                <form method="post" >	
                <input type="hidden" value="<?php echo $row['product_id']; ?>"  name="id"  class="form-control" required />
            
            </div>
             

            <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-default" name="deleteproduct"><span>Yes</span></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
            </form>
        </div>

    </div>
</div>
<?php } ?>
    





<script src="assets/js/custom.js"></script>
<script src="jscript/dataselect.js"></script>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    




</body>
</html>
