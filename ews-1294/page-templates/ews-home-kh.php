 <?php
/**
 * Template Name: Home EWS KH
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
            <h2 class="stat-head text-grey">ចុះឈ្មោះ</h2>
              <h2  id="register" class="stat-highlight text-light">&nbsp; ---<sup>+</sup>
			</h2>
          	</div>
            
         
              <div class="col-md-4 ews-stats-item">
            <h2 class="stat-head text-grey">ឧបករណ៏បានតំលើង</h2>
                        <h2  id="sensor1" class="stat-highlight text-light">19
			</h2>
  <h2  id="sensor" class="d-none">19
			</h2>
          	</div>
            
           <div class="col-md-4 ews-stats-item">
            <h2 class="stat-head text-grey">ចំនួនដែលបានផ្ញើរសារ</h2>
               <h2  id="alert" class="stat-highlight text-light">&nbsp; ---<sup>+</sup>
			</h2>
          	</div>
            
        </div>
          </div>

      </div>

<!-- Content Row -->
<div class="jumbotron bg-white">

            <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            
 
            
          <div class="col-md-5 text-left">
              <p>
                  <img class="ews-logo-strip" src="/wp-content/uploads/sites/4/2019/07/partners-2019.png" width="100%">

              </p>
          </div>
<div class="col-md-1 text-left"></div>
                   <div class="col-md-6 ews-intro">
              <p><b>EWS 1294</b> ព្រមានប្រជាជនជាមុនអំពីគ្រោះថ្នាក់ធម្មជាតិដែលកើតឡើងនៅក្នុងប្រទេសកម្ពុជា។ នៅពេលដែលព្រឹត្តិការណ៍មួយដូចជាការជន់លិចត្រូវបានរកឃើញឬទស្សទាយការថតសម្លេងត្រូវបានបញ្ជូនទៅទូរស័ព្ទចល័តរបស់អ្នកប្រើដែលបានចុះឈ្មោះនៅក្នុងតំបន់ដែលមានហានិភ័យ។<br> 
               <br>   <a class="ews-small-link" href="">អាន​បន្ថែម
</a></p>
          </div>
       
        </div>

                </div>
      </div>


	

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
