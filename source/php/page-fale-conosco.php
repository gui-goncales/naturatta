<?php

get_header();
include 'svg.php';

?>
<main>
  <section>
    <div class="page_template_text">
      <div class="container">
        <div class="row">
          <div class="breadcrumb_my_account">
            <a href="<?php echo home_url(); ?>">Home</a> <?php echo $arrow; ?> <span>Fale Conosco</span>
          </div>

          <div class="content_contact col-12">
            <div class="column col-12 col-md-6">
              <h2>Envie uma mensagem para nós</h2>
              <p>Para enviar uma mensagem, preencha completamente o formulário abaixo.</p>
              <?php echo do_shortcode('[contact-form-7 id="133" title="Contato"]'); ?>
            </div>
            <div class="column col-12 col-md-6">
              <h2>Atendimento</h2>
              <p>Você também pode entrar em contato conosco através do telefone, online ou vindo até nós.</p>
              <ul>
                <li><b>Razão: </b><?php echo the_field('razao_social', 'option'); ?></li>
                <li><b>CNPJ: </b><?php echo the_field('cnpj', 'option'); ?> </li>
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

              <div class="maps col-12">
                <?php the_field('iframe_mapa', 'option') ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer('blog'); ?>
<script>
jQuery("#contato").addClass("activeMenu");
</script>