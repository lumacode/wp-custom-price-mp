<?php 
/* 
Plugin Name: Woo Custom Price MP 
Plugin URI:
Description: Agrega precio con comisión de mercadopago al single product.  
Version: 1.0.0
Author: Luis Albanese
Author URI: https://luisalbanese.com.ar
License: GPL
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


function woocommerce_template_custom_content(){ 
    global $product;

    if($product->get_price() != 0): ?>
    
    
    <div style="border: 1px solid green; width: 70%; text-align: center; margin: 0 auto; margin-bottom: 20px; margin-top: 20px;">
        <p style="font-size: 17px; margin-top: 14px;">Precio de lista comprando en 12 cuotas:</p>
        <p style="font-size: 17px">
        $<?php echo $product->get_price()*1.35 ; ?> 
        <img src="<?php echo esc_attr(plugin_dir_url(__FILE__))?>img/logo_mercadopago.png" alt="mercadopago" width="35px"></p>
    </div>

        
<?php endif;
}

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_custom_content', 12 );


function woocommerce_template_custom_price_list(){ 
    global $product;

    if($product->get_price() != 0): ?>
    
        <p style="font-size: 17px; margin-top: 14px;">Precio en efectivo o transferencia bancaria:</p>
        
<?php endif;
}

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_custom_price_list', 10 );
