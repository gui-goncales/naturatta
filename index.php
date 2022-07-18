<?php

get_header(); 
include 'svg.php';

?> <main><section><div class="taxonomy_products product_queiridinhos" style="padding: 0 0 120px 0;"><div class="container"><div class="row no-gutters"><div class="products"> <?php
                        $category = get_queried_object();

                        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                        $cpt_cat = $category->term_id;
                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => 10,
                            'paged' => $paged,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field'    => 'term_id',
                                    'terms'    => $cpt_cat,
                                ),
                            ),
                        );

                        // Custom query.
                        $query = new WP_Query($args);

                        if ($query->have_posts()) {
                            global $wpdb;

                            /* Start the Loop */
                            while ($query->have_posts()) : $query->the_post(); ?> <div class="item col-12"><div class="hurt-icon"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></div><div class="imageProduct col-12"><img src="<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                                                                                echo $url; ?>" class="img-fluid"></div><div class="titleProduct col-12"><?php the_title(); ?></div><div class="priceProduct col-12"><?php echo $product->get_price_html(); ?></div> <?php $boleto = get_field('valor_no_boleto');
                                    if (!empty($boleto)) { ?> <div class="boleto col-12"><div class="valor">R$ <?php echo $boleto; ?> à vista</div></div> <?php 
                                }
                                $parcelas = get_field('parcelas_disponiveis');
                                if($parcelas != "Nenhum") {
                                ?> <div class="parcelado col-12"><span> <?php
                                           
                                            echo $parcelas . "x"; ?> </span>de <span> <?php
                                            $precoProduto = $product->get_regular_price();
                                            $sale = $product->get_sale_price();
                                            if (!empty($sale)) {
                                                $result = $sale / $parcelas;
                                            } else {
                                                $result = $precoProduto / $parcelas;
                                            }

                                            $resultFinal = number_format($result, 2, ",", ".");
                                            echo "R$" . $resultFinal; ?> </span>sem juros no cartão.</div> <?php } ?> <div class="btn_buy col-12"><button type="”submit”" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="”single_add_to_cart_button" button alt”><a href="<?php the_permalink(); ?>"><?php echo $sucess;
                                                                                echo "Comprar"; ?></a></button></div></div> <?php
                            endwhile;
                            // Restore original post data.
                            wp_reset_postdata();
                        }
                        ?> </div></div></div></div></section></main> <?php get_footer(); ?> <script>jQuery("#produtos").addClass("activeMenu");</script>