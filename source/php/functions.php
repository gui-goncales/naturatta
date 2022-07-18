<?php
function my_function_admin_bar()
{ 
    return false;
}
add_filter('show_admin_bar', 'my_function_admin_bar');

// Limite de caracteres
function excerpt($limit)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);

    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . ' (...)';
    } else {
        $excerpt = implode(" ", $excerpt);
    }

    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
    return $excerpt;
}

/**
 * @snippet       Display Discount Percentage @ Loop Pages - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE
 * @sourcecode    https://businessbloomer.com/?p=21997
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.5.4
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

add_action('woocommerce_before_shop_loop_item_title', 'bbloomer_show_sale_percentage_loop', 25);

function bbloomer_show_sale_percentage_loop()
{
    global $product;
    if (!$product->is_on_sale()) return;
    if ($product->is_type('simple')) {
        $max_percentage = (($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100;
    } elseif ($product->is_type('variable')) {
        $max_percentage = 0;
        foreach ($product->get_children() as $child_id) {
            $variation = wc_get_product($child_id);
            $price = $variation->get_regular_price();
            $sale = $variation->get_sale_price();
            if ($price != 0 && !empty($sale)) $percentage = ($price - $sale) / $price * 100;
            if ($percentage > $max_percentage) {
                $max_percentage = $percentage;
            }
        }
    }
    if ($max_percentage > 0) echo "<div class='sale-perc'>-" . round($max_percentage) . "%</div>";
}

add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text');

function woo_custom_cart_button_text()
{
    return __('Adicionar no Carrinho', 'woocommerce');
}

add_filter('woocommerce_format_sale_price', 'woocommerce_custom_sales_price', 10, 3);
function woocommerce_custom_sales_price($price, $regular_price, $sale_price)
{
    // Getting the clean numeric prices (without html and currency)
    $regular_price = floatval(strip_tags($regular_price));
    $sale_price = floatval(strip_tags($sale_price));

    // Percentage calculation and text
    $percentage = round(($regular_price - $sale_price) / $regular_price * 100) . '%';
    $percentage_txt = __('', 'woocommerce') . $percentage;

    return '<del>' . wc_price($regular_price) . '</del> <ins>' . wc_price($sale_price) . "<div class='discount_product'><span>" . $percentage_txt . ' OFF</span></div></ins>';
}

add_action('woocommerce_multistep_checkout_after_shipping', 'add_my_custom_step_with_new_field');

function add_my_custom_step_with_new_field($checkout)
{
    wc_get_template('checkout/my-custom-step.php', array('checkout' => $checkout));
}


/**
 * @snippet       WooCommerce User Login Shortcode
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.6.5
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

// THIS WILL CREATE A NEW SHORTCODE: [wc_login_form_bbloomer]

add_shortcode('wc_login_form_bbloomer', 'bbloomer_separate_login_form');

function bbloomer_separate_login_form()
{
    if (is_admin()) return;
    if (is_user_logged_in()) return;
    ob_start();
    woocommerce_login_form();
    return ob_get_clean();
}

/**
 * @snippet       WooCommerce User Registration Shortcode
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.6.5
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

// THIS WILL CREATE A NEW SHORTCODE: [wc_reg_form_bbloomer]

add_shortcode('wc_reg_form_bbloomer', 'bbloomer_separate_registration_form');

function bbloomer_separate_registration_form()
{
    if (is_admin()) return;
    if (is_user_logged_in()) return;
    ob_start();

    // NOTE: THE FOLLOWING <FORM></FORM> IS COPIED FROM woocommerce\templates\myaccount\form-login.php
    // IF WOOCOMMERCE RELEASES AN UPDATE TO THAT TEMPLATE, YOU MUST CHANGE THIS ACCORDINGLY

?>

<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

  <?php do_action('woocommerce_register_form_start'); ?>

  <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

  <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <!-- <label for="reg_username"><?php //esc_html_e( 'Username', 'woocommerce' ); 
                                                ?>&nbsp;<span class="required">*</span></label> -->
    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" placeholder="Entre com o seu email ou nome de usuario" required /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                                                                                ?>
  </div>

  <?php endif; ?>
  <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <!-- <label for="reg_billing_first_name"><?php //_e( 'First name', 'woocommerce' ); 
                                                        ?>*</label> -->
    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" placeholder="Nome*" value="<?php echo (!empty($_POST['billing_first_name'])) ? esc_attr(wp_unslash($_POST['billing_first_name'])) : ''; ?>" required /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                ?>
  </div>
  <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" placeholder="Email*" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" required /><?php // @codingStandardsIgnoreLine 
                                                                                                                                                                                                                                                                            ?>
  </div>

  <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

  <div class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <!-- <label for="reg_password"><?php //esc_html_e( 'Password', 'woocommerce' ); 
                                                ?>&nbsp;<span class="required">*</span></label> -->
    <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" placeholder="Senha*" autocomplete="new-password" required />
  </div>

  <?php else : ?>

  <div><?php esc_html_e('A password will be sent to your email address.', 'woocommerce'); ?></div>

  <?php endif; ?>

  <?php do_action('woocommerce_register_form'); ?>

  <div class="woocommerce-FormRow form-row">
    <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
    <button type="submit" class="woocommerce-Button button" name="register" value="<?php esc_attr_e('Criar Conta', 'woocommerce'); ?>"><?php esc_html_e('Criar Conta', 'woocommerce'); ?></button>
  </div>

  <?php do_action('woocommerce_register_form_end'); ?>

</form>

<?php

    return ob_get_clean();
}

add_action('wp_logout', 'auto_redirect_after_logout');

function auto_redirect_after_logout()
{

    wp_redirect(home_url());
    exit();
}

/**
 * @snippet       Display All Products Purchased by User via Shortcode - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.6.3
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

add_shortcode('my_purchased_products', 'bbloomer_products_bought_by_curr_user');

function bbloomer_products_bought_by_curr_user()
{

    // GET CURR USER
    $current_user = wp_get_current_user();
    if (0 == $current_user->ID) return;

    // GET USER ORDERS (COMPLETED + PROCESSING)
    $customer_orders = get_posts(array(
        'numberposts' => -1,
        'meta_key'    => '_customer_user',
        'meta_value'  => $current_user->ID,
        'post_type'   => wc_get_order_types(),
        'post_status' => array_keys(wc_get_is_paid_statuses()),
    ));

    // LOOP THROUGH ORDERS AND GET PRODUCT IDS
    if (!$customer_orders) return;
    $product_ids = array();
    foreach ($customer_orders as $customer_order) {
        $order = wc_get_order($customer_order->ID);
        $items = $order->get_items();
        foreach ($items as $item) {
            $product_id = $item->get_product_id();
            $product_ids[] = $product_id;
        }
    }
    $product_ids = array_unique($product_ids);
    $product_ids_str = implode(",", $product_ids);

    // PASS PRODUCT IDS TO PRODUCTS SHORTCODE
    return do_shortcode("[products ids='$product_ids_str']");
}

//Only show products in the front-end search results
// function lw_search_filter_pages($query) {
//     if ($query->is_search) {
//         $query->set('post_type', 'product', 'post');
//         $query->set( 'wc_query', 'product_query' );
//     }
//     return $query;
// }

// add_filter('pre_get_posts','lw_search_filter_pages');

/**
* Adding ACF Options Page to Menu.
*/
if (function_exists('acf_add_options_page')) {
	// Adding
	acf_add_options_page(array(
		'page_title' => 'Configurações',
		'menu_title' => 'Configurações do Site',
		'menu_slug' => 'site_options',
		'capability' => 'edit_posts',
		'parent_slug' => '',
		'position' => 13,
		'icon_url' => 'dashicons-smiley'
	));

	// Geral and Logos
	acf_add_options_sub_page(array(
		'page_title' => 'Configurações Gerais',
		'menu_title' => 'Geral',
		'parent_slug' => 'site_options'
	));
}

