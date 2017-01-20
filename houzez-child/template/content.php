<?php
/**
 * Template Name: Content
 * Created by KBray.
 * @package Houzez
 * @since Houzez 1.2.4
 */
global $post;
$sticky_sidebar = houzez_option('sticky_sidebar');
?>

<?php get_header(); ?>
    

    <section class="section-detail-content default-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 container-contentbar">
                    <div class="page-main">
                        <div class="article-detail">
                            <?php
                            // Start the loop.
                            while ( have_posts() ) : the_post();

                                // Include the page content template.
                                get_template_part( 'content', 'page' );

                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;

                                // End the loop.
                            endwhile;
                            ?>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
    </section>

<?php get_footer(); ?>








