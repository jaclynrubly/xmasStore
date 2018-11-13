<?php
/**
 * The template for displaying all single posts.
 *
 * @package Theme Freesia
 * @subpackage StoreXmas
 * @since StoreXmas 1.0
 */
get_header();
$storexmas_settings = storexmas_get_theme_options();
$storexmas_display_page_single_featured_image = $storexmas_settings['storexmas_display_page_single_featured_image']; ?>
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php global $storexmas_settings;
			while( have_posts() ) {
				the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
					<?php if(has_post_thumbnail() && $storexmas_display_page_single_featured_image == 0 ){ ?>
						<div class="post-image-content">
							<figure class="post-featured-image">
								<?php the_post_thumbnail(); ?>
							</figure>
						</div><!-- end.post-image-content -->
					<?php } ?>
					<div class="post-all-content">
						<?php $storexmas_entry_meta_single = $storexmas_settings['storexmas_entry_meta_single']; ?>
						<header class="entry-header">
							<?php if($storexmas_entry_meta_single=='show'){ ?>
								<div class="entry-meta">
									<?php printf( '<span class="posted-on"><a href="%1$s" title="%2$s"><i class="fa fa-calendar-check-o"></i>%3$s</a></span>',
										esc_url(get_the_permalink()),
										esc_attr( get_the_time() ),
										esc_attr(get_the_time( get_option( 'date_format' ) ))
									); ?>
								</div>
								<?php } ?>
								<h1 class="entry-title"><?php the_title();?></h1> <!-- end.entry-title -->
								<?php if($storexmas_entry_meta_single=='show'){ ?>
								<div class="entry-meta">
									<span class="author vcard"><?php esc_html_e('Post By','storexmas');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author(); ?>">
									<?php the_author(); ?> </a></span>
									<?php 
									$format = get_post_format();
									if ( current_theme_supports( 'post-formats', $format ) ) {
											printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
												sprintf( ''),
												esc_url( get_post_format_link( $format ) ),
												get_post_format_string( $format )
											);
										} 
										if ( is_singular( 'post' ) ) { ?>
											<span class="cat-links">
												<?php the_category(', '); ?>
											</span>
											<!-- end .cat-links -->
											<?php $tag_list = get_the_tag_list( '', __( ', ', 'storexmas' ) );
											if(!empty($tag_list)){ ?>
												<span class="tag-links">
												<?php   echo get_the_tag_list( '', __( ', ', 'storexmas' ) ); ?>
												</span> <!-- end .tag-links -->
											<?php }
										}else{ ?>
										<nav id="image-navigation" class="navigation image-navigation">
											<div class="nav-links">
												<div class="nav-previous"><?php previous_image_link( false, __( 'Previous Image', 'storexmas' ) ); ?></div>
												<div class="nav-next"><?php next_image_link( false, __( 'Next Image', 'storexmas' ) ); ?></div>
											</div><!-- .nav-links -->
										</nav><!-- .image-navigation -->
									<?php	} ?>
									<?php if ( comments_open() ) { ?>
									<span class="comments"><i class="fa fa-comments-o"></i>
									<?php comments_popup_link( __( 'No Comments', 'storexmas' ), __( '1 Comment', 'storexmas' ), __( '% Comments', 'storexmas' ), '', __( 'Comments Off', 'storexmas' ) ); ?> </span>
									<?php } ?>
								</div><!-- end .entry-meta -->
							<?php } ?>
						</header>
						<!-- end .entry-header -->
						<div class="entry-content">
								<?php the_content(); ?>			
						</div><!-- end .entry-content -->
					</div> <!-- end .post-all-content -->
				</article><!-- end .post -->
				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				if ( is_singular( 'attachment' ) ) {
					// Parent post navigation.
					the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'storexmas' ),
							) );
				} elseif ( is_singular( 'post' ) ) {
				the_post_navigation( array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'storexmas' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Next post:', 'storexmas' ) . '</span> ' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'storexmas' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Previous post:', 'storexmas' ) . '</span> ' .
							'<span class="post-title">%title</span>',
					) );
				}
			} ?>
		</main><!-- end #main -->
	</div> <!-- #primary -->
<?php
get_sidebar();
?>
</div><!-- end .wrap -->
<?php
get_footer();