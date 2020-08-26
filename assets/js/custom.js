


/*=============================================================
    Authour URI: www.binarytheme.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */


(function ($) {
    "use strict";
    var mainApp = {

        main_fun: function () {
           
            /*====================================
              LOAD APPROPRIATE MENU BAR
           ======================================*/
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });

          
     
        },

        initialization: function () {
            mainApp.main_fun();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.main_fun();
    });

}(jQuery));

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

function vnodem() {
    var str = document.getElementById("vehno").value;
    var n = str.length;
    
    
     if (n ==9) {
    var res = str.substring(0, 2);
    var res2 = str.substring(2, 5);
    var res3 = str.substring(5, 9);
   
    var new2 = res + "-" + res2 +"-" +  res3;
    var res = new2.toUpperCase();
   
    document.getElementById("fveno").value = res;
     } else if (n==8)  {
    var res = str.substring(0, 2);
    var res2 = str.substring(2, 4);
    var res3 = str.substring(4, 8);
   
    var new2 = res + "-" + res2 +"-" +  res3;
    var res = new2.toUpperCase();
   
    document.getElementById("fveno").value = res;	
     } 
         else if (n>9)
         
         {
             window.alert("Vehical No is invalid");
         }
 }
 
 function vnodem2() {
      var str = document.getElementById("vehno2").value;
      var n = str.length;
      
      if (n ==6) {
        var res = str.substring(0, 2);
      var res2 = str.substring(2, 6);
      
     
      var new2 = res + "-" + res2 ;
      var res = new2.toUpperCase();
     
      document.getElementById("fveno").value = res;

      } else if (n ==7) {
      var res = str.substring(0, 3);
      var res2 = str.substring(3, 7);
      
     
      var new2 = res + "-" + res2 ;
      var res = new2.toUpperCase();
     
      document.getElementById("fveno").value = res;
       } 




           else if (n>7)
           
           {
               window.alert("Vehical No is invalid");
           }
   }