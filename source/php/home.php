<?php

get_header();
include 'svg.php';

?>
<main>
    <section>
        <div class="page_blog">
            <div class="container">
                <div class="row no-gutters">
                    <div class="breadcrumb_my_account">
                        <a href="<?php echo home_url(); ?>">Home</a> <?php echo $arrow; ?> <span>Blog</span>
                    </div>

                    <div class="content_columns col-12">
                        <div class="column col-12 col-lg-8">
                            <?php
                            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => "3",
                                'paged' => $paged
                            );
                            $loop = new WP_Query($args);

                            while ($loop->have_posts()) : $loop->the_post(); ?>

                                <div class="item_blog col-12">
                                    <div class="img_blog"><img src="<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                                                                    echo $url; ?>" alt="" class="img-fluid"> </div>
                                    <div class="infos_post"><?php $author_id=$post->post_author; the_author_meta( 'user_nicename' , $author_id ); ?> <span> | </span> <?php echo get_the_date(); ?> </div>
                                    <div class="title_blog"><?php the_title(); ?></div>
                                    <div class="description_blog"><?php echo excerpt('30'); ?></div>
                                    <div class="leiaMais"><a href="<?php the_permalink(); ?>">Continuar Lendo</a></div>
                                </div>

                            <?php endwhile; ?>

                            <div class="col-12 pagination">
                                <?php wp_pagenavi(array('query' => $loop)); ?>
                            </div>
                        </div>
                        <div class="column col-12 col-lg-4">
                        <?php get_sidebar(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
<script>
  jQuery("#blog").addClass("activeMenu");
</script>