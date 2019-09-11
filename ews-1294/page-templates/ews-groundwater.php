 <?php
/**
 * Template Name: Groundwater Page
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

<style>
.map-legend .alert {border:3px solid #ffffff ;}
.alert-success {background: #8eedc4;}
.alert-warning {border:3px solid #f9d84e;}
.alert-danger {border:3px solid #ec1c24;}


</style>  

<div class="wrapper home-template bg-grey-l" id="full-width-page-wrapper">

<div class="<?php echo esc_attr( $container ); ?> pt-0 pb-1 mb-0" id="content" style="margin:0 auto; text-align:center;">

		<div class="row">

			<div class="col-lg-12 content-area" id="primary">
<h1 class="entry-title pt-5"><?php the_title(); ?> 
</h1>
<p class="p-3 map-legend"> 

<button class="alert alert-success m-1" role="alert">
  Normal
</button>
<button class="alert alert-warning m-1" role="alert">
  Warning
</button>
<button class="alert alert-danger m-1" role="alert">
  Severe
</button>
<button class="alert alert-dark m-1" role="alert">
  Inactive
</button>
</p>

				<main class="site-main d-none" id="main" role="main">

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


<main role="main">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
 
    <div class="carousel-inner">
      	<div class="carousel-item active">
				
	  <div id="map" class="pin_map" style="height: 650px;"> </div> 
	   
	
	</div>
</div>
	
		
  </div>





	

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
