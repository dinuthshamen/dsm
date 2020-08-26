<?php include('header.php');
include('db.php');
include('server.php'); ?>




        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>Dashboard</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Welcome <?php echo $_SESSION['full_name'] ?> ! </strong> 
                              <?php 
                              
                              $username = $_SESSION['username'] ;
                             
                              $results = mysqli_query($con,"select * from task WHERE user='$username' AND is_completed=0");
                              $count= mysqli_num_rows($results);
                             
                              
                              if ($count>=1){
                               
                                echo "You have pending $count task.";
                              }else{
                                echo "You have no pending tasks";
                              }

                              ?>
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
                  <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                            <img src="images/pending.jpg" alt="...">
                            <div class="caption">
                                <h3>
                                   <?php 
                                     $results = mysqli_query($con,"select * from service_job WHERE status=1");
                                     $count= mysqli_num_rows($results);
                                     
                                        if ($count==0) {
                                            echo "NO";

                                        }else {
                                            echo $count;
                                        }
                                     ?>
                                
                                Pending Jobs</h3>
                               
                                <p><a href="job_status_manage.php" class="btn btn-default" role="button">More details</a></p>
                            </div>
                            </div>


                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                            <img src="images/started.jpg" alt="...">
                            <div class="caption">
                             
                            <h3><?php 
                                     $results = mysqli_query($con,"select * from service_job WHERE status BETWEEN 2 AND 6");
                                     $count= mysqli_num_rows($results);
                                     if ($count==0) {
                                        echo "NO";

                                    }else {
                                        echo $count;
                                    }
                                     ?>    Started Jobs</h3>
                             
                                <p><a href="job_status_manage.php" class="btn btn-default" role="button">More details</a></p>
                            </div>
                            </div>


                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                            <img src="images/completed.jpg" alt="...">
                            <div class="caption">
                                <h3>
                                <?php 
                                     $results = mysqli_query($con,"select * from service_job WHERE status=9");
                                     $count= mysqli_num_rows($results);
                                     if ($count==0) {
                                        echo "NO";

                                    }else {
                                        echo $count;
                                    }
                                     ?>    
                                Completed Jobs</h3>
                               
                                <p><a href="print_cjob.php" class="btn btn-default" role="button">More details</a></p>
                            </div>
                            </div>
                        </div>
</div>
                  
                  <div class="row">
                 
                    <div class="col-lg-4 col-md-4">
                    <?php
$count=0;
$sql = mysqli_query($con,"select * from task WHERE user='$username' AND is_completed=0");
foreach($sql as $row){
    $count++; 
?> 
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Tasks <?php echo $count; ?>
                            </div>
                            <div class="panel-body">
                                <p><?php echo $row['message']; ?>.</p>
                            </div>
                            
                            <div class="panel-footer">
                           REF :<?php echo $row['ref']; ?>
                           <form method="post" >	
                          <input type="hidden" value="<?php echo $row['task_id']; ?>" id="task_id"  name="task_id"  class="form-control"  />
                          <button type="submit" class="btn btn-danger btn-default" name="do_task"><span>Done</span></button>
                          </form>
                            </div>
                          
                        </div>
                        <?php } ?>
                    </div>
                
                    
                   
 
  


                

                 <!-- /. ROW  -->   
                
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
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
    
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    jQuery(function ($) {
        var performance = [12, 3, 4, 2, 12, 3, 4, 17, 22, 34, 54, 67],
            visits = [3, 9, 12, 14, 22, 32, 45, 12, 67, 45, 55, 7],
            budget = [23, 19, 11, 134, 242, 352, 435, 22, 637, 445, 555, 57];

        $("#performance1").shieldChart({
            primaryHeader: {
                text: "Quarterly Performance"
            },
            dataSeries: [{
                seriesType: "area",
                collectionAlias: "Q Data",
                data: performance
            }]
        });

        $("#performance2").shieldChart({
            primaryHeader: {
                text: "Visitors"
            },
            dataSeries: [{
                seriesType: "bar",
                collectionAlias: "Visits",
                data: visits
            }]
        });

        $("#performance3").shieldChart({
            primaryHeader: {
                text: "Budget"
            },
            dataSeries: [{
                seriesType: "line",
                collectionAlias: "Budget",
                data: budget
            }]
        });
    });
</script>
   
</body>
</html>
