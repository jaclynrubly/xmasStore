<?php
/**
 * Displays the header content
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php
$storexmas_settings = storexmas_get_theme_options(); ?>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif;
wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
<!-- Masthead ============================================= -->
<header id="masthead" class="site-header">
	<div class="header-wrap">
			<?php the_custom_header_markup(); ?>
		<!-- Top Header============================================= -->
		<div class="top-header">
			<?php if(is_active_sidebar( 'storexmas_header_info' ) || has_nav_menu( 'top-menu' ) || class_exists( 'woocommerce' )): ?>
				<div class="top-bar">
					<div class="wrap">
						<?php
						if( is_active_sidebar( 'storexmas_header_info' )) {
							dynamic_sidebar( 'storexmas_header_info' );
						} ?>
						<div class="right-top-bar">

							<?php if(has_nav_menu ('top-menu')){ ?>

							<div class="top-bar-menu">
								<div class="top-menu-toggle">			
									<i class="fa fa-bars"></i>
							  	</div>
								<?php
									wp_nav_menu( array(
										'container' 	=> '',
										'theme_location' => 'top-menu',
										'depth'          => 1,
										'items_wrap'      => '<ul class="top-menu">%3$s</ul>',
									) );
								?>
							</div> <!-- end .top-bar-menu -->
							<?php }

							if ( class_exists( 'woocommerce' ) ) { ?>
								<div class="cart-box">
									<div class="sx-cart-views">
										<a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="wcmenucart-contents">
											<i class="fa fa-shopping-cart"></i>
											<span class="cart-value"><?php echo wp_kses_data ( WC()->cart->get_cart_contents_count() ); ?></span>
										</a>
										<div class="my-cart-wrap">
											<div class="my-cart"><?php esc_html_e('Total', 'storexmas'); ?></div>
											<div class="cart-total"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></div>
										</div>
									</div>
									
									<?php the_widget( 'WC_Widget_Cart', '' ); ?>
								</div> <!-- end .cart-box -->
								<?php } ?>

						</div> <!-- end .right-top-bar -->

					</div> <!-- end .wrap -->
				</div> <!-- end .top-bar -->
			<?php endif; ?>

			<!-- Main Header============================================= -->
			<?php

			if( $storexmas_settings['storexmas_logo_sitetitle_display'] == 'above_menubar') {
				do_action('storexmas_site_branding');
			} ?>
			<div id="sticky-header" class="clearfix">
				<div class="wrap">
					<div class="main-header clearfix">

						<!-- Main Nav ============================================= -->
						<?php

						if( $storexmas_settings['storexmas_logo_sitetitle_display'] == 'on_menubar') {
							do_action('storexmas_site_branding');
						}

						if($storexmas_settings['storexmas_disable_main_menu']==0){ ?>
							<nav id="site-navigation" class="main-navigation clearfix" role="navigation">
							<?php if (has_nav_menu('primary')) {
								$args = array(
								'theme_location' => 'primary',
								'container'      => '',
								'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>',
								); ?>
							
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
									<span class="line-bar"></span>
								</button><!-- end .menu-toggle -->
								<?php wp_nav_menu($args);//extract the content from apperance-> nav menu
								} else {// extract the content from page menu only ?>
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
									<span class="line-bar"></span>
								</button><!-- end .menu-toggle -->
								<?php	wp_page_menu(array('menu_class' => 'menu', 'items_wrap'     => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>'));
								} ?>
							</nav> <!-- end #site-navigation -->
						<?php }

						if($storexmas_settings['storexmas_top_social_icons'] == 0):
							echo '<div class="header-social-block">';
								do_action('storexmas_social_links');
							echo '</div>'.'<!-- end .header-social-block -->';
						endif;

						 $search_form = $storexmas_settings['storexmas_search_custom_header'];
						if (1 != $search_form) { ?>
							<div id="search-toggle" class="header-search"></div>
							<div id="search-box" class="clearfix">
								<?php get_search_form();?>
							</div>  <!-- end #search-box -->
						<?php }

						$storexmas_side_menu = $storexmas_settings['storexmas_side_menu'];
						if(1 != $storexmas_side_menu){ 
							if (has_nav_menu('side-nav-menu') || (has_nav_menu( 'social-link' ) && $storexmas_settings['storexmas_side_menu_social_icons'] == 0 ) || is_active_sidebar( 'storexmas_side_menu' )):?>
								<div class="show-menu-toggle">			
									<span class="sn-text"><?php _e('Menu Button','storexmas'); ?></span>
									<span class="bars"></span>
							  	</div>
					  	<?php endif;
					  	} ?>

					</div><!-- end .main-header -->
				</div> <!-- end .wrap -->
			</div><!-- end #sticky-header -->

			<?php

			if( $storexmas_settings['storexmas_logo_sitetitle_display'] == 'below_menubar') {
				do_action('storexmas_site_branding');
			} ?>

		</div><!-- end .top-header -->
		<?php if(1 != $storexmas_side_menu){
			if (has_nav_menu('side-nav-menu') || (has_nav_menu( 'social-link' ) && $storexmas_settings['storexmas_side_menu_social_icons'] == 0 ) || is_active_sidebar( 'storexmas_side_menu' )): ?>
				<div class="side-menu">
				  <div class="side-menu-wrap" tabindex="0">
				  		<div class="hide-menu-toggle">			
							<span class="bars"></span>
					  	</div>

					  	<div id="site-branding">
							<div id="site-detail">
								<h2 id="site-title">
									<a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_html(get_bloginfo('name', 'display'));?>"><?php bloginfo('name');?></a>
								</h2>
								<!-- end #site-title -->
								<div id="site-description"><?php bloginfo('description');?></div>
								<!-- end #site-description -->
							</div>
						</div>
						<!-- end #site-branding -->

						<?php if (has_nav_menu('side-nav-menu')) {
							$args = array(
								'theme_location' => 'side-nav-menu',
								'container'      => '',
								'items_wrap'     => '<ul class="side-menu-list">%3$s</ul>',
								); ?>
						<nav class="side-nav-wrap">
							<?php wp_nav_menu($args); ?>
						</nav><!-- end .side-nav-wrap -->
						<?php }
						if($storexmas_settings['storexmas_side_menu_social_icons'] == 0):
							do_action('storexmas_social_links');
						endif;

						if( is_active_sidebar( 'storexmas_side_menu' )) {
							echo '<div class="side-widget-tray">';
								dynamic_sidebar( 'storexmas_side_menu' );
							echo '</div> <!-- end .side-widget-tray -->';
						} ?>
					</div><!-- end .side-menu -->
				</div><!-- end .side-menu-wrap -->
		<?php endif;
		} ?>
	</div><!-- end .header-wrap -->
	<!-- Main Slider ============================================= -->
	<?php
		$storexmas_enable_slider = $storexmas_settings['storexmas_enable_slider'];
		if ($storexmas_enable_slider=='frontpage'|| $storexmas_enable_slider=='enitresite'){
			 if(is_front_page() && ($storexmas_enable_slider=='frontpage') ) {

			 	if(is_active_sidebar( 'slider_section' )){

			 		dynamic_sidebar( 'slider_section' );

			 	} else {

			 		if($storexmas_settings['storexmas_slider_type'] == 'default_slider') {
						storexmas_category_sliders();

					} else {

						if(class_exists('StoreXmas_Plus_Features')):
							do_action('storexmas_image_sliders');
						endif;
					}

			 	}
			 	

				
			}
			if($storexmas_enable_slider=='enitresite'){

				if(is_active_sidebar( 'slider_section' )){

			 		dynamic_sidebar( 'slider_section' );

			 	} else {

			 		if($storexmas_settings['storexmas_slider_type'] == 'default_slider') {

							storexmas_category_sliders();

					} else {

						if(class_exists('StoreXmas_Plus_Features')):

							do_action('storexmas_image_sliders');

						endif;
					}
			 	}

				
			}
		} ?>
</header> <!-- end #masthead -->

<!-- Main Page Start ============================================= -->
<div class="site-content-contain">
	<div id="content" class="site-content">
	<?php
	if(is_front_page()){

		do_action('storexmas_display_front_page_product_brand');
		do_action('storexmas_display_front_page_product_categories'); 
	}