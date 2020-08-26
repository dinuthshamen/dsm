<?php include('report_header.php'); ?>
<?php include '../db.php'; ?>

<?php   // generating Main Categories

$job_id=$_GET['jobid'];




$countrow ==0;
$query = mysqli_query($con,"select job_id,date_time,ve_no,type_name,a.description,c.status,service_millage,d.user_name,f.fname,f.lname,f.email,Is_print
from service_job as a inner join job_status as c 
on c.status_id = a.status 
inner join service_types as b 
on b.type_id = a.service_type 
inner join user as d
on d.user_name = a.user
inner join vehical as e
on e.Vno = a.ve_no
inner join customer as f
on f.cus_id = e.Vowner  
Where job_id='$job_id'");
foreach($query as $row){
   
	$countrow++;


?>
<h3><center>SERVICE JOB TICKET </center> </h3>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Job Details:</div>
                        <h2 class="to"><?php echo strtoupper($row["fname"]); ?> <?php echo strtoupper($row["lname"]); ?></h2>
                        <h5>Vehical No :<?php echo strtoupper($row["ve_no"]); ?></h5>
                        <div class="email"><a href="mailto:<?php echo $row["email"]; ?>"><?php echo $row["email"]; ?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">Job No: <?php echo $row["job_id"]; ?></h1>
                        <div class="date">Date of Job Created: <?php echo $date= $row["date_time"];  ?></div>
                        <div class="date"><?php 
                       
                        if ($row["Is_print"]==0){
                            echo "(ORIGINAL)";

                        }  else if ($row["Is_print"]==1)  {
                            echo "(DUPLICATE)";

                        }
                        
                        ?></div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                       
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no">01</td>
                            <td class="text-left"><h3>Service Type</h3><?php echo $row["type_name"];  ?></td>
                         
                        </tr>
                        <tr>
                            <td class="no">02</td>
                            <td class="text-left"><h3>Start Millage</h3><?php echo $row["service_millage"];  ?> Kmph</td>
                         
                        </tr>
                        <tr>
                            <td class="no">03</td>
                            <td class="text-left"><h3>Description</h3><?php echo  $row["description"];  ?></td>
                           
                        </tr>
                        <tr>
                            <td class="no">04</td>
                            <td class="text-left"><h3>Extra services </h3>
                            
                            <?php 
                    
                $query = mysqli_query($con,"select a.service_job_id,b.es_name
                from job_extra_services as a inner join extra_services as b 
                on a.extra_service_id = b.es_id where service_job_id= '$job_id'");
                foreach($query as $ro){
                    
                ?>
                          
                        
                <?php  echo $ro["es_name"]; echo " / ";} ?> 
                        </td>
                          
                        </tr>
                    </tbody>
                   
                </table>
               
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">
                    <?php 
                    
                    $query = mysqli_query($con,"select * from deposited_things where job_id= '$job_id'");
                    foreach($query as $ro){
                        
                    ?>

                    <?php  echo $ro["description"]; echo " / ";} ?>


                    </div>
                    
                </div>
              
            </main>
            <h3><center> Thank You! Come Again</center> </h3>

<?php } ?>
            <footer>
                DS Software Engineering Works - dinuthshamen@gmail.com / +94 77 0260 916.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>


</div>


<?php  

$sql= "Update service_job SET Is_print=1 Where job_id='$job_id'";
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