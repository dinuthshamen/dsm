<?php include('server.php') ?>
<?php
/*
Author: dinuth shamen
*/
include('db.php');
$status = '';
session_start(); 

function fill_customer($con)  
 {  
      $output = '';  
      $sql = "SELECT * FROM customer";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
         
           $output .=     '<option value="'.$row["cus_id"].'">'.$row["cus_id"]. ' - ' .$row["fname"].' '.$row["lname"]. ' </option>';  

      }  
      return $output;  
 }  
 
 function fill_vcat($con)  
 {  
      $output = '';  
      $sql = "SELECT * FROM vcategory";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
         
           $output .=     '<option value="'.$row["catid"].'">' .$row["catname"]. ' </option>';  

      }  
      return $output;  
 }  


 function fill_vtype($con)  
 {  
      $output = '';  
      $sql = "SELECT * FROM vtype WHERE catid=1";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
         
           $output .=     '<option value="'.$row["typeid"].'">' .$row["typename"]. ' </option>';  

      }  
      return $output;  
 }  
 
 
 function fill_model($con)  
 {  
      $output = '';  
      $sql = "SELECT * FROM vmodel WHERE typeid=1";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
         
           $output .=     '<option value="'.$row["vmid"].'">' .$row["modelname"]. ' </option>';  

      }  
      return $output;  
 }
 
include('header.php');

?>


        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Vehical Register </h2>   
                    </div>
                </div> 

<hr>

                <?php include('errors.php'); ?>	
               
                <?php 
               if (isset($_SESSION['success'])) {
                
               } {
               echo'<div class="row">
               <div class="col-lg-12 ">
                   <div class="alert alert-info">';
                      
               echo $_SESSION['success'];
               echo '</div> </div> </div>';
               }
               
            
?>

<form method="post" action="new_vehical.php">		
	
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Vehical Owner</label>
                           <select type=""class="form-control" name="owner" class="dropdown_item_select"     >
                           	<?php echo fill_customer($con);?>
                          </select>
						  </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <label>Vehical NO</label>
                        <input id="vehno" class="form-control" name="nfno" required   type="text" oninput="vnodem()">
						 <p class="help-block" id="veno" >NWBCR.</p>
                    </div>
                    <div class="col-lg-4 col-md-4">
                    <label>Formatted Vehical No</label>
                        <input type="text" id="fveno"  class="form-control" name="fno"  value="" readonly >		
										
                    </div>
                </div>
				
				<div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Vehical Category</label>
                           <select id="mySelect" class="form-control" name="vcat" class="dropdown_item_select" value="dd"  onchange="myFunction()"  >
						   <?php echo fill_vcat($con);?>
	
							 
						   </select>
						 
                        </div>
                    </div>
					   
					   <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Vehical type</label>
                           <select id="vtype"  class="form-control" name="vtype" class="dropdown_item_select" onchange="myFunction2()"  >
						   <?php echo fill_vtype($con);?>
						 
						</select>
                        </div>
                    </div>
					
					 <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>Vehical model</label>
                           <select id="vmodel"  class="form-control" name="vmodel" class="dropdown_item_select"    >
						   <?php echo fill_model($con);?>
						 
						</select>
                        </div>
					
                    </div>
					
				</div>
				 <div class="row">
				  <div class="col-lg-5 col-md-4">
				  <label>Description</label>
				  <div class="form-group">
				  
				 	<textarea style="width:100%;" name="desc"  id="desc" required></textarea>
					</div>
					</div>
					<div class="col-lg-4 col-md-4">
                        <label>Milage</label>
                        <input id="milage" type="Number" class="form-control" name="milage" type="text"  required  />
						 <input type="hidden" value="" id="image"  name="image"  class="form-control" required />
                    </div>
				 </div>
				
				 <div class="row">
				  <div class="col-lg-6 col-md-4">
                  	<form method='post' action='' enctype="multipart/form-data">
					Can't exceed 2Mb 
                    <input type="file" id='files' accept="image/*" capture="camera"  name="files[]" multiple onchange="Filevalidation()"><br>
					<input type="button" name="submitimg" id="submitimg" value=' Upload >>  '>
					    <div id='preview'></div>
						
					</form>
				</div>
              
				<div class="col-lg-4 col-md-2">
				
				<button type="submit" class="btn btn-danger btn-lg btn-block" name="add_vehical"><span>Submit</span></button><a href="Vehical_list.php">Go to Vehical List</a>
				</div>
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



    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="jscript/dataselect.js"></script>

<script type="text/javascript">

    $(document).ready(function(){

$('#submitimg').click(function(){
   
    var form_data = new FormData();

    // Read selected files
    var totalfiles = document.getElementById('files').files.length;
    for (var index = 0; index < totalfiles; index++) {
        form_data.append("files[]", document.getElementById('files').files[index]);
    }

    // AJAX request
    $.ajax({
        url: 'ajaxfile.php',
           type: 'post',
           data: form_data,
           dataType: 'json',
        contentType: false,
        processData: false,
        success: function (response) {
               
               for(var index = 0; index < response.length; index++) {
                var src = response[index];

                // Add img element in <div id='preview'>
                $('#preview').append('<img src="'+src+'" width="200px;" height="200px"> <p>'+src+'<p>' );
                document.getElementById("image").value = src;
        
            
                
            }
               
        }
    });
});
});

//calculate file size
Filevalidation = () => { 
const fi = document.getElementById('files'); 
// Check if any file is selected. 
if (fi.files.length > 0) { 
    for (const i = 0; i <= fi.files.length - 1; i++) { 

        const fsize = fi.files.item(i).size; 
        const file = Math.round((fsize / 1024)); 
        // The size of the file. 
        if (file >= 3072) { 
            alert( 
              "File too Big, please select a file less than 3mb"); 
              document.getElementById('files').value = "";
        } else if (file < 10) { 
            alert( 
              "File too small, please select a file greater than 100kb"); 
              document.getElementById('files').value = "";
        } else { 
            document.getElementById('size').innerHTML = '<b>'
            + file + '</b> KB'; 
        } 
    } 
} 
} 


$("form").on("change", ".file-upload-field", function(){ 
    $(this).parent(".file-upload-wrapper").attr("data-text",         $(this).val().replace(/.*(\/|\\)/, '') );
});
</script> 
</body>
</html>
