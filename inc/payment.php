<?php

/*
 * Create Payment Content Type
 */

function register_payment() {
    $labels = array(
        'name'               => _x( 'Payments', 'post type general name' ),
        'singular_name'      => _x( 'Payment', 'post type singular name' ),
        'add_new'            => _x( 'Compose New', 'payment' ),
        'add_new_item'       => __( 'Compose New Payment' ),
        'new_item'           => __( 'New Payment' ),
        'all_items'          => __( 'All Payments' ),
        'view_item'          => __( 'View Payments' ),
        'search_items'       => __( 'Search Payments' ),
        'not_found'          => __( 'No payments found' ),
        'not_found_in_trash' => __( 'No payments found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Payments'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Defines payment structure',
        'public'        => true,
        'menu_position' => 6,
        'supports'      => array( 'title'),
        'has_archive'   => false,
    );
    register_post_type( 'payment', $args );
}
add_action( 'init', 'register_payment' );


/*
 * Add pay box to post
 */

add_action( 'add_meta_boxes', 'pay_user_box' );
function pay_user_box() {
    add_meta_box(
        'pay_user_box',
        __( 'Enter payment receipt', 'myplugin_textdomain' ),
        'pay_user_box_content',
        'post',
        'side',
        'low'
    );
}

function pay_user_box_content( $post ) {
    /*
     * Show bounty of original assignment
     * Show price set by user
     * Show box for enter MPESA confirmation number [done]
     * Send message to user if value changed [done]
     * Show dispute, if any
     */

    wp_nonce_field( plugin_basename( __FILE__ ), 'pay_user_box_content_nonce' );
    $pay_user = get_post_meta( get_the_ID(), 'mpesa_confirmation', true);
    if(empty($pay_user)){
        print "Payment hasn't been made yet!";
    }
    ?>
    MPESA confirmation number:
    <br />
    <input name="mpesa_confirmation" value="<?php print $pay_user?>">

    <?php
}

