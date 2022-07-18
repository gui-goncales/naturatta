<?php

get_header();
include 'svg.php';

?> <main><section><div class="page_template_text"><div class="container"><div class="row"><div class="breadcrumb_my_account"><a href="<?php echo home_url(); ?>">Home</a> <?php echo $arrow; ?> <span>Dúvidas</span></div> <?php while (have_posts()) : the_post(); ?> <div class="text_content"><?php the_content(); ?></div> <?php endwhile; ?> <div class="content_contact col-12"><div class="column col-12 col-md-8"><h2>Ainda tem dúvidas? Entre em contato conosco.</h2> <?php echo do_shortcode('[contact-form-7 id="133" title="Contato"]'); ?> </div></div></div></div></div></section></main> <?php get_footer('blog'); ?>