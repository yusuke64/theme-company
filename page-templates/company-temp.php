<?php
/**
 * Template Name: 会社概要ページ
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
global $max_item_num;

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

					<div class="container">
						<div class="row">

              <div class="company-table">
                <table>

                <?php for($i = 1; $i < $max_item_num; $i++): ?>
                 <?php if(get_post_meta($post->ID, 'itemName'.$i, true)): ?>

                  <tr>
                    <th><?php echo get_post_meta($post->ID, 'itemName'.$i, true); ?></th>
                    <td><?php echo get_post_meta($post->ID, 'item'.$i, true); ?></td>
                  </tr>

                  <?php endif; ?>
                <?php endfor; ?>

                </table>
              </div>

						</div>
          </div>

        <?php if(get_option('access_title') && get_option('access_map')): ?>
					<div class="topSection">
						<p class="topSection-map"><?php echo get_option('access_map'); ?></p>
					</div>
				<?php endif; ?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php get_footer(); ?>
