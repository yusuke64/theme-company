<?php
/**
 * Template Name: news一覧
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<?php
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;

  $args = array(
    'post_type' => 'post',
		'posts_per_page' => 6,
		'paged' => $paged
	);

	$st_query = new WP_Query( $args );
	$GLOBALS['wp_query']->max_num_pages = $st_query->max_num_pages;
?>

<div class="wrapper news" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>


			<main class="site-main" id="main">

				<header class="page-header">
					<h1><?php the_title(); ?></h1>
				</header><!-- .page-header -->

				<?php if ( $st_query->have_posts() ) : ?>

					<div class="container allNews">
						<div class="row">

							<?php while ( $st_query->have_posts() ) : $st_query->the_post(); ?>

							<div class="col-md-4">
								<a class="allNews-item" href="<?php the_permalink(); ?>">

									<div class="allNews-thumbnail">
										<?php if( get_the_post_thumbnail() ) : ?>
											<?php the_post_thumbnail(); ?>
										<?php else: ?>
											<img src="<?php echo get_option('no_image'); ?>" alt="no image">
										<?php endif; ?>
									</div>

									<p class="allNews-date"><?php the_time('Y-m-d'); ?></p>
									<p class="allNews-title"><?php the_title(); ?></p>
								</a>
							</div>

							<?php endwhile; ?>

						</div>
					</div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

				<!-- The pagination component -->
				<?php understrap_pagination(); ?>

				<?php wp_reset_postdata(); ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php get_footer(); ?>
