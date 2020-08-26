<?php include 'db.php'; ?>
<?php  
 //load_data.php  
 $output = '';  
 if(isset($_POST["x"]))  
 {  
      if($_POST["x"] != '')  
      {  
           $sql = "SELECT * FROM vtype WHERE catid = '".$_POST["x"]."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM vtype";  
      }  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["typeid"].'">' .$row["typename"]. '</option>';  
      }  
      echo $output;  
 }  
 
   $output1 = '';  
 if(isset($_POST["y"]))  
 {  
      if($_POST["y"] != '')  
      {  
           $sql = "SELECT * FROM vmodel WHERE typeid = '".$_POST["y"]."'";  
      }  
      else  
      {  
           $sql = "SELECT * FROM vmodel";  
      }  
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output1 .= '<option value="'.$row["vmid"].'">' .$row["modelname"]. '</option>';  
      }  
      echo $output1;  
 }  

 $output1 = '';  
 if(isset($_POST["z"]))  
 {  
     $DATA=  $_POST["z"];  
      

     $sql = "SELECT * FROM inventory WHERE product_id = $DATA";  
       
      
      $result = mysqli_query($con, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output1= $row["Sale_price"];  
      }  
      echo $output1;  
   
 }
   
 ?>  