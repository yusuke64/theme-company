<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<?php if(get_option('top_image')): ?>
	<div class="top-thumbnail"><img src="<?php echo esc_html(get_option('top_image')); ?>" alt="トップイメージ"></div>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">
			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php if(get_option('about_title') && get_option('about_text')): ?>
					<section class="topSection">
						<h2 class="topSection-title"><?php echo esc_html(get_option('about_title')); ?></h2>
						<p class="topSection-text"><?php echo esc_html(get_option('about_text')); ?></p>
					</section>
				<?php endif; ?>

				<?php if(get_option('news_title')): ?>
					<?php
						$args = array(
							'posts_per_page' => 3
						);
						$posts = get_posts( $args );

						if($posts):
					?>

						<section class="topSection">
							<h2 class="topSection-title"><?php echo esc_html(get_option('news_title')); ?></h2>

							<?php
								foreach ( $posts as $post ):
								setup_postdata( $post );
							?>

								<div class="newsArea">
									<span class="newsArea-date"><?php the_time('Y-m-d'); ?></span>
									<a class="newsArea-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</div>

							<?php endforeach; ?>

							<?php if(get_option('news_link')): ?>
								<div class="newsLinkArea">
									<a class="newsLinkArea-link" href="<?php echo esc_html(get_option('news_link')); ?>"><?php echo esc_html(get_option('news_linktext')); ?></a>
								</div>
							<?php endif; ?>
						</section>

					<?php endif; ?>
				<?php endif; ?>

				<?php if(get_option('access_title') && get_option('access_map')): ?>
					<section class="topSection">
						<h2 class="topSection-title"><?php echo esc_html(get_option('access_title')); ?></h2>
						<div class="topSection-map"><?php echo get_option('access_map'); ?></div>
					</section>
				<?php endif; ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer(); ?>
