<?php
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
  "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .
  $_SERVER['REQUEST_URI'];
$link_ = $_SERVER['REQUEST_URI'];
// echo $link_ . "<br>";
// echo $link;

if (is_user_logged_in()) {

  get_header();

  global $current_user;
  wp_get_current_user();

  include 'svg.php'; ?> <main><section><div class="my_account"><div class="container"><div class="row no-gutters"><div class="breadcrumb_my_account"><a href="<?php echo home_url(); ?>">Home</a> <?php echo $arrow; ?> <span>Minha Conta</span></div><h2 class="col-12">Minha Conta</h2><p class="col-12">Olá, <?php echo $current_user->display_name; ?>!</p> <?php echo do_shortcode('[woocommerce_my_account]'); ?> </div></div></div></section></main> <?php get_footer();
} else if ($link_ === '/equipeinbox/minha-conta/lost-password/') {
  get_header('login'); ?> <main><section><div class="pageLogin"><div class="container"><div class="row no-gutters"><div class="column column_reset_password col-12"><div class="formulario col-12"><?php echo do_shortcode('[woocommerce_my_account]'); ?></div></div></div></div></div></section></main> <?php get_footer('login');
} else {
  header('Location: ' . home_url() . "/login");
} ?>