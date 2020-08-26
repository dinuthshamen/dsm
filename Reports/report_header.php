
<?php 

session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "Login";
		header('location: ../login.php');
	}

	if (isset($_GET['logout'])) {
		
		session_destroy();
		unset($_SESSION['username']);
		header('location: ../index.php');
    }
    
    ?>


<!DOCTYPE html>  
<html>  
<head>  
<title>Ds Management System</title>  
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
<link href="custom.css" rel="stylesheet"> 

<body>  
<br />


<div id="invoice">

   
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="../assets/img/logo.png" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                            T&C Service Station
                            </a>
                        </h2>
                        <div>NO: 156, Sampath Waththa, Dunkannawa</div>
                        <div>076 8958994 / 0777 178761</div>
                        <div>tandcservicestation@gmail.com</div>
                    </div>
                </div>
            </header>
