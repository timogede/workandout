<?php
 ?>
 <!doctype html>
 <html>
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
   <?php add_to_head(); ?>
   <?php wp_head(); ?>
 </head>

<body <?php body_class(); ?>>
  <div id="page" class="site">
    <header id="masthead" class="header container">
      <div class="header__inside container__inside">
      <div class="header__branding">
        <?php echo the_custom_logo(); ?>
      </div>

      <div class="header__navigation">
        <div class="header__bg"></div>
          <?php wp_nav_menu( array(
            'theme_location' => 'header_nav',
            // 'walker' => new Old_Mountain_Menu()
          ));?>
      </div>


      <button class="header__navigation-toggle">
          <span class="header__navigation-toggle__bar"></span>
          <span class="header__navigation-toggle__bar"></span>
          <span class="header__navigation-toggle__bar"></span>
      </button>


</div>


    </header>
