<?php
/**
 * Template Name: EWS Content Basic KH
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper bg-grey-l" id="full-width-page-wrapper ">

	<div class="<?php echo esc_attr( $container ); ?> pt-3 pb-3 mb-5" id="content" style="max-width:1000px; margin:0 auto; text-align:center;">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

<!-- Content Row -->
<div class="jumbotron bg-white">

            <div class="container">
        	<!-- Example row of columns -->
        		<div class="row">
            
          			<div class="col-md-5 ews-intro">
              <p><b>EWS 1294</b> ព្រមានប្រជាជនជាមុនអំពីគ្រោះថ្នាក់ធម្មជាតិដែលកើតឡើងនៅក្នុងប្រទេសកម្ពុជា។ នៅពេលដែលព្រឹត្តិការណ៍មួយដូចជាការជន់លិចត្រូវបានរកឃើញឬទស្សទាយការថតសម្លេងត្រូវបានបញ្ជូនទៅទូរស័ព្ទចល័តរបស់អ្នកប្រើដែលបានចុះឈ្មោះនៅក្នុងតំបន់ដែលមានហានិភ័យ។<br> 
                  <a class="ews-small-link" href="/ទំនាក់ទំនង/">អាន​បន្ថែម
</a></p>
          			</div>
            
          <div class="col-md-7 text-right">
              <p>
                  <img class="ews-logo-strip" src="/wp-content/uploads/sites/4/2019/07/logo-strip.png" width="100%">

              </p>
          </div>
        </div>

          </div>
</div>

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
