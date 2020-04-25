<?php
	$free_plugins = $this->free_plugins;

	if(!empty($free_plugins)) {
		?>
		<h4 class="recomplug-title"><?php echo esc_html__('Recommended Plugins', 'sparklestore'); ?></h4>
		<p><?php echo esc_html__('Please Install all the plugins. Although these plugins are complementary, we encourage to install theme to use the theme to full extent', 'sparklestore'); ?></p>
		<div class="recomended-plugin-wrap">
		<?php
		foreach($free_plugins as $plugin) {
			$slug = $plugin['slug'];
			$name = $plugin['name'];
			$filename = $plugin['filename'];
			$extensions = $plugin['extensions'];
			?>
				<div class="recom-plugin-wrap">
					<div class="plugin-img-wrap">
						<img src="<?php echo esc_url('https://ps.w.org/'. esc_attr($slug) .'/assets/'.esc_attr( $extensions ) .'') ?>" />
					</div>

					<div class="plugin-title-install clearfix">
						<span class="title">
							<?php echo esc_html($name); ?>	
						</span>

						<span class="plugin-btn-wrapper">
							<?php 
							if ( $this->sparklestore_check_installed_plugin( $slug, $filename ) && !$this->sparklestore_check_plugin_active_state( $slug, $filename ) ) : ?>
								<a target="_blank" href="<?php echo esc_url($this->sparklestore_plugin_generate_url('active', $slug, $filename)) ?>" class="button button-primary"><?php esc_html_e( 'Activate', 'sparklestore' ); ?></a>
							<?php 
							elseif( $this->sparklestore_check_installed_plugin( $slug, $filename ) ) : ?>
								<button type="button" class="button button-disabled" disabled="disabled"><?php esc_html_e( 'Installed', 'sparklestore' ); ?></button>
							<?php 
							else : ?>
								<a target="_blank" class="install-now button-primary" href="<?php echo esc_url($this->sparklestore_plugin_generate_url('install', $slug, $filename)) ?>" >
								<?php esc_html_e( 'Install Now', 'sparklestore' ); ?></a>							
							<?php 
							endif; ?>
						</span>
					</div>
				</div>
			<?php
		} ?>
		</div>
	<?php
	}