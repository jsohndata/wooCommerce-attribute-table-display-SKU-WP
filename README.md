# WooCommerce Add SKU to Attribute Table

Custom WooCommerce snippet that appends the product’s SKU as the final row in the “Additional Information” tab’s attribute table.  
- Keeps SKU aligned with structured product data instead of placing it in the product meta area.  
- Displays seamlessly below all custom attributes on single product pages.  
- Lightweight and pure PHP—no template overrides or JavaScript.  
- Compatible with both simple and variable product types.  
- Works with Code Snippets plugin or your child theme’s `functions.php`.

---

## Features

- Adds SKU to the native WooCommerce attribute table.
- Positions SKU as the **last row** in the “Additional Information” tab.
- Cleans up UI by consolidating product data in one place.
- Optional CSS provided to hide default SKU display above tabs.
- No external dependencies or templates needed.

---

## Requirements

- WordPress with WooCommerce installed and active.
- One of the following:
  - [Code Snippets plugin](https://wordpress.org/plugins/code-snippets/) (recommended)
  - Or access to your child theme’s `functions.php`

---

## Installation

### Option 1: Using Code Snippets (Recommended)

1. Install and activate the **Code Snippets** plugin:  
   *Dashboard → Plugins → Add New → Search for “Code Snippets”*
2. Go to **Snippets → Add New**.
3. Name it: `WooCommerce Add SKU to Attribute Table`.
4. Paste the PHP code from the **Code** section below.
5. Set **Run snippet everywhere**.
6. Save and **Activate**.

### Option 2: Add to `functions.php` (Child Theme Only)

1. Open your child theme’s `functions.php`.
2. Paste the PHP code at the **end** of the file.
3. Save the file.

---

## Code

```php
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
