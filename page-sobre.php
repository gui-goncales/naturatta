<?php

get_header();
include 'svg.php';

?> <main><div class="page_sobre"><div class="container"><div class="row no-gutters"><div class="breadcrumb_my_account"><a href="<?php echo home_url(); ?>">Home</a> <?php echo $arrow; ?> <span>Sobre a Empresa</span></div><div class="content_sobre col-12"><div class="column col-12 col-md-6"><h2>Quem somos</h2> <?php while (have_posts()) : the_post(); ?> <div class="text_about"><?php the_content(); ?></div> <?php endwhile; ?> </div><div class="column col-12 col-md-6"><img src="<?php the_field('inserir_imagem'); ?>" class="img-fluid"></div><div class="column col-12"><h3>Somos a Naturatta: embalagens sustentáveis</h3><div class="texto"> <?php the_field('digite_o_texto_missao'); ?> </div></div><div class="column col-12"><h3>Sua página</h3><div class="texto"> <?php the_field('digite_o_texto_visao'); ?> </div></div></div></div></div></div></main> <?php get_footer(); ?> <script>jQuery("#sobre").addClass("activeMenu");</script>