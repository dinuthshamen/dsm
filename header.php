<?php 

session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "Login";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		
		session_destroy();
		unset($_SESSION['username']);
		header('location: index.php');
    }
    
    ?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ds management System</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src "https://cdn.datatables.net/plug-ins/1.10.15/sorting/stringMonthYear.js"></script>

     
    



    </head>
<body onload="FocusOnInput()">
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/logo.png" />
                      
                    </a>
                  
                </div>
               
                 <span class="logout-spn" >
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo  $_SESSION['groupid']. " - " . $_SESSION['username']; ?>
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#">My Account</a></li>
                          <li><a href="index.php?logout=1">log Out</a></li>
                         
                        </ul>
                      </div>
               
                </span>
            </div>
        </div>
       <!-- /. NAV TOP  -->
      
       
       
       <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 
                    <li >
                      <a><center> <spain>---- Navigation Menu ----</spain> </center> </a>
                    </li>

                    <li>
                        <a href="index.php" ><i class="fa fa-desktop"></i>Dashboard </a>
                    </li>
                   

                    <li>
                        <a href="Customerinfo.php"><i class="fa fa-comments-o"></i>Customer info  </a>
                    </li>
                    <li>
                        <a href="vehicalinfo.php"><i class="fa fa-taxi"></i>Vehical Info </a>
                    </li>
					<li>
                        <a href="jobmanage.php"><i class="fa fa-briefcase"></i>Job Management</a>
                    </li>

                    <li>
                        <a href="sales.php"><i class="fa fa-clipboard"></i>Sales</a>
                    </li>
                  
                    <li> <a href="user_manage.php"><i class="fa fa-users"></i>User Management</a>  </li>
                      
                  
                    <li>
                        <a href="basicdata.php"><i class="fa fa-table "></i>Basic Data</a>
                    </li>
					<li>
                        <a href="#"><i class="fa fa-table "></i>Reports</a>
                    </li>
                </ul>
                            </div>

        </nav>