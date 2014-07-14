<?php
/**
 * Ross Modifications
 * This is a very important page for LookingGlass, so I wanted to customize it. It's certainly 
 * a bit of hack, but should be ok.  It's mostly copied and merged from existing code.
 */
?>


<?php
/**
 * My Account page
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_my_account' ); ?>

<p class="myaccount_user">
    <a  class="button" href='<?php printf("%s", wc_customer_edit_account_url()); ?>'> Edit email/PW
    </a>
    <a  class="button" href='<?php printf("%s", wc_get_endpoint_url( 'edit-address', 'billing')); ?>'> Edit Account Info
    </a>
    <br>
    <?php
    printf( __( 'Not %s? <a href="%s">Sign out</a> ' ),
    $current_user->display_name,
    wp_logout_url( get_permalink( wc_get_page_id( 'myaccount' ) ))
    );
    ?>
</p>



<p><strong>Please confirm this data is complete!</strong></p>


<?php
// This is inlined from form-edit-address, but the following two variables need to be initialized.
$load_address="billing";
// from class-wc-shortcode-my-account.php
$address = WC()->countries->get_address_fields( get_user_meta( get_current_user_id(), $load_address . '_country', true ), $load_address . '_' );
// Prepare values
foreach ( $address as $key => $field ) {

    $value = get_user_meta( get_current_user_id(), $key, true );

    if ( ! $value ) {
        switch( $key ) {
            case 'billing_email' :
            case 'shipping_email' :
            $value = $current_user->user_email;
            break;
            case 'billing_country' :
            case 'shipping_country' :
            $value = WC()->countries->get_base_country();
            break;
            case 'billing_state' :
            case 'shipping_state' :
            $value = WC()->countries->get_base_state();
            break;
        }
    }

    $address[ $key ]['value'] = apply_filters( 'woocommerce_my_account_edit_address_field_value', $value, $key, $load_address );
}



global $current_user;

get_currentuserinfo();
?>

<?php wc_print_notices(); ?>

<?php if ( ! $load_address ) : ?>

    <?php wc_get_template( 'myaccount/my-address.php' ); ?>

<?php else : ?>
    <table>
        <tr>                    
            <th>
                Field
            </th>
            <th>
                Value
            </th>
        </tr>
    <?php foreach ( $address as $key => $field ) : ?> 

    <?php
    /* I can't figure out how to properly suppress these. I can't find where the 'hidden' flag is stored.*/
    if($key == 'billing_country' or 
       $key == 'billing_company' or
       $key == 'billing_address_2'
       )
        continue;


    $args = wp_parse_args( $field  );

    ?>
        <tr> 
            <td>
                <?php printf($args['label']);?> 
            </td>
            <td>
                 <?php printf($field['value']); ?>
             </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php endif; ?>





<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>

<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>

<?php do_action( 'woocommerce_after_my_account' ); ?>
