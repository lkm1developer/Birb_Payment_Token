<?php

add_action( 'wp_ajax_checkPayment', 'checkPayment');
add_action( 'wp_ajax_nopriv_checkPayment', 'checkPayment');
function checkPayment() {
	$customer_acc = '1235459870';
	$merchant_acc = '9874563100';
//	die('dd');
	global $woocommerce;
    $items = $woocommerce->cart->get_cart();
	foreach($items as $item => $values) { 
		$_product =  wc_get_product( $values['data']->get_id()); 
		$price = get_post_meta($values['product_id'] , '_price', true);
	
		global $wpdb;
		$table_name = $wpdb->prefix . "deeponion";
		$wpdb->insert($table_name, array(
			'product_id' => $values['product_id'],
			'order_id' => 'test12',
			'total_price' => $price,
			'tax' => $values['line_tax'],
			'variant_id' => $values['variation_id'],
			'payment_method' => 'custome_method',
			'quantity' => $values['quantity']
			),array(
			'%s',
			'%s')
		);
		
		//echo"<pre>";  print_r($wpdb);	 die;
	} 
	
	

}


?>