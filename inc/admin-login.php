<?php 
/**
 * This contains all the settings for the login page and for restricting the
 * admin bar and admin area from users
 */

/**
 * Add PIPELINE custom stylesheet to the login page
 */
function launch_login_stylesheet() { ?>
    <link rel="stylesheet" id="launch_wp_login_css"  href="<?php echo get_stylesheet_directory_uri() . '/css/login.css'; ?>" type="text/css" media="all" />
<?php }
add_action( 'login_enqueue_scripts', 'launch_login_stylesheet' );

/**
 * Filter the link on the login form logo
 *
 * @return string|void
 */
function launch_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'launch_login_logo_url' );

/**
 * Filter the title attribute on the login form logo
 *
 * @return string
 */
function launch_login_logo_url_title() {
    return get_bloginfo( 'name' ) . ': ' . get_bloginfo( 'description' );
}
add_filter( 'login_headertitle', 'launch_login_logo_url_title' );

/**
 * Only show the admin bar for people that can edit posts
 */
function launch_hide_admin_bar( $show_admin_bar ) {
    // if ( !current_user_can( 'edit_posts' ) ) {
    //     return false;
    // }
    return $show_admin_bar;
}
add_filter( 'show_admin_bar', 'launch_hide_admin_bar' );

/**
 * Redirect subscribers to the homepage if they try to access the dashboard
 */
function launch_hide_dashboard() {
    if ( is_admin() && !current_user_can( 'edit_posts' ) && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {
        wp_safe_redirect( home_url( '/' ) );
    }
}
add_action( 'admin_init', 'launch_hide_dashboard' );

/**
 * Add a custom message to the `wp-login.php` page
 */
function launch_login_message( $message ) {
    if ( $launch_msg = get_field( 'launch_login_message', 'option' ) ) {
        $message .= force_balance_tags( $launch_msg );
    }
    return $message;
}
add_filter( 'login_message', 'launch_login_message' );

/**
 * Remove other menus from admin bar for subscribers
 */
function launch_custom_admin_bar() {
    remove_action( 'admin_bar_menu', 'wp_admin_bar_wp_menu' );
    if ( current_user_can( 'edit_posts' ) )
        return;

    remove_action( 'admin_bar_menu', 'wp_admin_bar_sidebar_toggle' );
    remove_action( 'admin_bar_menu', 'wp_admin_bar_my_sites_menu' );
    remove_action( 'admin_bar_menu', 'wp_admin_bar_site_menu', 30 );
    remove_action( 'admin_bar_menu', 'wp_admin_bar_updates_menu' );
    // remove_action( 'admin_bar_menu', 'wp_admin_bar_search_menu' );
}
add_action( 'add_admin_bar_menus', 'launch_custom_admin_bar' );

/**
 * Replace the "Howdy" verbage in the admin bar
 */
function launch_replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Welcome,', $my_account->title );
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'launch_replace_howdy',25 );