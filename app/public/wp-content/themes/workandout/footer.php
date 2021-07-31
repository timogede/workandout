</div><!-- #content -->

<footer id="colophon" class="">
  <div class="site-footer__main container">
  <div class="site-footer__main__inside container__inside">
    <div class="site-footer__main__wrap">
    <div class="site-footer__main__contactform">
      <!-- CONTACT FORM 7 -->
      <?php echo do_shortcode('[contact-form-7 id="34" title="Footer Formular"]'); ?>
</div>
<div class="site-footer__main__contactdata">
  <ul class="site-footer__main__contactdata__adress">
    <li><b>Adresse</b></li>
    <li>
    <address>
    Work and Out GbR<br/>
    Gabelsbergerstr. 19<br/>
    50674 Köln
</address>
</li>
    <br/>
    <li><b>Telefon</b></li>
    <li><a href="tel:015116594289">+49 151 16594289</a></li>
    <br/>
    <li><b>E-Mail</b></li>
    <li><a href="mailto:hello@workandout.de">hello@workandout.de</a></li>
</ul>
<ul class="site-footer__main__contactdata__social">
  <li><a target="_blank" href="https://www.facebook.com/Work-and-out-304055350229815/"><?php include( get_template_directory() . '/assets/images/facebook.svg' ); ?></a></li>
  <li><a target="_blank" href="https://www.instagram.com/work.and.out/"><?php include( get_template_directory() . '/assets/images/instagram.svg' ); ?></a></li>
  <li><a target="_blank" href="https://www.twitter.com/workandout/"><?php include( get_template_directory() . '/assets/images/twitter.svg' ); ?></a></li>
</ul>
</div>
<div class="site-footer__main__logo">
  <?php include( get_template_directory() . '/assets/images/workandout.svg' ); ?>
</div>
</div>
</div>
</div>
  
  </div>
  <div class="site-footer__sub container">
    <div class="site-footer__sub__inside container__inside">
   <div class="site-footer__sub__menu">
    <?php wp_nav_menu( array( 'theme_location' => 'footer_nav' ) );?>
  </div>
</div>
</div>

</footer>
  <?php add_to_footer(); ?>
  <?php wp_footer(); ?>

  </body>
  </html>
