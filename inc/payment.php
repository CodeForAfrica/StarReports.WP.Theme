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
        'supports'      => array( 'title', 'custom-fields'),
        'has_archive'   => false,
    );
    register_post_type( 'payment', $args );
}

add_action( 'init', 'register_payment' );
/*
 * Create colunms
 */

add_filter( 'manage_edit-payment_columns', 'my_edit_payment_columns' ) ;

function my_edit_payment_columns( $columns ) {

	$columns = array(
	    'cb' => '<input type="checkbox" />',
		'title' => __( 'Payment' ),
		'confirmed' => __( 'Confirmed' ),
		'pay_amount' => __( 'Amount' ),
		'date' => __( 'Date' )
	);

	return $columns;
}

add_action( 'manage_payment_posts_custom_column' , 'payment_columns', 10, 2 );

function payment_columns( $column, $post_id ) {
	switch ( $column ) {
		case 'confirmed':
            $confirm = get_post_meta( $post_id, 'confirm', true);

            if(!empty($confirm)){
                if($confirm == "1"){
                    print "Confirmed!";
                }else{
                    print "Disputed!";
                }
            }else {
                _e( 'Not confirmed', 'your_text_domain' );
            }

            break;
        case 'pay_amount':
            $pay_amount = get_post_meta( $post_id, 'pay_amount', true);

            if(!empty($pay_amount)){
                print $pay_amount;
            }else {
                _e( 'Not indicated!', 'your_text_domain' );
            }
        break;
	}
}
/*
 * Sortable Columns
 */

add_filter( 'manage_edit-payment_sortable_columns', 'my_payment_sortable_columns' );

function my_payment_sortable_columns( $columns ) {

	$columns['confirmed'] = 'confirmed';

	return $columns;
}

/* Only run our customization on the 'edit.php' page in the admin. */
add_action( 'load-edit.php', 'my_edit_payment_load' );

function my_edit_payment_load() {
	add_filter( 'request', 'my_sort_payments' );
}

/* Sorts the movies. */
function my_sort_payments( $vars ) {

	/* Check if we're viewing the 'movie' post type. */
	if ( isset( $vars['post_type'] ) && 'payment' == $vars['post_type'] ) {

		/* Check if 'orderby' is set to 'confirmed'. */
		if ( isset( $vars['orderby'] ) && 'confirmed' == $vars['orderby'] ) {

			/* Merge the query vars with our custom variables. */
			$vars = array_merge(
				$vars,
				array(
					'meta_key' => 'confirm',
					'orderby' => 'meta_value'
				)
			);
		}
	}

	return $vars;
}


/*
 * Add pay box WP Admin ajax style
 */


add_action('wp_ajax_pay_user_box_save','pay_user_box_save');
add_action('wp_ajax_nopriv_pay_user_box_save','pay_user_box_save');

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

    $pay_user = get_post_meta( get_the_ID(), 'mpesa_confirmation', true);
    $confirm = get_post_meta( get_the_ID(), 'confirm', true);
    $pay_amount = get_post_meta( get_the_ID(), 'pay_amount', true);
    if(empty($pay_user)){
        print "Payment hasn't been made yet!";
    }else{
        if(!empty($confirm)){
            if($confirm == "1"){
                print "Receipt has been confirmed!";
            }else{
                print "Payment disputed by user. Please follow up!";
            }
        }
    }
    ?>
    <p>
        MPESA confirmation number:
        <br />
        <input id="mpesa_confirmation" value="<?php print $pay_user?>"<?php if($confirm == "1") echo " disabled"?>>
        <br />
        Amount
        <br />
        <input id="pay_amount" value="<?php print $pay_amount?>"<?php if($confirm == "1") echo " disabled"?>>

        <div id="pay_box">
            <input id="submit_payment" type="button" class="button button-primary button-large" value="Submit Payment"<?php if($confirm == "1") echo " style='display:none;'"?>>
        </div>

        <div id="payment">

        </div>
        <?php

            //if other payments exist, show them here
            $args = array(
                'post_type'=>'payment',
                'meta_query' => array(array(
                        'key' => 'post_id',
                        'value' => get_the_ID(),
                        'compare' => '='
                    )));

            foreach(query_posts($args) as $post){
                $receipt = get_post_meta($post->ID, 'receipt', true);

                print "<a href=\"post.php?post=".$post->ID. "&action=edit\">View payment: ".$receipt."</a> <br />";
            }

        ?>

    </p>

    <script type="text/javascript">
        jQuery(document).ready(function(e) {
            jQuery(document).one('click','#submit_payment',function(e){
                e.preventDefault();
                var post_id = <?php echo get_the_ID(); ?>;
                var mpesa_confirmation = jQuery("#mpesa_confirmation").val();
                var pay_amount = jQuery("#pay_amount").val();
                var title = "<?php echo get_the_title(); ?>";
                var data = {
                    'action': 'pay_user_box_save',
                    'post_id': post_id,
                    'mpesa_confirmation':mpesa_confirmation,
                    'pay_amount':pay_amount,
                    'title':title,
                };
                if(pay_amount == "" || mpesa_confirmation == "" || pay_amount == null || mpesa_confirmation == null){
                    alert("All fields are required!");
                }else{
                    // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
                    jQuery.post(ajaxurl, data, function(response) {
                        //id of payment is returned and shown
                        jQuery("#payment").html("<a href=\"post.php?post=" + response + "&action=edit\">View payment</a><br />");
                        //disable input
                        jQuery("#mpesa_confirmation").attr('disabled','disabled');
                        jQuery("#pay_amount").attr('disabled','disabled');
                        //hide submit payment
                        jQuery("#pay_box").hide();

                    });
                }
            });
        });
    </script>
    <?php
}

