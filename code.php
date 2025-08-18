// Append SKU as the last row in the Additional Information attributes table
add_filter('woocommerce_display_product_attributes', 'add_sku_to_end_of_attributes', 10, 2);

function add_sku_to_end_of_attributes($attributes, $product) {
    if (! $product->get_sku()) {
        return $attributes; // No SKU to display
    }

    $new_attribute = array(
        'label'   => __('SKU', 'woocommerce'),
        'value'   => $product->get_sku(),
        'display' => $product->get_sku(),
    );

    // Append SKU to the end of the attributes array
    $attributes['__sku'] = $new_attribute;

    return $attributes;
}
