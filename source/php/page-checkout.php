<?php get_header('checkout'); ?>
<main>
  <section>
    <div class="checkout">
      <?php echo do_shortcode('[woocommerce_checkout]'); ?>
    </div>
  </section>
</main>
<?php get_footer('checkout'); ?>
