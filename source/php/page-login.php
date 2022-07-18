<?php
if (is_user_logged_in()) {
  header('Location: ' . home_url() . "/minha-conta");
} else {
  get_header('login'); ?>
  <main>
    <section>
      <div class="pageLogin">
        <div class="container">
          <div class="row no-gutters">
            <div class="column col-12">
              <h2>Criar uma conta</h2>
              <div class="formulario col-12"><?php echo do_shortcode('[wc_reg_form_bbloomer]'); ?></div>
            </div>
            <div class="column col-12">
              <h2>Acessar minha conta</h2>
              <div class="formulario col-12"><?php echo do_shortcode('[wc_login_form_bbloomer]'); ?></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php
  get_footer('login');
}
?>