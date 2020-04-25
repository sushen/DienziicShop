<div class="getting-started-top-wrap clearfix">
	<div class="theme-steps-list">
		<div class="theme-steps">
			<h3><?php echo esc_html__('Step 1 - Create a new page with "FrontPage Template" Template', 'sparklestore'); ?></h3>
			<ol>
				<li><?php echo esc_html__('Create a new page (any title like Home )', 'sparklestore'); ?></li>
				<li><?php echo esc_html__('In right column, select "FrontPage" for the Page Attributes > Template', 'sparklestore'); ?> </li>
				<li><?php echo esc_html__('Click on Publish', 'sparklestore'); ?></li>
			</ol>
			<a class="button button-primary" target="_blank" href="<?php echo esc_url(admin_url('post-new.php?post_type=page')); ?>"><?php echo esc_html__('Create New Page', 'sparklestore'); ?></a>
		</div>

		<div class="theme-steps">
			<h3><?php echo esc_html__('Step 2 - Set "Your homepage displays" to "A Static Page"', 'sparklestore'); ?></h3>
			<ol>
				<li><?php echo esc_html__('Go to Appearance > Customize > Homepage Settings > Static Front Page', 'sparklestore'); ?></li>
				<li><?php echo esc_html__('Set "Your homepage displays" to "A Static Page"', 'sparklestore'); ?></li>
				<li><?php echo esc_html__('In "Homepage", select the page that you created in the step 1', 'sparklestore'); ?></li>
				<li><?php echo esc_html__('Save changes', 'sparklestore'); ?></li>
			</ol>
			<a class="button button-primary" target="_blank" href="<?php echo esc_url(admin_url('options-reading.php')); ?>"><?php echo esc_html__('Assign Static Page', 'sparklestore'); ?></a>
		</div>

		<div class="theme-steps">
			<h3><?php echo esc_html__('Step 3 - Customizer Options Panel', 'sparklestore'); ?></h3>
			<p><?php echo esc_html__('Now go to Customizer Page. Using the WordPress Customizer you can easily set up the home page and customize the theme.', 'sparklestore'); ?></p>
			<a class="button button-primary" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php echo esc_html__('Go to Customizer Panels', 'sparklestore'); ?></a>
		</div>

	</div>

	<div class="theme-image">
		<h3><?php echo esc_html__('Import Sample Demo', 'sparklestore'); ?></h3>
		<img src="<?php echo esc_url(get_template_directory_uri(). '/screenshot.png'); ?>" alt="<?php echo esc_html__('Buzzstore Demo', 'sparklestore'); ?>">

		<div class="theme-import-demo">
			<?php 
			$sparklestore_demo_importer_slug = 'one-click-demo-import';
			$sparklestore_demo_importer_filename ='one-click-demo-import';
			$sparklestore_import_url = '#';

			if ( $this->sparklestore_check_installed_plugin( $sparklestore_demo_importer_slug, $sparklestore_demo_importer_filename ) && !$this->sparklestore_check_plugin_active_state( $sparklestore_demo_importer_slug, $sparklestore_demo_importer_filename ) ) :
				$sparklestore_import_class = 'button button-primary sparklestore-activate-plugin';
				$sparklestore_import_button_text = esc_html__('Activate Importer Plugin', 'sparklestore');
			elseif( $this->sparklestore_check_installed_plugin( $sparklestore_demo_importer_slug, $sparklestore_demo_importer_filename ) ) :
				$sparklestore_import_class = 'button button-primary';
				$sparklestore_import_button_text = esc_html__('Go to Importer Page >>', 'sparklestore');
				$sparklestore_import_url = admin_url('themes.php?page=pt-one-click-demo-import');
			else :
				$sparklestore_import_class = 'button button-primary sparklestore-install-plugin';
				$sparklestore_import_button_text = esc_html__('Install Importer Plugin', 'sparklestore');
			endif;
			?>

			<p><?php echo sprintf(esc_html__('You can import the demo data with just one click, We recommended to import the demo on a fresh WordPress install with install all theme recommended plugins Or you can reset the website using %s plugin.', 'sparklestore'), '<a target="_blank" href="https://wordpress.org/plugins/wordpress-reset/">WordPress Reset</a>'); ?></p>

			<p><?php echo sprintf(esc_html__('We recommend you backup your website content before attempting to import the demo so you can recover your website if something goes wrong. You can use %s plugin for it.', 'sparklestore'), '<a target="_blank" href="https://wordpress.org/plugins/wordpress-reset/">All in one migration</a>'); ?></p>

			<p><?php echo esc_html__('Click on the button below to install and activate demo importer plugin.', 'sparklestore'); ?></p>
			<a data-slug="<?php echo esc_attr($sparklestore_demo_importer_slug); ?>" data-filename="<?php echo esc_attr($sparklestore_demo_importer_filename); ?>" class="<?php echo esc_attr($sparklestore_import_class); ?>" href="<?php echo esc_url( $sparklestore_import_url ); ?>"><?php echo esc_html($sparklestore_import_button_text); ?></a>
		</div>
	</div>
