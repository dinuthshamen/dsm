<?php include 'db.php'; ?>

<?php 
	session_start();

	// variable declaration
	$username;
	$errors = array(); 
	$success = array(); 
	$_SESSION['success'] = "";


	// REGISTER vehical
	if (isset($_POST['add_vehical'])) {
		// receive all input values from the form
		$owner = $_POST['owner'];
		$fveno = $_POST['fno'];
		$vcat = $_POST['vcat'];
		$vtype = $_POST['vtype'];
		$vmodel = $_POST['vmodel'];
		$desc = $_POST['desc'];
		$milage = $_POST['milage'];
		$image = $_POST['image'];
		
		$checkvehical = "SELECT * FROM vehical WHERE Vno='$fveno'";
		$result = mysqli_query($con,$checkvehical);
		$countus = mysqli_num_rows($result);
		
		if ($countus>0) {
			array_push($errors, " This Vehical already exists!" );
		}
		// form validation: ensure that the form is correctly filled
		if (empty($owner)) { array_push($errors, "owner is required"); }
		if (empty($fveno)) { array_push($errors, "vehical No is required"); }
		if (empty($vcat)) { array_push($errors, "vehical category is required"); }
		if (empty($vtype)) { array_push($errors, "Vehical type  is required"); }
		if (empty($vmodel)) { array_push($errors, "Vehical model is required"); }
		
		
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			mysqli_query ($con,"INSERT INTO vehical (Vno,Vowner,vcat,vtype,vmodel,description,milage,image) 
					  VALUES('$fveno', '$owner', '$vcat', '$vtype', '$vmodel', '$desc', '$milage','$image')");
		 array_push($success,"You are now sucessfully added vehical information - $fveno ");
		 header('location: new_job_create.php?vno='.$fveno);
		}

	}
	
	// REGISTER Customers
	if (isset($_POST['add_customer'])) {
		// receive all input values from the form
		$title = $_POST['title'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$nic = $_POST['nic'];
		$address1 = $_POST['address1'];
		$address2 = $_POST['address2'];
		$address3 = $_POST['address3'];
		$cno = $_POST['cno'];
		$hometp = $_POST['hometp'];
		$email = $_POST['email'];
		
		
		// form validation: ensure that the form is correctly filled
		if (empty($title)) { array_push($errors, "Title is required"); }
		if (empty($fname)) { array_push($errors, "Firstname is required"); }
		if (empty($lname)) { array_push($errors, "Last Name is required"); }
		if (empty($cno)) { array_push($errors, "Contact No  is required"); }
		

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			mysqli_query ($con,"INSERT INTO customer (title,fname,lname,address1,address2,address3,contact,hometp,email,NIC) 
					  VALUES('$title', '$fname', '$lname', '$address1', '$address2', '$address3', '$cno','$hometp','$email','$nic')");
		   array_push($success, "You are now sucessfully insert Customer information");
		  
		   
		   $query2 = "select * from customer ORDER by cus_id DESC LIMIT 1";
		   $results2 = mysqli_query($con, $query2);
			foreach($results2 as $row)
			{
				$cusnew_id = $row['cus_id'];
				header('location: new_vehical.php?cusid='.$cusnew_id);

			}
			
		}

	}
	
		// Update Customers
	if (isset($_POST['edit_customer'])) {
		// receive all input values from the form
		$id = $_POST['id'];
		$title = $_POST['title'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$nic = $_POST['nic'];
		$address1 = $_POST['address1'];
		$address2 = $_POST['address2'];
		$address3 = $_POST['address3'];
		$cno = $_POST['cno'];
		$hometp = $_POST['hometp'];
		$email = $_POST['email'];
		
		
		// form validation: ensure that the form is correctly filled
		if (empty($title)) { array_push($errors, "Title is required"); }
		if (empty($fname)) { array_push($errors, "Firstname is required"); }
		if (empty($lname)) { array_push($errors, "Last Name is required"); }
		if (empty($cno)) { array_push($errors, "Contact No  is required"); }
		

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$sql= "Update customer SET title='$title',fname='$fname',lname='$lname',NIC='$nic',address1='$address1',address2='$address2', address3='$address3' ,contact='$cno',hometp='$hometp',email='$email'  Where cus_id='$id'";
			
			$runsql = mysqli_query ($con,$sql);
		 if($runsql) {
		  array_push($success, "You are now sucessfully edit Customer information");
		 }else{
			array_push($errors, "unsuccessfully Updated costomer");

		}


		}

	}


	// delete VEHICAL
	if (isset($_POST['delete_vehical'])) {
		// receive all input values from the form
		$vno = $_POST['vno'];
		
		
		// form validation: ensure that the form is correctly filled
		if (empty($vno)) { array_push($errors, "Vehical is not accept!!"); }
	
		

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$sql= "Delete From vehical Where Vno='$vno'";
			$runsql = mysqli_query ($con,$sql);
			if ($runsql) {
			
			array_push($success, "You are now sucessfully deleted Vehical is $vno");
			}else{
				array_push($errors, "You cannot delete this Vehical. Reason: Already created Job.");

			}
		}

	}

	// delete Job
	if (isset($_POST['delete_job'])) {
		// receive all input values from the form
		$jobid = $_POST['jobid'];
		
		
		// form validation: ensure that the form is correctly filled
		if (empty($jobid)) { array_push($errors, "Job id is not accept!!"); }
	
		

		// register user if there are no errors in the form
		if (count($errors) == 0) {

			$sql= "Delete From service_job Where job_id ='$jobid'";
			$sql2= "Delete From deposited_things Where job_id ='$jobid'";
			$sql3= "Delete From job_extra_services Where service_job_id ='$jobid'";

			$runsql2 = mysqli_query ($con,$sql2);
			$runsql3 = mysqli_query ($con,$sql3);
			$runsql = mysqli_query ($con,$sql);
			
			if ($runsql) {
			
			array_push($success, "You are now sucessfully Deleted job id is $jobid");
			} else {
				array_push($errors, "You cannot delete this Job. Reason: Already Invoiced.");
			}
		}

	}

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = $_POST['username'];
		$password_1 = $_POST['pass1'];
		$password_2 = $_POST['pass2'];
		$F_Name = $_POST['fullname'];
		$contact = $_POST['phone'];
		$group = $_POST['group'];
		$chuser = "SELECT * FROM user WHERE user_name='$username'";
		$result = mysqli_query($con,$chuser);
		$countus = mysqli_num_rows($result);
		
		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($F_Name)) { array_push($errors, "Full name is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (empty($contact)) { array_push($errors, "phone number is required"); }
		if (empty($group)) { array_push($errors, "Group is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		if ($countus>0) {
			array_push($errors, " You are already exists!" );
		}
		
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$exe = mysqli_query ($con,"INSERT INTO user (user_name,full_name,user_group,password,phone) 
			VALUES('$username', '$F_Name','$group', '$password', '$contact')");
			
			if ($exe) {
			
			array_push($success, "You are now Sucessful registered");
		
			
			} else {

				array_push($errors, "Something Went Wrong");
			}
		}

	}


	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = $_POST['username'];
		$password1 = $_POST['password'];

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password1)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password1);
			$query = "SELECT * FROM user WHERE user_name='$username' AND password='$password'";
			$results = mysqli_query($con, $query);

			if (mysqli_num_rows($results) == 1) {
				
				$query = mysqli_query($con,"select * from user Where user_name='$username'");
				foreach($query as $row){
					$_SESSION['groupid'] =  $row["user_group"];
					$_SESSION['username'] = $row["user_name"];
					$_SESSION['full_name'] = $row["full_name"];
				}
				
				
				array_push($success, "You are now logged in");
				header('location: index.php');
			}else {
				array_push($errors,"Wrong username/password combination" );
				
			}
		}
	}
	
