function myFunction() {
	
  var x = document.getElementById("mySelect").value;
  
  $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{x:x},  
                success:function(data){  
                     $('#vtype').html(data);  
                }  
           });  
}

function myFunction2() {
	
  var y = document.getElementById("vtype").value;
  $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{y:y},  
                success:function(data){  
                     $('#vmodel').html(data);  
                }  
           });  
}

