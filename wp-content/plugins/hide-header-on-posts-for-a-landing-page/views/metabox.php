<?php 
$post_id = $post->ID;
wp_nonce_field($this->textname, 'custom_nonce');
$this->render_section_fields($post_id, 'normal');
?>
<br/>

<?php do_action('vg_page_layout/metabox/after_content', $post); ?>