<p><?php _e('Thank you for installing our plugin. Usage steps:', $this->textname); ?></p>

<?php
// Disable core plugin welcome page.
add_option('vgse_welcome_redirect', 'no');

$steps = array();

$steps['create_page'] = '<p>' . sprintf(__('Create a new post. <a href="%s" target="_blank" class="button">Click here</a>', $this->textname), esc_url(admin_url('post-new.php?post_type=post'))) . '</p>';
$steps['metabox_screenshot'] = '<p>' . __('In the post editor you will find the "page layout" box. There you can select if you want to hide the header and convert it into a landing page.', $this->textname) . '</p>';

$steps = apply_filters('vg_page_layout/frontend_editor/welcome_steps', $steps);

if (!empty($steps)) {
	echo '<ol class="steps">';
	foreach ($steps as $key => $step_content) {
		?>
		<li><?php echo $step_content; ?></li>		
		<?php
	}

	echo '</ol>';
}