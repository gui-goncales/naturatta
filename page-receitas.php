<?php
get_header(); 
include 'svg.php'
?> <main><section><div class="page_template_text"><div class="container"><div class="row no-gutters"><div class="breadcrumb_my_account"><a href="<?php echo home_url(); ?>">Home</a> <?php echo $arrow; ?> <span>Receitas</span></div><div class="content_contact col-12"><h2>Receitas</h2><p>O que é bom fica ainda melhor acompanhado!</p><div class="all_receitas"> <?php
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = array(
                'post_type' => 'receitas',
                'posts_per_page' => "-1",
                'paged' => $paged
                );
                $loop = new WP_Query($args);

                while ($loop->have_posts()) : $loop->the_post(); ?> <div class="item col-12"><div class="video col-12"><video width="300px" height="300px" poster="<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); echo $url; ?>" controls><source src="<?php the_field('insira_o_video'); ?>" type="video/mp4"></video></div><h1 class="title col-12"><?php the_title(); ?></h1><div class="btn_receita col-12"><a href="<?php the_permalink(); ?>">Ver Receita</a></div></div> <?php endwhile; ?> </div></div></div></div></div></section><main> <?php get_footer(); ?> <script>jQuery("#receitas").addClass("activeMenu");</script></main></main>