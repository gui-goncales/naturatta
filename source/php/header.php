<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php
    if (is_home()) :

      bloginfo('name');

    elseif (is_category()) :

      bloginfo('name');
      echo ' | ';
      single_cat_title();

    elseif (is_single()) :

      bloginfo('name');
      echo ' | ';
      single_post_title();

    elseif (is_page()) :

      bloginfo('name');
      echo ' | ';
      single_post_title();

    else :

      wp_title('', true);

    endif;

    ?>
  </title>

  <!-- Favicon -->
  <!-- <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/favicon-16.png" sizes="16x16" type="image/png">
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/favicon-32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/favicon-48.png" sizes="48x48" type="image/png">  -->
  <!-- <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/favicon.png" sizes="62x62" type="image/png"> -->
  <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/favicon.png" sizes="92x92" type="image/png">

  <!-- Depêndencias -->
  <style type="text/css">
  <?php $url=get_bloginfo('template_directory') . '/dist/css/style.css';

  $ch=curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);

  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $contents=curl_exec($ch);

  if (curl_errno($ch)) : echo curl_error($ch);

  $contents='';

  else : curl_close($ch);

  endif;

  if ( !is_string($contents) || !strlen($contents)) : $contents='';

  endif;

  $contents=str_replace('../img/', get_bloginfo('template_directory') . '/dist/img/', $contents);

  $contents=str_replace('../fonts/', get_bloginfo('template_directory') . '/dist/fonts/', $contents);

  echo $contents;
  ?>
  </style>

  </script>
  <?php
  // CALL TO SVG
  include 'svg.php';
  $current_user = wp_get_current_user();
  global $product;
  wp_head();
  ?>
</head>

