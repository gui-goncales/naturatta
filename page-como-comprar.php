<?php

get_header();
include 'svg.php';

?> <main><section><div class="page_template_text"><div class="container"><div class="row"><div class="breadcrumb_my_account"><a href="<?php echo home_url(); ?>">Home</a> <?php echo $arrow; ?> <span>Como Comprar</span></div> <?php while (have_posts()) : the_post(); ?> <div class="text_content"><?php the_content(); ?></div> <?php endwhile; ?> </div></div></div></section></main> <?php get_footer('blog'); ?>