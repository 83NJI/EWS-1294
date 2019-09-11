 <?php
/**
 * Template Name: Home EWS
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

<div class="wrapper home-template" id="full-width-page-wrapper">


<main role="main">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
 
    <div class="carousel-inner">
      	<div class="carousel-item active">
				
	  <div id="map" class="pin_map" style="height: 520px;"> </div>
	  
	
	</div>
</div>
	
		
  </div>

<div class="jumbotron bg-dark">
      <div class="container">
        <!-- Example row of columns -->
        <div class="row text-center ews-stats">
          
            <div class="col-md-4 ews-stats-item">
            <h2 class="stat-head text-grey">Registered Users</h2>
              <h2  id="register" class="stat-highlight text-light">&nbsp; ---<sup>+</sup>
			</h2>
          	</div>
            
         
              <div class="col-md-4 ews-stats-item">
            <h2 class="stat-head text-grey">Active Sensors</h2>
                  <h2  id="sensor1" class="stat-highlight text-light">19
			</h2>
  <h2  id="sensor" class="d-none">19
			</h2>
          	</div>
            
           <div class="col-md-4 ews-stats-item">
            <h2 class="stat-head text-grey">Alerts Sent</h2>
               <h2  id="alert" class="stat-highlight text-light">&nbsp; ---<sup>+</sup>
			</h2>
          	</div>
            
        </div>
          </div>

      </div>

<!-- Content Row -->
<div class="jumbotron bg-white">

            <div class="container">
        
    
        <div class="row">
            

            
          <div class="col-md-5 text-left">
              <p>
                  <img class="ews-logo-strip" src="/wp-content/themes/ews1294/img/partners-2019.png" width="100%">

              </p>
          </div>
<div class="col-md-1"></div>

          <div class="col-md-6 ews-intro">
              <h4><b>EWS 1294</b> warns people in advance of natural hazards occurring in Cambodia.</h4> <p>When an event such as flooding is detected or predicted, a
voice recording is sent to the mobile phones of registered users in the areas at risk. <br><br> 
                  <a class="ews-small-link" href="/how-it-works">Read More
</a></p>
          </div>
       
        </div>

                </div>
      </div>


	

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