</div>

<div class="getting-started-bottom-wrap">
	<h3><?php echo esc_html__('Check our premium demos. You might be interested in purchasing premium version.', 'sparklestore'); ?></h3>
	<p><?php echo esc_html__('Check out the all demo sites that you can create with the premium version of the parklestore Pro theme, These all demos you can easily imported with just one click in the premium version theme.', 'sparklestore'); ?></p>

	<div class="recomended-plugin-wrap clearfix">

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() .'/welcome/css/sparklestore.jpg'); ?>" alt="<?php echo esc_html__('Sparklestore Free Demo', 'sparklestore'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Sparklestore Free Demo','sparklestore'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/sparklestore/" class="button button-primary"><?php echo esc_html__('Preview', 'sparklestore'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() .'/welcome/css/sparklestorepro.jpg'); ?>" alt="<?php echo esc_html__('Technology Demo premium', 'sparklestore'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Technology Demo Premium','sparklestore'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/sparklestorepro/" class="button button-primary"><?php echo esc_html__('Preview', 'sparklestore'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() .'/welcome/css/jewellery.jpg'); ?>" alt="<?php echo esc_html__('Jewellery Demo premium', 'sparklestore'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Jewellery Demo Premium','sparklestore'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/sparklestorepro/jewellery/" class="button button-primary"><?php echo esc_html__('Preview', 'sparklestore'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri(). '/welcome/css/clothing.jpg'); ?>" alt="<?php echo esc_html__('Clothing Demo premium', 'sparklestore'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Clothing Demo Premium','sparklestore'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/sparklestorepro/clothing/" class="button button-primary"><?php echo esc_html__('Preview', 'sparklestore'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/medical.jpg'); ?>" alt="<?php echo esc_html__('Mediacl Demo premium', 'sparklestore'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Medical Demo Premium','sparklestore'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/sparklestorepro/medical/" class="button button-primary"><?php echo esc_html__('Preview', 'sparklestore'); ?></a>
				</span>
			</div>
		</div>

		<div class="recom-plugin-wrap">
			<div class="plugin-img-wrap">
				<img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/cosmetics.jpg'); ?>" alt="<?php echo esc_html__('Cosmetics Demo premium', 'sparklestore'); ?>">
			</div>

			<div class="plugin-title-install clearfix">
				<span class="title"><?php esc_html_e('Cosmetics Demo Premium','sparklestore'); ?></span>
				<span class="plugin-btn-wrapper">
					<a target="_blank" href="http://demo.sparklewpthemes.com/sparklestorepro/cosmetics/" class="button button-primary"><?php echo esc_html__('Preview', 'sparklestore'); ?></a>
				</span>
			</div>
		</div>

	</div>
</div>

<div class="upgrade-box">
	<div class="upgrade-box-text">
		<h3><?php echo esc_html__('Upgrade To Premium Version (Sparklestore Pro)', 'sparklestore'); ?></h3>
		<p><?php echo esc_html__('Sparklestore Pro theme you can create a beautiful website. if you want to unlock more possibilities then upgrade to premium version theme to create different various design layout online eCommerce websites pea as you want.', 'sparklestore'); ?></p>
		<p><?php echo esc_html__('Try the Premium version and check if it fits to your need or not.', 'sparklestore'); ?></p>
	</div>

	<a class="upgrade-button" href="https://sparklewpthemes.com/wordpress-themes/sparklestorepro/" target="_blank"><?php esc_html_e('Upgrade Now', 'sparklestore'); ?></a>
</div>