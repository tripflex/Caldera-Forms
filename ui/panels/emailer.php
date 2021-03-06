<?php

if(!isset($element['mailer']['sender_name'])){
	$element['mailer']['sender_name'] = __('Caldera Forms Notification');
}
if(!isset($element['mailer']['sender_email'])){
	$element['mailer']['sender_email'] = get_option( 'admin_email' );
}
if(!isset($element['mailer']['email_type'])){
	$element['mailer']['email_type'] = 'html';
}
if(!isset($element['mailer']['recipients'])){
	$element['mailer']['recipients'] = '';
}
if(!isset($element['mailer']['email_subject'])){
	$element['mailer']['email_subject'] = $element['name'];
}
if(!isset($element['mailer']['email_message'])){
	$element['mailer']['email_message'] = '{summary}';
}
if(!isset($element['mailer']['enable_mailer'])){
	$element['mailer']['enable_mailer'] = '1';
}





?>
<div class="mailer-control-panel">
	<div class="caldera-config-group">
		<label><?php echo __('Mailer', 'caldera-forms'); ?> </label>
		<div class="caldera-config-field">
			<select class="field-config" id="mailer_status_select" name="config[mailer][enable_mailer]">
			<option value="0" <?php if($element['mailer']['enable_mailer'] == '0'){ echo 'selected="selected"'; } ?>><?php echo __('Disabled', 'caldera-forms'); ?></option>
			<option value="1" <?php if($element['mailer']['enable_mailer'] == '1'){ echo 'selected="selected"'; } ?>><?php echo __('Enabled', 'caldera-forms'); ?></option>
			</select>
		</div>
	</div>
	<div class="mailer_config_panel" <?php if($element['mailer']['enable_mailer'] == '0'){ echo 'style="display:none;"'; } ?>>
		<div class="caldera-config-group">
			<label><?php echo __('From Name', 'caldera-forms'); ?> </label>
			<div class="caldera-config-field">
				<input type="text" class="field-config" name="config[mailer][sender_name]" value="<?php echo $element['mailer']['sender_name']; ?>" style="width:400px;">
				<p class="description"><?php echo __('Use %field_slug% to use a value from the form', 'caldera-forms'); ?></p>
			</div>
		</div>
		<div class="caldera-config-group">
			<label><?php echo __('From Email', 'caldera-forms'); ?> </label>
			<div class="caldera-config-field">
				<input type="text" class="field-config" name="config[mailer][sender_email]" value="<?php echo $element['mailer']['sender_email']; ?>" style="width:400px;">
				<p class="description"><?php echo __('Use %field_slug% to use a value from the form', 'caldera-forms'); ?></p>
			</div>
		</div>
		<div class="caldera-config-group">
			<label><?php echo __('Email Type', 'caldera-forms'); ?> </label>
			<div class="caldera-config-field">
				<select class="field-config" name="config[mailer][email_type]">
				<option value="html" <?php if($element['mailer']['email_type'] == 'html'){ echo 'selected="selected"'; } ?>>HTML</option>
				<option value="text" <?php if($element['mailer']['email_type'] == 'text'){ echo 'selected="selected"'; } ?>>Text</option>
				</select>
			</div>
		</div>
		<div class="caldera-config-group">
			<label><?php echo __('CSV Include', 'caldera-forms'); ?> </label>
			<div class="caldera-config-field">
				<label><input type="checkbox" class="field-config" name="config[mailer][csv_data]" value="1" <?php if(isset($element['mailer']['csv_data'])){ echo 'checked="checked";'; } ?>> <?php echo __('Attach a CSV version of the submission', 'caldera-forms'); ?></label>
			</div>
		</div>


		<div class="caldera-config-group">
			<label><?php echo __('Recipients', 'caldera-forms'); ?> </label>
			<div class="caldera-config-field">
				<input type="text" class="field-config" name="config[mailer][recipients]" value="<?php echo $element['mailer']['recipients']; ?>" style="width:400px;">
				<p class="description"><?php echo __('Comma separated list of email addresses.', 'caldera-forms'); ?></p>
			</div>

		</div>

		<div class="caldera-config-group">
			<label><?php echo __('Email Subject', 'caldera-forms'); ?> </label>
			<div class="caldera-config-field">
				<input type="text" class="field-config" name="config[mailer][email_subject]" value="<?php echo $element['mailer']['email_subject']; ?>" style="width:400px;">
				<p class="description"><?php echo __('Use %field_slug% to use a value from the form', 'caldera-forms'); ?></p>
			</div>
		</div>
		<div class="caldera-config-group">
			<label><?php echo __('Email Message', 'caldera-forms'); ?> </label>
			<div class="caldera-config-field" style="max-width: 600px;">
				<?php wp_editor( $element['mailer']['email_message'], "mailer_email_message", array('textarea_name' => 'config[mailer][email_message]') ); ?>
				<p class="description"><?php echo __('Magic tags, %field_slug% are replaced with submitted data. use {summary} to build an automatic mail based on form content. Leaving the mailer blank, will create and automatic summary.', 'caldera-forms'); ?></p>
			</div>
		</div>
	</div>
</div>
<div class="mailer-errors" style="display:none;">
	<p><?php echo __('Please add a "Button" element and set it to "Submit" if you want to have the form submittable.', 'caldera-forms'); ?></p>
</div>



	

<script type="text/javascript">
	
jQuery('body').on('change', '#mailer_status_select', function(){
	var status = jQuery(this);

	if(status.val() === '0'){
		jQuery('.mailer_config_panel').slideUp(100);
	}else{
		jQuery('.mailer_config_panel').slideDown(100);
	}
});

</script>






