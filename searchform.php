<?php
/**
 * Displays the searchform
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */
?>
<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<?php
		$storexmas_settings = storexmas_get_theme_options();
		$storexmas_search_form = $storexmas_settings['storexmas_search_text'];
		if($storexmas_search_form !='Search &hellip;'): ?>
	<input type="search" name="s" class="search-field" placeholder="<?php echo esc_attr($storexmas_search_form); ?>" autocomplete="off" />
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	<?php else: ?>
	<input type="search" name="s" class="search-field" placeholder="<?php esc_attr_e( 'Search &hellip;', 'storexmas' ); ?>" autocomplete="off">
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	<?php endif; ?>
</form> <!-- end .search-form -->