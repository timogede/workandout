<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php

	get_template_part( 'template-parts/entry-header' );




	?>



		<div class="post__header container">
			<div class="container__inside post__header__inside">
				<div class="post__header__featured-image" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">

				</div>
				<div class="post__header__date">
					<span>
					<?php show_me_the_date(); ?>
				</span>
				</div>
				<div class="post__header__tags">
						<?php show_me_the_current_categories(); ?>
				</div>
				<div class="post__header__headlines">
			<h1>
				<?php the_title(); ?>
			</h1>
				</div>

			</div>
		</div>


			<div class="post__body container">
				<div class="post__body__inside container__inside">
				<div class="post__body__content">
					<?php the_content(); ?>
				</div>
				<?php

						get_sidebar('post');




				?>
			</div>
			</div>







</article><!-- .post -->
