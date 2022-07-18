<?php

get_header();
include 'svg.php';
global $post,  $woocommerce, $product;

?>
<main>
  <section>
    <div class="slick-slider banner banner_desktop">
      <?php
      // check if the repeater field has rows of data
      if (have_rows('inserir_banner')) :
        // loop through the rows of data
        while (have_rows('inserir_banner')) : the_row();
      ?>
      <div class="item_banner" style="background: url('<?php the_sub_field('imagem_de_fundo_banner_home_desktop'); ?>')no-repeat center center; background-size: cover; width: 100%; margin-top: -20px;">

        <div class="column col-12 col-md-6 col-lg-5">
          <h2><?php the_sub_field('titulo_banner_home'); ?></h2>
          <h3><?php the_sub_field('texto_banner_home'); ?></h3>
          <div class="btn_saiba_mais">
            <a href="<?php the_sub_field('link_botao_banner_home_'); ?>"><?php the_sub_field('texto_botao_banner_home'); ?></a>
          </div>

        </div>
        <div class="column col-12 col-md-6 col-lg-6" style="align-self: flex-end;">
          <div class="image_product"><img src="<?php the_sub_field('imagem_produto_banner_home') ?>" alt="" class="img-fluid"></div>
        </div>
      </div>
      <?php endwhile;
      endif; ?>
    </div>
    <div class="slick-slider banner banner_mobile">
      <?php
      // check if the repeater field has rows of data
      if (have_rows('inserir_banner')) :
        // loop through the rows of data
        while (have_rows('inserir_banner')) : the_row();
      ?>
      <div class="item_banner" style="background: url('<?php the_sub_field('imagem_de_fundo_banner_home_mobile'); ?>')no-repeat center center; background-size: cover; width: 100%; margin-top: -20px;">
        <div class="column col-12">
          <h2><?php the_sub_field('titulo_banner_home'); ?></h2>
          <h3><?php the_sub_field('texto_banner_home'); ?></h3>
          <div class="btn_saiba_mais">
            <a href="<?php the_sub_field('link_botao_banner_home_'); ?>"><?php the_sub_field('texto_botao_banner_home'); ?></a>
          </div>
        </div>
        <div class="col-12">
          <div class="image_product"><img src="<?php the_sub_field('imagem_produto_banner_home') ?>" alt="" class="img-fluid"></div>
        </div>
      </div>
      <?php endwhile;
      endif; ?>
    </div>
  </section>

  <section>
    <div class="infos">
      <div class="item col-4">
        <div class="column">
          <?php echo $seguranca; ?>
        </div>
        <div class="column">
          <h2>Compre com Segurança</h2>
          <p>Seus dados sempre protegidos</p>
        </div>
      </div>
      <div class="item col-4">
        <div class="column">
          <?php echo $atendimento; ?>
        </div>
        <div class="column">
          <h2>Pague como quiser</h2>
          <p>Cartões de crédito ou à vista</p>
        </div>
      </div>
      <div class="item col-4">
        <div class="column">
          <?php echo $entrega; ?>
        </div>
        <div class="column">
          <h2>Enviamos suas compras</h2>
          <p>Entrega em todo o país</p>
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="promotion">
      <div class="container">
        <div class="row no-gutters">
          <div class="titles col-12">
            <h2>Destaques</h2>
            <div class="ver_todos">
              <a href="<?php echo home_url(); ?>/todos-produtos">Ver todos os produtos <?php echo $arrownext; ?></a>
            </div>

            <div class="products sliderProductHome col-12">

              <?php
              
              $paged = get_query_var('paged') ? get_query_var('paged') : 1;
              $args = array(
                'post_type' => 'product',
                'order' => 'DESC',
                'posts_per_page' => '10',
                // 'meta_key' => '_sale_price',
                'paged' => $paged
              );

              $loop = new WP_Query($args);
              
              // $product = wc_get_product( $product_id );
              while ($loop->have_posts()) : $loop->the_post();


                // if ( $salediscount > 0 ) {
              ?>
              <div class="item">
                <div class="hurt-icon"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></div>
                <div class="imageProduct col-12">
                  <div class="takeImageProduto" style="background: url(<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); echo $url; ?>)no-repeat top center; background-size: contain; width: 100%; height: 200px;"></div>
                </div>
                <h1 class="titleProduct col-12"><?php the_title(); ?></h1>
                <div class="priceProduct col-12"><?php echo $product->get_price_html(); ?></div>
                <?php $boleto = get_field('valor_no_boleto');
                  if (!empty($boleto)) { ?>
                <div class="boleto col-12">
                  <div class="valor">R$ <?php echo $boleto; ?> à vista</div>
                </div>
                <?php } ?>

                <div class="btn_buy col-9 col-md-8 col-lg-12">
                  <button type=”submit” name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class=”single_add_to_cart_button button alt”>
                    <a href="<?php the_permalink(); ?>"><?php echo $sucess;
                                                          echo "Comprar"; ?></a>
                  </button>

                </div>
              </div>

              <?php
              // }
              endwhile;
              wp_reset_query(); ?>
            </div>

          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <!-- <section>
    <div class="popular_category">
      <div class="container">
        <div class="row no-gutters">
          <h2 class="col-12">Categorias Populares</h2>

          <div class="slick-slider categories categories_slider col-12">
            <?php
            global $wp_query;
            // $orderby = 'name';
            $order = 'desc';
            $hide_empty = false;

            // get the query object
            $cat = $wp_query->get_queried_object();

            // get the thumbnail id using the queried category term_id
            $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);

            // get the image URL
            $image = wp_get_attachment_url($thumbnail_id);

            $cat_args = array(
              'orderby'    => $orderby,
              'order'      => $order,
              'hide_empty' => $hide_empty,
            );

            $product_categories = get_terms('product_cat', $cat_args);

            if (!empty($product_categories)) {

              foreach ($product_categories as $key => $category) {

                $image_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                $post_thumbnail_img = wp_get_attachment_image_src($image_id, 'thumbnail');
                if (!empty($post_thumbnail_img)) {
                  echo '<div class="item" style="background: url(' . $post_thumbnail_img[0] . ')no-repeat top left; width: 100%; background-size: contain;">';
            ?>
            <h3><a href="<?php echo home_url() . "/product-category/" .  $category->slug; ?>"><?php echo $category->name; ?> <?php echo $arrownext; ?></a></h3>
          </div>
          <?php
                }
              }
            } ?>
        </div>
      </div>
    </div>
    </div>
  </section> -->

  <section>
    <div class="container-fluid" style="padding: 0;">
      <div class="row no-gutters">
        <div class="banner_home" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/dist/img/banner_Home.png')no-repeat top left; background-size: cover; width: 100%; margin-top: 50px;">
          <div class="content_banner col-10 ">

            <div class="column col-12 col-md-6 col-xl-4">
              <h2>Muito prazer, <br><span>somos a Naturatta.</span></h2>
              <div class="texto col-12 col-md-8">uma start up de alimentos saúdaveis e deliciosos </div>
              <div class="clique_aqui"><a href="<?php echo home_url() . "/sobre" ?>">Clique aqui e Conheça<?php echo $arrownext; ?></a> </div>
            </div>
            <div class="col-12 col-md-6">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/smile_biscoito.png" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="receitas__section">
      <div class="container">
        <div class="row no-gutters">
          <div class="title col-12">
            <h2>Receitas com Naturatta</h2>
          </div>
          <div class="subtitle col-12">O que é bom fica ainda melhor acompanhado!</div>
          <div class="sliderReceitas col-12">
            <?php
             $paged = get_query_var('paged') ? get_query_var('paged') : 1;
             $args = array(
              'post_type' => 'receitas',
              'posts_per_page' => "3",
              'paged' => $paged
             );
             $loop = new WP_Query($args);

             while ($loop->have_posts()) : $loop->the_post(); ?>
            <div class="item">
              <!-- <div class="img_receita" style="background: url(<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                                                                    echo $url; ?>)no-repeat top center; background-size: cover; height: 320px; width: 100%;"></div> -->
              <div class="video col-12">
                <video width="300px" height="300px" poster="<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); echo $url; ?>" controls>
                  <source src="<?php the_field('insira_o_video'); ?>" type="video/mp4">
                </video>

              </div>

              <h1 class="title col-12"><?php the_title(); ?></h1>
              <!-- <div class="btn_receita col-12"><a href="<?php the_permalink(); ?>">Ver Receita</a></div> -->
              <div class="btn_buy col-9 col-md-10">
                <button class="single_add_to_cart_button button alt">
                  <a href="<?php the_permalink(); ?>"><?php echo $sucess;
                                                          echo "Ver Receita"; ?></a>
                </button>

              </div>
            </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="promotion product_queiridinhos" style="background: none;">
      <div class="container">
        <div class="row no-gutters">
          <div class="titles col-12">
            <h2>Queridinhos</h2>
            <div class="ver_todos">
              <a href="<?php echo home_url(); ?>/todos-produtos">Ver todos os produtos <?php echo $arrownext; ?></a>
            </div>

            <div class="products col-12">

              <?php
              
              $paged = get_query_var('paged') ? get_query_var('paged') : 1;
              $args = array(
                'post_type' => 'product',
                'order' => 'DESC',
                'posts_per_page' => '4',
                // 'meta_key' => '_sale_price',
                'paged' => $paged
              );

              $loop = new WP_Query($args);
              
              // $product = wc_get_product( $product_id );
              while ($loop->have_posts()) : $loop->the_post();


                // if ( $salediscount > 0 ) {
              ?>
              <div class="item col-12">
                <div class="hurt-icon"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></div>
                <div class="takeItem col-12">

                  <div class="imageProduct col-12">
                    <div class="takeImageProduto" style="background: url(<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); echo $url; ?>)no-repeat top center; background-size: contain; width: 100%; height: 200px;"></div>
                  </div>
                  <h1 class="titleProduct col-12"><?php the_title(); ?></h1>
                  <div class="priceProduct col-12"><?php echo $product->get_price_html(); ?></div>
                  <?php $boleto = get_field('valor_no_boleto');
                  if (!empty($boleto)) { ?>
                  <div class="boleto col-12">
                    <div class="valor">R$ <?php echo $boleto; ?> à vista</div>
                  </div>
                  <?php } ?>

                  <div class="btn_buy col-9 col-md-8 col-lg-12">
                    <button type=”submit” name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class=”single_add_to_cart_button button alt”>
                      <a href="<?php the_permalink(); ?>"><?php echo $sucess;
                                                          echo "Comprar"; ?></a>
                    </button>
                  </div>
                </div>
              </div>

              <?php
              // }
              endwhile;
              wp_reset_query(); ?>
            </div>

          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <section>
    <div class="container-fluid" style="padding: 0;">
      <div class="row no-gutters">
        <div class="banner_distribuidor" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/dist/img/banner_distribuidor.png')no-repeat top left; background-size: cover; width: 100%; margin-top: 50px;">
          <div class="content_banner col-10 ">

            <div class="column col-12 col-md-6 col-xl-4">
              <div class="title">
                <h2>Seja um <span>revendedor <br>Naturatta.</span></h2>
              </div>
              <div class="texto col-12 col-md-8"><span>distribua o mais completo</span> sabor do mercado </div>
              <div class="clique_aqui"><a href="<?php echo home_url() . "/quero-ser-distribuidor" ?>">Clique aqui e saiba como<?php echo $arrownext; ?></a> </div>
            </div>
            <div class="col-12 col-md-6">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/smile_biscoito_distribuidor.png" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
<script>
jQuery("#home").addClass("activeMenu");
</script>