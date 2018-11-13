<?php
/**
 * The template for displaying the footer.
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */
?>
</div><!-- end #content -->
<!-- Footer Start ============================================= -->
<footer id="colophon" class="site-footer">
<?php
$storexmas_settings = storexmas_get_theme_options();
if ( is_front_page() && is_home() ) {
	if ((function_exists('display_instagram')) && $storexmas_settings['storexmas_instagram_feed_display'] !=1){
		echo do_shortcode('[instagram-feed]');
	}// Default homepage
} elseif ( is_front_page()){
	if ((function_exists('display_instagram')) && $storexmas_settings['storexmas_instagram_feed_display'] !=1){
		echo do_shortcode('[instagram-feed]');
	}//Static homepage
} else {
//silence is golden
}
 
$footer_column = $storexmas_settings['storexmas_footer_column_section'];
	if( is_active_sidebar( 'storexmas_footer_1' ) || is_active_sidebar( 'storexmas_footer_2' ) || is_active_sidebar( 'storexmas_footer_3' ) || is_active_sidebar( 'storexmas_footer_4' )) { ?>
	<div class="widget-wrap">
		<div class="wrap">
			<div class="widget-area">
			<?php
				if($footer_column == '1' || $footer_column == '2' ||  $footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.$footer_column.'">';
					if ( is_active_sidebar( 'storexmas_footer_1' ) ) :
						dynamic_sidebar( 'storexmas_footer_1' );
					endif;
				echo '</div><!-- end .column'.$footer_column. '  -->';
				}
				if($footer_column == '2' ||  $footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.$footer_column.'">';
					if ( is_active_sidebar( 'storexmas_footer_2' ) ) :
						dynamic_sidebar( 'storexmas_footer_2' );
					endif;
				echo '</div><!--end .column'.$footer_column.'  -->';
				}
				if($footer_column == '3' || $footer_column == '4'){
				echo '<div class="column-'.$footer_column.'">';
					if ( is_active_sidebar( 'storexmas_footer_3' ) ) :
						dynamic_sidebar( 'storexmas_footer_3' );
					endif;
				echo '</div><!--end .column'.$footer_column.'  -->';
				}
				if($footer_column == '4'){
				echo '<div class="column-'.$footer_column.'">';
					if ( is_active_sidebar( 'storexmas_footer_4' ) ) :
						dynamic_sidebar( 'storexmas_footer_4' );
					endif;
				echo '</div><!--end .column'.$footer_column.  '-->';
				}
				?>
			</div> <!-- end .widget-area -->
		</div><!-- end .wrap -->
	</div> <!-- end .widget-wrap -->
	<?php } ?>
	<div class="site-info" <?php if($storexmas_settings['storexmas_img-upload-footer-image'] !=''){?>style="background-image:url('<?php echo esc_url($storexmas_settings['storexmas_img-upload-footer-image']); ?>');" <?php } ?>>
	<div class="wrap">
	<?php do_action('storexmas_footer_menu');
	if($storexmas_settings['storexmas_buttom_social_icons'] == 0):
		do_action('storexmas_social_links');
	endif;

	if ( is_active_sidebar( 'storexmas_footer_options' ) ) :
		dynamic_sidebar( 'storexmas_footer_options' );
	else:
		echo '<div class="copyright">'; ?>
		<a title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" target="_blank" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo get_bloginfo( 'name', 'display' ); ?></a> | 
						<?php esc_html_e('Designed by:','storexmas'); ?> <a title="<?php echo esc_attr__( 'Theme Freesia', 'storexmas' ); ?>" target="_blank" href="<?php echo esc_url( 'https://themefreesia.com' ); ?>"><?php esc_html_e('Theme Freesia','storexmas');?></a> |
						<?php  echo '&copy; ' . date_i18n(__('Y','storexmas')) ; ?> <a title="<?php echo esc_attr__( 'WordPress', 'storexmas' );?>" target="_blank" href="<?php echo esc_url( 'https://wordpress.org' );?>"><?php esc_html_e('WordPress','storexmas'); ?></a>
					</div>
	<?php endif; ?>
			<div style="clear:both;"></div>
		</div> <!-- end .wrap -->
	</div> <!-- end .site-info -->
	<?php
		$disable_scroll = $storexmas_settings['storexmas_scroll'];
		if($disable_scroll == 0):?>
			<a class="go-to-top">
				<span class="icon-bg"></span>
				<span class="back-to-top-text"><i class="fa fa-angle-up"></i></span>
				<i class="fa fa-angle-double-up back-to-top-icon"></i>
			</a>
	<?php endif; ?>
	<div class="page-overlay"></div>
</footer> <!-- end #colophon -->
</div><!-- end .site-content-contain -->
</div><!-- end #page -->
<?php wp_footer(); ?>
</body>
</html>