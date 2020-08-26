<?php
include 'db.php';

$inv_no=$_POST['inv_no'];
$product_id=$_POST['product_id'];
$desc=$_POST['desc'];
$qty=$_POST['qty'];
$amount=$_POST['amount'];

$return_arr = array();


$sql=mysqli_query ($con,"INSERT INTO invoice_details () VALUES ('$inv_no','$product_id','$desc','$qty','$amount') ");
if ($sql) {
    
    $count=0;
   
    $result = mysqli_query($con, "SELECT a.product_id,product_name,a.description,a.qty,a.amount from  invoice_details as a
    inner join inventory as b on a.product_id = b.product_id  Where invoice_no=$inv_no ");  
      
      while($row = mysqli_fetch_array($result))  
      {  
          $count++;

          $product_id = $row['product_id'];
          $product_name = $row['product_name'];
          $description = $row['description'];
          $qty = $row['qty'];
          $amount = $row['amount'];
          
          $return_arr[] = array(
          "product_id" => $product_id,
          "product_name" => $product_name,
          "description" => $description,
          "qty" => $qty,
          "amount" => $amount);
      }  
      
     
      $count==0;
      echo json_encode($return_arr);

  
}
else 
{
   
}
?>