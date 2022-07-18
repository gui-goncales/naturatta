<?php

get_header(); 
include 'svg.php';

?>
<main>
  <section>
    <div class="products_page" style="padding: 0 0 120px 0;">
      <div class="container">
        <div class="row no-gutters">
          <div class="products">
            <?php
                        global $product;
                        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                        $args = array(
                            'post_type' => 'product',
                            'order' => 'DESC',
                            'posts_per_page' => '16',
                            'paged' => $paged
                        );

                        $loop = new WP_Query($args);
                        // $product = wc_get_product($product_id);
                        while ($loop->have_posts()) : $loop->the_post();


                            // if ( $salediscount > 0 ) {
                        ?>
            <div class="item col-12">
              <div class="hurt-icon"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></div>
              <div class="imageProduct col-12"><img src="<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                                                                            echo $url; ?>" class="img-fluid"></div>
              <div class="titleProduct col-12"><?php the_title(); ?></div>
              <div class="priceProduct col-12"><?php echo $product->get_price_html(); ?></div>
              <?php $boleto = get_field('valor_no_boleto');
                                if (!empty($boleto)) { ?>
              <div class="boleto col-12">
                <div class="valor">R$ <?php echo $boleto; ?> à vista</div>
              </div>
              <?php } ?>

              <div class="btn_buy col-12">
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
  </section>
</main>
<?php get_footer(); ?>
<script>
jQuery("#produtos").addClass("activeMenu");
</script>