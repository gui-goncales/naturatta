<?php

get_header();
include 'svg.php';

?> <main><section><div class="page_template_text"><div class="container"><div class="row"><div class="breadcrumb_my_account"><a href="<?php echo home_url(); ?>">Home</a> <?php echo $arrow; ?> <span>Quero ser distribuidor</span></div><div class="content_contact col-12"><h2>Se torne um distribuidor</h2><p>Preencha completamente o formulário abaixo.</p> <?php echo do_shortcode('[contact-form-7 id="506" title="Distribuidor"]'); ?> </div></div></div></div></section></main> <?php get_footer(); ?> <script>jQuery("#distribuidor").addClass("activeMenu");</script>