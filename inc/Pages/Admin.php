<?php
/**
 * @package zaramon-form-builder
 */
namespace Inc\Pages;
class Admin{
	public function register(){
		add_action('admin_menu', array($this, 'add_admin_pages'));
		//add_action( 'admin_post_nopriv_process_form', array($this, 'process_form_data'));
		add_action( 'admin_post_process_form', array($this, 'process_form_data'));	
		add_shortcode('dynamicform', array($this, 'create_dynamic_shortcode'));
		//[dynamicform name="zaramon-form-builder" id="3"]
	}
	function add_admin_pages(){
		add_menu_page('Zaramon Form Builder', 'Zaramon Form Builder', 'manage_options', 'all_forms', array($this, 'adminIndex'), 'dashicons-editor-table', 65 );
		add_submenu_page('all_forms', 'All Forms', 'All Forms', 'manage_options', 'all_forms', array($this, 'adminIndex'));
		add_submenu_page('all_forms', 'Add New', 'Add New', 'manage_options', 'forms-new', array($this, 'formsNew'));
	}
	public function adminIndex(){
		require_once PLUGIN_PATH.'templates/all-forms.php';	
	}
	public function formsNew(){
		require_once PLUGIN_PATH.'templates/forms-new.php';
	}

	function process_form_data(){	
				global $wpdb;
				
				
				
				$last = $wpdb->get_row("SHOW TABLE STATUS LIKE 'wp_zaramon_form_builder'");
				$lastid = $last->Auto_increment;
				
				
				//echo $lastid;
				$form_name="zaramon-form-builder-".$lastid;
				if (isset ($_POST["form_string"]))
				{
					//$felement=mysqli_real_escape_string($_POST["form_string"]);
					
					//$felement = str_replace(',]', ']', stripslashes($_POST['form_string']));
					$felement = stripslashes($_POST['form_string']);
					$ftitle="Please submit this form to us";
					$scode='[dynamicform name="'.$form_name.'" id="'.$lastid.'"]';
					
					$result_check=$wpdb->insert("wp_zaramon_form_builder", array("form_name"=>$form_name, "form_title"=>$ftitle,  "form_element"=>$felement,  "short_code"=>$scode ));
					if($result_check){
						echo "Form saved successfully.";
						wp_redirect( admin_url( 'admin.php?page=all_forms' ) ); 
						exit;
						
					}
					else{
						echo "Sorry! something went wrong";
					}
				
				}
	    }
		
		    
		
		
		
		
		function create_dynamic_shortcode($atts, $content = null) {
				extract(shortcode_atts(array(
						"name" => 'zaramon-form-builder',
						"id" => "1"
				), $atts));
				global $wpdb;
				$mylink = $wpdb->get_row( "SELECT * FROM wp_zaramon_form_builder WHERE id =". $id);
				//$num_rows=$wpdb->query("select count(*) from wp_zaramon_form_builder");
				
				
				//$data=json_decode($testdata
				//echo $mylink->form_element;
				$data=json_decode($mylink->form_element, true);
				//var_dump($data);
				//echo $mylink->form_element."------------------";
				//echo $mylink->form_element;
				//print_r($data);
				?>
				<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				<?php
				$myform="";
				foreach($data as $key => $value)
				{
					//|| ($value['email']=='email') || ($value['password']=='password') || ($value['number']=='number')
					if (($value['type']=='text')){
						?>
						<div class="form-group">
						<label for="<?php echo $value['name'];?>"><?php echo $value['label'];?></label>
						<input type="<?php echo $value['type'];?>" class="form-control" name="<?php echo $value['name'];?>" placeholder="<?php echo $value['placeholder'];?>" required="<?php echo $value['required'];?>"><br/>
						</div>
						<?php
					}
					if (($value['type']=='email')){
						?>
						<div class="form-group">
						<label for="<?php echo $value['name'];?>"><?php echo $value['label'];?></label>
						<input type="<?php echo $value['type'];?>" class="form-control" name="<?php echo $value['name'];?>" placeholder="<?php echo $value['placeholder'];?>" required="<?php echo $value['required'];?>"><br/>
						</div>
						<?php
					}
					if (($value['type']=='password')){
						?>
						<div class="form-group">
						<label for="<?php echo $value['name'];?>"><?php echo $value['label'];?></label>
						<input type="<?php echo $value['type'];?>" class="form-control" name="<?php echo $value['name'];?>" placeholder="<?php echo $value['placeholder'];?>" required="<?php echo $value['required'];?>"><br/>
						</div>
						<?php
					}
					if (($value['type']=='number')){
						?>
						<div class="form-group">
						<label for="<?php echo $value['name'];?>"><?php echo $value['label'];?></label>
						<input type="<?php echo $value['type'];?>" class="form-control" name="<?php echo $value['name'];?>" placeholder="<?php echo $value['placeholder'];?>" required="<?php echo $value['required'];?>"><br/>
						</div>
						<?php
					}
					if ($value['type']=='textarea'){
						?>
						<div class="form-group">
						<label for="<?php echo $value['name'];?>"><?php echo $value['label'];?></label>
						<textarea  class="form-control" rows="3" name="<?php echo $value['name'];?>" placeholder="<?php echo $value['placeholder'];?>" required="<?php echo $value['required'];?>"></textarea><br/>
						</div>
						<?php
					}
					
					if ($value['type']=='date'){
						?>
						<div class="form-group">
						<label for="<?php echo $value['name'];?>"><?php echo $value['label'];?></label>
						<input type="<?php echo $value['type'];?>" class="form-control" name="<?php echo $value['name'];?>"  required="<?php echo $value['required'];?>"><br/>
						</div>
						<?php
					}
					if ($value['type']=='date'){
						?>
						<div class="form-group">
						<label for="<?php echo $value['name'];?>"><?php echo $value['label'];?></label>
						<input type="<?php echo $value['type'];?>" class="form-control" name="<?php echo $value['name'];?>"  required="<?php echo $value['required'];?>"><br/>
						</div>
						<?php
					}
					
					if ($value['type']=='button'){
						?>
						<br/>
						<div class="form-group">
						<button name="<?php echo $value['name'];?>" type="submit" class="<?php echo $value['class'];?>"><?php echo $value['label'];?></button>
						
						</div>
						<?php
					}
					
					if ($value['type']=='select'){
						$option_html = '';
						$option_html .= '<option value="">----------Select----------</option>';
						$options_data=$value['options'];
						foreach($options_data as $key => $optval){
							$olabel = $optval['option'];
							$oval = $optval['value'];
							
							$option_html .= '<option value="'.$oval.'">' .$olabel. '</option>';
						}
						?>
						
						<div class="form-group">
						<label for="<?php echo $value['name'];?>"><?php echo $value['label'];?></label>
						
						<select class="form-control" name="<?php echo $value['name'];?>"><?php echo $option_html;?></select>
						<br/>
						</div>
						<?php
					}
					
					if ($value['type']=='radio'){
						$option_html = '';
						$optname=$value['name'];
						$options_data=$value['options'];
						foreach($options_data as $key => $optval){
							$olabel = $optval['option'];
							$oval = $optval['value'];
							
							
							$option_html .= '<div class="form-check"><label class="form-check-label"><input type="radio" class="form-check-input" name="'.$optname.'" value="'.$oval.'">' .$olabel. '</label></div>';
						}
						?>
						
						<div class="form-group">
						<label for="<?php echo $value['name'];?>"><?php echo $value['label'];?></label>
						<?php echo $option_html;?><br/>
						</div>
						<?php
					}
					
					if ($value['type']=='checkbox'){
						$option_html = '';
						$optname=$value['name'];
						$options_data=$value['options'];
						foreach($options_data as $key => $optval){
							$olabel = $optval['option'];
							$oval = $optval['value'];
							
											
							$option_html .= '<div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input" name="'.$optname.'[]" value="'.$oval.'">' .$olabel. '</label></div>';
						}
						?>
						
						<div class="form-group">
						<label for="<?php echo $value['name'];?>"><?php echo $value['label'];?></label>
						<?php echo $option_html;?><br/>
						</div>
						<?php
					}
					
				  
				}
				?>
				</form>
				<?php
		 
		}
}