function pay_user_box_save()
{

    $mpesa_confirmation = $_POST['mpesa_confirmation'];
    $pay_amount = $_POST['pay_amount'];
    $post_id = $_POST['post_id'];
    $title = $_POST['title'];

    $old_value = get_post_meta($post_id, 'mpesa_confirmation', true);

    update_post_meta($post_id, 'mpesa_confirmation', $mpesa_confirmation);
    update_post_meta($post_id, 'pay_amount', $pay_amount);


    /*
        update user
        if value changed send push notification if value has changed
            message = "Admin confirmed payment for %post_title with receipt number %mpesa_confirmation"
        to post author
    */

    if ($old_value != $mpesa_confirmation) {

        update_post_meta($post_id, 'confirm', "0");

        $pushMessage = "Receipt: " . $mpesa_confirmation . " of " .$pay_amount. " for [" . $title . "]";

        $post = get_post($post_id);
        $author_id = $post->post_author;

        /*
         * Create post type payment
         */

        if( null == get_page_by_title( $pushMessage ) ){

            $payment_post_id = wp_insert_post(
                array(
                    'comment_status' => 'closed',
                    'ping_status' => 'closed',
                    'post_author' => 'admin',
                    'post_title' => $pushMessage,
                    'post_status' => 'draft',
                    'post_type' => 'payment'
                )
            );

            update_post_meta($payment_post_id, 'receipt', $mpesa_confirmation);
            update_post_meta($payment_post_id, 'pay_amount', $pay_amount);
            update_post_meta($payment_post_id, 'user', $author_id);
            update_post_meta($payment_post_id, 'post_id', $post_id);

            echo $payment_post_id;

        }

        /*
         * Send notification
         */

        $reg_ids = users_gcm_ids($author_id);

        $message = array("payment" => $pushMessage, "post_id" => $post_id, "receipt" => $mpesa_confirmation, "payment_id" => $payment_post_id, "pay_amount"=>$pay_amount);
        send_push_notification($reg_ids, $message);
    }
    die();
}


function confirm_payment($post_id, $payment_post_id, $confirm){

    //update post
    update_post_meta( $post_id, 'confirm', $confirm );

    //update payment post
    update_post_meta( $payment_post_id, 'confirm', $confirm );

    //send message admin with confirmation status
    if($confirm == 1){
        $message = "Payment for ".$post_id." confirmed!";
    }else{
        $message = "Payment for ".$post_id." disuted!";
    }
    $payment_post_id = wp_insert_post(
                array(
                    'comment_status' => 'closed',
                    'ping_status' => 'closed',
                    'post_author' => 'admin',
                    'post_title' => $message,
                    'post_status' => 'draft',
                    'post_type' => 'message'
                )
    );
    //leave out notifications for now
    update_post_meta( $payment_post_id, 'notified', "1" );

}
?>