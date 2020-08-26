<?php include('server.php') ?>
<?php
/*
Author: dinuth shamen
*/
include('db.php');
$status = '';
session_start(); 


$cusparaid = $_GET['cusid'];
function fill_customer($con)  
 {  
      $output = '';  
      $sql = "SELECT * FROM customer";  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
            
           $output .=     ' <li><a href="?cusid='.$row["cus_id"].'">'.$row["cus_id"]. ' - ' .$row["fname"].' '.$row["lname"].'</a></li>';  
           
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
                     <h2><i class="fa fa-taxi" style="font-size:30px;"></i> Vehical Register </h2>   
                    </div>
                </div> 

<hr>

                <?php include('errors.php'); ?>	
                <?php include('success.php'); ?>
             
            

<form method="post" action="new_vehical.php" name="myForm" onsubmit="return validateForm()">		
	
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                    <label>Customer Details</label>
                        <div class="form-group">
                            <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" required type="button" data-toggle="dropdown"  >
                                       
                                        <?php if ($cusparaid==""){
                                           echo "Find Customer";

                                        }else{
                                            
                                            $sql = "SELECT * FROM customer WHERE cus_id=$cusparaid";  
                                            $result = mysqli_query($con, $sql);  
                                            while($row = mysqli_fetch_array($result))  
                                            {  
                                                  
                                                 echo $row["cus_id"]. ' - ' .$row["fname"].' '.$row["lname"]. ' - ' .$row["NIC"];  
                                                 
                                            }  
                                        }  ?>


                                    
                                            <span class="caret"></span></button>
                                            <ul class="dropdown-menu scrollable-menu" role="menu" >
                                            <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                            <?php echo fill_customer($con);?>

                                            </ul>
                                       
                             </div>
                            
						  </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <label>V NO (NW-AAA-5555)</label>
                        <input id="vehno" class="form-control" name="nfno"    type="text" oninput="vnodem()">
                        <input id="owner" class="form-control" name="owner"   Value="<?php echo $cusparaid ?>"  type="hidden">
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <label>V NO (000-5555)</label>
                        <input id="vehno2" class="form-control" name="nfno3"    type="text" oninput="vnodem2()">
						
                    </div>
                    <div class="col-lg-4 col-md-4">
                    <label>Formatted Vehical No</label>
                        <input type="text" id="fveno"  class="form-control" name="fno"  required value="" readonly >		
										
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
				  
				 	<textarea style="width:100%;" name="desc"  id="desc" ></textarea>
					</div>
					</div>
					<div class="col-lg-3 col-md-4">
                        <label>Milage</label>
                        <input id="milage" type="Number" class="form-control" name="milage" type="text"  required  />
						 <input type="hidden" value="" id="image"  name="image"  class="form-control" required />
                    </div>
				 </div>
				
                 <div class="row">
				  <div class="col-lg-8 col-md-4">
                  	<form method='post' action='' enctype="multipart/form-data">
					Can't exceed 2Mb 
                   
                    <div class="input-group">
                    <div class="custom-file">
                    <input type="file"  id='files' accept="image/*" capture="camera"  name="files[]" multiple onchange="Filevalidation()"><br>
					<input type="button" class="btn btn-primary" name="submitimg" id="submitimg" value=' Upload >>  '>
					    <div id='preview'></div>
                    </div>
					</div>	
					</form>
                    <br>
				</div>

                <div class="col-lg-4 col-md-2">
                               
                        </div>
                        <div class="col-lg-4 col-md-2">
                                <button type="submit" class="btn btn-danger btn-lg btn-block" name="add_vehical"><span>Submit</span></button><a href="Vehical_list.php">Go to Vehical List</a>
                        </div>
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



    <script src="assets/js/jquery-1.10.2.js"></script>
  
    <script src="assets/js/custom.js"></script>
    <script src="jscript/dataselect.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


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
                $('#preview').append('<br><img src="'+src+'" width="200px;" height="200px"> <p>'+src+'<p>' );
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
        const file = Math.round((fsize / 1024 /1024)); 
        // The size of the file. 
        if (file >= 3) { 
            alert( 
              "File too Big, please select a file less than 3mb"); 
              document.getElementById('files').value = "";
        }  else { 
            document.getElementById('size').innerHTML = '<b>'
            + file + '</b> KB'; 
        } 
    } 
} 
} 

$(function() {
  $('input[type=file]').change(function(){
    var t = $(this).val();
    var labelText = 'File : ' + t.substr(12, t.length);
    $(this).prev('label').text(labelText);
  })
});

</script> 
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
  var nfo = document.forms["myForm"]["fveno"].value;
  var own = document.forms["myForm"]["owner"].value;

  
  if (nfo == "") {
    alert("Vehical Number is required");
    return false;
  }
  if (own == "") {
    alert("Customer is required");
    return false;
  }

}
</script>
</body>
</html>
