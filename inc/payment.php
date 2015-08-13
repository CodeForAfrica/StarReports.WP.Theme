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

add_action( 'save_post', 'pay_user_box_save' );
function pay_user_box_save( $post_id ) {

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;

    if ( !wp_verify_nonce( $_POST['pay_user_box_content_nonce'], plugin_basename( __FILE__ ) ) )
        return;

    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return;
    } else {
        if ( !current_user_can( 'edit_post', $post_id ) )
            return;
    }
    $mpesa_confirmation= $_POST['mpesa_confirmation'];

    $old_value = get_post_meta( $post_id, 'mpesa_confirmation', true);

    update_post_meta( $post_id, 'mpesa_confirmation', $mpesa_confirmation );

    //update user if value changed
    //send push notification if value has changed
    //message = "Admin confirmed payment for %post title with receipt number %mpesa"
    //to post author

    if($old_value != $mpesa_confirmation) {

        $pushMessage = "Admin confirmed payment for [" . $_POST['post_title'] . "] with receipt number " . $mpesa_confirmation;

        $reg_ids = author_gcm_id($post_id);

        $message = array("payment" => $pushMessage, "post_id" => $post_id, "receipt" => $mpesa_confirmation);
        send_push_notification($reg_ids, $message);
    }
}
