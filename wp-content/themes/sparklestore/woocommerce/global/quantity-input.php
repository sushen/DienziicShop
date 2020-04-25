<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.0.0
 */

defined( 'ABSPATH' ) || exit;

if ( $max_value && $min_value === $max_value ) {
	?>
	<div class="quantity hidden">
		<input type="hidden" id="<?php echo esc_attr( $input_id ); ?>" class="qty" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $min_value ); ?>" />
	</div>
	<?php
} else {
	global $qtyloop;
	$qtyloop ++;
	/* translators: %s: Quantity. */
	$label = ! empty( $args['product_name'] ) ? sprintf( __( '%s quantity', 'sparklestore' ), wp_strip_all_tags( $args['product_name'] ) ) : __( 'Quantity', 'sparklestore' );
	?>
	<div class="quantity">
		<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr( $label ); ?></label>
		<button onclick="var result = document.getElementById('qty<?php echo esc_html($qtyloop) ;?>'); var qty = result.value; if( !isNaN( qty ) && qty > 1 ) { result.value--; } else{ result.value = 1;} jQuery('#qty<?php echo esc_html($qtyloop) ;?>').trigger('change'); return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
		<input
			type="number"
			id="qty<?php echo esc_html($qtyloop) ;?>"
			class="<?php echo esc_attr( join( ' ', (array) $classes ) ); ?>"
			step="<?php echo esc_attr( $step ); ?>"
			min="<?php echo esc_attr( $min_value ); ?>"
			max="<?php echo esc_attr( 0 < $max_value ? $max_value : '' ); ?>"
			name="<?php echo esc_attr( $input_name ); ?>"
			value="<?php echo esc_attr( $input_value ); ?>"
			title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'sparklestore' ); ?>"
			size="4"
			inputmode="<?php echo esc_attr( $inputmode ); ?>" />
		<button onclick="var result = document.getElementById('qty<?php echo esc_html($qtyloop) ;?>'); var qty = result.value; if( !isNaN( qty )) { result.value++;} else { result.value = 1 } jQuery('#qty<?php echo esc_html($qtyloop) ;?>').trigger('change'); return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
	</div>
	<?php
}