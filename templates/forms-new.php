
        <div class="container" style="width:100%">
           
                        <!-- <button style="cursor: pointer;display: none" class="btn btn-info export_html mt-2 pull-right">Export HTML</button>
						<button style="cursor: pointer;display: none" class="btn btn-info export_json mt-2 pull-right">Export JSON</button> -->
                        
						<button id="btnsubmit" name="submit" type="submit" style="cursor: pointer;display: none; margin-right:45px" class="btn btn-info export_json mt-2 pull-right">Save Your Form</button>
						<h3 class="mr-auto">Add New Form</h3>
						<p>Note: <strong>Drag</strong> the controller from left side menu and <strong>drop</strong> 'n <strong>sort</strong> it to the right side box. After creating form click on <strong>Save Your Form</strong> button.</p>
                    
            <br/>
            <div class="clearfix"></div>
            <div class="form_builder" style="margin-top: 25px">
                <div class="row">
                    <div class="col-sm-2">
                        <nav class="nav-sidebar">
                            <ul class="nav">
                                <li class="form_bal_textfield">
                                    <a href="javascript:;">Text Field <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_textarea">
                                    <a href="javascript:;">Text Area <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_select">
                                    <a href="javascript:;">Select <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_radio">
                                    <a href="javascript:;">Radio Button <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_checkbox">
                                    <a href="javascript:;">Checkbox <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_email">
                                    <a href="javascript:;">Email <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_number">
                                    <a href="javascript:;">Number <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_password">
                                    <a href="javascript:;">Password <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_date">
                                    <a href="javascript:;">Date <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                                <li class="form_bal_button">
                                    <a href="javascript:;">Button <i class="fa fa-plus-circle pull-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-5 bal_builder">
							<div class="form_builder_area"></div>
                    </div>
                    <div class="col-md-5">
                        <div class="col-md-12">
							
                            
                                <div class="preview" style="width:100%; padding:0px 30px 10px 30px"></div>
								<br/>
                                <div style="display: none" class="form-group plain_html">
								<form id="dform" class="form-horizontal" action="<?php echo admin_url( 'admin-post.php' ); ?>" method="post">
								<input type="hidden" name="action" value="process_form">
								<?php wp_nonce_field( 'process_form', 'submitform_nonce' ); ?>
								<textarea rows="50" name="form_string" class="form-control"></textarea>
								<!--<button name="submit" type="submit" class="btn btn-primary">Submit</button>-->
								</form>
								</div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="clear">&nbsp;</div>
