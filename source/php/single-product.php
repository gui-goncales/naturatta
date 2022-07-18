<?php

defined( 'ABSPATH' ) || exit;
global $product, $comments;

if ( ! comments_open() ) {
  return;
}

get_header();
include 'svg.php';

$short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

?>
<main>
  <section>
    <div class="single-product col-12">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-12 col-md-7">
            <?php
            if ( have_posts() ) : while ( have_posts() ) : the_post();?>
            <div class="slider-nav slick-slider nav">
              <?php $galeria = $product->get_gallery_image_ids();
              // var_dump($galeria);
              if($galeria) :
                foreach($galeria as $foto) :
                  ?>
              <div class="item-nav">
                <?php $url=wp_get_attachment_image_src( $foto, 'thumbnail' ); ?>
                <img src="<?php echo $url[0];?>" class="image-zoom img-fluid" data-zoom="<?php echo $url[0];?>">
              </div><!-- /item-nav -->
              <?php endforeach; ?>
              <?php endif; ?>
            </div><!-- /slider-nav -->
            <div class="slider-for slick-slider full">
              <?php $galeria = $product->get_gallery_image_ids();
              if($galeria):
                foreach($galeria as $foto): ?>
              <div class="item-full zoomImage">
                <?php $url=wp_get_attachment_image_src( $foto, 'large'); ?>
                <img src="<?php echo $url[0];?>" class="image-zoom img-fluid" data-zoom="<?php echo $url[0];?>">
              </div>
              <?php endforeach; endif; endwhile; endif; ?>
            </div>
          </div>
          <div class="col-12 col-md-5">
            <div class="ref col-12"><?php echo $product->get_sku(); ?></div>
            <div class="titulo col-12"><?php the_title(); ?></div>
            <div class="stars col-12">
              <?php if ($average = $product->get_average_rating()) :
                $rating_number = number_format($average);
                if($rating_number <= 0 ) { ?>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <?php } else if(($rating_number >= 1 ) &&($rating_number <= 1.99 )){ ?>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <?php } else if(($rating_number >= 2 )&&($rating_number <= 2.99 )) { ?>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <?php } else if(($rating_number >= 3 )&&($rating_number <= 3.99 )) { ?>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <?php } else if(($rating_number >= 4 )&&($rating_number <= 4.99 )) { ?>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <?php } else if($rating_number >= 5 ) { ?>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active "><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <?php }?>

              <span><?php echo number_format($average);?>.0</span><span class="smallText">(Realize uma avaliação)</span>

              <?php endif; ?>
            </div>
            <div class="hurt-icon"><?php echo do_shortcode('[yith_wcwl_add_to_wishlist]');?></div>

            <div class="preco col-12"><?php echo $product->get_price_html(); ?></div>
            <?php ?>
            <?php $boleto = get_field('valor_no_boleto'); if(!empty($boleto)){ ?>
            <div class="boleto col-12">
              <div class="valor">R$ <?php echo $boleto;?></div>
              <div class="mensagem">A vista no boleto bancário com <?php the_field('porcentagem_de_desconto'); ?> de desconto</div>
            </div>

            <?php 
            } 
            $parcelas = get_field('parcelas_disponiveis');
           if($parcelas != "Nenhum") {
            ?>
            <div class="parcelado col-12">
              <div class="column col-12 col-md-3 col-lg-2 col-xl-1">
                <?php echo $card; ?>
              </div>
              <div class="column col-12 col-md-9 col-lg-10 col-xl-11">
                <span>
                  <?php
                  $parcelas = get_field('parcelas_disponiveis');
                  echo $parcelas . "x"; ?>
                </span> de <span>
                  <?php
                  $precoProduto = $product->get_regular_price();
                  $sale=$product->get_sale_price();
                  if(!empty($sale)) {
                    $result = $sale/$parcelas;
                  } else {
                    $result = $precoProduto/$parcelas;
                  }

                  $resultFinal = number_format($result,2,",",".");
                  echo "R$". $resultFinal; ?>
                </span>
                <br>
                sem juros no cartão.
              </div>
            </div>
            <?php } ?>
            <div class="entrega col-12">
              <div class="column col-12 col-md-3 col-lg-2 col-xl-1">
                <?php echo $truck; ?>
              </div>
              <div class="column col-12 col-md-9 col-lg-10 col-xl-11">
                <h2>Envio para todo o Brasil</h2>
                Saiba mais os prazos de entrega<br>e as formas de envio.
              </div>
            </div>
            <div class="add-carrinho">
              <?php

              if ($product->is_type( 'simple' )) { woocommerce_simple_add_to_cart(); }
              elseif($product->is_type( 'variable' )) { woocommerce_variable_add_to_cart( $product ); }
              elseif($product->is_type( 'external' )) { woocommerce_external_add_to_cart( $product ); } ?>
            </div><!-- /add-carrinho -->
          </div>
        </div>
      </div>
    </div>
    <div class="descricao col-12">
      <div class="container">
        <div class="row no-gutters">
          <h2 class="col-12">Descrição do produto</h2>
          <div class="takeDescription col-12">
            <div class="imageProduct col-12 col-md-4">
              <img src="<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); echo $url; ?>" class="img-fluid">
              <div class="btn_saiba_mais">
                <a href="#">Desejo maiores informações</a>
              </div>
            </div>

            <div class="texto col-12 col-md-8">
              <?php
              echo $short_description;
              $PDFcatagolo = get_field("insira_o_catalogo");
              if(!empty($PDFcatagolo)) {?>
              <div class="btn_clique_aqui">
                <a href="<?php echo $PDFcatagolo; ?>" download>Clique aqui para baixar o catálogo deste produto <span><?php echo $arrownext; ?></span> </a>
              </div>
              <?php } ?>
            </div>
          </div>

          <div class="takeAnother col-12">
            <div class="item col-12">
              <h2 class="col-12">Ingredientes</h2>
              <div class="texto col-12"><?php the_field("pararamentros_basicos"); ?></div>
            </div>
            <div class="item col-12">
              <h2 class="col-12">Tabela Nutricional</h2>
              <table>
                <tr>
                  <td>Valor Energético</td>
                  <td><?php the_field('valor_enegetico');?></td>
                </tr>
                <tr>
                  <td>Proteína</td>
                  <td><?php the_field('proteina_tabela_nutricional');?></td>
                </tr>
                <tr>
                  <td>Gordura total</td>
                  <td><?php the_field('gordura_total_tabela_nutricional');?></td>
                </tr>
                <tr>
                  <td>Gordura trans</td>
                  <td><?php the_field('gordura_trans_tabela_nutricional');?></td>
                </tr>
                <tr>
                  <td>Gordura saturada</td>
                  <td><?php the_field('gordura_saturada_tabela_nutricional');?></td>
                </tr>
                <tr>
                  <td>Carboidratos</td>
                  <td><?php the_field('carboidratos_tabela_nutricional');?></td>
                </tr>
                <tr>
                  <td>Fibras</td>
                  <td><?php the_field('fibras_tabela_nutricional');?></td>
                </tr>
                <tr>
                  <td>Sódio</td>
                  <td><?php the_field('sodio_tabela_nutricional');?></td>
                </tr>
              </table>
            </div>
            <!-- <div class="item col-12">
              <h2 class="col-12">Peso</h2>
              <div class="texto col-12"><?php // the_field("caracteristicas_gerais"); ?></div>
            </div> -->
            <!-- <div class="item col-12"> -->
            <!-- <h2 class="col-12">Aplicações</h2>
              <div class="texto col-12"><?php //the_field("aplicacoes"); ?></div> -->
            <!-- </div> -->
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="comments">
      <div class="container">
        <div class="row no-gutters">
          <div class="column col-12 col-md-5">
            <h2>Avaliações sobre o produto</h2>

            <div class="stars col-12">

              <?php if ($average = $product->get_average_rating()) :
                $rating_number = number_format($average);
                $comments_count = get_comments_number($post->ID);
                echo "<span>".$rating_number.".0</span>";

                if($rating_number <= 0 ) { ?>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <?php } else if(($rating_number >= 1 ) &&($rating_number <= 1.99 )){ ?>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <?php } else if(($rating_number >= 2 )&&($rating_number <= 2.99 )) { ?>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <?php } else if(($rating_number >= 3 )&&($rating_number <= 3.99 )) { ?>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <?php } else if(($rating_number >= 4 )&&($rating_number <= 4.99 )) { ?>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star"><?php echo $star; ?></div>
              <?php } else if($rating_number >= 5 ) { ?>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <div class="star active "><?php echo $star; ?></div>
              <div class="star active"><?php echo $star; ?></div>
              <?php }?>
              <span class="smallText">(Realize uma avaliação)</span>
              <?php echo "<div class='count_comments'>Avaliações (". $comments_count .")</div>"; ?>
              <?php endif; ?>
            </div>
            <div class="takeComentarios">
              <ul>
                <?php

                // $args = array(
                //   'callback'          => 'woocommerce_comments',
                //   'per_page'          => '-1',
                //   'reverse_children'  =>  $reversechild,
                //   'max_depth' => '2'
                // );
                // wp_list_comments($args);


                get_comments( array('post_id' => $post->ID, 'status' => 'approve') );
                // To get an already formatted comment list, is easier use the wp_list_comments() function, instead of another foreach cycle (code from codex):

                echo '<ol class="commentlist">';
                //Gather comments for a specific page/post
                $comments = get_comments(wp_list_comments(array(
                  'type' => 'comment',
                  'callback' => 'custom_comments',
                  'reverse_top_level' => false, //Show the latest comments at the top of the list
                ), $comments));

                $comments = get_comments(array(
                  'post_id' => $post->ID,
                  'status' => 'approve',
                  'comment_parent' => $post->ID,
                  'add_below'     => 'comment',
                  'respond_id'    => 'respond',
                  'reply_text'    => __( 'Responder' ),
                ));

                // echo "<pre>";
                // print_r($comments);
                // echo "</pre>";
                $i = 1;
                foreach($comments as $comment){

                  if($comment->comment_parent == 0) {
                    $i++;
                    ?>
                <li class="review byuser comment-author-adminequipeinbox bypostauthor odd alt thread-odd thread-alt depth-1" id="comment-<?php echo $i; ?>">
                  <?php $rating_number = get_comment_meta( $comment->comment_ID, 'rating', true); ?>
                  <div class="stars">
                    <?php
                        if($rating_number == 0 ) { ?>
                    <div class="star"><?php echo $star; ?></div>
                    <div class="star"><?php echo $star; ?></div>
                    <div class="star"><?php echo $star; ?></div>
                    <div class="star"><?php echo $star; ?></div>
                    <div class="star"><?php echo $star; ?></div>
                    <?php } else if($rating_number == 1 ){ ?>
                    <div class="star active"><?php echo $star; ?></div>
                    <div class="star"><?php echo $star; ?></div>
                    <div class="star"><?php echo $star; ?></div>
                    <div class="star"><?php echo $star; ?></div>
                    <div class="star"><?php echo $star; ?></div>
                    <?php } else if($rating_number == 2 ) { ?>
                    <div class="star active"><?php echo $star; ?></div>
                    <div class="star active"><?php echo $star; ?></div>
                    <div class="star"><?php echo $star; ?></div>
                    <div class="star"><?php echo $star; ?></div>
                    <div class="star"><?php echo $star; ?></div>
                    <?php } else if($rating_number == 3 ) { ?>
                    <div class="star active"><?php echo $star; ?></div>
                    <div class="star active"><?php echo $star; ?></div>
                    <div class="star active"><?php echo $star; ?></div>
                    <div class="star"><?php echo $star; ?></div>
                    <div class="star"><?php echo $star; ?></div>
                    <?php } else if($rating_number == 4 ) { ?>
                    <div class="star active"><?php echo $star; ?></div>
                    <div class="star active"><?php echo $star; ?></div>
                    <div class="star active"><?php echo $star; ?></div>
                    <div class="star active"><?php echo $star; ?></div>
                    <div class="star"><?php echo $star; ?></div>
                    <?php } else if($rating_number == 5 ) { ?>
                    <div class="star active"><?php echo $star; ?></div>
                    <div class="star active"><?php echo $star; ?></div>
                    <div class="star active"><?php echo $star; ?></div>
                    <div class="star active "><?php echo $star; ?></div>
                    <div class="star active"><?php echo $star; ?></div>
                    <?php }?>
                    <span class="smallText">(Realize uma avaliação)</span>
                  </div>
                  <div class="author_comment"><?php comment_author(); ?></div>
                  <!-- <div class="data_comment"><?php // comment_date(); ?></div> -->
                  <div class="text_comment"><?php comment_text(); ?></div>
                  <?php
                    } else if($comment->comment_parent > 0){
                      foreach($comment as $sub_comment){ ?>
                  <div class="children">
                    <div class="author_comment"><?php comment_author(); ?></div>
                    <!-- <div class="data_comment"><?php // comment_date(); ?></div> -->
                    <div class="text_comment"><?php comment_text(); ?></div>
                  </div>
                </li>
                <?php
                      break;
                    }
                  }
                }

                // wp_list_comments(array(
                //   'per_page' => 10, // Allow comment pagination
                //   'reverse_top_level' => false, //Show the latest comments at the top of the list
                //
                // ), $comments);
                echo '</ol>';

                ?>
              </ul>
            </div>
            <!-- <div class="btn_ver_mais" id="loading_more">
            <button type="button" name="button">Ver todas as opniões</button>
          </div> -->
          </div>
          <div class="column col-12 col-md-6">
            <h2>Faça uma avaliação</h2>
            <?php if ( have_comments() ) : ?>

            <ol class="commentlist">
              <?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
            </ol>

            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
              echo '<nav class="woocommerce-pagination">';
              paginate_comments_links( apply_filters( 'woocommerce_comment_pagination_args', array(
                'prev_text' => '&larr;',
                'next_text' => '&rarr;',
                'type'      => 'list',
              ) ) );
              echo '</nav>';
            endif; ?>

            <?php else : ?>


            <?php endif; ?>


            <?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

            <div id="review_form_wrapper">
              <div id="review_form">
                <?php
                $commenter = wp_get_current_commenter();

                $comment_form = array(
                  'title_reply'          => have_comments() ? __( 'Add a review', 'woocommerce' ) : __( '', 'woocommerce' ),
                  'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
                  'comment_notes_before' => '',
                  'comment_notes_after'  => '',
                  'fields'               => array(
                    'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
                    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true" /></p>',
                    'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', 'woocommerce' ) . ' <span class="required">*</span></label> ' .
                    '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-required="true" /></p>',
                  ),
                  'label_submit'  => __( 'Submit', 'woocommerce' ),
                  'logged_in_as'  => '',
                  'comment_field' => ''
                );

                if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
                  $comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Quantas estrelas você daria', 'woocommerce' ) .'</label><select name="rating" id="rating">
                  <option value="">' . __( 'Rate&hellip;', 'woocommerce' ) . '</option>
                  <option value="5">' . __( '5', 'woocommerce' ) . '</option>
                  <option value="4">' . __( '4', 'woocommerce' ) . '</option>
                  <option value="3">' . __( '3', 'woocommerce' ) . '</option>
                  <option value="2">' . __( '2', 'woocommerce' ) . '</option>
                  <option value="1">' . __( '1', 'woocommerce' ) . '</option>
                  </select></p>';
                }

                $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . __( '', 'woocommerce' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Conte-nos mais sobre o produto"></textarea></p>';

                comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
                ?>
              </div>
            </div>

            <?php else : ?>

            <p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

            <?php endif; ?>

            <div class="clear"></div>
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