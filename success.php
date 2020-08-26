<?php  if (count($success) > 0) : ?>
	<div class="error">
		<?php foreach ($success as $success) : ?>
			<div class="row">
               <div class="col-lg-12 ">
                   <div class="alert alert-info">
						<?php echo $success ?>
							
                    </div>
                       
                </div>
             </div>

		<?php endforeach ?>
	</div>
<?php  endif ?>
