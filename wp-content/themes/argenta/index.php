<?php
	get_header();

	$published_posts = $GLOBALS['wp_query']->found_posts;
	
	if ( get_query_var( 'paged' ) ) { 
		$pagination_page = get_query_var( 'paged' ); 
	} elseif ( get_query_var( 'page' ) ) {
		$pagination_page = get_query_var( 'page' ); 
	} else { 
		$pagination_page = 1;
	}

	$posts_per_page = \Argenta\Settings::posts_per_page();

	$posts_offset = ( $pagination_page - 1 ) * $posts_per_page;
	$paginator_all = ceil( $published_posts / (int) $posts_per_page );

	$posts_show_from = $posts_offset + 1;
	$posts_show_to = $posts_offset + $posts_per_page;
	if ( $posts_show_to > $published_posts ) {
		$posts_show_to = $published_posts;
	}

	// Sidebar
	$sidebar_position = \Argenta\Settings::get( 'blog_sidebar', 'global' );
	if ( ! $sidebar_position ) { $sidebar_position = 'without'; }
	$sidebar_page_class = '';
	if ( $sidebar_position == 'left' ) {
		$sidebar_page_class = 'page-with-left-sidebar';
	}
	if ( $sidebar_position == 'right' ) {
		$sidebar_page_class = 'page-with-right-sidebar';
	}

	$page_wrapped = \Argenta\Settings::page_is_wrapped();

	// Grid style
	$posts_grid = \Argenta\Settings::get( 'blog_page_layout', 'global' );
	if ( ! $posts_grid ) { $posts_grid = 'masonry'; }
	$grid_style_class = ( $posts_grid == 'masonry' ) ? 'blog-posts-masonry' : 'blog-posts-classic';

	// Columns
	$columns_num = \Argenta\Settings::get( 'blog_columns_in_row', 'global' );
	if ( ! isset( $columns_num ) ) {
		$columns_num = '2-1-1-1';
	}
	if ( $posts_grid == 'classic' ) { 
		$columns_num = '1-1-1-1'; 
	}
	$columns_class = \Argenta\Helper::parse_columns_to_css( $columns_num, false );
	$columns_double_class = \Argenta\Helper::parse_columns_to_css( $columns_num, true );

	$grid_item_style_class = '';
	$posts_without_paddings = (bool) \Argenta\Settings::get( 'blog_items_without_padding', 'global' );
	if ( $posts_without_paddings ) {
		$grid_item_style_class .= ' post-offset';
	}

	if ( have_posts() ) :
?>

	<?php get_template_part( 'template-parts/elements/header-title' ); ?>

	<?php get_template_part( 'template-parts/elements/breadcrumbs' ); ?>

	<div class="<?php echo esc_attr( $page_wrapped ) ? 'wrapped-container' : 'full-width-container'; ?>">

		<?php if ( $sidebar_position == 'left' ) : ?>
		<div class="vc_col-md-3 page-sidebar">
			<aside id="secondary" class="widget-area">
				<?php dynamic_sidebar( 'argenta-sidebar-blog' ); ?>
			</aside>
		</div>
		<?php endif; ?>

		<div id="primary" class="content-area">
			<div class="vc_col-md-<?php if ( $sidebar_position == 'without' ) { echo '12'; } else { echo esc_attr( '9 ' . $sidebar_page_class ); } ?> page-offset-bottom">
				<main id="main" class="site-main">
					<div class="vc_row <?php echo esc_attr( $grid_style_class ); ?>">
					<?php
						$posts_layout_item = get_field( 'global_blog_item_layout_type', 'option' );
						while ( have_posts() ) : the_post();
							$parsed_post = argenta_gh_parse_post_object( $post );
							argenta_gh_set_current_item_data( $parsed_post );

							$col_class = $columns_class;
							$grid_class = ' grid-item';

							if ( $parsed_post['grid_style'] == '2col' ) {
								$col_class = $columns_double_class;
								$grid_class = '';
							}

							echo '<div class="' . esc_attr( $col_class . $grid_class . $grid_item_style_class . ( ( $posts_grid == 'masonry' ) ? ' blog-post-masonry' : '' ) ) . '">';
								get_template_part( 'template-parts/blog/default' );
							echo '</div>';
						endwhile;
					?>
					</div>
						
					<?php
						// Paginator
						if ( $paginator_all > 1 ) {
							\Argenta\Layout::the_paginator_layout( $pagination_page, $paginator_all );
						}
					?>
				</main>
			</div>
		</div><!-- #primary -->

		<?php if ( $sidebar_position == 'right' ) : ?>
		<div class="vc_col-md-3 page-sidebar">
			<aside id="secondary" class="widget-area">
				<?php dynamic_sidebar( 'argenta-sidebar-blog' ); ?>
			</aside>
		</div>
		<?php endif; ?>

	</div>

<?php else : ?>

	<?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif;

	get_footer();

?>