// REGISTER USER
if (isset($_POST['create_job'])) {
	// receive all input values from the form
	$vehical_no = $_POST['vehical_no'];
	$service_type = $_POST['service_type'];
	$service_milage = $_POST['service_milage'];
	$service_desc = $_POST['service_desc'];
	$job_id = $_POST['job_id'];
	$helmat = $_POST['helmat'];
	$carpet = $_POST['carpet'];
	$keyset = $_POST['keyset'];
	$other = $_POST['other'];
	$wel = $_POST['2'];
	date_default_timezone_set('Asia/Colombo');
	$date = date('Y/m/d h:i:s a', time());
	$user = $_SESSION['username'];
	
	
	// form validation: ensure that the form is correctly filled
	if (empty($vehical_no)) { array_push($errors, "Vehical No is required"); }
	if (empty($service_type)) { array_push($errors, "Service type is required"); }
	if (empty($service_milage)) { array_push($errors, "Service millage is required"); }
	if (empty($service_desc)) { array_push($errors, "description is required"); }
	

	



	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database
		$exe = mysqli_query ($con,"INSERT INTO service_job () 
		VALUES('$job_id', '$date','$vehical_no', '$service_type', '$service_desc', '$service_milage',1,'$user','',0,0)");
		
		$exe3 = mysqli_query ($con,"Update vehical SET milage='$service_milage' WHERE Vno='$vehical_no'");
		
		if ($helmat=="on") {
			$query2 = mysqli_query($con,"INSERT INTO deposited_things (job_id,description) VALUES('$job_id','helmat')");
			}  
		if ($carpet=="on") {
			$query2 = mysqli_query($con,"INSERT INTO deposited_things (job_id,description) VALUES('$job_id','carpet')");
				} 
		if ($keyset=="on") {
			$query2 = mysqli_query($con,"INSERT INTO deposited_things (job_id,description) VALUES('$job_id','keyset')");
					}  
		if ($other=="on") {
			$query2 = mysqli_query($con,"INSERT INTO deposited_things (job_id,description) VALUES('$job_id','other')");
						  }

		$query = mysqli_query($con,"select * from extra_services");
				foreach($query as $row){
					
					$post_row =$row["es_id"];
					$post_value =$_POST[$post_row];
					if ($post_value=="on"){
						
						$exe2 = mysqli_query ($con,"INSERT INTO job_extra_services () 
						VALUES('$post_row', '$job_id',1)");
						
					}
				
				} 
				



		if ($exe) {
		
		array_push($success, "You are now Sucessful created job Id $job_id - $date   <a class='btn btn-default' href='reports/job_report.php?jobid=$job_id'  target='blank'> Print</a>" );
	
		
		} else {

			array_push($errors, "Something Went Wrong");
		}
	}

}

// REGISTER Customers
	if (isset($_POST['create_task'])) {
		// receive all input values from the form
		$user = $_POST['user'];
		$ref = $_POST['ref'];
		$message = $_POST['message'];
		$s_user = $_SESSION['username'];
		
		
		// form validation: ensure that the form is correctly filled
		if (empty($user)) { array_push($errors, "user is required"); }
		if (empty($ref)) { array_push($errors, "ref is required"); }
		if (empty($message)) { array_push($errors, "message is required"); }
		
		

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$exe=  mysqli_query ($con,"INSERT INTO task (user,message,ref,submit_user) 
					  VALUES('$user', '$message', '$ref','$s_user')");
		   
			if ($exe){
				array_push($success, "You are now sucessfully Create a task for $user");
			} else{
				array_push($errors, "Something Went Wrong");
			}
		 
		  
		}

	}

	if (isset($_POST['new_payment'])) {
		// receive all input values from the form
		$invno = $_POST['invno'];
		$payed_amount = $_POST['payed_amount'];
		$invoice_amount = $_POST['invoice_amount'];
		$outstanding = $_POST['outstanding'];
		$description = $_POST['description'];
		$s_user = $_SESSION['username'];
		date_default_timezone_set('Asia/Colombo');
		$date = date('Y/m/d h:i:s a', time());
		
		
		// form validation: ensure that the form is correctly filled
		if (empty($invno)) { array_push($errors, "user is required"); }
		if (empty($payed_amount)) { array_push($errors, "ref is required"); }
		
		
		

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$exe=  mysqli_query ($con,"INSERT INTO payment (date,Invoice_no,Payed_amount,Balance_amount,is_cancelled,is_print,description,user) 
					  VALUES('$date', '$invno', '$payed_amount','$outstanding',0,0,'$description','$s_user')");
		   

		   $sql2= "Update invoice_header SET outstanding='$outstanding' Where invoice_no='$invno'";
			$exe2= mysqli_query ($con,$sql2);
		 
		   if ($exe){
				array_push($success, "You are now sucessfully Settled Invoice No: $invno");
			} else{
				array_push($errors, "Something Went Wrong");
			}
			if ($exe2){
				array_push($success, "outstanding collected!");
			} else{
				array_push($errors, "Something Went Wrong");
			}
		 
		  
		}

	}

	
	if (isset($_POST['newvcat'])) {
	
		$name = $_POST['name'];
		if (empty($name)) { array_push($errors, "Name is required"); }

		if (count($errors) == 0) {
			$exe=  mysqli_query ($con,"INSERT INTO vcategory (catname) 
					  VALUES('$name')");
		   
			if ($exe){
				array_push($success, "You are now sucessfully Add new Vehical Category");
			} else{
				array_push($errors, "Something Went Wrong");
			}
		}
	}

	if (isset($_POST['deletevcat'])) {
	
		$id = $_POST['id'];
		if (empty($id)) { array_push($errors, "id is required"); }

		if (count($errors) == 0) {
			$exe=  mysqli_query ($con,"delete from vcategory WHERE catid=$id");
		   
			if ($exe){
				array_push($success, "You are now sucessfully Delete Vehical Category");
			} else{
				array_push($errors, "Can't Delete This Item");
			}
		}
	}


	if (isset($_POST['newvtype'])) {
	
		$name = $_POST['name'];
		$category = $_POST['category'];
		$logo = $_POST['logo'];
		if (empty($name)) { array_push($errors, "Name is required"); }

		if (count($errors) == 0) {
			$exe=  mysqli_query ($con,"INSERT INTO vtype (catid,typename,logo) 
					  VALUES('$category','$name','$logo')");
		   
			if ($exe){
				array_push($success, "You are now sucessfully Add new Vehical Type");
			} else{
				array_push($errors, "Something Went Wrong");
			}
		}
	}


	if (isset($_POST['do_task'])) {
	
		$task_id = $_POST['task_id'];
	
		if (empty($task_id)) { array_push($errors, "task_id is required"); }

		if (count($errors) == 0) {
			$exe=  mysqli_query ($con,"Update task SET is_completed=1 Where task_id='$task_id'");
		   
			if ($exe){
				array_push($success, "You are now sucessfully do the task");
			} else{
				array_push($errors, "Something Went Wrong");
			}
		}
	}

	if (isset($_POST['deletevtype'])) {
	
		$id = $_POST['id'];
		if (empty($id)) { array_push($errors, "id is required"); }

		if (count($errors) == 0) {
			$exe=  mysqli_query ($con,"delete from vtype WHERE typeid=$id");
		   
			if ($exe){
				array_push($success, "You are now sucessfully Delete Vehical Category");
			} else{
				array_push($errors, "Can't Delete This Item");
			}
		}
	}

	if (isset($_POST['newvmodel'])) {
	
		$name = $_POST['name'];
		$category = $_POST['category'];
		
		if (empty($name)) { array_push($errors, "Name is required"); }

		if (count($errors) == 0) {
			$exe=  mysqli_query ($con,"INSERT INTO vmodel (typeid,modelname) 
					  VALUES('$category','$name')");
		   
			if ($exe){
				array_push($success, "You are now sucessfully Add new Vehical Model");
			} else{
				array_push($errors, "Something Went Wrong");
			}
		}
	}

	if (isset($_POST['deletevmodel'])) {
	
		$id = $_POST['id'];
		if (empty($id)) { array_push($errors, "id is required"); }

		if (count($errors) == 0) {
			$exe=  mysqli_query ($con,"delete from vmodel WHERE vmid=$id");
		   
			if ($exe){
				array_push($success, "You are now sucessfully Delete Vehical Model");
			} else{
				array_push($errors, "Can't Delete This Item");
			}
		}
	}

	if (isset($_POST['newproduct'])) {
	
		$name = $_POST['name'];
		$unit = $_POST['unit'];
		$qty = $_POST['qty'];
		$cp = $_POST['cp'];
		$sp = $_POST['sp'];
		date_default_timezone_set('Asia/Colombo');
		$date = date('Y/m/d', time());
		
		if (empty($name)) { array_push($errors, "Name is required"); }
		if (empty($unit)) { array_push($errors, "unit is required"); }
		if (empty($qty)) { array_push($errors, "Qty is required"); }
		if (empty($cp)) { array_push($errors, "Cost Price is required"); }
		if (empty($sp)) { array_push($errors, "Sales price is required"); }

		if (count($errors) == 0) {
			$exe=  mysqli_query ($con,"INSERT INTO inventory (product_name,qty,unit,GRN_price,Sale_price,created_date) 
					  VALUES('$name','$qty','$unit','$cp','$sp','$date')");
		   
			if ($exe){
				array_push($success, "You are now sucessfully Add new Inventory");
			} else{
				array_push($errors, "Something Went Wrong");
			}
		}
	}

	if (isset($_POST['deleteproduct'])) {
	
		$id = $_POST['id'];
		if (empty($id)) { array_push($errors, "id is required"); }

		if (count($errors) == 0) {
			$exe=  mysqli_query ($con,"delete from inventory WHERE product_id=$id");
		   
			if ($exe){
				array_push($success, "You are now sucessfully Delete Inventory");
			} else{
				array_push($errors, "Can't Delete This Item");
			}
		}
	}

	if (isset($_POST['newes'])) {
	
		$name = $_POST['name'];
		$desc = $_POST['desc'];
		
		date_default_timezone_set('Asia/Colombo');
		$date = date('Y/m/d', time());
		
		if (empty($name)) { array_push($errors, "Name is required"); }
		if (empty($desc)) { array_push($errors, "Description is required"); }
	

		if (count($errors) == 0) {
			$exe=  mysqli_query ($con,"INSERT INTO extra_services (es_name,description) 
					  VALUES('$name','$desc')");
		   
			if ($exe){
				array_push($success, "You are now sucessfully Add new Inventory");
			} else{
				array_push($errors, "Something Went Wrong");
			}
		}
	}

	if (isset($_POST['deletees'])) {
	
		$id = $_POST['id'];
		if (empty($id)) { array_push($errors, "id is required"); }

		if (count($errors) == 0) {
			$exe=  mysqli_query ($con,"delete from extra_services WHERE es_id=$id");
		   
			if ($exe){
				array_push($success, "You are now sucessfully Delete Extra service");
			} else{
				array_push($errors, "Can't Delete This Item");
			}
		}
	}

// Update Status
if (isset($_POST['stat_change'])) {
	// receive all input values from the form
	$status = $_POST['status'];
	$jobid = $_POST['jobid'];
	$stat_message = $_POST['stat_message'];

	
	// form validation: ensure that the form is correctly filled
	if (empty($status)) { array_push($errors, "Status is required"); }
	
	

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$sql= "Update service_job SET status='$status',status_message='$stat_message'  Where job_id='$jobid'";
		
		$runsql = mysqli_query ($con,$sql);
	 
		if ($runsql){
	    array_push($success, "You are now sucessfully Status Changed Job id:$jobid");
		} else {
			array_push($errors, "Unsucessfully Status Changed Job id:$jobid");
		}


	}

}

// REGISTER Customers
if (isset($_POST['new_invoice'])) {
	// receive all input values from the form
	$jobid = $_POST['job_id'];
	date_default_timezone_set('Asia/Colombo');
	$date = date('Y/m/d h:i:s a', time());
	$user = $_SESSION['username'];
	$invoice_no ="";
	$query = mysqli_query($con,"select * from invoice_header  ORDER BY invoice_no DESC LIMIT 1");
	foreach($query as $row){
		$invoice_no = $row['invoice_no'];
		$invoice_no ++;
	}
	if ($row['invoice_no']=="") {
		$invoice_no =1;
	}
	
	// form validation: ensure that the form is correctly filled
	if (empty($jobid)) { array_push($errors, "Job is required"); }
	
	
	

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$exe=  mysqli_query ($con,"INSERT INTO invoice_header (invoice_no,date_time,job_id,amount,discount,user_name,is_cancelled,is_print,outstanding) 
				  VALUES('$invoice_no','$date', '$jobid', 0,0,'$user',0,0,0)");
	   
		if ($exe){
			array_push($success, "You are now sucessfully Create a invoice Number is : $invoice_no");
			header('location: Invoice.php?jobid='.$jobid.'&invno='.$invoice_no);
		} else{
			array_push($errors, "Error :Something Went Wrong");
		}
	 
	  
	}

}

if (isset($_POST['delete_invoice_details'])) {
	// receive all input values from the form
	$prid = $_POST['product_id'];
	$invno = $_POST['invoice_no'];
	$jobid = $_POST['jobid'];
	
	// form validation: ensure that the form is correctly filled
	if (empty($prid)) { array_push($errors, "Product ID is not accept!!"); }
	if (empty($invno)) { array_push($errors, "Invoice No is not accept!!"); }
	if (empty($jobid)) { array_push($errors, "jobID is not accept!!"); }

	

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$sql= "Delete From invoice_details Where invoice_no='$invno' AND product_id='$prid' ";
		
		$runsql = mysqli_query ($con,$sql);
		
		if ($runsql) {
		array_push($success, "You are now sucessfully deleted");
		header('location: Invoice.php?jobid='.$jobid.'&invno='.$invno);
		} else{
			array_push($errors, "Error :Something Went Wrong");
		}
	}

}

if (isset($_POST['save_invoice_details'])) {
	// receive all input values from the form
	$inv_no = $_POST['inv_no'];
	$Job_id = $_POST['Job_id'];
	$discount = $_POST['discount'];
	$netamount = $_POST['Invoice_amount'];

	$invoice_val =0;
	// form validation: ensure that the form is correctly filled
	if (empty($inv_no)) { array_push($errors, "Invoice is required"); }
	
	

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$sql= "Update invoice_header SET amount='$netamount',discount='$discount',outstanding='$netamount',is_done=1  Where invoice_no='$inv_no'";
		$sql2= "Update service_job SET closed=1  Where job_id='$Job_id'";
		$runsql = mysqli_query ($con,$sql);
		$runsql2 = mysqli_query ($con,$sql2);
		
		if ($runsql AND $runsql2){
		array_push($success, "You are now sucessfully closed job ID:$Job_id");
		array_push($success, "You are now sucessfully finalized Invoice No:$inv_no <a class='btn btn-default' href='reports/invoice_report.php?inv_no=$inv_no'  target='blank'> Print</a>");
		} else {
			array_push($errors, " Error : Something Went Wrong!!");
		}


	}

}

?>
