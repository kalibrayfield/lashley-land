<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 17/12/15
 * Time: 4:47 PM
 */

global $post, $prop_images, $houzez_local, $current_page_template, $taxonomy_name;
$disable_favorite = houzez_option('disable_favorite');
$disable_compare = houzez_option('disable_compare');
$prop_video_url = get_post_meta(get_the_ID(), 'fave_video_url', true);
$prop_video_img = get_post_meta(get_the_ID(), 'fave_video_image', true);
?>
<ul class="actions">

    <?php if( $disable_favorite != 0 ) { ?>
    <!-- to remove favorite ========<li>
        <span data-placement="top" data-toggle="tooltip" data-original-title="<?php echo $houzez_local['favorite']; ?>">
            <?php get_template_part( 'template-parts/favorite' ); ?>
        </span>
    </li> =========== to close removing favorite -->
    <?php } ?>

        <?php get_template_part( 'template-parts/share' );
if (!empty($prop_video_url) && !empty($prop_video_img)) {
        ?>
        <li>
	<span><!--add span to get red background to work again-->
            <!-- added video button to go straight to the video on the property detail page-->
            <a href="<?php echo get_the_permalink($post->ID) . '#video' ?>">
                <span class="video-icon" data-toggle="tooltip" data-placement="top" title="video of property">
                    <i class="fa fa-play"></i>
                </span>
            </a>
	</span><!--added ending span to get red background-->
        </li>
    <?php } ?>
    <li>
	<span><!--add span to get red background to work again-->
        <a href="<?php echo get_the_permalink($post->ID) ?>">
            <span data-toggle="tooltip" data-placement="top" title="(<?php echo count($prop_images); ?>) <?php echo $houzez_local['photos']; ?>">
                <i class="fa fa-camera"></i>
            </span>
        </a>
	</span><!--added ending span to get red background-->
    </li>
    <?php if( $disable_compare != 0 ) { ?>
    <li>
        <span id="compare-link-<?php echo esc_attr( $post->ID ); ?>" class="compare-property" data-propid="<?php echo esc_attr( $post->ID ); ?>" data-toggle="tooltip" data-placement="top" title="<?php esc_html_e( 'Compare', 'houzez' ); ?>">
            <i class="fa fa-plus"></i>
        </span>
    </li>
    <?php } ?>
</ul>
