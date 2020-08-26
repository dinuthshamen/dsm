$(document).ready(function(){

		$('#submitimg').click(function(){
            
			var form_data = new FormData();

			// Read selected files
            var totalfiles = document.getElementById('files').files.length;
            for (var index = 0; index < totalfiles; index++) {
                form_data.append("files[]", document.getElementById('files').files[index]);
            }

            // AJAX request
            $.ajax({
                url: 'ajaxfile.php',
               	type: 'post',
               	data: form_data,
               	dataType: 'json',
                contentType: false,
                processData: false,
                success: function (response) {
                   	
                   	for(var index = 0; index < response.length; index++) {
					    var src = response[index];

					    // Add img element in <div id='preview'>
					    $('#preview').append('<img src="'+src+'" width="200px;" height="200px"> <p>'+src+'<p>' );
						document.getElementById("imageid").value = src;
				
					
						
					}
                   	
                }
            });
		});
	});
	
	//calculate file size
 Filevalidation = () => { 
        const fi = document.getElementById('files'); 
        // Check if any file is selected. 
        if (fi.files.length > 0) { 
            for (const i = 0; i <= fi.files.length - 1; i++) { 
  
                const fsize = fi.files.item(i).size; 
                const file = Math.round((fsize / 1024)); 
                // The size of the file. 
                if (file >= 3072) { 
                    alert( 
                      "File too Big, please select a file less than 3mb"); 
					  document.getElementById('files').value = "";
                } else if (file < 10) { 
                    alert( 
                      "File too small, please select a file greater than 100kb"); 
					  document.getElementById('files').value = "";
                } else { 
                    document.getElementById('size').innerHTML = '<b>'
                    + file + '</b> KB'; 
                } 
            } 
        } 
    } 
	
