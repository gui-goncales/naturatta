<?php

get_header();
include 'svg.php';

?> <main><section><div class="page_carrinho"><div class="container"><div class="row no-gutters"><h2 class="col-12">Meu Carrinho (<?php $number_order = WC()->cart->get_cart_contents_count();
                                            echo $number_order . " itens"; ?>)</h2> <?php if ($number_order == 0) { ?> <div class="icon col-12"><?php echo $empty_cart; ?></div> <?php } else {
            
          } ?> <?php if (have_posts()) : while (have_posts()) : the_post(); ?> <?php the_content(); ?> <?php endwhile;
          else : ?> <p><?php _e('Sorry, no posts matched your criteria.'); ?></p> <?php endif; ?> <?php if ($number_order != 0) { ?> <div class="btn_checkout col-12"><a href="<?php echo home_url(); ?>/checkout">Check Out</a></div> <?php } else { } ?> </div></div></div></section></main> <?php get_footer(); ?>