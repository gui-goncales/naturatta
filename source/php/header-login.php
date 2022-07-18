<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php
    if (is_home()) :

      bloginfo('name');

    elseif (is_category()) :

      single_cat_title();
      echo ' - ';
      bloginfo('name');

    elseif (is_single()) :

      single_post_title();
      echo ' - ';
      bloginfo('name');

    elseif (is_page()) :

      single_post_title();
      echo ' - ';
      bloginfo('name');

    else :

      wp_title('', true);

    endif;

    ?>
  </title>

  <!-- Favicon -->
  <!-- <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/favicon-16.png" sizes="16x16" type="image/png">
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/favicon-32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/favicon-48.png" sizes="48x48" type="image/png">
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/favicon-62.png" sizes="62x62" type="image/png">-->
  <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/favicon.png" sizes="92x92" type="image/png">


  <!-- Depêndencias -->
  <style type="text/css">
  <?php $url=get_bloginfo('template_directory') . '/dist/css/style.css';

  $ch=curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);

  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $contents=curl_exec($ch);

  if (curl_errno($ch)) : echo curl_error($ch);

  $contents='';

  else : curl_close($ch);

  endif;

  if ( !is_string($contents) || !strlen($contents)) : $contents='';

  endif;

  $contents=str_replace('../img/', get_bloginfo('template_directory') . '/dist/img/', $contents);

  $contents=str_replace('../fonts/', get_bloginfo('template_directory') . '/dist/fonts/', $contents);

  echo $contents;
  ?>
  </style>

  </script>
  <?php
  // CALL TO SVG
  include 'svg.php';
  wp_head();
  ?>
  
</head>

<body>
  <h1 class="ocultar">Naturatta</h1>
  <header>
    <div class="headerCheckout">
      <div class="container">
        <div class="row no-gutters">
          <div class="logo col-12 col-md-4 col-lg-3"><a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/img/logo_naturatta.png" alt="[Logo Naturatta]" title="Naturatta" class="img-fluid"></a></div>

        </div><!-- /row -->
      </div><!-- /container -->
    </div><!-- /headerCheckout -->

  </header>