<?php
/**
 * Template Name: front-page
 *
 */
?>

<?php get_header(); ?>

<div class="container-fluid main-pg-bg">
	<div class="section row">
	
		<div class="col-sm-11 col-md-6">
	
		<?php while ( have_posts() ) : the_post(); ?>
		    <?php the_content(); ?>
		<?php endwhile;?>
		</div>
		<div class="col-sm-11 col-md-6">
			<h2>CLICK AN ICON TO SEARCH FOR THE PROPERTY TYPE</h2>
			<div class="row green-bg gold-border">
				<a class="col-sm-3" href="">
					<img src="/uploads/2016/06/farm.png">
					<p>Farm</p>
				</a>
			</div>
		</div>
 </div>


</div>

<?php get_footer(); ?>