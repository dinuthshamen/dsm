<?php  if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-warning">
						<?php echo $error ?>
							
                        </div>
                       
                    </div>
                    </div>

		<?php endforeach ?>
	</div>
<?php  endif ?>
