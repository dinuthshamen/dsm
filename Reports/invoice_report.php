<?php include('report_header.php'); ?>
<?php include '../db.php'; ?>

<?php   // generating Main Categories

$inv_no=$_GET['inv_no'];




$countrow ==0;

$query = mysqli_query($con,"select a.invoice_no,a.date_time,a.job_id,a.amount,a.discount,e.full_name,a.is_print,a.is_cancelled,b.ve_no,c.Vowner,d.title,d.fname,d.lname,d.address1,d.address2,d.address3,d.email
from invoice_header as a inner join service_job as b 
on a.job_id = b.job_id 
inner join vehical as c 
on b.ve_no = c.Vno 
inner join customer as d
on c.Vowner = d.cus_id
inner join user as e
on a.user_name = e.user_name 
Where invoice_no='$inv_no'");
foreach($query as $row){
   
	$countrow++;


?>

            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"><?php echo strtoupper($row["title"]); ?> <?php echo strtoupper($row["fname"]); ?> <?php echo strtoupper($row["lname"]); ?></h2>
                        <div class="address"><?php echo strtoupper($row["address1"]); ?>,<?php echo strtoupper($row["address2"]); ?>,<?php echo strtoupper($row["address3"]); ?></div>
                        <div class="email"><a href="mailto:<?php echo $row["email"]; ?>"><?php echo $row["email"]; ?></a></div>
                       
                    </div>
                   
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE 000<?php echo $row["invoice_no"]; ?></h1>
                        <div class="date">Date of Invoice: <?php echo $row["date_time"]; ?></div>
                        <div class="date">Due Date: <?php $date = date_create($row["date_time"]);  echo date_format($date,'Y-m-d'); ?></div>
                    </div>
                </div>
                <h5>Vehical No : <?php echo $row["ve_no"]; ?> </h5>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th><strong>#</th>
                            <th class="text-left"><strong>Product/ Description</th>
                            <th></th>
                            <th class="text-right"><strong>QTY</th>
                            <th class="text-right"><strong>Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>
<?php 
                    
                    $count==0;
$query = mysqli_query($con,"select invoice_no,a.product_id,b.product_name,b.unit,a.description,a.qty,a.amount
from invoice_details as a inner join inventory as b 
on a.product_id = b.product_id 
Where invoice_no='$inv_no'");
foreach($query as $rows){
   
	$count++;


?>


                    <tr>
                            <td class="no"><?php  echo $count;  ?></td>
                           
                            <td class="text-left"><h5><?php echo $rows["product_name"]; ?></h5><?php echo $rows["description"]; ?></td>
                            <td>  </td>
                            <td class="qty"><?php echo $rows["qty"]; ?></td>
                           
                            <td class="qty">Rs.<?php echo $rows["amount"]; ?></td>
                        </tr>
<?php }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2"> <h6><strong>SUBTOTAL</td>
                            <td><h6><strong>Rs.<?php echo $row["amount"]; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2"> <h6><strong> Discount</td>
                            <td><h6><strong>Rs.<?php echo $row["discount"]; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                             <td colspan="2"><h5>GRAND TOTAL</h5></td>
                            <td><h5>Rs. <?php $sb=$row["amount"]; $ds=$row["discount"]; $gt=$sb-$ds;    echo number_format($gt, 2, '.', '');?></h5></td> 
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">Free Services: Every 3 service jobs after.</div>
                </div>
            </main>

<?php } ?>


            <footer>
                DS Software Engineering Works - dinuthshamen@gmail.com / +94 77 0260 916.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>

</div>



<?php  

$sql= "Update invoice_header SET Is_print=1 Where invoice_no='$inv_no'";
$runsql = mysqli_query ($con,$sql);

?>
<script>
 $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });

</script>
</body>  
</html>