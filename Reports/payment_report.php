<?php include('report_header.php'); ?>
<?php include '../db.php'; ?>

<?php   // generating Main Categories

$rec_no=$_GET['rec_no'];




$countrow ==0;

$query = mysqli_query($con,"select a.rec_no,a.date,a.Invoice_no,f.amount,a.Payed_amount,a.description,a.Balance_amount,e.full_name,a.is_print,a.is_cancelled,b.ve_no,c.Vowner,d.title,d.fname,d.lname,d.email
from payment as a 
inner join invoice_header as f 
on a.Invoice_no = f.invoice_no 
inner join service_job as b 
on f.job_id = b.job_id 
inner join vehical as c 
on b.ve_no = c.Vno 
inner join customer as d
on c.Vowner = d.cus_id
inner join user as e
on a.user = e.user_name 
Where rec_no='$rec_no'");
foreach($query as $row){
   
	$countrow++;


?>

            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">PAYMENT RECEIPT TO:</div>
                        <h2 class="to"><?php echo strtoupper($row["title"]); ?> <?php echo strtoupper($row["fname"]); ?> <?php echo strtoupper($row["lname"]); ?></h2>
                        
                        <div class="email"><a href="mailto:<?php echo $row["email"]; ?>"><?php echo $row["email"]; ?></a></div>
                       
                    </div>
                   
                    <div class="col invoice-details">
                        <h1 class="invoice-id">RECEIPT 000<?php echo $row["rec_no"]; ?></h1>
                        <div class="date">Date of Receipt: <?php echo $row["date"]; ?></div>
                        <div class="date">Due Date: <?php $date = date_create($row["date"]);  echo date_format($date,'Y-m-d'); ?></div>
                    </div>
                </div>
                <h5>Invoice No : INV000<?php echo $row["Invoice_no"]; ?> </h5>
               
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                           
                            <th class="text-left"><strong>Description</th>
                          
                          
                            
                        </tr>
                    </thead>
                    <tbody>



                    <tr>
                          
                            <td class="qty"><?php echo $rows["description"]; ?></td>
                           
                          
                        </tr>

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2"> <h6><strong>Invoice Amount</td>
                            <td><h6><strong>Rs.<?php echo $row["amount"]; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2"> <h6><strong>  Outstanding Amount</td>
                            <td><h6><strong>Rs.<?php echo $row["Balance_amount"]; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                             <td colspan="2"><h5>Net Amount</h5></td>
                            <td><h5>Rs. <?php echo $row["Payed_amount"]; ?></h5></td> 
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