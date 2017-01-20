<?php
if ( is_page_template( 'template/template-splash.php' ) ) {
    $css_class = 'header-section slpash-header';
} else {
    $css_class = 'header-section-4 not-splash-header';
}

$allowed_html = array();

global $current_user, $post;
wp_get_current_user();
$userID  =  $current_user->ID;
$user_custom_picture =  get_the_author_meta( 'fave_author_custom_picture' , $userID );
$header_layout = houzez_option('header_4_width');
$main_menu_sticky = houzez_option('main-menu-sticky');
$header_4_menu_align = houzez_option('header_4_menu_align');
$top_bar = houzez_option('top_bar');

$trans_class = '';
$fave_main_menu_trans = get_post_meta( $post->ID, 'fave_main_menu_trans', true );
if( $fave_main_menu_trans == 'yes' ) {
    $trans_class = 'header-transparent';
}

if( $top_bar != 0 ) {
    get_template_part('inc/header/top', 'bar');
}
$menu_righ_no_user = '';
$header_login = houzez_option('header_login');
if( $header_4_menu_align == 'nav-right' && $header_login != 'yes' ) {
    $menu_righ_no_user = 'menu-right-no-user';
}
?>
<!--start section header-->
<header id="header-section" class="houzez-header-main shadow <?php echo esc_attr( $css_class ).' '.esc_attr( $header_4_menu_align ).' '.esc_attr($trans_class).' '.esc_attr($menu_righ_no_user); ?> " data-sticky="<?php echo esc_attr( $main_menu_sticky ); ?>">
    <div class="<?php echo sanitize_html_class( $header_layout ); ?>">
        <div id="header-top" class="container-fluid visible-lg">
            
            <div class="col-sm-4 col-md-3">
                <?php get_template_part('inc/header/logo'); ?>
            </div>
            <div class="col-sm-8 col-md-9">
                <div class="row" style="text-align: right;">
                    <?php if( class_exists('Houzez_login_register') ): ?>
                    <?php if( houzez_option('header_login') != 'no' || houzez_option('create_lisiting_enable') != 0 ): ?>
    
                    <?php get_template_part('inc/header/login', 'nav'); ?>

                    <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="row" style="text-align: right;">
                    <a class="header-phone-number" href="">(308) 532-9300</a>
                </div>
            </div>
        </div>
        
        <nav class="navi main-nav container-fluid visible-lg">
        <?php
        // Pages Menu
        if ( has_nav_menu( 'main-menu' ) ) :
            wp_nav_menu( array (
                'theme_location' => 'main-menu',
                'container' => '',
                'container_class' => '',
                'menu_class' => '',
                'menu_id' => 'main-nav',
                'depth' => 4
            ));
        endif;
        ?>
        </nav>
        
            
            
        </div>

        
    </div>

</header>
<!--end section header-->

<?php get_template_part( 'inc/header/mobile-header' ); ?>
