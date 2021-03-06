<?php
/**
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 13/01/16
 * Time: 2:24 PM
 */
$header_style = houzez_option('header_style');
?>
<div class="board-header board-header-<?php echo $header_style; ?>">
    <div class="container">
        <div class="board-header-left">
            <h3 class="board-title"><?php the_title(); ?></h3>
        </div>
        <div class="board-header-right">
            <?php
            if( is_page_template('template/submit_property.php') ) { ?>
                <div class="steps-progress-main">
                    <div class="steps-progress">
                        <span style="width: 40%;"></span>
                    </div>
                <?php echo esc_html__('Step', 'houzez'); ?> (<span class="steps-counter">1</span>/<span class="steps-total">1</span>)
                </div>
            <?php
            } else {
                get_template_part( 'inc/breadcrumb' );
            }
            ?>
        </div>
    </div>
</div>