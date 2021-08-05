<?php
//
// ADD TO HEAD
//

function add_to_head() { ?>
<meta name="theme-color" content="#6BD12A" />
<link href="https://fonts.googleapis.com/css?family=Merriweather:400,400i,700,700i|Montserrat:400,400i,900,900i&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/wp-content/themes/workandout/style.css">
<script type="text/javascript" src="/wp-content/themes/workandout/assets/js/jquery-3.3.1.min.js"></script>
<script src="https://kit.fontawesome.com/83ca355e87.js" crossorigin="anonymous"></script>



<?php }


//
//ADD TO FOOTER
//

function add_to_footer() {
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100;400;700&display=swap" rel="stylesheet">

<script type="text/javascript" src="/wp-content/themes/workandout/assets/js/main.js"></script>
<script type="text/javascript" src="/wp-content/themes/workandout/assets/js/slick.min.js"></script>
<link rel="stylesheet" type="text/css" href="/wp-content/themes/workandout/assets/scss/slick.css">


<!--<script type="text/javascript" src="/wp-content/themes/workandout/assets/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="/wp-content/themes/workandout/assets/js/scroll.js"></script> 
-->
<?php
}

include_once 'includes/acf_blocks.php';


//
//Register Widets and Menus and Custom Logo
//


register_nav_menus( array(
        'header_nav' => 'Header menu',
        'footer_nav' => 'Footer menu',
      ) );



register_sidebar(array(
      'name'          => 'Widget Area',
      'id'            => 'widget_area',
      'description'   => 'My custom sidebar area where I put widgets in.',
      'before_widget' => '<div>',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
      ) );



//
//get menu fields
//
// add_filter('wp_nav_menu_objects', 'add_icons_to_menu', 10, 2);




add_theme_support('custom-logo');




function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
       }

add_filter('upload_mimes', 'cc_mime_types');





  //
  // Add other useful image sizes for use through Add Media modal
  //

  add_theme_support( 'post-thumbnails' );

  function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
  }

  // function register_navwalker(){
//   require_once get_template_directory() .'/template-parts/navigation.php';
// }
// add_action('after_setup_theme', 'register_navwalker');
class Old_Mountain_Menu extends Walker_Nav_Menu {

      // Displays start of an element. E.g '<li> Item Name'
          // @see Walker::start_el()
          function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
                $object = $item->object;
                $type = $item->type;
                $title = $item->title;
                $description = $item->description;
                $permalink = $item->url;
    
            $output .="<li class='" .  implode(" ", $item->classes) . "'>";
            // loop
    
    
                      // vars
            $fa_style = "fas";
                $icon = get_field('icon', $item);
            $cat_filter = get_field('cat_filter', $item);
            $output .= '<a href="' . $permalink . '"';
            $output .= 'data-filter=".' . $cat_filter . '">';
            $output .= '<i class="'.$fa_style . ' '.$icon.'"></i>';
            $output .= $title;
                $output .= '</a>';
    
          }
    
    
    }
    