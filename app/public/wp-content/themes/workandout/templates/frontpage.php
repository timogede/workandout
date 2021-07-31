<?php
/**
 * Template Name: Frontpage Template
 * Template Post Type: page
 *
 */

get_header();
// first hero slider
$hero_image = get_field("hero_image");
$greeting = get_field("hero_greeting");
$headline = get_field("hero_headline");
$subline = get_field("hero_subline");
$button_text = get_field("hero_button_text");
$button_link = get_field("hero_button_link");
$arrow_bottom_link = get_field("hero_arrow_bottom_link");
// second hero slider
$hero_image_2 = get_field("hero_image_2");
$greeting_2 = get_field("hero_greeting_2");
$headline_2 = get_field("hero_headline_2");
$subline_2 = get_field("hero_subline_2");
$button_text_2 = get_field("hero_button_text_2");
$button_link_2 = get_field("hero_button_link_2");
$arrow_bottom_link_2 = get_field("hero_arrow_bottom_link_2");
  ?>
    <!-- slick wrap start -->
<div class="hero__slick-wrap">



<div class="hero container" style="background-image:url('<?php echo $hero_image;?>');">
  <!-- slide 01 start -->
<div class="hero__inside container__inside">
  <div class="hero__content">
        <span class="hero__content__greeting">
          <?php echo $greeting;?>
        </span>
        <h1 class="hero__content__headline">
          <?php echo $headline;?>
        </h1>
        <h2 class="hero__content__subline">
          <?php echo $subline;?>
        </h2>

          <a class="hero__content__button" href="<?php echo $button_link; ?>">
              <?php echo $button_text; ?>
              </a>
  </div>





</div>
<a href="<?php echo $arrow_bottom_link; ?>" class="hero__icon">
  <i class="far fa-long-arrow-down"></i>
</a>
</div>
  <!-- slide 01 end -->


  <!-- slide 02 start -->
  <div class="hero container" style="background-image:url('<?php echo $hero_image_2;?>');">
  <div class="hero__inside container__inside">
    <div class="hero__content">
          <span class="hero__content__greeting">
            <?php echo $greeting_2;?>
          </span>
          <h1 class="hero__content__headline">
            <?php echo $headline_2;?>
          </h1>
          <h2 class="hero__content__subline">
            <?php echo $subline_2;?>
          </h2>

            <a class="hero__content__button" href="<?php echo $button_link_2; ?>">
                <?php echo $button_text_2; ?>
                </a>
    </div>





  </div>
  <a href="<?php echo $arrow_bottom_link_2; ?>" class="hero__icon">
    <i class="far fa-long-arrow-down"></i>
  </a>
  </div>
  <!-- slide 02 end -->











<!-- slick wrap start -->
</div>
<!-- slick wrap start -->


<div class="isotope-filter container" id="filter">
  <div class="isotope-filter__inside container__inside">

      <?php
    list_all_categories_as_isotope_filter("english");

       ?>

     </div>



    </div>

    <div class="isotope-grid container">
      <div class="isotope-grid__inside container__inside">
          <div class="isotope-grid__grid">
<?php
list_all_posts_as_cards();

?>
</div>
</div>
</div>



<?php
get_footer();
?>
