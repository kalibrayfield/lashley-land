<div class="row">
    <div class="col-md-12 col-lg-8 col-lg-offset-2">
    <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            // Include the page content template.
            the_content();

            // End the loop.
        endwhile;
        ?>
        </div>
</div>