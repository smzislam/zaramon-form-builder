
<?php		
			global $wpdb;
			$forms = $wpdb->get_results( "SELECT * FROM wp_zaramon_form_builder ORDER BY id DESC");
			
			?>
			<div style="width: 100%; position: relative; clear: both">
			<h3 style="float:left;">All Forms &nbsp;</h3>&nbsp; <a class="btn btn-primary btn-sm" style="float:left" href="admin.php?page=forms-new" >Add New Form</a>
			</div>
			<div style="clear: both"></div>
			<p>Note: Create new dynamice forms, copy the short codes and use them in your pages.</p>
			<br/>
			<div class="table-responsive">
				<table class="table table-hover">
					 <thead><tr> <th>#</th> <th>Form Name</th> <th>Form Short Code</th> </tr> </thead> 
					 <tbody>
					 <?php foreach($forms as $form){ ?>
					 <tr><th scope="row"><?php echo $form->id; ?></th> <td><?php echo $form->form_name; ?></td> <td><?php echo $form->short_code; ?></td></tr>
					 <?php } ?>
					  
					 
					 </tbody> 
				</table>
			</div>
			