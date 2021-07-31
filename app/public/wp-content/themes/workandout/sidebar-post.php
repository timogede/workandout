<?php
/**
 *
 */

?>


<aside class="post__body__sidebar">

<div class="post__body__sidebar__widget-area">
	<?php if ( is_active_sidebar( 'widget_area' ) ) : ?>
    <?php dynamic_sidebar( 'widget_area' ); ?>
<?php endif; ?>
</div>

</aside>