function filter_woocommerce_registration_redirect( $redirect ) {
    return wc_get_page_permalink( 'my-account', 'edit-address/entrega' );
}
add_filter( 'woocommerce_registration_redirect', 'filter_woocommerce_registration_redirect', 10, 1 );

// function template_chooser($template)   
// {    
//   global $wp_query;   
//   $post_type = get_query_var('post_type');   
//   if( $wp_query->is_search && $post_type == 'products' )   
//   {
//     return locate_template('product-search.php');  //  redirect to archive-search.php
//   }   
//   return $template;   
// }
// add_filter('template_include', 'template_chooser');  



// /**
//  * Code goes in theme functions.php.
//  */
// add_action( 'template_redirect', 'redirect_external_products' );

// function redirect_external_products() {
// 	global $post;

// 	if ( is_singular( 'product' ) && ! empty( $post ) && ( $product = wc_get_product( $post ) ) && $product->is_type( 'external' ) ) {
// 		wp_redirect( $product->get_product_url() );
// 		exit;
// 	}
// }


//CUSTOM POST TYPE
function custom_post_type_receitas() {
	register_post_type('receitas', array(
		'label' => 'receitas',
		'description' => 'receitas',
		'public' => true,
		'menu_icon'   => 'dashicons-welcome-add-page',
		'show_ui' => true,
		'show_in_menu' => true, 
		'capability_type' => 'page',
		'map_meta_cap' => true,
		'hierarchical' => false,
		'rewrite' => array('slug' => 'receitas', 'with_front' => true), 
		'query_var' => true,
		'supports' => array('title', 'editor', 'page-attributes','post-formats', 'thumbnail'),
		'menu_position' => 5,
		'labels' => array (
			'name' => 'Receitas',
			'singular_name' => 'Receitas',
			'menu_name' => 'Receitas',
			'add_new' => 'Adicionar Receita',
			'add_new_item' => 'Adicionar Novo Receita',
			'edit' => 'Editar',
			'edit_item' => 'Editar Receita',
			'new_item' => 'Novo Receita',
			'view' => 'Ver Receita',
			'view_item' => 'Ver Receita',
			'search_items' => 'Procurar Receita Realizado',
			'not_found' => 'Nenhum Receita Encontrado',
			'not_found_in_trash' => 'Nenhum Receita Encontrado no Lixo',
		),
	));
}
add_action('init', 'custom_post_type_receitas'); 


?>