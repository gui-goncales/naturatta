<?php
get_header(); 
include 'svg.php'
?>
<main>
  <section>
    <div class="page_template_text">
      <div class="container">
        <div class="row">
          <div class="breadcrumb_my_account">
            <a href="<?php echo home_url(); ?>">Home</a> <?php echo $arrow; ?> <a href="<?php echo home_url(); ?>/receitas">Receitas</a> <?php echo $arrow; ?> <span><?php the_title(); ?></span>
          </div>
          <div class="content_contact col-12">

            <div class="receitas__single col-12">
              <div class="video col-12">
                <video poster="<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); echo $url; ?>" controls>
                  <source src="<?php the_field('insira_o_video'); ?>" type="video/mp4">
                </video>

              </div>

              <h2><?php the_title()?></h2>
              <?php while (have_posts()) : the_post(); ?>
              <div class="texto_receita"><?php the_content(); ?></div>
              <?php endwhile; ?>
              <!-- <h2 class="col-12">Assista ao vídeo</h2> -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <main>
    <?php get_footer(); ?>
    <script>
    jQuery("#receitas").addClass("activeMenu");
    </script>