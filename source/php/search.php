<?php

get_header();
include 'svg.php';


?>
<main>
  <section>
    <div class="products_page">
      <div class="container">
        <div class="row no-gutters">
          <div class="products">
            <?php if (have_posts()) : while (have_posts()) : the_post(); 
            $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));  ?>
            <div class="item col-12">
              <div class="hurt-icon"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?></div>
              <?php if(!empty($url)) { ?> <div class="imageProduct col-12"><img src="<?php echo $url; ?>" class="img-fluid"></div><?php } ?>
              <div class="titleProduct col-12"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>

            </div>
            <?php endwhile;
                        else : ?>
            <div class="mensagem-erro"><?php _e('Desculpe, não encontramos nada.'); ?></div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
<?php
// if(isset($_GET['search-type'])) {
//     $type = $_GET['search-type'];
//     if($type == 'random') {
//         load_template(TEMPLATEPATH . '/normal-search.php');
//     } elseif($type == 'blog') {
//         load_template(TEMPLATEPATH . '/blog-search.php');
//     } elseif($type == 'product') {
//         load_template(TEMPLATEPATH . '/product-search.php');
//     }
// }
?>