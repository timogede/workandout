<?php

/**
 * page template to load acf content elements dynamically
 * 2021
 * @author Timo Gede <timo@timogede.com>
 */

get_header();


if( have_rows('content') ) {
    while ( have_rows('content') ) {
        the_row();
        $layoutName = get_row_layout();
        $templateFile = 'partials/content/' . $layoutName;
        if (locate_template($templateFile . '.php') != '') {
            get_template_part($templateFile);
        } else {
            echo '<!-- content ' . $layoutName . ' not found. --> ';
        }
    }
}

if ( have_posts() ) {
	// Load posts loop.
	while ( have_posts() ) {
		the_post();
		the_content();

//        $blocks = parse_blocks( get_the_content() );
//        print_r($blocks);

		// print_r(get_post_meta());
	}
}

get_footer();
