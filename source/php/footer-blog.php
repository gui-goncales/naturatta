<?php include 'svg.php'; wp_footer(); ?>

<footer>
  <div class="footer footer_blog">
    <div class="container">
      <div class="row no-gutters">
        <div class="institucional col-12 col-md-6 col-lg-2">
          <h2>Institucional</h2>
          <ul>
            <li><a href="<?php echo home_url(); ?>/sobre">Sobre a Empresa</a></li>
            <li><a href="<?php echo home_url(); ?>/seguranca">Segurança</a></li>
            <li><a href="<?php echo home_url(); ?>/politica-de-privacidade">Política de Privacidade</a></li>
            <li><a href="<?php echo home_url(); ?>/quero-ser-distribuidor">Me tornar Distribuidor</a></li>
            <li><a href="<?php echo home_url(); ?>/fale-conosco">Fale Conosco</a></li>
            <li><a href="<?php echo home_url(); ?>/duvidas">Dúvidas</a></li>
            <li><a href="<?php echo home_url(); ?>/blog">Blog</a></li>
          </ul>

          <?php if (is_user_logged_in()) { ?>
          <h2 class="marginTopH2">Minha Conta</h2>
          <ul>
            <li><a href="<?php echo home_url(); ?>/minha-conta">Minha Conta</a></li>
            <li><a href="<?php echo home_url(); ?>/minha-conta/orders">Meus Pedidos</a></li>
            <li><a href="<?php echo home_url(); ?>/wishlist">Lista de Desejos</a></li>
            <li><a href="<?php echo home_url(); ?>/carrinho">Carrinho de Compras</a></li>
            <!-- <li><a href="#" id="order_details_btn_modal_footer">Acompanhar Pedido</a></li> -->
          </ul>
          <?php } else { } ?>
        </div>
        <div class="departamentos col-12 col-md-6 col-lg-2">
          <h2>Categorias</h2>
          <ul>
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
                        foreach ($all_categories as $cat) { ?>
            <li><a href="<?php echo home_url() . "/product-cat/" .  $cat->slug; ?>"><?php echo $cat->name; ?></a></li>
            <?php } ?>
          </ul>
        </div>

        <div class="atendimento col-12 col-md-6 col-lg-3">
          <h2>Atendimento</h2>
          <ul>
            <li><b>Razão: </b><?php echo the_field('razao_social', 'option'); ?></li>
            <li><b>CNPJ: </b><?php echo the_field('cnpj', 'option'); ?> </li>
            <!-- <li><b>Inscrição Estadual: </b><?php echo the_field('inscricao_estadual', 'option'); ?></li> -->
            <li><?php echo $location; ?> <span><?php echo the_field('endereco', 'option'); ?></span></li>
            <li><?php echo $phone; ?> <span><?php echo the_field('telefone', 'option'); ?></span></li>
            <li><?php echo $mail; ?> <span><?php echo the_field('email', 'option'); ?></span></li>
          </ul>

          <div class="btns col-12">
            <ul>
              <li class="whatsapp"><a href="<?php echo the_field('whatsapp', 'option'); ?>" target="_blank"><?php echo $whatsapp; ?> <span>Compre pelo whatsapp</span></a></li>
              <li class="atendimento_online"><a href="<?php echo home_url(); ?>/fale-conosco"><?php echo $atendimento_online; ?> <span>Atendimento Online</span></a></li>
            </ul>
          </div>
        </div>

        <div class="forma_pagamento col-12 col-md-6 col-lg-3">
          <h2>Forma de Pagamento</h2>
          <ul>
            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/forma_pagamento.png" alt="" class="img-fluid"></li>
          </ul>

          <h2 class="marginTopH2">Seguranca</h2>
          <ul>
            <li><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/seguranca.png" alt="" class="img-fluid"></li>
          </ul>
        </div>

        <div class="all_rights col-12"> © Naturatta. Todos os direitos reservados. Desenvolvido por <a href="https://eagence.com.br"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/logo_eagence.png" alt="" style="filter: brightness(0) invert(1); margin-top: -4px;" class="img-fluid"></a></div>

      </div>
    </div>
  </div>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.js" type="text/javascript"></script>
<!-- <script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/iziModal.js"></script> -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/app.js"></script>

</body>

</html>