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
                        <a href="<?php echo home_url(); ?>">Home</a> <?php echo $arrow; ?> <a href="<?php echo home_url(); ?>/blog">blog</a> <?php echo $arrow; ?> <span><?php the_title(); ?></span>
                    </div>

                    <div class="content_columns col-12">
                        <div class="column col-12 col-lg-8">


                            <div class="item_blog col-12">
                                <div class="img_blog"><img src="<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                                                                echo $url; ?>" alt="" class="img-fluid"> </div>
                                <div class="infos_post"><?php $author_id = $post->post_author;
                                                        the_author_meta('user_nicename', $author_id); ?> <span> | </span> <?php echo get_the_date(); ?> </div>
                                <div class="title_blog"><?php the_title(); ?></div>
                                <?php while (have_posts()) : the_post(); ?>
                                    <div class="texto_blog"><?php the_content(); ?></div>
                                <?php endwhile; ?>
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