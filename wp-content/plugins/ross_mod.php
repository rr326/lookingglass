<?php
/**
 * @package ross_mod
 * @version 1.6
 */
/*
Plugin Name: Ross Modifications
Description: This is a housing for *slight* modifications required by lookingglasskorean. 
Author: Ross Rosen - rrosen326@gmail.com
Version: 0.0
Author URI: http://rossrosen.me/
*/


/**
 * My Account page
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.0.0
 */

function MOD_woocommerce_my_account(){
    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    wc_print_notices(); 

    printf('<p class="myaccount_user">');

    printf(
        __( 'MOD: Hello <strong>%1$s</strong> (not %1$s? <a href="%2$s">Sign out</a>).', 'woocommerce' ) . ' ',
        $current_user->display_name,
        wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ) )
        );

    printf( __( 'From your account dashboard you can view your recent orders, manage your shipping and billing addresses and <a href="%s">edit your password and account details</a>.', 'woocommerce' ),
        wc_customer_edit_account_url()
        );

    printf('</p>');

    do_action( 'woocommerce_before_my_account' ); 

    wc_get_template( 'myaccount/my-downloads.php' ); 

    wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); 

    wc_get_template( 'myaccount/my-address.php' ); 

    do_action( 'woocommerce_after_my_account' ); 
}
add_shortcode('MOD_woocommerce_my_account', MOD_woocommerce_my_account);


?>