<body>
  <h1 class="ocultar">Naturatta</h1>
  <header>
    <div class="headerTop">
      <div class="container">
        <div class="row no-gutters">
          <div class="welcome col-12 col-md-5"> <?php if (!is_user_logged_in()) { ?>Seja Bem-vindo(a). Faça <a href="<?php echo home_url(); ?>/login">login ou cadastre-se!<?php } else { ?>Seja Bem-vindo(a). Clique aqui para <a href="<?php echo wp_logout_url(home_url()); ?>">sair</a>
              <?php } ?></a> </div>
          <div class="help col-2 col-md-2"> <?php echo $help;    ?> Ajuda <span><?php echo $arrowdown; ?></span>
            <div class="subhelp">
              <div class="btn_comprar_equipebox">
                <a href="<?php echo home_url(); ?>/politica-de-privacidade/">Política de Privacidade</a>
              </div>
              <div class="btn_seguro">
                <a href="<?php echo home_url(); ?>/seguranca">É seguro comprar online?</a>
              </div>
              <div class="btn_consultor">
                <a href="<?php echo home_url(); ?>/fale-conosco" target="_blank"><?php echo $atendimento_online; ?> Fale com um consultor</a>
              </div>
              <div class="btn_whatsapp">
                <a href="<?php echo the_field('whatsapp', 'option'); ?>" target="_blank"><?php echo $whatsapp; ?>Atendimento via Whatsapp</a>
              </div>
            </div>
          </div>
          <div class="whishList col-4 col-lg-4"> <a href="<?php echo home_url(); ?>/wishlist"> <?php echo $heart;   ?> Minha Lista de Desejos </a></div>
          <!-- <div class="package col-4 col-lg-4"> <a href="<?php echo home_url(); ?>/minha-conta/orders"> <?php echo $package; ?> Acompanhe seu pedido </a></div> -->

          <div class="account col-5 col-md-3"> <?php if (!is_user_logged_in()) { ?><a href="<?php echo home_url(); ?>/login"><?php echo $user;    ?> Minha Conta <span><?php echo $arrowdown; ?></span></a> <?php } else { ?> <?php echo $user;    ?> Olá, <?php echo $current_user->display_name . "!"; ?>
            <span><?php echo $arrowdown; ?></span><?php } ?>
            <?php if (is_user_logged_in()) { ?>
            <div class="subaccount">
              <div class="btn_minha_conta">
                <a href="<?php echo home_url(); ?>/minha-conta">Minha Conta</a>
              </div>
              <div class="btn_sair">
                <a href="<?php echo wp_logout_url(home_url()); ?>">Sair</a>
              </div>
            </div>
            <?php } else {
            } ?>
          </div>


        </div><!-- /row -->
      </div><!-- /container -->
    </div><!-- /headerTop -->

    <div class="headerMiddle">
      <div class="container">
        <div class="row no-gutters">
          <div class="logo col-7 col-md-4 col-lg-3"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/logo_naturatta_white.png" alt="[Logo Naturatta]" title="Naturatta" class="img-fluid"></a></div>

          <!-- <div class="acompanhar_mobile col-2 col-md-1" id="order_details_btn_modal_mobile"><a href="#"><?php echo $package; ?></a></div> -->
          <div class="search col-12 col-md-4 col-lg-6">
            <form role="search" method="get" class="search-form" action="<?php bloginfo('home'); ?>/">
              <input type="text" value="" name="s" id="s" placeholder="Buscar..." />
              <input type="hidden" name="search-type" value="random" />
              <button type="submit" name="button"><?php echo $lupa; ?></button>
            </form>
          </div><!-- /search -->
          <div class="cart_mobile col-2 col-md-1"><a href="<?php echo home_url(); ?>/carrinho"><?php echo $cart; ?><span><?php echo WC()->cart->get_cart_contents_count(); ?></span> </a></div>
          <div class="cart cart_desktop col-12 col-md-6"><a href="<?php echo home_url(); ?>/carrinho"><?php echo $cart; ?>Meu Carrinho <span><?php echo WC()->cart->get_cart_contents_count(); ?></span> </a></div>
          <!-- <div class="acompanhar_pedido acompanhar_desktop col-12 col-md-6" id="order_details_btn_modal"><a href="#"><?php echo $package; ?>Acompanhe seu pedido </a></div> -->
          <div class="order_details_modal">
            <div class="conteudo_modal col-12 col-md-10 col-lg-8 col-xl-7">
              <h2>Acompanhe seu pedido</h2>
              <p>Aqui você encontrará todas as informações sobre seus pedidos</p>

              <div class="select_order">Selecione o pedido</div>
              <?php
              // Get 10 most recent order ids in date descending order.

              $customer_user_id = get_current_user_id();
              $query = new WC_Order_Query(array(
                'limit' => 10,
                'orderby' => 'status',
                'meta_value' => $customer_user_id,
                'order' => 'DESC',

              ));
              $orders = $query->get_orders();

              $i = 1;
              // echo "<pre>";
              // print_r($query);
              // echo "</pre>";
              ?>
              <div class="nav_areas">

                <?php
                foreach ($orders as $order) {
                  $i++;
                  // echo "<pre>";
                  // print_r($order);
                  // echo "</pre>";
                  date_default_timezone_set('UTC');

                  $order_data         = $order->order_date;
                  $order_data_format  = date("d/m/Y", strtotime($order_data));
                  $order_status       = $order->get_status();
                  $method_payment     = get_post_meta($order->id, '_payment_method', true);
                  // $order_payment_new  = $order->payment_method_();

                ?>
                <div class="order_item item_areas" id="order_modal_<?php echo $i; ?>">
                  <div class="order_id_modal">
                    <div class="showmore"></div>
                    <div class="ref_id_order">#<?php echo $order->id; ?></div>
                    <div class="clique_btn">Clique aqui para ver detalhes da compra</div>
                    <?php
                      if ($order_status === 'cancelled') {
                        $order_status = "Pedido Cancelado";
                        $order_status_class = "bgRed";
                      } else if ($order_status === 'completed') {
                        $order_status = "Pedido Concluído";
                        $order_status_class = "bgGreen";
                      } else if ($order_status === 'pending') {
                        $order_status = "Pagamento pendente";
                        $order_status_class = "bgYellow";
                      } else if ($order_status === 'on-hold') {
                        $order_status = "Aguardando Aprovação";
                        $order_status_class = "bgYellow";
                      } else if ($order_status === 'refunded') {
                        $order_status_class = "bgGray";
                      } else {
                        $order_status = "Erro";
                        $order_status_class = "bgRed";
                      }
                      ?>
                    <span id="<?php echo $order_status_class; ?>">
                      <?php echo $order_status; ?>
                    </span>
                  </div>
                  <div class="conteudo">
                    <h3>Detalhes do Pedido</h3>
                    <div class="infos_order col-12">

                      <div class="data_order col-12 col-lg-3">Data: <span><?php echo $order_data_format; ?></span></div>
                      <div class="payment_order col-12 col-lg-5">Forma de pagamento: <span><?php echo $method_payment; ?></span></div>
                      <div class="status_order col-12 col-lg-4">Status: <span><?php echo $order_status; ?></span></div>
                    </div>
                    <div class="produtos">
                      <h4>Produtos</h4>
                      <?php
                        // Get and Loop Over Order Items

                        foreach ($order->get_items() as $item_id => $item) {
                          $product_id = $item->get_product_id();
                          $variation_id = $item->get_variation_id();
                          $product = $item->get_product();
                          $name = $item->get_name();
                          $quantity = $item->get_quantity();
                          $subtotal = $item->get_subtotal();
                          $total = $item->get_total();
                          $tax = $item->get_subtotal_tax();
                          $taxclass = $item->get_tax_class();
                          $taxstat = $item->get_tax_status();
                          $allmeta = $item->get_meta_data();
                          $type = $item->get_type();

                        ?>
                      <div class="item_produto col-12">
                        <div class="imageProduct col-12"><img src="<?php ?>" class="img-fluid"></div>
                        <div class="name_produto col-12"><b>Produto: </b><?php echo $name; ?></div>
                        <div class="valor_produto col-12"><b>Total dos Produtos: </b>R$<?php echo number_format($total, 2, ",", "."); ?></div>
                      </div>

                      <?php
                        }
                        ?>
                    </div>

                  </div>
                </div>
                <?php } ?>

              </div>
              <div class="close"><?php echo $close; ?></div>

            </div>
          </div>
        </div><!-- /row -->
      </div><!-- /container -->
    </div><!-- /headerMiddle -->
    <div class="settings">
      <div class="headerBottom">
        <div class="container">
          <div class="row no-gutters">
            <div class="item">
              <?php echo $menu; ?>
              Categorias
              <span><?php echo $arrowdown; ?></span>
              <div class="all_categories">
                <div class="container">
                  <div class="row no-gutters">


                    <?php
                $taxonomy = 'product_cat';
                $orderby = 'name';
                $order = 'ASC';
                $show_count = 0; // 1 for yes, 0 for no
                $pad_counts = 0; // 1 for yes, 0 for no
                $hierarchical = 1; // 1 for yes, 0 for no
                $title = '';
                $empty = 1;

                $args = array(
                  'taxonomy' => $taxonomy,
                  'orderby' => $orderby,
                  'order' => $order,
                  'show_count' => $show_count,
                  'pad_counts' => $pad_counts,
                  'hierarchical' => $hierarchical,
                  'title_li' => $title,
                  'hide_empty' => $empty,
                  'parent' => 0
                );

                $all_categories = get_categories($args);
                foreach ($all_categories as $cat) {
                  $category_id = $cat->term_id;
                  $args2 = array('taxonomy' => $taxonomy, 'parent' => $category_id, 'hierarchical' => $hierarchical, 'orderby' => $orderby, 'order' => $order, 'hide_empty' => $empty);
                  $categories = get_categories($args2);
                  $categories_cnt = count(get_categories($args2));


                  if ($categories_cnt != 0) {
                    echo "<ul class='category col-12 col-md-6 col-lg-2'>
                    <li><h3><a href='" . home_url() . "/product-cat/" .  $cat->slug . "'>" . $cat->name . "</a></h3>";
                    $sub_cats = get_categories($args2);
                    if ($sub_cats) {
                      echo "<ul class='subcategory'>";
                      foreach ($sub_cats as $sub_category) {
                        echo "<li><a href='" . home_url() .  "/product-cat/" .  $sub_category->slug . "'>" . $sub_category->cat_name; ?>
                    <?php echo "</a></li>";  
                      }
                      echo "</ul></ul>";
                    }
                  } else {
                    echo "<ul class='category col-12 col-md-6 col-lg-2'><li><h3><a href='" . home_url() . "/product-cat/" . $cat->slug . "'>" . $cat->name . "</a></h3>"; ?>
                    </li>
                    </ul>
                    <?php wp_reset_query();
                    echo "</li></ul>";
                  }
                }
                ?>
                  </div>
                </div>
              </div>
            </div><!-- /item -->
            <div class="menu_mobile">
              <div class="menu-toggle">
                <div class="one"></div>
                <div class="two"></div>
                <div class="three"></div>
                <div class="titulo_menu">Menu</div>
              </div><!-- /menu-toggle -->
              <nav class="hidden">
                <ul role="navigation">
                  <li><a href="<?php echo home_url(); ?>">Home</a></li>
                  <li><a href="<?php the_field('link_menu_categoria_1', 'option'); ?>"><?php the_field('icon_menu_categoria_1', 'option'); ?><?php the_field('texto_menu_categoria_1', 'option'); ?></a></li>
                  <li><a href="<?php the_field('link_menu_categoria_2', 'option'); ?>"><?php the_field('icon_menu_categoria_2', 'option'); ?><?php the_field('texto_menu_categoria_2', 'option'); ?></a></li>
                  <li><a href="<?php the_field('link_menu_categoria_3', 'option'); ?>"><?php the_field('icon_menu_categoria_3', 'option'); ?><?php the_field('texto_menu_categoria_3', 'option'); ?></a></li>
                  <li><a href="<?php the_field('link_menu_categoria_4', 'option'); ?>"><?php the_field('icon_menu_categoria_4', 'option'); ?><?php the_field('texto_menu_categoria_4', 'option'); ?></a></li>
                  <li><a href="<?php the_field('link_menu_categoria_5', 'option'); ?>"><?php the_field('icon_menu_categoria_5', 'option'); ?><?php the_field('texto_menu_categoria_5', 'option'); ?></a></li>
                  <li><a href="<?php the_field('link_menu_categoria_6', 'option'); ?>"><?php the_field('icon_menu_categoria_6', 'option'); ?><?php the_field('texto_menu_categoria_6', 'option'); ?></a></li>
                  <li><a href="<?php the_field('link_menu_categoria_7', 'option'); ?>"><?php the_field('icon_menu_categoria_7', 'option'); ?><?php the_field('texto_menu_categoria_7', 'option'); ?></a></li>
                </ul>
              </nav>
            </div>
            <div id="home" class="item menu_categoria">
              <a href="<?php the_field('link_menu_categoria_1', 'option'); ?>"><?php the_field('icon_menu_categoria_1', 'option'); ?><?php the_field('texto_menu_categoria_1', 'option'); ?></a>
            </div>

            <div id="sobre" class="item menu_categoria">
              <a href="<?php the_field('link_menu_categoria_2', 'option'); ?>"><?php the_field('icon_menu_categoria_2', 'option'); ?><?php the_field('texto_menu_categoria_2', 'option'); ?></a>
            </div>

            <div id="produtos" class="item menu_categoria">
              <a href="<?php the_field('link_menu_categoria_3', 'option'); ?>"><?php the_field('icon_menu_categoria_3', 'option'); ?><?php the_field('texto_menu_categoria_3', 'option'); ?></a>
            </div>

            <div id="distribuidor" class="item menu_categoria">
              <a href="<?php the_field('link_menu_categoria_4', 'option'); ?>"><?php the_field('icon_menu_categoria_4', 'option'); ?><?php the_field('texto_menu_categoria_4', 'option'); ?></a>
            </div>

            <div id="receitas" class="item menu_categoria">
              <a href="<?php the_field('link_menu_categoria_5', 'option'); ?>"><?php the_field('icon_menu_categoria_5', 'option'); ?><?php the_field('texto_menu_categoria_5', 'option'); ?></a>
            </div>

            <div id="blog" class="item menu_categoria">
              <a href="<?php the_field('link_menu_categoria_6', 'option'); ?>"><?php the_field('icon_menu_categoria_6', 'option'); ?><?php the_field('texto_menu_categoria_6', 'option'); ?></a>
            </div>

            <div id="contato" class="item menu_categoria">
              <a href="<?php the_field('link_menu_categoria_7', 'option'); ?>"><?php the_field('icon_menu_categoria_7', 'option'); ?><?php the_field('texto_menu_categoria_7', 'option'); ?></a>
            </div>


          </div><!-- /row -->
        </div><!-- /container -->
      </div><!-- /headerBottom -->
    </div>
  </header>